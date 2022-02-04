<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
  /* Dropdown Button */
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content, .dropdown-content1 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a, .dropdown-content1 a{
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover, .dropdown-content1 a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
    <title>Student CRUD</title>
  </head>
  <body>
  <div class="container">

<?php
        $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));

        $result = $mysqli-> query("select * from student") or die($mysqli->error);
        $result -> fetch_assoc();
?>

<div class="row justify-content-center">

 <h1> Student Data</h1>

<hr>


<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Filter By Year</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="?<?php echo "d1" ?>" name="d1">2000-2010</a>
   
    <a href="?<?php echo "d2" ?>">2010-2020</a>
    <a href="?<?php echo "d3" ?>">2020-2022</a>
    <a href="?<?php echo "all" ?>">All</a>

  </div>
</div>

<div class="dropdown">
  <button onclick="myFunction1()" class="dropbtn">Filter By City</button>
  <div id="myDropdown1" class="dropdown-content1">
    <a href="?<?php echo "m" ?>" name="d1">Mumbai</a>
    <a href="?<?php echo "p" ?>" name="d1">Pune</a>
    <a href="?<?php echo "n" ?>" name="d1">New York</a>
    <a href="?<?php echo "all" ?>" name="d1">All</a>

  </div>
</div>

<?php
if(isset($_GET['d1']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student where DOB between '2000-01-01' and '2010-01-01'") or die($mysqli->error);
   
    
}
elseif(isset($_GET['d2']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student where DOB between '2010-01-01' and '2020-01-01'") or die($mysqli->error);
    
    
}
elseif(isset($_GET['d3']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student where DOB between '2020-01-01' and '2022-12-31'") or die($mysqli->error);
    
    
}
elseif(isset($_GET['all']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student") or die($mysqli->error);
    
    
}
else{}


if(isset($_GET['m']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student where City = 'Mumbai' ") or die($mysqli->error);
   
    
}
elseif(isset($_GET['p']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student where City = 'Pune'") or die($mysqli->error);
    
    
}
elseif(isset($_GET['n']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student where City = 'New York'") or die($mysqli->error);
    
    
}
elseif(isset($_GET['all']))
{
  
  $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqlierror($mysqli));
    $result = $mysqli-> query("select * from student") or die($mysqli->error);
    
    
}
else{}



?>

<table class="table table-border">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>
      <th scope="col">DOB</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <?php
 while ($row = $result -> fetch_assoc()): ?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $row['ID']; ?></th>
      <th scope="row"><?php echo $row['Name']; ?></th>
      <th scope="row"><?php echo $row['City']; ?></th>
      <th scope="row"><?php echo $row['DOB']; ?></th>
      <td>

      <a href="process.php?delete=<?php echo $row['ID'];?>"  onClick="javascript: return confirm('Please confirm deletion');"
       class="btn btn-danger">Delete</a>
      
    </td>
    </tr>
  </tbody>
<?php endwhile; ?>
</table>

</div>

<h1 style="padding-left: 100px;"></h1>
<div class="btn-group">
<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Data Form
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="#">
  <?php require_once 'process.php'; ?>
    <div>
  <form style="padding-left: 100px;" action="process.php" method="POST">

  <div class="form-group" >
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" name="name">
    
  </div>

  <div class="form-group" >
    <label for="name">City</label>
    <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="Enter city" name="city">
    
  </div>

  <div class="form-group" >
    <label for="name">DOB</label>
    <input type="date" class="form-control" id="date" aria-describedby="date" placeholder="Enter DOB" name="date">
    
  </div>
 

  <button type="submit" class="btn btn-primary" name="save">Submit</button>

</form>
 </a>
  </div>
</div>
  <!-- <?php require_once 'process.php'; ?>
    <div>
  <form style="padding-left: 100px;" action="process.php" method="POST">

  <div class="form-group" >
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name" name="name">
    
  </div>

  <div class="form-group" >
    <label for="name">City</label>
    <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="Enter city" name="city">
    
  </div>

  <div class="form-group" >
    <label for="name">DOB</label>
    <input type="date" class="form-control" id="date" aria-describedby="date" placeholder="Enter DOB" name="date">
    
  </div>
 

  <button type="submit" class="btn btn-primary" name="save">Submit</button>

</form> -->
</div>


<script>
  function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
 </div>
  </html>