<?php
  session_start();



?>



<?php
//include 'header.php';
//oracle database connection start here


include("dbconnection.php");;

 // $username = $_POST['username'];
  $email=$_POST['email1'];
   // $password = $_POST['password'];
    $password= $_POST['password1'];


  $stid=OCIParse($con, "SELECT id FROM USER_admin WHERE email='$email' AND password='$password'");

OCIExecute($stid) or die(oci_error($stid));
   oci_fetch_all($stid, $array);
unset($array);
    $numberofrows = oci_num_rows($stid);
$email=$_POST['email1'];
   // $password = $_POST['password'];
    $password= $_POST['password1'];
   if($numberofrows > 0){
      $stid1 = OCIParse($con, "SELECT id FROM USER_admin WHERE email='$email' AND password='$password'");
  OCIExecute($stid1) or die(OCIError($stid1));

      OCIFetch($stid1);

  
echo $stid;

  if($stid1){

  $_SESSION['user'] = OCIResult($stid1, "ID");
  
 // header("location: customer-account.php");
  //echo $row[_id];
  echo "Successfully Logged in...";
//Redirect('customer-account.php', false);
 echo '<script>window.location.href = "index.html";</script>';
}else{
  
 echo "Email of password is worng login again: " ;
  
} $e = oci_error();   // For oci_connect errors do not pass a handle
    trigger_error(htmlentities($e['message']), E_USER_ERROR);
 //header("location: register.php");

}
  
?>



echo "Successfully Logged in...";
 echo '<script>window.location.href = "index.html";</script>';

 <!--<a href="logadmin.php">Go back</a>