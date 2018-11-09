		<div class="col-md-6 profile-section" style="display: none;">
				<b style="font-family: 'calibri', sans-serif;font-size:12px;">3 OUT OF 5 TASK COMPLETED</b>
				<div class="progress" style="height: 30px;">
				  <div class="progress-bar progress-bar-stripped active" role="progressbar"
				  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
				  </div>
				</div>
	<div class="profile-summary">
					<div class="profile-summary-header">
						<h4><i class="fa fa-user-circle" style="padding-right: 15px;"></i> PENSIONER PROFILE</h4>
					</div>	
					<div class="profile-summary-content">
						  <table class="table table-hover profile-summary-table">
						    <thead >
						      <tr >
						        <th style="width: 30%">FullName</th>
						        <th style="width: 70%;font-weight: normal;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname'];?></th>
						      </tr>
						    </thead>
						    <tbody>
						  
						      <tr>
						         <td style="width: 30%; font-weight: bold;">Ministry</td>
						        <td style="width: 70%;"><?php echo $row['ministry'];?></td>
						      </tr>
						      <tr>
						         <td style="width: 30%; font-weight: bold;">State of Origin</td>
						        <td style="width: 70%;"><?php echo $row['stateOfOrigin'];?></td>
						      </tr>
						     
						      <tr>
						         <td style="width: 30%; font-weight: bold;">Grade Level</td>
						        <td style="width: 70%;"><?php echo $row['gradeLevel'];?></td>
						      </tr>
						      <tr>
						         <td style="width: 30%; font-weight: bold;">Date of Appointment</td>
						        <td style="width: 70%;"><?php echo $row['dateAppointment'];?></td>
						      </tr>
						      <tr>
						         <td style="width: 30%; font-weight: bold;">Date of Retirement</td>
						        <td style="width: 70%;"><?php echo $row['dateRetirement'];?></td>
						      </tr>
						       <tr>
						         <td style="width: 30%; font-weight: bold;">email address</td>
						        <td style="width: 70%;"><?php echo $row['email'];?></td>
						      </tr>
						       <tr>
						         <td style="width: 30%; font-weight: bold;">phone number</td>
						        <td style="width: 70%;"><?php echo $row['phone'];?></td>
						      </tr>
					    </tbody>
						  </table>
						</div>
						
					</div>
				</div>