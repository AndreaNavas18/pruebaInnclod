# Prueba Técnica PHP Innclod

_Esta aplicación web implementa un sistema CRUD para el registro de documentos utilizando Laravel 10 como backend y React para el frontend. Se utilizó laravel/ui para gestionar la autenticación de los usuarios._

## Inicio 🚀

_Este archivo se crea con el fin de que cualquier persona pueda desplegar la aplicación y ver su funcionamiento de manera local._

Si desean **Desplegar** el proyecto sin necesidad de llevar acabo su instalación, me pueden contactar y generaré un tunel a mi entorno local con **Ngrok** que serviría como un demo en línea.


### Requisitos de despliegue 📋

_Que se necesita para su posterior despliegue?_

* PHP 8.0‘
* Composer 2.6.6
* Node.js y NPM
* MySQL
* Git
* Editor de código (Visual Studio Code, Sublime Text, etc.)

_Se necesita de un entorno de desarrollo para PHP_

En este caso se utilizo **Laragon**, pero podría ser Xammp o Wammp.


### Instalación 🔧

_Se enviará un zip con el código fuente en el caso de no optar por clonar el repositorio, pero los pasos de instalación serán los mismos_

_Usando el zip_

1.1 Se debe descomprimir el zip dentro del entorno de desarrollo, en la carpeta que toma como directorio raiz el servidor web (como apache o nginx), por ejemplo si es **Laragon** en su carpeta **'www'**, si es **Xammp** en su carpeta **'htdocs'**.

_Clonando el repositorio_

1.2 Se debe abrir una terminal, ir al directorio raiz del servidor web
```
C:\Laragon\www>
```
1.2.2. En esa ubicación copia y pega este comando
```
git clone https://github.com/AndreaNavas18/pruebaInnclod.git
```
1.2.3. Ingresamos al repositorio 
```
cd pruebaInnclod
```
1.2.4. Abrimos el repositorio en el editor de código con este comando o manualmente
```
C:\Laragon\www\pruebaInnclod> code .
```
_Si se descargó el zip, se debe evitar este paso_

1.2.5. Se renombra el archivo ".env.example", quitandole el ".example", el archivo debe quedar con el nombre **.env** solamente. 

1.2.6. Abrimos una terminal (ya sea en el editor de código o una por fuera). Nos ubicamos nuevamente en la carpeta que contiene el repositorio para generar la app_key.

**C:\Laragon\www\pruebaInnclod>**
```
php artisan key:generate
```

## Configuración de la base de datos

_En el .env.example se deben poner las credenciales de la base de datos._

DB_DATABASE=nombre de la base de datos

DB_USERNAME=usuario

DB_PASSWORD=contraseña 

2. Después de configurar el archivo .env, migraremos y poblaremos la base de datos con el siguiente comando 

```
php artisan migrate --seed
```

## Modulos y dependencias  ⚙️

3. Corremos los siguientes comandos en la terminal para instalar las dependencias y modulos

```
composer install
```
```
npm install
```

### Iniciamos el servidor 🔩

4. Corremos el siguiente comando en una terminal

```
php artisan serve
```

5. Corremos este comando en otra terminal

```
npm run dev
```

### Accedemos al navegador con la ruta de nuestro local ⌨️

_Normalmente es el puerto :8000, pero este enlace se puede ver en la terminal que se corrió el comando php artisan serve_

```
http://localhost:8000
```

## Despliegue 📦

_Credenciales para el ingreso_

**Usuario:** usuario123

**Contraseña:** 12345678

## Construido con 🛠️


* [Backend](https://laravel.com/docs/10.x) - Laravel 10.x
* [Frontend](https://react.dev/learn) - React 18.2
* [Autenticación](https://github.com/laravel/ui) - Laravel/ui
* [Bases de datos](https://www.mysql.com/) - MySQL
* [Gestión de dependencias](https://getcomposer.org/) - Composer y NPM


## Autor ✒️

* **Andrea Navas** - [Andrea](https://github.com/AndreaNavas18) 😊
