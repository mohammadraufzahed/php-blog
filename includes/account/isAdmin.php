<?php
session_Start();
if ($_SESSION['isAdmin'] == false) {
    header('location: /');
} else {
}
