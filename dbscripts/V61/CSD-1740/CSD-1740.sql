-- ----------------------------
-- Add Columns for `tbl_account_year_master`
-- ----------------------------
ALTER TABLE tbl_account_year_master 
ADD COLUMN `fld_comment` varchar(255),
ADD COLUMN `fld_status` int(5),
ADD COLUMN `fld_created_at` timestamp(6),
ADD COLUMN `fld_modified_at` timestamp(6),
ADD COLUMN `fld_created_by` int(5),
ADD COLUMN `fld_modified_by` int(5), 
MODIFY COLUMN fld_account_year varchar(50); 

-- ----------------------------
-- Table structure for `tbl_account_quarter`
-- ----------------------------

DROP TABLE IF EXISTS `tbl_account_quarter`;
CREATE TABLE `tbl_account_quarter` (
  `fld_id` int(11) NOT NULL AUTO_INCREMENT,
  `fld_qurter_name` varchar(50) DEFAULT NULL,
  `fld_branch_id` int(11) DEFAULT NULL,
  `fld_year_id` int(11) DEFAULT NULL,
  `fld_open_date` date NOT NULL,
  `fld_closing_date` date NOT NULL,
  `fld_comment` varchar(255) DEFAULT NULL,
  `fld_status` int(11) DEFAULT NULL,
  `fld_created_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `fld_modified_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `fld_created_by` int(11) DEFAULT NULL,
  `fld_modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`fld_id`)
);

-- ----------------------------
-- Table structure for `tbl_account_period`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_account_period`;
CREATE TABLE `tbl_account_period` (
  `fld_id` int(11) NOT NULL AUTO_INCREMENT,
  `fld_year_id` int(11) DEFAULT NULL,
  `fld_period_name` varchar(9) DEFAULT NULL,
  `fld_branch_id` int(11) DEFAULT NULL,
  `fld_qurter_id` int(11) DEFAULT NULL,
  `fld_period_type` int(11) DEFAULT NULL,
  `fld_open_date` date NOT NULL,
  `fld_closing_date` date NOT NULL,
  `fld_comment` varchar(255) DEFAULT NULL,
  `fld_status` int(11) DEFAULT NULL,
  `fld_created_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `fld_modified_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `fld_created_by` int(11) DEFAULT NULL,
  `fld_modified_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`fld_id`)
); 

-- ----------------------------
-- Table structure for `tbl_report_text`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_report_text`;
CREATE TABLE `tbl_report_text` (
  `fld_id` int(11) NOT NULL AUTO_INCREMENT,
  `fld_report_id` int(5) DEFAULT NULL,
  `fld_type` int(5) DEFAULT NULL COMMENT '0- report st, 1-header, 2-footer, 3-signature',
  `fld_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fld_id`)
);

-- ----------------------------
-- Add coulumns for `tbl_calendar_master`
-- ----------------------------
ALTER TABLE tbl_calendar_master ADD COLUMN `fld_day_open_time` time NULL ;
Update tbl_calendar_master SET `fld_day_open_time` = (SELECT fld_day_open_time FROM tbl_process_master LIMIT 1);

ALTER TABLE tbl_calendar_master ADD COLUMN `fld_day_end_time` time NULL ;
Update tbl_calendar_master SET `fld_day_end_time` = (SELECT fld_day_end_time FROM tbl_process_master LIMIT 1);

ALTER TABLE tbl_calendar_master ADD COLUMN `fld_day_open_type` tinyint NULL ;

Update tbl_calendar_master SET `fld_day_open_type` = 0;
ALTER TABLE tbl_calendar_master ADD COLUMN `fld_day_end_type` tinyint NULL ;

Update tbl_calendar_master SET `fld_day_end_type` =0;
ALTER TABLE tbl_calendar_master ADD COLUMN `fld_day_end_process_st` tinyint NOT NULL DEFAULT 0;


