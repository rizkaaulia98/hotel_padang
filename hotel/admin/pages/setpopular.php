<script language="javascript" src="jquery.js"></script>
<script>

$(document).ready(function() {
  $('#city').change(function() { // Jika select box id kota dipilih
       var city = $(this).val(); // Ciptakan variabel kota
       console.log("xxx");
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
          url: 'act/carihotel.php', // File pemroses data
           data: 'city=' + city , // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(response) { // Jika berhasil
              $('#hotel').val(response); // Berikan hasilnya ke id hotel
            }
       });
    });
  });

});
});

</script>

<div class="col-sm-12">
  <div class="col-sm-12">
    <section class="panel">
    <div class="panel-body">
      <div class="col-sm-8">
        <form class="" action="act/add.php" method="post">
          <h3><i class="icon-select2"></i>Select Hotel Based on City</h3>
            <div class="login-wrap">
              <select class="form-control" name="type">
                <option value="">--Selection Type--</option>
                <option value="1">Star Hotel</option>
                <option value="2">Budget Hotel</option>
                <option value="3">Syariah Hotel</option>
                <option value="4">Best View Hotel</option>

              </select class="form-control"> &nbsp;

              <select class="form-control" id= "city" name="city">
                <option value="">--Select City--</option>
                <option value="P">Padang</option>
                <option value="B">Bukittinggi</option>

              </select> &nbsp;


              <select class="form-control" name="hotel" id="hotel">
                <option  value="">--Select Hotel</option>
              </select> &nbsp;
                <hr>
                <button class="btn btn-theme btn-block" type="submit" name="submit" style="background:#26a69a;border-color:white"><i class=""></i> Add</button>
            </div>
        </form>
      </div>
    </div>
    </section>
  </div>



  <div class="col-sm-6">
    <section class="panel">
    <div class="panel-body">

    </div>
    </section>
  </div>


  <div class="col-sm-6">
    <section class="panel">
    <div class="panel-body">

    </div>
    </section>
  </div>
</div>

<script>
function hotel() {
  var city = document.getElementById("city").value;
  if (city == "P") {
    $hotel=mysqli_query($conn, "SELECT id, name from hotel where id like 'HT%'");
    while($hot = mysqli_fetch_assoc($hotel))
    {
    document.getElementById("hotel").innerHTML ="<option value=".$hot['id'].">".$hot['name']."</option>";
    }
  }else if(city =="B"){
    $hotel=mysqli_query($conn, "SELECT id, name from hotel where id like 'H%'");
    while($hot = mysqli_fetch_assoc($hotel))
    {
    document.getElementById("hotel").innerHTML ="<option value=".$hot['id'].">".$hot['name']."</option>";
    }
  }
  // document.getElementById("demo").innerHTML = "You selected: " + city;
}
</script>

</body>
