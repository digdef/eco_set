<?php
header("Content-type: text/plain");
if($_SERVER['HTTP_HOST'] !== 'eco-set.ru')
{
	include "../robots.subdomain.txt";
}
else
{
	include "../robots.txt";
}
