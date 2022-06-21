<?php

$member_rows = new Member($db);

    $stmt = $member_rows->getMembers();
    $member_rowCount = $stmt->rowCount();


    echo json_encode($member_rowCount);

    if($member_rowCount > 0){
        
        $memberArr = array();
        $memberArr["body"] = array();
        $memberArr["member_rowCount"] = $member_rowCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "picture" => $picture,
                "joined_at" => $joined_at
            );

            array_push($memberArr["body"], $e);
        }
        echo json_encode($memberArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }

?>