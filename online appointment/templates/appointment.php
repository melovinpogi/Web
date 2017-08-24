<?php
$xpath =  realpath(__DIR__ . '/..');
include($xpath ."/config/functions.php");
include($xpath ."/config/variables.php");

// Check for empty fields
if(empty($_POST['fname'])  		||
   empty($_POST['lname']) 		||
   empty($_POST['mobile']) 		||
   empty($_POST['email'])		||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "<b>No arguments Provided!</b>";
	return;
   }
	
$fname 			= $_POST['fname'];
$lname 			= $_POST['lname'];
$email_address 	= $_POST['email'];
$mobile 		= $_POST['mobile'];


$form_data = array(
	'fname' => $fname, 
	'lname' => $lname,
	'email' => $email_address,
	'mobile' => $mobile
);

?>

<!-- 1 -->
<div class="container">
	<div class="row">
		<h3>Hi <?php echo $fname. ' ' .$lname. '!'; ?></h3>
		<h5>1) Select Employee and Service(s):</h5>
		<h6><small>Choose an employee and up to three services. <br>Click on the arrow to the right of 
			the employee or service to see available options.</small></h6>
			<div class="row">
				<div class="col-xs-6 col-md-4">
					 <h5>Employee
					 	<select id="employee-dropdown" class="selectpicker show-tick form-control">
					 		<option name="Select Employee" id="0" value="0">-- Select Employee -- </option>
					 		<?php select('employee',$form_employee,'','DROPDOWN',''); ?>
			        	</select>
			        </h5>
			        <h5>Service 1
					 	<select id="employee-service1" class="selectpicker show-tick form-control"></select>
			        </h5>
			        <h5>Service 2
					 	<select id="employee-service2" class="selectpicker show-tick form-control"></select>
			        </h5>
			        <h5>Service 3
					 	<select id="employee-service3" class="selectpicker show-tick form-control"></select>
			        </h5>
				</div>
					<input type="hidden" id="employee-id" value=""></input>
					<input type="hidden" id="customer-firstname" value="<?php echo $fname ?>"></input>
					<input type="hidden" id="customer-lastname" value="<?php echo $lname ?>"></input>
					<input type="hidden" id="customer-email" value="<?php echo $email_address ?>"></input>
					<input type="hidden" id="customer-mobile" value="<?php echo $mobile ?>"></input>
			</div>
	</div>
</div>

<!-- 2 -->
<div class="container">
	<div class="row">
	<h5>2) Select Date:</h5>
	<h6><small>You can view availability and book appointments.</small></h6>
		<div class="row">
	        <div class="col-xs-6 col-md-4">
	          <h5><input type="date" class="form-control" placeholder="Select Date" data-date-format="MM-D-YYYY" id="date-sched"></h5>
	          <div id="next"><button type='button' class='btn btn-default'>Check Available Schedule.</button></div>
	        </div>
	    </div>
    </div>
</div>

<!-- 3 -->
<div class="container">
	<div class="row">
	<h5>3) Select Start Time:</h5>
	<h6><small>Click on an available appointment or on individual start times, then click Next.</small></h6>
		<div class="col-xs-6 col-md-6">
			<div id="service-table">
				<table class="table table-bordered table-hover">
			      <thead>
			        <tr>
			          <th>#</th>
			          <th><h6>Employee</h6></th>
			          <th><h6>Service Description</h6></th>
			          <th><h6>Start Time</h6></th>
			          <th><h6>End time</h6></th>
			          <th><h6>Service Amount</h6></th>
			          <th><h6>Select Service</h6></th>
			        </tr>
			      </thead>
			       <tbody id="tbody"></tbody>
			    </table>
			    <button type="button" class="btn btn-default" id="summary" data-toggle="modal" data-target="#question-modal" data-dismiss="modal">
			    		Summary</button>
			    <input type="hidden" id="service-schedule-id" value=""></input>
			</div>
		</div>
	</div>
</div>





