<?php

// Entry point for application
// This is a basic router for our MVC app

define("ROOT_DIR", realpath(join(DIRECTORY_SEPARATOR, [__DIR__, ".."])));

// Includes models & controllers
spl_autoload_register(function ($class) {
    $sources = [
        join(DIRECTORY_SEPARATOR, [CONTROLLERS_DIR, "$class.php"]),
        join(DIRECTORY_SEPARATOR, [MODELS_DIR, "$class.php"])
    ];

    foreach ($sources as $source) {
        if (file_exists($source)) {
            include $source;
        }
    }
});

// Includes services
require join(DIRECTORY_SEPARATOR, [SERVICES_DIR, "Configuration.php"]);
require join(DIRECTORY_SEPARATOR, [SERVICES_DIR, "Database.php"]);

// Gets routing details
$request = parse_url($_SERVER["REQUEST_URI"]);      // Gets HTTP Request
$pathComponents = explode('/', $request["path"]);   // Gets path components

if (isset($request["query"])) {                     // Gets the query string
    $query = parse_str($request["query"], $_GET);
}

// Sets default route to /Home/Index
$controllerName = empty($pathComponents[1]) ? "Home" : $pathComponents[1];
$actionName = empty($pathComponents[2]) ? "Index" : $pathComponents[2];
$parameter = $pathComponents[3] ?? null;

// Registers services
$database = new Database();

// Passes request to controller or shows 404 if controller doesn't exist
$controllerName = $controllerName . "Controller";
if (class_exists($controllerName)) {
    $controller = new $controllerName($database);
    $controller->_pre($actionName, $_REQUEST, $parameter);
} else {
    BaseController::renderError("404");
}
