<?php

class DefaultCtrl
{
    public function defaultAction() : void {
        $defaultView = new View(null);
        $defaultView->display('default/default.php');
    }
}