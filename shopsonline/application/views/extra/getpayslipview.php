<?php include('header.php') ?>
<style type="text/css">
  div {
    font-size: 8px;
}

</style>
<script type="text/javascript">
  function print() {
    window.print();
}

</script>
<div class="container">
  
    <div class="payslip">
    <?php foreach($getpayslip as $row){ ?>
        <div style="position:absolute;margin-top: 137px;margin-left: 70px;"><?php echo $row->name; ?></div>
        <div style="position:absolute;margin-top: 165px;margin-left: 70px;"><?php echo $row->net_pay; ?></div>
        <div style="position:absolute;margin-top: 140px;margin-left: 550px;"><?php echo $row->year; ?></div>
        <div style="position:absolute;margin-top: 165px;margin-left: 550px;"><?php echo $row->month; ?></div>
        <div style="position:absolute;margin-top: 185px;margin-left: 550px;"><?php echo $row->cut_off; ?></div>


        <div style="position:absolute;margin-top: 235px;margin-left: 420px;"><?php echo $row->semi_monthly; ?></div>
        <div style="position:absolute;margin-top: 255px;margin-left: 420px;"><?php echo $row->lates; ?></div>
        <div style="position:absolute;margin-top: 275px;margin-left: 420px;;"><?php echo $row->absents; ?></div>
        <div style="position:absolute;margin-top: 295px;margin-left: 420px;"><?php echo $row->overtime; ?></div>
        <div style="position:absolute;margin-top: 315px;margin-left: 420px;"><?php echo $row->semi_monthly - $row->lates + $row->overtime + $row->other_earnings - $row->deduction ?></div>

        <div style="position:absolute;margin-top: 245px;margin-left: 610px;"><?php echo $row->deduction; ?></div>


        <div style="position:absolute;margin-top: 365px;margin-left: 420px;"><?php echo $row->sss; ?></div>
        <div style="position:absolute;margin-top: 385px;margin-left: 420px;"><?php echo $row->pagibig; ?></div>
        <div style="position:absolute;margin-top: 405px;margin-left: 420px;;"><?php echo $row->philhealth; ?></div>
        <div style="position:absolute;margin-top: 425px;margin-left: 420px;"><?php echo $row->tax; ?></div>
        <div style="position:absolute;margin-top: 445px;margin-left: 420px;">
              <?php echo $row->semi_monthly - $row->lates + $row->overtime + $row->other_earnings - $row->deduction - $row->sss - $row->pagibig - $row->philhealth - $row->tax?>
        </div>
     <?php } ?>
        <img src="<?php echo base_url('images/capture.jpg'); ?>" width="720" height="500" alt=""/>
        <button onlick="print()" class="btn btn-default navbar-btn">Print</button>
    </div>

</div>