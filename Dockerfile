# Use the official PHP image with Apache
FROM php:8.2-apache

# Update the package list
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && docker-php-ext-install mysqli \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Copy local code to the container
COPY html/ /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
