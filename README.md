# The library

Proyecto de reclutamiento para Maniak

# Features

  - Muestra una tabla paginada con todos los libros
  - Puedes filtrar la tabla
  - Crear un libro
  - Editar un libro
  - Eliminar un libro
  - Saber si un libro esta disponible o ha sido prestado a un usuario
  - Cambiar el estatus de un libro

También:
  - Seleccionar a quien se ha prestrado el libro o si se ha devuelto
  - Envia un correo al usuario que se le ha prestado el libro

### Herramientas utilizadas

Dillinger uses a number of open source projects to work properly:

* Laravel 5.8.26
* Laravel Telescope
* NPM
* Bootstrap 4
* CSS
* SCSS 
* jQuery
* Bootstrap-datepicker
* Mailtrap

### Instalación

Yo utilizo homestead para trabajar así que dependiendo del entorno de trabajo hay que modificar el archivo .ENV

En mi configuración mis variables de base de datos estan configuradas de la siguiente manera
```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=33060
DB_DATABASE=library
DB_USERNAME=homestead
DB_PASSWORD=
```

Hay que correr las migraciones de la base de datos

```sh
php artisan migrate
```

Luego hay que correr los seeder, aquí cree unos seeders de los usuarios y las categorías así
como una factory para llenar la tabla con 50 libros

```sh
php artisan db:seed
```
Cuando se hace el seed se agregan 2 usuarios por default uno tipo **admin** y otro **user**, solo el admin tiene acceso a la apliación por medio de un middleware. Las credenciales del admin para entrar a la apliación son:
```sh
mail: admin@library.com
pass: test
```
Las credenciales del user son:
```sh
mail: user@library.com
pass: test
```

Tambien utilicé [mailtrap](https://mailtrap.io) para recibir correos, esa configuración esta de la siguente manera, en username y password iría la información personal de quien tenga la cuenta de mailtrap
```sh
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=library@maniak.com
```

Por último hay que compilar los assets
```sh
$ npm run dev
```

### Base de datos

La base de datos se compone de la siguiente manera

Tabla **USERS**

| Campos            | Informacion                     |
| ------------------|---------------------------------|
| id                |                                 |       
| name              |                                 |
| email             |                                 |
| email_verified_at |                                 |
| password          |                                 |
| remember_token    |                                 |
| timestamps        |                                 |
| role_id           | Llave foranea de tabla **roles**|

Tabla **ROLES**

| Campos            | Informacion                    |
| -------------     | ------------------------------ |
| id                |       |
| name              |      |
| remember_token    |      |
| timestamps        |      |

Tabla **CATEGORIES**

| Campos            | Informacion                    |
| -------------     | ------------------------------ |
| id                |       |
| name              |      |
| description             |      |
| timestamps        |      |

Tabla **BOOKS**

| Campos            | Informacion                    |
| -------------     | ------------------------------ |
| id                |       |
| name              |      |
| author             |      |
| publish_date |      |
| timestamps        |      |
| category_id           | Llave foranea de tabla **CATEGORIES**     |
| user_id           | Llave foranea de tabla **USERS**     |



















