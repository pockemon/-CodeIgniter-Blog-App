<?php
    class Pages extends CI_Controller{
       public function view($page = 'home'){
         //To check if view of this page exists or not
         //APPPATH-Codeigniter constant-that will give us a path
         //show_404-codeigniter function to load a 404 error
         if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
           show_404();
         }
         //data array represents the variable that we want to pass into the view
         //ucfirst will make the first character capital of $page
         //for now we only have title
         $data['title'] = ucfirst($page);
         //load Views
         $this->load->view('templates/header');
         $this->load->view('pages/'.$page,$data);
         $this->load->view('templates/footer');
       }
    }
?>
