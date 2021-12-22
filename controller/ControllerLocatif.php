<?php
require_once "./model/ModelLocatif.php";

class ControllerLocatif
{

    private ModelLocatif $model;

    function __construct()
    {
        $this->model = new ModelLocatif;
    }



    public function list()
    {
        $data = $this->model->list();

        $url = $_SERVER['SCRIPT_FILENAME'];
        $path = parse_url($url, PHP_URL_PATH);
        $path_name = pathinfo($path, PATHINFO_FILENAME);
        $result = array('action' => $_GET["action"], 'entity' => $path_name, 'data' => $data);
        require_once "./view/client/list/list.php";
    }
}
