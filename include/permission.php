<?php
session_start();
if($_SESSION["isLogged"] == true){
    header("location: /");
}