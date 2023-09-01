<?php 
namespace app\core\form;

use app\core\Model;
use app\core\form\Field;

class Form {

    public static function begin($action, $method) {
        $str = '<form action="%s" method="%s">';
        echo sprintf($str, $action, $method);
        return new Form();
    }

    public static function end() {
        echo '</form>';
    }

    public function field(Model $model, $attribute) {
        return new Field($model, $attribute);
    }

    
}