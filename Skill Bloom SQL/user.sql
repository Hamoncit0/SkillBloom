INSERT INTO user (firstName, lastName, email, gender, password, birthdate, idRol, status)
VALUES
('John', 'Doe', 'john.doe@example.com', 'm', 'password123', '1990-06-15', 1, 'active'),
('Jane', 'Smith', 'jane.smith@example.com', 'f', 'password456', '1988-04-22',  2, 'active'),
('Sam', 'Green', 'sam.green@example.com', 'm', 'pass789', '1995-11-30',  3, 'active'),
('Lisa', 'Brown', 'lisa.brown@example.com', 'f', 'mypassword', '1992-02-13', 3, 'blocked'),
('Carlos', 'Diaz', 'carlos.diaz@example.com', 'm', 'carlospass', '1994-08-05', 2, 'active'),
('Emma', 'Taylor', 'emma.taylor@example.com', 'f', 'emmapass', '1989-12-19', 3, 'deleted'),
('Oliver', 'Jones', 'oliver.jones@example.com', 'm', 'oliverpass', '1991-09-28', 1, 'active'),
('Sophia', 'Williams', 'sophia.williams@example.com', 'f', 'sophiapass', '1993-07-03', 2, 'active');

SELECT* FROM user;
CALL change_password (1, 'passchida');
CALL change_pfp (1, 'imagenChida.png');
CALL getinfo_user (1);
CALL login_user ('jane.smith@example.com', 'password456');
CALL register_user('Ana', 'Hernandez', 'ana@gmail.com', 'm', 'passchidota', '', '2004-10-18', 3);
CALL update_user(9, 'Ana', 'Hernandez', 'f', '2004-10-18');

SELECT * FROM v_users;

CALL change_userStatus(9, 'active');