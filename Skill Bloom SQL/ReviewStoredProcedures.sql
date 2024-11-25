
CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUser INT,
    idCourse INT,
    review TEXT,
    rating TINYINT NOT NULL,
    CHECK (
        rating >= 0
        AND rating <= 5
    ),
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deletedAt TIMESTAMP,
    FOREIGN KEY (idUser) REFERENCES user (id),
    FOREIGN KEY (idCourse) REFERENCES course (id)
);

CREATE PROCEDURE new_review(
    IN p_idUser INT,
    IN p_idCourse INT,
    IN p_review TEXT,
    IN p_rating TINYINT
)
BEGIN
    INSERT INTO review(idUser, idCourse, review, rating)
    VALUES(p_idUser, p_idCourse, p_review, p_rating);
END

CREATE PROCEDURE ban_review(
    IN p_id INT
)
BEGIN
    UPDATE review
    SET deletedAt = CURRENT_TIMESTAMP
    WHERE id = p_id;
END

CREATE PROCEDURE unban_review(
    IN p_id INT
)
BEGIN
    UPDATE review
    SET deletedAt = NULL
    WHERE id = p_id;
END

CREATE VIEW v_reviews
AS
SELECT review.*, user.firstName, user.lastName, user.pfp
FROM review
JOIN user ON review.idUser = user.id;