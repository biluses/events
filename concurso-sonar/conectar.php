<?php
$BD="db453940270";
$HOST="db453940270.db.1and1.com";
$USUARIO="dbo453940270";
$PASSWORD="Yohagopasta13";
$dale=@mysql_connect($HOST,$USUARIO,$PASSWORD) or die ("no se pudo conectar");
$sel=@mysql_select_db($BD, $dale);
?>