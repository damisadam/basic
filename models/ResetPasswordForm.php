<?php
namespace app\models;

use app\models\User;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Password reset form.
 */
class ResetPasswordForm extends Model
{
    public $password;

    /**
     * @var \app\models\User
     */
    private $_user;

    /**
     * Creates a form model given a token.
     *
     * @param string $token  Password reset token.
     * @param array  $config Name-value pairs that will be used to initialize the object properties.
     *
     * @throws \yii\base\InvalidParamException  If token is empty or not valid.
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) 
        {
            throw new InvalidParamException('Password reset token cannot be blank.');
        }

        $this->_user = User::findByPasswordResetToken($token);

        if (!$this->_user) 
        {
            throw new InvalidParamException('Wrong password reset token.');
        }

        parent::__construct($config);
    }

    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            // use passwordStrengthRule() method to determine password strength
        ];
    }



    /**
     * Returns the attribute labels.
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'Password'),
        ];
    }

    /**
     * Resets password.
     *
     * @return bool Whether the password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return $user->save();
    }
}
