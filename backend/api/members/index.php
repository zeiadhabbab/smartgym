<?php
//create rest api php mysql
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    include_once '../../config/db_connection.php';
    include_once '../../class/members.php';

    $db_connection = new Database();
    $db = $db_connection->getConnection();

    $request_method = $_SERVER['REQUEST_METHOD'];


    switch($request_method){
        case 'POST':
            include_once 'create.php';   
            break;
        case 'GET':
            if(isset($_GET['id'])){
                include_once 'single_read.php';
            }else{
                include_once 'read.php';
            }     
            break;
        case 'PUT':  
            /* 
            {
                "id":"338",
                "name":"zeiad",
                "email":"zeiad@live.com",
                "phone":"0595407778",
                "picture":"picture",
                "joined_at":"05/06/1986"
            }
            */
            include_once 'update.php';
            break;
        case 'DELETE':
            //Example data {"id":"338"}
            include_once 'delete.php';
            break;

    }

    
?>