<?php

    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';
    $username = 'root';
    $password = '';
    
    try {
        $db = new PDO($dsn, $username, $password); // creates PDO object
        echo '<p>You are connected to the database!</p>';
    } catch (PDOException $ex) {
        $errorMessage = $e -> getMessage();
        echo '<p>Error message: $erroMessage </p>';
    }
    
/*
    $query = "SELECT * FROM products";
    $statement = $db->prepare($query);
    $statement->execute();
*/
    /*
    $product_id = 2;
    
    $query = "SELECT productCode, productName, listPrice"
            . "FROM products"
            . "WHERE productID = :product_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    
    $productCode = $product[0];
    $productName = $product[1];
    $productListPrice = $product[2];
    
    $category_id = 2;
    $query = 'SELECT productCode, productName, listPrice'
            . 'FROM products'
            . 'WHERE categoryID = :category_id;';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    
    <?php foreach ($products as $product) { ?>
                <tr>
                    <td><?php print $product['productCode']; ?></td>
                    <td><?php print $product['productName']; ?></td>
                    <td><?php print $product['listPrice']; ?></td>
                </tr>
            <?php } ?>
     * 
     */
?>
