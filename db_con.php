<?php 
// forbindelse til mySQL serveren ved brug af mysqli metode
// 1. Variabler (konstanter) til forbindelsen
const HOSTNAME = 'localhost'; // server
const MYSQLUSER = 'katrinardottir_com'; // superbruger
const MYSQLPASS = '2Ha4HTCA'; // password
const MYSQLDB = 'katrinardottir_com'; // database navn
// 2. Forbindelsen via mysqli metoden
$con = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
// at sikre sig, at alle utf8-tegn kan blive brugt under forbindelsen
$con->set_charset ('utf8');
// 3. Tjek
// hvis der er fejl i forbindelsen
if($con->connect_error){
	die($con->connect_error);
// hvis der er hul i gennem
} else {
	echo '';
}
// PHP slut tag kan undlades, hvis filen indeholder "rent" PHP
?>