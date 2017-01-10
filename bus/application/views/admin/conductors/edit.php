    <div class="container top">
      
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Update</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Updating <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>

 
      <?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> conductor updated with success.';
          echo '</div>';       
        }else{
          echo '<div class="alert alert-error">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
          echo '</div>';          
        }
      }
      ?>
      
      <?php
      //form data
      $attributes = array('class' => 'form-horizontal', 'id' => '');
      $options_bus = array('' => "Select");
      foreach ($bus as $row)
      {
        $options_bus[$row['id']] = $row['bus_name'];
      }

      //form validation
      echo validation_errors();

      echo form_open('admin/conductors/update/'.$this->uri->segment(4).'', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Conductor #</label>
            <div class="controls">
              <input type="text" id="" name="conductor_number" value="<?php echo $conductor[0]['conductor_number']; ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Firstname</label>
            <div class="controls">
              <input type="text" id="" name="firstname" value="<?php echo $conductor[0]['firstname']; ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <div class="control-group">
            <label for="inputError" class="control-label">Lastname</label>
            <div class="controls">
              <input type="text" id="" name="lastname" value="<?php echo $conductor[0]['lastname'];?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>
          <?php
          echo '<div class="control-group">';
            echo '<label for="bus_id" class="control-label">bus</label>';
            echo '<div class="controls">';
              //echo form_dropdown('bus_id', $options_bus, '', 'class="span2"');
              
              echo form_dropdown('bus_id', $options_bus, $conductor[0]['bus_id'], 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Save changes</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     