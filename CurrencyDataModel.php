<?php

class CurrencyDataModel
{

  
  private static $SOURCE_CURRENCY = array("CAD","EUR", "GBP", "USD");
  
  private static $DES_CURRENCY = array("CAD","EUR", "GBP", "USD");

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
return 0;
    
  }
}  
  
?>
