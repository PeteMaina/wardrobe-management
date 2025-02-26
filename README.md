**Wardrobe Management System**

**Overview**

The Wardrobe Management System is a web application designed to help users efficiently manage their clothing items.
It allows users to add, edit, delete, and categorize wardrobe items while ensuring secure authentication and a seamless user experience. 
Built with Vue 3 for the frontend and Laravel 11 for the backend, this application offers a modern and intuitive interface.

**Features**

User Authentication – Secure login and registration using Laravel Sanctum.

Manage Wardrobe Items – Add, edit, delete, and categorize clothing items.

Search & Filters – Easily find specific wardrobe items using search and filters.

Secure API Routes – Protected routes with token-based authentication.

Responsive UI – Clean and intuitive design with Tailwind CSS.

Vue Router – Smooth navigation across different sections.

Axios for API Requests – Efficient communication between frontend and backend.



**Technologies Used**

_Frontend:_

Vue 3

Vue Router

Tailwind CSS

Axios

_Backend:_

Laravel 11

Laravel Sanctum (for authentication)

MySQL (database)



**Installation & Setup**


1. Clone the Repository

git clone https://github.com/pete-maina/wardrobe-management.git
cd wardrobe-management


2. Backend Setup (Laravel)

cd backend
composer install
cp .env.example .env
php artisan key:generate

Set up the .env file with your database credentials.

Run database migrations:

php artisan migrate

Start the backend server:

php artisan serve


3. Frontend Setup (Vue 3)

cd ../frontend
npm install

Start the Vue development server:

npm run dev

API Endpoints

Method

Endpoint

Description

POST

/api/register

Register a new user

POST

/api/login

Login and receive auth token

GET

/api/wardrobe

Get all wardrobe items

POST

/api/wardrobe

Add a new wardrobe item

PUT

/api/wardrobe/{id}

Update a wardrobe item

DELETE

/api/wardrobe/{id}

Delete a wardrobe item

Usage Guide

Register/Login – Users must first create an account or log in.

Manage Wardrobe – Add, edit, delete, or categorize clothing items.

Search & Filter – Easily find clothing items.

Logout – Securely log out when done.



**Future Enhancements**

Outfit Suggestions (AI-based recommendations)

Laundry Tracker

Progressive Web App (PWA) support




**Peter Maina – Developer**


For any inquiries or contributions, feel free to reach out!
