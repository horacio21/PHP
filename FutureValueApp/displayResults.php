<?php

    //get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    $interestRate = filter_input(INPUT_POST, 'interestRate', FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);
    
    //validate investment
    if ($investment === FALSE){
        $errorMessage = "Investment must be a valid number.";
    } elseif ($investment <= 0) {
        $errorMessage = 'Investment must be gerader than zero.';
    }
    //validate interest rate
    else if($interestRate === FALSE){
        $errorMessage = 'Interest Rate must a valid number.';
    }elseif ($interestRate === FALSE) {
        $errorMessage = 'Interest Rate must be greader than zero.';
    }
    //validate years
    elseif ($years === FALSE) {
        $errorMessage = 'Years must be a valid whole number.';
    }elseif ($years <= 0) {
        $errorMessage = 'Years must be greater than zero.';
    } else {
        $errorMessage = '';
    }
    
    //if a error message exist, go to the index page
    if($errorMessage != ''){
        include 'index.php';
        exit();
    }
    
    //calculate the future value
    $futureValue = $investment;
    for($i = 0; $i <= $years; $i++){
        $futureValue += ($futureValue * $interestRate * 0.01);
    }
    
    //apply currency and percent format
    $investmentF = '$'. number_format($investment, 2);
    $yearlyRateF = $interestRate.'%';
    $futureValueF = '$'. number_format($futureValue, 2);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Future Value App</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Future Value App</h1>
            
            <label>Investment Amount:</label>
            <span><?php print $investmentF ?></span><br>
            
            <label>Yearly Interest Rate:</label>
            <span><?php print $yearlyRateF ?></span><br>
            
            <label>Number of Years:</label>
            <span><?php print $years ?></span><br>
            
            <label>Future Value:</label>
            <span><?php print $futureValueF ?></span><br>
        </main>
    </body>
</html>