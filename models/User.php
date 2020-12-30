<?php

namespace app\models;

use app\models\Tusers;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;
    public $email;
    public $level;


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $tuser = Tusers::find()->where(["id" => $id])->one();
        if (!$tuser) {
            return null;
        }
        return new static($tuser);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $tuser = Tusers::find()->where(["accessToken" => $token])->one();
        if (!$tuser) {
            return null;
        }
        return new static($tuser);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // $tuser = Tusers::find()->where(["username" => $username])->orWhere(["email" => $username])->one();
        $tuser = Tusers::find()->where(["username" => $username])->orWhere(["email" => $username])->one();

        if (!$tuser) {
            return null;
        }

        return new static($tuser);
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
        return $this->password === md5($password);
    }
}
