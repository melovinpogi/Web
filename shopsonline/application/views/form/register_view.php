<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 style="font-weight:bold;">REGISTRATION</h2>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="container">
    <div class="row">
      <div id="demo-form2" class="form-horizontal form-label-left">
        <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12">
          <?php foreach($validate as $row){ ?>
              <?php if( $row->r_value == -10){ ?>
               <!-- <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <strong><i class="fa fa-times-circle"></i> Please Complete all the fields! </strong>
                </div> -->
           <?php } elseif( $row->r_value == -1){?>

               <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <strong><i class="fa fa-times-circle"></i> Email address already used!</strong>
                </div>
           <?php } else { ?>
               <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <strong><i class="fa fa-check"></i> Registration Success!</strong>
                </div>
           <?php }?>

           <?php }?>

           <?php if($validate == array() ){ ?>
               <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <strong><i class="fa fa-check"></i> Registration Success!</strong> 
                  <small>Please check your Email Address to verify your registration.</small>
                </div>
          <?php } ?>
        </div>
        <?php echo form_open('register','id="demo-form" data-parsley-validate'); ?>
           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">NTACH Code</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="ntachcode" required="required" class="form-control col-md-7 col-xs-12" style="text-transform:uppercase;">
              <input type="hidden" id="exist" name="exist" value="">
              <span class="code-validation text-center" style="font-size: 20px;margin-left: 30%;"></span><br><br>
              <a href="#" id="verify" class="btn-custom btn-block text-center" style="text-decoration:none;">Verify Code <i class="fa fa-refresh"></i></a>
            </div>
          </div>
        
        <div>
        <div class="col-md-7 col-md-offset-2 col-xs-12 col-sm-12">
          <div class="alert alert-info alert-dismissible fade in" role="alert">
            <strong>Choose your User ID and Password</strong>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
          <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email Address <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpassword">Confirm Password <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="password" id="cpassword" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="col-md-7 col-md-offset-2 col-xs-12 col-sm-12">
           <div class="alert alert-success alert-dismissible fade in" role="alert">
            <strong>Additional Information</strong>
          </div>
        </div>
        <div class="clearfix"></div>
        <!-- <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="first-name">
          </div>
        </div>
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="middle-name" class="form-control col-md-7 col-xs-12" required="required" type="text" name="middle-name">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="form-group">
          <label for="mobile" class="control-label col-md-3 col-sm-3 col-xs-12">Mobile Number <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control col-md-7 col-xs-12" required="required" id="mobile" name="mobile"  data-inputmask="'mask' : '9999999999'">
          </div>
        </div> -->
        <div class="form-group">
          <label for="city" class="control-label col-md-3 col-sm-3 col-xs-12">City <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="ddcity" class="form-control col-md-7 col-xs-12" required="required" name="city">
                <option value="">-- SELECT CITY --</option>
                 <?php foreach ($city as $key) { ?> 
                <option value="<?php echo $key->city; ?>"><?php echo $key->city; ?></option>
                <?php } ?> 
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="state" class="control-label col-md-3 col-sm-3 col-xs-12">State/Province <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="ddstate" class="form-control col-md-7 col-xs-12" required="required" name="state">
                <option value="">-- SELECT STATE/PROVINCE --</option>
               <?php foreach ($province as $key) { ?> 
                <option value="<?php echo $key->province; ?>"><?php echo $key->province; ?></option>
                <?php } ?> 
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Country <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" name="country" required="required" id="autocomplete-custom-append" class="form-control col-md-7 col-xs-12" style="float: left;" />
            <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
          </div>
        </div>
        <div class="form-group">
          <label for="zipcode" class="control-label col-md-3 col-sm-3 col-xs-12">ZipCode <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" class="form-control col-md-7 col-xs-12" required="required" name="zipcode">
          </div>
        </div>
       <!--  <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
             <textarea id="message" required="required" class="form-control" name="message" ></textarea>
             <input id="online-tag" type="hidden" value="y" name="online-tag">
          </div>
        </div>  -->
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" id="sbmit" class="btn-block">Submit <i class="fa fa-send" aria-hidden="true"></i></button><br>
            <a href="<?= base_url('login') ?>">Already have an account? Sign in now!</a>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<?php echo form_close(); ?>
        <script type="text/javascript">
          $(document).ready(function() {
            $("#demo-form2 :input").attr("disabled", "disabled");
            $("#ntachcode").removeAttr("disabled");


             //Validation
            $.listen('parsley:field:validate', function() {
              validateFront();
            });
            $('#demo-form #sbmit').on('click', function() {
              $('#demo-form').parsley().validate();
              validateFront();
            });
            var validateFront = function() {
              if (true === $('#demo-form').parsley().isValid()) {
                $('.bs-callout-info').removeClass('hidden');
                $('.bs-callout-warning').addClass('hidden');
              } else {
                $('.bs-callout-info').addClass('hidden');
                $('.bs-callout-warning').removeClass('hidden');
              }
            };

            //Autocomplete Countries
            'use strict';
            var countriesArray = $.map(countries, function(value, key) {
              return {
                value: value,
                data: key
              };
            });
            // Initialize autocomplete with custom appendTo:
            $('#autocomplete-custom-append').autocomplete({
              lookup: countriesArray,
              appendTo: '#autocomplete-container'
            });

            //Masking
            $(":input").inputmask();

            //Confirm Password
            $("#cpassword").change(function(){
                if( $("#password").val() !== $("#cpassword").val() ){
                  alert("Password does not match");
                  $("#sbmit").attr("disabled","disabled");
                }
                else{
                  $("#sbmit").removeAttr("disabled");
                }
            });

            //Verify Code
            $("#verify").click(function(){
              if( $("#ntachcode").val() == '' ){
                  $("#ntachcode").addClass("err-code");
                  $(".code-validation").html("<strong style='color:red;'><i class='fa fa-times-circle'></i> Input NTACODE! </strong>");
                  $("#demo-form2 :input").attr("disabled", "disabled");
                  $("#ntachcode").removeAttr("disabled");
                  return false;
              }
              else{
                   $.ajax({
                      url: '<?= base_url("/verifydistributor") ?>/' + $("#ntachcode").val(),
                      type: 'GET',
                      dataType: 'html',
                      async: true,
                      success: function(result) {
                         if(result == ''){ 
                          $("#ntachcode").addClass("err-code");
                          $(".code-validation").html("<strong style='color:red;'><i class='fa fa-times-circle'></i> NTACODE not registerd or already used! </strong>");
                          $("#demo-form2 :input").attr("disabled", "disabled");
                          $("#ntachcode").removeAttr("disabled");
                         }
                         else{
                          $("#exist").val(result);
                          $("#ntachcode").removeClass("err-code");
                          $("#ntachcode").addClass("success-code");
                          $(".code-validation").html("<strong style='color:green;'><i class='fa fa-check'></i> Success! </strong>");
                          $("#verify").html("Verify Code <i class='fa fa-refresh'></i>");
                          $("#demo-form2 :input").removeAttr("disabled");
                         }
                      },
                      error: function(request, status, error) {
                        //Set interval to refresh the page
                        console.log(status + ' , '  + error)
                      }
                  });
                }
              });

              $("#ntachcode").keypress(function(){
                $("#verify").html("Verify Code <i class='fa fa-refresh'></i>");
              });
          });
          </script>
<?php $this->load->view('menu/footer-menu'); ?>