<?php
class CategoryDB {
    private $db;

    public function __construct() {
        $this->db = Database::getDB();
    }

    public function getCategories() {
        $query = 'SELECT * FROM categories ORDER BY categoryID';
        $statement = $this->db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $categories = [];
        foreach ($rows as $row) {
            $category = new Category();
            $category->setID($row['categoryID']);
            $category->setName($row['categoryName']);
            $categories[] = $category;
        }
        return $categories;
    }

    public function getCategory($category_id) {
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