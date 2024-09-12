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

## Paquetes extras
- Oh, Vue Icons!
```bash
npm install oh-vue-icons
```

## Ejecutar el proyecto
- Crea y actualiza las tablas en la BD
```bash
php artisan migrate
```

- Crear Ejecutar Seeder de Users
```bash
php artisan db:seed --class=UserSeeder
```

## Documentación del proyecto

Tablas de la BD del Proyecto

1. **`usuarios`**
   - Almacena la información de los usuarios de la biblioteca.

2. **`libros`**
   - Almacena la información de los libros disponibles en la biblioteca.

3. **`prestamos`**
   - Registra los préstamos de libros a los usuarios, incluyendo fechas de préstamo y devolución.

4. **`reservas`**
   - Registra las reservas de libros realizadas por los usuarios.

5. **`devoluciones`**
   - Registra la información sobre la devolución de libros prestados.

6. **`historial_usuarios`**
   - Registra el historial de acciones realizadas por los usuarios, como préstamos, devoluciones, reservas, y más.

7. **`multas`**
   - Registra las multas asociadas a los préstamos de libros, incluyendo monto y estado de pago.

8. **`actividades_usuario_libros`**
   - Registra las actividades relacionadas con los libros realizadas por los usuarios, incluyendo préstamos, reservas y devoluciones.

9. **`estadisticas_uso_libros`**
   - Almacena estadísticas sobre el uso de cada libro, incluyendo cantidad de préstamos, reservas y devoluciones.

10. **`autores`** (opcional, dependiendo si decides gestionar autores de forma separada)
    - Almacena la información de los autores de los libros.

11. **`categorias`** (opcional, dependiendo si decides gestionar categorías de libros)
    - Almacena categorías o géneros de los libros.

    <!-- Tablas No usadas pero se puede Implementar a Futuras Mejoras -->

12. **`editoriales`** (opcional, dependiendo si decides gestionar editoriales de forma separada)
    - Almacena la información de las editoriales de los libros.

13. **`ejemplares`** (opcional, si necesitas gestionar múltiples ejemplares del mismo libro)
    - Registra información sobre los ejemplares específicos de cada libro.

14. **`sucursales`** (opcional, si decides gestionar diferentes sucursales de la biblioteca)
    - Almacena información sobre las sucursales de la biblioteca.

15. **`tipos_multas`** (opcional, si quieres categorizar las multas)
    - Almacena diferentes tipos de multas que pueden aplicarse.

16. **`historico_prestamos`** (opcional, si deseas mantener un histórico detallado de préstamos)
    - Almacena el histórico de préstamos de libros a lo largo del tiempo.

17. **`historico_reservas`** (opcional, si deseas mantener un histórico detallado de reservas)
    - Almacena el histórico de reservas de libros a lo largo del tiempo.

18. **`historico_devoluciones`** (opcional, si deseas mantener un histórico detallado de devoluciones)
    - Almacena el histórico de devoluciones de libros a lo largo del tiempo.

## Uso del API
https://openlibrary.org/developers/api