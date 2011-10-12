<?php

//辞書ファイルから読み込んだ言葉をランダムにツイートする

//初期設定ファイルの読み込み
require_once("ini.php");

//Botクラスの読み込み
require_once("bot_core.php");


//Botオブジェクトの生成
$myBot = new Bot($user, $consumer_key, $consumer_secret, $access_token, $access_token_secret);

//送信する文字列の取得
$text = $myBot->Speaks($txt);

//コマンドプロンプトでの出力確認用
if(DEBUG_MODE) {Util::debug_print($text);}


//ツイートを送信
if($text) {$myBot->Post($text);}


?>
