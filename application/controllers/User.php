<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User extends MY_Controller
{


 public function index()
 {
   $this->load->view('header');
   $this->load->view('footer');
 }

 public function user_create(){

  $this->load->view('user/user_create');
 }

}
