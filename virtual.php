<?php
/**
 * create a new vhost on this server
 * 
 * @param host name
 */
$ds = DIRECTORY_SEPARATOR;

//for windows
$eol = chr(10) . chr(13);
//for other OS's
//$eol = "\n";

// you may need to alter this if your host file is elsewhere
$hostsFile = "C:\Windows\System32\drivers\etc\hosts";
$hostFH = fopen($hostsFile, 'a+');

// you may need to alter this if your htttp-vhosts.conf file is elsewhere
$apacheVHfile = "D:\wamp\bin\apache\Apache2.2.21\conf\extra\httpd-vhosts.conf";
$apacheFH = fopen($apacheVHfile, 'a+');

//if($argc <= 1) die("You must specify a host name\n");
echo '

























Enter your virtual hostname.
For example, 

\'test\'

would create a virtual host for the url 

http://test.wordpoets.dev

: ';
$newAliasDir = trim(fgets(STDIN));
$hostName = trim($newAliasDir,'/\'');


//$hostName = $argv[1];
$pathName = "d:{$ds}wamp{$ds}www{$ds}$hostName";
echo "\nCreating new virtual host '$hostName'\n";

if(!file_exists($pathName)) mkdir($pathName);

$writeStr = "\n127.0.0.1       $hostName.wordpoets.dev";
writeFile($hostFH, $writeStr, $hostsFile);

$writeStr = "<VirtualHost *:80>
    DocumentRoot \"$pathName\"
    ServerName $hostName.wordpoets.dev
    ErrorLog \"logs{$ds}$hostName.wordpoets.dev-error.log\"
    CustomLog \"logs{$ds}$hostName.wordpoets.dev-access.log\" common
</VirtualHost>$eol";

writeFile($apacheFH, $writeStr, $apacheVHfile);

fclose($hostFH);
fclose($apacheFH);

echo "New virtual host $hostName created. Restart WAMP server\n";
    echo "\n===================================\n\n";
echo '
Press Enter to exit...';
trim(fgets(STDIN));
exit();


function writeFile($file, $writeStr, $fileName = null){
    $written = fwrite($file, $writeStr);
    if($written){
        echo "\nModified $fileName\n";
    } else echo "\nCould not Modify $fileName\n";
}