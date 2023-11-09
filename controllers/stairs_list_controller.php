<?php
require_once 'models/stairs.php';
require_once 'init.php';

class StairsListController
{
    public function showList()
    {
        $data = Stairs::withCount('accidents')->get();
        include 'views/stairs_list_view.php';
    }

    public function deleteItem()
    {
        $urlSegments = explode('/', $_SERVER['REQUEST_URI']);
        $id = end($urlSegments);
        $errMess = json_encode(['message' => 'Élément non trouvé'], 404);
        if ($id ==  null) {
            return $errMess;
        }
        $stairs = Stairs::find($id);
        if (!$stairs) {
            return $errMess;
        }

        $stairs->accidents()->delete();
        $stairs->delete();
        return json_encode(['message' => 'Élément supprimé avec succès'], 200);
    }
}
