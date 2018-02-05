<?php
$data=file_get_contents('php://input');
$my_data= json_decode($data);
//config contains constansts, database parameters, email parameters, etc.
include('../config.php');
//Database contains PDO handle for database
include('../classes/Database.php');
include('../classes/{module}.php');
$my_{module}=new {module}();
$result="START";
if(!empty($my_data->db_table) && !empty($my_data->id) && !empty($my_data->column) && !empty($my_data->data) && !empty($my_data->activeusr) && !empty($my_data->activeusrfl)){
    $value= addslashes($my_data->data);
    $result=$my_Energized_Projects->updateDB($my_data->db_table,$my_data->id,$my_data->column,$value,$my_data->activeusr,$my_data->activeusrfl);
}
//data is returned for javascript to handle, e.g. inject into DOM element, etc.
echo (string)$result;