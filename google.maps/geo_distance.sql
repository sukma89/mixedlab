-- 
-- MySQL Function used to calculate the distance of two coordinates.
-- Author: James Tang <fwsous@gmail.com>
-- (C) 2010 fwso.cn.
-- 

DELIMITER //
CREATE FUNCTION jmap_distance(lat1 FLOAT, lng1 FLOAT, lat2 FLOAT, lng2 FLOAT) RETURNS FLOAT
BEGIN
	
	DECLARE r INT DEFAULT 6378137;
	DECLARE s0 FLOAT;
	DECLARE s1 FLOAT;
	DECLARE e0 FLOAT;
	DECLARE e1 FLOAT;
	
	DECLARE d0 FLOAT;
	DECLARE d1 FLOAT;
	
	SET s0 = RADIANS(lat1);
	SET s1 = RADIANS(lng1);
	SET e0 = RADIANS(lat2);
	SET e1 = RADIANS(lng2);
	
	SET d0 = ABS(s0 - e0);
	SET d1 = ABS(s1 - e1);
	
	RETURN r * 2 * ASIN(SQRT(POW(SIN(d0/2),2) + COS(s0)*COS(e0)*POW(SIN(d1/2),2)));

END//

DELIMITER ;