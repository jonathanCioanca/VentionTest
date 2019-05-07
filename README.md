
#VentionTest

#Hi and welcome to my solution to the Vention Front end test ( with basic back end https://github.com/VentionCo/vention-front-end-test )

#The following steps to set up this project are for Windows machines

#Download XAMPP ( https://www.apachefriends.org/index.html )

#Create a database locally named ventiontest ( below are some mysql scripts to make it easier )


#CREATE DATABASE `ventiontest` ;


#CREATE TABLE `flowers` (
#  `id` int(11) NOT NULL AUTO_INCREMENT,
#  `name` varchar(45) DEFAULT NULL,
#  `image` varchar(45) DEFAULT NULL,
#  `price` double DEFAULT NULL,
#  `stars` tinyint(5) DEFAULT NULL,
#  PRIMARY KEY (`id`)
#) ENGINE=InnoDB AUTO_INCREMENT=0 ;


#CREATE TABLE `invoice` (
#  `id` int(11) NOT NULL AUTO_INCREMENT,
#  `date` date DEFAULT NULL,
#  `amount` double DEFAULT NULL,
#  PRIMARY KEY (`id`)
#) ENGINE=InnoDB AUTO_INCREMENT=0 ;


#INSERT INTO `ventiontest`.`flowers`
#(
#`name`,
#`image`,
#`price`,
#`stars`)
#VALUES
#("Blue Flower",
#"/assets/blue-flower.png",
#80.00,
#4),

#("Orange Flower",
#"/assets/orange-flower.png",
#17.60,
#3),

#("Pink Flower",
#"/assets/pink-flower.png",
#40.00,
#5);


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