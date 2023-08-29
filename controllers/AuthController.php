<?php 
namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller {

    public function login() {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request) {
        $model = new RegisterModel();
        if($request->isPost()) {
            $model->loadData($request->getBody());
            if($model->validate() && $model->register()) {

            }
            return 'Handler submited date';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }

}