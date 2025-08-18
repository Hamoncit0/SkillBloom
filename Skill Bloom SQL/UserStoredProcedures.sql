
CREATE PROCEDURE register_user (
    IN p_firstName VARCHAR(50),
    IN p_lastName VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_gender ENUM('m', 'f', 'o'),
    IN p_password VARCHAR(20),
    IN p_birthdate DATE,
    IN p_idRol INT
)
BEGIN
    INSERT INTO user (firstName, lastName, email, gender, password, birthdate, idRol)
    VALUES (p_firstName, p_lastName, p_email, p_gender, p_password, p_birthdate, p_idRol);
END

CREATE PROCEDURE login_user (
    IN p_email VARCHAR(50),
    IN p_password VARCHAR(20)
)
BEGIN
    DECLARE p_userId INT;
    DECLARE p_status VARCHAR(20);
    DECLARE p_message VARCHAR(255);
    DECLARE intentos TINYINT;
    -- Buscar el usuario y verificar su contraseña y estado
    SELECT id, status INTO p_userId, p_status
    FROM user
    WHERE email = p_email AND password = p_password;

    -- Validar si se encontró el usuario
    IF p_userId IS NOT NULL THEN
        -- Verificar el estado del usuario
        IF p_status = 'active' THEN
            UPDATE user SET tries = 0 WHERE id = p_userId;
            SET p_message = 'Login exitoso.';
        ELSEIF p_status = 'blocked' THEN
            SET p_message = 'La cuenta está bloqueada.';
        ELSEIF p_status = 'deleted' THEN
            SET p_message = 'La cuenta ha sido eliminada.';
        END IF;
    ELSE
        SET p_message = 'Credenciales incorrectas.';

         -- Checar si el usuario existe a través del correo
        SELECT id, tries INTO p_userId, intentos
        FROM user
        WHERE email = p_email;

        -- Si el usuario existe, incrementar el contador de intentos
        IF p_userId IS NOT NULL THEN
            IF intentos < 2 THEN
                SET intentos = intentos + 1;
                UPDATE user SET tries = intentos WHERE id = p_userId;
            ELSEIF intentos >=2 THEN
                SET intentos = 3;
                UPDATE user SET tries = intentos, status = 'blocked' WHERE id = p_userId;
            END IF;
        END IF;

        SET p_userId = NULL;
        SET p_status = NULL;
    END IF;

    -- Devolver los resultados automáticamente
    SELECT p_userId AS userId, p_status AS status, p_message AS message;
END

CREATE PROCEDURE update_user(
    IN userId INT,
    IN firstName VARCHAR(50),
    IN lastName VARCHAR(50),
    IN gender ENUM('m', 'f', 'o'),
    IN birthdate DATE
)
BEGIN
    UPDATE user
    SET
        firstName = firstName,
        lastName = lastName,
        gender = gender,
        birthdate = birthdate,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = userId;
END 

CREATE PROCEDURE change_password(
    IN userId INT,
    IN newPassword VARCHAR(20)
)
BEGIN
    UPDATE user
    SET
        password = newPassword,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = userId;
END 

CREATE PROCEDURE change_pfp(
    IN userId INT,
    IN newPfpPath BLOB
)
BEGIN
    UPDATE user
    SET
        pfp = newPfpPath,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = userId;
END 


CREATE PROCEDURE getinfo_user(
    IN userId INT
)
BEGIN
    SELECT
        id,
        firstName,
        lastName,
        email,
        gender,
        birthdate,
        pfp,
        idRol,
        status,
        createdAt,
        updatedAt,
        deletedAt
    FROM user
    WHERE id = userId;
END 


CREATE VIEW v_users AS
SELECT
        id,
        firstName,
        lastName,
        email,
        gender,
        birthdate,
        pfp,
        idRol,
        status,
        createdAt,
        updatedAt,
        deletedAt
    FROM user;

CREATE PROCEDURE change_userStatus(
    IN userId INT,
    IN NewStatus VARCHAR(15)
)
BEGIN
    UPDATE user
    SET
        status = NewStatus,
        tries = 0,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = userId;
END 


CREATE FUNCTION generarContrasena()
RETURNS VARCHAR(8)
DETERMINISTIC
BEGIN
    DECLARE caracteres VARCHAR(100) DEFAULT 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    DECLARE contrasena VARCHAR(8) DEFAULT '';
    DECLARE i INT DEFAULT 1;

    WHILE i <= 8 DO
        SET contrasena = CONCAT(contrasena, SUBSTRING(caracteres, FLOOR(1 + RAND() * LENGTH(caracteres)), 1));
        SET i = i + 1;
    END WHILE;

    RETURN contrasena;
END 

select generarContrasena() as password;
CREATE PROCEDURE generate_and_change_password
(
    IN userId INT
)
BEGIN

    DECLARE newpassword VARCHAR(10);

    SELECT generarContrasena() INTO newpassword;

    UPDATE user
    SET password = newpassword
    WHERE id = userId;
    
    SELECT newPassword as newPassword;
END