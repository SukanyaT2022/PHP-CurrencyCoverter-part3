<!DOCTYPE html>

<?php
  require_once( 'FxDataModel.php' );
  $currencies = FxDataModel::getFxCurrencies();
if (array_key_exists('source_amount', $_POST))
    {
      $amount = $_POST[ 'source_amount' ];
    
      if( is_numeric( $amount ) )
   {
    $source = $_POST[ 'source_currency' ];
    $dest = $_POST[ 'dest_currency' ];
   
   
    $convertAmount = $amount * FxDataModel::getFxRate( $source, $dest );
   }
   else
   {
  $convertAmount = ''         ;
 $amount     = ''         ;
 $source     =  $currencies[ 0 ];
 $dest      =   $currencies[ 0 ];
    }

    }

else
    {
   $convertAmount = ''         ;
  $amount     = ''         ;
  $source     =  $currencies[ 0 ];
  $dest      =   $currencies[ 0 ];
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
        
        
        <select name="source_currency">
        <?php
          foreach( $currencies as $r )
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

            ><?php echo "$r" ?></option>
        <?php
          }
        ?>
        </select>

        <input type="text" name="source_amount" value="<?php echo  $amount ?>" />

        <select name="dest_currency">
        <?php
          foreach( $currencies as $t )
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

            ><?php echo "$t" ?></option>

        <?php
          }
        ?>
        </select>

        <input type="text" name="dest_amount" disabled="disabled" value="<?php echo   $convertAmount  ?>"/>

        <br/><br/>

        <input type="submit" value="Convert"/>
        <input type="reset" value="Reset">

      </center>
    </form>

  </body>
</html> 
