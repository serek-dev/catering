GATE := docker-compose -f docker/gateway/docker-compose.yml -f docker/gateway/docker-compose-dev.yml
DC := $(GATE)

start: gateway_build

gateway_build:
	$(DC) up --build --force-recreate -d

stop:
	$(DC) down --remove-orphans -v
	docker network prune -f
