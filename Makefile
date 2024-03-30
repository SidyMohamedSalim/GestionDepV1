setup:
	@make build
	@make up
	@make composer-update
	@make data

build:
	docker-compose build --no-cache --force-rm

stop:
	docker-compose stop

up:
	docker-compose up -d

composer-update:
	docker exec web bash -c "composer update"

data:
	docker exec web bash -c "php artisan migrate"
