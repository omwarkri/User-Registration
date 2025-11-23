# Use official PHP image with Apache
FROM php:8.2-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your source code
COPY ./src/ /var/www/html/

# EXPOSE port 
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
