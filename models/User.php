<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
* @property int $id
* @property string $username;
* @property string $first_name;
* @property string $last_name;
* @property string $email;
* @property string $password;
* @property string $number;
*/
class User extends ActiveRecord implements IdentityInterface
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
        ];
    }
public $authKey;
public $accessToken;

/**
* {@inheritdoc}
*/
public static function findIdentity($id)
{
return static::findOne(['id'=>$id]);
}

/**
* {@inheritdoc}
*/
public static function findIdentityByAccessToken($token, $type = null)
{
return null;
}

/**
* Finds user by username
*
* @param string $username
* @return static|null
*/
public static function findByUsername($username)
{

return static::findOne(['username'=>$username]);
}

/**
* {@inheritdoc}
*/
public function getId()
{
return $this->id;
}

/**
* {@inheritdoc}
*/
public function getAuthKey()
{
return $this->authKey;
}

/**
* {@inheritdoc}
*/
public function validateAuthKey($authKey)
{
return $this->authKey === $authKey;
}

/**
* Validates password
*
* @param string $password password to validate
* @return bool if password provided is valid for current user
*/
public function validatePassword($password)
{
return Yii::$app->security->validatePassword($password, $this->password);
}


}
