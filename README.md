# CodeIgniter 4 Explore Agusman Riyadi

## How Install

- Create DB dengan nama 'CI4APP'
- Jalankan migrate : php spark migrate
- Jalan kan seeder
  - php spark db:seed InitiatedUser
  - php spark db:seed InitiatedRole
  - php spark db:seed InitiatedRoleUser
  - jikan dibutuhkan data dummy untuk user : php spark db:seed DummyUser

## Database

- Postgree SQL 12

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
