# NMT Laravel Plus Base Project

Starter Project for students at North Metropolitan TAFE

Contains:

- Laravel 9,
- MongoDB,
- MariaDB, - *we use MariaDB to replace MySQL for our work at NMT*
- Minio,
- Selenium,
- Redis,
- Memcached,
- MailHog,
- Mongo-Express.

# Installation

1) Create your own project as normal, replacing `example-app`
   with the name of your application.
    - `curl -s https://laravel.build/example-app?with=mariadb,redis,minio,mailhog,memcached,meilisearch,selenium | bash`
2) Perform `sail up` to run the base application
3) Run the command: `sail artisan vendor:publish --tag=sail-docker`
4) Perform `sail down` (or use `CTRL`+`C`) to stop the container
5) Replace the existing `docker-compose.yaml` with the one from this
   project.
6) Replace the existing `docker/8.1/Dockerfile` with the one from your
   project.
7) Perform `sail up` to re-run the application. It should now have
   mongodb and mongo-express running as part of the development
   environment.

# Additional Laravel Packages

- Laravel Breeze (laravel/breeze)
- Jensseger's MongoDB: (jenssegers/mongodb)
- Laravel Debugbar (barryvdh/laravel-debugbar)

Install these using the following:

```shell
sail composer require laravel/breeze
sail composer require jenssegers/mongodb
sail composer require --dev barryvdh/laravel-debugbar
```

Install as required:

```shell
sail artisan breeze:install
```

Run the mix watcher:

```shell
sail npm install && sail npm run watch
```

## Publish package configurations

Each publication of a package configuration is optional. It will be
dependent on your project's requirements.

```shell
sail artisan vendor:publish --tag=ignition-config 
sail artisan vendor:publish --tag=laravel-errors  
sail artisan vendor:publish --tag=laravel-mail
sail artisan vendor:publish --tag=laravel-notifications  
sail artisan vendor:publish --tag=laravel-pagination
sail artisan vendor:publish --tag=sail-docker
sail artisan vendor:publish --tag=sanctum-config 
sail artisan vendor:publish --tag=sanctum-migrations
```

Run the following commands:

```shell

  ```

## Browsers Sync for Development

Run the command:

```shell
sail artisan sail:publish
```

Add the following lines to `webpack.config.json`:

```js
mix.browserSync({
    proxy: 'localhost',
    open: false,
});
```

Modify the docker-compose.yaml file and add `- 3000:3000` as shown below:

```yaml
        ports:
            - '${APP_PORT:-80}:80'
            - '${HMR_PORT:-8080}:8080'
            - 3000:3000
```

> Note - this is already done for you in the docker-compose file in this project.

Perform a sail restart:

```shell
sail restart
```

In your second CLI re-run Mix:

```shell
 sail npm install && sail npm install && sail npm run watch-poll
```

Open browser to `http://localhost:3000` to have the browser sync to the development.

> Tip found at https://blog.devgenius.io/quick-tip-laravel-mix-hot-reloading-in-sail-with-browsersync-555b6c97bca3

# Users

The users are built in, but a few changes are made to make use of
the MongoDB connections.

Add Timezone to User migrations and model.

```shell
sail artisan make:migration ModifyUserAddTimeZone
```

The new migration will contain:

```PHP
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('timezone', 64)->nullable()->default('Australia/Perth');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('timezone',);
        });
    }
```

## Data Seeders

```shell
sail artisan make:seeder UsersSeeder 
```

The `database/seeders/UserSeeder.php` file contains a number of demo
users for use in testing and development. Feel free to copy this
over the newly added UserSeeder file.

Remember to add the UserSeeder call to the DatabaseSeeder class.

# Cars Model/Migration/etc

```shell
 sail artisan make:model Car -a -r
```

# Collectors Model/Migration/etc

```shell
 sail artisan make:model Collector -a -r
```

The Collectors are given as an example of using MongoDB for CRUD etc.

