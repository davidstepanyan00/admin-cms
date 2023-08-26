#Запустить проект
init: down rebuild create-env composer-install db-fresh db-seed passport-install

up:
	docker-compose -f docker-compose.yml up -d
down:
	docker-compose -f docker-compose.yml down
rebuild:
	docker-compose -f docker-compose.yml up -d --build
composer-install:
	docker exec -t cms-admin-api-php composer install
create-env:
	docker exec -t cms-admin-api-php cp .env.example .env
config-clear:
	docker exec -t cms-admin-api-php php artisan config:clear
db-fresh:
	docker exec -t cms-admin-api-php php artisan migrate:fresh
db-seed:
	docker exec -t cms-admin-api-php php artisan db:seed
passport-install:
	docker exec -t cms-admin-api-php php artisan passport:install
