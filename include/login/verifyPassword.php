<?php
// Verify the password if the user exists
function verifyPassword($data, $conn)
{
	// Store needed data
    $username = $data["username"];
    // Send query to database
    $sql = "SELECT `id`, `password`, `is_admin` FROM `users` WHERE username='$username'";
    $query = $conn->prepare($sql);
	$query->execute();
    $dataDB = $query->fetchAll(PDO::FETCH_OBJ);
	$dataDBUser = [];
    // Store data in array
    foreach ($dataDB as $key => $value) {
        array_push($dataDBUser, $value->id);
        array_push($dataDBUser, $value->password);
        array_push($dataDBUser, $value->is_admin);
    }
    // Check the user exists or not
    if ($query->rowCount() !== 1) {
        die("User not found");
    }
    // Verify the password
    if (password_verify($data["password"], $dataDBUser[1])) {
        return [$dataDBUser[0], $dataDBUser[2]];
    } else {
        die("Password is wrong");
    }
}
