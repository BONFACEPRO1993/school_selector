<!--This controller enables us to load static pages from files in the pages and templates folders  -->
<?php
  class Pages extends CI_Controller
  {

    public function  view($page='home')
    {
      // Checks to see if page exists
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
      {
        show_404();
      }
      //if successful
      $data['title']=ucfirst($page);
    

      $this->load->view('templates/header');
      $this->load->view('templates/navbar');
      $this->load->view('pages/'. $page, $data);
      $this->load->view('templates/footer');
    }
  }

 ?>
