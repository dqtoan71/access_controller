<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 2/27/2018
 * Time: 3:41 PM
 */


use toandang\access_controller\Acl;
include "vendor/autoload.php";


$users = "User";

$acl = new Acl('app/config/acl.json',$users);

$group = $acl->getGroup();
$accessdata = $acl->getAccessData();
$result =  $acl->isAllowed("login", "login");



//echo "<pre>";
//var_dump($group);
//echo "</pre>";
//
//echo "<pre>";
//var_dump($accessdata);
//echo "</pre>";

echo "<pre>";
var_dump($result);
echo "</pre>";


