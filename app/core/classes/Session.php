<?php
namespace app\core\classes;
Class Session {
    function __construct() {
        session_start();
    }
}