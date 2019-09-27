#
#! Application
#
FROM php:7.3-fpm-buster

# Set working directory
WORKDIR /var/www

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install dependencies
RUN apt-get update

RUN apt-get install -y \
    apt-transport-https \
    ca-certificates \
    software-properties-common \
    locales \
    nano \
    unzip \
    git \
    curl

RUN apt-get update

RUN apt-get install -y \
    build-essential \
    libpng-dev \
    libsodium-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip libzip-dev \
    jpegoptim optipng pngquant gifsicle

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install iconv pdo_mysql mbstring zip exif pcntl exif bcmath
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd sodium

# Copy application service to /usr/local/bin
COPY .services/app/service.sh /usr/local/bin/app-service.sh
RUN chmod +x /usr/local/bin/app-service.sh

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
# CMD ["php-fpm"]
CMD ["/usr/local/bin/app-service.sh"]
