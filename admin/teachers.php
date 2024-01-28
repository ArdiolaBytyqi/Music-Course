<?php
    require_once 'includes/header.php';

    require_once '../classes/Users.php';

    $data = new Users();
    $users  = $data->getTeachers();
?>

<a href="add-users.php" class='btn_submit' style='margin:-15px;'>Add +</a>
<br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Phone Nr.</th>
      <th scope="col">Rating</th>
      <th scope="col">Category</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
    
    if ($users) {
        foreach ($users as $user) {
            ?>
    <tr>
      <th scope="row"><?php echo $user['id'];?></th>
      <td><img src="../<?php echo $user['image'];?>" alt="" width='80px' height='50px'></td>
      <td><?php echo $user['username'];?></td>
      <td><?php echo $user['email'];?></td>
      <td><?php echo $user['name'];?></td>
      <td><?php echo $user['surname'];?></td>
      <td><?php echo $user['phone_number'];?></td>
      <td><?php echo $user['rating'];?></td>
      
      <td><?php echo $user['cat_name'];?></td>

      <td><a href="update-teachers.php?id=<?php echo $user['id'];?>">Update</a></td>
      <td><a href="delete-user.php?id=<?php echo $user['id'];?>">Delete</a></td>
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