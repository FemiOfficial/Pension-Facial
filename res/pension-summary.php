<div class="col-md-10">
			<div class="pension-summary" style="display: none;">
							<div class="pension-summary-header">
								<h4 style="text-align: left;"><i class="fa fa-user-circle" style="padding-right: 15px;"></i> PENSION HISTORY</h4>
							</div>	
							<div class="profile-summary-content">
								  <table class="table table-hover profile-summary-table">
								    <thead >
								      <tr >
								        <th>DATE</th>
								        <th>RECIPIENT'S NAME</th>
								        <th>LOCATION</th>
								        <th>ACCOUNT NAME</th>
								        <th>ACCOUNT NUMBER</th>
								        <th>BANK</th>
										<th>AMOUNT (&#8358;) </th>									    
								        <th>ANNUAL BALANCE (&#8358;)</th>
								        <th>ACTION</th>
								      </tr>
								    </thead>
								    <tbody>
								    	<?php
								    		$id = $_SESSION['id'];
								    		$sql = "SELECT * FROM pension_history WHERE recipient_id = '$id'";
								    		$result = mysqli_query($conn, $sql);
								    		$check_user = mysqli_num_rows($result);
								    		if($check_user > 0 ){	
								    			$rows = mysqli_fetch_array($result);
								    			
								    	?>
								       <tr>
								        <td><?php echo $rows['date_collected'];?></td>
								        <td><?php $sql = "SELECT * FROM pensioners WHERE id = '$id'";
								        		  $result = mysqli_query($conn, $sql);
								        		  $row = mysqli_fetch_array($result);
							        		  echo $row['firstname']. " " .$row['lastname'];

								       		 ?>
								        </td>
								        <td><?php echo $rows['location'];?></td>
								        <td><?php echo $rows['acct_name'];?></td>
								        <td><?php echo $rows['acct_number'];?></td>
								        <td><?php echo $rows['bank'];?></td>
								        <td><?php echo number_format($rows['amount'], 2);?></td>
								        <th><?php echo number_format($rows['annual_balance'],2);?></th>
								        <td><button class="btn btn-danger"><span class="fa fa-trash-o"></span></button></td>

								      </tr>
								      <?php
								      		}
								      ?>
							    </tbody>
								  </table>
								</div>
								
							</div>
				</div>