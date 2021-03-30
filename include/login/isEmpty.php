<?php
// Check the array to not be empty
function isEmpty(array $data): void
{
    // Check the username field
    if (empty($data["username"])) {
        die("Please enter your username.");
    }
    // Check the password field
    if (empty($data["password"])) {
        die("Please enter your password");
    }
}
