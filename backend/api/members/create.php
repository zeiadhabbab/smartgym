<?php


$db_connection = new Database();
$db = $db_connection->getConnection();

$member_row = new Member($db);

$data = json_decode(file_get_contents("php://input"));

$member_row->name = $data->name;
$member_row->email = $data->email;
$member_row->phone = $data->phone;
$member_row->picture = $data->picture;
$member_row->joined_at = date('Y-m-d H:i:s');

if($member_row->createMember()){
    echo "Member $member_row->joined_at joined_at successfully.";
} else{
    echo 'Member could not be joined_at.';
}


?>