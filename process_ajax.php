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
            <button class='btn btn-sucess' data-toggle='modal' data-target='#edit_person' data-backdrop='static'>Edit</button>
            <div class='modal fade' id='edit_person$c'>
              <div class='modal-dialog'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button class='close' data-dismiss='modal'>&times;</button>
                  </div>
                  <div class='modal-body'>
                  <form>
                    <div class='form-group'>
                      <label for='name'>Name</label>
                      <input type='text' class='form-control' id='name' value=$rows[u_name]>
                    </div>
                    <div class=form-group>
                      <label for='email'>Email</label>
                      <input type='text' class='form-control' id='email'>
                    </div>
                    <div class='form-group'>
                      <label for='contact_number'></label>
                      <input type='text' class='form-control' id='contact_number'>
                    </div>
                    <div class='form-group'>
                      <label for='notes'></label>
                      <textarea class='form-control' id='notes'  rows='5'></textarea>
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