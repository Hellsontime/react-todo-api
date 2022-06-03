CREATE DATABASE IF NOT EXISTS db_todo;

GRANT ALL PRIVILEGES ON db_todo.* TO 'todo-admin'@'%' IDENTIFIED BY 'somepassword';
