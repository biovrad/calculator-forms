<form method="post"  name="forma">
  <p>Обхват груди (см):
    <input type="text" name="v_grudi" size="2" value="85" onfocus="if (this.value == '85') {this.value = '';}" onblur="if (this.value == '') {this.value = '85';}">                            
      Обхват талии (см):
    <input type="text" name="v_talii" size="2" value="65" onfocus="if (this.value == '65') {this.value = '';}" onblur="if (this.value == '') {this.value = '65';}">
      Обхват бедер (см):
    <input type="text" name="v_beder" size="2" value="90" onfocus="if (this.value == '90') {this.value = '';}" onblur="if (this.value == '') {this.value = '90';}">         
    Ваш рост (см):
    <input type="text" name="rost" size="3" value="160" onfocus="if (this.value == '160') {this.value = '';}" onblur="if (this.value == '') {this.value = '160';}">
  </p>
  <table class="tab-kalk">
    <tr>
      <td>
			<p><strong>материал купальник</strong><br />
			  <input type="radio" checked="checked" name="mat_kupal" value="0">лайкра<br />
			  <input type="radio" name="mat_kupal" value="0">трикотаж<br />
			  <input type="radio" name="mat_kupal" value="50">гепюр<br />
			  <input type="radio" name="mat_kupal" value="100">сетка<br />	</p>					   
		</td>
		<td> 								
			<p><strong>материал юбка</strong><br />
			  <input type="radio" name="mat_jbka" value="100">шифон<br />
			  <input type="radio" checked="checked" name="mat_jbka" value="0">атлас<br />
			  <input type="radio" name="mat_jbka" value="0">креп сатин<br />	</p>		   		           
		</td>
		<td> 				
			<p><strong>спина</strong><br />
			  <input type="radio" checked="checked" name="spina" value="0">открытая<br />
			  <input type="radio" name="spina" value="20">закрытая<br /></p>		   		             	
		</td>
		<td>	
			<p><strong>рукава</strong><br />
				<input type="radio" name="rukava_st" value="20">длинные<br />
				<input type="radio" checked="checked" name="rukava_st" value="15">средние<br />
				<input type="radio" name="rukava_st" value="15">перчатки<br />	
				<input type="radio" name="rukava_st" value="0">без перчаток<br />	</p>				   
		</td>
	</tr>
	<tr>
		<td>							 
			<p><strong>камни</strong><br />
				клеевые (в пачке 1144шт)<br />
				кол-во штук -<input type="text" name="kamni_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"><br /> <br />
				пришивные шт -<input type="text" name="kamni_prichivnie_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"></p>	
		</td>
		<td><p><strong>шлейф</strong><br />					   				   	
				<input type="radio" name="shleif" value="10">на две руки<br />
				<input type="radio" checked="checked" name="shleif" value="0">на одну руку<br />
		</td>
		<td>								
			<p><strong>аппликации из кружев</strong><br />
				<input type="radio" checked="checked" name="aplikatsii_st" value="0">нет<br />
				<input type="radio" name="aplikatsii_st" value="50">юбка<br />
				<input type="radio" name="aplikatsii_st" value="30">лиф<br />
				<input type="radio" name="aplikatsii_st" value="40">купальник<br />
				<input type="radio" name="aplikatsii_st" value="150">все платье<br /></p>		   
		</td>
		<td>						
	   	<p>
	   	<strong>паетки</strong> шт:<input type="text" name="paetki_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"><br /><br />							   
			<strong>стеклярус</strong> шт:<input type="text" name="steklarus_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"><br /><br />				
			<strong>жемчуг</strong> шт:<input type="text" name="lemchug_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"></p>	
		</td>
	</tr>
</table> 
  <br>                    	
		            <p>Ваш e-mail:<input type="text" name="email" ></p>
		            <p><input type="submit" name="buttom" value="посчитать стоимость"></p>            				
</form> 

<?php 
header('Content-type: text/html; charset=utf-8');
if ( isset($_POST['ok'])) {
  extract($_POST);
  $check = array(
    'v_grudi' => 'Обхват груди',
    'v_talii' => 'Обхват талии',
    'v_beder' => 'Обхват бедер',
    'rost'    => 'рост',
    
    'kamni_kol' => 'количество камней',
    'kamni_prichivnie_kol' => 'пришивные камни',
    'paetki_kol' => 'пайетки',
    'steklarus_kol' => 'стеклярус',
    'gemchug_kol' => 'жемчуг',
    'aplikatsii_st' => 'аппликации'   
  );
  $suma_latina = 0;
  $mail_not = FALSE;
  $error = array();

  foreach ( $check as $rule => $msg ) {
    if(!is_numeric($$rule)) {
      $error[] = "введите только числовое значение - {$msg}";
    }
  }
  if( !preg_match("~^([a-z0-9_\-\.])+@([a-z0-9_\-\.])+\.([a-z0-9])+$~i", $email) ) {
    $mail_not = "<p class='mail_eror'>Введите правильный E-maill</p>\n";
  }
  
$otnoshenie = $v_beder - $v_grudi;
		
switch ($otnoshenie) {
	case $otnoshenie <= 4.9: 
				$otnoshenie = 20;
				break;		
	case $otnoshenie >= 5 and $otnoshenie <= 10: 
				$otnoshenie = 0;
				break;
	case $otnoshenie >= 10.1 and $otnoshenie <= 15: 
				$otnoshenie = 20;
				break;			
	case $otnoshenie >= 15.1: 
				$otnoshenie = 50;
				break;					
					}

switch ($v_grudi ) {
	case $v_grudi <= 44.9 : 
				$v_grudi_eror = "недопустимое значение - объем груди<br>";
				break;
	case $v_grudi >= 122.1 : 
				$v_grudi_eror = "недопустимое значение - объем груди<br>";
				break;
	case $v_grudi >= 45 and $v_grudi <= 92: 
				$v_grudi = 0;
				break;
	case $v_grudi >= 92.1 and $v_grudi <= 110: 
				$v_grudi = 50;
				break;
	case $v_grudi >= 110.1 and $v_grudi <= 122: 
				$v_grudi = 100;
				break;
				}	

switch ($v_talii ) {
	case $v_talii <= 41.9: 
				$v_talii_eror = "недопустимое значение - объем талии<br>";
				break;
	case $v_talii > 104.1: 
				$v_talii_eror = "недопустимое значение - объем талии<br>";
				break;
	case $v_talii >= 42 and $v_talii <= 75: 
				$v_talii = 0;
				break;
	case $v_talii >= 75.1 and $v_talii <= 92.9: 
				$v_talii = 50;
				break;
	case $v_talii >= 93 and $v_talii <= 104: 
				$v_talii = 100;
				break;
				}

switch ($v_beder ) {
	case $v_beder <= 45.9 : 
				$v_beder_eror =  "недопустимое значение - объем бедер<br>";
				break;
	case $v_beder >= 128.1 : 
				$v_beder_eror =  "недопустимое значение - объем бедер<br>";
				break;
	case $v_beder >= 46 and $v_beder <= 98.9: 
				$v_beder = 0;
				break;
	case $v_beder >= 99 and $v_beder <= 116.9: 
				$v_beder = 50;
				break;
	case $v_beder >= 117 and $v_beder <= 128: 
				$v_beder = 100;
				break;
				}	

switch ($rost ) {
	case $rost <= 55.9: 
				$rost_eror = "недопустимое значение - рост<br>";
				break;
	case $rost >= 205: 
				$rost_eror = "недопустимое значение - рост<br>";
				break;
	case $rost >= 56 and $rost <= 168: 
				$rost = 0;
				break;
	case $rost >= 168.1 and $rost <= 204.9: 
				$rost = 100;
				break;
				}		
				
$suma_standart = 500 + $mat_kupal + $mat_jbka + $spina + $rukava_st + $shleif + 
$aplikatsii_st + $kamni_kol * 0.09 + $kamni_prichivnie_kol * 5 + 
$paetki_kol * 0.5 + $steklarus_kol * 0.5 + $lemchug_kol * 0.5 + 
$v_grudi + $v_talii + $v_beder + $rost + $otnoshenie;

$suma_standart = "итого стоимость работы - $suma_standart грн.<br>";
  
  $v_grudi = $_POST['v_grudi'];
  $v_talii = $_POST['v_talii'];
  $v_beder = $_POST['v_beder'];
  $rost = $_POST['rost'];

  $v_grudi = "Обхват груди - $v_grudi";
  $v_talii = "Обхват талии - $v_talii";
  $v_beder = "Обхват бедер - $v_beder";
  $rost = "рост - $rost";
  
    if ( count($error) ) {
    echo '<p class="suma">' . implode('<br />', $error) . '</p>';
  }
  else {
    echo "<p class='suma_st'> $v_grudi,   $v_talii,  $v_beder,   $rost</p>";
    echo "<p class='suma_final'> $suma_standart </p>";
    if ( $mail_not ) {
      echo '<p class="suma">' . $mail_not . '</p>';
    }
    else {
      $adresat = "vrad@bk.ru";
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";  

mail(
	   "$adresat", "Lesino, расчет стоимости-стандарт",
	   "<br />Адрес: ".$_POST['email'].
	   "<br />обем груди: ".$_POST['v_grudi'].
	  	"<br />обем талии: ".$_POST['v_talii'].
	   "<br />обем бедер: ".$_POST['v_beder'].
	   "<br />рост: ".$_POST['rost'].
	   "<br /><br />".
	   "<br />"."база - 500 ".
	   "<br />материал купальник(лайкра-0 трекотаж-0 гепюр-50 сетка-100) : ".$_POST['mat_kupal'].
	   "<br />материал юбка (шифон-100 атлас-0 креп сатин-0) : ".$_POST['mat_jbka'].
	   "<br />спина (открытая- 0 закрытая 20) : ".$_POST['spina'].
	   "<br />рукава (длинные-20 средние-15 перчатки-15 без перчаток-0) : ".$_POST['rukava_st'].
	   "<br />шлейф (на две руки-10 на одну руку-0) : ".$_POST['shleif'].	   
	   "<br />аппликации из кружев (нет-0 юбка-50 лиф-30 купальник-40 все платье-150) : ".$_POST['aplikatsii_st'].	   
	   "<br />камни количество (1шт-0,09гр) : ".$_POST['kamni_kol'].
	   "<br />камни пришивные (1шт-0,5гр) : ".$_POST['kamni_prichivnie_kol'].
	   "<br />стеклярусы (1шт-0,5гр) : ".$_POST['steklarus_kol'].
	   "<br />жемчуг (1шт-0,5гр) : ".$_POST['lemchug_kol'].
	   "<br />паетки (1шт-0,5гр) : ".$_POST['paetki_kol'].
	   "<br />разница бедра-груди : ".$otnoshenie.
	   "<br />итого: ".$suma_standart.
	   "$headers"	
      );
    }
  }
}
?>