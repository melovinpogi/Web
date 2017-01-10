    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?> 
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            $options_bus = array(0 => "all");
            foreach ($bus as $row)
            {
              $options_bus[$row['id']] = $row['bus_name'];
            }
            //save the columns names in a array that we will use as filter         
            $options_conductors = array();    
            foreach ($conductors as $array) {
              foreach ($array as $key => $value) {
                $options_conductors[$key] = $key;
              }
              break;
            }

            echo form_open('admin/conductors', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected, 'style="width: 170px;
height: 26px;"');

              echo form_label('Filter by:', 'bus_id');
              echo form_dropdown('bus_id', $options_bus, $bus_selected, 'class="span2"');

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_conductors, $order, 'class="span2"');

              $data_submit = array('bus_name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

              $options_order_type = array('Asc' => 'Asc', 'Desc' => 'Desc');
              echo form_dropdown('order_type', $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="yellow header headerSortDown">Conductor #</th>
                <th class="green header">Firstname</th>
                <th class="red header">Lastname</th>
                <th class="red header">Bus</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($conductors as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['conductor_number'].'</td>';
                echo '<td>'.$row['firstname'].'</td>';
                echo '<td>'.$row['lastname'].'</td>';
                echo '<td>'.$row['bus_name'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/conductors/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>