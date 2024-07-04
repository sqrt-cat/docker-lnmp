基于官方的 php-fpm 镜像

开启了 ext 扩展
```yaml
pdo_mysql iconv fileinfo exif gd sockets
```
追加了 pecl 扩展
```yaml
event swoole redis
```

php -i | grep --with-config-file-path --with-config-file-scan-dir 查看 cli 的配置文件

php-fpm -t 查看 fpm 的配置文件
```
# tree /usr/local/etc
/usr/local/etc
|-- pear.conf
|-- php # 主配置目录 --with-config-file-path
|   |-- conf.d # 扩展配置目录 --with-config-file-scan-dir
|   |   |-- docker-fpm.ini
|   |   |-- docker-php-ext-exif.ini
|   |   |-- docker-php-ext-gd.ini
|   |   |-- docker-php-ext-pdo_mysql.ini
|   |   |-- docker-php-ext-sockets.ini
|   |   `-- docker-php-ext-sodium.ini
|   |-- php.ini-development
|   `-- php.ini-production # 默认没有 php.ini 文件，可以挂载
|-- php-fpm.conf # fpm 主配置 会引入 php-fpm.d 下的扩展配置
|-- php-fpm.conf.default
`-- php-fpm.d  # php-fpm 启动时会自动加载 php-fpm.d 下的配置文件
    |-- docker.conf # fpm 日志相关
    |-- www.conf # fpm 进程池配置
    |-- www.conf.default
    `-- zz-docker.conf # fpm 监听端口
```