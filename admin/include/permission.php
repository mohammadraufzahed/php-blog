<?php
session_start();
echo $_SESSION["isAdmin"];
if ($_SESSION["isAdmin"] == 'N') {
    header("location: /");
}
