<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('string');
    $this->load->helper('array');
    $this->load->library('form_validation');
  }

  public function index()
  {
      $this->form_validation->set_rules('video_name', "enter the name please", 'required|min_length[1]|max_length[1000]|trim');
      if ($this->form_validation->run() == FALSE) {
          // Set initial values for the view
          $page_data = array('success_fail'   => null
                             );

          $this->load->view('common/header');
          $this->load->view('nav/top_nav');
          $this->load->view('search', $page_data);
          $this->load->view('common/footer');

      } else {
    /////
    require_once 'google-api-php-client/src/Google/autoload.php';
    require_once 'google-api-php-client/src/Google/Client.php';
    require_once 'google-api-php-client/src/Google/Service/YouTube.php';

      /*
       * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
       * Google Developers Console <https://console.developers.google.com/>
       * Please ensure that you have enabled the YouTube Data API for your project.
       */
      $DEVELOPER_KEY = 'AIzaSyAzrqGQvM4cTc16-iUob5VyL35NGJyoVds';

      $client = new Google_Client();
      $client->setDeveloperKey($DEVELOPER_KEY);

      // Define an object that will be used to make all API requests.
      $youtube = new Google_Service_YouTube($client);

      try {
        // Call the search.list method to retrieve results matching the specified
        // query term.
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
          'q' => $this->input->post('video_name'),
          'maxResults' => 20,
        ));

        $videos = '';

        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        $i = 0;
        $list = "";
        $listID = array();
        $videoTitle = "";
        foreach ($searchResponse['items'] as $searchResult) {
          switch ($searchResult['id']['kind']) {
            case 'youtube#video':
              $list = $searchResult['id']['videoId'];
              $videoTitle =  $searchResult['snippet']['title'];
              $listID[$list] = $videoTitle;
              //echo $list.",";
              //echo $videoTitle.";";

              break;

          }
        }


      } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
          htmlspecialchars($e->getMessage()));
      } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
          htmlspecialchars($e->getMessage()));
      }
    /////

    $data = array(
        'success_fail'   => true,
        'video_name' => $this->input->post('video_name'),
        'list' => $listID
        //'videoTitle' => $videoTitle
    );
    $this->load->view('common/header');
    $this->load->view('nav/top_nav_search');
    $this->load->view('result', $data);
    $this->load->view('common/footer_search');
  }
}
}
