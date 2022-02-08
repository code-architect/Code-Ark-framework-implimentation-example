<?php
/* Class Field
 *
 * @author: Indranil Samanta (code-architect)
 * @package app\core\form
*/

namespace app\core\form;


use app\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public const TYPE_EMAIL = 'email';

    public Model $model;
    public string $attribute;
    public string $type;

    /**
     * Field constructor.
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                <input type="%s" name="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">
                    %s    
                </div>
            </div>',
            $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->getFirstError($this->attribute)
        );
    }


    /**
     * Changing the field type in frontend
     * @return $this
     */
    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }


    public function emailField()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

}