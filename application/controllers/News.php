<?php
class News extends CI_Controller {

        public function __construct()
        {
            echo "I got here";
                parent::__construct();
                $this->load->model('news_model');
        }

        public function index()
        {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('footer');
        }

        public function view($slug = NULL)
        {
           $data['news_item'] = $this->news_model->get_news($slug);

           if (empty($data['news_item']))
           {
                show_404();
           }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('footer');
        }
}