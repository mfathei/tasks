# Tasks app

## How to run
We use docker and [Laravel Sail](https://laravel.com/docs/10.x/sail) to run this application

You need to make sure you have Docker and Docker compose installed on your system

You may install the application's dependencies by navigating to the application's directory and executing the following command

```
cp .env.example .env && docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Now you can run the application and start development

```./vendor/bin/sail  up```

For the first run only you will need to migrate database

``` ./vendor/bin/sail artisan migrate --seed```

As we use Queues in Laravel you will need to run this command and keep it running

``` ./vendor/bin/sail artisan queue:work ```

Now open the application in your browser by following this link: http://localhost:8088

Of course you can change ports for your application to run on your machine

To do this change ports in `# sail` section in `.env` file

In development stage run this command :
```./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev ```
This will compile your assets and auto reload your page.
