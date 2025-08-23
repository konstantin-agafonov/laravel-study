#!/usr/bin/env bash

set -e

composer global require laravel/installer

exec "$@"
