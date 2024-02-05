<?php
    require_once 'includes/header.php';

    require_once '../classes/Contact.php';

    $data = new Contact();
    $contacts  = $data->getComments();
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Email</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php
    
    if ($contacts) {
        foreach ($contacts as $contact) {
            ?>
    <tr>
      <th scope="row"><?php echo $contact['id'];?></th>
      <td><?php echo $contact['name'];?></td>
      <td><?php echo $contact['surname'];?></td>
      <td><?php echo $contact['email'];?></td>
      <td></td>
      <td><a href="contact-details.php?id=<?php echo $contact['id'];?>">Details</a></td>
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