<?php 
namespace app\controllers;

use app\core\Request;
use app\core\Controller;

    class SiteController extends Controller {

        public function home() {
            $params = [
                'name' => "DevDiamond"
            ];
            return $this->render('home', $params);
        }

        public function contact() {
            $params = [
                'name' => "DevDiamond"
            ];
            return $this->render('contact', $params);
        }

        public function handleContact(Request $request) {

            $body = $request->getBody();

            echo "<pre>";
            print_r($body);die();

            $params = [
                'name' => "DevDiamond"
            ];
            return $this->render('_404', $params);
        }
    }