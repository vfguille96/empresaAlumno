DELIMITER ;;
CREATE PROCEDURE `sendEmail`(remitente varchar(255), destinatario varchar(255), titulo varchar(255), tipo varchar(255), mensaje varchar(255))
    COMMENT 'Procedicimiento que envia un email.'
begin
	INSERT INTO correo (remitente, destinatario, fecha, asunto, tipo, cuerpo) VALUES (remitente, destinatario, date(now()), titulo, tipo, mensaje);
end ;;
DELIMITER ;
