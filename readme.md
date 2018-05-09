
# Basic JWT authentication app

## Requirement
Requires PHP 7.1 or higher

- `composer install`
- `cp .env.example .env` # if .env does not exist
- add db configuration
- `php aritsan migrate`
- `php artisan db:seed`
- each seeder command execution inserts one account with a random email + password='secret' 

## Exposed apis
Can use a tool like Postman to test or by command line by using cUrl
- Sample request headers
    + Accept:application/json
    +  Authorization:Bearer token_string
- `POST http://127.0.0.1:8000/api/auth/login`
    + email
    + password
- `GET http://127.0.0.1:8000/api/auth/me`
- `POST http://127.0.0.1:8000/api/auth/update`
    + name
    + tel
    + address

