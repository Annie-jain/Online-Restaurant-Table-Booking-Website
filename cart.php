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
  <div class="w3-content"  id="details<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="position:absolute;left:-25px;top:-34px;">
        <img src="images/alogo.png" width=250>
    </div>
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Confirm Order!</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
    </div>

    <div class="w3-container menu w3-padding-32 w3-white">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">ORDER DETAILS</h4></center>
        </div>
         <div class="modal-body">
            <div class="container-fluid">
                <?php
                    $sq="select * from purchase order by purchaseid desc";
                    $query=$conn->query($sq);
                    $iterate=0;
                    $row=$query->fetch_array()
                ?>
                <h5>Customer: <b><?php echo $row['customer']; ?></b>
                     <span class="pull-right">
                        <?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?>
                    </span>
                </h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Purchase Quantity</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        <?php
                            $sql= "select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                            $dquery=$conn->query($sql);
                            while($drow=$dquery->fetch_array()){
                        ?>
                            <tr>
                                <td><?php echo $drow['productname']; ?></td>
                                <td class="text-right">&#8369; <?php echo number_format($drow['price'], 2); ?></td>
                                <td><?php echo $drow['quantity']; ?></td>
                                <td class="text-right">&#8369;
                                    <?php
                                        $subt = $drow['price']*$drow['quantity'];
                                        echo number_format($subt, 2);
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td colspan="3" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                            </tr> 
                    </tbody>
                    
                </table>
                <a href="paymentmenu.php"><input type="button" value="Place Order!" style='width:250px;margin:0 50%;position:relative;left:-90px;color:yellow;background-color:black'></a>
            </div>
        </div>
    </div>
  </div>
</div>
</body>
</html>
