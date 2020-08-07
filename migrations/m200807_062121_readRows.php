<?php

use yii\db\Migration;
use yii\helpers\Console;
use app\models\User;

/**
 * Class m200807_062121_readRows
 */
class m200807_062121_readRows extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rows = User::find()->all();
//        Console::stdout($rows[0]->username);

        foreach ($rows as &$user){
            Console::stdout($user->username.'\n');
            Console::moveCursorNextLine();
        }


        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200807_062121_readRows cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200807_062121_readRows cannot be reverted.\n";

        return false;
    }
    */
}
