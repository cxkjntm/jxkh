DELIMITER $$

USE `jxkh`$$

DROP TRIGGER /*!50032 IF EXISTS */ `update_grade_zc`$$

CREATE
    /*!50017 DEFINER = 'root'@'localhost' */
    TRIGGER `update_grade_zc` BEFORE INSERT ON `qz_ldcykhinfo_472739` 
    FOR EACH ROW -- 正副级干部由于能够评价除本部门单位外的所有单位，故而也能评价机关单位
/*
注 ： 得分率如此计算： 非常满意 1.0 ，满意 0.8 ，基本满意 0.6，不满意 0
检索投票人的levelid
	switch (LeveID){
		 case 1 : 校领导评价中层干部： 计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价分数比例 
		 case 2 : if (BPleID = 2) { 处级领导互评： 计算除本单位的处级领导所有处级领导数量， 单位票数/处级领导数量*本票得分率*处级领导互评分数比例 }
							if (BPleID = 3) { 处级领导评价副处级领导： 计算本部门正处级领导数量， 			
							单位票数/处级领导数量*本票得分率*处级领导评价副处级领导分数比例}
		 case 3 : 处级领导互评： 计算单位的处级领导所有处级领导数量， 单位票数/处级领导数量*本票得分率*副处级领导互评分数比例
		 default : 普通职工（包括教工代表）评价中层干部： 计算本部门普通职工数量，
							单位票数/普通职工数量*本票得分率*普通职工评价中层干部分数比例
							}
*/
BEGIN
DECLARE xld INT ;
DECLARE jg INT ;
DECLARE cjgb INT;
DECLARE bbzz INT;
DECLARE leID INT ;
DECLARE dept INT;
DECLARE BPleID INT;
DECLARE fzgb INT;
SET xld =( SELECT COUNT(*) num FROM userinformation WHERE LevelID = 1);
SET dept = (SELECT DeptID FROM userinfo WHERE UserID=new.UserID);
SET jg = (SELECT COUNT(*) FROM userinformation WHERE DeptID = dept  AND LevelID >= 4);
SET cjgb = (SELECT COUNT(*) FROM userinformation WHERE (LevelID = 2 OR LevelID = 3) AND DeptID <> dept) ;
SET bbzz = (SELECT COUNT(*) FROM userinformation WHERE DeptID = dept AND LevelID = 2);
SET leID = (SELECT LevelID FROM userinfo WHERE UserID = new.UserID);
SET BPleID = (SELECT LevelID FROM userinfo WHERE UserID = new.BPUserID);
IF(leID = 1) THEN 
	IF (new.ZTPJ = 0) THEN 
	UPDATE grades_472739 SET grade = grade + 1.00/xld *20 WHERE UserID = new.BPUserID; END IF;
	IF (new.ZTPJ = 1) THEN
	UPDATE grades_472739 SET grade = grade + 1.00/xld *16 WHERE UserID = new.BPUserID; END IF;
	IF (new.ZTPJ = 2) THEN
	UPDATE grades_472739 SET grade = grade + 1.00/xld *12 WHERE UserID = new.BPUserID; END IF;
END IF;
IF( leID = 2) THEN 
		-- 正职互评
	IF (BPleID = 2 OR BPleID = 3) THEN 
		IF (new.ZTPJ = 0) THEN 
		UPDATE grades_472739 SET grade = grade + 1.00/cjgb *20 WHERE UserID = new.BPUserID; END IF;
		IF (new.ZTPJ = 1) THEN
		UPDATE grades_472739 SET grade = grade + 1.00/cjgb *16 WHERE UserID = new.BPUserID; END IF;
		IF (new.ZTPJ = 2) THEN
		UPDATE grades_472739 SET grade = grade + 1.00/cjgb *12 WHERE UserID = new.BPUserID; END IF;
	END IF;
	-- 正职评副职
	IF (BPleID = 3) THEN
		IF (new.ZTPJ = 0) THEN 
		UPDATE grades_472739 SET grade = grade + 1.00/bbzz *10 WHERE UserID = new.BPUserID; END IF;
		IF (new.ZTPJ = 1) THEN
		UPDATE grades_472739 SET grade = grade + 1.00/bbzz *8 WHERE UserID = new.BPUserID; END IF;
		IF (new.ZTPJ = 2) THEN
		UPDATE grades_472739 SET grade = grade + 1.00/bbzz *6 WHERE UserID = new.BPUserID; END IF;
	END IF;
END IF;
IF( leID = 3) THEN 
	IF (new.ZTPJ = 0) THEN 
		UPDATE grades_472739 SET grade = grade + 1.00/cjgb *20 WHERE UserID = new.BPUserID; END IF;
		IF (new.ZTPJ = 1) THEN
		UPDATE grades_472739 SET grade = grade + 1.00/cjgb *16 WHERE UserID = new.BPUserID; END IF;
		IF (new.ZTPJ = 2) THEN
		UPDATE grades_472739 SET grade = grade + 1.00/cjgb *12 WHERE UserID = new.BPUserID; END IF;
END IF;
IF(leID >= 4) THEN 
	IF (new.ZTPJ = 0) THEN
	UPDATE grades_472739 SET grade = grade + 1.00/jg *40 WHERE UserID = new.BPUserID; END IF;
	IF (new.ZTPJ = 1) THEN
	UPDATE grades_472739 SET grade = grade + 1.00/jg *32 WHERE UserID = new.BPUserID; END IF;
	IF (new.ZTPJ = 2) THEN
	UPDATE grades_472739 SET grade = grade + 1.00/jg *24 WHERE UserID = new.BPUserID; END IF;
END IF;
	END;
$$

DELIMITER ;