<?php
ini_set('display_errors', 1);
require_once(__DIR__ . '/app/coreAutoload.php');
require_once(__DIR__ . '/app/core/config/config.php');

(new Route)->run();