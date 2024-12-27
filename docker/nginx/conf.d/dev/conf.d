server {
    listen 80;
    server_name localhost;
    root /var/www/public;

    index index.php index.html;

    # Основной блок для обработки запросов
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    # Обработка PHP файлов
    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php-fpm:9000;
        fastcgi_index public/index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~ /\. {
        deny all;
    }
}
