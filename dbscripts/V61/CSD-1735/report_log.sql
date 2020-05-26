CREATE TABLE IF NOT EXISTS `tbl_report_log` (
  `fid_rl_id` int(11) NOT NULL,
  `fid_rep_id` int(11) NOT NULL,
  `fld_user_id` int(11) NOT NULL,
  `fid_datetime` datetime NOT NULL,
  `fld_rl_code` varchar(255) NOT NULL,
  `fld_repo_filters` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
