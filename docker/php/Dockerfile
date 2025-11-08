FROM php:8.3-fpm
# Copy custom PHP-FPM config
COPY ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf
# Copy website files
COPY src /var/www/html
# Set permissions
RUN chown -R www-data:www-data /var/www/html
WORKDIR /var/www/html
CMD ["php-fpm"]
EXPOSE 9000