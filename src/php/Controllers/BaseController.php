<?php

class BaseController
{
    // Gets called before every controller function
    public function _pre(string $actionName, $request, $parameter)
    {
        $this->{$actionName}($request, $parameter);
    }

    // Renders error page in /Views/Errors
    public static function renderError(string $error)
    {
        include ERROR_VIEWS_DIR . "$error.php";
    }

    // Gets the controller name
    protected function controllerName()
    {
        return str_replace("Controller", "", get_class($this));
    }

    // Renders any given page for the controller or displays 404
    protected function render(string $page)
    {
        $view = join(DIRECTORY_SEPARATOR, [VIEWS_DIR, $this->controllerName(), "$page.php"]);

        if (file_exists($view)) {
            include $view;
        } else {
            self::renderError("404");
        }
    }

    // Redirects to any other page
    protected function redirect(string $location, array $queryParams = null)
    {
        if (!is_null($queryParams)) {
            $queryString = '?' . http_build_query($queryParams);
        }

        if (isset($queryString)) {
            header("Location: " . $location . $queryString);
            die();
        } else {
            header("Location: " . $location);
            die();
        }
    }
}
