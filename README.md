# Sistema de Inventario Laboratorio

Este proyecto es un sistema de gestión de inventario para el laboratorio, desarrollado con **Laravel 11**, **Tailwind CSS**, y **PostgreSQL**.

## Requisitos Previos
Para poder descargar y ejecutar este proyecto en tu computadora, necesitas tener instalado:
- [PHP](https://www.php.net/downloads.php) (Versión 8.2 o superior)
- [Composer](https://getcomposer.org/download/)
- [Node.js y npm](https://nodejs.org/)
- [PostgreSQL](https://www.postgresql.org/download/) (Opcional, pero recomendado ya que es la base de datos de producción)
- [Git](https://git-scm.com/downloads)

---

## 🚀 Guía de Instalación para Desarrollo Local

Sigue estos pasos cuidadosamente para poner en marcha el proyecto en tu máquina local.

### 1. Clonar el Repositorio
Abre tu terminal (o consola de Git Bash) y ejecuta el siguiente comando para descargar el código:
```bash
git clone https://github.com/danielagonzalez760-sudo/sistema_inventario_railway.git
cd sistema_inventario_railway
```

### 2. Instalar Dependencias de PHP
Instala las librerías necesarias de Laravel utilizando Composer:
```bash
composer install
```

### 3. Instalar Dependencias de Frontend (Vite, Tailwind)
Instala los paquetes de Node:
```bash
npm install
```

### 4. Configurar el Archivo de Entorno (.env)
Haz una copia del archivo de ejemplo para configurar tus variables de entorno locales:
```bash
cp .env.example .env
```
*(En Windows puedes usar `copy .env.example .env` o simplemente duplicar el archivo manualmente y renombrarlo a `.env`)*.

### 5. Generar la Clave de la Aplicación
Genera la llave de seguridad de Laravel:
```bash
php artisan key:generate
```

### 6. Configurar la Base de Datos
Abre el archivo `.env` en tu editor de código y busca la sección de base de datos. Configúrala con tus credenciales locales.

Si usas **PostgreSQL** (Recomendado):
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario_postgres
DB_PASSWORD=tu_contraseña_postgres
```

Si decides usar **MySQL** localmente para pruebas rápidas, cámbialo a:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=root
DB_PASSWORD=
```
*(Asegúrate de haber creado la base de datos vacía en tu gestor, como pgAdmin o phpMyAdmin, antes del siguiente paso).*

### 7. Ejecutar las Migraciones
Crea las tablas en la base de datos:
```bash
php artisan migrate
```
*(Opcionalmente, si el proyecto tiene seeders con datos iniciales, puedes usar `php artisan migrate --seed`)*.

### 8. Compilar los Estilos y Arrancar el Servidor

Para trabajar en el proyecto, necesitas ejecutar **dos comandos** en terminales separadas.

**Terminal 1 (Para compilar Tailwind y Vite en tiempo real):**
```bash
npm run dev
```

**Terminal 2 (Para arrancar el servidor de PHP/Laravel):**
```bash
php artisan serve
```

### 9. ¡Listo!
Abre tu navegador web e ingresa a:
👉 **[http://localhost:8000](http://localhost:8000)**

---

## Notas Adicionales para el Desarrollador
- **Diseño (Tailwind):** Cada vez que hagas un cambio en los estilos o vistas Blade, asegúrate de tener `npm run dev` corriendo para que los cambios se reflejen de inmediato.
- **Despliegue:** El proyecto está configurado con Docker y un `start.sh` para su despliegue automático en Railway. No debes modificar el `Dockerfile` a menos que sea estrictamente necesario para la infraestructura.

---

## 📧 Configuración de Correos (Alertas)
Para que el sistema de alertas por correo electrónico funcione localmente, te recomendamos usar **Mailtrap**.
1. Crea una cuenta gratuita en [Mailtrap](https://mailtrap.io).
2. Crea un "Inbox" en "Email Testing".
3. Ve a tu archivo `.env` y reemplaza las variables `MAIL_*` con las credenciales SMTP que te proporciona Mailtrap:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario_de_mailtrap
MAIL_PASSWORD=tu_contraseña_de_mailtrap
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="admin@laboratorio.com"
MAIL_FROM_NAME="Sistema de Inventario"
```
Una vez configurado, las alertas a los administradores (nuevo stock, stock bajo, nueva reserva) llegarán a la bandeja de pruebas de tu Mailtrap local.

---

## 🗄️ Documentación de Base de Datos (SQLDoc / SchemaSpy)
Hemos integrado **SchemaSpy** vía Docker para generar diagramas automáticos de la base de datos PostgreSQL.
Para generarlos:
1. Asegúrate de tener los contenedores de Docker en ejecución (especialmente la base de datos `db`).
2. En tu terminal (desde la raíz del proyecto) ejecuta el script de generación:
```bash
./docker/generate-sqldoc.sh
```
3. Una vez finalizado, puedes abrir el archivo `public/sqldoc/index.html` en tu navegador para ver la documentación interactiva de tus tablas, columnas y relaciones.
