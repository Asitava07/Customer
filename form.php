<!DOCTYPE html>
<head>
    <meta charset="UFT-8">
    <title>Customer Form Page</title>
    <link rel="stylesheet" href="style2.css">
<body>
<div class="formbox">
    <h1>Customer Form</h1>
    <form action="form.php" method="post" name="form2">
            <p>Order date</p>
                <input type="date" name="order" id="order" placeholder="Enter Order Date">
            <p>Company</p>
                <input type="text" name="company" id="company" placeholder="Enter Company">
            <p>Owner</p>
                <input type="text" name="owner" id="owner" placeholder="Enter Owner Name">
            <p>Item</p>
                <input type="text" name="item" id="item" placeholder="Enter Item Name">
            <p>Quantity</p>
                <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity">
            <p>Weight</p>
                <input type="number" name="weight" id="weight" placeholder="Enter Weight">
            <p>Request For Shipment</p>
                <input type="text" name="request" id="request" placeholder="Enter Request for Shipment">
            <p>Tracking Id</p>
                <input type="number" name="track" id="track" placeholder="Enter Tracking Id">
            <p>Shipment Size</p>
                <input type="number" name="shipment" id="shipment" placeholder="Enter Shipment Size">
            <p>Box Count</p>
                <input type="number" name="box" id="box" placeholder="Enter Number of Box">
            <p>Specification</p>
                <input type="text" name="specification" id="specification" placeholder="Enter Specification">
            <p>Checklist Quantity</p>
                <input type="number" name="checklist" id="checklist" placeholder="Enter checklist quantity">
                <input type="hidden" name="userid" value="<?php echo $fetch1['email'];?>"/>
                <input type="submit" name="form" value="submit"><br>
        <a href="logout.php">Logout</a>
    </form>
</div>
   
</body>

</html>




    <?php
    include_once("db.php");
    ?>

    <?php
	session_start();
	// if(!ISSET($_SESSION['email'])){
	// 	header('location:form.php');
	// }
    $email=$_SESSION["email"];
    ?>

    <?php
    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $q1="SELECT * from customer WHERE email= '$email'";
    $query = mysqli_query($conn,$q1);

    
    $query1 = mysqli_query($conn, "SELECT * FROM `user` WHERE `Email`='$email'") or die(mysqli_error());
    $fetch1 = mysqli_fetch_array($query1);

    ?>    


<?php
        if (isset($_POST['form'])){

            $order = $_POST['order'];
            $company = $_POST['company'];
            $owner = $_POST['owner'];
            $item = $_POST['item'];
            $quantity = $_POST['quantity'];
            $weight = $_POST['weight'];
            $request = $_POST['request'];
            $track = $_POST['track'];
            $shipment = $_POST['shipment'];
            $box = $_POST['box'];
            $specification = $_POST['specification'];
            $checklist = $_POST['checklist'];

    $sql=mysqli_query($mysqli,"INSERT INTO `customer`(`email`,`order_date`, `company`, `owner`, `item`, `quantity`, `weight`, `request_for_shipment`, `tracking_id`, `shipment_size`, `box_count`, `specification`, `checklist_quantity`) VALUES ('$email','$order','$company','$owner','$item','$quantity','$weight','$request','$track','$shipment','$box','$specification','$checklist')");

                if ($sql) {
                    echo "<br/><br/>Data Stored Successfully.";
                } else {
                    echo "Error. Please try again." . mysqli_error($mysqli);
                }
        
        }

?>
