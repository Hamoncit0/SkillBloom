
CREATE PROCEDURE create_chat(
    IN p_idUser1 INT,
    IN p_idUser2 INT
)
BEGIN
    INSERT INTO chat(idUser1, idUser2)
    VALUES(LEAST(p_idUser1, p_idUser2), GREATEST(p_idUser1, p_idUser2));
END

CREATE PROCEDURE send_message(
    IN p_idChat INT,
    IN p_idSender INT,
    IN content TEXT
)
BEGIN
    INSERT INTO messages( idChat, idSender, content)
    VALUES(p_idChat, p_idSender, content);
END

CALL send_message(1, 65, 'Holaaa');
CALL send_message(1, 64, 'Holii');
CALL send_message(1, 65, 'Como estas?');
CALL send_message(1, 64, 'Bien y tu?');

CREATE VIEW v_chats AS
SELECT chat.*, CONCAT( user1.firstName ," ", user1.lastName) as user1, CONCAT (user2.firstName, " ", user2.lastName) as user2
FROM chat
JOIN user as user1 ON chat.idUser1 = user1.id
JOIN user as user2 ON chat.idUser2 = user2.id;

WHERE idUser1 = 65 OR idUser2 = 65;

CREATE VIEW v_messages AS

SELECT messages.*
FROM messages;

SELECT user.id, CONCAT(user.firstName, ' ', user.lastName) AS fullName
FROM user
WHERE user.id != 65 -- Excluir el usuario especificado
  AND user.id NOT IN (
      SELECT idUser1 FROM chat WHERE idUser2 = 65
      UNION
      SELECT idUser2 FROM chat WHERE idUser1 = 65
  );
  
  SELECT * FROM v_chats WHERE idUser1 = 64 AND idUser2 = 57 OR idUser1 = 57 AND idUser2 = 64 ORDER BY createdAt DESC