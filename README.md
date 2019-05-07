
#VentionTest

#Hi and welcome to my solution to the Vention Front end test ( with basic back end https://github.com/VentionCo/vention-front-end-test )

#The following steps to set up this project are for Windows machines

#Download XAMPP ( https://www.apachefriends.org/index.html )

#Create a database locally named ventiontest ( The scripts will be emailed to you )

#Download composer https://getcomposer.org/download/

#Pull Laravel/php project from me

#Rename .env.example file to .envinside your project root. The database information will be found there. If you need to change it to fir
#your local environment do it there.

#(windows wont let you do it, so you have to open your console cd your project root directory and run mv .env.example .env )

#Open the console and cd your project root directory

#Run composer install 

#php artisan key:generate


#In the XAMPP apache httpd.conf file (which can be easily found via opening XAMPP, clicking config, then clicking apache httpd.conf)
#Change the documentRoot and the Directory to match the public folder within the project
#My example below
#DocumentRoot "C:/Users/Cj/Documents/VentionTest/Laravel/public"
#<Directory "C:/Users/Cj/Documents/VentionTest/Laravel/public">


#run Apache via XAMPP
#run MySQL via XAMPP 

#and it should work.