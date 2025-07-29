# 🧬 Family Tree Management System

A simple web-based Family Tree application using **PHP (OOP)**, **MySQL**, **jQuery**, and **AJAX**. This tool allows you to add and manage a recursive tree of family members with dynamic parent-child relationships.

---

## 🚀 Features

- ✅ Add new members to the tree using a modal form
- ✅ Choose a parent while adding a new member
- ✅ Automatically update the tree without reloading the page (AJAX)
- ✅ Parent-child tree rendered using nested `<ul>` and `<li>` structure
- ✅ Bullet indicators: parent nodes are hollow (transparent), child nodes are filled

---

## 📂 Project Structure

project-root/
│
├── index.php # Main interface to display the family tree and modal form
├── add_member.php # Handles AJAX request to insert a new member into DB
├── fetch_members.php # Recursively fetches all members from DB to build the tree
├── db.php # Database connection using PDO
├── family_tree.sql # SQL dump of the 'members' table
└── README.md # Project documentation

---

## 🛠️ Technologies Used

- **Frontend**: HTML, CSS, JavaScript (jQuery)
- **Backend**: PHP (Object-Oriented Programming)
- **Database**: MySQL
- **AJAX**: Asynchronous data handling using jQuery

---

## 🧪 Setup Instructions

### ✅ Prerequisites

- PHP >= 7.4
- MySQL >= 5.7
- WAMP/XAMPP/LAMP server installed and running

### 🛠️ Steps

1. **Clone the Repository or Copy Files**
   Place the project in your local server directory:

C:/wamp64/www/family-tree/


2. **Import Database**
- Open phpMyAdmin
- Create a new database, e.g., `family_tree`
- Import the `family_tree.sql` file located in the project root

3. **Start the Project**
- Start Apache and MySQL using WAMP/XAMPP
- Visit in your browser:  
  ```
  http://localhost/family-tree/index.php
  ```

---

### 📊 Database Schema

**Table: `members`**

| Field       | Type          | Description                             |
|-------------|---------------|-----------------------------------------|
| `id`        | INT           | Primary Key, Auto Increment             |
| `name`      | VARCHAR(255)  | Member Name                             |
| `parent_id` | INT (NULL)    | Parent Member ID (nullable, self-referencing) |
| `created_date` | DATETIME   | Timestamp when the member was added (default: CURRENT_TIMESTAMP) |

- `parent_id` is a self-referencing foreign key that supports hierarchical (tree) structure.
- If `parent_id` is `NULL`, the member is a top-level parent.
- On deletion of a parent, its children are also deleted automatically (`ON DELETE CASCADE`).


## 🎥 Submission Guidelines

- Zip the entire project folder including the `family_tree.sql` file
- Record a screen video showing how you:
- Load and view the family tree
- Add a new member (with and without parent)
- Confirm the tree updates live without refresh
- You may use **Loom** or **Nimbus** extension to record your screen
- Submit the `.zip` and video link via email reply as requested

---

## 🧑‍💻 Developer

**Manit Singh**  
📧 manitcodes247@gmail.com  
📱 +91-9876543210  
🖥️ https://github.com/manitcodes247/family_tree/

---

## 📝 License

This project is submitted as part of a **Machine Test** for **NADSOFT Recruitment** and is not licensed for commercial use.

---

> ⚠️ NOTE: Ensure your WAMP server is running before testing the project.
