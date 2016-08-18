<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;



    /**
     * Returns the validation rules for attributes.
     *
     * @return array
     */
    public function rules()
    {
        return [

            [['username','email',], 'required'],

            ['username', 'unique', 'targetClass' => 'app\models\User',
                'message' => 'This username has already been taken.'],

            [['username','email'], 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\User',
                'message' => 'This email address has already been taken.'],


            ['password', 'required'],
            // use passwordStrengthRule() method to determine password strength


            // on default scenario, user status is set to active
            ['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'default'],
            // status is set to not active on rna (registration needs activation) scenario
            ['status', 'default', 'value' => User::STATUS_NOT_ACTIVE, 'on' => 'rna'],
            // on social scenario, user status is set to active
            // status has to be integer value in the given range. Check User model.
            ['status', 'in', 'range' => [User::STATUS_NOT_ACTIVE, User::STATUS_ACTIVE]]
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
            'username' => Yii::t('app', 'Username:'),
            'password' => Yii::t('app', 'Password:'),
            'email' => Yii::t('app', 'Email:'),
            'name' => Yii::t('app', 'Full Name:'),
            'dob' => Yii::t('app', 'Date of Birth:'),
            'address' => Yii::t('app', 'Address:'),
            'city' => Yii::t('app', 'City:'),
            'state_id' => Yii::t('app', 'State:'),
            'country_id' => Yii::t('app', 'Country:'),
            'zip_code' => Yii::t('app', 'Zip Code:'),
            'user_interest' => Yii::t('app', 'User Interest:'),
        ];
    }

    /**
     * Signs up the user.
     * If scenario is set to "rna" (registration needs activation), this means
     * that user need to activate his account using email confirmation method.
     *
     * @return User|null The saved model or null if saving fails.
     */
    public function signup()
    {
        $user = new User();


        try {
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = $this->status;

            // if scenario is "rna" we will generate account activation token

                $user->generateAccountActivationToken();

            // if user is saved and role is assigned return user object
            if ($user->save()) {
                return $user;
            } else {
                return null;
            }
        }catch(\Exception $e) {

            throw $e;
            // return null;
        }
    }

    /**
     * Sends email to registered user with account activation link.
     *
     * @param  object $user Registered user.
     * @return bool         Whether the message has been sent successfully.
     */
    public function sendAccountActivationEmail($user)
    {
        return Yii::$app->mailer->compose('accountActivationToken', ['user' => $user])
            ->setFrom(['dami_sadam@yahoo.com' =>  'Sadam robot'])
            ->setTo($this->email)
            ->setSubject('Account activation ')
            ->send();
    }
}
