 /*Alert*/
 function veteranzAlert(msg,alerttype){
        $( ".alert-label" ).addClass("alert " + alerttype);
        $( ".alert-label" ).html(msg).show();
};

 /*Alert toggle with effects*/
 function veteranzAlerttoogle(msg,alerttype){
        $( ".alert-label" ).addClass("alert " + alerttype);
        $( ".alert-label" ).html(msg).show().delay(3000).fadeOut('slow');
};

//ToolTip
$('#wrapper').tooltip({
    selector: '[data-toggle=tooltip]',
    container: 'body'
  });


//Login
 $(document).on("click", "#login", function(){
    var username = $("#username").val();
    var password = $("#password").val();

     $.ajax({
        url: "././templates/login.php",
        type: "POST",
        data: { 
                username: username,
                password: password
        },
        success: function(data) {
            if(data == '0'){
                veteranzAlert("<b>Incomplete Parameters</b>","alert-danger");
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
            }
            else if(data == '-1'){
                veteranzAlert("<b>Invalid Username / Password.</b>","alert-danger");
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-remove-sign'></div>");
            }
            else if (data =='1'){
                $(".alert-label").removeClass("alert-danger");
                veteranzAlert("<b>Login Success</b>","alert-success");   
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-ok-sign'></div>"); 
                $(location).attr('href','index');
            }
            else{
                veteranzAlert(data,"alert-danger");   
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-remove-sign'></div>"); 
            }
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

});

//Logout
$(document).on("click", "#logout", function(){
    $(location).attr('href','templates/logout');
});    


/**************************************************** Employee Script    **********************************************************************/
//Employee
$(document).on("click", "#employee-tab", function(){
    $("#loading").show();
    
    $("#main-content").show().delay(300).fadeOut("slow");
    $("#add-employee").hide();
   $.ajax({
        url: "././content/Masterlist.php",
        type: "POST",
        data: { 
                type: 'employee'
        },
        success: function(data) {
           
            $(".page-header").html("Employee").hide().delay(800).fadeIn("slow");;
            $("#main-content").html(data).hide().delay(500).fadeIn("slow");
            $("#loading").show().delay(1000).fadeOut('slow');
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
}); 

//Employee Edit
$(document).on("click",".employee-edit",function(){
    var employee_id = $(this).attr('id');
    if( $(".employee-input-" + employee_id + "").is(":disabled") ){
        $(".employee-input-" + employee_id + "").removeAttr("disabled");
        $(".employee-edit-" + employee_id + "").addClass("active");
        $(".employee-update-" + employee_id + "").removeAttr("disabled");
    }
    else{
        $(".employee-input-" + employee_id + "").prop("disabled", true);
        $(".employee-edit-" + employee_id + "").removeClass("active");
        $(".employee-update-" + employee_id + "").attr("disabled",true);
    }
});


//Employee Update
$(document).on("click",".employee-update",function(){
    var employee_id = $(this).attr('id');
    var fname       = $("#fname-" + employee_id + "").val();
    var lname       = $("#lname-" + employee_id + "").val();
    var email       = $("#email-" + employee_id + "").val();
    var mobile      = $("#mobile-" + employee_id + "").val();
    var where       = 'employee_id = ' + employee_id;


    var form_update = "fname='" + fname + "',lname='" + lname + "',email='" + email + "',mobile='" + mobile + "'";

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'employee',
                form: form_update,
                where: where,
                type:'U'
        },
        success: function(data) {
            $(".employee-input-" + employee_id + "").prop("disabled", true);
            $(".employee-update-" + employee_id + "").attr("disabled",true);
            $(".employee-edit-" + employee_id + "").removeClass("active");
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Employee Delete
$(document).on("click",".employee-delete",function(){
    var employee_id = $(this).attr('id');
    var where       = 'employee_id = ' + employee_id;

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'employee',
                form: ' ',
                where: where,
                type: 'D'
        },
        success: function(data) {           
            $("#tr-row-" + employee_id +"").delay(300).fadeOut('slow')
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});

//Employee Add
$(document).on("click","#add-employee .submit-field",function(){
    var fname       = $("#add-fname").val();
    var lname       = $("#add-lname").val();
    var email       = $("#add-email").val();
    var mobile      = $("#add-mobile").val();
    var check_email = email.indexOf("@");

    var columns = "fname,lname,email,mobile";
    var values = " '" + fname + "', '" + lname+ "', '" + email + "', '" + mobile + "' ";

    if(fname =='' || lname =='' || email =='' || mobile ==''){
         veteranzAlerttoogle("<b>Some Fields are Empty.</b>","alert-danger");
         $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
         return;
    }
    else if(fname.length < 3 || lname.length < 3 ||  mobile.length < 3 || email.length < 5){
        veteranzAlerttoogle("<b>Some Fields must be greather than 3 or 5.</b> ","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        return;
    }
    else if(mobile.length != 11){
        veteranzAlerttoogle("<b>Phone must be 11 Digits only.</b> ","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        return;
    }
    else if(check_email == -1){
        veteranzAlerttoogle("<b>Invalid Email Address</b>","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        return;
    }
    else{
        $("#loading").show();
        $( ".alert-label" ).hide();
        $.ajax({
            url: "././templates/functionsv2.php",
            type: "POST",
            data: { 
                    table_name: 'employee',
                    form: columns,
                    where: values,
                    type: 'I'
            },
            success: function(data) {
                $("#loading").show().delay(500).fadeOut('slow'); 
                $( ".alert-label" ).removeClass("alert-danger");
                veteranzAlerttoogle("<b>Success Adding Employee!</b>","alert-success");
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-ok'></div>");
                $("#employee-tab").trigger("click");
                
            },
            error: function(jqXHR, status, error) {
                // Fail message
                veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
                 $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
            },
        });
     }
});

/**************************************************** Employee Script End  **********************************************************************/



/****************************************************** Service Script  **************************************************************************/

//Service Tab
$(document).on("click", "#services-tab", function(){
    $("#loading").show();
    
    $("#main-content").show().delay(300).fadeOut("slow");
    $("#add-service").hide();
   $.ajax({
        url: "././content/Masterlist.php",
        type: "POST",
        data: { 
                type: 'service'
        },
        success: function(data) {
            //console.log(data);
           
            $(".page-header").html("Services").hide().delay(800).fadeIn("slow");;
            $("#main-content").html(data).hide().delay(500).fadeIn("slow");
            $("#loading").show().delay(1000).fadeOut('slow');
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Service Edit
$(document).on("click",".service-edit",function(){
    var service_id = $(this).attr('id');
    if( $(".service-input-" + service_id + "").is(":disabled") ){
        $(".service-input-" + service_id + "").removeAttr("disabled");
        $(".service-amount-input-" + service_id + "").removeAttr("disabled");
        $(".service-edit-" + service_id + "").addClass("active");
        $(".service-update-" + service_id + "").removeAttr("disabled");
    }
    else{
        $(".service-input-" + service_id + "").prop("disabled", true);
        $(".service-amount-input-" + service_id + "").prop("disabled", true);
        $(".service-edit-" + service_id + "").removeClass("active");
        $(".service-update-" + service_id + "").attr("disabled",true);
    }
});


//Service Update
$(document).on("click",".service-update",function(){
    var service_id      = $(this).attr('id');
    var service_desc    = $("#service-" + service_id + "").val();
    var service_amount  = $("#service-amount-" + service_id + "").val();  
    var where           = 'service_id = ' + service_id;


    var form_update = " service_description='" + service_desc + "',service_amount = " + service_amount;

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'service',
                form: form_update,
                where: where,
                type:'U'
        },
        success: function(data) {
            //console.log(data);
            $(".service-input-" + service_id + "").prop("disabled", true);
            $(".service-amount-input-" + service_id + "").prop("disabled", true);
            $(".service-update-" + service_id + "").attr("disabled",true);
            $(".service-edit-" + service_id + "").removeClass("active");
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Service Delete
$(document).on("click",".service-delete",function(){
    var service_id  = $(this).attr('id');
    var where       = 'service_id = ' + service_id;

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'service',
                form: ' ',
                where: where,
                type: 'D'
        },
        success: function(data) {           
            $("#tr-row-" + service_id +"").delay(300).fadeOut('slow')
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});

//Service Add
$(document).on("click","#add-service .submit-field",function(){
    var service_desc       = $("#add-services").val();
    var service_amount     = $("#add-services-amount").val();

    var columns = "service_description,service_amount";
    var values = " '" + service_desc + "' , " + service_amount + " ";

    if(service_desc =='' || service_amount == 0 || service_amount == '' ){
         veteranzAlerttoogle("<b>Some Fields are Empty.</b>","alert-danger");
         $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
         return;
    }
    else{
        $("#loading").show();
        $( ".alert-label" ).hide();
        $.ajax({
            url: "././templates/functionsv2.php",
            type: "POST",
            data: { 
                    table_name: 'service',
                    form: columns,
                    where: values,
                    type: 'I'
            },
            success: function(data) {
                $("#loading").show().delay(500).fadeOut('slow'); 
                $( ".alert-label" ).removeClass("alert-danger");
                veteranzAlerttoogle("<b>Success Adding Service!</b>","alert-success");
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-ok'></div>");
                $("#services-tab").trigger("click");
                
            },
            error: function(jqXHR, status, error) {
                // Fail message
                veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
                 $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
            },
        });
     }
});

/****************************************************** Service Script End  **************************************************************************/

/****************************************************** Customer Script  **************************************************************************/
//Customer Tab
$(document).on("click", "#customer-tab", function(){
    $("#loading").show();
    
    $("#main-content").show().delay(300).fadeOut("slow");
   $.ajax({
        url: "././content/Masterlist.php",
        type: "POST",
        data: { 
                type: 'customer_appointments'
        },
        success: function(data) {
            //console.log(data);
           
            $(".page-header").html("Customer Appointments").hide().delay(800).fadeIn("slow");
            $("#main-content").html(data).hide().delay(500).fadeIn("slow");
            $("#loading").show().delay(1000).fadeOut('slow');
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Customer Approved
$(document).on("click",".customer-approved",function(){
    var customer    = $(this).attr('id');
    var where       = 'customer_appointment_id = ' + customer;
    var form_update = "status='A' ";

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'customer_appointments',
                form: form_update,
                where: where,
                type:'U'
        },
        success: function(data) {
           veteranzAlerttoogle("<b>Appointment Successfully Approved.</b>","alert-success");
           $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-ok'></div>");
           $("#tr-row-" + customer +"").delay(1000).addClass("success").fadeIn("slow");
           $(".customer-approved-" + customer + "").attr("disabled",true);
           $(".customer-disapproved-" + customer + "").attr("disabled",true);
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Customer Disapproved
$(document).on("click",".customer-disapproved",function(){
    var customer    = $(this).attr('id');
    var where       = 'customer_appointment_id = ' + customer;
    var form_update = "status='D' ";

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'customer_appointments',
                form: form_update,
                where: where,
                type:'U'
        },
        success: function(data) {
           veteranzAlerttoogle("<b>Appointment Successfully Disapproved.</b>","alert-success");
           $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-ok'></div>");
           $("#tr-row-" + customer +"").delay(1000).addClass("danger").fadeIn("slow");
           $(".customer-disapproved-" + customer + "").attr("disabled",true);
           $(".customer-approved-" + customer + "").attr("disabled",true);
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});

/****************************************************** End Customer Script  **************************************************************************/

/****************************************************** Employee Services Script  ********************************************************/
//Employee Services Tab
$(document).on("click", "#employee-services-tab", function(){
    var text = $(this).text();
    var text2 = $(this).attr("id");


    $("#loading").show();
    
    $("#main-content").show().delay(300).fadeOut("slow");
   $.ajax({
        url: "././content/Masterlist.php",
        type: "POST",
        data: { 
                type: 'employee_services'
        },
        success: function(data) {           
            $(".page-header").html(text).hide().delay(800).fadeIn("slow");
            $("#main-content").html(data).hide().delay(500).fadeIn("slow");
            $("#loading").show().delay(1000).fadeOut('slow');
            $(".dataTable_wrapper").remove();
            $("#input-tab-id").val(text2);
            $("#services-dropdown").hide();
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});

//Employee Services Left panel
$(document).on("click", ".header .list-group-item", function(){
    var tab = $("#input-tab-id").val();

    //employee Services
    var employee_services_id = $(this).closest("li").attr("id");        
    var select = " service_description,employee_services_id";
    var where = " inner join service on service.service_id = employee_services.service_id where employee_services.employee_id = " + employee_services_id;

    $("#loading").show();
    $(".details .list-group").show().delay(300).fadeOut("slow");
   $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
               table_name: 'employee_services',
                form: select,
                where: where,
                type:'S'
        },
        success: function(data) { 
            $(".list-group-item").removeAttr("style");   
            $("#loading").show().delay(1000).fadeOut('slow');
            $(".details").html(data).hide().delay(500).fadeIn("slow");
            $("#employee-services-div .submit-field").attr("disabled",false);
            $("#services-dropdown").hide().delay(600).fadeIn("slow");
            $("#input-employee-id").val(employee_services_id);
            $("#" + employee_services_id + "").css("font-weight","bold");
           
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Employee Add 
$(document).on("click","#employee-services-div .submit-field",function(){
    var tab = $("#input-tab-id").val();
    var employee_id     = $("#input-employee-id").val();
    var service_id      = $("#services-dropdown").val();
    var service_name    = $("#services-dropdown option:selected").text();
    var select          = " service_description,employee_services_id";
    var where           = " inner join service on service.service_id = employee_services.service_id where employee_services.employee_id = " + employee_id;

    var columns = " service_id,employee_id";
    var values = " " + service_id + "," + employee_id + " ";


     if(service_id == 0){
        veteranzAlerttoogle("<b>Select Service First.","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        return false;
     }

    //Validate if services is existing per employee
    $( ".details .list-group-item" ).each(function( index ) {
        var s = $( this ).text();
         if($.trim(service_name) == $.trim(s) ){
           $("#employee-services-div").append("<input type='hidden' id='input-hidden' value=''> ");
           $("#input-hidden").val("true");
        }
    });


    if( $("#input-hidden").val() == "true" ){
        veteranzAlerttoogle("<b>Service " + service_name + " already exist to this employee.","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        $("#input-hidden").val("");
        return false;
    }

    $("#loading").show();
    $(".details").show().delay(300).fadeOut("slow");

   $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'employee_services',
                form: columns,
                where: values,
                type: 'I'
        },
        success: function(data) {     
            //$(".header .list-group-item").trigger("click");

            $.ajax({
                url: "././templates/functionsv2.php",
                type: "POST",
                data: { 
                       table_name: 'employee_services',
                        form: select,
                        where: where,
                        type:'S'
                },
                success: function(data) {
                    $( ".alert-label" ).removeClass("alert-danger");          
                    $("#loading").show().delay(1000).fadeOut('slow');
                    $(".details").html(data).hide().delay(500).fadeIn("slow");
                    veteranzAlerttoogle("<b>Service " + service_name  + " Successfully Added.</b>.","alert-success");
                    $( ".alert-label" ).append(" <div class='glyphicon glyphicon-ok'></div>");
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlerttoogle("<b>Error." + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
    
});


//Employee Service Delete
$(document).on("click","#employee-services-div .delete-submit-field",function(){
    var service_id  = $(".details .list-group-item").attr('id');
    var where       = 'employee_services_id = ' + service_id;

    console.log(where);

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'employee_services',
                form: ' ',
                where: where,
                type: 'D'
        },
        success: function(data) {           
            $("#" + service_id +"").remove().delay(300).fadeOut('slow');
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});

/****************************************************** End Employee Services and Schedule Script  ******************************************************/

/****************************************************** Employee Schedule Script  ******************************************************/
//Employee Schedule Tab
$(document).on("click", "#employee-schedule-tab", function(){
    var text = $(this).text();
    var text2 = $(this).attr("id");

    $("#loading").show();
    $("#main-content").show().delay(300).fadeOut("slow");
    
   $.ajax({
        url: "././content/Masterlist.php",
        type: "POST",
        data: { 
                type: 'employee_schedule'
        },
        success: function(data) {           
            $(".page-header").html(text).hide().delay(800).fadeIn("slow");
            $("#main-content").html(data).hide().delay(500).fadeIn("slow");
            $("#loading").show().delay(1000).fadeOut('slow');
            $(".dataTable_wrapper").remove();
            $("#input-tab-id").val(text2);
            $("#services-dropdown").hide();
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Schedule
$(document).on("change", "#add-sdate, .sched", function(){
    var schedule_date;
    var schedule_id = $(this).closest("tr").attr("id");
    var schedule_id1 = $("#add-sdate").val();
    var schedule_id2 = $("#schedule-sdate-" + schedule_id + "").val();
    var today   = new Date();
    var day     = today.getDate();
    var month   = today.getMonth()+1;
    var year    = today.getFullYear();
    
    //Validation1
    if(month.length = 1){
        month = '0' + month;
    }

    //Validation2
    if(schedule_id1 !=''){
        schedule_date = schedule_id1;
    }
    else if(schedule_id2 !=''){
        schedule_date = schedule_id2;
    }
    else{
        schedule_date = schedule_id2;
    }

    //Convert date to timestamp
    var current = year + '-' + month + '-' + day;
    var dateparse = Date.parse(schedule_date);
    var currentparse = Date.parse(current);


    //Validation3
   if(dateparse < currentparse){
        veteranzAlerttoogle("<b>You cannot schedule previous date.</b> ","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        $("#schedule-sdate-" + schedule_id + "").val('');
        $("#add-sdate").val('');
        return
   }

});


//Employee Schedule
$(document).on("change", "#employee-schedule-dropdown", function(){
    var employee_id = $("#employee-schedule-dropdown option:selected").val();       
    var select = " service_description,employee_schedule_id,cast(start_time as date) as sdate,cast(start_time as time) as stime  ,cast(end_time as date) as edate,cast(end_time as time) as etime, service.service_id";
    var where = " inner join service on service.service_id = employee_schedule.service_id where employee_schedule.employee_id = " + employee_id + " order by start_time";
    var sql = "SELECT c.service_id,service_description FROM employee_services a  inner join employee b on b.employee_id = a.employee_id inner join service c on c.service_id = a.service_id where a.employee_id = " + employee_id;

    $("#loading").show();
   $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
               table_name: 'employee_schedule',
                form: select,
                where: where,
                type:'S',
                sql: sql
        },
        success: function(data) { 
            $("#loading").show().delay(1000).fadeOut('slow');
            $(".tbody-content").html(data).hide().delay(500).fadeIn("slow");
            $("#employee-schedule-div .submit-field").attr("disabled",false);
            $("#input-employee-id").val(employee_id);

            //Count TR
            $(".tbody-content tr").each(function( x ) {
                var tr = $(this).attr("id");
                 $(this).find("select").attr("id","dropdown-" + tr);
            });

        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Employee Add
$(document).on("click","#employee-schedule-div .submit-field",function(){
    var employee_id = $("#employee-schedule-dropdown option:selected").val();
    var service_id  = $("#add-employee-schedule-dropdown option:selected").val();
    var Schedule    = $("#add-sdate").val();
    var start_time  = $("#add-stime").val();
    var end_time    = $("#add-etime").val();
    var final_start = Schedule + ' ' + start_time + ':00'
    var final_end   = Schedule + ' ' + end_time + ':00'
    var select      = " count(*) as count";
    var where       = " where service_id = " + service_id + " and employee_id = " + employee_id;
    var columns     = "service_id,employee_id,start_time,end_time"
    var values      = " " + service_id + ", " + employee_id + ", '" + final_start + "', '" + final_end + "' "
    var sql         = " where service_id = " + service_id + " and employee_id = " + employee_id + " and start_time= '" + final_start + "' and end_time= '" + final_end + "' or ('" + final_start + "' between start_time and end_time and employee_id = " + employee_id + ") or ('" + final_end + "' between start_time and end_time and employee_id = " + employee_id + ") "
    var selectx = " service_description,employee_schedule_id,cast(start_time as date) as sdate,cast(start_time as time) as stime  ,cast(end_time as date) as edate,cast(end_time as time) as etime, service.service_id";
    var wherex = " inner join service on service.service_id = employee_schedule.service_id where employee_schedule.employee_id = " + employee_id + " order by start_time";
    var sqlx = "SELECT c.service_id,service_description FROM employee_services a  inner join employee b on b.employee_id = a.employee_id inner join service c on c.service_id = a.service_id where a.employee_id = " + employee_id;


    

    if(employee_id ==0 || service_id ==0 || Schedule == '' || start_time == '' || end_time == ''){
         // Fail message
        veteranzAlerttoogle("<b>Some Fields are Empty.</b>","alert-danger");
         $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        return false;
    }

    $("#loading").show();
    //Validate if service is available to employee
     $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
               table_name: 'employee_services_schedule',
                form: select,
                where: where,
                type:'S'
        },
        success: function(data) { 
            $("#loading").show().delay(1000).fadeOut('slow');
            if(data == 0){
                console.log(data);
                veteranzAlerttoogle("<b>Service is not available to this employee.</b>.","alert-danger");
                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
            }
            else{
                //Validate if schedule is existing
                 $.ajax({
                        url: "././templates/functionsv2.php",
                        type: "POST",
                        data: { 
                               table_name: 'employee_services_schedule',
                                form: select,
                                where: where,
                                type:'S',
                                sql:sql
                        },
                        success: function(data) { 
                            if(data != 0){
                                veteranzAlerttoogle("<b>Service Schedule is already exist. </b>.","alert-danger");
                                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
                            }
                            else{
                                // Insert Schedule
                                $.ajax({
                                    url: "././templates/functionsv2.php",
                                    type: "POST",
                                    data: { 
                                            table_name: 'employee_schedule',
                                            form: columns,
                                            where: values,
                                            type: 'I'
                                    },
                                    success: function(data) {
                                        //Retrieve again     
                                        $.ajax({
                                            url: "././templates/functionsv2.php",
                                            type: "POST",
                                            data: { 
                                                   table_name: 'employee_schedule',
                                                    form: selectx,
                                                    where: wherex,
                                                    type:'S',
                                                    sql:sqlx
                                            },
                                            success: function(data) {
                                                $( ".alert-label" ).removeClass("alert-danger");          
                                                $("#loading").show().delay(1000).fadeOut('slow');
                                                $(".tbody-content").html(data).hide().delay(500).fadeIn("slow");
                                                veteranzAlerttoogle("<b>Schedule Successfully Added.</b>.","alert-success");
                                                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-ok'></div>");

                                                //Count TR
                                                $(".tbody-content tr").each(function( x ) {
                                                    var tr = $(this).attr("id");
                                                     $(this).find("select").attr("id","dropdown-" + tr);
                                                });

                                            },
                                            error: function(jqXHR, status, error) {
                                                // Fail message
                                                veteranzAlerttoogle("<b>Error." + jqXHR + " " + error + " ","alert-danger");
                                                 $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
                                            },
                                        });
                                    },
                                    error: function(jqXHR, status, error) {
                                        // Fail message
                                        veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
                                         $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
                                    },
                                });
                            }
                        },
                        error: function(jqXHR, status, error) {
                            // Fail message
                            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
                             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
                        },
                    });
            }

            
            //$(".tbody-content").html(data).hide().delay(500).fadeIn("slow");
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoogle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

});


 //Employee Schedule Edit
$(document).on("click",".tbody-content .schedule-edit",function(){
    var schedule_id = $(this).closest("tr").attr("id");

    if( $("#schedule-employee-" + schedule_id + "").is(":disabled") ){

        $("#schedule-sdate-" + schedule_id + "").removeAttr("disabled");
        $("#schedule-stime-" + schedule_id + "").removeAttr("disabled");
        $("#schedule-etime-" + schedule_id + "").removeAttr("disabled");
        $("#schedule-edit-" + schedule_id + "").addClass("active");
        $("#schedule-update-" + schedule_id + "").removeAttr("disabled");
        $("#schedule-employee-" + schedule_id + "").removeAttr("disabled");       
        $("#schedule-employee-" + schedule_id + "").hide();
        $("#dropdown-" + schedule_id + "").show();
    }

    else{

        $("#schedule-employee-" + schedule_id + "").prop("disabled", true);
        $("#schedule-sdate-" + schedule_id + "").prop("disabled", true);
        $("#schedule-stime-" + schedule_id + "").prop("disabled", true);
        $("#schedule-etime-" + schedule_id + "").prop("disabled", true);
        $("#schedule-edit-" + schedule_id + "").removeClass("active");
        $("#schedule-update-" + schedule_id + "").attr("disabled",true);
        $("#schedule-employee-" + schedule_id + "").show();
        $("#dropdown-" + schedule_id + "").hide();
    }
});


//Employee Schedule Update
$(document).on("click",".schedule-update",function(){
    var schedule_id     = $(this).closest("tr").attr("id");
    var employee_id     = $("#employee-schedule-dropdown ").val();
    var service_id      = $("#dropdown-" + schedule_id + " option:selected").val();
    var Schedule        = $("#schedule-sdate-" + schedule_id).val();
    var start_time      = $("#schedule-stime-" + schedule_id).val();
    var end_time        = $("#schedule-etime-" + schedule_id).val();
    var final_start     = Schedule + ' ' + start_time + ':00'
    var final_end       = Schedule + ' ' + end_time + ':00'


    var form_update = " service_id =" + service_id + ",employee_id = " + employee_id + ",start_time='" + final_start + "' , end_time ='" + final_end  + "'";
    var where       = " employee_schedule_id = " + schedule_id;

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'employee_schedule',
                form: form_update,
                where: where,
                type:'U'
        },
        success: function(data) {
            $("#employee-schedule-dropdown").trigger("change");
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Employee Schedule Delete
$(document).on("click",".schedule-delete",function(){
    var schedule_id = $(this).closest("tr").attr("id");
    var where       = 'employee_schedule_id = ' + schedule_id;

    $.ajax({
        url: "././templates/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'employee_schedule',
                form: ' ',
                where: where,
                type: 'D'
        },
        success: function(data) {           
            $("#" + schedule_id + " ").remove().delay(300).fadeOut('slow');
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlerttoggle("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});