# Use an official PHP image as the base image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libmcrypt-dev \
    libzip-dev


# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the application code into the container
COPY . .

# Install application dependencies using Composer
RUN composer install --no-dev

# Set the correct permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose the port on which PHP-FPM will listen (default is 9000)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]

# Optionally, add other setup steps if needed (e.g., setting up NGINX or Apache for web serving).
