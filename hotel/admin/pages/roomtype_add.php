<div class="col-sm-12"> <!-- menampilkan form add roomtype-->
  <section class="panel">
    <div class="panel-body">
      <a class="btn btn-compose">Add Type</a>
      <div class="box-body" >
        <form role="form" action="act/roomtype_add.php" method="post">
          <a class="btn btn-success btn-sm" onclick="adds()"><i class="fa fa-plus"></i></a>
          <a class="btn btn-danger btn-sm" onclick="rem()"><i class="fa fa-times"></i></a><br>
          <div class="form-group" style="clear:both" id="l_form" class="xx">
            <br>
            <label for="nama_roomtype">Room Type</label>
            <input type="text" class="form-control" name="roomtype[]" value="" style="margin-bottom:3px;" autofocus required>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Save <i class="fa fa-floppy-o"></i></button>
        </form>
      </div>
    </div>
  </section>
</div>
