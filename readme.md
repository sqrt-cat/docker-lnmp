### docker
放置 docker-compose.yml 及 各类容器Dockerfile、配置文件

### sites
放置网站源码

### 增加站点
将站点源码放置在 sites 下
1. 新建 `docker/nginx/conf.d/your_site.conf` 来配置站点的域名、端口。
2. 在 `docker/docker-compose.yml` 增加站点的根目录挂在，这样

#### fpm模式
fpm模式可以共用已有的 php-fpm 容器
```yaml
nginx:
  volumes:
    - ../sites/your_site:/var/html/your_site
php-fpm:
  volumes:
    - ../sites/your_site:/var/html/your_site
```
#### cli模式
增加一个php容器，Entrypoint 设为命令行启动的模式，可以参照 swoole 容器的示例