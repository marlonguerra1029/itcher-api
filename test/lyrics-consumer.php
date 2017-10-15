<?php
include_once '../Music/LyricsApiConsumer.php';

$lyricsApiConsumer = new LyricsApiConsumer("Coldplay", "Adventure of a Lifetime");
header('Content-Type: application/json');
echo $lyricsApiConsumer->getLyrics();

?>