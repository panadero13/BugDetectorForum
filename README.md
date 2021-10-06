# Descripción de la aplicación

_Si ocurriese algun error con el código pruebe a descargarlo en el servidor de Github:_
https://github.com/panadero13/BugDetectorForum.git

Esta *Aplicacion de Deteccion de Bugs* está diseñada para funcionar en modo servidor, como cualquier 
Aplicación Web. Los usuarios pueden ver las *Instancias* o *Bugs* aun sin haberse registrado en la
App, aún así no serán capaces de ver las *respuestas* a esas Instancias sin haberse registrado,
Además de tampoco poder crear ellos mismos las suyas.

La *Barra de Navegación* tiene todos los links útiles que se necesitan para navegar por la Aplicación.
De izquierda a derecha: 
- Ver Instancias segun su estado: (Debes estar registrado)
    - Pendiente
    - Solucionada
    - Wontfix
- Ver Instancias segun su tipo: (Debes estar registrado)
    - Urgente
    - Media
    - Leve
    - Mejora
- Ver todas las Instancias
- Ver los Usuarios (Administrador)
- Login/Register (No logueado)
- Nombre de Usuario:
    - Logout

# Puesta en marcha

Se deberá tener en cuenta que esta aplicación funciona con un sistema de base de datos *MySQL*, que actua con permisos *root* en una base de datos que deberá llamarse *BugDetectorForum*.

Para instalar todas las dependencias necesarias para que esta aplicación funcione se deberá escribir en el terminal:
- *npm install && npm run dev*
- *composer install*
- *php artisan key:generate*
- *php artisan migrate:fresh --seed* 
- *php artisan serve*