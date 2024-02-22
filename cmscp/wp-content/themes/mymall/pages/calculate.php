<!-- 計算プログラムの読み込み -->
<?php
get_template_part( 'calculate/seisansyo' );
global $articleName, $totalTaxF_number, $totalCityTaxF_number, $totalizerTaxF_number, $daysPointY, $daysPointM, $daysPointD, $daysBefore, $daysTermUri, $daysAfter, $daysTermKai, $totalizerTaxF_number, $daysBefore, $daysYear, $chargeVender_gokei_formatC, $totalizerTaxF_number, $daysAfter, $daysYear, $chargeBuyer_gokei_formatC, $daysYear, $kisanbiType2, $daysStartY, $daysStartM, $daysStartD, $daysEndY, $daysEndM, $daysEndD;


?>



<!-- ▼serectで年月に応じて日付を変更する -->
<script>
// 年月に応じて日付を変更する関数setDateForm
function setDateForm(selectYear,selectMonth,selectDay){
	year = document.getElementById(selectYear).value;
	month = parseInt(document.getElementById(selectMonth).value);

	selMonth = document.getElementById(selectMonth);
	selDay = document.getElementById(selectDay);

	// 日付optionの初期化
	if(selDay.options[29] == null){
		selDay.appendChild(document.createElement("option"));
		selDay.options[29].value = "29";
		selDay.options[29].text = "29";
	}
	if(selDay.options[30] == null){
		selDay.appendChild(document.createElement("option"));
		selDay.options[30].value = "30";
		selDay.options[30].text = "30";
	}
	if(selDay.options[31] == null){
		selDay.appendChild(document.createElement("option"));
		selDay.options[31].value = "31";
		selDay.options[31].text = "31";
	}

	// 月に応じて日付optionのノードを削除
	if(month == 2){
		selDay.removeChild(selDay.options[31]);
		selDay.removeChild(selDay.options[30]);
	// 閏年ではない場合
	if(year%4 != 0){
		selDay.removeChild(selDay.options[29]);
	}
	}else if(month == 4 || month == 6 || month == 9 || month == 11){
		selDay.removeChild(selDay.options[31]);
	}
}
</script>

<!-- ▼クリックでテキストボックの初期値が消える -->
<script>
	function cText(obj){
		if(obj.value==obj.defaultValue){
			obj.value="";
			obj.style.color="#000";
		}
	}
	
	function sText(obj){
		if(obj.value==""){
			obj.value=obj.defaultValue;
			obj.style.color="#999";
		}
	}
</script>

<!-- ▼計算、精算書作成のボタン判定 -->
<script>
	function goServletB(){
		document.getElementById('calculate-form').action = '<?= home_url( '/realestate/calculate-print' ); ?>';
	}
</script>



	


<div class="page-tit-01 calculate uk-flex uk-flex-wrap uk-child-width-1-2@m">
	<figure class="img"><img src="<?= get_theme_file_uri(); ?>/img/realestate/calculate/kv.jpg" alt=""></figure>
	<div class="detail uk-container">
		<h1 class="tit">固定資産税･都市計画税<br>自動日割り計算&精算書計算</h1>
		<span class="text">fixed assets and city planning tax</span>
	</div>
</div>

<!-- ▼▼▼計算フォームここから -->	
<section id="calculate" class="uk-container com-sec-01">

	<h3 class="com-tit-04">固定資産税・都市計画税自動日割計算&精算書作成</h3>
	<p>下記フォームに必要事項を入力し、計算ボタンを押して下さい。<br>計算後、精算書を作成するボタンを押していただくと、結果が記載された精算書をプリントアウトすることが出来ます。</p>

	<form id="calculate-form" class="com-mt-m" method="post" action="#calculate-output">
			
	
		<!-- ▼入力フォームここから -->
		<section id="calculate-input">
			<h3>必要な情報を入力して計算ボタンをクリックしてください</h3>
			<dl id="article-data">
				<dt>買主名</dt>
				<dd class="grid-01">
					<input id="buyerName" type="text" name="buyerName" value="<?php if(isset($_POST['buyerName'])){echo $_POST['buyerName'];}else{echo "";} ?>" onFocus="cText(this)" onBlur="sText(this)">
					<div>
						<label><input type="radio" name="Namestatus" value="様" required <?php if(isset($_POST['Namestatus']) && $_POST['Namestatus'] == "様"){echo "checked";}else if( empty($_POST['Namestatus']) ){echo "checked";}?> >様</label>
						<label><input type="radio" name="Namestatus" value="御中"  required <?php if(isset($_POST['Namestatus']) && $_POST['Namestatus'] == "御中"){echo "checked";}?> >御中</label>
					</div>
				</dd>
				<dt>売主名</dt>
				<dd><input id="venderName" type="text" name="venderName" value="<?php if(isset($_POST['venderName'])){echo $_POST['venderName'];}else{echo "";} ?>" onFocus="cText(this)" onBlur="sText(this)"></dd>
				<dt>売主住所</dt>
				<dd><input id="venderAd" type="text" name="venderAd" value="<?php if(isset($_POST['venderAd'])){echo $_POST['venderAd'];}else{echo "";} ?>" onFocus="cText(this)" onBlur="sText(this)"></dd>
				<dt>物件名</dt>
				<dd><input id="articleName" name="articleName" onFocus="cText(this)" onBlur="sText(this)" value="<?php if(isset($_POST['articleName'])){echo $_POST['articleName'];}else{echo "";} ?>" ></dd>
			</dl><!-- #article-data -->
	
	

			<dl id="tax-data">
				<dt>固定資産税</dt>
				<dd class="grid-02"><input class="inTax" type="number" name="totalTax" value="<?php if(isset($_POST['totalTax'])){echo $_POST['totalTax'];}else{echo "0";}  ?>" onFocus="cText(this)" onBlur="sText(this)"> 円</dd>
				<dt>都市計画税</dt>
				<dd class="grid-02"><input class="inTax" type="number" name="totalCityTax" value="<?php if(isset($_POST['totalCityTax'])){echo $_POST['totalCityTax'];}else{echo "0";}  ?>" onFocus="cText(this)" onBlur="sText(this)"> 円</dd>
			</dl><!-- #tax-data -->

			
	
	
		
				<dl id="date-data">
					<dt>引渡日</dt>
					<dd class="grid-03">
					<div>
					<select name="daysPointY" id="year" onChange="setDateForm('year','month','day');">
					<?php if(isset($_POST['daysPointY']) && $_POST['daysPointY'] != ""){	?>
						<option value="<?php echo $_POST['daysPointY']; ?>" selected="selected"><?php echo $_POST['daysPointY']; ?></option>
					<?php }else{ ?>
						<option value="0" selected="selected">---</option>
					<?php } ?>
					
					<?php
					$thisyear = date("Y");
					$end_year = $thisyear+20;
					while( $thisyear <= $end_year ){ 
					$year = $thisyear++;
					?>
					
					<option label="<?php echo $year ?>" value="<?php echo $year ?>"><?php echo $year ?></option> 
					<?php } ?>
				</select>年
				</div>
				<div>
					<select name="daysPointM" id="month" onChange="setDateForm('year','month','day');">
				<?php
						if(isset($_POST['daysPointM']) && $_POST['daysPointM'] != ""){	?>
						<option value="<?php echo $_POST['daysPointM']; ?>" selected="selected"><?php echo $_POST['daysPointM']; ?></option>
					<?php }else{ ?>
						<option value="0" selected="selected">---</option>
					<?php } ?> 
				  <option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>月
				</div>
				<div>
					<select name="daysPointD" id="day" >
					<?php
						if(isset($_POST['daysPointD']) && $_POST['daysPointD'] != ""){	?>
						<option value="<?php echo $_POST['daysPointD']; ?>" selected="selected"><?php echo $_POST['daysPointD']; ?></option>
					<?php }else{ ?>
						<option value="0" selected="selected">---</option>
					<?php } ?>
				 	<option value="1">1</option>
					<option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				  <option value="6">6</option>
				  <option value="7">7</option>
				  <option value="8">8</option>
				  <option value="9">9</option>
				  <option value="10">10</option>
				  <option value="11">11</option>
				  <option value="12">12</option>
				  <option value="13">13</option>
				  <option value="14">14</option>
				  <option value="15">15</option>
				  <option value="16">16</option>
				  <option value="17">17</option>
				  <option value="18">18</option>
				  <option value="19">19</option>
				  <option value="20">20</option>
				  <option value="21">21</option>
				  <option value="22">22</option>
				  <option value="23">23</option>
				  <option value="24">24</option>
				  <option value="25">25</option>
				  <option value="26">26</option>
				  <option value="27">27</option>
				  <option value="28">28</option>
				  <option value="29">29</option>
				  <option value="30">30</option>
				  <option value="31">31</option>
				</select>日
				</div>
					</dd>
					<dt>起算日</dt>
					<dd>
						<label><input type="radio" name="kisanbi" value="b,4,1,3,31" required <?php if(isset($_POST['kisanbi']) && $_POST['kisanbi'] == "b,4,1,3,31"){echo "checked";}else if( empty($_POST['kisanbi']) ){echo "checked";}?> >4月1日</label>
						<label><input type="radio" name="kisanbi" value="a,1,1,12,31"  required <?php if(isset($_POST['kisanbi']) && $_POST['kisanbi'] == "a,1,1,12,31"){echo "checked";}?> >1月1日</label>
					</dd>
					<dt>但し書き</dt>
					<dd>
					 ▼但し書きの種類を下記からお選び下さい。<br>
						<label><input type="radio" name="tadashigaki" value="tadashigaki_a" required <?php if( isset($_POST['tadashigaki']) && $_POST['tadashigaki'] == "tadashigaki_a"){echo "checked";}else if( empty($_POST['tadashigaki']) ){echo "checked";}?> >但し、別紙不動産売買契約書に基づく固定資産税・都市計画税の精算金として</label>
						<label class="grid-04">
							<input type="radio" name="tadashigaki" value="tadashigaki_b"  required <?php if( isset($_POST['tadashigaki']) && $_POST['tadashigaki'] == "tadashigaki_b"){echo "checked";}?> >但し、
							<span>
							<input id="tadashigaki_year" type="text" name="tadashigaki_year" value="<?php if(isset($_POST['tadashigaki_year'])){echo $_POST['tadashigaki_year'];}else{echo "";} ?>" onFocus="cText(this)" onBlur="sText(this)">年
							</span>
							<span>
							<input id="tadashigaki_moth" type="text" name="tadashigaki_moth" value="<?php if(isset($_POST['tadashigaki_moth'])){echo $_POST['tadashigaki_moth'];}else{echo "";} ?>" onFocus="cText(this)" onBlur="sText(this)">月
							</span>
							<span>
							<input id="tadashigaki_day" type="text" name="tadashigaki_day" value="<?php if(isset($_POST['tadashigaki_day'])){echo $_POST['tadashigaki_day'];}else{echo "";} ?>" onFocus="cText(this)" onBlur="sText(this)">
							</span>日付不動産売買契約に基づく精算金として
						</label>
						<label id="freeSpace">
							<input type="radio" name="tadashigaki" value="tadashigaki_c"  required <?php if( isset($_POST['tadashigaki']) && $_POST['tadashigaki'] == "tadashigaki_c"){echo "checked";}?> >フリースペース（下記に入力して下さい）
							<textarea id="tadashigaki_free" name="tadashigaki_free" rows="3" onFocus="cText(this)" onBlur="sText(this)"><?php if(isset($_POST['tadashigaki_free'])){echo $_POST['tadashigaki_free'];}else{echo "";} ?></textarea>
						</label>
					</dd>
				</dl><!-- #date-data -->
				<section>
					<h4>■ご利用上の注意事項</h4>
					<p>本計算フォームは固定資産税及び都市計画税について、引渡日の前日までを売主、引渡日以後を買主の負担として日割精算するためのものです。 計算結果についてはあくまでも目安であり、正確性・完全性を保証するものではありません。利用者の責任でご使用いただきますようお願いします。</p>
				</section>	
				<button type="submit" value="計算結果を見る">計算結果を見る</button>

	
		</section><!-- #calculate-input -->
	<!-- ▲入力フォームここまで -->




	


	
	
	<!-- ▼計算結果出力ここから -->
	<section id="calculate-output" class="com-anchor-01">
	
		<h3>計算結果</h3>

		<section id="article-result">
			<h4>物件</h4>
			<dl>
				<dt>物件名</dt>
				<dd><?php echo nl2br($articleName) ; ?></dd>
			</dl>
		</section><!-- #article-result -->


		<section id="tax-result">
			<h4>固定資産税・都市計画税</h4>
			<dl>
				<dt>固定資産税</dt>
				<dd><?php echo $totalTaxF_number ; ?>円</dd>

				<dt>都市計画税</dt>
				<dd><?php echo $totalCityTaxF_number ; ?>円</dd>

				<dt>合計</dt>
				<dd class="goukei_b">
					<?php echo $totalizerTaxF_number ; ?>円
				</dd>
			</dl>
		</section><!-- #tax-result -->


		<section id="date-result">
			<h4>日数負担分</h4>
			<dl>
				<dt>引渡日</dt>
				<dd>
					<?php echo $daysPointY ; ?>年 <?php echo $daysPointM ; ?>月 <?php echo $daysPointD ; ?>日
				</dd>

				<dt>売主負担分日数</dt>
				<dd><?php echo $daysBefore; ?>日分 ／ 期間：<?php echo $daysTermUri ; ?></dd>

				<dt>買主負担分日数</dt>
				<dd><?php echo $daysAfter ; ?>日分 ／ 期間：<?php echo $daysTermKai ; ?></dd>
			</dl>
		</section><!-- #date-result -->
			

		<section id="futan-result">
			<h4>計算式及び税金の負担額</h4>
			<dl>
				<dt>売主</dt>
				<dd>
					<?php echo $totalizerTaxF_number ; ?>円 × <?php echo $daysBefore ; ?>日 ／ <?php echo $daysYear ; ?>日 = <?php echo $chargeVender_gokei_formatC ; ?>円
				</dd>

				<dt>買主</dt>
				<dd>
					<?php echo $totalizerTaxF_number ; ?>円 × <?php echo $daysAfter ; ?>日 ／ <?php echo $daysYear ; ?>日 = <?php echo $chargeBuyer_gokei_formatC ; ?>円
				</dd>
			</dl>
		</section><!-- #futan-result -->



		
<!--
		<div id="sampleresult">
			<h4>■確認用データ出力（実際には非表示）</h4>
			<dl>
				<dt>一年間の日数</dt>
				<dd><?php echo $daysYear; ?>日</dd>
			</dl>
			
			<dl>
				<dt>起算日タイプ</dt>
				<dd><?php echo $kisanbiType2 ; ?></dd>
			</dl>
			
			<dl>
				<dt>起算日開始日</dt>
				<dd>
					<?php echo $daysStartY ; ?>年
					<?php echo $daysStartM ; ?>月
					<?php echo $daysStartD ; ?>日
				</dd>
			</dl>
			
			<dl>
				<dt>起算日終了日</dt>
				<dd>
					<?php echo $daysEndY ; ?>年
					<?php echo $daysEndM ; ?>月
					<?php echo $daysEndD ; ?>日
				</dd>
			</dl>
		</div>
--><!-- #sampleresult -->



	</section><!-- #calculate-output -->
	<!-- ▲計算結果出力ここまで -->



	<button type="submit" class="skin" value="精算書を作成" onclick="goServletB();" >精算書を作成</button>
</form>
</section>
