
<?php
        require_once 'includes/header.php';
    ?>

    <div class="banner">
        <img src="assets/images/banner1.jpg" alt="">
    </div>

    <div class="categories">
    <h2>Kategoritë e instrumenteve</h2>
    <p>Instrumentet për të cilat ne ofrojmë mësime profesionale</p>
    <div class="boxes">
        <?php
        require_once 'classes/Produktet.php';

        $data = new Produktet();
        $categories = $data->getCategories();

        if ($categories) {
            foreach ($categories as $category) {
                ?>
                <div class="box">
                    <a href="category-details.php?id=<?php echo $category['id'];?>">
                        <img src="<?php echo $category['image']; ?>" alt="">
                        <h3><?php echo $category['name']; ?></h3>
                        <p><?php echo $category['content']; ?></p>
                    </a>
                </div>
                <?php
            }
        } else {
            echo "Error fetching data.";
        }
        ?>
    </div>
</div>


    <div class="shirit">
        <img src="assets/images/shirit.jpg" alt="">
    </div>

    <div class="comment_container">

        <h2>Virtuozët muzikorë të përzgjedhur</h2>
        <br>
        <p>"Suksesi i akademisë sonë shprehet përmes arritjeve të studentëve tanë, pa nevojë për fjalë të tepërta."</p>
        <div class="slider">
            <div class="box">
                <img src="assets/images/besarta.jpg" alt="">
                <div class="content">
                    <h3>Besarta Fisteku</h3>
                    <br>
                    <p>"Besarta Fisteku, virtuozja e talentuar e violines, 
                        shndërrohet në një mjeshtre të muzikës me secilin tingull që shpërndan."</p>
                </div>
            </div>
            <div class="box">
                <img src="assets/images/Sinera.jpg" alt="">
                <div class="content">
                    <h3>Sinera Qerimi</h3>
                    <br>
                    <p>"Në botën e akordëve dhe tingujve, Sinera Qerimi lë një ndikim të mprehtë, 
                        si një studente e shkëlqyeshme e kitares që interpretim pas interpretimi, bën të ndihet magjia e saj."</p>
                </div>
            </div>
            <div class="box">
                <img src="assets/images/Blerant Aliu.jpg" alt="">
                <div class="content">
                    <h3>Blerant Aliu</h3>
                    <br>
                    <p>"Për Blerant Aliun, çdo tast i pianos është një rrugë 
                        drejt shprehjes së thellë artistike dhe interpretimit të mrekullueshëm."</p>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once 'includes/footer.php';
    ?>