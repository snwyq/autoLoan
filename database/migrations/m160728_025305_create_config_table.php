<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%config}}`.
 */
class m160728_025305_create_config_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        // config
        $this->createTable('{{%config}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment('配置名'),
            'value' => $this->text()->comment('配置值'),
            'extra' => $this->string(255)->defaultValue('')->notNull(),
            'description' => $this->string(255)->comment('配置描述'),
            'type' => $this->string(30)->defaultValue('text')->comment('配置类型'),
            'created_at' => $this->integer(10)->notNull(),
            'updated_at' => $this->integer(10)->notNull(),
            'group' => $this->string(30)->defaultValue('system')->comment('配置分组')
        ], $tableOptions);
        $this->execute(<<<SQL
--
-- Dumping data for table {{%config}}
--

LOCK TABLES {{%config}} WRITE;
/*!40000 ALTER TABLE {{%config}} DISABLE KEYS */;
INSERT INTO {{%config}} VALUES (1,'CONFIG_TYPE_LIST','text=>字符\r\narray=>数组\r\npassword=>密码\r\nimage=>图片\r\ntextarea=>多行字符\r\nselect=>下拉框\r\nradio=>单选框\r\ncheckbox=>多选框\r\neditor=>富文本编辑器','','配置类型列表','array',0,1461937892,'system'),
(2,'CONFIG_GROUP','site=>网站\r\nsystem=>系统\r\nemail=>邮箱\r\nwechat=>微信','','配置分组','array',1468405444,1468421137,'system'),
(3,'SITE_NAME','yii2cmf','','网站名称','text',0,1461937892,'site'),
(4,'SITE_ICP','','','域名备案号','text',0,1461937892,'site'),
(5,'SITE_LOGO','','','网站LOGO','image',0,1461937892,'site'),
(6,'SEO_SITE_DESCRIPTION','yiicmf2','','meta description','text',0,1468403120,'site'),
(7,'SEO_SITE_KEYWORDS','yiicmf','','meta keywords','text',0,1461937892,'site'),
(8,'FOOTER','','','底部','textarea',0,1461937892,'site'),
(9,'THEME_NAME','basic','','主题名','text',0,1467882452,'site'),
(10,'BACKEND_SKIN','skin-purple','skin-black=>skin-black\r\nskin-blue=>skin-blue\r\nskin-green=>skin-green\r\nskin-purple=>skin-purple\r\nskin-red=>skin-red\r\nskin-yellow=>skin-yellow','后台皮肤','select',1461931367,1461937892,'system'),
(11,'ADMIN_EMAIL','','','管理员邮箱','text',0,1468406411,'email'),
(12,'wx_token','','','微信token','text',0,1468406411,'wechat');
/*!40000 ALTER TABLE {{%config}} ENABLE KEYS */;
UNLOCK TABLES;
SQL
);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%config}}');
    }
}
