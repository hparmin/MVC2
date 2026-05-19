<?php
$goal = explode('?',$_SERVER['REQUEST_URI']);

$project_directory = '/websoft-mvc/';
$site_url = "http://localhost/websoft-mvc/";

$current_url = str_replace($project_directory,'',$goal[0]);
