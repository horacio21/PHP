<?php

    //get the data from the form
    $investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_FLOAT);
    $interestRate = filter_input(INPUT_POST, 'interestRate', FILTER_VALIDATE_FLOAT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);
    
    //validate investment
    if ($investment == FALSE){
        $errorMessege = "Investment must be a valid number.";
    } elseif ($investment <= 0) {
        $errorMessege = 'Investment must be grader than zero.';
    }

?>