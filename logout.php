<?php
session_start();
include "koneksi.php";
?>

<form action="" method="POST">  
<table align="center">
        <tr>
            <th colspan="2" height="40">LOGIN FORM</th>
        </tr>
        <tr>
            <td width="100"> Username </td>
            <td> <input type="text" name="username"></td>
        </tr>
        <tr>
            <td> Password </td>
            <td> <input type="password" name="password"> </td>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" value="Login" name="proseslog"> </td>
        </tr>
</table>
</form>


<?php

if(isset($_POST['proseslog'])){
    $sql = mysqli_query($koneksi,"select * from user where username = '$_POST[username]'and password = '$_POST[password]'");

    $cek = mysqli_num_rows($sql);
    if($cek > 0){
        $_SESSION['username'] = $_POST['username'];

        echo "<meta http-equiv=refresh content=0;URL='home.php'>";
    }else{
        echo "<p align=center><b> Username dan Password salah ! </b></p>";
        echo "<meta http-equiv=refresh content=2;URL='login.php'>";
    }
}

?> 


