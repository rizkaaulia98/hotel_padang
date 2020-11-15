<div class="col-sm-12">
  <div class="col-sm-12">
    <section class="panel">
    <div class="panel-body">
      <div class="col-sm-8">
        <form class="" action="act/addRecommendation.php" method="post" role="form">
          <h3><i class="icon-add-to-list"></i>&nbsp;Select Hotel Based on City</h3>
            <div class="login-wrap">
              <select class="form-control" name="type">
                <option value="">--Selection Type--</option>
                <option value="1">Star Hotel</option>
                <option value="2">Budget Hotel</option>
                <option value="3">Syariah Hotel</option>
                <option value="4">Best View Hotel</option>
              </select class="form-control"> &nbsp;
              <select class="form-control" id= "city" name="city" onchange="showHotel();">
                <option value="">--Select City--</option>
                <option value="P">Padang</option>
                <option value="B">Bukittinggi</option>
              </select> &nbsp;
              <select class="form-control" name="hotel" id="hotel">
                <option value="">--Select Hotel--</option>
              </select> &nbsp;
                <hr>
                <button class="btn btn-theme btn-block" type="submit" name="submit" style="background:#26a69a;border-color:white"><i class=""></i> Add</button>
            </div>
        </form>
      </div>
    </div>
    </section>
  </div>

<!-- table rekomendasi hotel padang -->
  <div class="col-sm-6">
    <section class="panel">
      <div class="panel-header">
        &nbsp;<h3><i class="icon-list3"></i> &nbsp;Hotel Recommendation in Padang</h3>
      </div>
    <div class="panel-body">
      <table class="w3-table">
        <thead class="w3-teal">
          <tr>
            <th>No</th>
            <th>Hotel Name</th>
            <th>Recommendation Type</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($conn, "SELECT * from hotel where status like 'P%'");
          $no=0;
          while ($data = mysqli_fetch_array($query)) {
            $name = $data['name'];
            $status = $data['status'];
            $no++; ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $status; ?></td>
            </tr>
      <?php    } ?>

        </tbody>
      </table>

    </div>
    </section>
  </div>

<!-- rabel rekomendasi hotel di bukittinggi -->
  <div class="col-sm-6">
    <section class="panel">
      <div class="panel-header">
        &nbsp;<h3><i class="icon-list3"></i> &nbsp;Hotel Recommendations in Bukittinggi</h3>
      </div>
    <div class="panel-body">
      <table class="w3-table">
        <thead class="w3-teal">
          <tr>
            <th>No</th>
            <th>Hotel Name</th>
            <th>Recommendation Type</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($conn, "SELECT * from hotel where status like 'B%'");
          $no=0;
          while ($data = mysqli_fetch_array($query)) {
            $name = $data['name'];
            $status = $data['status'];
            $no++; ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $name; ?></td>
              <td><?php echo $status; ?></td>
            </tr>
      <?php    } ?>

        </tbody>
      </table>

    </div>
    </section>
  </div>
</div>
<script>
function showHotel(){
  console.log("kdhgfkae");
  $("#hotel option").remove();
       var city = $('#city').val(); // Ciptakan variabel kota
       console.log("xxx");
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'act/carihotel.php', // File pemroses data
           data: 'city=' + city , // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(response) { // Jika berhasil
              $('#hotel').append(response); // Berikan hasilnya ke id hotel
              console.log (response);
            }
       });
    }
</script>
</body>
