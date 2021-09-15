<?php include('config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ORDER</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body{
            background-color: lightsteelblue;
        }
        body, html {height: 100%}
        body,h1,h2,h3,h4,h5,h6 {font-family: "MV Boli", sans-serif}
        
       
    </style>
    
</head>
<body background="images/backg7.jpg">
<div class="w3-container w3-teal w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
    <div style="position:absolute;left:-25px;top:-34px;">
        <img src="images/alogo.png" width=250>
    </div>
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Make your order!</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
    </div>

    <div class="w3-container menu w3-padding-32 w3-white">
    <h2>
    <form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
      </thead>
			<tbody>
       
				<?php 
					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
				?>
        
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#x20A8; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control w3-black" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>
		
		<div class=" w3-row ">
			<div class="col-md-3">
				<input type="text" name="customer" class="form-control w3-black" placeholder="Customer Name" required>
			</div>
			<div class="col-md-3" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary w3-black"><span class="glyphicon glyphicon-floppy-disk "></span> Save</button>
			</div>
		</div>
	  </form>
    </h2>


    <br>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#checkAll").click(function(){
          $('input:checkbox').not(this).prop('checked', this.checked);
        });
      });
    </script>

  </div>
</div>
    
</body>
</html>