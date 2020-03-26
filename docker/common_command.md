# Docker 常用命令


#### 查看运行中的容器

```shell
docker ps
```

#### 查看镜像
```shell
docker images # 查看镜像
```

#### 进入容器
```shell
docker exec -it CONTAINER /bin/bash # 进入容器  
```

#### 查看镜像的ip地址
```shell
docker inspect --format='{{.NetworkSettings.IPAddress}}' image_name
```

#### 停止所有正在运行的容器
```shell
docker kill $(docker ps -a -q)
```

#### 删除所有已停止运行的容器
```shell
docker rm $(docker ps -a -q)
```

#### 查看容器运行状态
```shell
docker stats
```

#### 删除docker无用镜像,容器,缓存
```shell
docker system prune -a
```
