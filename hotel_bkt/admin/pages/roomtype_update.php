<div class="col-sm-12"> <!-- menampilkan form upfate roomtype-->
    <section class="panel">
        <div class="panel-body">
            <a class="btn btn-compose" style='pointer-events:none'>Update Room Type</a>
        	<div class="box-body" >
				<?php  if (isset($_GET['id'])){
							$id=$_GET['id'];
							$sql = mysqli_query($conn, "SELECT * FROM room where id_type='".$id."'");
							$data = mysqli_fetch_array($sql)
						?>
				<form role="form" action="act/roomtype_update.php" method="post">
					<input type="text" class="form-control hidden" name="id_type" value="<?php echo $data['id_type'] ?>">
					<div class="form-group" style="clear:both">
						<label for="nama">Type</label>
						<input type="text" class="form-control" name="roomtype" value="<?php echo $data['name'] ?>" required>
					</div>
					<button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
				</form>
				<?php } ?>
      		</div>
        </div>
    </section>
</div>
