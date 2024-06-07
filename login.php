<?php 
session_start();
$db_connect=mysqli_connect('localhost','root','','serwis');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
if(isset($_SESSION['isLogOn'])){
$isLogOn=$_SESSION['isLogOn'];
$userLogin=$_SESSION['userLogin'];
$userPassword=$_SESSION['userPassword'];
$result =mysqli_query($db_connect,'SELECT * FROM `konta` WHERE login="jan@kowalski.gmail.com";');
$row=mysqli_fetch_row($result);
if($userLogin==$row[1] and $userPassword==$row[2]){
    $_SESSION['isLogOn']=true;
    // header ("Location: ./");
}
else{
    $_SESSION['isLogOn']=false;

}
}
else{
if(isset($_POST['userLogin']) and isset($_POST['userPassword'])){
$result=mysqli_query($db_connect,"SELECT * FROM `konta` WHERE login=$userLogin and haslo=$userPassword;");
$row=mysqli_fetch_row($result);
if(is_null($row)){
    echo"niepoprawny login lub haslo";
}{
    $_SESSION['isLogOn']=true;
    // header ("Location: ./");
}

}else{
    echo"nei ma loginu albo hasla";
}
}

?>