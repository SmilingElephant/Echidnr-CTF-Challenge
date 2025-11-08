FROM nginx:latest
WORKDIR /etc/nginx

#Remove default config file
RUN rm -f /etc/nginx/conf.d/default.conf
#Copy CTF profile
COPY docker/nginx/sites-available/default /etc/nginx/sites-available/default
RUN mkdir -p /etc/nginx/sites-enabled
#Create the sites-enabled symlink
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
#Copy custom nginx config
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
#Copy website files
WORKDIR /var/www/html
COPY src/ .
#Set permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80