#!/usr/bin/zsh

echo '------ Starting deploy tasks  ------'

cp .env.example .env
composer install --prefer-dist --no-interaction --no-progress --ansi

php artisan config:cache
php artisan view:cache
php artisan route:cache

# TODO: remove "fresh"
php artisan migrate:fresh --force --seed

echo '------ Deploy completed ------'