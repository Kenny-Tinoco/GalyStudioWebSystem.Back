#!/bin/bash

DOCKER_BE = gsws.back-be
UID = $(shell id -u)

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

start: ## Start the containers
	docker network create gsws-network || true
	U_ID=${UID} docker compose up -d

init: ## Start containers and prepare backend commands
	$(MAKE) start
	$(MAKE) prepare

stop: ## Stop the containers
	U_ID=${UID} docker compose stop

restart: ## Restart the containers
	$(MAKE) stop
	$(MAKE) start

build: ## Rebuilds all the containers
	U_ID=${UID} docker compose build

prepare: ## Runs backend commands
	$(MAKE) composer-install
	#$(MAKE) migrations

# Backend commands
composer-install: ## Installs composer dependencies
	U_ID=${UID} docker exec --user ${UID} -it ${DOCKER_BE} composer install --no-scripts --no-interaction --optimize-autoloader

be-logs: ## Tails the Symfony dev log
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} tail -f var/log/dev.log
# End backend commands

ssh-be: ## ssh's into the be container
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bash

migrations: ## Create migrations
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} mkdir -p migrations
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} bin/console doctrine:migrations:diff
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} bin/console doctrine:migrations:migrate -n --allow-no-migration

phpunit-t: ## Run PHPUnit tests
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} bin/phpunit

phpstan-t: ## Run PHPStan tests
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} ./vendor/bin/phpstan analyse src tests --level 5

generate-ssh-keys: ## Generate ssh keys in the container
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} mkdir -p config/jwt
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} openssl genrsa -passout pass:a6b664029f48d1863f08e9aaa039f554 -out config/jwt/private.pem -aes256 4096
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} openssl rsa -pubout -passin pass:a6b664029f48d1863f08e9aaa039f554 -in config/jwt/private.pem -out config/jwt/public.pem
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} chmod 644 config/jwt/*

.PHONY: migrations tests
