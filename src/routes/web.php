<?php

use Illuminate\Support\Facades\Route;

foreach (glob(base_path(). '/Modules/*/routes/*.php') as $router_files){
    require_once $router_files;
}
