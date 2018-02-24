<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function content($page,$type){
    $query = "SELECT * FROM content WHERE page_name ='" . $page . "' and type='" . $type . "'";
    $result = $this->db->query($query);
    return $result;
  }

  function updatecontent($data,$id){
    $this->db->where('id', $id);
    $this->db->update('content', $data);

    if($this->db->affected_rows() >=0){
      return true;
    }else{
      return false;
    }
  }

  function insertContent($data){
    if(!$this->db->insert('content',$data)){
      return $this->db->error();
    }
  }

  function category(){
    $query = "SELECT distinct category FROM product order by id";
    $result = $this->db->query($query);
    return $result;
  }

  function product(){
    $query = "SELECT * FROM product order by id,category";
    $result = $this->db->query($query);
    return $result;
  }



  function insertProduct($data){
    if(!$this->db->insert('product',$data)){
      return $this->db->error();
    }
  }

  function updateProduct($data,$id){
    $this->db->where('id', $id);
    $this->db->update('product', $data);

    if($this->db->affected_rows() >=0){
      return true;
    }else{
      return false;
    }
  }


  function catarticle(){
    $query = "SELECT distinct category FROM article order by id";
    $result = $this->db->query($query);
    return $result;
  }

  function article(){
    $query = "SELECT * FROM article order by id,category";
    $result = $this->db->query($query);
    return $result;
  }



  function insertArticle($data){
    if(!$this->db->insert('article',$data)){
      return $this->db->error();
    }
  }

  function updateArticle($data,$id){
    $this->db->where('id', $id);
    $this->db->update('article', $data);

    if($this->db->affected_rows() >=0){
      return true;
    }else{
      return false;
    }
  }

  function delete($table,$id){
    $this->db->delete($table, array('id' => $id));
    if($this->db->affected_rows() >=0){
      return true;
    }else{
      return false;
    }
  }

}
