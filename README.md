# PHP 8 MVC Docker
This project has been created for PHP Developers that want to develop in a PHP 8 (with Xdebug 3 for local development), Apache and MySQL stack in a very simple MVC + Services framework. It should be considered as a barebones foundation to quickly build your app upon.

This repository contains secrets and other sensitive information that would normally not be commited in a web application. The repository should be considered for educational purposes only and care should be taken never to expose any vulnerable data. To make this application secure, you can add `build/db/db.env` and `src/php/Services/Configuration.php` to `.gitignore` and remove them from the repository. All future secret configuration should be limited to configuration files added in `.gitignore`.

## Installation & Usage
### Requirements
- Docker
- Docker Compose

Run `docker-compose up` to start the application. Ensure ports 80, 3306 and 8080 are free so Docker can bind to thse ports. Go to `localhost` to view the application. Go to `localhost:8080` view the admin panel. The password to login can be found in the `build/db/db.env` file.

## Developing
This application contains a custom made minimal PHP MVC framework. The public directory for this application is contained in `src/php/html`. The entrypoint for the application is `Router.php`.

In `Router.php`, all controllers and models are loaded, services are created and the request is redirected to the Controller method according to the path, where paths are formatted as `/ControllerName/Action`. For example the path `/Home/Index` is redirected to the `Index` function on the `HomeController` class.

## License
[MIT](https://choosealicense.com/licenses/mit/)