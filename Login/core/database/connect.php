<?php
$connect_error ='Sorry, were  experiencing connection problems.';
mysql_connect('tunnel.pagodabox.com','claudine','yKdz23kP', 3306) or die($connect_error);
mysql_select_db('login_admin') or die($connect_error);

?>