# contacts
Laravel CRUD for Company Contacts

1. Download contacts
2. Copy folder to Laravel projects folder
3. Copy contacts\\.env.example to contacts\\.env
4. Update .env MAIL_X values to preferred SMTP settings
5. CLI: cd contacts
6. composer install
7. php artisan key:generate
8. mysql -u root -p -e "CREATE DATABASE contacts"
9. php artisan migrate:fresh --seed
10. npm install
11. php artisan serve

http://localhost:8000