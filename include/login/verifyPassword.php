<?php
// Verify the password if the user exists
function verifyPassword($data, $conn)
{
    $username = $data["username"];
    $sql = "SELECT `id`, `password` FROM `users` WHERE username='$username'";
    $dataDB = $conn->query($sql);
    $dataDBUser = [];
    $userFound = 0;
    foreach ($dataDB as $key => $value) {
        array_push($dataDBUser, $value["id"]);
        array_push($dataDBUser, $value["password"]);
        $userFound++;
    }
    if ($userFound !== 1) {
        die("User not found");
    }
    if (password_verify($data["password"], $dataDBUser[1])) {
        return $dataDBUser[0];
    } else {
        die("Password is wrong");
    }
}
