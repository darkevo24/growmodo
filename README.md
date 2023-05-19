Registration Application
This is a CRUD (Create, Read, Update, Delete) registration application built using Laravel and Vue.js. It allows users to register, login, and view and manage user records.

Table of Contents
Requirements
Setup
Running the Application
Usage
Contributing
License
Requirements
To run this application, you need to have the following installed on your system:

PHP (version 7.4 or higher)
Composer
Node.js (version 12 or higher)
NPM (comes bundled with Node.js)
MySQL database
Setup
Clone the repository:

git clone https://github.com/your-username/registration-app.git
Navigate to the project directory:

cd registration-app
Install PHP dependencies:

composer install
Install JavaScript dependencies:

npm install
Create a copy of the .env.example file and rename it to .env. Update the database connection details in the .env file to match your MySQL database configuration.

Generate an application key:


php artisan key:generate
Create a new database in MySQL for the application.

Migrate the database tables:


php artisan migrate
Seed the database with an admin user:

php artisan db:seed
Compile the frontend assets:

npm run dev
Running the Application
To run the application, execute the following command:


php artisan serve
This will start a development server, and you can access the application by visiting http://localhost:8000 in your web browser.

Usage
Open your web browser and navigate to http://localhost:8000.
You will be presented with the Home page, where you can choose to log in or register.
To register, click on the "Register" button and fill in the required fields: Username, Email Address, Phone Number, Password, and Confirm Password.
After successful registration, you will be redirected to the login page.
To log in, enter your Username/Email and Password in the login form and click the "Login" button.
Upon successful login, you will be redirected to the Welcome page.
If you are an admin user, you will see a title "Welcome, {username}" along with two buttons: "View Records" and "Logout".
If you are a guest user, you will see a title "Welcome, {username}" along with two buttons: "Unsubscribe" and "Logout".
Clicking the "View Records" button will take you to a page where you can see a table containing information of all registered users.
From the Welcome page, you can click the "Logout" button to log out of the application.