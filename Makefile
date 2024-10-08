init-project: docker-down-clear docker-pull docker-build docker-up composer-install migrate-app fixtures-load tailwind

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build

docker-up:
	docker compose up -d

composer-install:
	docker compose run --rm php-cli composer install

migrate: wait-db migrate-app

wait-db:
	until docker compose exec -T postgres pg_isready --timeout=0 --dbname=soft-catalog ; do sleep 1 ; done

migrate-app:
	docker compose exec php-cli ./bin/console doctrine:migrations:migrate --no-interaction

tailwind:
	docker compose exec php-cli ./bin/console tailwind:build -w

fixtures-load:
	docker compose exec php-cli ./bin/console doctrine:fixtures:load -n
