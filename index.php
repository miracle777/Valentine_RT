<?php

//GitHubからダウンロード
require_once('twitteroauth.php');
 
//twitterAppsで取得
$consumerKey = ' ';
$consumerSecret = ' ';
$accessToken = ' ';
$accessTokenSecret = ' ';
    
$twObj = new TwitterOAuth(
    $consumerKey,
    $consumerSecret,
    $accessToken,
    $accessTokenSecret
);
 
//Twitterで検索するワード
//複数の場合は OR を使う
$key = "バレンタイン OR Valentine";
 
//オプション設定
$options = array('q'=>$key,'count'=>'1','lang'=>'ja');
 
//検索
$json = $twObj->OAuthRequest(
    'https://api.twitter.com/1.1/search/tweets.json',
    'GET',
    $options
);
$jset = json_decode($json, true);

//tweetidを取得
foreach ($jset['statuses'] as $result) {
   $id =$result['id_str'];
}


print $id;


 
  $req = $twObj->oAuthRequest(
 'https://api.twitter.com/1.1/statuses/retweet/'.$id.'.json','POST','');
?>

