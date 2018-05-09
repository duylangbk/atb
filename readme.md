
# Basic JWT authentication app

## Requirement
Requires PHP 7.1 or higher

- `composer install`
- `cp .env.example .env` # if .env does not exist
- The application would be tested immediately without configuring database, update with your expectation if you want to use any database other than sqlite.
- `php aritsan migrate`
- `php artisan db:seed`
- Then there are 5 dummy users:
    + email: [1-5]dummy@gmail.com
    + password: secret
- `php artisan serve`
## Exposed apis
Can use a tool like Postman to test or by command line by using cUrl
- Sample of request headers
    + Accept:application/json
    + Authorization:Bearer token_string
- `POST http://127.0.0.1:8000/api/auth/login`
    + email
    + password
- `GET http://127.0.0.1:8000/api/auth/logout`
- `GET http://127.0.0.1:8000/api/user/me`
- `POST http://127.0.0.1:8000/api/user/update`
    + name
    + tel
    + address

