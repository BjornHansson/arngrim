Arngrim
=======

A lightweight bug and issue tracker to be used in small projects.

![Screenshot](src/img/screenshot.jpg?raw=true "Screenshot")

Goal
-----------
To keep my knowledge in web development up to date and learn more about it.

Main techniques
-----------
PHP and MySQL because it is so easy to use and open source.

Install
-----------
Create database, e.g. "arngrim".
Browse/run install.php

3PP and developer notes
-----------
- Bootstrap for beautiful design.
- Favicon from Openclipart.
- JSHint to validate the JavaScript.
  - Install through NPM.
  - Run from the root with `jshint src`.
- PHPUnit for basic unit tests.
  - Download the PHP Archive (PHAR).
  - Add PHPUnit (and PHP if not already there) to the PATH.
  - Run from the root with `phpunit tests/`.
- Selenium (with PHPUnit) for Firefox GUI tests.
  - Download the Selenium-server-standalone jar.
  - Start the server by running `java -jar selenium-server-standalone-2.43.1.jar`.
