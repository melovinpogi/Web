<?= menu(); ?><!-- End header area -->
<div class="product-big-title-area">
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="product-bit-title text-center">
                  <h2 style="font-weight:bold;">CONTACT US</h2>
              </div>
          </div>
      </div>
  </div>
</div> <br><br><!-- End Page title area -->
  
  <!--start wrapper-->
  <section class="wrapper">
    <section class="content contact">
      <div class="container">
        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Embedded Google Map -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d811.7288264947957!2d121.06220499938175!3d14.584552648500997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x0b168a0e7c4663af!2sCenterpoint+Bulding!5e0!3m2!1sen!2sph!4v1456898791895" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
            </div>
        </div>
        <!-- /.row -->
        <!-- Contact Form -->
        <div class="row">
            <div class="col-md-8">
                <h2>Send us a Message</h2>
                <?php echo form_open('home/sendcontact'); ?>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
               <?php echo form_close(); ?>
            </div>

            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h2>Contact Details</h2>
                <p>
                    Suite 1901 The Centerpoint Building<br>
                    Garnet Road corner Julia Vargas Avenue, Ortigas Center
                    Pasig City, Philippines, 1605
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: (632) 631-7515 | (632) 631-7516 | (632) 910-5390</p>
                <p><i class="fa fa-fax"></i> 
                    <abbr title="Fax">P</abbr>: (632) 631-7517</p>    
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:customercare@nutritech.ph">Customer Care</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Saturday: 09:00 AM to 8:30 PM</p>
            </div>
        </div>
        <!-- /.row -->
      </div>
    </section>
  </section>
  <!--end wrapper-->
<br><br>


<?php $this->load->view('menu/footer-menu'); ?>


      