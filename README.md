# Slim PHP Framework Skeleton Project

## Dependencies:
* Monolog
* Eloquent
* Kint
* Dotenv

## Config
Create .env file with db parameters
```bash
DB_DRIVER=mysql
DB_HOST=localhost
DB_NAME=database_name
DB_USER=user_name
DB_PASS=pass_name
DB_CHARSET=utf8
DB_COLLATION=utf8_unicode_ci
DB_PREFIX=###
```

## Run
```bash
php -S localhost:8888 -t ./src/public
```
