<?php 
    require_once 'constants.php';
    require_once '../vendor/AutoLoader/AutoLoader.php';

    use AutoLoader\AutoLoader;

    AutoLoader::load([VENDOR_PATH, SRC_PATH]);
    