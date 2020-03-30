<?php

use yii\db\Migration;

/**
 * Class m200327_061722_worker
 */
class m200327_061722_worker extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('worker', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'url' => $this->string()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('worker');
    }

}
