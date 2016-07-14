SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `sport_data` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sport_data`;

CREATE TABLE IF NOT EXISTS `nba_game_schedule` (
  `league_id` varchar(50) NOT NULL COMMENT '联赛ID',
  `league_name` varchar(10) NOT NULL COMMENT '联赛名称',
  `season_id` varchar(50) NOT NULL COMMENT '赛季ID',
  `season_year` char(4) NOT NULL COMMENT '赛季年份，年份数据.四位数字，比如2016',
  `season_type` varchar(3) NOT NULL COMMENT '赛季类型，pre=季前赛，reg=常规赛，pst=季后赛',
  `game_id` varchar(50) NOT NULL COMMENT '比赛ID',
  `game_status` varchar(15) NOT NULL COMMENT '比赛状态，scheduled=未开赛；inprogress=进行中；closed=完赛；unnecessary=不需要；time-tbd=待定（如果需要）',
  `game_scheduled_us` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '比赛时间，美国当地时间',
  `game_scheduled_ch` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '比赛时间，北京时间',
  `home_team_id` varchar(50) NOT NULL COMMENT '主队ID',
  `home_team_name` varchar(10) NOT NULL COMMENT '主队名称',
  `away_team_id` varchar(50) NOT NULL COMMENT '客队ID',
  `away_team_name` varchar(10) NOT NULL COMMENT '客队名称',
  PRIMARY KEY (`league_id`,`season_id`,`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='赛事赛程一览表';

