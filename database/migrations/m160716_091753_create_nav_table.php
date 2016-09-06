<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%nav}}`.
 */
class m160716_091753_create_nav_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%nav}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(128),
            'title' => $this->string(128)
        ]);

        $this->createTable('{{%nav_item}}', [
            'id' => $this->primaryKey(),
            'nav_id' => $this->integer(11),
            'title' => $this->string(128),
            'url' => $this->string(128),
            'order' => $this->smallInteger(1),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(0)
        ]);
        $this->insert('{{%nav}}', [
            'id' => 1,
            'key' => 'header',
            'title' => '顶部导航'
         ]);
        $this->insert('{{%nav_item}}', [
            'id' => 1,
            'nav_id' => 1,
            'title' => '首页',
            'url' => '/',
            'order' => 1,
            'status' => 1
        ]);
        $this->insert('{{%nav}}', [
            'id' => 2,
            'key' => 'friend-link',
            'title' => '友情链接'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%nav}}');
        $this->dropTable('{{%nav_item}}');
    }
}
