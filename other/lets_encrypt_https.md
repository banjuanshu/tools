# 申请Let's Encrypt通配符HTTPS证书


## Docker 方式

```bash
docker run --rm  -it  \
  -v "$(pwd)/nginx/ssl":/acme.sh  \
  -e Ali_Key="ALI_KEY" \
  -e Ali_Secret="ALI_Secret" \
  neilpang/acme.sh  --issue --dns dns_ali -d test.com -d *.test.com
```

#### Nginx 配置
```
# domain自行替换成自己的域名
server 
{
    server_name xx.test.com;
    listen 443 http2 ssl;
    ssl_certificate fullchain.cer;
    ssl_certificate_domain.key;
    ssl_trusted_certificate ca.cer;
}
```
