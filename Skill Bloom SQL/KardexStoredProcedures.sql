
CREATE VIEW v_kardex
AS
SELECT kardex.*, course.title, category.name AS category, user.firstName, user.lastName FROM kardex
JOIN course ON kardex.idCourse = course.id
JOIN user ON course.idInstructor = user.id
JOIN category ON course.idCategory = category.id;
SELECT * FROM v_kardex WHERE idUser = 65;

CREATE VIEW v_course_with_progress
AS
SELECT course.*, user.firstName, user.lastName, kardex.idUser, kardex.progress, kardex.lastLevel, kardex.status, kardex.lastEntry, kardex.enrolledAt
FROM course
JOIN kardex ON course.id = kardex.idCourse
JOIN user ON course.idInstructor = user.id;


CREATE PROCEDURE update_kardex(
    IN p_idCourse INT,
    IN p_idUser INT,
    IN p_lastLevel INT
)
BEGIN
    DECLARE kardex_id INT;
    DECLARE progress decimal(5,2);

    SELECT id INTO kardex_id FROM kardex WHERE idCourse = p_idCourse AND idUser = p_idUser;

        
        SELECT calculate_progress_percentage(p_lastLevel, p_idCourse) INTO progress;

        IF progress = 100 THEN
            UPDATE kardex
            SET lastLevel = p_lastLevel,
                lastEntry = CURRENT_TIMESTAMP,
                status = 'finished',
                progress = progress,
                endDate = CURRENT_TIMESTAMP
            WHERE id = kardex_id;
        ELSEIF progress < 100 AND progress>0 THEN
            UPDATE kardex
                SET lastLevel = p_lastLevel,
                    lastEntry = CURRENT_TIMESTAMP,
                    status = 'in progress',
                    progress = progress
            WHERE id = kardex_id;
        ELSE
            UPDATE kardex
                SET lastLevel = p_lastLevel,
                    lastEntry = CURRENT_TIMESTAMP,
                    status = 'uninitiated',
                    progress = progress
            WHERE id = kardex_id;
        END IF;

END

CREATE FUNCTION calculate_progress_percentage(f_levelOrder INT, f_idCourse INT)
RETURNS DECIMAL(5,2)
DETERMINISTIC
BEGIN
    DECLARE totalLevels INT;

    SELECT COUNT(id) INTO totalLevels FROM course_level WHERE idCourse = f_idCourse;

    IF totalLevels = 0 THEN
        RETURN 0;
    END IF;
    RETURN (f_levelOrder/totalLevels) * 100;
END
SELECT lastLevel FROM v_kardex WHERE idUser = 65 && idCourse = 7;
