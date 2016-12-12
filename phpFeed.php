<?php
//retrieves Atom feeds from PHP.net using simple_xml
function ReadFeeds($limit)
{
    $feed_url = "http://php.net/feed.atom";
    //simplexml function creates object
    $feed = simplexml_load_file($feed_url);

    $x = 1;
    $output = '<ul class="feed">';
    foreach ($feed->entry as $item) {
        //set the limit of feed posts you want to retrieve
        if ($x <= $limit) {
            $title = $item->title;
            $url = $item->id;
            $output .= "<li><a href='{$url}'>{$title}</a></li>";
        }
        $x++;
    }
    $output .= '</ul>';
    echo $output;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>PHP Feeds</title>
  <style>
  .feed {
    position:relative !important;
    border:none;
    display:block;
  }
  </style>
</head>
<body>
  <section>
    <?php
       ReadFeeds(4);
    ?>
  </section>
</body>
</html>
