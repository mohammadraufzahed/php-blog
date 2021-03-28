<?php
// Verify the password if the user exists
function verifyPassword($data, $conn)
{
	// Store needed data
    $username = $data["username"];
    // Send query to database
    $sql = "SELECT `id`, `password`, `is_admin` FROM `users` WHERE username='$username'";
    $dataDB = $conn->prepare($sql);
    $dataDB->execute();
    $dataDB = $dataDB->fetchAll(PDO::FETCH_OBJ);
    // Define a needed variable
    $dataDBUser = [];
    $userFound = 0;
    // Store data in array
    foreach ($dataDB as $key => $value) {
        array_push($dataDBUser, $value->id);
        array_push($dataDBUser, $value->password);
        array_push($dataDBUser, $value->is_admin);
        $userFound++;
    }
    // Check the user exists or not
    if ($userFound !== 1) {
        die("User not found");
    }
    // Verify the password
    if (password_verify($data["password"], $dataDBUser[1])) {
        return [$dataDBUser[0], $dataDBUser[2]];
    } else {
        die("Password is wrong");
    }
}
