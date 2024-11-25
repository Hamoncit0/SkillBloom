
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
