# Entry by Sebwite

Entry is a role package for Laravel5.

## Setup

### Required setup

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
In the same file add the facade at the end of the `$aliases` array:
```
'Entry      => 'Blackbirddev\Entry\EntryFacade',
```
The next step is to add add the migration, seeds and config files to your project. To do this run this command:
```
$ php artisan vendor:publish --provider="Blackbirddev\Entry\EntryServiceProvider"
```
**Note: If you only want the migrations, seeds or config files then you can use the tag for that! For example:**
```
$ php artisan vendor:publish --provider="Blackbirddev\Entry\EntryServiceProvider" --tag="config"
```
---
### Let's get that database ready

We need to make sure that we have all the databases and the data for that. Let's first migrate.
```
$ php artisan migrate
```
---
### Finally some data

As you can see in your `app/database/seeds` folder there is a new database seeder. We need to add this to the standard DatabaseSeeder class
```
class DatabaseSeeder {

    public function run()
    {
        Model::unguard();

        // Your migrations

        $this->call('EntryDatabaseSeeder');
    }

}
```
Now we have done that we need to generate the new class loader
```
$ composer dump-autoload
```
Now we can seed the database
```
$ php artisan db:seed
```
**Note: You can also only run the created seeder class by the package:**
```
$ php artisan db:seed --class=EntryDatabaseSeeder
```
---





