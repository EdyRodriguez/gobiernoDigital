# Nombre del Proyecto

## Desarrollado por: Edgar Fernando Rodriguez Rangel

Este proyecto es un sistema de gestión de usuarios con autenticación JWT, que incluye funcionalidades de CRUD para usuarios con diferentes roles (administrador y usuario común).

### Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- PHP >= 7.3
- Composer
- MySQL o MariaDB
- Laravel

### Instrucciones para Desplegar el Sistema

1. **Clonar el Repositorio**

2. **Instalar Dependencias**
Dentro del directorio del proyecto, ejecuta:

3. **Configuración de Entorno**
Copia el archivo `.env.example` a `.env` y ajusta las variables de entorno, especialmente las relacionadas con la base de datos:

4. **Generar Clave de Aplicación**

5. **Migraciones y Seeders**
Para crear las tablas en tu base de datos y poblarlas con datos iniciales, ejecuta:

6. **Generar Clave Secreta JWT**

7. **Servidor de Desarrollo**
Para iniciar el servidor de desarrollo:
    ```bash php artisan serve```
Ahora puedes acceder al proyecto en `http://localhost:8000`.

### Observaciones Generales

- **Opiniones**: Este proyecto fue un reto interesante que me permitió profundizar en el uso de Laravel y la autenticación JWT. Me enfrenté a problemas específicos como la gestión de roles y permisos que fueron un gran aprendizaje.

- **Mejoras Futuras**: Algunas mejoras que consideraría serían la implementación de tests automatizados para asegurar la calidad del código, mejorar la documentación interna del código, implementar mejor calidad en los endpoint, mejorar la seguridad del sistema,
agregar CI/CD para automatizar el despliegue y la integración de herramientas de monitoreo y análisis de rendimiento.

- **Autocrítica**: Aunque el proyecto cumple con los requisitos básicos, reconozco que siempre hay espacio para mejorar, especialmente en la optimización del código y en la seguridad del sistema para proteger los datos de los usuarios,
hubo problemas con la implementación de roles y permisos, y al final trate de dockerizar el proyecto pero no por errores dentro de la comunicacion del proyecto con la base de datos no logre hacerlo funcionar de manera correcta.

### Licencia

Especifica aquí la licencia bajo la cual has liberado el proyecto, si aplica.

---

Gracias por revisar este proyecto. Para cualquier consulta o colaboración, no dudes en contactarme.
