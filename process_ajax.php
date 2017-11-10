<?php 
  include 'db.php';
  if (isset($_REQUEST['submit_form'])) {
    // echo "The form has been submitted" . $_REQUEST['name'];
    $ins_sql = "INSERT INTO users (u_name, u_email, u_number, u_notes) VALUES ('$_REQUEST[name]', '$_REQUEST[email]', '$_REQUEST[contact_number]', '$_REQUEST[notes]')";
    mysqli_query($conn, $ins_sql);
    echo "
      <script>
        window.location ='index.html';
      </script>
    ";
  }
  if (isset($_REQUEST['del_id'])) {
    $del_sql = "DELETE FROM users WHERE user_id = '$_REQUEST[del_id]'";
    mysqli_query($conn, $del_sql);
  }
  $sql = "SELECT * FROM users";
  $run = mysqli_query($conn, $sql);
  $c = 1;
  while ($rows = mysqli_fetch_assoc($run)) {
      echo "
        <tr>
          <td>$c</td>
          <td>$rows[u_name]</td>
          <td>$rows[u_email]</td>
          <td>$rows[u_number]</td>
          <td>$rows[u_notes]</td>
          <td>
            <button class='btn btn-sucess'>Edit</button>
            <button class='btn btn-danger' onclick=delete_func('$rows[user_id]');>Delete</button>
          </td>
        </tr>
      ";
      $c++;
  }
?>