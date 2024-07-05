mysql 镜像的配置路径如下

```yaml
- ./mysql/my.cnf:/etc/my.cnf # 主配置文件
- ./mysql/conf.d:/etc/mysql/conf.d # 额外的配置文件目录
```