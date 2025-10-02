<?php

use lib\Route;
use app\controllers\HomeController;

Route::get("/home", HomeController::class, "index"); 

Route::dispatch();

?>