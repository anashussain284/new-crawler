<?php

include_once "vendor/autoload.php";

use MyCrawler\Classes\News;

$newsDom = new News("https://www.thehindu.com/latest-news/");
$headlines = $newsDom->getHeadLines();
include("Templates/Titles.php");