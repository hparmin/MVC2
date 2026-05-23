<?php
$goal = explode('?',$_SERVER['REQUEST_URI']);
$project_directory = '/websoft-mvc/';

$project_full_directory = $_SERVER['CONTEXT_DOCUMENT_ROOT'].$project_directory;
$images_location = $project_full_directory."public/images/uploads/";

$site_url = "http://localhost/websoft-mvc/";

$images_src = $site_url."public/images/uploads/";
$current_url = str_replace($project_directory,'',$goal[0]);
