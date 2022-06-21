<?php


    $member_row = new Member($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $member_row->id = $data->id;
    
    // member values
    $member_row->name = $data->name;
    $member_row->email = $data->email;
    $member_row->phone = $data->phone;
    $member_row->picture = $data->picture;
    $member_row->joined_at = $data->joined_at;
    
    if($member_row->updateMember()){
        echo json_encode("Member data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }



?>