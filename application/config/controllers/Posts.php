<?php
    class Posts extends CI_Controller{
       public function index(){
         //data array represents the variable that we want to pass into the view
         //ucfirst will make the first character capital of $page
         //for now we only have title
         $data['title'] = "Latest Posts";

         $data['posts'] = $this->post_model->get_posts();
         print_r($data['posts']);

         //load Views
         $this->load->view('templates/header');
         $this->load->view('posts/index',$data);
         $this->load->view('templates/footer');
       }

    }
?>
