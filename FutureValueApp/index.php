<?php

    //set default value of variables for initial page load
    if(!isset($investment)) { $investment = ""; }
    if(!isset($interestRate)) { $interestRate = ""; }
    if(!isset($years)) { $years = ""; }

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Future Value App</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    
    <body>
        <main>
            <h1>Future Value Calculator</h1>
            <?php if(!empty($errorMessege)) { ?>
            <p class="error"><?php print htmlspecialchars($errorMessege); ?></p>
            <?php } ?>
            
            <form action="displayResults.php" method="post">
                
                <div id="data">
                    <label>Investment Amount:</label>
                    <input type="text" name="investment" 
                           value="<?php print htmlspecialchars($investment); ?>">
                    <br>
                    <label>Yearly Interest Rate:</label>
                    <input type="text" name="interestRate"
                           value="<?php print htmlspecialchars($interestRate); ?>">
                    <br>
                    <label>Number of Years:</label>
                    <input type="text" name="years"
                           value="<?php print htmlspecialchars($years); ?>">
                    <br>
                </div>
                
                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Calculate">
                    <br>
                </div>
                
            </form>
        </main>
    </body>
    
</html>