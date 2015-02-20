# Entry by Sebwite

Entry is a role package for Laravel5.

## Setup

In the `require` key of `composer` add the following

```
"blackbirddev/entry": "dev-master"
```

The next step is to update/install with composer

```
$ composer update
```

Open up your `config/app.php` file and add this at the end of the `$providers` array:

```
'Blackbirddev\Entry\EntryServiceProvider',
```

In the same file add the facade at the end gof the `$aliases` array:

```
'Entry      => 'Blackbirddev\Entry\EntryFacade',
```

The next step is to add the migration, models, seeds and config files to your project. To do this run this command:

```
$ php artisan vendor:publish --provider="Blackbirddev\Entry\EntryServiceProvider"
```

**Note: This function generates the models but it generate the correct namespace for you. If you changed the default namespace then you need to update the namespace in the Role and Permission model in the app directory.**

---

## Models

### User (App\User.php)

We need to update the user model with a trait. Your model should now look like this:

```
use Blackbird\Entry\Entry\EntryUserTrait;
 
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
 
    use Authenticatable, CanResetPassword, EntryUserTrait;
 
    // Your other stuff
    ...
 
}
```

---

## Middleware

Open up your `app/Http/Kernel.app file and add the package middleware to the `$middleware` array like so:

```
protected $middleware = [
    // ...
    'App\Http\Middleware\VerifyCsrfToken',
    
    'Blackbirddev\Entry\Middleware\CheckPermission',
];
```

You need to do a `composer dump-autoload` to make the middleware available ;)

---

## Database

### Let's get that database ready

We need to make sure that we have all the databases and the data for that. Let's first migrate.

```
$ php artisan migrate
```

---

### Finally some data

We need to seed the database with the new seeder class that is created in the migrations directory

```
$ php artisan db:seed --class=EntryDatabaseSeeder
```

**Note: If you can't run the seed then run `composer dump-autoload` first**





