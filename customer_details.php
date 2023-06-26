
<?php
$databaseHost     = 'localhost';
$databaseName     = 'example';
$databaseUsername = 'root';
$databasePassword = '';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>




<?php
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$q1="SELECT * FROM customer where email='customer1'";
$q2="SELECT * FROM customer where email='customer2'";

$result1 = mysqli_query($conn,$q1);
$totalWeight = 0;
$totalquantity =0;
$totalbox=0;
if (mysqli_num_rows($result1) > 0) {
    // $fetch = mysqli_fetch_assoc($result1);
    while ($row = mysqli_fetch_assoc($result1)) {
      $totalWeight += $row['weight'];
      $totalquantity += $row['quantity'];
      $totalbox += $row['box_count'];


}
}
$result2 = mysqli_query($conn,$q2);
$totalWeight1 = 0;
$totalquantity1 =0;
$totalbox1 =0;
if (mysqli_num_rows($result2) > 0) {
  while ($row = mysqli_fetch_assoc($result2)) {
    $totalWeight1 += $row['weight'];
    $totalquantity1 += $row['quantity'];
    $totalbox1 += $row['box_count'];

}
}


$tq=0;
$tw=0;
$tb=0;
$tq= $totalquantity +  $totalquantity1 ;
$tw= $totalWeight +  $totalWeight1 ;
$tb= $totalbox +  $totalbox1 ;

?>







<!DOCTYPE html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Customer Details Table</h2>

<table>
  <tr>
    <th>Item/Customer</th>
    <th>Customer1</th>
    <th>Customer2</th>
    <th>Total</th>
  </tr>
  <tr>
    <td>Quantity</td>
    <td><?php  echo $totalquantity  ; ?></td>
    <td><?php  echo $totalquantity1  ; ?></td>

    <td><?php  echo $tq  ; ?></td>
  </tr>
  <tr>
    <td>Weight</td>
   
    <td><?php echo $totalWeight; ?></td>

    <td><?php echo $totalWeight1 ; ?></td>

    <td><?php  echo $tw  ; ?></td>
  </tr>
  <tr>
    <td>Box Count</td>
    <td><?php  echo  $totalbox ; ?></td>
    <td><?php  echo  $totalbox1 ; ?></td>

    <td><?php  echo $tb  ; ?></td>
</table>


            
   
</body>

</html>






