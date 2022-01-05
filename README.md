# Industry Arts Programming Challenge

Prepared in response to a confidential challenge prompt.

### Getting Started
1. Clone this repo into any directory and enter the directory
2. `composer install`
3. `touch database/database.sqlite`
4. Run `php artisan migrate` to setup the database (this challenge uses sqlite)
5. Run `php artisan serve` to run a test instance of the app.

## Tests
1. `./vendor/bin/phpunit`

## Usage
1. Simply visit http://127.0.0.1:8000/ and use the web interface.
2. Otherwise go ahead and use the JSON API at http://127.0.0.1/difference/$n where $n is an integer from 1 to 100

#### Put Together By Henry Paradiz <henry.paradiz@gmail.com>
