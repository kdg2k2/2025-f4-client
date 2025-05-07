# 1. chạy lệnh với cmd hoặc powershell
    - cmd:
        copy .env.example .env & composer install & php artisan optimize:clear & php artisan config:cache & php artisan jwt:secret
    - shell:
        copy .env.example .env ; composer install ; php artisan optimize:clear ; php artisan config:cache ; php artisan jwt:secret