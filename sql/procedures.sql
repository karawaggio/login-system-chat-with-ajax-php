DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_new_user`(IN `userName` VARCHAR(30), IN `userEmail` VARCHAR(80), IN `userPwd` TEXT)
    NO SQL
INSERT INTO chat_users(username, email, passwd) VALUES(userName, userEmail, userPwd)
$$ DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_user_info`(IN `userName` VARCHAR(30))
    NO SQL
SELECT chat_users.username, chat_users.passwd
FROM chat_users
WHERE chat_users.username = userName
$$ DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_msg_info`(IN `userName` VARCHAR(30), IN `textMsg` TEXT)
    NO SQL
INSERT INTO chat_msg(username, message, msgtime) VALUES(userName, textMsg, CURRENT_TIMESTAMP)
$$ DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `display_all_messages`()
    NO SQL
SELECT *
FROM chat_msg
ORDER BY id
ASC
$$ DELIMITER ;