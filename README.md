<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>



## Pre-requisitos :pencil:

- PHP : ≥7.2.
- [Composer](https://getcomposer.org/download/).
- [Git](https://git-scm.com/).
  
## Instalación :clipboard:

1. Abrir  la consola de comandos de Git (Windows) o la Terminal en sistemas basados en Unix (Mac o Linux) y posicionare en el directorio raíz.
2. Después Ejecutar el siguiente comando:  
```
git clone https://github.com/Carlosvergara99/ApiRickMorty
```
.
3. Luego debe ingresar a la carpeta del proyecto y ejecutar ejecuta el comando:
```
composer install
```
4. El siguiente paso es copiar el contenido del archivo **.env.example** en un nuevo archivo con el nombre **.env** , para eso debemos situarnos dentro del proyecto y ejecutar el siguiente comando:
 
```
cp .env.example .env

```
5. Generar APP_KEY, Para generar la **APP_KEY** del proyecto ejecuta el siguiente comando: 
```
php artisan key:generate

```

6. para conectar la base datos se recomienda cambiar la siguiente variable de entorno .
 ```
DB_CONNECTION=sqlite
```

8. Para ejecutar la aplicación se recomienda abrir una nueva terminal,situarse dentro del proyecto y ejecutar el siguiente comando:
```
 php artisan serve
```
10.  Para  utilizar los endpois se  recomienda visualiar la siguiente documentacion : https://documenter.getpostman.com/view/12252598/2s9Y5ZuM5T#4067d71b-cd49-4ec7-9abe-1cc30c232200

## License

Carlos Vergara
