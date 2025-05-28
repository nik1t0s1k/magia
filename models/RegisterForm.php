<?php

namespace app\models;
use Yii;
use yii\base\Model;

/**
 * @property int $id
 * @property string $username;
 * @property string $first_name;
 * @property string $last_name;
 * @property string $email;
 * @property string $password;
 * @property string $number;
 */
class RegisterForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $number;

    public function rules(): array
    {
        return [
            [['username', 'first_name', 'last_name', 'email', 'password', 'number'], 'required'],
            ['email', 'email'],
            ['password', 'string', 'min' => 6],

            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Данные уже есть в системе']
        ];
    }

    /**
     * @throws \yii\base\Exception
     */
    public function register(): bool
    {
        if (!$this->validate()){
            return false;
        }

        $user = new User();
        $user ->username = $this->username;
        $user ->first_name = $this->first_name;
        $user ->last_name = $this->last_name;
        $user ->email = $this->email;
        $user ->number = $this->number;
        $user ->password = Yii::$app->security->generatePasswordHash($this->password);

        $user->save();
        return true;
    }
}