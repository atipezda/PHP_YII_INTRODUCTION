<?php


namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'password', 'password_repeat'], 'required'],
            [['username'. 'password'], 'string', 'min' => 4, 'max' => 8],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }
    public function signUp():bool{
        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        $user->access_token = \Yii::$app->security->generateRandomString();
        $user->auth_key = \Yii::$app->security->generateRandomString();

        if($user->checkIfUserExists()){
            \Yii::error("user already exists", VarDumper::dumpAsString($user->errors));
            $this->addError("username", "that user already exists");
            return false;
        }

        if($user->save()){
            return true;
        }
        \Yii::error("user was not saved.", VarDumper::dumpAsString($user->errors));
        return false;
    }
}