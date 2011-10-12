<?php


//ユーティリティ

class Util {

	//文字コードをSJISに変換して出力するメソッド
	function Debug_print($text) {
		print mb_convert_encoding($text, "SJIS", "auto")."\n";
	}

}



?>
