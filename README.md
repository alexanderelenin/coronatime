

---
Coronatime is a web-site which is representing worldwide and also country oriented statistics within Covid-19 around the world.
To use website user has to sign up on a web page and also verify email, which has been mentioned in a registration form. Without confirming email, there is no posibility to use web site. 

In order to change forgotten password, user will also need to verify password recovering mail, which will redirect him on a password recover web page inside web application.

User also is able to use web site in 2 languages : English and Georgian. 

Web site has 2 main web paages: 
1. Worldwide statistics portraying information about recovered, death and confirmed cases around the world.
2. Statistics by countries (has filtering feature on each of the country on every table)
Only Admins (users) can Create/Edit/Delete already existing quotes and movies. 
Web site has 2 language locales -  English (default) and Georgian, that can be changed with a language buttons on the interface.

#
### Table of Contents
* [Prerequisites](#prerequisites)
* [Tech Stack](#tech-stack)
* [Getting Started](#getting-started)
* [Migrations](#migration)
* [Development](#development)
* [Deployment ](#deployment)
* [DrawSQL](#drawsql)

#
### Prerequisites

* <img src="readme/php.svg" width="35" style="position: relative; top: 4px" /> *PHP@8.1 and up*
* <img src="readme/mysql.png" width="35" style="position: relative; top: 4px" /> *MYSQL@8 and up*
* <img src="readme/npm.png" width="35" style="position: relative; top: 4px" /> *npm@6 and up*
* <img src="readme/composer.png" width="35" style="position: relative; top: 6px" /> *composer@2 and up*


#
### Tech Stack

* <img src="readme/laravel.png" height="18" style="position: relative; top: 4px" /> [Laravel@8.x](https://laravel.com/docs/6.x) - back-end framework

* <img src="readme/spatie.png" height="19" style="position: relative; top: 4px" /> [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation

#
### Getting Started
1\. First of all you need to clone E Space repository from github:
```sh
git clone https://github.com/RedberryInternship/aleksandre-elenini-corona-time
```

2\. Next step requires you to run *composer install* in order to install all the dependencies.
```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:
```sh
npm install
```

and also:
```sh
npm run dev
```
in order to build your JS/SaaS resources.

4\. Now we need to set our env file. Go to the root of your project and execute this command.
```sh
cp .env.example .env
```
And now you should provide **.env** file all the necessary environment variables:

#
**MYSQL:**
>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=*****

>DB_USERNAME=*****

>DB_PASSWORD=*****



after setting up **.env** file, execute:
```sh
php artisan config:cache
```
in order to cache environment variables.

4\. Now execute in the root of you project following:
```sh
  php artisan key:generate
```
Which generates auth key.

##### Now, you should be good to go!


#
### Migration
if you've completed getting started section, then migrating database if fairly simple process, just execute:
```sh
php artisan migrate
```

#


#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

when working on JS you may run:

```sh
  npm run dev
```
it builds your js files into executable scripts.
If you want to watch files during development, execute instead:

```sh
  npm run watch
```
it will watch JS files and on change it'll rebuild them, so you don't have to manually build them.


#
### Deployment with CI \ CD
<br/>



<br />

Continues Development / Continues Integration & Deployment steps:
* To fetch all the countries statistics we have to use specially created command 'country:fetch' in terminal. It will initiate fetching data from API-s and will do it automatically every 24 hours because it is scheduled. 


* After running a command, users will be able to see all the information about the statistics worldwide and countrywise. 

Then everything should be OK :pray:

#
### DrawSQL
<img src="readme/drawSQL.png" /> 

