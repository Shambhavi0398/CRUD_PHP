<?php

$mysqli = new mysqli('localhost','root','' ,'crud',) or die(mysqli_error($mysqli));

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $city = $_POST['city'];
    $dob = $_POST['date'];

$mysqli-> query("INSERT INTO student (name,city,dob) VALUES ('$name','$city','$dob')") or die($mysqli->error);
header("location: form.php");
}

if(isset($_GET['delete']))
{

    $id = $_GET['delete'];
    $mysqli-> query("delete from student where ID=$id");
    header("location: form.php");
}

// if(isset($_GET['d1']))
// {
    
//     $mysqli-> query("select * from student where DOB between '2000-01-01' and '2010-01-01'") or die($mysqli->error);
//     header("location: form.php");

//     // if(mysqli_num_rows($run)>0) 
//     // {


//     // }
//     // else{
//     //     echo "No record found.";
//     // }
// }

?>