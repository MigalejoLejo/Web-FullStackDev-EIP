


## Antes de empezar

1 - Hay que iniciar mysql.

para esto, desde el root del proyecto usando un terminal, llamar:

```$ Docker-Compose up```

esto levantará un contenedor con mysql con la configuración necesaria y creará una base de datos: 'libreria'

déspues se debe ejecutar el comando:

```$ php artisan migrate```

para migrar las tablas

y 

```$ php artisan serve```

para iniciar el servidor del proyecto.

