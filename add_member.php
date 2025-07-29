<?php
require 'classes/Database.php';
require 'classes/Member.php';

$db = (new Database())->getConnection();
$member = new Member($db);

$name = $_POST['name'];
$parent = $_POST['parent'] !== '' ? $_POST['parent'] : null;

$success = $member->addMember($name, $parent);
$newId = $db->lastInsertId();

echo json_encode([
    'success' => $success,
    'new_id' => $newId
]);
?>