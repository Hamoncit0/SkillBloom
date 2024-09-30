DELIMITER

CREATE PROCEDURE register_user (
    IN p_firstName VARCHAR(50),
    IN p_lastName VARCHAR(50),
    IN p_email VARCHAR(50),
    IN p_gender ENUM('m', 'f', 'o'),
    IN p_password VARCHAR(20),
    IN pfpPath VARCHAR(255),
    IN p_birthdate DATE,
    IN p_idRol INT
)
BEGIN
    INSERT INTO user (firstName, lastName, email, gender, password, birthdate, pfpPath, idRol)
    VALUES (p_firstName, p_lastName, p_email, p_gender, p_password, p_birthdate, pfpPath, p_idRol);
END

DELIMITER;

DELIMITER

CREATE PROCEDURE login_user (
    IN p_email VARCHAR(50),
    IN p_password VARCHAR(20)
)
BEGIN
    DECLARE p_userId INT;
    DECLARE p_status VARCHAR(20);
    DECLARE p_message VARCHAR(255);

    -- Buscar el usuario y verificar su contraseña y estado
    SELECT id, status INTO p_userId, p_status
    FROM user
    WHERE email = p_email AND password = p_password;

    -- Validar si se encontró el usuario
    IF p_userId IS NOT NULL THEN
        -- Verificar el estado del usuario
        IF p_status = 'active' THEN
            SET p_message = 'Login exitoso.';
        ELSEIF p_status = 'blocked' THEN
            SET p_message = 'La cuenta está bloqueada.';
            SET p_userId = NULL;  -- No permitir el login si está bloqueado
        ELSEIF p_status = 'deleted' THEN
            SET p_message = 'La cuenta ha sido eliminada.';
            SET p_userId = NULL;  -- No permitir el login si la cuenta fue eliminada
        END IF;
    ELSE
        SET p_message = 'Credenciales incorrectas.';
        SET p_userId = NULL;
        SET p_status = NULL;
    END IF;

    -- Devolver los resultados automáticamente
    SELECT p_userId AS userId, p_status AS status, p_message AS message;
END

DELIMITER;