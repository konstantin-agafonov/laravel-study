#!/usr/bin/env bash

set -e

composer global require laravel/installer
alias laravel="/home/www-data/.composer/vendor/bin/laravel"

exec "$@"
