<?php
/*
 * functionsフォルダにあるファイルをすべて読み込む
*/
foreach(glob(TEMPLATEPATH."/functions/*.php") as $file){
	require_once $file;
}