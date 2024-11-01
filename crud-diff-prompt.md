# Prompt para Tutorial de Laravel Blade y Tailwind CSS

## Contexto
Como experto en Laravel, Blade y Tailwind CSS, crea un tutorial paso a paso para principiantes sobre la programación de un CRUD de actividades. Basa tus explicaciones y ejemplos en los códigos fuentes que tienes en el proyecto.

## Algunas explicaciones al inicio
1. Comando artisan utilizados
	- Explicación del comando `php artisan make:model Activity -a` que crea las clases de: modelo, controlador, factory, seeder, form requests, y policy.
	- Explicaciones de los comandos artisan para crear las vistas vacías del crud:
		- `php artisan make:view activities.create`
		- `php artisan make:view activities.show`
		- `php artisan make:view activities.index`
		- `php artisan make:view activities.edit`
2. Instalación del paquete Intervention de Laravel para crear y manejar imágenes.

```bash
composer require intervention/image-laravel
```
Explica para qué es necesario ese paquete puesto que la información de imágenes se almacenará en formato base64 en la misma tabla de actividades. También explica la configuración necesaria en el archivo `c:\xampp\php\php.ini` para habilitar la extensión `gd`.

## Incluye en tu tutorial los siguientes códigos tomados del código fuente del proyecto:
1. Código de la migración de la tabla de actividades.
2. Código del modelo de actividades: Activity.
3. Código del controlador de actividades: ActivityController. Explica especialmente el método `store()` que se encarga de guardar la imagen en la base de datos en formato base64.
```php
public function store(StoreActivityRequest $request)
    {
        $file = $request->file('image');
        $contents = file_get_contents($file);
        $base64Image = base64_encode($contents);
        $validated = $request->validated();
        $validated['image'] = $base64Image;
        Activity::create($validated);
        return redirect()->route('activities.index');
    }
```
4. Código de la clase de sembrado de actividades: ActivitySeeder.
5. Código de la clase de fábrica de actividades: ActivityFactory. Explica la función de esta clase. Explica el método downloadImage() que se utiliza para descargar imágenes de internet, especialmente de la página [picsum.photos](https://picsum.photos/). Y explica cómo convertir la imagen descargada a base64. También explica la condición por la que debería crear una imagen de relleno si no se puede descargar la imagen de internet.
6. Código de la vista de creación de actividades: activities/create.blade.php.
7. Código de la vista de edición de actividades: activities/edit.blade.php. Explica cómo mostrar la imagen de la actividad en la vista de edición, dado que la imagen se almacena en la base de datos en formato base64.
8. Código de la vista de listado de actividades: activities/index.blade.php.
9. Código de la vista de detalle de actividades: activities/show.blade.php. Explica cómo mostrar la imagen de la actividad en la vista de detalle, dado que la imagen se almacena en la base de datos en formato base64.
10. El código de la política de actividades: ActivityPolicy. Explica la función de esta clase. Y explica cómo se utiliza en el controlador de actividades.
11. El código de la clase StoreActivityRequest. Explica la función de esta clase. Y explica cómo se utiliza en el controlador de actividades.
12. El código de la clase UpdateActivityRequest. Explica la función de esta clase. Y explica cómo se utiliza en el controlador de actividades.

## Requerimientos
Haz las explicaciones de cada paso de forma clara y concisa. Utiliza ejemplos prácticos y sencillos para que los principiantes puedan seguir tu tutorial sin problemas.
Incluye imágenes de los resultados obtenidos en cada paso del tutorial. Puedes utilizar capturas de pantalla o imágenes de los códigos fuente. También puedes incluir gifs animados para mostrar la funcionalidad de las vistas.
También intercala en tu tutorial algunos tips y buenas prácticas que los principiantes deben tener en cuenta al programar un CRUD en Laravel.