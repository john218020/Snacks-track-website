CREATE DATABASE IF NOT EXISTS snackshop;
USE snackshop;

CREATE TABLE IF NOT EXISTS visitors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ip_address VARCHAR(50),
  user_agent TEXT,
  page_url VARCHAR(255),
  visit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS cart_actions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  action VARCHAR(20),
  ip_address VARCHAR(50),
  action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
