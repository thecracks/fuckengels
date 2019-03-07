
drop trigger if exists tg_crea_formula_area;
delimiter //

CREATE TRIGGER tg_crea_formula_area 
AFTER INSERT ON area FOR EACH ROW
BEGIN

	declare _anio_id integer;
    declare msg varchar(100);
	set _anio_id = (select anio_id from anio_academico where active='Y' limit 1);
    
	-- set msg = concat('GGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGGG', 'probandooo');
	-- signal sqlstate '45000' set message_text = msg;

    insert ignore into `formula_area` (`area_id`,`anio_id`, `formula`,`created`,`updated`,`createby`,`updateby`) 
    values (new.area_id,_anio_id,"",now(),now(),new.createby,new.updateby);
    
END//
DELIMITER ;
































