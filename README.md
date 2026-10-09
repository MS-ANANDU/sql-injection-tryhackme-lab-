# SQL Injection TryHackMe-Style Lab

## Objective
A practical, local lab for learning SQL Injection techniques in a safe, controlled environment.

## Technologies
- Kali Linux, Apache2, PHP, MariaDB, Firefox

## Setup Instructions
1. Install Apache and MariaDB: `sudo apt install apache2 mariadb-server`
2. Run `setup.sql` to create the database, tables, and lab user
3. Copy files from `app/` to `/var/www/html/sqli-lab/`
4. Update `db.php` with your own database password
5. Start services: `sudo systemctl start apache2 mariadb`
6. Visit `http://localhost/sqli-lab/`

## Challenges
### Challenge 1: Login Bypass
Bypass authentication using SQL injection in the login form (`index.php`).

### Challenge 2: UNION-Based Extraction
Use UNION-based SQL injection on the search feature (`search.php`) to extract data from the `users` table.

## Hints
- Identify where user input is concatenated directly into SQL queries
- Determine the column count using trial and error
- Match your UNION SELECT column count to the original query

## Solutions
**Challenge 1:** Username: `admin' -- `, Password: (anything)
**Challenge 2:** `?q=xyz' UNION SELECT username, password FROM users -- -`

## Learning Outcomes
Understanding of SQL injection mechanics, UNION-based attacks, and the importance of parameterized queries over raw string concatenation.
