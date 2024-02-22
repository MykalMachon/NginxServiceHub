# NginxServiceHub
an NGINX proof of concept that highlights how you can centralize multiple services behind a single reverse proxy

## Setup

### NGINX Setup

1. clone this repository onto your NGINX box
2. `ln -ls` the `nginx/sites-enabled` folder to `/etc/nginx/`. This contains all the individual site config.
    1. Edit all the sites to point to your services. (more info TBD)
3. `ln -s` the `nginx/nginx.conf` file to `/etc/nginx/nginx.conf`. This replaces your default configuration
4. Test NGINX to make sure it's working how you'd like with `nginx -t`
5. Restart the service with `nginx -s reload`

### Services Setup

tbd

## Todos

### Services 
- thepeoplescubicle.com
    - primary site 
        - [ ] create simple one page HTML site 
        - [ ] host on Azure App Service 
        - [ ] Configure proxy site and DNS
    - thepeoplescubicle.com/opnforms
        - [ ] setup [opnforms](https://github.com/JhumanJ/OpnForm?tab=readme-ov-file)
        - [ ] host on Azure Container Apps
        - [ ] Configure proxy site
- api.thepeoplescubicle.com
    - [ ] Create basic API in golang
    - [ ] Host on Azure App Service
    - [ ] Configure proxy site and DNS
- blog.thepeoplescubicle.com
    - [ ] Create basic blog site 
    - [ ] Host on a digital ocean droplet VM
    - [ ] Configure proxy site and DNS