#### Запуск окружения и проекта.

```bash
composer install

cp env.example .env

./vendor/bin/sail up -d

./vendor/bin/sail artisan migrate

./vendor/bin/sail artisan db:seed
```
