FROM dunglas/frankenphp:php8.4.22-bookworm

RUN install-php-extensions mysqli pdo_mysql

WORKDIR /app
COPY . /app

CMD php -S 0.0.0.0:${PORT:-80} -t /app