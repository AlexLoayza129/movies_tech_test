## App Santa Rosa - Movies

Esta prueba fue desarrollada el 09/11/2022 para constatar los conocimiento de "Alex Loayza"
el postulante

Esta aplicación fue hecha con Laravel v9, Vue 3, TailWindCSS, Jquery, entre otras librerias/dependencias.

* Módulos
    - Peliculas (CRUD)
        - Turnos (CRUD)

Pasos a seguir para ejecutar el proyecto:

1.- Clonar el proyecto en su PC
``` 
git clone https://github.com/AlexLoayza129/movies_tech_test.git
```
2.- Creamos la base de datos en nuestro gestor MYSQL
 ```
 CREATE DATABASE app_santaclara;
 USE app_santaclara;
 ```

3.- Generamos nuestro .env
```
cp .env.example .env
 ```

4.- Colocamos nuestras credenciales en el .env, ej:
```
DB_USERNAME=root
DB_PASSWORD=
```

5.- Generamos nuestra APP_KEY
```
php artisan key:generate
```

6.- Instalamos todas las dependencias
```
composer install
npm install && npm run dev
```

<strong>7.- Ejecutamos nuestra consulta app.sql para crear las tablas</strong>.

8.- Traemos todos nuestros modelos con
```
php artisan code:models
```

9.- Corremos los seeders
```
php artisan db:seed
```
 - Con esto generaremos un usuario admin
```
email: admin@admin.com
password: admin
```



10.- Corremos en nuestro localhost
```
php artisan serve
```