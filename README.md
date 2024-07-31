# Prueba Tecnica para Dropea

Aclaración:
Me tomé la libertad de modificar la API que se consume, ya que la api que estaba en un princio estaba dando errores y no traía los datos, la api usada en este caso es https://fakestoreapi.com/products/ 

Las categorias para buscar son (se pueden colocar en la url /api/{categoria}):

men's clothing
electronics
women's clothing
jewelery

----------------------------------------------------------

## Instalación
1. Clonar el repositorio

2. Instalar dependencias:
```bash
composer install
```

3. Configurar el archivo .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_la_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

4. Ejecutar migraciones:
```bash
php artisan migrate
```

Testing:
```bash
php artisan migrate --env=testing
```

5. Ejecutar seeders:
```bash
php artisan db:seed --class=CategorySeeder
```

Uso
6. Ejecutar el comando para obtener y almacenar productos desde la API:

```bash
php artisan fetch:products
```

Pruebas
7. Para ejecutar las pruebas unitarias:

```bash
php artisan test --env=testing
```