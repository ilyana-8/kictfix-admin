## 1st Time Setup and Configuration

1. Install Laragon https://laragon.org/download/index.html
2. Clone/Download ZIP file of this project repository to your local in laragon/www
3. Open your project in VS Code and open terminal
4. Run `composer install`
5. Run `npm install`
6. Duplicate .env.example and rename to .env
7. Setup .env file. Please set this variable
    - General
        - APP_URL=https://kictfix-admin.test
        - MAIN_APP_URL=https://kictfix.test
    - Database
        - DB_CONNECTION=mysql
        - DB_HOST=127.0.0.1
        - DB_PORT=3306
        - DB_DATABASE=kictfix_db
        - DB_USERNAME=root
        - DB_PASSWORD=
    - Email Gateway (For testing purpose use Mailtrap. For production use real email provider)
        - MAIL_SEND, MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION
8. Run `php artisan key:generate`
9. Run `php artisan storage:link`
10. Run `php artisan serve --port=8080` and `npm run dev`
11. Open browser and go to https://kictfix-admin.test/admin/login

## Admin Credential

email = admin@example.com
password = password
