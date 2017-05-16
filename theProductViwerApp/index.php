<?php

    require_once 'database.php';
    
    //Ger category ID
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if($category_id == NULL || $category_id == FALSE){
        $category_id = 1;
    }
    
    //Get name for selected category
    $queryCategory = 'SELECT * FROM categories WHERE categoryID = :category_id';
    $statement1 = $db->prepare($queryCategory);
    $statement1->bindValue(':category_id', $category_id);
    $statement1->execute();
    $category = $statement1->fetch();
    $categoryName = $category['categoryName'];
    $statement1->closeCursor();
    
    //Get all categories
    $queryAllCategories = 'SELECT * FROM categories'
            . ' ORDER BY categoryID';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $categories = $statement2->fetchAll();
    $statement2->closeCursor();
    
    //Get products for selected category
    $queryProducts = 'SELECT * FROM products'
            . ' WHERE categoryID = :category_id'
            . ' ORDER BY productID';
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue(':category_id', $category_id);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Product List</h1>
            <aside>
                <!-- Display a list of categories -->
                <h2>Categories</h2>
                <nav>
                    <ul>
                        <?php foreach ($categories as $category) : ?>
                        <li>
                            <a href="?category_id=<?php print $category['categoryID']; ?>">
                                <?php print $category['categoryName']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </aside>
            <section>
                <!-- Display a table of products -->
                <h2><?php echo $categoryName; ?></h2>
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th class="rigth">Price</th>
                    </tr>
                    
                    <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php print $product['productCode']; ?></td>
                        <td><?php print $product['productName']; ?></td>
                        <td class="right"><?php print $product['listPrice']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </section>
        </main>
    </body>
</html>