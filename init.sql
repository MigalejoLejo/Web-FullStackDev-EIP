CREATE DATABASE IF NOT EXISTS tasksapp;

USE tasksapp;

-- Insert sample data into 'lists' table
INSERT INTO tasklists (name) VALUES
("Inbox"), ("Inbox"), ("Inbox"),
('Sacar los fantasmas de Mansión de Luigi'),
('Salvar a la Princesa Peach de bowser (otra vez)'),
('Conseguir novia'),
('Governar el reino champiñón');

-- Insert sample data into 'users' table
INSERT INTO users (name, email, password) VALUES
('Mario', 'mario@example.com', '$2y$12$1x6uyfRzX2tCM04MfHhXNOShlzKR6JHD/i3EXKaPXncwu2FUamLx.'),
('Luigi', 'luigi@example.com','$2y$12$1x6uyfRzX2tCM04MfHhXNOShlzKR6JHD/i3EXKaPXncwu2FUamLx.'),
('Peach', 'peach@example.com','$2y$12$1x6uyfRzX2tCM04MfHhXNOShlzKR6JHD/i3EXKaPXncwu2FUamLx.');

-- Insert sample data into 'tasks' table
INSERT INTO tasks (title, description, list_id) VALUES
    ('Espantar a King Buu', 'Este fantasma esta volviendo loco a Luigi', 4 ),
    ('Encontrar el Barco flotante de Bowser', 'Un toad dijo que lo vio flotando por la senda de chocolate', 5 ),
    ('Encontrar una Power Star', 'Puede ayudar contra Bowser', 5),
    ('Hablar con Toad', 'Puede que tenga información sobre las estrellas', 5),
    ('Invitar a salir a Daisy', 6),
    ('Hacer reforzar la seguridad', 'Bowser me ha vuelto a secuestrar... que horror', 7)

INSERT INTO users_tasklists (user_id, list_id) VALUES
    (1, 1), (2, 2), (3, 3), (1, 4), (1, 5), (2, 5), (2, 6), (3,7);
