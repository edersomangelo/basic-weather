
DOCKERCOMPOSE=docker-compose -f docker-compose.yml

vendor:
	$(DOCKERCOMPOSE) run --rm app composer install

update:
	$(DOCKERCOMPOSE) run --rm app composer update
