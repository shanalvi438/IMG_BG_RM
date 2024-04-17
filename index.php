<?php
    include_once 'database.php';
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y-m-d"); //Today date 
    $birth=substr("$date",5);
	$result = mysqli_query($conn,"SELECT * FROM birth_day");//Select the birthday list
	// $result = mysqli_query($conn,"SELECT * FROM birth_day where id= {$user_id}");//Select the birthday list
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
        <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
            <tr>
			    <th><input type="checkbox" id="checkAll"> Select All</th>
			    <th>User Id.</th>
			    <th>Name</th>
                <th>Birthday date</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
			<th>#</th>
			    <th>User Id.</th>
			    <th>Name</th>
                <th>Birthday date</th>
            </tr>
        </tfoot>
        <tbody>
		<form method="post" action="send-wish.php">
    <?php
    $i=0;
	while($row = mysqli_fetch_array($result)) {
	?>
    
            <tr>
			    <td>
					<input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["email"]; ?>">
					
			    </td>
                <td><?php echo $row["user_id"]; ?></td>
				<td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["birth_day"]; ?></td>
            </tr>
		 
    <?php 
     $i++;
    }
    ?>	
		
        </tbody>
    </table>
	
	<p align="center"><button type="submit" class="btn btn-success" name="save">Send Birthday Wishes </button></P>
	</form>
<script>
$("#checkAll").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>