 /*Alert*/
 function veteranzAlert(msg,alerttype){
        $( ".alert-label" ).addClass("alert " + alerttype);
        $( ".alert-label" ).html(msg).show();
};

 /*Alert toggle with effects*/
 function veteranzAlerttoogle(msg,alerttype){
        $( ".alert-label" ).addClass("alert " + alerttype);
        $( ".alert-label" ).html(msg).show().delay(2000).fadeOut('slow');
};

//ToolTip
$("body").tooltip({
    selector: "[data-toggle=tooltip]",
    container: "body"
  });

//Popover
$("body").popover({
    selector: "[data-toggle=popover]",
    container: "body",
    html: true
  });



//Registration
$(document).on("click", "#btn-register", function(){
        $("#form-register").find("input,textarea,select").jqBootstrapValidation(
            {
                preventSubmit: true,
                submitError: function($form, event, errors) {
                    // Here I do nothing, but you could do something like display 
                    // the error messages to the user, log, etc.
                },
                submitSuccess: function($form, event) {
                    event.preventDefault();
                    veteranzAlert("<b>Please Wait...</b>.","alert-warning");
                    var fullname = $("#fullname").val();
                    var rusername = $("#register-username").val();
                    var rpassword = $("#register-password").val();
                    var rlastname = $("#lastname").val();
                    var remail     = $("#email").val();
                    var rxpassword  = $("#register-passwordx").val();
                    var columns  = "fullname,username,password,lastname,email";
                    var values   = " '" + fullname + "', '" + rusername + "','" + rpassword + "', '" + rlastname + "', '" + remail + "' ";

                         $.ajax({
                            url: "././config/count.php",
                            type: "POST",
                            data: { 
                                    username: rusername
                            },
                            success: function(data) {
                            console.log(data)
                            $( ".alert-label" ).removeClass("alert-warning");
                               if(data >= 1){
                                    if(rpassword !== rxpassword){
                                        veteranzAlerttoogle("<b>Password not match.</b>.","alert-danger");
                                        return;
                                    }
                                   
                                    veteranzAlerttoogle("<b>Username already exist.</b>.","alert-danger");
                                    $("#form-register").trigger("reset");
                               }
                               else{
                                     $.ajax({
                                            url: "././config/functionsv2.php",
                                            type: "POST",
                                            data: { 
                                                    table_name: 'users',
                                                    form: columns,
                                                    where:values,
                                                    type:'I'
                                            },
                                            success: function(data) {
                                                console.log(data)
                                                $( ".alert-label" ).removeClass("alert-warning");
                                                veteranzAlerttoogle("<b>Registration Success.</b>.","alert-success");
                                                $( ".alert-label" ).append(" <div class='glyphicon glyphicon-ok-sign'></div>");
                                                $("#form-register").trigger("reset");
                                            },
                                            error: function(jqXHR, status, error) {
                                                // Fail message
                                                veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                                                 $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                                            },
                                        });
                               }
                            },
                            error: function(jqXHR, status, error) {
                                // Fail message
                                veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                                 $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                            },
                        });
                },
                filter: function() {
                    return $(this).is(":visible");
                }
            }
        );
});

//Reset Registration
$(document).on("click", "#registermodal", function(){
	$("#loginform").trigger("reset");
	$( ".alert-label" ).removeClass("alert-warning");	
	$( ".alert-label" ).removeClass("alert-success");	
	$( ".alert-label" ).removeClass("alert-success alert-danger");
	$( ".alert-label" ).text('');

		
});

//Reset login
$(document).on("click", "#loginmodal", function(){
	$("#form-register").trigger("reset");
	$( ".alert-label" ).removeClass("alert-warning");	
	$( ".alert-label" ).removeClass("alert-success");
	$( ".alert-label" ).removeClass("alert-success alert-danger");
	$( ".alert-label" ).text('');
	console.log("x2")
});


//Submit Login
$(document).on("click", "#SubmitLogin", function(){
        $("#loginform").find("input,textarea,select").jqBootstrapValidation(
            {
                preventSubmit: true,
                submitError: function($form, event, errors) {
                    // Here I do nothing, but you could do something like display 
                    // the error messages to the user, log, etc.

                },
                submitSuccess: function($form, event) {
                    event.preventDefault();
                    veteranzAlert("<b>Please Wait...</b>","alert-success");
                    var username = $("#username").val();
                    var password = $("#password").val();    

                         $.ajax({
                            url: "././templates/login",
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
                                        if(username == 'admin'){
                                            $(location).attr('href','dashboard/');
                                        }
                                        else{
                                            $(location).attr('href','');
                                        }
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
                        })
                },
                filter: function() {
                    return $(this).is(":visible");
                }
            }
        );
});

//Logout
$(document).on("click", "#logout", function(){
    $(location).attr('href','templates/logout.php');
});


/**************************************************** Appointment ***************************************************************************/

//Submit Appointment
$(document).on("click", "#btn-appointment", function(){
        $("#form-appointment").find("input,textarea,select").jqBootstrapValidation(
            {
                preventSubmit: true,
                submitError: function($form, event, errors) {
                    // Here I do nothing, but you could do something like display 
                    // the error messages to the user, log, etc.
                },
                submitSuccess: function($form, event) {
                    event.preventDefault();
                    veteranzAlert("<b>Please Wait...</b>.","alert-warning");
                    var fname = $("#first-name").val();
                    var lname = $("#last-name").val();
                    var mobile = $("#mobile").val();
                    var email = $("#email-address").val();

                        $.ajax({
                            url: "././templates/appointment.php",
                            type: "POST",
                            data: {
                                fname: fname,
                                lname: lname,
                                mobile: mobile,
                                email: email
                            },
                            cache: false,
                            success: function(data) {
                                //clear all fields
                                $("#form-appointment").trigger("reset");
                                // Success message
                                veteranzAlert("<b>Select Details - Page 2 of 3</b>.","alert-warning");
                                $("#appointment-modal").html(data);
                            },
                            error: function(jqXHR, status, error) {
                                // Fail message
                                veteranzAlert("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
                                //clear all fields
                                $("#form-appointment").trigger("reset");
                            },
                        })
                },
                filter: function() {
                    return $(this).is(":visible");
                }
            }
        );
});

//Appointment 2
$(document).on("click","#appointment2",function(){
    $("#appointment2").modal("show");
});


$(document).on("click","#add-employee",function(){
   var employee = $("#employee-dropdown option:selected").val();
   var employee_name = $("#employee-dropdown option:selected").text();

   if(employee == 0){
        $(".alrt").html("Select employee first.").show().delay(1000).fadeOut('slow');
        return;
   }

   $("#div-employee").append("<button id='" + employee + "' class='btn btn-primary emp'>" + employee_name + "</button><br><br>");
});  


$(document).on("click","#div-employee .emp",function(){
     var xxx = $(this).closest("button").attr("id");

});

//Employee Dropdown
 $(document).on("change", "#employee-dropdown", function(){
    var employee_id = $("#employee-dropdown").val();

    $( "#tbody" ).html('');
    $( "#summary" ).hide();
    $("#date-sched").val('');
    $("#next").hide();

     $.ajax({
        url: "././templates/ajax.php",
        type: "POST",
        data: { 
                table_id: employee_id,
                table_name: 'employee_services'
        },
        success: function(data) {
            //console.log(data);
            $("#employee-service1").html(data);
            $("#employee-service2").html(data);
            $("#employee-service3").html(data);
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlert("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

});


//HTML5 datepicker
$(document).on("change", "#date-sched", function(){
    var employee_id = $("#employee-dropdown").val();
    var service1    = $("#employee-service1").val();
    var date    = $(this).val();
    var today   = new Date();
    var day     = today.getDate();
    var month   = today.getMonth()+1;
    var year    = today.getFullYear();
    
    //Validation1
    if(month.length = 1){
        month = '0' + month;
    }

    //Convert date to timestamp
    var current = year + '-' + month + '-' + day;
    var dateparse = Date.parse(date);
    var currentparse = Date.parse(current);

    //Validation3
   if(dateparse < currentparse){
        veteranzAlert("<b>You cannot schedule previous date.</b> ","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        $("#date-sched").val('');
        return
   }
   else if(employee_id == 0){
        veteranzAlert("<b>Select Employee First.</b> ","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        $("#date-sched").val('');
        $(this).css("border-color","red");
        $("#employee-dropdown").css("border-color","red");
        return
   }
   else if(service1 == 0){
        veteranzAlert("<b>Select Service First.</b> ","alert-danger");
        $( ".alert-label" ).append(" <div class='glyphicon glyphicon-exclamation-sign'></div>");
        $("#date-sched").val('');
        $(this).css("border-color","red");
        $("#employee-service1").css("border-color","red");
        return
   }
   else{
        $(this).removeAttr("style");
        $("#employee-dropdown").removeAttr("style");
        $("#employee-service1").removeAttr("style");
        $( ".alert-label" ).removeClass("alert-danger");
        veteranzAlert("<b>Select Details - Page 2 of 3</b>.","alert-warning");
   }

    if(date != ''){
        //console.log(date);
        $( "#next" ).show();
    }
    else{
        veteranzAlert("<b>Select Schedule First.</b>.","alert-danger");
        $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
    }
     $( "#tbody" ).html('');
     $( "#summary" ).hide();

});


//Table services
$(document).on("click", "#next", function(){
    var employee_id = $("#employee-dropdown").val();
    var service1    = $("#employee-service1").val();
    var service2    = $("#employee-service2").val();
    var service3    = $("#employee-service3").val();
    var schedule    = $("#date-sched").val();

    $.ajax({
        url: "././templates/services_table.php",
        type: "POST",
        data: { 
                employee_id: employee_id,
                service1: service1,
                service2: service2,
                service3: service3,
                schedule: schedule
        },
        success: function(data) {
            $( "#service-table" ).css( "height", "300px" );
            $( "#service-table" ).css( "overflow", "scroll" );
            $( "#tbody" ).html(data);
            if(data == '<b>0 results</b>'){
                $( "#summary" ).hide();
            }
            else{
                $( "#summary" ).show();
            }
            
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlert("<b>Error</b>." + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });
});


//Summary button
$(document).on("click", "#summary", function(e){
    var getservices = $('#tbody input:radio:checked').map(function () {
        return $(this).attr('id');
    }).get().join(",");

    var getamount = $('#tbody input:radio:checked').map(function () {
        return $(this).closest("tr").find("td:eq(4)").text();
    }).get().join(" + ");

    var total = eval(getamount);
    var fname = $("#customer-firstname").val();
    var lname = $("#customer-lastname").val();
    var email = $("#customer-email").val();
    var mobile = $("#customer-mobile").val();
    var employee_id = $("#employee-dropdown").val();

    $("#paypal-amount").val(total);
    $("#first_name").val(fname);
    $("#last_name").val(lname);
    $("#night_phone_a").val(mobile);
    //$("#e-mail").val(email);

    //console.log(getservices);
    veteranzAlert("<b>Book an Appointment: Verify Details - Page 3 of 3</b>.","alert-warning");
    $("#service-schedule-id").val(getservices);
    $("#summary-div").html("<h5>Personal Information:</h5> <h6>Firstname: " + fname + "<h6><h6>Lastname: " + lname + "</h6><h6>Email-Address: " + email + "</h6><h6>Phone: " + mobile + "</h6>  <h6>Total Amount: <span>₱</span> " + total + " </h6>");

    $.ajax({
        url: "././templates/customer_appointment.php",
        type: "POST",
        data: { 
                employee_id: employee_id,
                services: getservices,
                request: '',
                query_type: 'S',
                fname: fname,
                lname: lname,
                email: email,
                mobile: mobile
        },
        success: function(data) {
            $( "#summary-detail-div" ).css( "height", "250px" );
            $( "#summary-detail-div" ).css( "overflow", "scroll" );
            $( "#tbody-summary" ).html(data);
        },
        error: function(jqXHR, status, error) {
            // Fail message
             veteranzAlert("<b>" + jqXHR + " " + error + "</b>.","alert-danger");
        },
    });

});

//Summary
$(document).on("click", "#continue", function(){
    var service_schedule  = $("#service-schedule-id").val();
    var employee_id       = $("#employee-dropdown").val();
    var fname             = $("#customer-firstname").val();
    var lname             = $("#customer-lastname").val();
    var email             = $("#customer-email").val();
    var mobile            = $("#customer-mobile").val();

     $.ajax({
        url: "././templates/customer_appointment.php",
        type: "POST",
        data: { 
                employee_id: employee_id,
                services: service_schedule,
                request: '',
                query_type: 'I',
                fname: fname,
                lname: lname,
                email: email,
                mobile: mobile
        },
        success: function(data) {
            $("#question-modal").html('');
            veteranzAlert("<b>Appointment Successfully Created!</b>.","alert-success");
        },
        error: function(jqXHR, status, error) {
            // Fail message
             veteranzAlert("<b>" + jqXHR + " " + error + "</b>.","alert-danger");
        },
    });

});

//Reload page after success
$(document).on("click", ".reload", function(){
    window.location.reload(true);
});



/**************************************************** End of Appointment ***************************************************************************/

/**************************************************** Product ***************************************************************************/

//Select Category
/*$(document).on("click", ".product-category", function(){
    var popid       = $(".popover").attr("id");

    $(this).hasClass("popoverIsOpen")
    $(this).removeClass("popoverIsOpen");
    $(".popoverIsOpen").popover("hide");
    $(".allThePopovers").removeClass("popoverIsOpen");
    $(this).addClass("popoverIsOpen");
    $(popid).addClass("popoverIsOpen");


    
});*/

//Get category id
$(document).on("click", ".product-category a", function(){
    var popid       = $(this).attr("id");
    console.log(popid);
    $("#category").show().delay(500).fadeOut("slow");
    
   $.ajax({
        url: "././templates/ajax.php",
        type: "POST",
        data: { 
                table_id: popid,
                table_name: 'products'
        },
        success: function(data) {
            //console.log(data);
            $("#products").html(data).hide().delay(500).fadeIn("slow");
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

   $(".popover").hide();
   $(".back").hide().delay(500).fadeIn("slow");       

});

//Back to Category
$(".back").hide();

$(document).on("click", ".back", function(){
     $("#category").hide().delay(500).fadeIn("slow");
     $("#products").show().delay(500).fadeOut("slow");
     $(".back").show().delay(500).fadeOut("slow");
});    




//Add to cart
var count = 0;
$("#checkout").hide();

$(document).on("click", ".product-list .btn-primary ", function(){
    var userid          = $("#userid").text();
    var cart            = $(this).attr("id");
    var convertoint     = cart.replace(/\D/g, '');
    var convertostring  = cart.replace(/[0-9]/g, '');
    var columns         = "product_id,user_id,quantity";
    var values          = " " + convertoint + "," + userid +  ",1  "
    var deleteid        = " product_id = " + convertoint + " and user_id = " + userid;
    var countcart       = " count(quantity) as quantity";
    var wherecount      = " where product_id = " + convertoint + " and user_id = " + userid + " and purchase = 'N' ";
    var wherecountx     = " product_id = " + convertoint + " and user_id = " + userid + " and purchase = 'N' ";
    var datax           = 0;

    if(convertostring == 'product-') {
        count = count + 1;
         var updatequantity  = "quantity = quantity + 1";
    }
    else{

        if( $("#" + cart + " span").hasClass("glyphicon-star")  ){
                $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_wishlist',
                        form: columns,
                        where:deleteid,
                        type:'D'
                },
                success: function(data) {
//                    console.log(data);
                    $("#" + cart + " .icon ").removeClass("glyphicon-star");
                    $("#" + cart + " .icon ").addClass("glyphicon-star-empty");
                    alert("Product Deleted.");
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
        }
        else{
                $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_wishlist',
                        form: columns,
                        where:values,
                        type:'I'
                },
                success: function(data) {
                     $("#" + cart + " .icon").addClass("glyphicon-star");
                    $("#" + cart + " .icon").removeClass("glyphicon-star-empty");
                    alert("Product Added.");
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
        }

        return false;
    }

    if( $(".badge-holder").hasClass("badge") ){ /**/ }
    else{ $(".badge-holder").addClass("badge"); }
       
    $.ajax({
        url: "././config/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'user_orders',
                form: countcart,
                where:wherecount,
                type:'S'
        },
        success: function(data) {
             $(".badge-holder").html(count);
             $("#checkout").delay(1000).fadeIn("slow");

                 if(data == 0){
                        $.ajax({
                            url: "././config/functionsv2.php",
                            type: "POST",
                            data: { 
                                    table_name: 'user_orders',
                                    form: columns,
                                    where:values,
                                    type:'I'
                            },
                            success: function(data) {
                                 $(".badge-holder").html(count);
                                 $("#checkout").delay(1000).fadeIn("slow");
                                 alert("Product Added.");
                            },
                            error: function(jqXHR, status, error) {
                                // Fail message
                                veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                                 $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                            },
                        });
                 }
                 else{
                        $.ajax({
                            url: "././config/functionsv2.php",
                            type: "POST",
                            data: { 
                                    table_name: 'user_orders',
                                    form: updatequantity,
                                    where:wherecountx,
                                    type:'U'
                            },
                            success: function(data) {
                                 $(".badge-holder").html(count);
                                 $("#checkout").delay(1000).fadeIn("slow");
                                 alert("Product Added.");
                            },
                            error: function(jqXHR, status, error) {
                                // Fail message
                                veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                                 $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                            },
                        });
                 }
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

});


//Update and Remove Cart
$(document).on("click", "#orders .btn", function(){
    var update          = $(this).attr("id");
    var userid          = $("#userid").text();
    var convertoint     = update.replace(/\D/g, '');
    var remove          = $("#remove-" + convertoint);
    var convertostring  = update.replace(/[0-9]/g, '');
    var where           = " product_id = " + convertoint + " and user_id = " + userid + " and purchase ='N' " ;
    var quantity        = $("#input-" + convertoint).val();
    var columns         = " quantity = " + quantity;
    var price           = $("#price-" + convertoint).text();
    var total           = quantity * price;

    if(convertostring == 'update-'){

         if(quantity == 0){
            veteranzAlert("<b>Invalid Quantity </b>","alert-danger");
            $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
            return false;
        }
        else{
            $(".alert-label").hide();
        }

        $("#" + update + " span.glyphicon").addClass("glyphicon-refresh-animate");

         $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_orders',
                        form: columns,
                        where:where,
                        type:'U'
                },
                success: function(data) {
                    setTimeout(function() {
                       $("#" + update + " span.glyphicon").removeClass("glyphicon-refresh-animate");
                       $("#" + update + " ").html("<span class='glyphicon glyphicon-refresh'></span> Updated");
                       $("#total-" + convertoint + " ").html("Total: " + total);
                   }, 1500);

                    setTimeout(function() {
                        $("#" + update + " ").html("<span class='glyphicon glyphicon-refresh'></span> Update Cart");
                   }, 3000);
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });

    }
    else{

         $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_orders',
                        form: ' ',
                        where:where,
                        type:'D'
                },
                success: function(data) {
                    $(remove).show().delay(1000).fadeOut("slow");
                    $(".div-" + convertoint).show().delay(1000).fadeOut("slow");
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
    }

});

//Order 
$(document).on("click", "#xorder", function(){
    var content = $("#orders").text();
    if($.trim(content) == $.trim('0 results')){
        $("#orders").html('');
        $("#orders").html("<h5 class='text-center'><span class='fa fa-shopping-cart'></span> You have no items in your cart <span class='fa fa-shopping-cart'></span></h5>");
        $("#orders").css("height","auto");
        $("#orders").css("overflow","hidden");
        $("#orders").css("text-align","center");
        $("#checkout2").hide();
    }
});


//Sumamry Checkout
$(document).on("click", "#checkout", function(){
    var userid  = $("#userid").text();
    var select  = " products.product_name as product_name , products.product_amount as product_amount,products.product_id as product_id,user_orders.user_id as user_id,user_orders.quantity as count" 
    var where   = "inner join products on products.product_id = user_orders.product_id where user_id = " + userid + " and purchase='N' "


     $.ajax({
        url: "././config/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'user_ordersx',
                form: select,
                where:where,
                type:'S'
        },
        success: function(data) {
            console.log(data);
            $("#shop-modal").modal("hide");
            $("#OrderModal").modal("show");
            $("#orders").html(data);
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

});

//Sumamry Checkout
$("#payment").hide();
$(document).on("click", "#checkout2", function(){
    $("#orders").css("height","auto");
    $("#orders").css("overflow","hidden");
    $("#checkout2").hide();
    $("#orders").html("<h5 class='text-center'><span class='glyphicon glyphicon-shopping-cart'></span> Thankyou for Shopping. <span class='glyphicon glyphicon-shopping-cart'></span> <br><br>You can pay now by just clicking the button below. </h5> ").hide().delay(1000).fadeIn("slow");
    $("#payment").hide().delay(1000).fadeIn("slow");
});


$(document).on("click", "#form-payment", function(){
    var userid  = $("#userid").text();
    var today   = new Date();
    var day     = today.getDate();
    var month   = today.getMonth()+1;
    var year    = today.getFullYear();
    var current = year + '-' + month + '-' + day;
    var columns = "product_id,user_id,quantity,purchase_amount,purchase_date,user_order_id";
    var values  = "user_orders.product_id," +  userid + ",user_orders.quantity,products.product_amount * user_orders.quantity, '" + current + "',user_orders.user_order_id from user_orders inner join products on user_orders.product_id = products.product_id where user_orders.user_id = " + userid + " and purchase = 'N' ";
    var updatecolumn = "purchase = 'Y'";
    var updatecolumnwhere = " user_order_id in (select x.user_order_id from user_purchase as x)";
      $.ajax({
        url: "././config/functionsv2.php",
        type: "POST",
        data: { 
                table_name: 'user_purchase',
                form: columns,
                where:values,
                type:'I'
        },
        success: function(data) {

            $.ajax({
                    url: "././config/functionsv2.php",
                    type: "POST",
                    data: { 
                            table_name: 'user_orders',
                            form: updatecolumn,
                            where:updatecolumnwhere,
                            type:'U'
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(jqXHR, status, error) {
                        // Fail message
                        veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                         $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                    },
                });
        },
        error: function(jqXHR, status, error) {
            // Fail message
            veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
             $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
        },
    });

});

//Update and Remove Wishlist
$("#move-to-orders").hide();
$(document).on("click", "#wishlist .btn", function(){
    var update          = $(this).attr("id");
    var convertoint     = update.replace(/\D/g, '');
    var wishlist        = $(this).parent().parent().attr("class");
    var wishlistid      = wishlist.replace(/\D/g, '');
    var userid          = $("#userid").text();
    var remove          = $("#remove-" + convertoint);
    var convertostring  = update.replace(/[0-9]/g, '');
    var quantity        = $("#input-" + convertoint).val();
    var columns         = " quantity = " + quantity;
    var insertcolumns   = "product_id,user_id,quantity,user_wishlist_id";
    var insertvalues    = "" + convertoint + "," + userid + ", " + quantity + "," + wishlistid + " ";
    var price           = $("#price-" + convertoint).text();
    var total           = quantity * price;
    var where           = " user_wishlist_id = " + wishlistid ;



    if(convertostring == 'update-'){

         if(quantity == 0){
            veteranzAlert("<b>Invalid Quantity </b>","alert-danger");
            $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
            return false;
        }
        else{
            $(".alert-label").hide();
        }
        $("#" + update + " span.glyphicon").addClass("glyphicon-refresh-animate");
         $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_wishlist',
                        form: columns,
                        where:where,
                        type:'U'
                },
                success: function(data) {
                    setTimeout(function() {
                       $("#" + update + " span.glyphicon").removeClass("glyphicon-refresh-animate");
                       $("#" + update + " ").html("<span class='glyphicon glyphicon-refresh'></span> Updated");
                       $("#total-" + convertoint + " ").html("Total: " + total);
                   }, 1500);

                    setTimeout(function() {
                        $("#" + update + " ").html("<span class='glyphicon glyphicon-refresh'></span> Update Wishlist");
                   }, 3000);
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });

    }
    else if(convertostring == 'remove-'){

         $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_wishlist',
                        form: ' ',
                        where:where,
                        type:'D'
                },
                success: function(data) {
                    $(remove).show().delay(1000).fadeOut("slow");
                    $(".div-" + wishlistid).show().delay(1000).fadeOut("slow");
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
    }
     else{

         $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'user_orders',
                        form: insertcolumns,
                        where:insertvalues,
                        type:'I'
                },
                success: function(data) {
                    $(remove).show().delay(1000).fadeOut("slow");
                    $(".div-" + wishlistid).show().delay(1000).fadeOut("slow");
                    $("#move-to-orders").show();

                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
    }

});


$(document).on("click", "#move-to-orders", function(){
    $("#WishlistModal").modal("hide");
    $( "#checkout" ).trigger( "click" );
});

$rating = 0;
//Rate
$(document).on("click", "#rating1,#rating2,#rating3,#rating4,#rating5", function(){
    var rating = $(this).attr("id");
    if(rating == 'rating1'){
        $("#rating1").removeClass("glyphicon-star-empty");
        $("#rating1").addClass("glyphicon-star");

        $rating = 1
    }

    if(rating == 'rating2'){
        $("#rating1").removeClass("glyphicon-star-empty");
        $("#rating1").addClass("glyphicon-star");

        $("#rating2").removeClass("glyphicon-star-empty");
        $("#rating2").addClass("glyphicon-star");

        $rating = 2
    }

    if(rating == 'rating3'){
        $("#rating1").removeClass("glyphicon-star-empty");
        $("#rating1").addClass("glyphicon-star");

        $("#rating2").removeClass("glyphicon-star-empty");
        $("#rating2").addClass("glyphicon-star");

        $("#rating3").removeClass("glyphicon-star-empty");
        $("#rating3").addClass("glyphicon-star");

        $rating = 3
    }

    if(rating == 'rating4'){
        $("#rating1").removeClass("glyphicon-star-empty");
        $("#rating1").addClass("glyphicon-star");

        $("#rating2").removeClass("glyphicon-star-empty");
        $("#rating2").addClass("glyphicon-star");

        $("#rating3").removeClass("glyphicon-star-empty");
        $("#rating3").addClass("glyphicon-star");

        $("#rating4").removeClass("glyphicon-star-empty");
        $("#rating4").addClass("glyphicon-star");

        $rating = 4
    }

    if(rating == 'rating5'){
        $("#rating1").removeClass("glyphicon-star-empty");
        $("#rating1").addClass("glyphicon-star");

        $("#rating2").removeClass("glyphicon-star-empty");
        $("#rating2").addClass("glyphicon-star");

        $("#rating3").removeClass("glyphicon-star-empty");
        $("#rating3").addClass("glyphicon-star");

        $("#rating4").removeClass("glyphicon-star-empty");
        $("#rating4").addClass("glyphicon-star");

        $("#rating5").removeClass("glyphicon-star-empty");
        $("#rating5").addClass("glyphicon-star");

        $rating = 5
    }
});

//Comments
$(document).on("click", "#btn-comment", function(){
    var customername    = $("#cname").val();
    var comment         = $("#comment").val();
    var columns         = "customer_name,comment,rate";
    var values          = " '" + customername + "','" + comment +  "'," + $rating + "   "

    if(customername == '' || comment == '' || $rating == 0){
        veteranzAlerttoogle("<b>Some fields are empty.</b>","alert-danger");
        return;
    }
    else{
         $.ajax({
                url: "././config/functionsv2.php",
                type: "POST",
                data: { 
                        table_name: 'comments',
                        form: columns,
                        where:values,
                        type:'I'
                },
                success: function(data) {
                    $(".alert-label").removeClass("alert-danger")
                    veteranzAlerttoogle("<b>Thankyou for rating us.</b>","alert-success");
                     $(location).attr('href','');
                },
                error: function(jqXHR, status, error) {
                    // Fail message
                    veteranzAlert("<b>Error</b>" + jqXHR + " " + error + " ","alert-danger");
                     $( ".alert-label" ).append("<div class='glyphicon glyphicon-exclamation-sign'></div>");
                },
            });
    }

   
});