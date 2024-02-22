<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>固定資産税・都市計画税精算書</title>
</head>
<body>
<?php global $articleName, $totalTaxF_number, $totalCityTaxF_number, $totalizerTaxF_number, $daysPointY, $daysPointM, $daysPointD, $daysBefore, $daysTermUri, $daysAfter, $daysTermKai, $totalizerTaxF_number, $daysBefore, $daysYear, $chargeVender_gokei_formatC, $totalizerTaxF_number, $daysAfter, $daysYear, $chargeBuyer_gokei_formatC, $daysYear, $kisanbiType2, $daysStartY, $daysStartM, $daysStartD, $daysEndY, $daysEndM, $daysEndD, $buyerName, $Namestatus, $tadashigaki_output, $venderAd, $venderName;

?>
<div id="content">
<div id="contentInner" class="clearfix">

<div id="main">
<!-- 計算プログラムの読み込み -->
<?php get_template_part( 'calculate/seisansyo' ); ?>




<!-- ▼印刷用CSS -->
<link rel="stylesheet" href="<?= get_theme_file_uri(''); ?>/css/uikit.min.css" media="all">
<link rel="stylesheet" href="<?= get_theme_file_uri(''); ?>/calculate/css/seisansyo.css" media="all">
<link rel="stylesheet" href="<?= get_theme_file_uri(''); ?>/calculate/css/print.css" media="print">


	


<!-- ▼精算書作成ここから -->
<div id="calculateFormSec">

	
		<!-- ▼計算結果出力ここから -->
		<div id="calculateOutputSec">
		
			<h3>固定資産税・都市計画税精算書</h3>
			
			<div id="articleDataResult">
				<h4>1.物件</h4>
				<p><?php echo nl2br($articleName) ; ?></p>
			</div><!-- #articleDataResult -->
	
	
	
	
			<div id="taxDataResult">
				<h4>2.固定資産税・都市計画税</h4>
				
				<table>
					<tr>
						<th>固定資産税</th>
						<td><?php echo $totalTaxF_number ; ?>円</td>
					</tr>
					<tr>
						<th>都市計画税</th>
						<td><?php echo $totalCityTaxF_number ; ?>円</td>
					</tr>
					<tr>
						<th>合計</th>
						<td class="goukei_b"><?php echo $totalizerTaxF_number ; ?>円</td>
					</tr>

				</table>
								
			</div><!-- #taxDataResult -->
			
	
	
	
			<div id="dateDataResult">
				<h4>3.日数負担分</h4>
				<p>
					<span class="ptitle">引渡日</span>：<?php echo $daysPointY ; ?>年 <?php echo $daysPointM ; ?>月 <?php echo $daysPointD ; ?>日<br>
					<span class="ptitle">売主負担分日数</span>：<span class="pdate"><?php echo $daysBefore; ?></span>日分 ／ 期間：<?php echo $daysTermUri ; ?><br>
					<span class="ptitle">買主負担分日数</span>：<span class="pdate"><?php echo $daysAfter ; ?></span>日分 ／ 期間：<?php echo $daysTermKai ; ?>
				</p>
			</div><!-- #dateDataResult -->
				
			
			<div id="futanResult">
				<h4>4.計算式及び税金の負担額</h4>
				<p>売主：<?php echo $totalizerTaxF_number ; ?>円 × <span class="ptitle"><?php echo $daysBefore ; ?></span>日 ／ <?php echo $daysYear ; ?>日 = <span class="pprice"><?php echo $chargeVender_gokei_formatC ; ?></span>円<br>
				買主：<?php echo $totalizerTaxF_number ; ?>円 × <span class="ptitle"><?php echo $daysAfter  ; ?></span>日 ／ <?php echo $daysYear ; ?>日 = <span class="pprice"><?php echo $chargeBuyer_gokei_formatC ; ?></span>円
			</p>
			</div><!-- #futanResult -->
	
	
	
		</div><!-- #calculateOutputSec -->
		<!-- ▲計算結果出力ここまで -->
	
	
	
		
		<!-- ▼領収書部分ここから -->
		<div id="printSec">
		
			<h3>領収書</h3>
			
			<div id="articleDataPrint">
				<p>
					<span>（買主）</span>
					<?php echo $buyerName ; ?> 
					<span><?php echo $Namestatus ; ?> </span>
				</p>
			</div><!-- #articleDataPrint -->
		
			<div id="taxDataPrint">
				<p id="kainusiTax">￥<?php echo $chargeBuyer_gokei_formatC ; ?> ー</p>
				<p id="Hosoku"><?php echo nl2br($tadashigaki_output) ; ?></p>

			</div><!-- #taxDataPrint -->
			
			<div id="RyousyuPrint">
				<span>年</span><span>月</span>日　上記正に領収いたしました。
			</div><!-- #RyousyuPrint -->
			
			<div id="venderPrint">
				<p id="venderAdressPrint"><span>（売主）住所：</span><?php echo $venderAd ; ?></p>
				<p id="venderNamePrint"><span>氏名：</span><?php echo $venderName ; ?>　<span id="venderSeal">&#12958;</span> </p>
			</div><!-- #venderNamePrint -->
			
		
		</div><!-- #printSec -->
		<!-- ▲領収書部分ここまで -->



		<div id="pagePrint">	<!-- ←プリントボタン -->
			<p><a href="#" onclick="window.print();return false;"><img src="<?= get_theme_file_uri(''); ?>/calculate/img/page_print_btn.png" alt="ページを印刷"></a></p>
			<p id="chuibun">注意：ヘッダーとフッターが印字されます。消される場合は各自で印刷プレビュー等から非表示にした上で印刷して下さい。</p>
			<ul class="uk-list uk-grid">
				<li>
					<a class="com-btn-01" href="<?= home_url( '/realestate/calculate' ); ?>">
						固定資産税・都市計画税精算書 計算ページに戻る
					</a>
				</li>
				<li>
					<a class="com-btn-01" href="<?= home_url( '/' ); ?>">
						トップページに戻る
					</a>
				</li>
			</ul>
		</div>

		

</div><!-- #calculateFormSec -->
</div><!-- /#main -->


</div><!-- /#contentInner -->
</div><!-- /#content -->
</body>
</html>