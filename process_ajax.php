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
          <td class='text-left'>
            <button class='btn btn-sucess' data-toggle='modal' data-target='#edit_person$c' data-backdrop='static'>Edit</button>
            <div class='modal fade' id='edit_person$c'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button class='close' data-dismiss='modal'>&times;</button>
                    <h4>Edit New Person</h4>
                  </div>
                  <div class='modal-body'>
                  <form onsubmit='edit_form($rows[user_id]);' id='edit_form'>
                    <div class='form-group'>
                      <label for='edit_form'>Name</label>
                      <input type='text' class='form-control' id='edit_name' value=$rows[u_name] required>
                    </div>
                    <div class=form-group>
                      <label for='edit_email'>Email</label>
                      <input type='text' class='form-control' id='edit_email' value=$rows[u_email] required>
                    </div>
                    <div class='form-group'>
                      <label for='edit_contact_number'>Contact Number</label>
                      <input type='text' class='form-control' id='edit_contact_number' value=$rows[u_number] required>
                    </div>
                    <div class='form-group'>
                      <label for='edit_notes'>Notes</label>
                      <textarea class='form-control' id='edit_notes'  rows='5' requried>$rows[u_notes]</textarea>
                    </div>
                    <div class='form-group'>
                      <button class='btn btn-info btn-block btn-lg' id='submit'>Done Editing</button>
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