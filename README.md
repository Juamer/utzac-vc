## Instalación
`cd C:\xampp\htdocs`

`git clone https://github.com/Juamer/utzac-vc`

`cd utzac-vc`

`composer install`

`cp .env.example .env`

`php artisan key:generate`

`mysql -u root < bd.sql`

`php artisan migrate:fresh`

## Actualización
`cd C:\xampp\htdocs\utzac-vc`

`git pull origin master`

`php artisan migrate`
