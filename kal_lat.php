<form method="post"  name="forma">
  <p>объем груди (см):
    <input type="text" name="v_grudi" size="2" value="85" onfocus="if (this.value == '85') {this.value = '';}" onblur="if (this.value == '') {this.value = '85';}">                            
      объем талии (см):
    <input type="text" name="v_talii" size="2" value="65" onfocus="if (this.value == '65') {this.value = '';}" onblur="if (this.value == '') {this.value = '65';}">
      объем бедер (см):
    <input type="text" name="v_beder" size="2" value="90" onfocus="if (this.value == '90') {this.value = '';}" onblur="if (this.value == '') {this.value = '90';}">         
    ваш рост (см):
    <input type="text" name="rost" size="3" value="160" onfocus="if (this.value == '160') {this.value = '';}" onblur="if (this.value == '') {this.value = '160';}">
  </p>
  <table>
    <tr>
      <td valign="bottom">
        <p>материал<br />
         <input type="radio" checked="checked" name="mat" value="0">кресан<br />
         <input type="radio" name="mat" value="0">трикотаж<br />
         <input type="radio" name="mat" value="50">гепюр<br />
         <input type="radio" name="mat" value="100">сетка<br />
        </p>
      </td>
      <td>
        <p>длинна<br />
        <input type="radio" checked="checked" name="dlinna" value="200">длинное <br />
        <input type="radio" name="dlinna" value="100">средние <br />
        <input type="radio" name="dlinna" value="0">короткое<br />
       </p>
      </td>
      <td valign="top">
        <p>спина<br />
          <input type="radio" checked="checked" name="spina" value="0">открытая<br />
          <input type="radio" name="spina" value="20">закрытая<br />
        </p>
      </td>
      <td>
        <p>рукава<br />
          <input type="radio" checked="checked" name="rukava" value="20">длинные<br />
          <input type="radio" name="rukava" value="15">средние<br />
          <input type="radio" name="rukava" value="0">нет рукавов<br />
        </p>
      </td>
    </tr>
    <tr>
      <td>
        <p>камни<br />
        клеевые (в пачке 1144шт)<br />
        кол-во штук -<input type="text" name="kamni_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"><br /> <br />
        пришивные шт -<input type="text" name="kamni_prichivnie_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"></p>
      </td>
      <td>
        <p>веревки<br />
          <input type="radio" checked="checked" name="verevki" value="0">нет<br />
          <input type="radio" name="verevki" value="150">юбка<br />
          <input type="radio" name="verevki" value="150">верх<br />
          <input type="radio" name="verevki" value="300">все платье<br />
        </p>
      </td>
      <td>  
        <p>аппликации из кружев<br />
          <input type="radio" checked="checked" name="aplikatsii" value="0">нет<br />
          <input type="radio" name="aplikatsii" value="50">юбка <br />
          <input type="radio" name="aplikatsii" value="30">лиф<br />
          <input type="radio" name="aplikatsii" value="40">купальник<br />
          <input type="radio" name="aplikatsii" value="50">все платье<br />
        </p>
      </td>
      <td>
        <p>
        паетки шт:<input type="text" name="paetki_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"><br /><br />                 
        стеклярус шт:<input type="text" name="steklarus_kol" size="3" value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"><br /><br />        
        жемчуг шт:<input type="text" name="gemchug_kol" size="3"value="0" onfocus="if (this.value == '0') {this.value = '';}" onblur="if (this.value == '') {this.value = '0';}"></p>
       </td>
    </tr>
  </table>
  <p>Ваш e-mail:<input type="text" name="email" ></p>
  <p><input type="submit" name="ok" value="посчитать стоимость"></p>
</form>

<?php
header('Content-type: text/html; charset=utf-8');
if ( isset($_POST['ok'])) {
  extract($_POST);
  $check = array(
    'v_grudi' => 'объем груди',
    'v_talii' => 'объем талии',
    'v_beder' => 'объем бедер',
    'rost'    => 'рост',
    'kamni_kol' => 'количество камней',
    'kamni_prichivnie_kol' => 'пришивные камни',
    'paetki_kol' => 'паетки',
    'steklarus_kol' => 'стеклярус',
    'gemchug_kol' => 'жемчуг'
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
      $error[] = "недопустимое значение - объем груди<br>";
      break;
    case $v_grudi >= 122.1 :
      $error[] = "недопустимое значение - объем груди<br>";
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
      $error[] = "недопустимое значение - объем талии<br>";
      break;
    case $v_talii > 104.1:
      $error[] = "недопустимое значение - объем талии<br>";
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
      $error[] =  "недопустимое значение - объем бедер<br>";
      break;
    case $v_beder >= 128.1 :
      $error[] =  "недопустимое значение - объем бедер<br>";
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
      $error[] = "недопустимое значение - рост<br>";
      break;
    case $rost >= 205:
      $error[] = "недопустимое значение - рост<br>";
      break;
    case $rost >= 56 and $rost <= 168: 
      $rost = 0;
      break;
    case $rost >= 168.1 and $rost <= 204.9: 
      $rost = 100;
      break;
  }
      
  $suma_latina = 450 + $mat + $dlinna + $spina + $rukava + $verevki + 
  $aplikatsii + $kamni_kol * 0.09 + $kamni_prichivnie_kol * 5 + 
  $paetki_kol * 0.5 + $steklarus_kol * 0.5 + $gemchug_kol * 0.5 +
  $v_grudi + $v_talii + $v_beder + $rost + $otnoshenie;
  
  $suma_latina = "итого стоимость работы - $suma_latina грн.<br>";
  
  $v_grudi = $_POST['v_grudi'];
  $v_talii = $_POST['v_talii'];
  $v_beder = $_POST['v_beder'];
  $rost = $_POST['rost'];

  $v_grudi = "объем груди - $v_grudi";
  $v_talii = "объем талии - $v_talii";
  $v_beder = "объем бедер - $v_beder";
  $rost = "рост - $rost";

  if ( count($error) ) {
    echo '<p class="suma">' . implode('<br />', $error) . '</p>';
  }
  else {
    echo "<p class='suma_l'> $v_grudi,   $v_talii,  $v_beder,   $rost</p>";
    echo "<p class='suma_final'> $suma_latina </p>";
    if ( $mail_not ) {
      echo '<p class="suma">' . $mail_not . '</p>';
    }
    else {
      $adresat = "lesino@bk.ru";
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=WINDOWS-1251' . "\r\n";

      mail(
       "$adresat", "Lesino, расчет стоимости-латина",
       "\nАдрес: ".$_POST['email'].
       "\nобем груди: ".$_POST['v_grudi'].
       "\nобем талии: ".$_POST['v_talii'].
       "\nобем бедер: ".$_POST['v_beder'].
       "\nрост: ".$_POST['rost'].
       "\n\n".
       "\n"."база - 450 ".
       "\nматериал (кресан-0 трекотаж-0 гепюр-50 сетка-100) : ".$_POST['mat'].
       "\nдлинна (длинное-200 среднее-100 короткое-0) : ".$_POST['dlinna'].
       "\nспина (открытая- 0 закрытая 20) : ".$_POST['spina'].
       "\nрукава (длинные-20 средние-10 нет рукавов-0) : ".$_POST['rukava'].
       "\nверевки (нет-0 юбка-150 верх-150 все платье-300) : ".$_POST['verevki'].
       "\nапликации (нет-0 юбка-50 лиф-30 купальник-40 все платье-50) : ".$_POST['aplikatsii'].
       "\nкамни количество (1шт-0,09гр) : ".$_POST['kamni_kol'].
       "\nкамни пришивные (1шт-0,5гр) : ".$_POST['kamni_prichivnie_kol'].
       "\nстеклярусы (1шт-0,5гр) : ".$_POST['steklarus_kol'].
       "\nжемчуг (1шт-0,5гр) : ".$_POST['gemchug_kol'].
       "\nпаетки (1шт-0,5гр) : ".$_POST['paetki_kol'].
       "\разница бедра-грудб : ".$otnoshenie.
       "\nитого: ".$suma_latina.
       "\n$headers"
      );
    }
  }
}
?>