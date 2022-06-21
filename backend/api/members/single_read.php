<?php

    $member_row = new Member($db);

    $member_row->id = isset($_GET['id']) ? $_GET['id'] : die();
    $member_row->getSingleMember();

    if($member_row && $member_row->name != null){
        // make array
        $emp_arr = array(
            "id" =>  $member_row->id,
            "name" => $member_row->name,
            "email" => $member_row->email,
            "picture" => $member_row->picture,
            "phone" => $member_row->phone,
            "joined_at" => $member_row->joined_at
        );
    
        http_response_code(200);
        echo json_encode($emp_arr);
    }
    else{
        http_response_code(404);
        echo json_encode("Member not found.");
    }


?>