DELIMITER //
CREATE PROCEDURE checkMessageNum(IN insId INT, IN max INT)
	BEGIN
		DECLARE num INT;
		DECLARE del INT;
		DECLARE delNum INT;
		DECLARE v INT;
		SET num = (SELECT COUNT(time) FROM chat_room WHERE insId = insId);
		IF num > max THEN
			SET delNum = num - max;
			SET v = 0;
			WHILE v < delNum DO
				SET del = (SELECT time FROM chat_room WHERE insId=insId ORDER BY time ASC LIMIT 1);
				DELETE FROM chat_room WHERE time=del;
				SET v = v+1;
			END WHILE;
		END IF;
	END //
DELIMITER ;