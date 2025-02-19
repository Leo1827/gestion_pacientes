# 🏥 Sistema de Gestión de Pacientes

Un sistema web desarrollado en **Laravel** para la administración eficiente de pacientes. Implementa una interfaz moderna, autenticación personalizada y funcionalidades avanzadas como AJAX y SweetAlert.

---

## 🚀 Tecnologías Utilizadas

- **Laravel** - Framework PHP para el backend.
- **MySQL** - Base de datos para almacenar la información.
- **Tailwind CSS** - Diseño moderno y responsive.
- **JavaScript & AJAX** - Interactividad en la gestión de pacientes.
- **SweetAlert** - Alertas atractivas para confirmaciones.

---

## ⚙️ Funcionalidades

✅ **Autenticación personalizada** - Inicio de sesión con documento y clave, sin librerías externas.  
✅ **Gestión de Pacientes (CRUD)** - Crear, leer, actualizar y eliminar pacientes.  
✅ **AJAX en formulario de pacientes** - Carga dinámica de municipios según el departamento.  
✅ **Middleware** - Control de accesos para **Administrador** y **Usuario normal**.  
✅ **Alerta en eliminación** - Confirmación con SweetAlert.  
✅ **Diseño responsivo** - Adaptado a dispositivos móviles con Tailwind.  

---

## 🗄️ Base de Datos (MySQL)

| Tabla               | Campos principales |
|---------------------|-------------------|
| **departamentos**   | `id`, `nombre` |
| **municipios**      | `id`, `departamento_id`, `nombre` |
| **tipos_documento** | `id`, `nombre` |
| **genero**          | `id`, `nombre` |
| **paciente**        | `id`, `tipo_documento_id`, `numero_documento`, `nombre1`, `apellido1`, `genero`, `departamento_id`, `municipio_id` |
| **imagenes_paciente** | `id`, `nombre_imagen`, `paciente_id`, `created_at` |


## Los datos de prueba incluyen:

Departamentos: 5 registros.
Municipios: 2 por cada departamento.
Tipos de documento: 2 registros.
Usuarios: usuario: 12345678 - contraseña 1234567890.
Pacientes: 5 registros de prueba.

---

## 🌱 Seeders (Datos de prueba)

Para poblar la base de datos, ejecuta:

```bash
php artisan db:(Nombre_del_seeder)


🔑 Instalación y Configuración
1️⃣ Clona el repositorio:

git clone https://github.com/tuusuario/sistema-pacientes.git
cd sistema-pacientes


2️⃣ Instala dependencias:

composer install
npm install

3️⃣ Configura el archivo .env y genera la clave:

cp .env.example .env
php artisan key:generate

4️⃣ Ejecuta las migraciones y seeders:


php artisan migrate --seed

5️⃣ Inicia el servidor:


php artisan serve