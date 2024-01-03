# User Management Application

My challenge consists of creating a user management application where the user can perform basic operations, and the application must have an interface to the user. The main goal of this project is to show back-end and front-end skills.


## About the project

- The project includes Docker, which makes the application easier to run, and containerization with PHP-FPM and NGINX, which makes the application faster and more secure
- Web routes and API routes are covered by testing with PHPUnit to ensure that the application works as expected.
- The application has a simple interface where the user can perform the basic operations. Besides the interface, the application also has an API where the user can perform the same operations and be easily implemented on a client side.
- The application has an architecture that focuses on separation of concerns and dependency injection, making the application more scalable and maintainable.
- The code follows the best practices of the PHP language, such as PSR-12, which makes the code more readable and standardized.
- Commits have been made following the conventional commit pattern, which makes the commit history more understandable and readable.

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
