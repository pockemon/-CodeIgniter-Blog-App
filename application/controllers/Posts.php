<?php
    class Posts extends CI_Controller{
       public function index(){

         //data array represents the variable that we want to pass into the view
         //ucfirst will make the first character capital of $page
         //for now we only have title
         $data['title'] = 'Latest Posts';

         $data['posts'] = $this->Post_model->get_posts();
         //print_r( $data['posts']);
          //load Views
         $this->load->view('templates/header');
         $this->load->view('posts/index',$data);
         $this->load->view('templates/footer');
       }

       public function view($slug = NULL){

            $data['post'] = $this->Post_model->get_posts($slug);

            if(empty($data['post'])){
              show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('templates/header');
            $this->load->view('posts/view',$data);
            $this->load->view('templates/footer');

       }

       public function create()
       {
    			$data['title'] = 'Create Post';

    		//	$data['categories'] = $this->post_model->get_categories();
    			$this->form_validation->set_rules('title', 'Title', 'required');
    			$this->form_validation->set_rules('body', 'Body', 'required');

    			if($this->form_validation->run() === FALSE){
    				$this->load->view('templates/header');
    				$this->load->view('posts/create', $data);
    				$this->load->view('templates/footer');
    			} else {
    				// Upload Image
            /*
    				$config['upload_path'] = './assets/images/posts';
    				$config['allowed_types'] = 'gif|jpg|png';
    				$config['max_size'] = '2048';
    				$config['max_width'] = '2000';
    				$config['max_height']v = '2000';
    				$this->load->library('upload', $config);
    				if(!$this->upload->do_upload()){
    					$errors = array('error' => $this->upload->display_errors());
    					$post_image = 'noimage.jpg';
    				} else {
    					$data = array('upload_data' => $this->upload->data());
    					$post_image = $_FILES['userfile']['name'];
    				}
    				$this->post_model->create_post($post_image);
    				// Set message
    				$this->session->set_flashdata('post_created', 'Your post has been created');
            */
            $this->Post_model->create_post();
    				redirect('posts');
    			}
		    }


        public function delete($id){
          $this->Post_model->delete_post($id);
          redirect('posts');
        }

        public function edit($slug){

          $data['post'] = $this->post_model->get_posts($slug);

          if(empty($data['post'])){
				    show_404();
			   }
			     $data['title'] = 'Edit Post';

           $this->load->view('templates/header');
			     $this->load->view('posts/edit', $data);
			     $this->load->view('templates/footer');

        }
    }
?>
