<?php
/* Class Form
 *
 * @author: Indranil Samanta (code-architect)
 * @package app\core\form
*/

namespace app\core\form;

use app\core\Model;

class Form
{
    /**
     * Begin HTML Form
     * @param $action
     * @param $method
     * @return Form
     */
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }


    /**
     * End HTML Form
     */
    public static function end()
    {
        echo '</form>';
    }


    public function field(Model $model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}