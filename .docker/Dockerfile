# Base
FROM robsontenorio/laravel:sideup-php8.5 AS base
COPY --chown=www-data:www-data . .

# Production
FROM base AS production
ENV RUN_DEPLOY=true

