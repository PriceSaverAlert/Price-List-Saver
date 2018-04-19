<?php include_once('connectionDb.php'); ?>
<?php include_once('header.php'); ?>
      <section id="main-content">
          <section class="wrapper site-min-height">
          <?php
            if(isset($_GET['del_status']) and $_GET['del_status']=='success'){
              echo '<div class="alert alert-success">Deleted Successfully</div>';
            }
            if(isset($_GET['del_status']) and $_GET['del_status']=='fail'){
              echo '<div class="alert alert-danger">Failed to Delete</div>';
            }
          ?>
            <h4>All Users</h4>
            <?php
            $user_sql="SELECT * FROM users";
            $user_result=mysqli_query($con,$user_sql);
            if(mysqli_num_rows($user_result)>0){
              ?>
              <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>First name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Pass</th>
                        <th>[Action]</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $count=1;
                      while ($row=mysqli_fetch_assoc($user_result)) {
                      ?>
                
                      <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mobile']; ?></td>
                        <td><?php echo $row['pass']; ?></td>
                        <td class="action-con">
                          <a href="edit_user.php?uid=<?php echo $row['uid']; ?>" title="Edit"><span class="fa fa-pencil"></span></a>
                          <a href="del_user.php?uid=<?php echo $row['uid']; ?>" title="Delete"><span onclick="return del_confirm();" class="fa fa-trash"></span></a>
                        </td>
                      </tr>

                      <?php
                      $count++;
                      }
                      ?>
                     </tbody>
                  </table>
                </div>
              <?php
            }
            else{
              echo '<h4>No User Found</h4>';
            }
            ?>
          </section>
      </section>
<?php include_once('footer.php'); ?>
