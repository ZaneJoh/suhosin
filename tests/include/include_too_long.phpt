--TEST--
Testing include of too long filename
--SKIPIF--
<?php include "../skipifcli.inc"; ?>
--INI--
suhosin.log.syslog=0
suhosin.log.sapi=255
suhosin.log.script=0
suhosin.log.phpscript=0
suhosin.executor.include.whitelist=
suhosin.executor.include.blacklist=
--FILE--
<?php
$filename1 = str_repeat("A", PHP_MAXPATHLEN+1);
include $filename1;
?>
--EXPECTF--
ALERT - Include filename ('AAAA%sAAAA') is too long (attacker 'REMOTE_ADDR not set', file '%s', line 3)