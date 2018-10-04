<html>
<body>
<?

echo "ADDED USER_general";
$sql="insert into USER_general values('$ID','$FIRST_NAME','$LAST_NAME','$TELEPHONE','$EMAIL','$ADDRESS','$CITY','$COUNTRY','$POST_CODE','$PASSWORD','','')";
include("dbconnection.php");;
$connect=ocilogon($dbuser, $dbpass, $dbname);
$stmt=ociparse($connect,$sql);
ociexecute($stmt);

?>

</body>
</html>