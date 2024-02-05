<?php
    require_once 'includes/header.php';

    require_once 'classes/Produktet.php';

    $catgerory_id = $_GET['id'];
    $data = new Produktet();
    $category_details = $data->getCategoriesById($catgerory_id);

    if ($category_details) {
        foreach ($category_details as $category) {
?>
    <div class="category_details">
        <h3><?php echo $category['name']; ?></h3>
        <br>
        <p><?php echo $category['content']; ?></p>

        <div class="categories">
    <div class="boxes">
        <?php
        $teachers = $data->getTeachersByCategory($catgerory_id);

        if ($teachers) {
            foreach ($teachers as $teacher) {
                ?>
                <div class="box">
                    <a href="#">
                        <img src="<?php echo $teacher['image']; ?>" alt="">
                        <h3><?php echo $teacher['name'] . ' ' . $teacher['surname']; ?></h3>
                        <h4><?php echo $teacher['email']; ?></h3>
                        <div class="category_info">
                            <p><?php echo $teacher['phone_number']; ?></p>

                            <?php
                                $rating = $teacher['rating'];
                                $roundedRating = round($rating);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $roundedRating) {
                                        echo '⭐';
                                    } else {
                                        echo '☆';
                                    }
                                }
                            ?>
                        </div>
                    </a>
                </div>
                <?php
            }
        } else {
            echo "Nuk eksizton prof per kete kategori";
        }
        ?>
    </div>
</div>
    </div>
                        
                <?php
            }
        } else {
            echo "Error fetching data.";
        }
        ?>


<?php
    require_once 'includes/footer.php';
?>