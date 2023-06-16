<?php
session_start();
include "db.php";
if (isset($_SESSION["uid"])) {

	$f_name = $_POST["firstname"];
	$email = $_POST['email'];
	$address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $cardname= $_POST['cardname'];
    $cardnumber= $_POST['cardNumber'];
    $expdate= $_POST['expdate'];
    $cvv= $_POST['cvv'];
    $user_id=$_SESSION["uid"];
    $cardnumberstr=(string)$cardnumber;
    $total_count=$_POST['total_count'];
    $vehicle_total = $_POST['total_price'];
    
    
    $sql0="SELECT order_id from `orders_info`";
    $runquery=mysqli_query($con,$sql0);
    if (mysqli_num_rows($runquery) == 0) {
        echo( mysqli_error($con));
        $order_id=1;
    }else if (mysqli_num_rows($runquery) > 0) {
        $sql2="SELECT MAX(order_id) AS max_val from `orders_info`";
        $runquery1=mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($runquery1);
        $order_id= $row["max_val"];
        $order_id=$order_id+1;
        echo( mysqli_error($con));
    }

	$sql = "INSERT INTO `orders_info` 
	(`order_id`,`user_id`,`f_name`, `email`,`address`, 
	`city`, `state`, `cardname`,`cardnumber`,`expdate`,`vehicle_count`,`total_amt`,`cvv`) 
	VALUES ($order_id, '$user_id','$f_name','$email', 
    '$address', '$city', '$state', '$cardname','$cardnumberstr','$expdate','$total_count','$vehicle_total','$cvv')";


    if(mysqli_query($con,$sql)){
        $i=1;
        $vehicle_id_=0;
        $vehicle_price_=0;
        $vehicle_qty_=0;
        while($i<=$total_count){
            $str=(string)$i;
            $vehicle_id_+$str = $_POST['vehicle_id_'.$i];
            $vehicle_id=$vehicle_id_+$str;		
            $vehicle_price_+$str = $_POST['vehicle_price_'.$i];
            $vehicle_price=$vehicle_price_+$str;
            $vehicle_qty_+$str = $_POST['vehicle_qty_'.$i];
            $vehicle_qty=$vehicle_qty_+$str;
            $sub_total=(int)$vehicle_price*(int)$vehicle_qty;
            $sql1="INSERT INTO `order_vehicle` 
            (`order_vehicle_id`,`order_id`,`vehicle_id`,`qty`,`amt`) 
            VALUES (NULL, '$order_id','$vehicle_id','$vehicle_qty','$sub_total')";
            if(mysqli_query($con,$sql1)){
                $del_sql="DELETE from cart where user_id=$user_id";
                if(mysqli_query($con,$del_sql)){
                    echo"<script>window.location.href='store.php'</script>";
                }else{
                    echo(mysqli_error($con));
                }

            }else{
                echo(mysqli_error($con));
            }
            $i++;


        }
    }else{

        echo(mysqli_error($con));
        
    }
    
}else{
    echo"<script>window.location.href='index.php'</script>";
}
	




?>