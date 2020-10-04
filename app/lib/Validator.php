<?php


class Validator
{
    /**
     * Method for sanitizing input data.
     *
     * @param string $data
     * @return string
     */
    public static function sanitizeData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    /**
     * Method for checking if input is numeric.
     *
     * @param $input
     * @return int
     */
    public static function Numeric($input){
        $exp = "/[0-9]+/";
        return preg_match($exp,$input);
    }

    /**
     * Method for checking if input has email format.
     *
     * @param $input
     * @return int
     */
    public static function Email($input){
        $exp = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
        return preg_match($exp,$input);
    }

    /**
     * Method for checking if input is only letters.
     *
     * @param $input
     * @return int
     */
    public static function Alpha($input){
        $exp = "/^[a-zA-Z]/";
        return preg_match($exp,$input);
    }

    /**
     * Method for checking if input is alphanumeric.
     *
     * @param $input
     * @return int
     */
    public static function AlphaNumber($input){
        $exp = "/^[a-zA-Z0-9]/";
        return preg_match($exp,$input);
    }
}