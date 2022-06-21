<?php

    $member_row = new Member($db);
        
    $data = json_decode(file_get_contents("php://input"));

    $member_row->id = $data->id;

    if($member_row->deleteMember()){
        echo json_encode("Member deleted.");
    } else{
        echo json_encode("Data could not be deleted");
    }


?>