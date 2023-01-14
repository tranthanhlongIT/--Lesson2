<?php

// Temporary work as middleware and routes
class App
{
    private $controller;
    private $action;
    private $params;

    function __construct()
    {
        $this->controller = "products";
        $this->action = "index";
        $this->params = [];

        $this->handleUrl();
    }

    // URL segment
    function getUrl()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"]), FILTER_VALIDATE_DOMAIN));
        }
    }

    function handleUrl()
    {
        $array = $this->getUrl();

        //Get Controller
        if (isset($array[0])) {
            if (file_exists("./mvc/controllers/" . $array[0] . ".php")) {
                $this->controller = $array[0];
                unset($array[0]);
                require_once "./mvc/controllers/" . $this->controller . ".php";
            } else $this->loadError();
        }

        //Get Action
        if (isset($array[1])) {
            if (method_exists($this->controller, $array[1])) {
                $this->action = $array[1];
                unset($array[1]);
            }
        }

        $this->params = $array ? array_values($array) : [];

        //Create controller based on URL Segment
        if (file_exists("./mvc/controllers/" . $this->controller. ".php") && method_exists($this->controller, $this->action))
            call_user_func_array([new $this->controller(), $this->action], $this->params);
    }

    function loadError($name = '404')
    {
        require_once './mvc/views/errors/' . $name . '.php';
    }
}
