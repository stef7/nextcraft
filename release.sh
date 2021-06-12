#! /bin/bash

# Install dependencies
composer install

# Run Craft commands
php craft migrate/all --no-content --interactive=0
php craft project-config/apply --force
php craft migrate --track=content --interactive=0
