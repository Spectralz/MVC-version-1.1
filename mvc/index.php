<?php
session_start();

require_once("ClassLoader.php");
ClassLoader::getInstance()->register();
Router::getInstance()->register();