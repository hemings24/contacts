# contacts
Laravel CRUD for Company Contacts

1. Download contacts
2. Copy folder to Laravel projects folder
3. Copy contacts\.env.example to contacts\.env
<br>
   Update .env MAIL_X values to preferred SMTP settings
4. cd contacts
5. composer install
6. php artisan key:generate
7. mysql -u root -p -e "CREATE DATABASE contacts"
8. php artisan migrate:fresh --seed
9. npm install
10. php artisan serve

http://localhost:8000