<?php
define("FILENAME","fxCalc.ini");
class FxDataModel
{

  

private static $CURRENCIES = array("CAD","EUR", "GBP", "USD");
private $fxCurrencies;

private $fxRates ;
//midterm
private $file;
private $ini_arr;
private  $csvfile;// = $ini_arr["fx.rates.file"];


public function __construct()
{


$file = FILENAME;
$ini_arr = parse_ini_file($file);
$csvfile = $ini_arr["fx.rates.file"];
$f = fopen($csvfile,"r");


//test
if (($f = fopen($csvfile,"r")) !== FALSE) {

  if (($fxCurrencies = fgetcsv($f)) !== FALSE) {
//  print_r($fxCurrencies);
    $this->fxCurrencies = $fxCurrencies;
      while (($fxRates[] = fgetcsv($f)) !== FALSE) {
          continue;
      }
    
      $this->fxRates = $fxRates;
      // print_r($fxRates);
  }
  fclose($f);
}

}
public  function getFxCurrencies(){
  return $this->fxCurrencies;


}
public  function getIniArray(){
  return $this->ini_arr;
}




  public  function getFxRate( $source, $des )//return conversion rate--source which row--des --which column
  {
$position1 = 0;
$position2 = 0;
$nCurrencies = count($this->fxCurrencies);

    for($i=0; $i<$nCurrencies; $i++){
        if ($this->fxCurrencies[$i]==$source){
        $position1 = $i;
        break;
        }
            }

    for($i=0; $i < $nCurrencies; $i++){
      if ($this->fxCurrencies[$i]==$des){
      $position2 = $i;
      break;
      }
          }

      // print_r($this->fxRates);

return $this->fxRates[$position1][$position2];


  }

}  
  $obj = new FxDataModel();
  
?>
