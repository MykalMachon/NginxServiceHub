# Force SSL
server {
    server_name thepeoplescubicle.com;
    listen 80;

    return 301 https://$host$request_uri;
}

# Main host config
server {
    server_name thepeoplescubicle.com;
    listen 443 ssl;

    # SSL
    # include /etc/nginx/conf.d/ssl.conf;

    # Required for large downloads
    client_max_body_size 4999M;

    location / {
        client_max_body_size 100m;
        proxy_set_header X-Forwarded-Host $host;
        proxy_set_header X-Forwarded-Server $host;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_pass http://some-url-goes-here.ca;
    }

    # the open forms web application
    location /forms {
                # CORS headers
                add_header 'Access-Control-Allow-Origin' 'https://thepeoplescubicle.com';
                add_header 'Access-Control-Allow-Methods' 'GET, OPTIONS';

                # max request size
                client_max_body_size 100m;

                # proxy goodies
                proxy_set_header X-Forwarded-Host $host;
                proxy_set_header X-Forwarded-Server $host;
                proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
                proxy_ssl_server_name on;
                proxy_http_version 1.1;
                proxy_pass https://<your-thing>.azurewebsites.net/;
    }
}
