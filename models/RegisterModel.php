<?php 
namespace app\models;
use app\core\Model;

class RegisterModel extends Model {
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function register() {
        //todo
    }

    public function rules():array {
        return [
            'lastname' => [self::RULES_REQUIRED],
            'email' => [self::RULES_REQUIRED, self::RULES_EMAIL],
            'password' => [
                 self::RULES_REQUIRED,
                [self::RULES_MIN, 'min' => 8],
                [self::RULES_MAX, 'max' => 24]
            ],
            'passwordConfirm' => [self::RULES_REQUIRED, [self::RULES_MATCH, 'match' => 'password']]
        ];
    }

}