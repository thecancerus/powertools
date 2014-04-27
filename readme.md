Steps to setup virtual.php

Please be warned steps mentioned here open up a potential malware issue on your windows machine if you don't use good antivirus.

1) Give systems32\drivers\etc\hosts file write permission for regular user. Note: this step open a potential problem with malwares, but if you use good antivirus then it won't be a big deal.

2) Copy line number 138 and 139 from wampmanager.tpl from repo and add it to wampmanager.tpl in your wamp directory at same position. relevant lines are 

Type: separator; Caption: "WPoets Tools"
Type: item; Caption: "Add Virtual Host";Action: run; FileName: "d:/wamp/bin/php/php5.3.10/php.exe";Parameters: "virtual.php";WorkingDir: "d:/wamp"; Flags: waituntilterminated; Glyph: 1

3) make sure the "php.exe" and "d:/wamp" path are correct as per your wamp server setup.
4) copy virtual.php file in same folder as your wampmanger.tpl file.
5) verify the paths in line number 15 and 19 are correct as per your wampserver setup. ie path to hosts file as well as path to httpd-vhosts.conf are correct.

6) Open http.conf file and uncomment following line
#Include conf/extra/httpd-vhosts.conf br removing '#'  and save the file.

7) Restart wampserver.
