# PHP CRUD Application

This is a PHP-based CRUD (Create, Read, Update, Delete) application with modular structure, error handling, and a user-friendly interface.

## File Structure

```
├── index.php                 # Main application page
├── db.php                    # Database connection
├── includes
│   ├── header.php           # HTML Header and navigation
│   ├── footer.php           # HTML Footer
│   └── functions.php        # CRUD functions
├── error.html               # Custom error page
├── assets
│   └── styles.css           # CSS for styling
└── README.md                # Project documentation
```

## Database Schema

```sql
CREATE TABLE users (
    email VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    phone VARCHAR(15) NOT NULL,
    address VARCHAR(255) NOT NULL
);
```

## Setup Instructions

1. Clone the repository:

   ```bash
   git clone https://github.com/dev-jatin-mehra/CRUD-PHP.git
   ```

2. Navigate to the project directory:

   ```bash
   cd php-crud-app
   ```

3. Create the database and the `users` table using the schema provided.

4. Update the database credentials in `db.php`:

   ```php
   $conn = new mysqli('hostname', 'username', 'password', 'database_name');
   ```

5. Run the application on a web browser:

   ```bash
    localhost/crud-app/index.php
   ```

## Usage

* **Add User**: Fill the form and click 'Save'.
* **Update User**: Click 'Edit', modify the form, and click 'Update'.
* **Delete User**: Click 'Delete' for the respective user.
* **Search User**: Enter a search term and click 'Search'.
* **Show All**: Click the 'Show All' button to display all users.

## Author

* **Jatin Mehra** - [GitHub](https://github.com/dev-jatin-mehra)

