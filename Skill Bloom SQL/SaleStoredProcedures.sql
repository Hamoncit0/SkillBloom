
INSERT INTO payment_method(name, description) VALUES('Tarjeta', ''), ('PayPal', ''), ('Transferencia', '');

CREATE PROCEDURE makeASale(
    IN p_user_id INT,
    IN total DECIMAL(10, 2),
    IN p_paymentMethod INT,
    IN p_idCourses VARCHAR(255)
)
BEGIN
    DECLARE course_id INT;
    DECLARE sale_id INT;

    -- Crear la venta en la tabla `sale`
    INSERT INTO sale (idUser, total, idPaymentMethod) 
    VALUES (p_user_id, total, p_paymentMethod);

    -- Obtener el ID de la venta recién creada
    SET sale_id = LAST_INSERT_ID();

    -- Procesar los IDs de los cursos en la lista separada por comas
    WHILE LOCATE(',', p_idCourses) > 0 DO
        -- Obtener el primer ID del curso de la cadena
        SET course_id = CAST(SUBSTRING_INDEX(p_idCourses, ',', 1) AS UNSIGNED);

        -- Insertar en la tabla `sale_detail`
        INSERT INTO sale_detail (idSale, idCourse, price)
        VALUES (sale_id, course_id, (SELECT price FROM course WHERE id = course_id));

        -- Remover el ID procesado de la cadena
        SET p_idCourses = SUBSTRING(p_idCourses FROM LOCATE(',', p_idCourses) + 1);
    END WHILE;

    -- Insertar el último curso (si queda alguno)
    IF LENGTH(p_idCourses) > 0 THEN
        SET course_id = CAST(p_idCourses AS UNSIGNED);
        INSERT INTO sale_detail (idSale, idCourse, price)
        VALUES (sale_id, course_id, (SELECT price FROM course WHERE id = course_id));
    END IF;
END 
