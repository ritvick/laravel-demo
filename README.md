### Overview
This is a simple demo of Emploee add, edit, list functionality in Laravel framework.

### Installation
1. Create a virtual host on your machine
    ```
    <VirtualHost *:80>
        ServerName laravel.dev
        DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/laravel_demo"
        <Directory "/Applications/XAMPP/xamppfiles/htdocs/laravel_demo">
            Options Indexes FollowSymLinks Includes ExecCGI
            AllowOverride All
            Require all granted
        </Directory>
        ErrorLog "logs/mysite.local-error_log"
    </VirtualHost>
    ```
2. Add laravel.dev to your /etc/hosts file and point it to 127.0.0.1
3. Take clone of the project
4. From the root of project run these two commands to create tables and insert main admin user
    ``` 
    php artisan migrate
    php artisan db:seed
    ```
    Note: Please check php path if you have multiple php installations. 

### Run
1. Visit http://laravel.dev/
2. Login with below credentials
    ```
    username: admin@test.com
    password: admin
    ```
    
    
