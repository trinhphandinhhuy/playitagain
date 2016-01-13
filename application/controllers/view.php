<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('string');
    $this->load->helper('array');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if (!$this->uri->segment(2)) {
        redirect (base_url());
    } else {
        $videoid = $this->uri->segment(2);
        function youtube_title($id) {
        // $id = 'YOUTUBE_ID';
        // returns a single line of JSON that contains the video title. Not a giant request.
        $videoTitle = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$id."&key=AIzaSyAzrqGQvM4cTc16-iUob5VyL35NGJyoVds&fields=items(id,snippet(title),statistics)&part=snippet,statistics");
        // despite @ suppress, it will be false if it fails
        if ($videoTitle) {
        $json = json_decode($videoTitle, true);

        return $json['items'][0]['snippet']['title'];
        } else {
        return false;
        }
        }
        $title = youtube_title($videoid);
        $page_data = array('success_fail'   => true,
                           'videoid'    => $videoid,
                            'title' => $title);

        $this->load->view('common/header');
        $this->load->view('nav/top_nav_search');
        $this->load->view('view', $page_data);
        $this->load->view('common/footer_search');
  }
}
}
