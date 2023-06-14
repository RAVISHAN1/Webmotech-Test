## Installation

To set up the Laravel Product Management REST APIs project, follow these steps:

- Clone the repository to your local development environment.
- Navigate to the project directory.
- Run **composer install** to install the project dependencies.
- Rename the **.env.example** file to **.env** and configure your environment variables, including the database settings.
- Generate a unique application key by running **php artisan key:generate**.
- Run **php artisan migrate** to create the necessary database tables.
- Optionally, run **php artisan db:seed** to populate the database with sample data.
- Start the development server by running **php artisan serve**.