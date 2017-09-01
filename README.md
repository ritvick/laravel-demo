### Overview
This is a simple demo of Emploee add, edit, list functionality in Laravel framework.
Online Demo: [http://laravel-demo.ritvick.com/] (http://laravel-demo.ritvick.com/)

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
    
### Unit Tests
1. Run following command from root of the project
    ```
    phpunit
    
### API support
Please use postman to test these API's 
 1. /api/login
    Request Object
    ```
    username: admin@test.com
    password: admin
    ```
    
    Response Object
    ```
    {
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sYXJhdmVsLmRldi9hcGkvbG9naW4iLCJpYXQiOjE1MDQyNzk1NTIsImV4cCI6MTUwNDI4MzE1MiwibmJmIjoxNTA0Mjc5NTUyLCJqdGkiOiJBQmdjOTdtZEpoMnp4U291In0.VCVLWrNZk7MaOokw2rKbxTbKJxDRFNoFo0gXO-ryQ4Y",
    "valid": true
    }
    ```
2. /api/get_employee
    ```
    URL Param
    ?id=3&token=asda21312asdas
    ```
    Note: Please provide correct values above. Token will be obtained from Request #1
3. /api/addupdate_employee
4. /api/delete_employee

### Support
Please contact Autor for any support requests or raise and issue in github. 
