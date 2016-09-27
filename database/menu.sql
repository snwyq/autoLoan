/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.17 : Database - yii2cmf0905
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yii2cmf0905` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yii2cmf0905`;

/*Table structure for table `yii2cmf_menu` */

DROP TABLE IF EXISTS `yii2cmf_menu`;

CREATE TABLE `yii2cmf_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `fk_menu_parent` (`parent`),
  CONSTRAINT `fk_menu_parent` FOREIGN KEY (`parent`) REFERENCES `yii2cmf_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `yii2cmf_menu` */

insert  into `yii2cmf_menu`(`id`,`name`,`parent`,`route`,`order`,`data`,`icon`) values (15,'用户管理',33,'/user/admin/index',NULL,NULL,''),(16,'路由管理',33,'/rbac/route/index',NULL,NULL,''),(17,'角色管理',33,'/rbac/role/index',NULL,NULL,''),(22,'文章列表',39,'/article/index',1,NULL,''),(24,'系统管理',98,NULL,6,NULL,'cog'),(25,'网站设置',24,'/system/config',1,NULL,''),(26,'配置管理',24,'/config/index',2,NULL,''),(27,'单页管理',39,'/page/index',40,NULL,''),(29,'分类管理',39,'/category/index',4,NULL,''),(30,'数据库备份',98,NULL,5,NULL,'book'),(31,'备份',30,'/backup/export/index',NULL,NULL,''),(32,'还原',30,'/backup/import/index',NULL,NULL,''),(33,'权限管理',98,NULL,1,NULL,'users'),(34,'菜单管理',33,'/rbac/menu/index',NULL,NULL,''),(37,'操作记录',24,'/admin-log/index',3,NULL,''),(39,'内容管理',98,NULL,3,NULL,'edit'),(40,'发布文章',39,'/article/create',2,NULL,''),(41,'回收站',39,'/article/trash',3,NULL,''),(42,'评论管理',39,'/comment/index',6,NULL,''),(43,'留言板',39,'/suggest/index',7,NULL,''),(44,'插件管理',98,NULL,2,NULL,'plug'),(45,'插件',44,'/plugins/index',NULL,NULL,''),(46,'外观',98,NULL,4,NULL,'tv'),(47,'主题',46,'/theme/index',4,NULL,''),(48,'幻灯片',46,'/carousel/index',3,NULL,''),(49,'导航',46,'/nav/index',5,NULL,''),(50,'区域',46,'/area/index',1,NULL,''),(51,'区块',46,'/block/index',2,NULL,''),(52,'群发站内信',24,'/message/admin/create',4,NULL,''),(53,'市场',NULL,NULL,1,NULL,'clone'),(54,'客户管理',53,NULL,1,NULL,'cog'),(55,'个人客户',54,'/customer/person',1,NULL,''),(56,'企业客户',54,'/customer/company',2,NULL,''),(57,'授信提报',53,NULL,2,NULL,''),(58,'新增授信提报',57,'/customer-credit-apply/credit-add-list',1,NULL,''),(60,'车辆评估',53,NULL,4,NULL,''),(61,'借款评估',60,'/loan/car-assess-index',1,NULL,''),(62,'置换评估',60,'/loan-car-assess/index',2,NULL,''),(63,'车辆管理',53,NULL,5,NULL,''),(64,'车辆监管',63,'/loan-car-assess-control/index',1,NULL,''),(65,'车辆置换',63,'/service-ticket-loan-car-assess-control/index',2,NULL,''),(66,'车辆出库',63,'/service-ticket-loan-car-assess-control/index',3,NULL,''),(67,'车辆盘库',63,'/loan-car-check/index',4,NULL,''),(68,'车辆抽检',63,'/service-ticket-loan-car-plancheck/index',5,NULL,''),(69,'贷后管理',53,NULL,6,NULL,''),(70,'还款申请',69,'/service-ticket-loan-makeloans-plan/index',1,NULL,''),(71,'催款管理',69,'/service-ticket-loan-makeloans-plan/index',2,NULL,''),(72,'风控',NULL,NULL,2,NULL,'bolt'),(73,'授信审核',72,NULL,1,NULL,''),(74,'新增授信审核',73,'/customer-credit-apply/audit-new-credit',1,NULL,''),(75,'借款审核',72,NULL,2,NULL,''),(76,'车辆核价',72,NULL,3,NULL,''),(77,'借款核价',76,'/service-ticket-loan/index',1,NULL,''),(78,'置换核价',76,'/service-ticket-loan/index',2,NULL,''),(79,'车辆风控',72,NULL,4,NULL,''),(80,'车辆台帐',79,'/service-ticket-loan-car/index',1,NULL,''),(81,'盘库管理',79,'/service-ticket-loan-car-check/index',2,NULL,''),(82,'柚检复核',79,'/service-ticket-loan-car-plancheck/index',3,NULL,''),(83,'运营',NULL,NULL,3,NULL,'map-signs'),(84,'借款处理',83,NULL,1,NULL,''),(85,'借款匹配',84,'/loan/frist-audit-index',1,NULL,''),(86,'放款管理',84,'/service-ticket-loan-makeloans/index',2,NULL,''),(87,'还款管理',84,'/service-ticket-loan-makeloans-plan/index',3,NULL,''),(88,'逾期管理',83,NULL,2,NULL,''),(89,'运营报表',83,NULL,3,NULL,''),(90,'资金产品',83,NULL,4,NULL,''),(91,'金融产品分类',90,'/product-class/index',1,NULL,''),(92,'资金通道',90,'/product-money-channel/index',2,NULL,''),(93,'客户报表',89,'/service-ticket-credit-detail/index',1,NULL,''),(94,'车辆报表',89,'/service-ticket-loan-car/index',2,NULL,''),(95,'借款台帐',89,'/service-ticket-loan-makeloans/index',3,NULL,''),(96,'逾期处理',88,'/service-ticket-loan-makeloans-plan/index',1,NULL,''),(97,'代偿处理',88,'/service-ticket-loan-makeloans-compensatory/index',2,NULL,''),(98,'系统',NULL,NULL,4,NULL,'wrench'),(99,'财务',NULL,NULL,5,NULL,'cc-stripe'),(100,'还款确认',99,'/service-ticket-loan-makeloans-plan/index',1,NULL,''),(101,'逾期代偿',99,'/service-ticket-loan-makeloans-plan/index',2,NULL,''),(102,'授信调整申请',57,'/customer-credit-apply/credit-change-list',2,NULL,''),(103,'资金通道产品',90,'/product-money-channel-product/index',3,NULL,''),(104,'数据管理',98,NULL,7,NULL,'users'),(105,'汽车品牌',104,'/auto-brand/index',2,NULL,''),(106,'汽车系列',104,'/auto-series/index',1,NULL,''),(107,'汽车车型',104,'/auto-series/index',3,NULL,''),(108,'授信变更审核',73,'/customer-credit-apply/audit-change-credit',2,NULL,''),(109,'授信结果查询',57,'/customer-credit-detail/index',3,NULL,''),(110,'授信审核明细',73,'/customer-credit-detail/result-index',3,NULL,''),(111,'借款提报',53,NULL,3,NULL,''),(112,'新增借款提报',111,'/loan/index',1,NULL,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
