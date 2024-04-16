<?php
include("header.php");
include("nav.php");
include("side.php");


?>
<main id="main" class="main">
  <h1 class="text-center fs-1 fw-bold"  id="color">Users</h1>
  <table class="table" id="dashboardTable">
    <thead >
      <tr  class="text-center">
        <th scope="col">Id </th>
        <th scope="col">Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>


<!-- Fetch data from database -->
<?php
if (isset($_POST['delete'])) {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        
        // SQL DELETE statement
        $sqlquery = "DELETE FROM `users` WHERE id = $id";

        // Execute the query
        $dresult = mysqli_query($conn, $sqlquery);

        if ($dresult) {
           echo "<script>alert('Record deleted successfully');</script>";

        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "No ID specified for deletion";
        
    }
}

$query="SELECT * FROM `users` ";
$result=mysqli_query($conn,$query);
if($result->num_rows > 0){
   while($row=$result->fetch_assoc()){
    
    ?>

         <tr class="text-center">
            <td  ><?php echo $row['id']; ?></td>
         <td ><?php echo $row['name']; ?></td>
         <td ><?php echo $row['username']; ?></td>
         <td ><?php echo $row['email']; ?></td>
         <td >
            <form action="" method="post">
            <button type="submit" class="btn btn-primary" value="<?php echo $row['id']; ?>" name="delete">Delete</button>
 </form>
        </td>
        </tr>
      </form>
      

      <?php
        
      }
  }


?>
    </tbody>
  </table>
  
</main>






<?php
include("footer.php");

?>