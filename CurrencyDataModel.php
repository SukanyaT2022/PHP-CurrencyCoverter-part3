<?php

class CurrencyDataModel
{

  
  private static $SOURCE_CURRENCY = array("CAD","EUR", "GBP", "USD");
  
  private static $DES_CURRENCY = array("CAD","EUR", "GBP", "USD");

//line17 is array cad to cad and cad to eur and so on
//line 18 is array eur to cs eur to eur and so on
//line 19 is array GBP to cad and GBP to eur
//line 20 is array usd to cad and usd to ur and so on
//below - 2 dimension array
  private static $CONVERSION_RATE = array( 
array(1, 0.69, 0.61, 0.75),//row no 0 - 1 colume 0 and 0.69 is column 1 and 0.61 is column 2
array(1.44, 1, 0.89, 1.08),//row no 1
array(1.63, 1.13, 1, 1.22),//row no2
array(1.34, 0.9, 0.82, 1),//row no 3
  );

  public static function getSourceCurrency()
  {
    return self::$SOURCE_CURRENCY;
  }
  
  public static function getDesCurrency()
  {
    return self::$DES_CURRENCY;
  }

  public static function getConvertAmount( $amount, $source, $des )
  {
$position1 = 0;
$position2 = 0;


    for($i=0; $i<count(self::$SOURCE_CURRENCY); $i++){
if (self::$SOURCE_CURRENCY[$i]==$source){
$position1 = $i;
break;
}
    }

    for($i=0; $i<count(self::$DES_CURRENCY); $i++){
      if (self::$DES_CURRENCY[$i]==$des){
      $position2 = $i;
      break;
      }
          }


$rate = self::$CONVERSION_RATE[$position1][$position2];
return $amount * $rate;





  }
}  
  
?>
