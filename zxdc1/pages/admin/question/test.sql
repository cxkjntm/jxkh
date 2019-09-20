
	DROP TABLE IF EXISTS `grades_472739`;
	CREATE TABLE `grades_472739`  (
	  `ID` int(11) NOT NULL AUTO_INCREMENT,
	  `UserID` int(11) NULL DEFAULT NULL,
	  `grade` float(4, 2) UNSIGNED ZEROFILL NOT NULL,
	  PRIMARY KEY (`ID`) USING BTREE,
	  INDEX `grade_User_472739`(`UserID`) USING BTREE,
	  CONSTRAINT `grade_User_472739` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE = InnoDB AUTO_INCREMENT = 302 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;
	DROP TABLE IF EXISTS `bz_grade_472739`;
	CREATE TABLE `bz_grade_472739`  (
	  `ID` int(11) NOT NULL AUTO_INCREMENT,
	  `DeptID` int(11) NULL DEFAULT NULL,
	  `grade` float(4, 2) UNSIGNED ZEROFILL NOT NULL,
	  PRIMARY KEY (`ID`) USING BTREE
	) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;
		DROP TABLE IF EXISTS `qz_ldbzkhinfo_472739`;
	CREATE TABLE `qz_ldbzkhinfo_472739`  (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `UserID` int(11) NOT NULL,
	  `DeptID` int(11) NOT NULL,
	  `DDJS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LDNL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `GZSJ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LZJS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `XXJY` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `ZTPJ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  PRIMARY KEY (`id`) USING BTREE,
	  INDEX `kh_qzDept_472739`(`DeptID`) USING BTREE,
	  INDEX `kh_qzUser_472739`(`UserID`) USING BTREE,
	  CONSTRAINT `kh_qzDept_472739` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `kh_qzUser_472739` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;
	DROP TRIGGER IF EXISTS `qzbz_472739`;
	delimiter ;;
	CREATE TRIGGER `qzbz_472739` AFTER INSERT ON `qz_ldbzkhinfo_472739` FOR EACH ROW /*
	检索投票人的LevelID
		switch(LevelID){
			case 1 : 校领导评价领导班子：计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价领导班子分数比例
			case 2 or 3 : 中层领导评价其他部门领导班子：计算除本单位的中层领导外的所有中层领导数量，
										单位票数/中层领导数量*本票得分率*中层领导评价其他部门领导班子分数比例
			case 4 or 5 : 本部门职工评价领导班子：计算本部门职工数量，单位票数/职工数量*本票得分率*本部门职工评价领导班子分数比例
			case 6 : 教工代表评价所有领导班子：计算所有教工代表数量，单位票数/教工代表数量*本票得分率*教工代表评价领导班子分数比例
	*/
	begin
	declare xld int ;
	declare jg int ;
	declare gb int ;
	declare db int;
	declare dba int;
	declare dept int;
	declare leID int ;
	set dept = (select DeptID from userinfo where UserID=new.UserID);
	set xld =( select count(*) from userinformation where LevelID = 1);
	set jg = (select count(*) from userinfo where DeptID  = dept and LevelID = 6);
	set gb = (select count(*) from userinformation where (LevelID = 2 or LevelID =3) AND DeptID <> dept) ;
	set db = (select count(*) from userinformation where LevelID = 4 or LevelID = 5) ;
	set leID = (select LevelID from userinfo where UserID = new.UserID);
	if(leID = 1) then 
		if (new.ZTPJ = 0) then 
		update bz_grade_472739 set grade = grade + 1.00/xld *20 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 1) then
		update bz_grade_472739 set grade = grade + 1.00/xld *16 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 2) then
		update bz_grade_472739 set grade = grade + 1.00/xld *12 where DeptID = new.DeptID; end if;
	end if;
	if( leID = 2 or leID = 3) then 
	if (new.ZTPJ = 0) then 
		update bz_grade_472739 set grade = grade + 1.00/gb *20 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 1) then
		update bz_grade_472739 set grade = grade + 1.00/gb *16 where DeptID = new.DeptID; end if;
		if (new.ZTPJ = 2) then
		update bz_grade_472739 set grade = grade + 1.00/gb *12 where DeptID = new.DeptID; end if;
	end if;
	if(leID = 4 or leID = 5) then  
			if (new.ZTPJ = 0) then
			update bz_grade_472739 set grade = grade + 1.00/db *20 where DeptID = new.DeptID; end if;
			if (new.ZTPJ = 1) then
			update bz_grade_472739 set grade = grade + 1.00/db *16 where DeptID = new.DeptID; end if;
			if (new.ZTPJ = 2) then
			update bz_grade_472739 set grade = grade + 1.00/db *12 where DeptID = new.DeptID; end if;
		end if;
	if(leID = 6 ) then  
			if (new.ZTPJ = 0) then
			update bz_grade_472739 set grade = grade + 1.00/jg *40 where DeptID = new.DeptID; end if;
			if (new.ZTPJ = 1) then
			update bz_grade_472739 set grade = grade + 1.00/jg *32 where DeptID = new.DeptID; end if;
			if (new.ZTPJ = 2) then
			update bz_grade_472739 set grade = grade + 1.00/jg *24 where DeptID = new.DeptID; end if;
		end if;
		end
	;;
	delimiter ;

	SET FOREIGN_KEY_CHECKS = 1;
	DROP TABLE IF EXISTS `qz_ldcykhinfo_472739`;
	CREATE TABLE `qz_ldcykhinfo_472739`  (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `UserID` int(11) NOT NULL,
	  `BPUserID` int(11) NOT NULL,
	  `ZZSX` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `GZNL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `GZZF` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `YFBS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LXYZ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LJZV` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `ZTPJ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  PRIMARY KEY (`id`) USING BTREE,
	  INDEX `qzcy_User_472739`(`UserID`) USING BTREE,
	  INDEX `qzcy_BP_472739`(`BPUserID`) USING BTREE,
	  CONSTRAINT `qzcy_BP_472739` FOREIGN KEY (`BPUserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `qzcy_User_472739` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE = InnoDB AUTO_INCREMENT = 177 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

	-- ----------------------------
	-- Triggers structure for table qz_ldcykhinfo_472739
	-- ----------------------------
	DROP TRIGGER IF EXISTS `qzcy_472739`;
	delimiter ;;
	CREATE TRIGGER `qzcy_472739` AFTER INSERT ON `qz_ldcykhinfo_472739` FOR EACH ROW -- 正副级干部由于能够评价除本部门单位外的所有单位，故而也能评价机关单位
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
	begin
	declare xld int ;
	declare jg int ;
	declare cjgb int;
	declare bbzz int;
	declare leID int ;
	declare dept int;
	declare BPleID int;
	declare fzgb int;
	set xld =( select count(*) num from userinformation where LevelID = 1);
	set dept = (select DeptID from userinfo where UserID=new.UserID);
	set jg = (select count(*) from userinformation where DeptID = dept  and LevelID >= 4);
	set cjgb = (select count(*) from userinformation where (LevelID = 2 or LevelID = 3) and DeptID <> dept) ;
	set bbzz = (select count(*) from userinformation where DeptID = dept and LevelID = 2);
	set leID = (select LevelID from userinfo where UserID = new.UserID);
	set BPleID = (select LevelID from userinfo where UserID = new.BPUserID);
	if(leID = 1) then 
		if (new.ZTPJ = 0) then 
		update grades_472739 set grade = grade + 1.00/xld *20 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 1) then
		update grades_472739 set grade = grade + 1.00/xld *16 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 2) then
		update grades_472739 set grade = grade + 1.00/xld *12 where UserID = new.BPUserID; end if;
	end if;
	if( leID = 2) then 
			-- 正职互评
		if (BPleID = 2 or BPleID = 3) then 
			if (new.ZTPJ = 0) then 
			update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
			if (new.ZTPJ = 1) then
			update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
			if (new.ZTPJ = 2) then
			update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
		end if;
		-- 正职评副职
		if (BPleID = 3) then
			if (new.ZTPJ = 0) then 
			update grades_472739 set grade = grade + 1.00/bbzz *10 where UserID = new.BPUserID; end if;
			if (new.ZTPJ = 1) then
			update grades_472739 set grade = grade + 1.00/bbzz *8 where UserID = new.BPUserID; end if;
			if (new.ZTPJ = 2) then
			update grades_472739 set grade = grade + 1.00/bbzz *6 where UserID = new.BPUserID; end if;
		end if;
	end if;
	if( leID = 3) then 
		if (new.ZTPJ = 0) then 
			update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
			if (new.ZTPJ = 1) then
			update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
			if (new.ZTPJ = 2) then
			update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
	end if;
	if(leID >= 4) then 
		if (new.ZTPJ = 0) then
		update grades_472739 set grade = grade + 1.00/jg *40 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 1) then
		update grades_472739 set grade = grade + 1.00/jg *32 where UserID = new.BPUserID; end if;
		if (new.ZTPJ = 2) then
		update grades_472739 set grade = grade + 1.00/jg *24 where UserID = new.BPUserID; end if;
	end if;
		end
	;;
	delimiter ;

	SET FOREIGN_KEY_CHECKS = 1;

	DROP TABLE IF EXISTS `zc_ldbzkhinfo_472739`;
	CREATE TABLE `zc_ldbzkhinfo_472739`  (
	  `Id` int(11) NOT NULL AUTO_INCREMENT,
	  `UserID` int(11) NOT NULL,
	  `DeptID` int(11) NOT NULL,
	  `voteTime` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `ZHKH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `bz` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
	  PRIMARY KEY (`Id`) USING BTREE,
	  INDEX `bz_User_472739`(`UserID`) USING BTREE,
	  INDEX `bz_Dept_472739`(`DeptID`) USING BTREE,
	  CONSTRAINT `bz_Dept_472739` FOREIGN KEY (`DeptID`) REFERENCES `deptinfo` (`DeptID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `bz_User_472739` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE = InnoDB AUTO_INCREMENT = 938 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '中层领导班子互评完成，在isvote_472739中插入1' ROW_FORMAT = Compact;

	-- ----------------------------
	-- Triggers structure for table zc_ldbzkhinfo_472739
	-- ----------------------------
	DROP TRIGGER IF EXISTS `ldbz_472739`;
	delimiter ;;
	CREATE TRIGGER `ldbz_472739` AFTER INSERT ON `zc_ldbzkhinfo_472739` FOR EACH ROW /*
	检索投票人的LevelID
		switch(LevelID){
			case 1 : 校领导评价领导班子：计算校领导数量，单位票数/校领导数量*本票得分率*校领导评价领导班子分数比例
			case 2 or 3 : 中层领导评价其他部门领导班子：计算除本单位的中层领导外的所有中层领导数量，
										单位票数/中层领导数量*本票得分率*中层领导评价其他部门领导班子分数比例
			case 4 : 本部门职工评价领导班子：计算本部门职工数量，单位票数/职工数量*本票得分率*本部门职工评价领导班子分数比例
			case 6 : 教工代表评价所有领导班子：计算所有教工代表数量，单位票数/教工代表数量*本票得分率*教工代表评价领导班子分数比例
	*/
	begin
	declare xld int ;
	declare jg int ;
	declare gb int ;
	declare db int;
	declare dba int;
	declare dept int;
	declare leID int ;
	set dept = (select DeptID from userinfo where UserID=new.UserID);
	set xld =( select count(*) from userinformation where LevelID = 1);
	set jg = (select count(*) from userinfo where DeptID  = dept and LevelID = 6);
	set gb = (select count(*) from userinformation where (LevelID = 2 or LevelID =3) AND DeptID <> dept) ;
	set db = (select count(*) from userinformation where LevelID = 4) ;
	set leID = (select LevelID from userinfo where UserID = new.UserID);
	if(leID = 1) then 
		if (new.ZHKH = 0) then 
		update bz_grade_472739 set grade = grade + 1.00/xld *20 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 1) then
		update bz_grade_472739 set grade = grade + 1.00/xld *16 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 2) then
		update bz_grade_472739 set grade = grade + 1.00/xld *12 where DeptID = new.DeptID; end if;
	end if;
	if( leID = 2 or leID = 3) then 
	if (new.ZHKH = 0) then 
		update bz_grade_472739 set grade = grade + 1.00/gb *20 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 1) then
		update bz_grade_472739 set grade = grade + 1.00/gb *16 where DeptID = new.DeptID; end if;
		if (new.ZHKH = 2) then
		update bz_grade_472739 set grade = grade + 1.00/gb *12 where DeptID = new.DeptID; end if;
	end if;
	if(leID = 4 ) then  
			if (new.ZHKH = 0) then
			update bz_grade_472739 set grade = grade + 1.00/db *20 where DeptID = new.DeptID; end if;
			if (new.ZHKH = 1) then
			update bz_grade_472739 set grade = grade + 1.00/db *16 where DeptID = new.DeptID; end if;
			if (new.ZHKH = 2) then
			update bz_grade_472739 set grade = grade + 1.00/db *12 where DeptID = new.DeptID; end if;
		end if;
	if(leID = 4 ) then  
			if (new.ZHKH = 0) then
			update bz_grade_472739 set grade = grade + 1.00/jg *40 where DeptID = new.DeptID; end if;
			if (new.ZHKH = 1) then
			update bz_grade_472739 set grade = grade + 1.00/jg *32 where DeptID = new.DeptID; end if;
			if (new.ZHKH = 2) then
			update bz_grade_472739 set grade = grade + 1.00/jg *24 where DeptID = new.DeptID; end if;
		end if;
		end
	;;
	delimiter ;

	SET FOREIGN_KEY_CHECKS = 1;
	DROP TABLE IF EXISTS `zc_ldcykhinfo_472739`;
	CREATE TABLE `zc_ldcykhinfo_472739`  (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `UserID` int(11) NOT NULL,
	  `BPUserID` int(11) NOT NULL,
	  `DDJS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LDNL` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LZJS` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  `LXYZ` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	  PRIMARY KEY (`id`) USING BTREE,
	  INDEX `cy_User`(`UserID`) USING BTREE,
	  INDEX `cy_BP`(`BPUserID`) USING BTREE,
	  CONSTRAINT `cy_BP_472739` FOREIGN KEY (`BPUserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
	  CONSTRAINT `cy_User_472739` FOREIGN KEY (`UserID`) REFERENCES `userinfo` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
	) ENGINE = InnoDB AUTO_INCREMENT = 3223 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '中层领导互评完成，在isvote_中插入2；' ROW_FORMAT = Compact;

	-- ----------------------------
	-- Triggers structure for table zc_ldcykhinfo_472739
	-- ----------------------------
	DROP TRIGGER IF EXISTS `ldcy_472739`;
	delimiter ;;
	CREATE TRIGGER `ldcy_472739` AFTER INSERT ON `zc_ldcykhinfo_472739` FOR EACH ROW -- 正副级干部由于能够评价除本部门单位外的所有单位，故而也能评价机关单位
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
	begin
	declare xld int ;
	declare jg int ;
	declare cjgb int;
	declare bbzz int;
	declare leID int ;
	declare dept int;
	declare BPleID int;
	declare BPDD int;
	set xld =( select count(*) num from userinformation where LevelID = 1);
	set dept = (select DeptID from userinfo where UserID=new.UserID);
	set jg = (select count(*) from userinformation where DeptID = dept  and LevelID >= 4);
	set cjgb = (select count(*) from userinformation where (LevelID = 2 or LevelID = 3) and DeptID <> dept) ;
	set bbzz = (select count(*) from userinformation where DeptID = dept and LevelID = 2);
	set leID = (select LevelID from userinfo where UserID = new.UserID);
	set BPleID = (select LevelID from userinfo where UserID = new.BPUserID);
	set BPDD = (select DeptID from userinfo where UserID = new.BPUserID);
	if(leID = 1) then 
		if (new.DDJS = 0) then 
		update grades_472739 set grade = grade + 1.00/xld *20 where UserID = new.BPUserID; end if;
		if (new.DDJS = 1) then
		update grades_472739 set grade = grade + 1.00/xld *16 where UserID = new.BPUserID; end if;
		if (new.DDJS = 2) then
		update grades_472739 set grade = grade + 1.00/xld *12 where UserID = new.BPUserID; end if;
	end if;
	if( leID = 2) then 
			-- 正职互评
		if (BPleID = 2 or BPleID = 3) then 
			if (new.DDJS = 0) then 
			update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
			if (new.DDJS = 1) then
			update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
			if (new.DDJS = 2) then
			update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
		end if;
		-- 正职评副职
		if (BPleID = 3 and BPDD = dept) then
			if (new.DDJS = 0) then 
			update grades_472739 set grade = grade + 1.00/bbzz *10 where UserID = new.BPUserID; end if;
			if (new.DDJS = 1) then
			update grades_472739 set grade = grade + 1.00/bbzz *8 where UserID = new.BPUserID; end if;
			if (new.DDJS = 2) then
			update grades_472739 set grade = grade + 1.00/bbzz *6 where UserID = new.BPUserID; end if;
		end if;
	end if;
	if( leID = 3) then 
		if (new.DDJS = 0) then 
			update grades_472739 set grade = grade + 1.00/cjgb *20 where UserID = new.BPUserID; end if;
			if (new.DDJS = 1) then
			update grades_472739 set grade = grade + 1.00/cjgb *16 where UserID = new.BPUserID; end if;
			if (new.DDJS = 2) then
			update grades_472739 set grade = grade + 1.00/cjgb *12 where UserID = new.BPUserID; end if;
	end if;
	if(leID >= 4) then 
		if (new.DDJS = 0) then
		update grades_472739 set grade = grade + 1.00/jg *40 where UserID = new.BPUserID; end if;
		if (new.DDJS = 1) then
		update grades_472739 set grade = grade + 1.00/jg *32 where UserID = new.BPUserID; end if;
		if (new.DDJS = 2) then
		update grades_472739 set grade = grade + 1.00/jg *24 where UserID = new.BPUserID; end if;
	end if;
		end
	;;
	delimiter ;

	SET FOREIGN_KEY_CHECKS = 1;


