<?php 
  include 'db.php';
  if (isset($_REQUEST['submit_form'])) {
    $name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['name']));
    $email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['email']));
    $contact_number = mysqli_real_escape_string($conn, strip_tags($_REQUEST['contact_number']));
    $notes = mysqli_real_escape_string($conn, strip_tags($_REQUEST['notes']));
    $ins_sql = "INSERT INTO users (u_name, u_email, u_number, u_notes) VALUES ('$name', '$email', '$contact_number', '$notes')";
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
  if (isset($_REQUEST['edit_id'])) {
    $edit_name = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_name']));
    $edit_email = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_email']));
    $edit_contact_number = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_contact_number']));
    $edit_notes = mysqli_real_escape_string($conn, strip_tags($_REQUEST['edit_notes']));
    $up_sql = "UPDATE users SET u_name = '$edit_name', u_email = '$edit_email', u_number = '$edit_contact_number', u_notes = '$edit_notes' WHERE user_id = '$_REQUEST[edit_id]'";
    mysqli_query($conn, $up_sql);
  }
  $sql = "SELECT * FROM users";
  $run = mysqli_query($conn, $sql);
  $c = 1;
  while ($rows = mysqli_fetch_assoc($run)) {
      echo "
        <tr>
          <td>$c</td>
          <td>$rows[user_id]</td>
          <td>$rows[u_name]</td>
          <td>$rows[u_email]</td>
          <td>$rows[u_number]</td>
          <td>$rows[u_notes]</td>
          <td class='text-left'>
            <button class='btn btn-sucess' data-toggle='modal' data-target='#edit_person$rows[user_id]' data-backdrop='static'>Edit</button>
            <div class='modal fade' id='edit_person$rows[user_id]'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button class='close' data-dismiss='modal'>&times;</button>
                    <h4>Edit New Person</h4>
                  </div>
                  <div class='modal-body'>
                  <form onsubmit='edit_form($rows[user_id]);' id='edit_form$rows[user_id]'>
                    <div class='form-group'>
                      <label for='edit_form$rows[user_id]'>Name</label>
                      <input type='text' class='form-control' id='edit_name$rows[user_id]' value=$rows[u_name] required>
                    </div>
                    <div class=form-group>
                      <label for='edit_email$rows[user_id]'>Email</label>
                      <input type='text' class='form-control' id='edit_email$rows[user_id]' value=$rows[u_email] required>
                    </div>
                    <div class='form-group'>
                      <label for='edit_contact_number$rows[user_id]'>Contact Number</label>
                      <input type='text' class='form-control' id='edit_contact_number$rows[user_id]' value=$rows[u_number] required>
                    </div>
                    <div class='form-group'>
                      <label for='edit_notes$rows[user_id]'>Notes</label>
                      <textarea class='form-control' id='edit_notes$rows[user_id]'  rows='5' requried>$rows[u_notes]</textarea>
                    </div>
                    <div class='form-group'>
                      <button class='btn btn-info btn-block btn-lg' id='submit$rows[user_id]'>Done Editing</button>
                    </div>                  
                  </form>

                  </div>
                  <div class='modal-footer'>
                    <button class='btn btn-danger' data-dismiss='modal'>Close</button>
                  </div>
                </div>
              </div>
            </div>
            <button class='btn btn-danger' onclick=delete_func('$rows[user_id]');>Delete</button>
          </td>
        </tr>
      ";
      $c++;
  }
?>