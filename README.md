
#VentionTest

#Hi and welcome to my solution to the Vention Front end test ( with basic back end https://github.com/VentionCo/vention-front-end-test )

#The following steps to set up this project are for Windows machines

#1) Download XAMPP ( https://www.apachefriends.org/index.html )

#2) Create a database locally named ventiontest ( The scripts will be emailed to you )

#3) Download composer https://getcomposer.org/download/

#4) Pull Laravel/php project from me

#5) Rename .env.example file to .env inside your project root. The database information will be found there. If you need to change it to for
#your local environment do it there.
#(windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )

#6) Open the console and cd your project root directory

#7) Run composer install 

#8) php artisan key:generate


#9) In the XAMPP apache httpd.conf file (which can be easily found via opening XAMPP, clicking config, then clicking apache httpd.conf)
#Change the documentRoot and the Directory to match the public folder within the project
#My example below
#DocumentRoot "C:/Users/Cj/Documents/VentionTest/Laravel/public"
#<Directory "C:/Users/Cj/Documents/VentionTest/Laravel/public">


#10) run Apache via XAMPP
#11) run MySQL via XAMPP 

#and it should work.