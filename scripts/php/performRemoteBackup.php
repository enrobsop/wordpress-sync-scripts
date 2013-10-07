<?php

//
// Command-line PHP file to create zip file backup containing the
// website and database.
//

$domain		= '@domain.name@';
$dbName		= '@db.dbname@';
$dbHost		= '@db.host@';
$dbUsername	= '@db.username@';
$dbPassword	= '@db.password@';
$excludes   = "--exclude='@backup.exclude.pattern@' --exclude='@backup.script.file@' --exclude='@install.script.file@'";

echo "Init: checking configuration...<br />";
$docroot = realpath(dirname(__FILE__));
$basedir = realpath(dirname(__FILE__).'/..');
echo "Docroot is: $docroot<br />";
echo "Basedir is: $basedir<br />";

if ($handle = opendir($basedir)) {
    while (false !== ($file = readdir($handle))) {
        if (preg_match('/^.*db_dump\.sql$/', $file)) {
            $dbCreateFile = $file;
            system("rm $file");
        } else if (preg_match('/^.*'.$domain.'-full-backup\.tar$/', $file)) {
            $webappZipFile = $file;
            system("rm $file");
        }
    }
    closedir($handle);
}
echo "Init: Complete.<br />";

echo "MySQL: creating database dump...<br />";
system("mysqldump --user=$dbUsername --password=$dbPassword $dbName > $basedir/db_dump.sql");
echo "MySQL: compressing dump files...<br />";
system("tar -czf $basedir/db_dump.tar.gz -C $basedir db_dump.sql");
echo "MySQL: Complete.<br />";

echo "Website: Adding website files to archive file...<br />";
system("tar -czf $basedir/$domain.tar.gz $excludes *");
echo "Website: Complete.<br />";

echo "Archive: Adding database and website files to combined archive file...<br />";
system("tar -czf $basedir/$domain-full-backup.tar.gz -C $basedir $domain.tar.gz db_dump.tar.gz");
echo "Archive: Complete.<br />";

echo "Tidy: removing working files...<br />";
system("rm $basedir/db_dump.sql");
system("rm $basedir/db_dump.tar.gz");
system("rm $basedir/$domain.tar.gz");
echo "Tidy: Complete.<br />";

?>