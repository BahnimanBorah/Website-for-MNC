# Website-for-MNC
Web Development Project. This repository contains the source files for a website project I made.

I made this project as a web development project that focuses on working with Cascading Style Sheets for making more attractive
web pages. This project also focuses on working with PHP and PHPMyAdmin database. PHP uses PDO as the means of connectivity to the database.
Website containes an ERP portal for employees and admins to manage their work. CSS uses icons and image styling.

PHP : The PHP code I have used in this project maintains the modularity due to which the operations related to the databases are made far more easy to understand and use compared to pages having mixed implementation code. The DataAccess.php page contains a class called Database which is responsible for handling all the database related queries. To use all the functions defined in the DataAccess.php I have only included the php file in every other file such as editprofile and register.php. These mentioned pages are only creating an instance of the Database class in DataAccess.php and using the funtions to complete the operations such as inserting, updating etc.

PS - If any body happens to find any mistakes or errors then do notify me. Thank you.

Here is the link for the Screenshots of the webpage: https://goo.gl/jCFcHF
