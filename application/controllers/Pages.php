<?php

class Pages extends CI_Controller {    //  CI_Controller class @ system/core/Controller.php

  // NOTE default URL routing rule by class name and function name:
  //
  // http://my.host/[controller-class]/[controller-method]/[arguments]
  // e.g.: /index.php/pages/view/home
  //       /index.php/pages/view/about
	public function view($page = 'home')  //$page is name of the page to be loaded, default is 'home'
  // e.g.: /index.php/pages/view is ok
	{

    if ( ! file_exists('application/views/pages/'.$page.'.php'))  // check page existence
    {
      show_404();
    }

    // NOTE prepare model for pages:
    $data['title'] = ucfirst($page); // upper case first letter

    // NOTE loading views in the order they should be displayed
    $this->load->view('templates/header', $data);  // templates/header.php
    $this->load->view('pages/'.$page, $data);      // pages/home.php, pages/about.php
    $this->load->view('templates/footer', $data);  // templates/footer.php

	}
}
