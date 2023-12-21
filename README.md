# User Management Application

Basically, this chis challenge consists in creating a user management application, where the user can perform basic crud operations,
besides, the application must have an interface to the user. This project has as the main goal to show skills on back end and in front end.

## About the project

- The project has docker, which makes it easier to run the application, besides, the containerization counts with PHP-FPM and NGINX, which makes the application faster and more secure.
- Web routes and api routes are covered by tests with PHPUnit, to ensure that the application is working as expected.
- The application has a simple interface, where the user can perform the basic crud operations. Besides the interface, the application has also an api, where the user can perform the same operations and be easily implemented on a client side.
- The application has an architecture that focus on the separation of concerns and dependency injection, which makes the application more scalable and maintainable.
- The code has followed the best practices of the PHP language, such as PSR-12, which makes the code more readable and standardized.
- Commits where made following the conventional commits pattern, this way making the commit history more understandable and increasing readability.

### How to run the project
```bash
# clone this repo
git clone git@github.com:thalesmengue/cfp-test.git
```

```bash
# enter the project folder
cd cfp-test
```

```bash
# copy the .env file
cp .env.example .env
```

```bash
# build the docker containeres
docker-compose up --build -d
```

```bash
# install the dependencies
docker exec app_php composer install
```

```bash
# install node packages
docker exec app_php npm i
```

```bash
# build the application assets
docker exec app_php npm run build
```

```bash
# run the migrations
docker exec app_php php artisan migrate --seed
```

After these steps above, your application must be served on ```localhost:8000```.

### Tests
To run the application feature tests, you must run the command below:

```bash
 docker exec app_php php artisan test
```

### Technologies
- [Laravel 10](https://laravel.com/docs/10.x/installation)
- [PHP 8.2](https://www.php.net/)
- [Docker](https://docs.docker.com/get-started/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Jquery Datatables](https://datatables.net/)
- [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)
