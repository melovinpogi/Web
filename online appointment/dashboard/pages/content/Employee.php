 <?php
include("../templates/functions.php");

$form_employee = array(
    'employee_id' =>'',
    'fname' => '', 
    'lname' => '',
    'email' => '',
    'mobile' => ''
);

?>
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <b>List</b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="employee-table">
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
                                <td><a class="btn btn-primary submit-field" ><span class="glyphicon glyphicon-plus-sign"></span> Add</a></td>
                            </tr>
                            <?php select('employee',$form_employee); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>