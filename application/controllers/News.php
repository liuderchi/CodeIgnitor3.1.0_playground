<?php
class News extends CI_Controller {

  public function __construct()
  {
          parent::__construct();
          $this->load->model('news_model');
  }

  public function index()  // view all news
  {
    $data['news'] = $this->news_model->get_news();
    $data['title'] = 'News archive';

    $this->load->view('templates/header', $data);
    $this->load->view('news/index', $data);      // views/news/index.php
    $this->load->view('templates/footer');
  }

  public function view($slug = NULL)    // view single news
  {
    $data['news_item'] = $this->news_model->get_news($slug);
    if (empty($data['news_item']))
    {
      show_404();
    }

    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);      // views/news/view.php
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');
    // NOTE set_rules(name-of-input-field, name-to-be-used-in-error-messages, rule)

    if ($this->form_validation->run() === FALSE){

        $this->load->view('templates/header', $data);
        $this->load->view('news/create');
        $this->load->view('templates/footer');
    }
    else{
        $this->news_model->set_news();
        $this->load->view('news/success');
    }
  }


}
