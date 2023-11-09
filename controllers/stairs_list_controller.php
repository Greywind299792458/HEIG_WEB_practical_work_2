<?php
require_once 'models/stairs.php';
require_once 'init.php';

class StairsListController
{
    public function showList()
    {
        $data = Stairs::all();
        include 'views/stairs_list_view.php';
    }
}
