<!DOCTYPE html>

<?php
  require_once( 'CurrencyDataModel.php' );
  
  $sourceCurrency = CurrencyDataModel::getSourceCurrency();
  $desCurrency = CurrencyDataModel::getDesCurrency();
  
  $amount = $_POST[ 'source_amount' ];
  
  if( is_numeric( $prncpl ) )
  {
    $source = $_POST[ 'source_currency' ];
    $dest = $_POST[ 'dest_currency' ];
  
    $convertAmount = CurrencyDataModel::getConvertAmount( $amount, $source, $dest );
  }
  else
  {
    $convertAmount = ''         ;
    $amount     = ''         ;
    $source     =  $sourceCurrency[ 0 ];
    $dest      =   $desCurrency[ 0 ];
  }
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>F/X Calculator</title>
  </head>

  <body>
    <h1 align="center">Money Banks F/X Calculator</h1>
    <hr/><br/>
    <form name="fxCalc" action="fxCalc.php" method="post">

      <center>
        
        <input type="text" name="source_amount" value="<?php echo  $amount ?>" />
        
        <select name="source_currency">
        <?php
          foreach( $sourceCurrency as $r )
          {
        ?>
            <option value="<?php echo $r ?>"
                  
            <?php
               if( $r == $source )
               {
            ?>   
                selected
             <?php
               }
             ?>

            ><?php echo "$r %" ?></option>
        <?php
          }
        ?>
        </select>

        <select name="dest_currency">
        <?php
          foreach( $desCurrency as $t )
          {
        ?>
            <option value="<?php echo $t ?>"

            <?php
               if( $t == $dest )
               {
            ?>
                selected
             <?php
               }
             ?>

            ><?php echo "$t currency" ?></option>

        <?php
          }
        ?>
        </select>

        <input type="text" name="dest_amount" disabled="disabled" value="<?php echo   $convertAmount  ?>"/>

        <br/><br/>

        <input type="submit" value="Calculate"/>
        <input type="reset"/>

      </center>
    </form>

  </body>
</html>