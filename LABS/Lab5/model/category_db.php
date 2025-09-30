<?php
function get_all_categories() {
    global $db;
    $query = "SELECT categoryID, categoryName FROM categories";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $categories;
}

function add_category($name) {
    global $db;
    $query = "INSERT INTO categories (categoryName) VALUES (:name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($id) {
    global $db;
    $query = "DELETE FROM categories WHERE categoryID = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>