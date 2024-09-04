# Librería Digital
>

## Tecnologías Usadas
- [Laravel](https://laravel.com/docs/11.x/installation)
- [Vue](https://vuejs.org/guide/introduction.html)
- [Inertia](https://inertiajs.com/server-side-setup)
- [Tailwind CSS](https://tailwindcss.com/docs/installation)
- [Oracle Database](https://docs.oracle.com/en/cloud/paas/base-database/index.html)



## Creación del proyecto
1. Creación del Proyecto
```bash
composer create-project laravel/laravel:^10 name-project
```

2. Instalación de Larastarte & Inertia
```bash
composer require laraveldaily/larastarters --dev
```

3. Configuración de Larastarte
```bash
php artisan larastarters:install
```

Elija su kit de inicio y tema de diseño preferidos.
![options](https://camo.githubusercontent.com/6d2cf72816ff06dd6f0a657783357ad2da9cdf6c1c467debaff4fe681f0a077a/68747470733a2f2f6c61726176656c6461696c792e636f6d2f75706c6f6164732f323032332f30322f3232303331343331332d64333035353035312d333939372d343237642d393864662d3862633762626433346464372e706e67)
- **En 1° la opción:** ``1. Laravel Breeze & Inertia (Tailwind)``
- **En 2° la opción:** ``0. windmill``

4.  Instalación del paquete yajra/laravel-oci8
```bash
composer require yajra/laravel-datatables-oracle:"^10"
```

4. publicar los ajustes de configuración: 
```bash
php artisan vendor:publish --tag=oracle
```

5. Configuración de .env
```bash
DB_CONNECTION=oracle
DB_HOST=127.0.0.1
DB_PORT=1521
DB_DATABASE=ORCL
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

6. Configurar config/database.php
```bash
'oracle' => [
    'driver'         => 'oracle',
    'tns'            => env('DB_TNS', ''),
    'host'           => env('DB_HOST', '127.0.0.1'),
    'port'           => env('DB_PORT', '1521'),
    'database'       => env('DB_DATABASE', 'ORCL'),
    'username'       => env('DB_USERNAME', 'tu_usuario'),
    'password'       => env('DB_PASSWORD', 'tu_contraseña'),
    'charset'        => env('DB_CHARSET', 'AL32UTF8'),
    'prefix'         => '',
    'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
    'edition'        => env('DB_EDITION', 'ora$base'),
    'server_version' => env('DB_SERVER_VERSION', '19c'),
],
```

7. Probar la conexión
```bash
php artisan migrate
```

## Ejecutar el proyecto