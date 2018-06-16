# Simple eSports league management app (selmapp)

[wiki](https://github.com/kevinski303/selmapp/wiki) - german

## Installation Development
#### First time installation
- Prerequirements: Database System, PHP Version > 7.00
1. Install composer from "https://getcomposer.org/"
2. Prepare Database
3. Add DB connection string to .env file
4. Open terminal & cd into home directory
5. Run "composer install"
6. Run "php artisan migrate --seed" to create Datatables
7. Run "php artisan key:generate" to create a new application key

#### Start Server
1. Open terminal & cd into home directory
3. Run 'php artisan serve'
4. Browse localhost:8000 for Public page
5. Browse localhost:8000/admin for admin panel (login: admin@admin.com // pw: password)

---
## Install and release for testing
1. Prepare Ubuntu 16.04 Server via your favourite provider

2. Install Apache2 
    - 'apt-get install apache2'
    - Check Apache Config 'nano /etc/apache2/apache2.conf'
    - Add 'ServerName server_domain_or_IP'
    - Restart Apache 'systemctl restart apache2'
    - Allow Traffic on 80,443 'ufw allow in "Apache Full"'
    - Browse your Webserver to test Configuration

3. Install MariaDB:
    - 'apt-get install mariadb-server'
    - secure your installatoin 'mysql_secure_installation' follow instructions

4. Install php and requred modules:
    - 'apt-get install php libapache2-mod-php php-mcrypt php-mysql php-mbstring php-fpm'
    - configure php.ini 'nano /etc/php/7.0/fpm/php.ini' add 'cgi.fix_pathinfo=0'
    - restart php 'systemctl restart php7.0-fpm'
    - set index.php to highest priority 'nano /etc/apache2/mods-enabled/dir.conf' put index.php to front
    - restart apache 'systemctl restart apache2'
    - check Apache status 'systemctl status apache2' there should be 6 services

5. test php processing: 
    - create info.php 'nano /var/www/html/info.php'
    - add '<?php phpinfo(); ?>' to info.php
    - browse 'http://[server_ip_or_domain]/info.php'

6. Optional install PhpMyAdmin and add secondary authenticaton:
    - 'apt-get install phpmyadmin php-mbstring php-gettext' -> answer yes at dbconfig
    - 'nano /etc/apache2/conf-available/phpmyadmin.conf' -> Add "AllowOverride ALL" into <Directory /usr/share/phpmyadmin>
    - restart apache2 'systemctl restart apache2'
    - setup webfolder authentication:
        - 'nano /usr/share/phpmyadmin/.htaccess' add the following parameters:
            - AuthType Basic
            - AuthName "Restricted Files"
            - AuthUserFile /etc/phpmyadmin/.htpasswd
            - Require valid-user
        - create user for webfolder authentication:
            - 'htpasswd -c /etc/phpmyadmin/.htpasswd <username>'
    
7. Create virtual application folder and point apache default to it:
    - create application folder 'mkdir -p /var/www/esportsapp'
    - edit default.conf 'nano /etc/apache2/sites-available/000-default.conf'
        - change "DocumentRoot" to '/var/www/esportsapp/public'
    - restart apache 'systemctl restart apache2'

8. install composer gloablly:
    - 'curl -sS https://getcomposer.org/installer | php'
    - 'mv composer.phar /usr/local/bin/composer'
    


9. SSH and FTP into your server


---

## Laravel Info



<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- **[Codecourse](https://www.codecourse.com)**
- [Fragrantica](https://www.fragrantica.com)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
