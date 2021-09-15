<?php
	session_start();
	require "config.php";
	$msg = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['reserv-submit'])) {
      $visitor_name= $_POST['visitor_name'];
      $visitor_email = filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL);
      $visitor_phone = preg_replace("#[^0-9]#", "", $_POST['visitor_phone']);
			$guests = preg_replace("#[^0-9]#", "", $_POST['guests']);
      $book_date = htmlentities($_POST['book_date'], ENT_QUOTES, 'UTF-8');
			$book_time = htmlentities($_POST['book_time'], ENT_QUOTES, 'UTF-8');
      $setlocation =$_POST['setlocation'];
			$visitor_message = htmlentities($_POST['visitor_message'], ENT_QUOTES, 'UTF-8');

      foreach($setlocation as $table){
			
        if($guests != "" && $visitor_email && $visitor_phone != "" && $book_date != "" && $book_time != "" && $visitor_message != "") {
          
          $check = $conn->query("SELECT * FROM reservation WHERE visitor_name='".$visitor_name."' AND visitor_email='".$visitor_email."' AND visitor_phone='".$visitor_phone."' AND guests='".$guests."' AND book_date='".$book_date."' AND book_time='".$book_time."' LIMIT 1");
         
          if($check->num_rows) {
            
            echo "<script>alert('You have already placed a reservation with the same information.')</script>";
            $msg = "<p style='padding: 10px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";  
            
          }else{
            $insert = $conn->query("INSERT INTO reservation(visitor_name, visitor_email, visitor_phone,guests, book_date, book_time, setlocation, visitor_message) VALUES('".$visitor_name."', '".$visitor_email."', '".$visitor_phone."', '".$guests."', '".$book_date."', '".$book_time."','".$table."', '".$visitor_message."')");
            if($guests > 4){
              echo "<script>alert('TABLE NOT AVAILABLE RIGHT NOW')</script>";
            $msg = "<p style='padding: 10px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";

            }
            if($insert) {    
              $ins_id = $conn->insert_id;
              $reserve_code = "UNIQUE_$ins_id".substr($visitor_phone, 3, 8);
              $msg = "<p style='padding: 10px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Reservation placed successfully. Your reservation code is $reserve_code. Please Note that reservation expires after one hour.</p>";
            }else{
              echo "<script>alert('Could not place reservation. Please try again')</script>";
              $msg = "<p style='padding: 10px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Could not place reservation. Please try again</p>";
              $ji = "";
            }
            
          }
          
        }else{
          echo "<script>alert('Incomplete form data or Invalid data type')</script>";
          $msg = "<p style='padding: 10px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";
          print_r($_POST);
        }
      }		
		}
	}
?>
<html>
<head>
<title>
table booking
</title>
<style>
body {
  width: 500px;
  margin: 0 auto;
  padding: 50px;
}

div.elem-group {
  margin: 20px 0;
}

div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: left;
  margin-left: 1%;
}

label {
  display: block;
  color: white;
  text-transform: uppercase;
  font-family: 'MV Boli';
  text-decoration: Bold;
  text-shadow: 2px 2px 4px #000000;
  padding-bottom: 10px;
  font-size: 1.25em;
}


h3 {
  display: block;
  color: yellow;
  text-transform: uppercase;
  font-family: 'Forte';
  text-decoration: Bold;
  text-shadow: 2px 2px 4px #000000;
  padding-bottom: 10px;
  font-size: 40
}
input, select, textarea {
  border-radius: 2px;
  border: 2px solid #777;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  width: 100%;
  padding: 10px;
}

div.elem-group.inlined input {
  width: 95%;
  display: inline-block;
}

textarea {
  height: 250px;
}

hr {
  border: 1px dotted #ccc;
}

button {
  height: 50px;
  background: orange;
  border: none;
  color: white;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  border: 2px solid black;
}
a {
  position: absolute;
  left: 30;
  top: 30;
  color: white;
  cursor: pointer;
}
</style>
</head>
<body background="images/backg28.jpg">
<h2><a href="exp.php">home</a></h2>
<div style="position:absolute;left:35%;top:-4%"><h3>TABLE-RESERVATION</h3></div>
<div style="position:absolute;left:70%;top:8%">
<img src="images/p.png" width=400>
</div>
<div style="position:absolute;left:70%;top:57%">
<img src="images/emenu11.png" width=400 >
</div>
<div style="position:absolute;left:5%;top:87%">
<img src="images/emenu4.png" width=300>
</div>
<div style="position:absolute;left:1%;top:6%">
<img src="images/alogo.png" width=400>
</div>
<div style="position:absolute;left:35%;top:188%">
<img src="images/emenu12.png" width=400>
</div>
<div style="position:absolute;left:135%;top:-40%">
<img src="images/bug.png" width=270>
</div>
<div style="position:absolute;left:-110%;top:-30%">
<img src="images/veg.png" width=350>
</div>
</div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <?php echo "<br/>".$msg; ?>
  
  <div class="elem-group">
    <label for="name">NAME :</label>
    <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">E-mail :</label>
    <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
  </div>
  <div class="elem-group">
    <label for="phone">PHONE NO. :</label>
    <input type="text" id="phone" name="visitor_phone" placeholder="498-348-3872" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
  </div>
  <hr>
  <div class="elem-group inlined">
    <label for="guest">Number of Guests :</label>
    <input type="number" id="guest" name="guests" placeholder="2" min="1" required>
    <small class="form-text text-muted">Minimum value is 1</small>
  </div>
 
  <div class="elem-group inlined">
    <label for="checkin-date">BOOKING DATE</label>
    <input type="date" id="booking-date" name="book_date" required>
  </div>
  <div class="elem-group inlined">
   <label for="appt">AT TIME :</label>
  <input type="time" id="appt" name="book_time" min="09:00" max="9:00" >
  </div>
  <div class="elem-group">
    <label for="room-selection">TABLE PREFERENCE</label>
    <select id="room-selection" name="setlocation[]" required>
        <option value="">SELECT LOCATION OF YOUR TABLE :(total 3 rows)</option>
        <option value="connecting">Center row</option>
        <option value="adjoining">Corner row (left: window side)</option>
        <option value="adjacent">Corner row (right: wall side)</option>
    </select>
  </div>
  <hr>
  <div class="elem-group">
    <label for="message">Anything Else?</label>
    <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required></textarea>
  </div>
  <button type="submit" name="reserv-submit">Book The Table</button>
<br>
<br>
<br>
<br>
</form>
</body>
</html>