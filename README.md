# Laravel Project Setup

This project is built using **Laravel** with **Blade** templating and includes database seeding functionality.

## Requirements

- PHP 8.x or higher
- Composer
- MySQL
- Node.js and NPM (optional, for frontend assets)

## Installation

Follow these steps to set up the project:

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/bryant2305/laravel-exam.git
cd laravel-exam

```


### 2 Install Dependencies
Run the following command to install PHP dependencies via Composer:

composer install

If you're using frontend assets with Laravel Mix, also run:

npm install

3. Configure Environment Variables

Copy the .env.example file to a new .env file:

cp .env.example .env

Update the .env file with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

4. Generate Application Key
Run the following command to generate the Laravel application key:

php artisan key:generate

5. Run Migrations
Migrate the database to set up the required tables:

php artisan migrate

6. Seed the Database
If you want to populate the database with some initial data, run the seeders:

php artisan migrate:fresh --seed

7. Compile Frontend Assets

npm run dev

8. Serve the Application
Run the built-in Laravel development server:

php artisan serve

---------------------------------------------------------------------------
### Merchant Routes
- **GET** `/` - Show the merchant registration form.
- **GET** `/merchant/register` - Show merchant registration form (`merchant.register`).
- **POST** `/merchant/register` - Register merchant.

- **GET** `/merchant/login` - Show merchant login form (`merchant.login`).
- **POST** `/merchant/login` - Login merchant.

- **Authenticated Merchant Routes:**
    - **GET** `/merchant/dashboard` - Merchant dashboard (`merchant.dashboard`).
    - **GET** `/merchant/store-list` - List of stores owned by the merchant (`merchant.store.list`).
    - **GET** `/merchant/create-store` - Show create store form (`merchant.store.create`).
    - **POST** `/merchant/create-store` - Create store.

    - **Categories Routes:**
        - **GET** `/merchant/categories` - List of merchant categories (`merchant.categories.index`).
        - **GET** `/merchant/categories/create` - Show create category form (`merchant.categories.create`).
        - **POST** `/merchant/categories` - Store category (`merchant.categories.store`).

    - **Products Routes:**
        - **GET** `/merchant/products` - List of merchant products (`merchant.products.index`).
        - **GET** `/merchant/products/create` - Show create product form (`merchant.products.create`).
        - **POST** `/merchant/products` - Store product (`merchant.products.store`).

### Admin Routes
- **GET** `/admin/login` - Show admin login form (`admin.login`).
- **POST** `/admin/login` - Admin login.

- **Authenticated Admin Routes:**
    - **GET** `/admin/merchants` - List of merchants (`admin.merchants.index`).

### Store Routes
- **GET** `/shop/{shop}` - Show shop details (`shop.show`).


---------------------------------------------------------------------------

ADMIN USER 

#DEFAULT USERS
EMAIL='Admin@test.com'
PASS='admin'

---------------------------------------------------------------------------