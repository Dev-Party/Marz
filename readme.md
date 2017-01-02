## Sintoniza.la
[![Build Status](https://travis-ci.org/soyFelixBarros/Sintoniza.svg?branch=master)](https://travis-ci.org/soyFelixBarros/Sintoniza)
[![StyleCI](https://styleci.io/repos/53856715/shield?style=flat)](https://styleci.io/repos/53856715)
[![Laravel 5.3](https://img.shields.io/badge/Laravel-5.3-orange.svg?style=flat)](http://laravel.com)
[![License](http://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](https://opensource.org/licenses/MIT)

## Instalación
1) Clonar el repo en tu equipo:
```sh
$ git clone git@github.com:soyFelixBarros/Sintoniza.la.git
$ cd Sintoniza.la
```
2) Descargar todas las librerias del framework:
```sh
$ composer install
```
3) Crear una base de datos con el nombre "sintonizala". Renombrar el archivo ".env.example" por ".env", y editar con los datos de conexión:
```
DB_DATABASE=sintoniza
DB_USERNAME=root
DB_PASSWORD=
```
4) Ejecutar migrations, seeders y generar key:
```sh
$ php artisan migrate
$ php artisan db:seed
$ php artisan key:generate
```
¡Listo! Ingresa a tu url local (Ej: http://localhost/)
