<?php

define ('INDIRIZZO','localhost');
define ('UTENTE','root');
define ('PASSWORD',"");
define ('DB','license');


mysql_connect(INDIRIZZO,UTENTE,PASSWORD);
mysql_select_db(DB);
?>