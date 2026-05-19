# Laravel E-Commerce

A simple e-commerce web application built with Laravel for portfolio purposes.

## 🚀 Live Demo

👉 https://your-app.onrender.com

---

# 📌 Features

## User
- Register / Login
- Browse products
- Add to cart
- Checkout
- View order history

## Admin
- Product management
- Order management
- Update order status
- Dashboard statistics

---

# 🛠️ Tech Stack

- PHP 8+
- Laravel 11
- SQLite
- Tailwind CSS
- Blade
- Render (Deployment)

---

# 🧱 Architecture

The project follows Laravel MVC architecture with Service Layer pattern.

## Main Components

- Controllers
- Models
- Services
- Middleware
- Blade Views

## Service Layer

Business logic is separated into services:
- CartService
- OrderService

This helps keep controllers clean and maintainable.

---

# 🗄️ Database Design

## Main Tables

- users
- categories
- products
- orders
- order_items

---

# 🔐 Authentication & Authorization

- Laravel Breeze Authentication
- Admin Middleware Protection

---

# 🛒 Shopping Flow

1. User browses products
2. Add products to cart
3. Checkout
4. Create order
5. Admin manages order status

---

# 📸 Screenshots

## Homepage

<img width="100%" alt="homepage" src="./screenshots/home.png">

---

## Cart

<img width="100%" alt="cart" src="./screenshots/cart.png">

---

## Checkout

<img width="100%" alt="checkout" src="./screenshots/checkout.png">

---

## Admin Dashboard

<img width="100%" alt="dashboard" src="./screenshots/dashboard.png">

---

# ⚙️ Installation

## Clone repository

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
