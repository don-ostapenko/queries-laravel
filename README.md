## About application

This is a simple app, that include queries to database based on query-builder from Laravel 6. Also this app has got some features. It is wrap in Bootstrap 4.

Steps of deployment

- Clone the project.
- Run `docker-compose up -d` in root project.
- Run `docker-compose run --rm php composer install`.
- Run `docker-compose run --rm php php artisan migrate --seed` in a container.
