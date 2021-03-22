<?php
session_start();
if ($_SESSION["isAdmin"] == 'N') {
    header("location: /");
}
