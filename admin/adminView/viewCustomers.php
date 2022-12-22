<div>
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">Faculty</th>
        <th class="text-center">Semester</th>
        <th>Profile Photo</th>
      </tr>
    </thead>
    <?php
    include_once "../../connection.php";
    $sql = "SELECT * from users where user_type='user'";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

    ?>
        <tr>
          <td><?= $row['id']?></td>
          <td><?= $row["name"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["faculty"] ?></td>
          <td><?= $row["semester"] ?></td>
          <td><img height='100px' src='../profile-uploads/<?= $row["photo"] ?>'></td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>