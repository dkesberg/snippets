<?php
/**
 * Laravel validator extended for image dimension validation
 */

namespace dkesberg\php\laravel;

use Illuminate\Validation\Validator as IlluminateValidator;
use Symfony\Component\HttpFoundation\File\File as File;

class Validator extends IlluminateValidator {

    /**
     * Checks if width and height are below the expected max length
     * 
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateImgSideLengthMax($attribute, $value, $parameters)
    {
        $sideLengthMax = $parameters[0];

        if ( ! $value instanceof File or $value->getPath() == '') {
            return false;
        }

        $sizes = @getimagesize($value->getRealPath());
        if($sizes === false) {
            return false;
        }

        return ($sizes[0] <= $sideLengthMax and $sizes[1] <= $sideLengthMax);
    }

    /**
     * Replace function for validateImgSideLengthMax() error messages
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameters
     * @return mixed
     */
    protected function replaceImgSideLengthMax($message, $attribute, $rule, $parameters)
    {
        return str_replace(':length', $parameters[0], $message);
    }

    /**
     * Checks if width and height are over the expected min length
     * 
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateImgSideLengthMin($attribute, $value, $parameters) {

        $sideLengthMin = $parameters[0];

        if ( ! $value instanceof File or $value->getPath() == '') {
            return false;
        }

        $sizes = @getimagesize($value->getRealPath());
        if($sizes === false) {
            return false;
        }

        return ($sizes[0] >= $sideLengthMin and $sizes[1] >= $sideLengthMin);

    }

    /**
     * Replace function for validateImgSideLengthMin() error messages
     * 
     * @param $message
     * @param $attribute
     * @param $rule
     * @param $parameters
     * @return mixed
     */
    protected function replaceImgSideLengthMin($message, $attribute, $rule, $parameters)
    {
        return str_replace(':length', $parameters[0], $message);
    }
}
