# Use the official PHP image as the base image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Update the package list and install libpq-dev
RUN apt-get update && apt-get install -y libpq-dev zip unzip
# Use a specific package mirror
RUN sed -i 's/deb.debian.org/mirrors.ustc.edu.cn/g' /etc/apt/sources.list

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Update Composer to the latest version
RUN composer self-update

# Copy the Laravel application files into the container
COPY . .

# Copy the .env file into the container
COPY .env .env

# Install application dependencies using Composer
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Generate the Laravel application key
RUN php artisan key:generate

# Expose the port the application will run on
EXPOSE 9000

# Start the PHP-FPM service
CMD ["php-fpm"]
