<?php

use yii\db\Migration;

/**
 * Class m200806_125406_newTable
 */
class m200806_125406_newTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test', [
            'id'=> $this->primaryKey(),
            'username'=> $this->string(255),
            'status'=> $this->boolean(),
            'crated_at' => $this-> timestamp()
        ]);

        $this-> addColumn('test', 'email', $this->string(512)->notNull());

        $this->createTable('test1', [
            'id'=> $this->primaryKey(),
            'nameOfTest'=> $this->string(255)
        ]);

        $this->addForeignKey('FK_test1_test', 'test1', 'id', 'test', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         $this->dropForeignKey('FK_test1_test', 'test1');
         $this->dropTable('test');
         $this->dropTable('test1');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200806_125406_newTable cannot be reverted.\n";

        return false;
    }
    */
}
