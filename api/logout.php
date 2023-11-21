<?php
@session_start();
header("location: /spoj/");
@session_destroy();
?>