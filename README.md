Assalamualaikum.
My Name is Ridwan Tusmiah
(Ostad Batch 4)

**Module 20 assignment installation guide.**
Prerequisites
Make sure you have the following installed:

**1: Clone or download the Laravel project from GitHub.**
-- git clone <repository-url>

**2: Navigate to the project directory.**
--cd your-project-directory

**3: Install Dependencies**
--composer install

**4: Set Up Environment File**
Copy the .env.example file to create a new .env file. This file contains the environment configuration.
--cp .env.example .env

**5: Generate Application Key**
--php artisan key:generate

**6: Configure Database**
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ostad_assignment
DB_USERNAME=root
DB_PASSWORD=

**7: Migrate Database**
php artisan migrate
Important Note: The Project folder contains a DATABASE(Import First) folder, inside this folder there is a complete database. Just Import it.

**8: Start the Laravel development server.**
--php artisan serve
The application will be available at http://127.0.0.1:8000.
