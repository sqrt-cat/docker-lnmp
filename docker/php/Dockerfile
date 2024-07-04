FROM php:8.2-fpm

RUN apt-get update
RUN apt-get install -y \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libwebp-dev \
        libevent-dev \
        libssl-dev

# 解压源码
RUN docker-php-source extract

# 安装扩展
RUN docker-php-ext-install -j$(nproc) iconv exif fileinfo

# 如果安装的扩展需要自定义配置时
RUN docker-php-ext-configure gd --with-webp=/usr/include/webp --with-jpeg=/usr/include --with-freetype=/usr/include/freetype2/
RUN docker-php-ext-install -j$(nproc) gd

# docker-php-ext 安装扩展会被自动加载 /usr/local/etc/php/conf.d/docker-php-ext-xxx.ini
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install sockets
RUN docker-php-ext-install sodium

# event 中默认 --enbale-event-socket 选项需要先安装 sockets 扩展后才可以
# pecl 安装的扩展不会被自动加载 需要手动配置引入 在宿主机上定义并挂在至容器的如下目录即可
# /usr/local/etc/php/conf.d/docker-php-z-exts.ini
# 加载顺序按文件名 ASCII 正序 比如 event 扩展依赖 sockets 需要在其后加载
# 所以我们自定义的文件名是用 -z- 来排在最后
RUN pecl install event
RUN pecl install swoole
RUN pecl install redis

# 删除源码
RUN docker-php-source delete