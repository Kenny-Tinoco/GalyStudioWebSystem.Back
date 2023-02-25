
## Sistema web para el control de servicios
> Sistema informático desarrollado para el estudio de maquillaje Galy Studio.
> El cual controla todos los servicios que el negocio ofrece; venta de productos, servicios profesionales y cursos de maquillaje. 
> Además, este sistema se realiza como proyecto de la asignatura *Ingeniería de Software* de la carrera de ***Ingeniería en Computación***.

## Estado del código

[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Kenny-Tinoco_GalyStudioWebSystem.Back&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=Kenny-Tinoco_GalyStudioWebSystem.Back)
![Build](https://github.com/Kenny-Tinoco/GalyStudioWebSystem.Back/actions/workflows/symfony.yml/badge.svg?branch=develop)
![DevOps](https://github.com/Kenny-Tinoco/GalyStudioWebSystem.Back/actions/workflows/test-sonarcloud.yml/badge.svg)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/2ff2ef66025b4f30998ee56f2eab927f)](https://www.codacy.com/gh/Kenny-Tinoco/galy-studio-web-system.back/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Kenny-Tinoco/galy-studio-web-system.back&amp;utm_campaign=Badge_Grade)

[![SonarCloud](https://sonarcloud.io/images/project_badges/sonarcloud-black.svg)](https://sonarcloud.io/summary/new_code?id=Kenny-Tinoco_GalyStudioWebSystem.Back)

## Galy Studio Web System Backend

Sistema web para el control de servicios del estudio de maquillaje Galy Studio, aplicación del lado del servidor.

## Ecosistema

`PHP` `Symfony 6` `MySQL` `GitHub` `GitHub Actions` `SonarCloud` `Codacy` `PHPStan` `PHPUnit` `Docker`

![](./docs/images/Ecosystem.png)

## Instalación

1. Instalar git y docker. Opcionalmente instalar el IDE PhpStorm
2. Clonar el repositorio en tu equipo, **mediante consola**:
```text
git clone https://github.com/Kenny-Tinoco/galy-studio-web-system.back.git gsws
cd gsws
```

3. Crear e iniciar los contenedores:
```text
make build 
make init
```
4. Crear las migraciones:
```text
make migrations
```

Para ver la ayuda de *make*, ejecutar el siguente comando:
```text
make
```

## Documentación 

Ver [wiki](https://github.com/Kenny-Tinoco/galy-studio-web-system.back/wiki)