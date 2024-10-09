INSERT INTO user (firstName, lastName, email, gender, password, birthdate, pfpPath, idRol, status)
VALUES
('John', 'Doe', 'john.doe@example.com', 'm', 'password123', '1990-06-15', '/images/john.jpg', 1, 'active'),
('Jane', 'Smith', 'jane.smith@example.com', 'f', 'password456', '1988-04-22', '/images/jane.jpg', 2, 'active'),
('Sam', 'Green', 'sam.green@example.com', 'm', 'pass789', '1995-11-30', '/images/sam.jpg', 3, 'active'),
('Lisa', 'Brown', 'lisa.brown@example.com', 'f', 'mypassword', '1992-02-13', '/images/lisa.jpg', 3, 'blocked'),
('Carlos', 'Diaz', 'carlos.diaz@example.com', 'm', 'carlospass', '1994-08-05', '/images/carlos.jpg', 2, 'active'),
('Emma', 'Taylor', 'emma.taylor@example.com', 'f', 'emmapass', '1989-12-19', '/images/emma.jpg', 3, 'deleted'),
('Oliver', 'Jones', 'oliver.jones@example.com', 'm', 'oliverpass', '1991-09-28', '/images/oliver.jpg', 1, 'active'),
('Sophia', 'Williams', 'sophia.williams@example.com', 'f', 'sophiapass', '1993-07-03', '/images/sophia.jpg', 2, 'active');


CALL change_password (1, 'passchida');
CALL change_pfp (1, 'imagenChida.png');
CALL getinfo_user (1);
CALL login_user ('john.doe@example.com', 'passchida');
CALL register_user('Ana', 'Hernandez', 'ana@gmail.com', 'm', 'passchidota', '', '2004-10-18', 3);
CALL update_user(9, 'Ana', 'Hernandez', 'f', '2004-10-18');