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
- Vue Icons - Kalimahapps
```bash
npm install @kalimahapps/vue-icons
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

## Detalles en proceso que faltan
- Pasar el form de reserva y préstamo a un modal
- agregar alert de confirmación en los procesos de registro de form
- Referenciar los libros del API con el id de los libros de Prestamos y reserva para la BD
- Configurar menu que las opciones se muestren según el rol

## Mejoras Futuras del proyecto
1. **Generación de informes y estadísticas:**
    - Implementar un módulo para generar informes sobre el uso de los libros (préstamos, libros más populares, etc.).
    - Configurar la visualización de estos informes en el panel administrativo.

2. **Gestión del catálogo de libros por administradores:**
    - Implementar funcionalidades CRUD para que los administradores puedan agregar, editar y eliminar libros del catálogo.
    - Añadir la capacidad de cargar portadas de libros de manera manual si no están disponibles en la API.

# Pasos para instalar y ejecutar el proyecto en Local

📌 **Antes de comenzar, asegúrate de tener instalados:**  
- **PHP 8.2 o superior** (requerido para Laravel 11).  
- **Composer** (para instalar dependencias de Laravel).  
- **Node.js & npm** (para Vue 3, Inertia y Tailwind CSS).  
- **Oracle Database** (puede ser **Oracle 19c, 21c, etc.**).  
- **Oracle Instant Client** (para conectar Laravel con Oracle).  

### 🔹 **1. Instalar dependencias de Laravel**
Ejecuta:  
```sh
composer install
```

---

### 🔹 **2. Configurar el archivo `.env` para Oracle**
Copia el archivo de configuración:  
```sh
cp .env.example .env
```
Luego, abre **`.env`** y configura la conexión con Oracle:  
```ini
DB_CONNECTION=oracle
DB_HOST=127.0.0.1
DB_PORT=1521
DB_DATABASE=ORCL # Cambia según tu servicio de Oracle
DB_USERNAME=LIBRERIA
DB_PASSWORD=LB2024
```
Si Oracle está en otro servidor, cambia **`DB_HOST`** a la IP correcta.  

---

### 🔹 **3. Generar la clave de la aplicación**
```bash
php artisan key:generate
```
Esto generará la clave de seguridad en el ``.env``.


### 🔹 **4. Instalar el driver de Oracle para Laravel**
Ejecuta:  
```sh
composer require yajra/laravel-oci8
```
Este paquete (`yajra/laravel-oci8`) es el **driver oficial para conectar Laravel con Oracle**.  

Después, **ejecuta el siguiente comando para publicar la configuración**:  
```sh
php artisan vendor:publish --tag=oracle
```
Esto generará un archivo de configuración en `config/oracle.php`.  

---

### 🔹 **5. Instalar dependencias de Vue, Inertia y Tailwind**
Ejecuta:  
```sh
npm install
```
Si hay errores, intenta limpiar la caché:  
```sh
rm -rf node_modules package-lock.json && npm install
```

---

### 🔹 **6. Compilar assets de Vue y Tailwind**
```sh
npm run dev
```
Para producción:  
```sh
npm run build
```

---

### 🔹 **7. Ejecutar migraciones en Oracle**
Si el proyecto usa migraciones, ejecútalas con:  
```sh
php artisan migrate
```
Si hay errores, revisa que la conexión con Oracle esté funcionando correctamente.  

Si Oracle no permite migraciones automáticas, **puedes exportar/importar el esquema manualmente** usando herramientas como **SQL Developer o Data Pump**.  

---

### 🔹 **8. Iniciar el servidor de Laravel**
Ejecuta:  
```sh
php artisan serve
```
🔗 **Accede en:** `http://127.0.0.1:8000`  


# Preview
### Landing Page
![preview](/public/images/preview/preview1.gif)

### Landing Page
![preview](/public/images/preview/page-1.jpeg)

### Landing Page Dark
![preview](/public/images/preview/page-2.jpeg)

### Libros por géneros
![preview](/public/images/preview/preview2.jpeg)

### Book Info
![preview](/public/images/preview/preview3.jpeg)

### Form de Reserva y Préstamo
![preview](/public/images/preview/preview4.png)

### Registro
![preview](/public/images/preview/preview5.jpeg)

### Login
![preview](/public/images/preview/preview6.jpeg)

### Dashboard
![preview](/public/images/preview/preview7.jpeg)