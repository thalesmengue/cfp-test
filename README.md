# User Management Application

Basically, this chis challenge consists in creating a user management application, where the user can perform basic crud operations,
besides, the application must have an interface to the user. This project has as the main goal to show skills on back end and in front end.

## About the project

- 

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
