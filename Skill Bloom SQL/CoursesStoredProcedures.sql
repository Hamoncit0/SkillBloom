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
SELECT course.*, category.name, user.firstName, user.lastName
FROM course
JOIN category ON course.idCategory = category.id
JOIN user ON course.idInstructor = user.id;

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

 -- muestra los cursos que no tiene el usuario
-- CREATE VIEW v_courses_for_user
-- AS
-- SELECT course.*, category.name as category, user.firstName, user.lastName
-- FROM course
-- JOIN category ON course.idCategory = category.id
-- JOIN user ON course.idInstructor = user.id
-- LEFT JOIN kardex ON course.id = kardex.idCourse and kardex.idUser = 65
-- WHERE kardex.id IS NULL  ;




SELECT *, kardex.idUser
FROM v_courses
LEFT JOIN kardex ON v_courses.id = kardex.idCourse AND kardex.idUser = 0 WHERE kardex.id IS NULL AND deletedAt IS NULL;

CREATE VIEW v_getLevelContent
AS
SELECT level.*, course_level.levelOrder, course_level.idCourse, course.idInstructor
FROM course_level
JOIN level ON course_level.idLevel = level.id
JOIN course ON course_level.idCourse = course.id ;