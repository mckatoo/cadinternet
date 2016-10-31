#!/bin/bash
case $1 in
  start) docker exec -ti cadinternet service php7.0-fpm $1 ;;
  stop) docker exec -ti cadinternet service php7.0-fpm $1 ;;
  status) docker exec -ti cadinternet service php7.0-fpm $1 ;;
  restart) docker exec -ti cadinternet service php7.0-fpm $1 ;;
  *) echo "Só é aceitavel os comando start, stop ou restart" ;;
esac
