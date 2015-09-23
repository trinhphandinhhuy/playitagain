<?php

$htmlBody = <<<END
<form method="GET">
  <div>
    Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term">
  </div>
  <div>
    Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="1">
  </div>
  <input type="submit" value="Search" name="submit">
</form>
END;

// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.
if(isset($_GET["submit"])){

if ($_GET['q'] && $_GET['maxResults']) {
  // Call set_include_path() as needed to point to your client library.
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
      'q' => $_GET['q'],
      'maxResults' => $_GET['maxResults'],
    ));

    $videos = '';


    // Add each result to the appropriate list, and then display the lists of
    // matching videos, channels, and playlists.
    foreach ($searchResponse['items'] as $searchResult) {
      switch ($searchResult['id']['kind']) {
        case 'youtube#video':
          $videos .= sprintf('<li>%s (%s)</li>',
              $searchResult['snippet']['title'], $searchResult['id']['videoId']);
          $single = $searchResult['id']['videoId'];
          //////////
          //echo "<div>";
            //echo "<iframe src='http://www.youtube.com/embed/$single?rel=0&showinfo=0&autohide=1&loop=1&autoplay=0&playlist=$single' frameborder='0' width='560' height='315'>";
          //echo "</iframe>";
          //echo "</div>";

          /////////

          break;

      }
    }

    $htmlBody .= <<<END

    <div class="vid-container">
        <iframe
            id="vid_frame"
            src="http://www.youtube.com/embed/$single?rel=0&showinfo=0&autohide=1&loop=1&autoplay=0&playlist=$single"
            frameborder="0" width="560" height="315">
        </iframe>
    </div>

    END;
    

  } catch (Google_Service_Exception $e) {
    $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  } catch (Google_Exception $e) {
    $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
      htmlspecialchars($e->getMessage()));
  }
}
}
?>

<!doctype html>
<html>
  <head>
    <title>YouTube Search</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-glyphicons.css" rel="stylesheet">
  </head>
  <body>
    <?=$htmlBody?>

    <!-- Bootstrap & JQuery -->
   <script src="js/bootstrap.min.js"></script>
   <script src="http://code.jquery.com/jquery.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </body>
</html>
