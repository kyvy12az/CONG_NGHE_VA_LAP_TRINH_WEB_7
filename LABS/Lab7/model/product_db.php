<?php
class ProductDB {
    private $db;

    public function __construct() {
        $this->db = Database::getDB();
    }

    public function getProductsByCategory($category_id) {
        $category = $this->getCategory($category_id);

        $query = 'SELECT * FROM products
                  WHERE products.categoryID = :category_id
                  ORDER BY productID';
        $statement = $this->db->prepare($query);
        $statement->bindValue(":category_id", $category_id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
    
        $products = [];
        foreach ($rows as $row) {
            $product = new Product();
            $product->setCategory($category);
            $product->setCode($row['productCode']);
            $product->setName($row['productName']);
            $product->setPrice($row['listPrice']);
            $product->setID($row['productID']);
            $products[] = $product;
        }
        return $products;
    }

    public function getProduct($product_id) {
        $query = 'SELECT * FROM products
                  WHERE productID = :product_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(":product_id", $product_id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
        $category = $this->getCategory($row['categoryID']);
        $product = new Product();
        $product->setCategory($category);
        $product->setCode($row['productCode']);
        $product->setName($row['productName']);
        $product->setPrice($row['listPrice']);
        $product->setID($row['productID']);
        return $product;
    }

    public function deleteProduct($product_id) {
        $query = 'DELETE FROM products
                  WHERE productID = :product_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public function addProduct($product) {
        $category_id = $product->getCategory()->getID();
        $code = $product->getCode();
        $name = $product->getName();
        $price = $product->getPrice();

        $query = 'INSERT INTO products
                     (categoryID, productCode, productName, listPrice)
                  VALUES
                     (:category_id, :code, :name, :price)';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    private function getCategory($category_id) {
        $query = 'SELECT * FROM categories WHERE categoryID = :category_id';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();

        $category = new Category();
        $category->setID($row['categoryID']);
        $category->setName($row['categoryName']);
        return $category;
    }
}
?>