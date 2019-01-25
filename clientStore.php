<?php 
session_start();
$user = $_SESSION['login_user'];
?>
<HTML>
    <HEAD>
        <TITLE> CLIENT'S PET STORE
        </TITLE>
        <link rel="stylesheet" href = "CSS/pet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </HEAD>
    <BODY id = "wrapper1">
        <div id="wrapper">
        <h1>Client's Pet Store</h1>
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
        <h2> My Pet</h2>
        <p>Required Information is marked with an asterick(*)</p>
        <form method="post" id = "form1">
        <table id="tableform">
        <tr>    
            <td>Client Name:</td>
            <td><input type="text" name = "cName"></td>   
        </tr>
        <tr>
            <td>*My Pet:</td>
            <td><input type="text" required name = "pName"></td>
        </tr>
        <tr>
            <td><input type="submit" name = "submit" value = "Add New One"></td>
            <td></td>
        </tr>
            </table>
        </form>
        <?php
$cName = "";
$pName = "";
$id = 0000;
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cName=$_POST["cName"];
    $pName=$_POST["pName"];
    
    if($pName=="")
    {
    echo "<p>Please enter required fields</p>";
    }
    else{
    
    if (mysqli_connect_error()) {
    die("<p>Connection failed: " . mysqli_connect_error()."</p>");
    } 
    echo "<p>Connected successfully <br></p>";
    $sql = "INSERT INTO CLIENT_DET VALUES(?,?,?,?);";
    
    $statement = mysqli_prepare($conn,$sql);
    
    mysqli_stmt_bind_param($statement,'isss',$id,$user,$cName,$pName);
    
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