FROM php:8.0-apache
# Указываем рабочую папку
WORKDIR /var/www/html
# Копируем все файлы проекта в контейнер
COPY . /var/www/html
RUN apt-get update && apt-get install -y wget
EXPOSE 80
