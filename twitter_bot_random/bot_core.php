<?php

//Botクラス

//ユーティリティファイルの読み込み
require_once("util.php");

//Reponderクラスの読み込み
require_once("responder.php");


//Oauthライブラリの読み込み
require_once("./oauth/twitteroauth.php");



//Botクラスの定義
class Bot {

	//メンバ変数
	var $user;	//ユーザー名を格納する変数
	var $Obj;	//OAuthオブジェクトを格納する変数
	var $responder;	//Responderオブジェクトを格納する変数

	//コンストラクタ(初期化用メソッド)
	function Bot($usr, $consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret) {
		$this->user = $usr;
		//OAuthオブジェクトの生成
		$this->Obj = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret);

		//Respondertオブジェクトの生成
		$this->responder = new RandomResponder('Random');


	}

	//リクエストを送信するメソッド
	function Request($url, $method = "POST", $opt = array()) {
		$req = $this->Obj->OAuthRequest("http://api.twitter.com/1/".$url, $method, $opt);
		if($req) {$result = $req;} else {$result = null;}
		return $result;
	}

	//ツイートを送信するメソッド
	function Post($status) {
		//送信する文字列($status)をリクエストパラメータにセット
		$opt = array();
		$opt['status'] = $status;
		//リクエストを送信
		$req = $this->Request("statuses/update.xml", "POST", $opt);
		return $req;
	}

	//テキストをResponderオブジェクトに渡すメソッド
	function Speaks($input) {
		return $this->responder->Response($input);
	}

	//Responderオブジェクトの名前を返すメソッド
	function ResponderName() {
		return $this->responder->Name();
	}



}


?>
