Перед запуском веб-приложения требуется
1. Внести кореектировки в файл .env

2. Выполнить следующие команды:

php artisan storage:link
php artisan config:clear
php artisan cache:clear
php artisan migrate
php artisan db:seed