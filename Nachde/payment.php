<?php
    include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dance styles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
<div class="row">
<?php
$sql="select * from dancestyles";
$result=mysqli_query($conn,$sql);
  
while($data=mysqli_fetch_array($result))
{?>
<div class="col-xl-4">
  <div class="card" style="width:400px">
    <img class="card-img-top" src="pictures/<?php echo $data['image'];?>" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $data['name'];?></h4>
      <p class="card-text">Rs <?php echo $data['price'];?></p>
      <a href="javascript:void(0)" data-styleid="<?php echo $data['id'];?>" data-stylename="<?php echo $data['name'];?>" data-amount="<?php echo $data['price'];?>" class="btn btn-primary paynow">Pay Now</a>
    </div>
  </div>
</div> 
<?php } ?>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js">
</script>
<script>

$(".paynow").click(function()
{   

var amount=$(this).attr('data-amount');
var styleid=$(this).attr('data-styleid');
var stylename=$(this).attr('data-stylename');
    

var options = {
    "key": "rzp_test_W4QTGv5TNdMst6", // Enter the Key ID generated from the Dashboard
    "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "NACHDE",
    "description": stylename,
    "image": "https://example.com/your_logo",
    "handler": function (response){
        var paymentid=response.razorpay_payment_id;

        $.ajax({
            url:"payment_process.php",
            type:"POST",
            data:{style_id:styleid,payment_id:paymentid},
            success:function(finalresponse)
            {
                if(finalresponse=='done')
                {
                    window.location.href="http://localhost/Nachde/success.php";
                }
                else
                {
                    alert('Please check console.log to find error');
                    console.log(finalresponse);
                }
            }
            })
        
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
});
</script>
</body>
</html>
