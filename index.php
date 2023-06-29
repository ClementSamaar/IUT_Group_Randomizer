<?php
require 'Core/Autoload.php';

$ctrlName = $_GET['ctrl'] ?? null;
$actionName = $_GET['action'] ?? null;

$ctrl = new Controller($ctrlName, $actionName);
ob_start();
$ctrl->callCtrl();

$view = new View(array('body' => ob_get_clean()));
$view->setTitle('Group Randomizer - ' . ucfirst($ctrlName ?? 'home'));
$view->display('common/layout.php');

$pdo = new PDOConnect();
$pdo->connect();