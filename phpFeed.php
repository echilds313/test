<?php
//retrieves Atom feeds from PHP.net using simple_xml
function ReadFeeds($limit)
{
    $feed_url = "http://php.net/feed.atom";
    //simplexml function creates object
    $feed = simplexml_load_file($feed_url);

    $x = 1;
    foreach ($feed->entry as $item) {
        //set the limit of feed posts you want to retrieve
        if ($x <= $limit) {
            $title = $item->title;
            $url = $item->id;
            $output = "<ul id='feed' style='position:relative !important; border:none; display:block;'>
                      <li><a href='{$url}'>{$title}</a></li>
                      </ul>";
        }
        $x++;
    }
}
//set number here
echo ReadFeeds(3);
