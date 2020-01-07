<?php
session_start();
	
	$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "spproject";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM config where id<60";
    $result = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>OneStop Laptop Solution</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"> 


    <style>
      #box{
        background-color: #4286f4;
        
      }

      #top-box{
        margin-top: 30;
      }
    </style>
</head>
<body style="padding-top: 0px;">

<nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">

  <!-- Links -->
   <div class="row">
  <ul class="navbar-nav">
   <div class="col-sm-6 col-md-3 col-lg-3">
	<li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
	</div>
	<div class="col-sm-6 col-md-3 col-lg-3">
    <li class="nav-item">
      <a class="nav-link" href=#>Login</a>
    </li>
	</div>
	<div class="col-sm-6 col-md-3 col-lg-3">
    <li class="nav-item">
      <a class="nav-link" href=#>Profile</a>
    </li>
	</div>
	<div class="col-sm-6 col-md-3 col-lg-3">
	<li class="nav-item">
      <a class="nav-link" href="page.php">Search</a>
    </li>
	</div>
	<div class="col-sm-6 col-md-3 col-lg-3">
	<li class="nav-item">
      <a class="nav-link" href=#>Logout</a>
    </li>
	</div>
  </ul>
</div>

</nav>
    
 
    
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img-fluid" src="asset/laptop001.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
    <h3>Welcome To One Stop Solution</h3>
    <p>This is our initiative to make your life easier</p>
  </div>
        
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="asset/laptop002.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
    <h3>Wanna buy a laptop?</h3>
    <p>Try and see what our AI have for you</p>
    </div>
        
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="asset/laptop003.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
    <h3>We Provide the best solution</h3>
    <p>To buy the best possible laptop within your budget</p>
  </div>
        
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <div class="jumbotron-fluid">
        <div class="container-fluid">
        <div class="row">


<?php      

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-sm-4 col-md-4 col-lg-4" id="top-box">
            <div id="box">
            <ul>
              <li>Model: '.$row["model"].'</li>
              <li>Price: '.$row["price"].'</li>
              <li>Product ID: '.$row["id"].'</li>
            </ul>
            </div>
            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Click for Details
            </button>
            
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style="color: black;">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">ASUS ZEN BOOK</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
         <ul>
            <li>Model: '.$row["model"].'</li>
            <li>Brand: '.$row["brand"].'</li>
            <li>Ram: '.$row["ram"].'</li>
            <li>Storage: '.$row["storage"].'</li>
            <li>Clock Speed: '.$row["clock_speed"].'</li>
            <li>Price: '.$row["price"].'</li>
            <li>Processor: '.$row["processor"].'</li>
            <li>Display Size: '.$row["display_size"].'</li>
            <li>Price: '.$row["price"].'</li>
          
          </ul>
      </div>

      <div class="modal-footer">
          
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
            
        </div>';
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
        
            
  ?>
                
                <!--<div class="container">
 
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="home2.php">2</a></li>
    <li class="page-item"><a class="page-link" href="home3">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</div>-->
                
        </div>
        </div>    
        </div>
    </div>
    
    <footer style = "font-family:calibri; letter-spacing:2px; background: blue; text-transform: uppercase;"> Copyright &copy 2018 </footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	
</body>
</html>

  <?php
//$id = $_SESSION["Id"];
//$product = $_POST["product"];
	
	/*$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "gadget";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);

	
	
	 //$sql1 = "SELECT * FROM registration where Id = '$id'";
	 //$result = mysqli_fetch_assoc(mysqli_query($conn, $sql1));
	 
	 
	 
	 $sql1 = "INSERT INTO wishlist (user_id, product_id) VALUES ('$id', '$product')";
	 if (mysqli_query($conn, $sql1)) {
				//echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
	 
	 
	 
	 $name = $result["first_name"]." ".$result["last_name"];
	 $email = $result["email"];
	 $phone = $result["phone"];
	 $user_name = $result["user_name"];
	 $pass = $result["password"];*/

?>