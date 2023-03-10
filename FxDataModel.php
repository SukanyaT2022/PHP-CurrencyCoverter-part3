<?php
define("FILENAME","fxCalc.ini");
class FxDataModel
{

  /*
  private static $SOURCE_CURRENCY = array("CAD","EUR", "GBP", "USD");
  
  private static $DES_CURRENCY = array("CAD","EUR", "GBP", "USD");
*/

private static $CURRENCIES = array("CAD","EUR", "GBP", "USD");
private $fxCurrencies = array();
//line17 is array cad to cad and cad to eur and so on
//line 18 is array eur to cs eur to eur and so on
//line 19 is array GBP to cad and GBP to eur
//line 20 is array usd to cad and usd to ur and so on
//below - 2 dimension array-conversion_rate
  /*private static $CONVERSION_RATE = array( 
array(1.0, 0.624514066, 0.588714763, 0.810307 ),//row no 0 - 1 colume 0 and 0.69 is column 1 and 0.61 is column 2
array(1.601244959, 1.0, 0.942676548, 1.2975),//row no 1
array(1.698615463, 1.060809248, 1.0, 1.3764),//row no2
array(1.234100162, 0.772200772, 0.726532984, 1.0),//row no 3
  );*/
private $fxRates = array();
//midterm
private $file;
private $ini_arr;
private  $csvfile;// = $ini_arr["fx.rates.file"];
public function hello()
{
  echo "hello";
}

public function __construct()
{
 // echo "Hello";
$file = FILENAME;
$ini_arr = parse_ini_file($file);
$csvfile = $ini_arr["fx.rates.file"];
$f = fopen($csvfile,"r");


$line = fgetcsv($f);
//echo "Bye";
for($i=0; $i<count($line);$i++){
array_push($fxCurrencies,$line[$i]);

}
while(!feof($f)){
  $line = fgetcsv($f);
  $arr = array();
  for($i=0; $i<count($line);$i++){
    array_push($arr,$line[$i]);
    
    }
array_push($fxRates,$arr);

}

fclose($f);
}
public  function getFxCurrencies(){
  return self::$fxCurrencies;

}
public  function getIniArray(){
  return self:: $ini_arr;
}

/*
  public static function getSourceCurrency()
  {
    return self::$SOURCE_CURRENCY;
  }
  
  public static function getDesCurrency()
  {
    return self::$DES_CURRENCY;
  }
  */

  // public static function getFxCurrencies()//return currencies array
  // {
  //   return self::$CURRENCIES;
  // }




  public  function getFxRate( $source, $des )//return conversion rate--source which row--des --which column
  {
$position1 = 0;
$position2 = 0;
$nCurrencies = count(self::$fxCurrencies);

    for($i=0; $i<$nCurrencies; $i++){
if (self::$fxCurrencies[$i]==$source){
$position1 = $i;
break;
}
    }

    for($i=0; $i < $nCurrencies; $i++){
      if (self::$fxCurrencies[$i]==$des){
      $position2 = $i;
      break;
      }
          }

/*
$rate = self::$CONVERSION_RATE[$position1][$position2];
return $amount * $rate;
*/
return self::$fxRates[$position1][$position2];





  }

}  
  $obj=new FxDataModel();
echo $obj->hello();
?>
