CREATE VIEW v_categories AS
SELECT id, name, description, createdAt, deletedAt FROM category;

SELECT * FROM v_categories;

CREATE PROCEDURE create_category(
    IN p_name VARCHAR(20),
    IN p_description VARCHAR(255)
)
BEGIN 
    INSERT INTO category(name, description)
    VALUES(p_name, p_description);
END

CREATE PROCEDURE update_category(
    IN p_id INT,
    IN p_name VARCHAR(20),
    IN p_description VARCHAR(255)
)
BEGIN
    UPDATE category
    SET 
        name = p_name,
        description = p_description,
        updatedAt = CURRENT_TIMESTAMP
    WHERE id = p_id;
END

CREATE PROCEDURE delete_category(
    IN p_id INT
)
BEGIN
    UPDATE category
    SET
        deletedAt  = CURRENT_TIMESTAMP
    WHERE id = p_id;
END