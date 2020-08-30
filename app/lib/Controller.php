<?php

/**
 * 
 *  Base Controller
 *  Loads models and views
 */

class Controller 
{

    // Require model file
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        // Instatiate model
        return new $model();
    }

    public function view($view, $data = [])
    {
        //Check for view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        }
        else {
            die('view does not exist');
        }
    }
}
