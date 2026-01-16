# 📋 Task Manager Application

A modern, feature-rich task management system built with Laravel that helps you organize, track, and manage your daily tasks efficiently.

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

## 📖 Description

Task Manager is a comprehensive web application designed to streamline your task management workflow. With an intuitive interface and powerful features, you can easily create, organize, and track tasks with categories, priorities, and due dates.

## ✨ Features

- 🔐 **User Authentication** - Secure login and registration system
- ✅ **Task Management** - Create, edit, delete, and view tasks
- 📁 **Categories** - Organize tasks with custom categories
- 🎯 **Priority Levels** - Set task priorities (Low, Medium, High)
- 📅 **Due Dates** - Track deadlines and overdue tasks
- 🔍 **Advanced Filtering** - Filter tasks by status, category, and priority
- 📊 **Dashboard** - Visual overview of task statistics
- 📎 **File Attachments** - Attach files to tasks
- 👤 **User Profiles** - Manage profile with avatar upload
- 🔔 **Notifications** - Get alerts for tasks due soon
- 📱 **Responsive Design** - Works seamlessly on all devices

## 🛠️ Tech Stack

### Backend
- **Laravel 10.x** - PHP Framework
- **PHP 8.1+** - Server-side scripting
- **MySQL** - Database management

### Frontend
- **Bootstrap 5** - CSS Framework
- **JavaScript** - Client-side scripting
- **Font Awesome** - Icons
- **Tabler Icons** - Additional icon set

### Tools & Libraries
- **Composer** - PHP dependency manager
- **Laravel Mix/Vite** - Asset compilation
- **Carbon** - Date/time manipulation

## 📋 Requirements

- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Apache/Nginx web server
- Node.js & NPM (optional, for asset compilation)

## 🚀 Installation & Setup

### 1. Clone the Repository
```bash
git clone <repository-url>
cd task-manager
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
```bash
cp .env.example .env
```

Edit `.env` file and configure your database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Run Migrations
```bash
php artisan migrate
```

### 6. Seed Database (Optional)
```bash
php artisan db:seed
```

This will create:
- 2 demo users (admin@example.com / john@example.com)
- 5 categories
- 5 sample tasks
- Default password: `password`

### 7. Create Storage Link
```bash
php artisan storage:link
```

### 8. Start Development Server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

## 👥 Default Login Credentials

After seeding the database:

**Admin User:**
- Email: `admin@example.com`
- Password: `password`

**Regular User:**
- Email: `john@example.com`
- Password: `password`

## 📁 Project Structure

```
task-manager/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   └── assets/
├── resources/
│   └── views/
├── routes/
│   └── web.php
└── storage/
```

## 🎯 Usage

### Creating a Task
1. Navigate to **Tasks** from the sidebar
2. Click **Add Task** button
3. Fill in task details (title, description, priority, category, due date)
4. Optionally attach a file
5. Click **Submit**

### Managing Categories
1. Go to **Categories** section
2. Create new categories for better organization
3. Edit or delete existing categories

### Dashboard Overview
- View total tasks count
- Check completed tasks
- Monitor pending tasks
- Track overdue tasks
- Get alerts for tasks due soon

## 🔒 Security Features

- Password hashing with bcrypt
- CSRF protection
- SQL injection prevention
- XSS protection
- Authentication middleware



Made with ❤️ using Laravel
