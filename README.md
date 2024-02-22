# NginxServiceHub
an NGINX proof of concept that highlights how you can centralize multiple services behind a single reverse proxy

## NGINX Setup

1. clone this repository onto your NGINX box
2. `ln -ls` the `nginx/sites-enabled` folder to `/etc/nginx/`. This contains all the individual site config.
    1. Edit all the sites to point to your services. (more info TBD)
3. `ln -s` the `nginx/default.conf` file to `/etc/nginx/default.conf`. This replaces your default configuration
4. Test NGINX to make sure it's working how you'd like with `nginx -t`
5. Restart the service with `nginx -s reload`

## Services Setup

tbd
