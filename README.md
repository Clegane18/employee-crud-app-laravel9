# 👨‍💼 Employee Management System (Laravel 9)

This is a mini Laravel web application for managing employee records.  
It was developed as part of a technical assessment for a Software Engineer role.

## 🔐 Features

-   ✅ Login with username & password
-   ✅ CRUD (Create, Read, Update, Delete) for Employees
-   ✅ Summary page that displays:
    -   Count of male & female employees
    -   Average age of employees
    -   Total monthly salary of employees

## 🧾 Employee Fields

-   First Name
-   Last Name
-   Gender
-   Birthday
-   Monthly Salary

## 🛠 Tech Stack

-   PHP 8.2
-   Laravel 9
-   MySQL
-   Blade (Laravel templating)
-   HTML + CSS

## 🚀 How to Run Locally

1. Clone the repository
   git clone https://github.com/yourusername/employee-management-app.git
   cd employee-management-app
2. Install dependencies: composer install
3. Set up .env:

-   Duplicate .env.example and rename to .env
-   Configure your database credentials

4. Generate app key:
   php artisan key:generate
5. Run migrations:
   php artisan migrate
6. Serve the app:
   php artisan serve
7. Login Credentials:

-   Default username: admin
-   Default password: admin123(if seeded or manually inserted)

Folder Structure

-   app/Http/Controllers/EmployeeController.php: main logic
-   resources/views/employees/: blade templates
-   public/css/: styling
-   routes/web.php: routing

Notes
Built for a technical assessment on June 2025
PHP 8.2 + Laravel 9 used

Author
John Ross
https://github.com/Clegane18
