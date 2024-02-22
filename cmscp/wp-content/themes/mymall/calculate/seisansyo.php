<?php
	
// グローバル変数の宣言
///////////////////////////////////////////////////////////////////////////////////////////
global $articleName, $totalTaxF_number, $totalCityTaxF_number, $totalizerTaxF_number, $daysPointY, $daysPointM, $daysPointD, $daysBefore, $daysTermUri, $daysAfter, $daysTermKai, $totalizerTaxF_number, $daysBefore, $daysYear, $chargeVender_gokei_formatC, $totalizerTaxF_number, $daysAfter, $daysYear, $chargeBuyer_gokei_formatC, $daysYear, $kisanbiType2, $daysStartY, $daysStartM, $daysStartD, $daysEndY, $daysEndM, $daysEndD, $buyerName, $Namestatus, $tadashigaki_output, $venderAd, $venderName;

	

// 税金金額をセット
///////////////////////////////////////////////////////////////////////////////////////////

// ▼20150623プログラム修整の為ここからコメントアウト

// $landTax                  = $_POST["landTax"];                                // 土地固定資産税
// $landTax2                 = mb_convert_kana($landTax, "a", "UTF-8");          // 全角を半角に変換
// $landTaxF                 = str_replace(',','',$landTax2);                    // カンマ無しに
// $landTaxF_number          = number_format((int)$landTaxF);                    // カンマ有りに

// $structureTax             = $_POST["structureTax"];                           // 建物固定資産税
// $structureTax2            = mb_convert_kana($structureTax, "a", "UTF-8");     // 全角を半角に変換
// $structureTaxF            = str_replace(',','',$structureTax2);
// $structureTaxF_number     = number_format((int)$structureTaxF);               // カンマ有りに

// $otherTax                 = $_POST["otherTax"];                               // その他固定資産税
// $otherTax2                = mb_convert_kana($otherTax, "a", "UTF-8");         // 全角を半角に変換
// $otherTaxF                = str_replace(',','',$otherTax2);                   // カンマ無しに
// $otherTaxF_number         = number_format((int)$otherTaxF);                   // カンマ有りに

// $landCityTax              = $_POST["landCityTax"];                            // 土地都市計画税
// $landCityTax2             = mb_convert_kana($landCityTax, "a", "UTF-8");      // 全角を半角に変換
// $landCityTaxF             = str_replace(',','',$landCityTax2);                // カンマ無しに
// $landCityTaxF_number      = number_format((int)$landCityTaxF);                // カンマ有りに

// $structureCityTax         = $_POST["structureCityTax"];                       // 建物固定資産税
// $structureCityTax2        = mb_convert_kana($structureCityTax, "a", "UTF-8"); // 全角を半角に変換
// $structureCityTaxF        = str_replace(',','',$structureCityTax2);           // カンマ無しに
// $structureCityTaxF_number = number_format((int)$structureCityTaxF);           // カンマ有りに

// $otherCityTax             = $_POST["otherCityTax"];                           // その他都市計画税
// $otherCityTax2            = mb_convert_kana($otherCityTax, "a", "UTF-8");     // 全角を半角に変換
// $otherCityTaxF            = str_replace(',','',$otherCityTax2);               // カンマ無しに
// $otherCityTaxF_number     = number_format((int)$otherCityTaxF);               // カンマ有りに

// $totalTaxF                = $landTaxF+$structureTaxF+$otherTaxF ;             //固定資産税合計
// $totalTaxF_number         = number_format((int)$totalTaxF);                   // カンマ有りに

// $totalCityTaxF            = $landCityTaxF+$structureCityTaxF+$otherCityTaxF;  // 都市計画税合計
// $totalCityTaxF_number     = number_format((int)$totalCityTaxF);               // カンマ有りに

// $totalizerTaxF            = $totalTaxF+$totalCityTaxF;                        //総合計
// $totalizerTaxF_number     = number_format((int)$totalizerTaxF);               // カンマ有りに

// ▲20150623プログラム修整の為ここまでコメントアウト



// ▼20150623プログラム修整ここから

$totalTax                 = $_POST["totalTax"] ?? '';                               // 固定資産税入力値
$totalTax2                = mb_convert_kana($totalTax, "a", "UTF-8");         // 全角を半角に変換
$totalTaxF                = str_replace(',','',$totalTax2);                   // カンマ無しに
$totalTaxF_number         = number_format((int)$totalTaxF);                   // カンマ有りに

$totalCityTax             = $_POST["totalCityTax"] ?? '';                           // 都市計画税入力値
$totalCityTax2            = mb_convert_kana($totalCityTax, "a", "UTF-8");     // 全角を半角に変換
$totalCityTaxF            = str_replace(',','',$totalCityTax2);               // カンマ無しに
$totalCityTaxF_number     = number_format((int)$totalCityTaxF);               // カンマ有りに

$totalizerTaxF            = (int)$totalTaxF+(int)$totalCityTaxF;              //総合計
$totalizerTaxF_number     = number_format((int)$totalizerTaxF);               // カンマ有りに

// ▲20150623プログラム修整ここまで






// 買主 売主 物件 情報をセット
///////////////////////////////////////////////////////////////////////////////////////////
$buyerName   = $_POST["buyerName"] ?? '';   // 買主名
$Namestatus  = $_POST["Namestatus"] ?? '';  // 買主名 敬称
$venderName  = $_POST["venderName"] ?? '';  // 売主名
$venderAd    = $_POST["venderAd"] ?? '';    // 売主住所
$articleName = $_POST["articleName"] ?? ''; // 物件名



// 但し書きの処理
///////////////////////////////////////////////////////////////////////////////////////////
$tadashigaki = $_POST["tadashigaki"] ?? '';           //但し書き情報を取得
$tadashigaki_year = $_POST["tadashigaki_year"] ?? ''; //条件aの月を取得
$tadashigaki_moth = $_POST["tadashigaki_moth"] ?? ''; //条件bの月を取得
$tadashigaki_day  = $_POST["tadashigaki_day"] ?? '';  //条件cの月を取得
$tadashigaki_free  = $_POST["tadashigaki_free"] ?? '';  //フリースペースを取得


//但し書きの選択によって表示項目を変更
if ($tadashigaki == 'tadashigaki_a'){ 
	$tadashigaki_output = "但し、別紙不動産売買契約書に基づく固定資産税・都市計画税の精算金として";
} elseif ($tadashigaki == 'tadashigaki_b') {
	$tadashigaki_output = "但し、".$tadashigaki_year."年".$tadashigaki_moth."月".$tadashigaki_day."日付不動産売買契約に基づく精算金として" ;
} elseif ($tadashigaki == 'tadashigaki_c') {
	$tadashigaki_output = $tadashigaki_free;
}



// 引渡し日の処理（仮）
///////////////////////////////////////////////////////////////////////////////////////////
$daysPointY = $_POST["daysPointY"] ?? '';  // 引渡し日 年
$daysPointM = $_POST["daysPointM"] ?? '';  // 引渡し日 月
$daysPointD = $_POST["daysPointD"] ?? '';  // 引渡し日 日



// 起算日情報の処理
///////////////////////////////////////////////////////////////////////////////////////////
$kisanbi = $_POST["kisanbi"] ?? false;        //起算日情報を取得

if ($kisanbi) {
	$ardata = explode(",",$kisanbi);       //カンマ区切りで分割


// 起算日タイプの取得
///////////////////////////////////////////////
$kisanbiType = $ardata[0];           // 起算日タイプ

if ($kisanbiType == 'a'){ 
	$kisanbiType2 = "1月1日";
} elseif ($kisanbiType == 'b') {
	$kisanbiType2 = "4月1日";
}


// 起算日開始情報をセット
///////////////////////////////////////////////
if ($ardata[0] == 'a'){ 
	$daysStartY = $daysPointY;        // 起算日開始 年（起算日1月1日の場合）
} elseif ($ardata[0] == 'b') {
	if ($daysPointM < 4){ 
	  $daysStartY = $daysPointY - 1;  // 起算日開始 年（起算日4月1日 引渡し日が3月までの場合）
	  } else {
	  $daysStartY = $daysPointY;      // 起算日開始 年（起算日4月1日 引渡し日が4月以降の場合）
  }
}
$daysStartM = $ardata[1];           // 起算日開始 月
$daysStartD = $ardata[2];           // 起算日開始 日



// 起算日終了情報をセット
///////////////////////////////////////////////
if ($ardata[0] == 'a'){ 
	$daysEndY = $daysPointY;          // 起算日終了 年（起算日1月1日の場合）
} elseif ($ardata[0] == 'b') {
	if ($daysPointM < 4){ 
	  $daysEndY = $daysPointY;        // 起算日終了 年（起算日4月1日 引渡し日が3月までの場合）
	  } else {
	  $daysEndY = $daysPointY + 1;    // 起算日終了 年（起算日4月1日 引渡し日が4月以降の場合）
  }
}
$daysEndM = $ardata[3];             // 起算日終了 月
$daysEndD = $ardata[4];             // 起算日終了 日



//売主負担期間
///////////////////////////////////////////////////////////////////////////////////////////
$daysTermStartUri = $daysStartY."年".$daysStartM."月".$daysStartD."日";          // 売主負担期間開始
$daysTermEndUri = $daysPointY."-".$daysPointM."-".$daysPointD ;                 // 引渡し日を取得
$daysTermEndUri2=date("Y-n-j",strtotime('-1 day',strtotime($daysTermEndUri)));  // 引渡し日の前日に変換

$daysTermEndUri3=explode("-",$daysTermEndUri2);                                 // 計算結果を-区切りで分割

// 引渡し日の前日を売主負担期間終了日にセット
// 但し起算日1月1日の場合の1月1日と起算日4月1日の場合の4月1日は期間なし
if ($ardata[0] == 'a'){                                                           // 起算日が1月1日の場合
	if ($daysPointM.$daysPointD == 11){                                           // 引渡し日が1月1日の場合
		$daysTermUri = "期間なし" ;
	  } else {                                                                    // 引渡し日が1月1日以外の場合
     $daysTermUri = $daysTermStartUri."〜".$daysTermEndUri3[0]."年".$daysTermEndUri3[1]."月".$daysTermEndUri3[2]."日" ; // 売主負担期間
  }	
} elseif ($ardata[0] == 'b') {
	if ($daysPointM.$daysPointD == 41){                                           // 引渡し日が4月1日の場合
		$daysTermUri = "期間なし" ;
	  } else {                                                                    // 引渡し日が4月1日以外の場合
     $daysTermUri = $daysTermStartUri."〜".$daysTermEndUri3[0]."年".$daysTermEndUri3[1]."月".$daysTermEndUri3[2]."日" ; // 売主負担期間
  }
}



// 買主負担期間 
///////////////////////////////////////////////////////////////////////////////////////////
$daysTermStartKai = $daysPointY."年".$daysPointM."月".$daysPointD."日" ;         // 買主負担期間開始
$daysTermEndKai = $daysEndY."年".$daysEndM."月".$daysEndD."日";                  // 買主負担期間終了
$daysTermKai = $daysTermStartKai."〜".$daysTermEndKai ;                          // 買主負担期間



// 2つの日付の差を求める関数
///////////////////////////////////////////////////////////////////////////////////////////
function compareDate($year1, $month1, $day1, $year2, $month2, $day2) {
    $dt1 = mktime(0, 0, 0, $month1, $day1, $year1);
    $dt2 = mktime(0, 0, 0, $month2, $day2, $year2);
    $diff = $dt1 - $dt2;
    $diffDay = $diff / 86400;//1日は86400秒
    return $diffDay;
}
$daysBefore = compareDate($daysPointY, $daysPointM, $daysPointD, $daysStartY, $daysStartM, $daysStartD); // 経過日数計算
//$daysAfter  = compareDate($daysEndY, $daysEndM, $daysEndD, $daysPointY, $daysPointM, $daysPointD);     // 残日数計算 - 引渡し日を含めない場合はこちら
$daysAfter  = compareDate($daysEndY, $daysEndM, $daysEndD, $daysPointY, $daysPointM, $daysPointD) + 1;   // 残日数計算 - 引渡し日を含める場合はこちら
$daysYear   = compareDate($daysEndY, $daysEndM, $daysEndD, $daysStartY, $daysStartM, $daysStartD) + 1;   // 一年間の日数掲載



// 買主の金額計算
///////////////////////////////////////////////////////////////////////////////////////////
$chargeBuyer = $totalizerTaxF * $daysAfter;                                      // 税金合計額を日数で掛ける
$chargeBuyer_gokei = $chargeBuyer / $daysYear ;                                  // 掛けた値を1年間の日数で割る

//$chargeBuyer_gokei_format  = number_format((int)$chargeBuyer_gokei);           // カンマ有りに
//$chargeBuyer_gokei_formatA = number_format(floor($chargeBuyer_gokei));         // カンマ有り 切り捨て
//$chargeBuyer_gokei_formatB = number_format(ceil($chargeBuyer_gokei));          // カンマ有り 切り上げ
  $chargeBuyer_gokei_formatC = number_format(round($chargeBuyer_gokei));         // カンマ有り 四捨五入



// 売主の金額計算
///////////////////////////////////////////////////////////////////////////////////////////
$chargeVender = $totalizerTaxF * $daysBefore;                                    // 税金合計額を日数で掛ける
$chargeVender_gokei = $chargeVender / $daysYear ;                                // 掛けた値を1年間の日数で割る

//$chargeVender_gokei_format 	= number_format((int)$chargeVender_gokei);         // カンマ有りに
//$chargeVender_gokei_formatA = number_format(floor($chargeVender_gokei));       // カンマ有り 切り捨て
//$chargeVender_gokei_formatB = number_format(ceil($chargeVender_gokei));        // カンマ有り 切り上げ
  $chargeVender_gokei_formatC = number_format(round($chargeVender_gokei));       // カンマ有り  四捨五入



// カンマ無しに変換処理
///////////////////////////////////////////////////////////////////////////////////////////
//$chargeBuyer_gokei_formatAF  = str_replace(',','',$chargeBuyer_gokei_formatA);  // カンマ無しに
//$chargeBuyer_gokei_formatBF  = str_replace(',','',$chargeBuyer_gokei_formatB);  // カンマ無しに
  $chargeBuyer_gokei_formatCF  = str_replace(',','',$chargeBuyer_gokei_formatC);  // カンマ無しに

//$chargeVender_gokei_formatAF = str_replace(',','',$chargeVender_gokei_formatA); // カンマ無しに
//$chargeVender_gokei_formatBF = str_replace(',','',$chargeVender_gokei_formatB); // カンマ無しに
  $chargeVender_gokei_formatCF = str_replace(',','',$chargeVender_gokei_formatC); // カンマ無しに



// 合計値のテスト表示用計算
///////////////////////////////////////////////////////////////////////////////////////////
  $gokei  = $chargeBuyer_gokei + $chargeVender_gokei;
//$gokeiA = $chargeBuyer_gokei_formatAF + $chargeVender_gokei_formatAF;
//$gokeiB = $chargeBuyer_gokei_formatBF + $chargeVender_gokei_formatBF;
  $gokeiC = $chargeBuyer_gokei_formatCF + $chargeVender_gokei_formatCF;
	

}



?>
