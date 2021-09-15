<?php include('config.php');
  session_start();
?>
<?php
                    $sq="select * from purchase order by purchaseid desc";
                    $query=$conn->query($sq);
                    $iterate=0;
                    $row=$query->fetch_array()
                ?>
<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['pay'])) {
      $cardnumber = $_POST['cardnumber'];
      $cardholder = $_POST['cardholder'];
      $month = $_POST['month'];
      $year = $_POST['year'];
      $cvv = $_POST['cvv'];

      if ($cardnumber != "" && $cvv != ""  ) {
        $sql = "SELECT * FROM payment WHERE cardholder= ?";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
          $sql = "INSERT INTO payment (cardnumber, cardholder, month,year,cvv)
              VALUES ('$cardnumber','$cardholder', '$month','$year','$cvv')";
          $result = mysqli_query($conn, $sql);
          if ($result== true) {
            $_SESSION['order']="<div>fOOD ORDERED SUCCESSFULLY!</div>";
            header('location:index.php');
            
          } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
          }
        } else {
          echo "<script>alert('Woops! cardholder Already Exists.')</script>";
        }
        
      } else {
        echo "<script>alert('invalid card number.')</script>";
      }
    }
  }

?>


<html>
<head>
<title>
</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Lato:400,700,300);
body {
  font-family: lato, 'helvetica-light';
  position: relative;
  text-transform: uppercase;
  padding: 20px 0;
}

#amount {
  font-size: 12px;
}
#amount strong {
  font-size: 14px;
}
#card-back {
  top: 40px;
  right: 0;
  z-index: -2;
}

#card-btn {
  background-color: yellow;
  color: #084760;
  position: absolute;
  bottom: -55px;
  right: 0;
  width: 150px;
  border-radius: 8px;
  height: 42px;
  font-size: 12px;
  font-family: lato, 'helvetica-light', 'sans-serif';
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 400;
  outline: none;
  border: none;
  cursor: pointer;
}
#card-btn:hover {
  background-color: rgba(251, 251, 251, 1);
}
#card-cvc {
  width: 60px;
  margin-bottom: 0;
}

#card-front,
#card-back {
  position: absolute;
  background-color: #250F19;
  width: 390px;
  height: 250px;
  border-radius: 6px;
  padding: 20px 30px 0;
  box-sizing: border-box;
  font-size: 10px;
  letter-spacing: 1px;
  font-weight: 300;
  color: white;
}

#card-image {
  float: right;
  height: 100%;
}

#card-image i {
  font-size: 40px;
}

#card-month {
  width: 45% !important;
}

#card-number,
#card-holder {
  width: 100%;
}

#card-stripe {
  width: 100%;
  height: 55px;
  background-color: #3d5266;
  position: absolute;
  right: 0;
}

#card-success {
  color: #00b349;
}

#card-token {
  display: none;
}

#card-year {
  width: 45%;
  float: right;
}

#cardholder-container {
  width: 60%;
  display: inline-block;
}

#cvc-container {
  position: absolute;
  width: 110px;
  right: -115px;
  bottom: -10px;
  padding-left: 20px;
  box-sizing: border-box;
}

#cvc-container label {
  width: 100%;
}

#cvc-container p {
  font-size: 6px;
  text-transform: uppercase;
  opacity: 0.6;
  letter-spacing: .5px;
}

#form-container {
  margin: auto;
  width: 500px;
  height: 290px;
  position: relative;
}

#form-errors {
  color: #eb0000;
}

#form-errors,
#card-success {
  background-color: white;
  width: 500px;
  margin: 0 auto 10px;
  height: 50px;
  border-radius: 8px;
  padding: 0 20px;
  font-weight: 400;
  box-sizing: border-box;
  line-height: 46px;
  letter-spacing: .5px;
  text-transform: none;
}

#form-errors p,
#card-success p {
  margin: 0 5px;
  display: inline-block;
}

#exp-container {
  margin-left: 10px;
  width: 32%;
  display: inline-block;
  float: right;
}
.hidden {
  display: none;
}
#image-container {
  width: 100%;
  position: relative;
  height: 55px;
  margin-bottom: 5px;
  line-height: 55px;
}
#image-container img {
  position: absolute;
  right: 0;
  top: 0;
}
input {
  border: none;
  outline: none;
  background-color: #54C339;
  height: 30px;
  line-height: 30px;
  padding: 0 10px;
  margin: 0 0 25px;
  color: white;
  font-size: 10px;
  box-sizing: border-box;
  border-radius: 4px;
  font-family: lato, 'helvetica-light', 'sans-serif';
  letter-spacing: .7px;
}

input::-webkit-input-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif';
   letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}

input:-moz-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif';
  letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}

input::-moz-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif';
  letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}
input:-ms-input-placeholder {
  color: #fff;
  opacity: 0.7;
  font-family: lato, 'helvetica-light', 'sans-serif';
  letter-spacing: 1px;
  font-weight: 300;
  letter-spacing: 1px;
  font-size: 10px;
}
input.invalid {
  border: solid 2px #eb0000;
  height: 34px;
}
label {
  display: block;
  margin: 0 auto 7px;
}

#shadow {
  position: absolute;
  right: 0;
  width: 284px;
  height: 214px;
  top: 36px;
  background-color: #000;
  z-index: -1;
  border-radius: 8px;
  box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body background="images/backg48.jpg">
<div style="position:absolute;left:1%;top:-5%">
<img src="images/alogo.png" width=400>
</div>
<div id="card-success" class="hidden">
  <i class="fa fa-check"></i>
  <p>Payment Successful!</p>
</div>

<div id="form-errors" class="hidden">
  <i class="fa fa-exclamation-triangle"></i>
  <p id="card-error">Card error</p>
</div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div id="form-container">

  <div id="card-front">
    <div id="shadow"></div>
    <div id="image-container">
      <span id="amount">paying: <strong>$<?php echo $row['total'];?>   </strong></span>
      <span id="card-image">
      
        </span>
    </div>
    <!--- end card image container --->
   
    <label for="card-number">
        Card Number
      </label>
    <input type="text" id="card-number" name="cardnumber" placeholder="1234 5678 9101 1112" length="16" data-mask="0000 0000 0000 0000" required/>
    <div id="cardholder-container">
      <label for="card-holder">Card Holder
      </label>
      <input type="text" id="card-holder" name="cardholder" placeholder="e.g. John Doe" required/>
    </div>
    <!--- end card holder container --->
    <div id="exp-container">
      <label for="card-exp">
          Expiration
        </label>
      <input id="card-month" type="text" name="month" placeholder="MM" length="2" required>
      <input id="card-year" type="text" name="year" placeholder="YY" length="2" data-mask="000" required>
    </div>
        <div id="cvc-container">
      <label for="card-cvc"> CVC/CVV</label>
      <input id="card-cvc" placeholder="XXX-X" name="cvv" type="text" min-length="3" max-length="4" data-mask="000-0" required>
      <p>Last 3 or 4 digits</p>
    </div>
    <!--- end CVC container --->
    <!--- end exp container --->
  </div>
  <!--- end card front --->
  <div id="card-back">
    <div id="card-stripe">
    </div>

  </div>
  <!--- end card back --->
  <input type="text" id="card-token" />
  <button type="submit" name="pay" id="card-btn">Submit</button>
</div>
</form>
<!--- end form container --->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://use.fontawesome.com/f1e0bf0cbc.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
</body>
</html>
