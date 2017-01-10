<?php
Class Leftpanelmodel extends CI_Model
{
     public function PromoList($calendar){
        return $this->db->query("pr_shop_leftpanel $calendar")->result();
    }
}
?>