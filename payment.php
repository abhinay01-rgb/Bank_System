
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Universe_Bank</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="styles.css" rel="stylesheet" />
        <style>
            


* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<script>
function myFunction() {
  alert("Payment Successful !!");
}
</script>
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
            <div class="container">
                <a class="text-primary navbar-brand mr-auto" href="index.html"><img src="img/logo.png" height="30" width="41">Universe Bank</a> 
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class=" collapse navbar-collapse" id="navbarResponsive">
                    <ul class=" navbar-nav ml-auto">
                        <li class="nav-item"><a class="text-primary nav-link js-scroll-trigger" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="text-primary nav-link js-scroll-trigger" href="payment.php">Payment</a></li>
                        <li class="nav-item"><a class="text-primary nav-link js-scroll-trigger" href="customer.html">Client</a></li>     
                </div>
            </div>
        </nav>
        <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $money=$_POST['money'];
        

      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "payment";

     
      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn)
      {
          
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        
        // Submit these to a database
        // Sql query to be executed 
        $sql="INSERT INTO `pay` (`sno`, `name`, `email`,  `contact`,'money') VALUES ('','$name', '$email','$contact',$money')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            //echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }    
?>

        <br>
        <br><br><br><br><br>
        
        <div class="row">
        <div class="container mt-3">
    <div class="container">

      <form action="/bank/payment.php">
        <div class="row">
          <div class="col-50">
            <h3>Transfer To:</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Enter your full name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email">
            <label for="contact"><i class="fa fa-phone fa-lg"></i> Contact Number</label>
            <input type="text" id="contact" name="contact" placeholder="Contact number">
            <label for="money"><i class="fas fa-dollar-sign"></i> Money $</label>
            <input type="text" id="money" name="money" placeholder="Enter Money to Transfer">




            <div class="row">
          <div class="col-50">
            <h3>Transfer From:</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fnames" name="firstnames" placeholder="Enter your full name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="emails" name="emails" placeholder="Enter your email">
            <label for="contacts"><i class="fa fa-phone fa-lg"></i> Contact Number</label>
            <input type="text" id="contacts" name="contacts" placeholder="Contact number">
            <div class="col-50">
            <h3>Payment</h3> 
            <div class="col-25">
            
        <input type="submit" onclick="myFunction()" value="Continue to Pay" class="btn">
      </form>
    </div>
  </div>
  </div>
 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
