<div class="col-sm-12"> <!-- menampilkan form add facility-->
    <section class="panel">
                    <div class="panel-body">
                        <a class="btn btn-compose">Update Hotel Admin</a>
                        <div class="box-body"	>

                      <div class="form-group">
                        <?php if (isset($_GET['username'])){
					$username=$_GET['username'];
          $period=$_GET['stewardship_period'];
					$sql = mysqli_query($conn, "SELECT stewardship_period, name, role, address, hp, username, password, email FROM admin where username='$username'");
					$data = mysqli_fetch_array($sql);
          //echo $data['username'];
						?>
        <form class="form-horizontal style-form" role="form" action="act/update_user.php" method="post">
         <input type="text" class="form-control hidden" id="username" name="username" value="<?php echo $data['username']?>">
        <input type="text" class="form-control hidden" id="stewardship_period" name="stewardship_period" value="<?php echo $data['stewardship_period']?>">
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="username">Username</label>
        <div class="col-sm-10">
          <input disabled type="text" class="form-control " name="username" value="<?php echo $data['username']?>">
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="nama">Name</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?php echo $data['name']?>">
		  </div>
        </div>

		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="periode">Stewardship Period</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="periode" value="<?php echo $data['stewardship_period']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="alamat">Address</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="alamat" value="<?php echo $data['address']?>">
		  </div>
        </div>
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="no_hp">Contact</label>
		  <div class="col-sm-10">
          <input type="text" class="form-control" name="no_hp" value="<?php echo $data['hp']?>">
		  </div>
        </div>
        <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label" for="email">Email</label>
    		  <div class="col-sm-10">
              <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>">
    		  </div>
            </div>
        <input type="text" class="form-control hidden" name="role" value="<?php echo $data['role']?>">
		<div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="id_hotel">Admin of</label>
		  <div class="col-sm-10">
          <select name="aset[]" id="id" class="form-control">
            <option value="null">none</option>


      <?php
      $hotel=mysqli_query($conn, "SELECT * from hotel where (username is null or username = '$_GET[username]')");

      while($h = mysqli_fetch_assoc($hotel))
      {
        if ($data['username']==$h['username'])
          {
            echo "<option value='$h[id]' selected>$h[name]</option>";
          }
          else
          {
            echo"<option value='$h[id]'>".$h['name']."</option>";
          }
        }
      ?>

          </select>
		  </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label" for="password">Password</label>
		  <div class="col-sm-10">
          <input type="password" class="form-control" name="password" placeholder="Dont forget to input password again">
		  </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
</form>
<?php } ?>
                      </div>
                  </div>
                    </div>
                </section>
</div>
