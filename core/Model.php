<?php
/* Class Model
 *
 * @author: Indranil Samanta (code-architect)
 * @package app\core
*/

namespace app\core;


abstract class Model
{
    /**
     * The variable names and the names in the view have to be same in order for this function to work
     * i.e: if model variable name is $firstName and in the view html name="firstname" then it will be undefined
     * @param $data array
     */
    public function loadData($data)
    {
        foreach ($data as $key => $value)
        {
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function validate()
    {

    }

}