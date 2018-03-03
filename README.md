# Students project

This project is an exercice to discover cakephp2.*

## Installation

1. Clone repository on your server

Using HTTP Clone
```bash
git clone https://github.com/slemoigne/students.git [PATH_TO_YOUR_DIRECTORY]
```

OR

Using SSH Clone
```bash
git clone git@github.com:slemoigne/students.git [PATH_TO_YOUR_DIRECTORY]
```

2. Go inside your directory

```bash
cd [PATH_TO_YOUR_DIRECTORY]
```

3. Use composer to install (http://getcomposer.org/)

```bash
composer install
```

4. Configure database access

Copy file "Config/database.php.default" to "Config/database.php" and edit it
```bash
cp Config/database.php.default Config/database.php
vi Config/database.php
```

5. Install database

Using SQL import
```bash
mysql -u [USER] -p [DATABASE] < Config/schema/schema.sql
```

OR

Using cakephp
```bash
Console/cake schema create
```

6. Create a vhost on your serveur

Example :
```
<VirtualHost *:80>
    ServerName [SERVER NAME]

    DocumentRoot "[PATH TO YOUR DIRECTORY]/webroot"
    <Directory "[PATH TO YOUR DIRECTORY]/webroot">
        AllowOverride All
        Require local
    </Directory>
</VirtualHost>
```

## Debug mode

To active debug mode, set an environment variable in your Apache configuration
```
SetEnv CAKEPHP_DEBUG 2
```

## Unit tests

1. Configure database test access in "Config/database.php"

2. Launch test suite

```bash
Console/cake test app AllTests
```
