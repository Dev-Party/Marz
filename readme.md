# Marz [![Build Status](https://travis-ci.org/soyFelixBarros/Marz.svg?branch=master)](https://travis-ci.org/soyFelixBarros/Marz)

> Proyecto de API pública para la gestión de radios en Internet.

## Instalación
1) Clonar el repo en tu equipo:
```sh
$ git clone git@github.com:soyFelixBarros/Marz.git
$ cd Marz
```
2) Descargar todas las librerias del framework:
```sh
$ composer install
```
3) Crear una base de datos con el nombre "Marz". Renombrar el archivo ".env.example" por ".env", y editar con los datos de conexión:
```
DB_DATABASE=Marz
DB_USERNAME=root
DB_PASSWORD=
```
4) Ejecutar migrations y seeders:
```sh
$ php artisan migrate
$ php artisan db:seed
```
¡Listo!

Para más información [https://soyfelixbarros.wordpress.com/marz]

Licencia
----
MIT
