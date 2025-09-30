<?php
// Kết nối cơ sở dữ liệu và lấy danh sách danh mục
require_once('../model/database.php');
require_once('../model/category_db.php');
$categories = get_categories();
?>
    <nav>
        <ul>
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>
