FROM nginx:1.23.2-alpine
WORKDIR "/app"

COPY default.conf /etc/nginx/conf.d/default.conf

RUN addgroup -g 1000 app && adduser -u 1000 -G app -s /bin/sh -D app