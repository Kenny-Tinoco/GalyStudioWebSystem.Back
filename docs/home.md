# Home

## Instalación

1. Instalar git y docker. Opcionalmente instalar el IDE PhpStorm
2. Clonar el repositorio en tu equipo, **mediante consola**:
```sh
$ git clone https://github.com/Kenny-Tinoco/galy-studio-web-system.back.git gsws
$ cd gsws
```
3. Crear e iniciar los contenedores:
```sh
gsws$ make build 
gsws$ make init
```
4. Crear las migraciones:
```sh
gsws$ make migrations
```

Para ver la ayuda de *make*, ejecutar el siguente comando:
```sh
gsws$ make
```


# Welcome to the GalyStudioWebSystem.Back wiki

# Domain

# Architecture

![](./images/architecture.png)

### Resposabilidades

**ApiController**
* Define la dirección del recurso
* Traspasa la petición por medio de los DTO's a los controladores de la capa de negocio (BusinessController).

**BusinessController**
* Procesa la petición apoyandose en los DAO's
* Crea las entidades a partir de los DTO´s
* Gestiona la respuesta a partir de las entidades. Delega en los DTO's la creación a partir de la entidad
* Delega en BusinessService procesos complejos

**BusinessService**
* Servicios consumidos por los controladores del negocio

**Dao**
* Gestiona las consultas a la Base de Datos

**Entity**
* Lógica del negocio
* Entidades presentes en la Base de Datos

**Dto**
* Clases modelo para la transferencia de datos entre capas, tanto de entrada como de salida


# Release

- [v1. release](./v1.-release.md)

# Workflow

- Git branching model
- Conventional commit [link](https://www.conventionalcommits.org/es/v1.0.0/)