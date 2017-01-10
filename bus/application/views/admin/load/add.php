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
          <a href="#">New</a>
        </li>
      </ul>
      
      <div class="page-header">
        <h2>
          Adding <?php echo ucfirst($this->uri->segment(2));?>
        </h2>
      </div>
 
      <?php
      //flash messages
      if(isset($flash_message)){
        if($flash_message == TRUE)
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> loading success.';
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
        $options_bus[$row['id']] = $row['bus_number'] . ' - ' .$row['bus_name'];
      }

      //form validation
      echo validation_errors();
      
      echo form_open('admin/load/add', $attributes);
      ?>
        <fieldset>
          <div class="control-group">
            <label for="inputError" class="control-label">Conductor #</label>
            <div class="controls">
              <input type="text" id="" name="conductor" value="<?php echo set_value('conductor'); ?>" >
              <!--<span class="help-inline">Woohoo!</span>-->
            </div>
          </div>
          <div class="control-group">
            <label for="inputError" class="control-label">Passenger #</label>
            <div class="controls">
              <input type="text" id="" name="passenger_id" value="<?php echo set_value('passenger_id'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>          
          <?php
          echo '<div class="control-group">';
            echo '<label for="bus_id" class="control-label">Bus</label>';
            echo '<div class="controls">';
              //echo form_dropdown('manufacture_id', $options_manufacture, '', 'class="span2"');
              
              echo form_dropdown('bus_id', $options_bus, set_value('bus_number'), 'class="span2"');

            echo '</div>';
          echo '</div">';
          ?>
          <div class="control-group">
            <label for="inputError" class="control-label">Amount</label>
            <div class="controls">
              <input type="number" id="" name="amount" value="<?php echo set_value('amount'); ?>">
              <!--<span class="help-inline">Cost Price</span>-->
            </div>
          </div>    
          <div class="form-actions">
            <button class="btn btn-primary" type="submit">Load</button>
            <button class="btn" type="reset">Cancel</button>
          </div>
        </fieldset>

      <?php echo form_close(); ?>

    </div>
     