
```sh
composer require laravel/breeze --dev
php artisan breeze:install livewire

composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
# php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
# php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
php artisan migrate

# php artisan make:migration create_transactions_table
php artisan make:livewire TransactionForm
composer require maatwebsite/excel
php artisan make:model Transaction -m
php artisan make:seeder RoleSeeder


composer install
touch database/database.sqlite

npm install
npm run dev

php artisan migrate
php artisan db:seed
php artisan db:seed --class=RoleSeeder

php artisan serve
phpunit
```
