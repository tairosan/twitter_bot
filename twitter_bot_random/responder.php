<?php

//応答クラス


//Responderクラスの定義
class Responder {

	//メンバ変数
	var $name;	//オブジェクト名を格納する変数

	//コンストラクタ(初期化用メソッド)
	function Responder($name) {
		$this->name = $name;
	}

	//受け取った文字列をそのまま返すメソッド
	function Response($text) {
		return $text;
	}

	//名前を返すメソッド
	function Name() {
		return $this->name;
	}
}

//TimeResponderクラスの定義(Responderクラスを継承)
class TimeResponder extends Responder {


	//現在時によって指定の送信する言葉をセットするメソッド
	function Response() {

		$hour = date("G");

		switch($hour) {
			case 6:
				$text = 'おはよう！今日もがんばろう！';
				break;
			case 13:
				$text = 'お昼、何食べた？';
				break;
			case 17:
				$text = '仕事終わったー';
				break;
			case 21:
				$text = 'おやすみなさい。';
				break;
			default:
				$text = '';

		}
		return $text;
	}
}

//RandomResponderクラスの定義(Responderクラスを継承)
class RandomResponder extends Responder {

	//メンバ変数
	var $text;	//テキストを格納する変数
	

	//コンストラクタ(初期化用メソッド)
	function RandomResponder($name) {
		$this->name = $name;
		//辞書ファイル名の設定
		$dic = "./dic/RandomDic1.txt";
		//辞書ファイルの存在チェック
		if(!file_exists($dic)) {
			die("ファイルが開けません。");
		}
		//辞書ファイルを変数に格納する
		$this->text = file($dic);
	}


	//読み込んだファイルからランダムに文字列を取り出すメソッド
	function Response() {
		$res=$this->text[rand(0, count($this->text) - 1)];
		return rtrim($res, "\n"); //改行コードを取り除く
	}

}



?>
