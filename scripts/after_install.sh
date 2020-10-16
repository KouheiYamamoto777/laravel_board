#!/bin/bash

set -eux

cd ~/laravel_board
php artisan migrate --force
php artisan config:cache
