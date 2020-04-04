<?php 
require "vendor/autoload.php";
use Predis\Client;
$redis = new Client();

if(isset($_POST['message'])){
    $sender = $_POST['sender'];
    $message = $_POST['message'];
    $redis->rpush('chatroom-001',$sender . ": ".$message);
    $messages =  $redis->lrange('chatroom-001',0,$redis->llen('chatroom-001'));
    echo "<p>";
    foreach($messages as $m){
        echo $m."<br/>";
    }
    echo "</p>";
}

if(isset($_POST['refresh'])){
    $messages =  $redis->lrange('chatroom-001',0,$redis->llen('chatroom-001'));
    echo "<p>";
    foreach($messages as $m){
        echo $m."<br/>";
    }
    echo "</p>";
}