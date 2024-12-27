server {
    listen 80;
    server_name your-domain.com;  # Замените на ваш реальный домен
    return 301 https://$host$request_uri;  # Перенаправление на HTTPS
}

server {
    listen 443 ssl;
    server_name your-domain.com;  # Замените на ваш реальный домен

    ssl_certificate /etc/letsencrypt/live/your-domain.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/your-domain.com/privkey.pem;

    root /var/www;

    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php-fpm:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\. {
        deny all;
    }
}
