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
	$(MAKE) mkdir-migrations
	$(MAKE)	migrations
	$(MAKE)	migrations-test

# Backend commands
composer-install: ## Installs composer dependencies
	U_ID=${UID} docker exec --user ${UID} ${DOCKER_BE} composer install --no-scripts --no-interaction --optimize-autoloader

be-logs: ## Tails the Symfony dev log
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} tail -f var/log/dev.log
# End backend commands

ssh-be: ## ssh's into the be container
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bash

.PHONY: migrations migrations-test
migrations: ## Create migrations
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bin/console doctrine:migrations:migrate -n --allow-no-migration

mkdir-migrations:
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} mkdir -p migrations

migrations-test: ## Create migrations
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bin/console doctrine:migrations:migrate -n --allow-no-migration --env=test

generate-ssh-keys: ## Generate ssh keys in the container
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bin/console lexik:jwt:generate-keypair --overwrite

phpunit-t: ## Run PHPUnit tests
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} bin/phpunit --coverage-clover=coverage.xml

phpstan-t: ## Run PHPStan tests
	U_ID=${UID} docker exec -it --user ${UID} ${DOCKER_BE} ./vendor/bin/phpstan analyse src tests --level 5

.PHONY: tests
tests:
	$(MAKE) phpstan-t
	$(MAKE) phpunit-t