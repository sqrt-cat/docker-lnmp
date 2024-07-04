FROM nginx:latest

# nginx 无权创建二级目录 需使用命令提前创建
# for proxy.conf
RUN mkdir -p /tmp/nginx/proxy_temp_dir
RUN mkdir -p /tmp/nginx/proxy_cache_dir