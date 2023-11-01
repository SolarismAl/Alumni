# Use the official PHP image as the base image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install PHP extensions required by Laravel
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Allow Composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

# Copy the Laravel application files into the container
COPY . .

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install application dependencies using Composer
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

RUN composer self-update
RUN composer clear-cache

# Generate the Laravel application key
RUN php artisan key:generate

# Expose the port the application will run on
EXPOSE 9000

# Start the PHP-FPM service
CMD ["php-fpm"]
