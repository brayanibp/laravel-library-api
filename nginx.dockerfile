FROM nginx:stable-alpine

ADD ./nginx/conf.d/app.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p /var/www/html
