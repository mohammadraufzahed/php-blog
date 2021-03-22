<?php
// Check the array to not be empty
function isEmpty($data)
{
    if (empty($data["username"])) {
        die("Please enter your username.");
    }
    if (empty($data["password"])) {
        die("Please enter your password");
    }
}
