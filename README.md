# Login-System
Login system using PHP, MySQL, HTML, and CSS.

This is a login system that stores user data in a MySQL database, users are able to signup, login, and logout.

## Getting Started

These instructions will explain how to get this project up and running on your local machine

### Prerequisites

```
I used MAMP as a database management system, and in the dbh.php file I used port:8889, 
if you're using XAMP or deploying this yourself you'll need to edit that file.

The table i'm using for the project has the following structure

CREATE TABLE users (
  user_id INTEGER NOT NULL AUTO_INCREMENT,
  email VARCHAR(255),
  username VARCHAR(255),
  password VARCHAR(255),
  PRIMARY KEY(user_id)
) ENGINE = InnoDB;

