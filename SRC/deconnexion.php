<?php
session_start();

session_destroy();

header('location:../PUBLIC/index.php');