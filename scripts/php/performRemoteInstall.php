<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

//
// Command-line PHP file to create zip file backup containing the
// website and database.
//

$domain		= '@domain.name@';
$dbName		= '@db.dbname@';
$dbHost		= '@db.host@';
$dbUsername	= '@db.username@';
$dbPassword	= '@db.password@';
?>
<html>
<head>
<title>Installer</title>
</head>
<body>

<h1>Installing...</h1>

<?php 

echo "Init: checking configuration...<br />\n";
$docroot = realpath(dirname(__FILE__));
$basedir = realpath(dirname(__FILE__).'/..');

echo "Docroot is: $docroot<br />\n";
echo "Basedir is: $basedir<br />\n";

echo "Unpacking upload ../my.domain.tar.gz<br />\n";
system("tar -xzf $basedir/my.domain.tar.gz -C $basedir");
system("tar -xzf $basedir/my.domain_db.tar.gz -C $basedir");
echo "Complete!<br />\n";

echo "Loading database...<br />\n";
system("mysql --user=$dbUsername --password=$dbPassword $dbName < $basedir/my.domain.sql");
echo "Complete!<br />\n";

echo "Deleting old web files...<br />\n";
system("rm -rf $docroot/*");
echo "Complete!<br />\n";

echo "Unpacking new web files...<br />\n";
system("tar -xzf $basedir/my.domain_web.tar.gz -C $docroot");
echo "Complete!<br />\n";

echo "Deleting working files...<br />\n";
system("rm $basedir/my.domain_db.tar.gz");
system("rm $basedir/my.domain_web.tar.gz");
system("rm $basedir/my.domain.sql");
echo "Complete!<br />\n";

?>
</body>