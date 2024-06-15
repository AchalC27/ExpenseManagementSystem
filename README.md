
# Student Expense Management System

## Overview

The Student Expense Management System is a web-based application designed to help students manage their financial activities. This system provides tools for logging daily expenses, tracking income sources, and organizing financial notes, helping students make informed financial decisions and promote responsible spending habits.

## Table of Contents

- [Problem Statement](#problem-statement)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Database Design](#database-design)
- [Installation](#installation)
- [Usage](#usage)
- [Normalization](#normalization)
- [SQL Queries](#sql-queries)
- [Contributing](#contributing)
- [License](#license)

## Problem Statement

The Student Expense Management System addresses the financial challenges faced by students by providing an efficient and user-friendly platform for managing expenses, tracking income, and organizing financial notes. This system empowers students with the tools necessary to make informed financial decisions and promote responsible spending habits.

### Purpose and Significance

- **Purpose:** Simplify financial management for students, allowing them to record and categorize daily expenses, track income sources, and maintain an overview of their financial health.
- **Significance:** Efficient financial management helps students avoid overspending, reduce debt, and achieve financial stability by gaining insights into their spending patterns, setting budgets, and making informed financial choices.

## Features

1. **Expense Tracking:**
   - Log daily expenses (e.g., food, transportation, study materials).
   - Categorize expenses for better analysis.
   - Visualize spending trends over time.
   
2. **Income Management:**
   - Input various income sources (e.g., part-time jobs, scholarships, allowances).
   - Calculate and display total earnings.

3. **Note-Taking:**
   - Create and organize financial notes.
   - Include budgeting tips, investment strategies, and reminders about upcoming expenses.

## Technologies Used

- **Backend:** PHP
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MariaDB (MySQL)
- **Web Server:** Apache (XAMPP)

## Database Design

The system uses a relational database to manage data efficiently. Here are the main tables:

### Users Table

| Field        | Type                 | Null | Key | Default             | Extra          |
|--------------|----------------------|------|-----|---------------------|----------------|
| user_id      | int(11)              | NO   | PRI | NULL                | auto_increment |
| firstname    | varchar(50)          | NO   |     | NULL                |                |
| lastname     | varchar(25)          | NO   |     | NULL                |                |
| email        | varchar(50)          | NO   |     | NULL                |                |
| mobile       | varchar(15)          | YES  |     | NULL                |                |
| profile_path | varchar(50)          | NO   |     | default_profile.png |                |
| password     | varchar(50)          | NO   |     | NULL                |                |
| trn_date     | datetime             | NO   |     | NULL                |                |
| role         | enum('admin','user') | NO   |     | user                |                |

### Expenses Table

| Field           | Type        | Null | Key | Default | Extra          |
|-----------------|-------------|------|-----|---------|----------------|
| expense_id      | int(20)     | NO   | PRI | NULL    | auto_increment |
| user_id         | varchar(15) | NO   |     | NULL    |                |
| expense         | int(20)     | NO   |     | NULL    |                |
| expensedate     | datetime    | YES  |     | NULL    |                |
| expensecategory | varchar(50) | NO   |     | NULL    |                |

### Notes Table

| Field    | Type         | Null | Key | Default | Extra          |
|----------|--------------|------|-----|---------|----------------|
| notes_id | int(20)      | NO   | PRI | NULL    | auto_increment |
| user_id  | varchar(50)  | NO   |     | NULL    |                |
| title    | varchar(55)  | NO   |     | NULL    |                |
| notedate | datetime     | YES  |     | NULL    |                |
| notes    | varchar(255) | NO   |     | NULL    |                |

## Installation

1. Clone the repository:
    ```bash
    (https://github.com/AchalC27/ExpenseManagementSystem.git)
    ```

2. Set up the database:
    - Import the `expense_management_system.sql` file into your MariaDB/MySQL database.

3. Configure database connection:
    - Update the database connection details in `dbms/config.php`.

4. Start the web server:
    - Ensure XAMPP or another web server is running and place the project files in the `htdocs` directory (or equivalent).

## Usage

1. Open your web browser and navigate to `http://localhost/expense-management-system`.
2. Register as a new user or log in with existing credentials.
3. Use the dashboard to add expenses, track income, and manage financial notes.

## Normalization

### First Normal Form (1NF)
- Ensure each table column holds atomic values.

### Second Normal Form (2NF)
- Ensure all non-key attributes are fully functional dependent on the primary key.
- Example: Separate expense categories into their own table.

### Third Normal Form (3NF)
- Ensure no transitive dependency.
- Example: Ensure all attributes are directly dependent on the primary key.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

