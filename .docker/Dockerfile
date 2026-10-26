# Base
FROM robsontenorio/laravel:sideup-1.1 AS base
COPY --chown=www-data:www-data . .

# Build
FROM base AS build
RUN cp .env.example .env
RUN composer install --prefer-dist --no-interaction --no-progress --quiet --ansi
RUN yarn install --silent && yarn build && yarn cache clean && rm -rf node_modules

# Production
FROM build AS production
ENV RUN_DEPLOY=true

