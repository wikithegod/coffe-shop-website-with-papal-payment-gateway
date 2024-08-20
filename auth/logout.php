<?php

session_start();
session_unset();
session_destroy();
header("location: http://localhost/coffe%20shop/coffe%20shop");
