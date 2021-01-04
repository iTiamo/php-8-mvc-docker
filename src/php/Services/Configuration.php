<?php

// Database configuration
define("DB_HOST", "db");
define("DB_DATABASE", "master");
define("DB_USER", "root");
define("DB_PASSWORD", "inL8jKcRfEJTDW7");

// Define directories for framework
// ROOT_DIR has to be defined in Router.php
define("MODELS_DIR", join(DIRECTORY_SEPARATOR, [ROOT_DIR, "Models"]));
define("VIEWS_DIR", join(DIRECTORY_SEPARATOR, [ROOT_DIR, "Views"]));
define("ERROR_VIEWS_DIR", join(DIRECTORY_SEPARATOR, [VIEWS_DIR, "Errors"]));
define("CONTROLLERS_DIR", join(DIRECTORY_SEPARATOR, [ROOT_DIR, "Controllers"]));
define("SERVICES_DIR", join(DIRECTORY_SEPARATOR, [ROOT_DIR, "Services"]));
