# php-ci4-restful-api-jwt-auth

```text

- create project
composer create-project codeigniter4/appstarter php-ci4-restful-api-jwt-auth

- run app
php spark serve

- create table
php spark migrate:create add_client
php spark migrate:create add_user
// editfile in app\Database\Migrations
// run create table
php spark migrate

// create fake data
php spark make:seeder ClientSeeder
// editfile in app\Database\Seeds
php spark db:seed ClientSeeder


// create model
php spark make:model UserModel
php spark make:model ClientModel


```
