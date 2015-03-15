<?php
//connect to database
defined("PDO_HOST") or define("PDO_HOST", "localhost");
defined("PDO_USER") or define("PDO_USER", "root");
defined("PDO_PASS") or define("PDO_PASS", "");
defined("PDO_BASE_NAME") or define("PDO_BASE_NAME", "todo");

//path to view
defined("DIR_VIEW_PATH") or define("DIR_VIEW_PATH", $_SERVER['DOCUMENT_ROOT'].'/app/views/');
//path to controller
defined("DIR_CONTROLLER_PATH") or define("DIR_CONTROLLER_PATH", $_SERVER['DOCUMENT_ROOT'].'/app/controllers/');
//controller namespace
defined("__NAMESPACE_CONTROLLER__") or define("__NAMESPACE_CONTROLLER__", 'app\controllers\\');
//public assets
defined("DIR_PUBLIC_ASSETS_PATH") or define("DIR_PUBLIC_ASSETS_PATH", '/app/public/');