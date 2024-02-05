<?php
    require_once 'includes/header.php';

    require_once '../classes/Produktet.php';

    $data = new Produktet();
    $categories  = $data->getCategories();
?>

<a href="add-category.php" class='btn_submit' style='margin:-15px;'>Add +</a>
<br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
    
    if ($categories) {
        foreach ($categories as $category) {
            ?>
    <tr>
      <th scope="row"><?php echo $category['id'];?></th>
      <td><img src="../<?php echo $category['image'];?>" alt="" width='80px' height='50px'></td>
      <td><?php echo $category['name'];?></td>
      <td></td>
      <td></td>
      <td><a href="update-category.php?id=<?php echo $category['id'];?>">Update</a></td>
      <td><a href="delete-category.php?id=<?php echo $category['id'];?>">Delete</a></td>
    </tr>
    <?php
            }
        } else {
            echo "Error fetching data.";
        }
        ?>

  </tbody>
</table>

<?php
    require_once 'includes/footer.php';
?>