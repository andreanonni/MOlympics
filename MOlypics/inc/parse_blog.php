<?php
function pnonno($arr,$j)
{


$style = (($j % 2)==1)?"blu":"yellow"; 
?>
		<div id="news" >
		<h2>
		<?php print $arr['title'];?>
		</h2>
		<i><?php print $style ?></i>
		<p>
		<?php print $arr['desc'];?>
		</p>
	</div>

<?php
	
}

  $doc = new DOMDocument();
  $doc->load('http://feeds.feedburner.com/london2012/blog?format=xml');
  $arrFeeds = array();

  foreach ($doc->getElementsByTagName('item') as $node) {

    $itemRSS = array ( 
      'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
      'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
      'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
      'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
      'creator' => $node->getElementsByTagName('dc:creator')->item(0)->nodeValue,
      'id' => $node->getElementsByTagName('guid')->item(0)->nodeValue,
      'comment' => $node->getElementsByTagName('comments')->item(0)->nodeValue
      );
    array_push($arrFeeds, $itemRSS);
  }

for($j=0;$j<sizeof($arrFeeds);$j++)
{

pnonno($arrFeeds[$j],$j);


}




?>

