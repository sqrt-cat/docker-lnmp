conf 存放主要配置文件

conf.d 存放 hosts 站点配置文件, 挂载至 /etc/nginx/conf.d

```
# nginx 的主配置目录
# tree /etc/nginx/
/etc/nginx/
|-- conf.d
|-- fastcgi_params
|-- mime.types
|-- modules -> /usr/lib/nginx/modules
|-- nginx.conf
|-- scgi_params
`-- uwsgi_params
```

自定义挂在的相关配置文件及日志目录
```yaml
- ./nginx/conf/nginx.conf:/etc/nginx/nginx.conf # 主配置
- ./nginx/conf/proxy.conf:/etc/nginx/proxy.conf # 代理配置
- ./nginx/conf/fastcgi.conf:/etc/nginx/fastcgi.conf # fastcgi配置
- ./nginx/conf/fastcgi_params:/etc/nginx/fastcgi_params # fastcgi配置
- ./nginx/conf/pathinfo.conf:/etc/nginx/pathinfo.conf # pathinfo配置
- ./nginx/conf/enable-php.conf:/etc/nginx/enable-php.conf # php开启
- ./nginx/conf.d:/etc/nginx/conf.d # 放站点hosts的配置
- /var/logs:/www/wwwlogs # 日志
```