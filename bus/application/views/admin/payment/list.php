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
          <!-- <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">payment Card</a> -->
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
            //save the columns names in a array that we will use as filter         
            $options_payment = array();    
            foreach ($payment as $array) {
              foreach ($array as $key => $value) {
                $options_payment[$key] = $key;
              }
              break;
            }

            echo form_open('admin/payment', $attributes);
     
              echo form_label('Search:', 'search_string');
              echo form_input('search_string', $search_string_selected);

              echo form_label('Order by:', 'order');
              echo form_dropdown('order', $options_payment, $order, 'class="span2"');

              $data_submit = array('payment_name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => 'Go');

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
                <th class="yellow header headerSortDown">Passenger #</th>
                <th class="yellow header headerSortDown">Bus</th>
                <th class="yellow header headerSortDown">Longtitude1</th>
                <th class="yellow header headerSortDown">Latitude1</th>
                <th class="yellow header headerSortDown">Location1</th>
                <th class="yellow header headerSortDown">Longtitude2</th>
                <th class="yellow header headerSortDown">Latitude2</th>
                <th class="yellow header headerSortDown">Location2</th>
                <th class="yellow header headerSortDown">Fare</th>
                <th class="yellow header headerSortDown">KM</th>
                <th class="yellow header headerSortDown">Transaction date</th>

              </tr>
            </thead>
            <tbody>
              <?php
              foreach($payment as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['conductor'].'</td>';
                echo '<td>'.$row['passenger_id'].'</td>';
                echo '<td>'.$row['bus_no'].'</td>';
                echo '<td>'.$row['long1'].'</td>';
                echo '<td>'.$row['lat1'].'</td>';
                echo '<td>'.$row['location1'].'</td>';
                echo '<td>'.$row['long2'].'</td>';
                echo '<td>'.$row['lat2'].'</td>';
                echo '<td>'.$row['location2'].'</td>';
                echo '<td>'.$row['fare'].'</td>';
                echo '<td>'.$row['km'].'</td>';
                echo '<td>'.$row['transaction_date'].'</td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>