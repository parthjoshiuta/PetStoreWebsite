<?php 
session_start();
$user = $_SESSION['login_user'];
?>
<HTML>
    <HEAD>
        <TITLE> BUSINESS'S PET STORE
        </TITLE>
        <link rel="stylesheet" href = "CSS/pet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </HEAD>
    <BODY id = "wrapper1">
        <div id="wrapper">
        <h1>Business's Pet Store</h1>
           <div id = "mains">
            <div id = "nav">
        <a href="index.html" class = "navi">Home</a><br>
        <a href="aboutus.html" class = "navi">About Us</a><br>
        <a href="contactus.php" class = "navi">Contact Us</a><br>
        <a href="client.php" class = "navi">Client</a><br>
        <a href="service.php" class = "navi">Service</a><br>
        <a href="login.php" class = "navi">Login</a>
        </div>
        <div id = "bod"><img src="images/pet store banner 5 png (1).png" width= 100%>
        <h2> My Business</h2>
        <p>Required Information is marked with an asterick(*)</p>
        <form method="post" id = "form1" action = "">
        <table id="tableform">
        <tr>    
            <td>Business Name:</td>
            <td><input type="text"  name = "bname"></td>   
        </tr>
        <tr>
            <td>*Service:</td>
            <td><input type="text" required name = "serv"></td>
        </tr>
        <tr>
            <td><input type="submit" name = "submit" value = "Add New One"></td>
            <td></td>
        </tr>
            </table>
        </form>
            <?php
$bname = "";
$serv = "";
$id = 0000;
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bname=$_POST["bname"];
    $serv=$_POST["serv"];
    
    if($serv=="")
    {
    echo "<p>Please enter required fields</p>";
    }
    else{
    $conn = mysqli_connect($servername,$username,$password,$db);
    if (mysqli_connect_error()) {
    die("<p>Connection failed: " . mysqli_connect_error()."</p>");
    } 
    echo "<p>Connected successfully <br></p>";
    $sql = "INSERT INTO SERVICE_DET VALUES(?,?,?,?);";
    
    $statement = mysqli_prepare($conn,$sql);
    
    mysqli_stmt_bind_param($statement,'isss',$id,$user,$bname,$serv);
    
    if (mysqli_stmt_execute($statement) === TRUE) {

    echo "<p>New record created successfully</p>";
    } else {
    echo "<p>Error: " . $sql . "<br>" . mysqli_connect_error() . "</p>";       
    }
    mysqli_stmt_close($statement);
    mysqli_close($conn);
    
}
}
?>
               <footer>
            <p><i> Copyright &copy; Pet Store</i></p>
            <a href = "mail://parth@joshi.com">parth@joshi.com</a>
        </footer>
        </div>
        </div>
        </div>
    </BODY>
</HTML>
