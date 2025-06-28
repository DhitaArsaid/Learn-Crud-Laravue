# Learn-Crud-Laravue

A simple CRUD application using Laravel 12 (backend) and Vue 3 (frontend).

---

## Features

* Display data
* Adding data
* Editing data
* Deleting data

---

## Quick Installation

1. Clone the repository:

```bash
git clone https://github.com/DhitaArsaid/Learn-Crud-Laravue.git
cd Learn-Crud-Laravue
```

2. Setup Backend:

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
```

3. Select Database:

* SQLite:

``dotenv
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

* MySQL:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=name_database
DB_USERNAME=root
DB_PASSWORD=
```''

4. Database Migration:

```bash
php artisan migrate
```

5. Run Backend:

```bash
php artisan serve
```

6. Setup Frontend:

```bash
cd ../frontend
npm install
npm run dev
```

---

## How to use

1. Go to `http://localhost:5173` to access the application.
2. The backend runs at `http://127.0.0.1:8000`.
3. CRUD is ready to use.

---

