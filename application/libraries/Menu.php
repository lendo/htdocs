<?php
  class Menu {
    function show() {
      $obj = & get_instance();
      $obj->load->helper('url');
      $menu = anchor(base_url().'a/b.html','新浪');
      $menu.= '  ';
      $menu .= anchor(base_url().'a/c.html','凤凰');
      $menu.= '  ';
      $menu .= anchor(base_url().'a/d.html','搜狐');
      
      return $menu;
    }
  }
?>