<?php
$base = new PDO('mysql:host=127.0.0.1;dbname=base_blog_object', 'root', '');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require_once("objects/blog-manager.class.php");
require_once("objects/user-manager.class.php");
$blogManager = new Blog_manager($base);
$userManager = new User_manager($base);
?>