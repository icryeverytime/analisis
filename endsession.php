<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["idempleado"])
 session_destroy();
?>