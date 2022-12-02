# Docker & Compose

## General

All services should be placed in `backend` directory and sub-dir names as friendly `slug service name`.

Each service name must be prefixed with given `service slug name`.

By default `docker-compose.yml` should contain generic definitions that can
be used for production. Dev specific rules should be kept in `docker-compose-{dev|test}.yml`.

Each service must have `/health` endpoint that returns 200 status code and basic environment details.
