# Bfan XP Task Management Application Backend Repository

### Prerequisites

-   PHP (>= 8.1)
-   Composer
-   SQLite
-   Laravel (>= 10.10)

### Installation and Setup

1. Clone the backend repository:

    ```bash
    git clone https://github.com/recaorshellthree/bfan-xp-test-backend.git
    cd bfan-xp-test-backend
    ```

2. Install PHP dependencies:

    ```bash
    composer install
    ```

3. Configure the environment:

    - Copy `.env.example` to `.env`:
        ```bash
        cp .env.example .env
        ```
    - Set the database driver to SQLite in the `.env` file:
        ```env
        DB_CONNECTION=sqlite
        DB_DATABASE=/absolute/path/to/database.sqlite
        ```
    - Create an SQLite file:
        ```bash
        touch database/database.sqlite
        ```

4. Run migrations to create the tasks table:

    ```bash
    php artisan migrate
    ```

5. Serve the application:

    ```bash
    php artisan serve
    ```

    The backend will be available at `http://127.0.0.1:8000`.

6. Access the Swagger OpenAPI documentation at:
    ```
    http://127.0.0.1:8000/api/documentation
    ```

### API Endpoints

-   `GET /api/tasks`: List all tasks
-   `POST /api/tasks`: Create a new task
-   `DELETE /api/tasks/{id}`: Delete a task

### Usage

-   Test the backend API endpoints using Swagger or any API testing tool (like Postman).

---

Feel free to reach out for additional support or customizations.
