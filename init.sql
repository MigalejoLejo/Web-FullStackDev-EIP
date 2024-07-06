CREATE DATABASE IF NOT EXISTS tasksapp;

USE tasksapp;

-- Insert sample data into 'lists' table
INSERT INTO tasklists (name) VALUES ('Super Mario 64'), ('Super Mario Sunshine'), ('Super Mario Galaxy');

-- Insert sample data into 'users' table
INSERT INTO users (name, email, password) VALUES ('Mario', 'mario@example.com', '$2y$12$1x6uyfRzX2tCM04MfHhXNOShlzKR6JHD/i3EXKaPXncwu2FUamLx.'), ('Luigi', 'luigi@example.com','$2y$12$1x6uyfRzX2tCM04MfHhXNOShlzKR6JHD/i3EXKaPXncwu2FUamLx.');

-- Insert sample data into 'tasks' table
INSERT INTO tasks (title, description, list_id) VALUES
    ('Collect 100 coins', 'Collect 100 coins in Super Mario 64', 1 ),
    ('Defeat Bowser', 'Defeat Bowser in Super Mario Sunshine', 2 ),
    ('Find Power Stars', 'Find Power Stars in Super Mario Galaxy', 3);
