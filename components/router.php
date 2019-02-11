<?php


class router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);

    }

    private function getURL()
    {

        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run()
    {
        $url = $this->getURL();

        foreach ($this->routes as $urlPattern => $path) {

            if (preg_match("~$urlPattern~", $url)) {

//                echo "<br>Где ищем (запрос, который набрал пользователь): " . $url;
//                echo "<br>Что ищем (совпадение из правила): " . $urlPattern;
//                echo "<br>Кто обрабатывает: " . $path;

                $internalRoute = preg_replace("~$urlPattern~", $path, $url);

//                echo '<br>Нужно сформулировать: ' . $internalRoute . '<br>';
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';


                $actionName = 'action' . ucfirst(array_shift($segments));

//                echo "$controllerName";
//                echo "$actionName";

                $parameters = $segments;
//                echo '<pre>';
//                print_r($parameters);

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                //               echo $controllerFile;
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }

            }
        }

    }

}