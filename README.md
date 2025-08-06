Simple Notes Application 📝This is a basic web application built with Laravel that allows authenticated users to create, view, edit, and delete their personal notes. It's designed to be a straightforward project to help you understand fundamental Laravel concepts, including user authentication, CRUD operations, and database interactions using SQLite for simplicity.✨ FeaturesUser Authentication: Secure registration, login, and logout functionality.Create Notes: Users can add new notes with a title and content.View Notes: Display a list of all notes belonging to the logged-in user.Edit Notes: Update the title or content of existing notes.Delete Notes: Remove notes that are no longer needed.User-Specific Data: Each user can only manage their own notes.🚀 Technologies UsedLaravel: PHP Framework for web artisans.PHP: Programming language.SQLite: File-based database for easy local development.Composer: PHP dependency manager.Node.js & npm: For managing frontend assets.Laravel Breeze: Scaffolding for authentication.Tailwind CSS: For styling the application (included with Breeze).⚙️ Setup InstructionsFollow these steps to get the project up and running on your local machine.1. Clone the Repository (if applicable)If you've already pushed this project to GitHub, you would clone it. Otherwise, you've already created it locally.git clone https://github.com/Levinmunyelele/NotesApp
cd notes-app
2. Install PHP DependenciesUse Composer to install the backend dependencies:composer install
3. Configure Environment VariablesCreate your .env file by copying the example file:cp .env.example .env
Now, open the newly created .env file and configure your database connection for SQLite:DB_CONNECTION=sqlite
# You can comment out or remove the other DB_ lines as they are not needed for SQLite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
4. Generate Application KeyThis command generates a unique key for your application, essential for security:php artisan key:generate
5. Create SQLite Database FileSQLite uses a file to store data. Create an empty file for your database:type nul > database\database.sqlite
6. Run Database MigrationsThis will create the necessary tables (users and notes) in your database/database.sqlite file:php artisan migrate
7. Install Frontend DependenciesInstall Node.js packages required for frontend assets:npm install
8. Compile Frontend AssetsCompile the CSS and JavaScript assets (Tailwind CSS, etc.):npm run dev
(For production, you would use npm run build)▶️ How to Run the ApplicationOnce all setup steps are complete, start the Laravel development server:php artisan serve
Your application will typically be accessible at http://127.0.0.1:8000.👨‍💻 UsageRegister: Open your browser and navigate to http://127.0.0.1:8000/register to create a new user account.Login: After registration, you'll be logged in and redirected to the dashboard.Manage Notes: Click on "My Notes" in the navigation bar or go to http://127.0.0.1:8000/notes to view, add, edit, or delete your notes.🤝 ContributingFeel free to fork this repository and contribute!📄 LicenseThe Laravel framework is open-sourced software licensed under the MIT license.
