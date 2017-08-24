 <?php
include("../templates/functions.php");
include("../templates/variables.php");

if(empty($_POST['type'])){
    echo "No Parameter.";
    return false;
}

$masterlist = $_POST['type'];


?>
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <b>List</b>
            </div>
            <!-- /.panel-heading -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel-body">
                    <div class="dataTable_wrapper table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="masterlist-table">
                        <!-- Employee -->
                        <?php if($masterlist == 'employee'){ ?>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-content">
                                 <tr id="add-employee">
                                    <td>#</td>
                                    <td><input class='form-control' id='add-fname' type='text' placeholder="Firstname"></td>
                                    <td><input class='form-control' id='add-lname' type='text' placeholder="Lastname"></td>
                                    <td><input class='form-control' id='add-email' type='email' placeholder="Email"></td>
                                    <td><input class='form-control' id='add-mobile' type='number' placeholder="Phone"></td>
                                    <td align='center'><a class="btn btn-primary submit-field" 
                                            data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Add'>
                                            <span class="glyphicon glyphicon-plus-sign"></span> </a></td>
                                </tr>
                                <?php select('employee',$form_employee,''); }    ?>


                                <!-- Service -->
                        <?php if($masterlist == 'service'){ ?>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Services</th>
                                    <th>Service Amount</th>
                                    <th>Edit</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-content">
                                 <tr id="add-service">
                                    <td>#</td>
                                    <td><input class='form-control' id='add-services' type='text' placeholder="Services"></td>
                                    <td><input class='form-control' id='add-services-amount' type='number' pattern='\d+(\.\d{2})?' placeholder="Service Amount"></td>
                                    <td align='center'><a class="btn btn-primary submit-field" 
                                        data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Add'>
                                        <span class="glyphicon glyphicon-plus-sign"></span> </a></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php select('service',$form_service,'');  } ?>



                        <?php if($masterlist == 'customer_appointments'){ ?>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Services</th>
                                    <th>Start Time</th>
                                    <th>End time</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Approved</th>
                                    <th>Disapproved</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-content">
                                <?php select('customer_appointments',$form_customer,' LEFT JOIN employee b ON b.employee_id = customer_appointments.employee_id
                                                                                    LEFT JOIN employee_schedule c ON c.employee_schedule_id = customer_appointments.employee_schedule_id
                                                                                    LEFT JOIN service e ON e.service_id = c.service_id 
                                                                                    ORDER BY c.start_time desc');  } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                    <!-- Employee Services -->
                 <?php if($masterlist == 'employee_services'){ ?>
                <div id="employee-services-div">
                     <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                              <a class="btn btn-primary submit-field" data-toggle='tooltip' rel='tooltip' 
                                    data-placement='top' data-original-title='Add' disabled>
                                <span class="glyphicon glyphicon-plus-sign"></span> Add </a>
                             <br><br>
                            <div class="header">
                                <ul class="list-group">
                                     <?php select('employee_services',$form_employee,'');   ?>
                                </ul>
                            </div>
                        </div>
                        <!-- Employee Services detail -->
                        <div class="col-md-10 col-sm-12 col-xs-12">
                            <select id="services-dropdown" class="selectpicker show-tick form-control" style="width:30%;" 
                                data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Add Service for Employee'> 
                                <option name="-- Select Service -- " id="0" value="0">-- Select Service -- </option>
                                 <?php select('dropdown_services',$form_service,' ');  ?>
                            </select><br>
                            <div class="details table-responsive">
                                <ul class='list-group'></ul>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php  } ?>


                 <!-- Employee Schedule -->
                  <?php if($masterlist == 'employee_schedule'){ ?>
                <div id="employee-schedule-div">
                     <div class="row">
                        <!-- Employee Schedule detail -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <select id="employee-schedule-dropdown" class="selectpicker show-tick form-control" 
                                        data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Select Employee'> 
                                        <option name="-- Select Employee -- " id="0" value="0">-- Select Employee -- </option>
                                         <?php select('dropdown_employee',$form_employee,' ');  ?>
                                    </select>
                                </div>
                               <!--  <div class="col-md-2">
                                    <a class="btn btn-primary submit-field" data-toggle='tooltip' rel='tooltip' 
                                        data-placement='top' data-original-title='Add' disabled>
                                    <span class="glyphicon glyphicon-plus-sign"></span> Add </a>
                                </div> -->
                            </div>
                            <br>
                            <div class="details table-responsive">
                                <table class="table table-hover table-bordered tbl-schedule"> 
                                    <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Schedule Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Edit</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>  
                                    <tr id="tr-schedule">
                                        <td><select id='add-employee-schedule-dropdown' class='selectpicker show-tick form-control'
                                                    data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Select Service'> 
                                                    <option name='-- Select Service -- ' id='0' value='0'>-- Select Service -- </option>
                                                        <?php select('dropdown_services',$form_service,' ');  ?>
                                            </select>
                                        </td>
                                        <td><input class='form-control' id='add-sdate' type='date' value='' placeholder='Date Schedule'></td>
                                        <td><input class='form-control' id='add-stime' type='time' value='' placeholder='Startime'></td>
                                        <td><input class='form-control' id='add-etime' type='time' value='' placeholder='Endtime'></td>
                                        <td align='center'><a class='btn btn-primary submit-field' 
                                                data-toggle='tooltip' rel='tooltip' data-placement='top' data-original-title='Add'>
                                                <span class='glyphicon glyphicon-plus-sign'></span> </a></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tbody class="tbody-content"></tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php  } ?>

                <input type="hidden" id="input-tab-id" value="">
                <input type="hidden" id="input-employee-id" value="">
                </div>
            <!-- /.panel-body -->
            </div>
        </div>

        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>