build:
	docker-compose build
composer-install:
	docker-compose run --rm php-cli composer install
generate:
	docker-compose run --rm php-cli php artisan key:generate
migrate:
	docker-compose run --rm php-cli php artisan migrate
user:
	docker-compose run --rm php-cli php artisan make:user
sync:
	docker-compose run --rm php-cli php artisan sync:flavors