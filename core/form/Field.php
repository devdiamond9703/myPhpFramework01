<?php 
namespace app\core\form;
use app\core\Model;

class Field {
    // public $type;
    public $type;
    public Model $model;
    public string $attribute;

    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';
    public const TYPE_PASSWORD = 'password';

    public function __construct(Model $model, $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        $str = '<label class="form-label">%s</label>
                <input type="%s" name="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">%s</div>';

        return sprintf($str,
            $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }

    public function emailField() {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function numberField() {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }

    public function passwordField() {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}