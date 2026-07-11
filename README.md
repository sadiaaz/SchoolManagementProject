# 🎓 School Management System

A modern, scalable, and role-based School Management System built with **Laravel 12** and **Tailwind CSS 4**. This project is designed using enterprise-level architecture with reusable components, clean code practices, and modular development.

---

## 🚀 Tech Stack

| Technology | Version |
|------------|----------|
| Laravel | 12.62.0 |
| PHP | 8.2.12 |
| Tailwind CSS | 4.3.2 |
| Vite | 7.3.6 |
| Node.js | 24.18.0 |
| npm | 11.16.0 |
| MySQL | 8+ |

---

## ✨ Features

- Role-Based Authentication
- Spatie Roles & Permissions
- Dashboard
- User Management
- School Settings
- Notification System
- Export to Excel
- Export to PDF
- Print Reports
- Responsive Admin Panel
- Reusable Blade Components
- Search & Pagination
- Modern UI with Tailwind CSS 4

---

## 👥 User Roles

- Super Admin
- School Admin
- Teacher
- Accountant
- Parent

---

## 🛠 Upcoming Modules

- Student Management
- Teacher Management
- Parent Management
- Class Management
- Subject Management
- Attendance
- Fee Management
- Examination
- Results
- Timetable
- Library
- Transport
- Hostel
- HR Management
- Payroll
- Reports
- Settings

---

## 📦 Installation

Clone the repository

```bash
git clone https://github.com/sadiaaz/SchoolManagementProject.git
```

Move into the project

```bash
cd SchoolManagementProject
```

Install PHP dependencies

```bash
composer install
```

Install JavaScript dependencies

```bash
npm install
```

Copy the environment file

```bash
cp .env.example .env
```

Generate the application key

```bash
php artisan key:generate
```

Configure your database inside `.env`

Run migrations

```bash
php artisan migrate
```

Seed the database

```bash
php artisan db:seed
```

Start the development server

```bash
php artisan serve
```

Run Vite

```bash
npm run dev
```

---

## 📂 Project Structure

```
app/
├── Exports/
├── Http/
├── Models/
├── Providers/
├── Services/

resources/
├── css/
├── js/
├── views/
│   ├── components/
│   ├── layouts/
│   └── export/

routes/
database/
public/
```

---

## 🏗 Architecture

This project follows a reusable architecture.

- Generic Export Service
- Generic PDF Service
- Reusable Blade Components
- Service Layer
- Resource Controllers
- Modular Design
- Clean MVC Pattern

---

## 📊 Export System

The system supports:

- Excel Export
- PDF Export
- Print View

using a reusable Export Service.

Each module uses the same export logic without duplicating code.

---

## 🎨 Frontend

- Tailwind CSS 4
- Vite
- Responsive Design
- Mobile Friendly
- Reusable Components

---

## 🔐 Authentication

- Laravel Breeze
- Email Verification
- Password Reset
- Role-Based Authorization
- Middleware Protection

---

## 📸 Screenshots

Screenshots will be added as the project progresses.

---

## 📈 Project Status

🚧 Under Active Development

Current Progress:

- Authentication ✅
- Roles & Permissions ✅
- User Management ✅
- Export System ✅
- Dashboard 🚧
- Student Module 🚧

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome.

Feel free to fork the repository and submit a pull request.

---

## 📄 License

This project is open-source and available under the MIT License.

---

## 👩‍💻 Developer

**Sadia Saad**

Software Engineering Student

Laravel Developer

GitHub:
https://github.com/sadiaaz

---

⭐ If you like this project, don't forget to star the repository.
