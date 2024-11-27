DELIMITER
CREATE PROCEDURE register_course(
    IN p_title VARCHAR(100),
    IN p_description TEXT,
    IN p_previewImage BLOB,
    IN p_previewVideoPath VARCHAR(255),
    IN p_price DECIMAL(10, 2),
    IN p_idCategory INT,
    IN p_idInstructor INT
)
BEGIN
    INSERT INTO course(title, description, previewImage, previewVideoPath, price, idCategory, idInstructor)
    VALUES( p_title, p_description, p_previewImage, p_previewVideoPath, p_price, p_idCategory, p_idInstructor);

    SELECT LAST_INSERT_ID() AS courseId;
END
DELIMITER;

DELIMITER

CREATE PROCEDURE register_level(
    IN p_title VARCHAR(100),
    IN p_description TEXT,
    IN p_contentPath VARCHAR(255)
)
BEGIN
    INSERT INTO level(title, description, contentPath)
    VALUES(p_title, p_description, p_contentPath);
    SELECT LAST_INSERT_ID() AS levelId;
END

DELIMITER;

CREATE PROCEDURE delete_order(
    IN p_idCourse INT
)
BEGIN
    DELETE FROM course_level WHERE idCourse = p_idCourse;
END;


CREATE PROCEDURE register_course_level(
    IN p_idCourse INT,
    IN p_idLevels VARCHAR(255)  -- Comma-separated list of level IDs (e.g., '1,2,3')
)
BEGIN
    DECLARE level_id INT;
    DECLARE level_order INT DEFAULT 1;

    -- Loop through each level ID in the comma-separated string
    WHILE LOCATE(',', p_idLevels) > 0 DO
        SET level_id = CAST(SUBSTRING_INDEX(p_idLevels, ',', 1) AS UNSIGNED);
        
        -- Insert into course_level table
        INSERT INTO course_level(idCourse, idLevel, levelOrder)
        VALUES (p_idCourse, level_id, level_order);

        -- Increment order and remove the processed level ID
        SET level_order = level_order + 1;
        SET p_idLevels = SUBSTRING(p_idLevels FROM LOCATE(',', p_idLevels) + 1);
    END WHILE;

    -- Insert the last level ID (if any)
    IF LENGTH(p_idLevels) > 0 THEN
        SET level_id = CAST(p_idLevels AS UNSIGNED);
        INSERT INTO course_level(idCourse, idLevel, levelOrder)
        VALUES (p_idCourse, level_id, level_order);
    END IF;
END;


CREATE VIEW v_courses AS
SELECT course.*, category.name, user.firstName, user.lastName, AVG(review.rating) as rating
FROM course
JOIN category ON course.idCategory = category.id
JOIN user ON course.idInstructor = user.id
LEFT JOIN review ON review.idCourse = course.id
GROUP BY course.id;

CREATE VIEW v_courses_levels AS
SELECT course.*, category.name as category, user.firstName, user.lastName, level.id as idLevel, level.title as levelTitle, level.description as levelDescription, level.contentPath
FROM course_level
JOIN course ON course_level.idCourse = course.id
JOIN level ON course_level.idLevel = level.id
JOIN user ON course.idInstructor = user.id
JOIN category ON course.idCategory = category.id;

CREATE PROCEDURE deleteCourse(
    IN p_id INT
)
BEGIN
    UPDATE course
    SET 
        deletedAt = CURRENT_TIMESTAMP
    WHERE id = p_id;
END

CREATE PROCEDURE reviveCourse(
    IN p_id INT
)
BEGIN
    UPDATE course
    SET 
        deletedAt = NULL
    WHERE id = p_id;
END


SELECT *, kardex.idUser
FROM v_courses
LEFT JOIN kardex ON v_courses.id = kardex.idCourse AND kardex.idUser = 0 WHERE kardex.id IS NULL AND deletedAt IS NULL;

CREATE VIEW v_getLevelContent
AS
SELECT level.*, course_level.levelOrder, course_level.idCourse, course.idInstructor
FROM course_level
JOIN level ON course_level.idLevel = level.id
JOIN course ON course_level.idCourse = course.id ;

CREATE VIEW v_students_per_course
AS
SELECT DISTINCT user.id, Student.firstName, Student.lastName, course.title, kardex.progress, kardex.enrolledAt, kardex.status, sale_detail.price, payment_method.name
FROM course
JOIN user ON course.idInstructor = user.id
JOIN kardex ON course.id = kardex.idCourse
JOIN sale_detail ON sale_detail.idCourse = course.id
JOIN sale ON sale_detail.idSale = sale.id
JOIN payment_method ON sale.idPaymentMethod = payment_method.id
JOIN user as Student ON Student.id = kardex.idUser;

CREATE VIEW v_sales_summary
AS
SELECT course.idInstructor, course.title, COUNT(DISTINCT kardex.id) as students, AVG(review.rating) as rating, course.price, SUM(CASE 
            WHEN MONTH(sale.createdAt) = MONTH(CURDATE()) 
            AND YEAR(sale.createdAt) = YEAR(CURDATE()) 
            THEN sale_detail.price 
            ELSE 0 
        END) AS per_month, SUM(sale_detail.price) as total
FROM course
JOIN kardex ON course.id = kardex.idCourse
LEFT JOIN review ON course.id = review.idCourse
JOIN sale_detail ON course.id = sale_detail.idCourse
JOIN sale ON sale.id = sale_detail.idSale
GROUP BY course.id;


CREATE VIEW v_courses_bought AS

SELECT 
    sale_detail.idCourse, 
    SUM(sale_detail.price) AS total_price, 
    SUM(CASE 
            WHEN MONTH(sale.createdAt) = MONTH(CURDATE()) 
            AND YEAR(sale.createdAt) = YEAR(CURDATE()) 
            THEN sale_detail.price 
            ELSE 0 
        END) AS total_per_month
FROM sale_detail
JOIN sale ON sale_detail.idSale = sale.id
GROUP BY sale_detail.idCourse;

CREATE VIEW v_sales_summary
AS
SELECT 
    course.idInstructor, 
    course.title, 
    COUNT(DISTINCT kardex.id) AS students, 
    AVG(review.rating) AS rating, 
    course.price, 
    COALESCE(v_courses_bought.total_per_month, 0) AS per_month, 
    COALESCE(v_courses_bought.total_price, 0) AS total
FROM course
LEFT JOIN kardex ON course.id = kardex.idCourse
LEFT JOIN review ON course.id = review.idCourse
LEFT JOIN v_courses_bought ON course.id = v_courses_bought.idCourse
GROUP BY course.id, course.idInstructor, course.title, course.price;


CREATE VIEW v_course_stadistics
AS
SELECT course.id, AVG(review.rating) as rating, COUNT(DISTINCT kardex.id) as enrolledStudents, COUNT(DISTINCT case when kardex.progress = 100 then kardex.id end) as finishedStudents, v_courses_bought.total_price AS total
FROM course
LEFT JOIN review ON review.idCourse = course.id
JOIN kardex ON kardex.idCourse = course.id
JOIN v_courses_bought ON v_courses_bought.idCourse = course.id
GROUP BY course.id;

CREATE PROCEDURE UpdateCourse(
    IN p_id INT,
    IN p_title VARCHAR(100),
    IN p_description TEXT,
    IN p_previewImage BLOB,
    IN p_previewVideoPath VARCHAR(255),
    IN p_price DECIMAL(10,2),
    IN p_idCategory INT
)
BEGIN
    UPDATE course
    SET
        title = p_title,
        description = p_description,
        previewImage = p_previewImage,
        previewVideoPath = p_previewVideoPath,
        price = p_price,
        idCategory = p_idCategory,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = p_id;
END 

CREATE PROCEDURE UpdateLevel(
    IN p_id INT,
    IN p_title VARCHAR(100),
    IN p_description TEXT,
    IN p_contentPath VARCHAR(255)
)
BEGIN
    UPDATE level
    SET
        title = p_title,
        description = p_description,
        contentPath = p_contentPath,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = p_id;
END 

CREATE PROCEDURE delete_level(
    IN p_id INT
)
BEGIN
    DELETE FROM level WHERE id = p_id;
END 

CREATE TRIGGER after_delete_course_level
AFTER DELETE ON course_level
FOR EACH ROW
BEGIN
    -- Actualizar el lastLevel en kardex si es mayor al nivel eliminado
    UPDATE kardex
    SET lastLevel = 1,
        progress = 0,
        status = 'uninitiated'
        WHERE idCourse = OLD.idCourse
      AND lastLevel > OLD.levelOrder;
END
DROP TRIGGER after_delete_course_level;