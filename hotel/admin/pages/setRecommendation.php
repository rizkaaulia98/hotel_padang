
<?php
session_start();
$username = $_SESSION['username'];
$id_city  = $_SESSION['id'];
$city     = $_SESSION['name'];
?>

<div class="col-lg-12">
  <div class="col-lg-8" style="float:center;">
    <section class="panel">
    <div class="panel-body">
      <div class="col-lg-12">
        <form class="" action="act/addRecommendation.php" method="post" role="form">
          <h3><i class="icon-stack-picture"></i>&nbsp;Add Recommendation</h3>
            <div class="login-wrap">
              <select class="form-control" name="category" id="category">
                <?php
                  $kategori=mysqli_query($conn, "select * from hotel_recommendation_category ");
                  echo "<option>-Select Category-</option>";
                  while($rowkategori = mysqli_fetch_assoc($kategori)){

                    echo "<option value=\"$rowkategori[id]\">$rowkategori[name]</option>";
                  }
                ?>
              </select class="form-control"> &nbsp;
              <select class="form-control" name="hotel" id="hotel">
                <?php
                  $hotel=mysqli_query($conn, "SELECT hotel.id, hotel.name from hotel, city where city.id='$id_city' and ST_CONTAINS(city.geom, hotel.geom) ");
                  echo "<option>-Select Hotel-</option>";
                  while($row = mysqli_fetch_assoc($hotel)){

                    echo "<option value=\"$row[id]\">$row[name]</option>";
                  }
                ?>
              </select> &nbsp;
              <select class="form-control" name="grade" id="grade">
                <?php
                  $grade=mysqli_query($conn, "SELECT grade,name from grade");
                  echo "<option>-Grade Hotel-</option>";
                  while($gd = mysqli_fetch_assoc($grade)){

                    echo "<option value=\"$gd[grade]\">$gd[name]($gd[grade])</option>";
                  }
                ?>
              </select> &nbsp;
                <hr>
                <button class="btn btn-theme btn-block" type="submit" name="submit" style="background:#26a69a;border-color:white"><i class=""></i> Add</button>
            </div>
        </form>
      </div>
    </div>
    </section>
  </div>
</div>

<!-- table rekomendasi hotel padang -->
<div class="col-sm-12">
  <div class="col-sm-12">
    <section class="panel">
    <div class="panel-body">
      <div class="col-sm-12">
        <?php
        $sql1 = mysqli_query($conn, "SELECT hotel_recommendation.id_hotel as ids, hotel.name as nama, hotel.address, hotel_recommendation.grade as grade, hotel_recommendation.id_kategori,
        hotel_type.name as tipe, hotel_recommendation_category.id as idc, hotel_recommendation_category.name as category, grade.name as stt
        FROM hotel join hotel_type on hotel.id_type=hotel_type.id
        join hotel_recommendation on hotel.id=hotel_recommendation.id_hotel
        join grade on hotel_recommendation.grade=grade.grade
        join hotel_recommendation_category on hotel_recommendation_category.id=hotel_recommendation.id_kategori, city
        where hotel_recommendation.id_kategori='a' and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)");

        $sql2 = mysqli_query($conn, "SELECT hotel_recommendation.id_hotel as ids, hotel.name as nama, hotel.address, hotel_recommendation.grade as grade, hotel_recommendation.id_kategori,
        hotel_type.name as tipe, hotel_recommendation_category.id as idc, hotel_recommendation_category.name as category, grade.name as stt
        FROM hotel join hotel_type on hotel.id_type=hotel_type.id
        join hotel_recommendation on hotel.id=hotel_recommendation.id_hotel
        join grade on hotel_recommendation.grade=grade.grade
        join hotel_recommendation_category on hotel_recommendation_category.id=hotel_recommendation.id_kategori, city
        where hotel_recommendation.id_kategori='b' and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)");

        $sql3 = mysqli_query($conn, "SELECT hotel_recommendation.id_hotel as ids, hotel.name as nama, hotel.address, hotel_recommendation.grade as grade, hotel_recommendation.id_kategori,
        hotel_type.name as tipe, hotel_recommendation_category.id as idc, hotel_recommendation_category.name as category, grade.name as stt
        FROM hotel join hotel_type on hotel.id_type=hotel_type.id
        join hotel_recommendation on hotel.id=hotel_recommendation.id_hotel
        join grade on hotel_recommendation.grade=grade.grade
        join hotel_recommendation_category on hotel_recommendation_category.id=hotel_recommendation.id_kategori, city
        where hotel_recommendation.id_kategori='c' and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)");

        $sql4 = mysqli_query($conn, "SELECT hotel_recommendation.id_hotel as ids, hotel.name as nama, hotel.address, hotel_recommendation.grade as grade, hotel_recommendation.id_kategori,
        hotel_type.name as tipe, hotel_recommendation_category.id as idc, hotel_recommendation_category.name as category, grade.name as stt
        FROM hotel join hotel_type on hotel.id_type=hotel_type.id
        join hotel_recommendation on hotel.id=hotel_recommendation.id_hotel
        join grade on hotel_recommendation.grade=grade.grade
        join hotel_recommendation_category on hotel_recommendation_category.id=hotel_recommendation.id_kategori, city
        where hotel_recommendation.id_kategori='d' and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)");


        ?>
        <style>
        #tabbed_box {
            margin: 0px auto 0px auto;
            width:300px;
        }
        .tabbed_area {
            border:1px solid #494e52;
            background-color:white;
            padding:8px;
        }
        ul.tabs {
            margin:0px; padding:0px;
        }
        ul.tabs li {
            list-style:none;
            display:inline;
        }
        ul.tabs li a {
            background-color:#464c54;
            color:#ffebb5;
            padding:8px 14px 8px 14px;
            text-decoration:none;
            font-size:9px;
            font-family:Verdana, Arial, Helvetica, sans-serif;
            font-weight:bold;
            text-transform:uppercase;
            border:1px solid #464c54;
        }
        ul.tabs li a:hover {
            background-color:#2f343a;
            border-color:#2f343a;
        }
        ul.tabs li a.active {
            background-color:#ffffff;
            color:#282e32;
            border:1px solid #464c54;
            border-bottom: 1px solid #ffffff;
        }
        .content {
            background-color:#ffffff;
            padding:10px;
            border:1px solid #464c54;
        }
        #content_2, #content_3 { display:none; }

        ul.tabs {
            margin:0px; padding:0px;
            margin-top:5px;
            margin-bottom:6px;
        }
        .content ul {
            margin:0px;
            padding:0px 20px 0px 20px;
        }
        .content ul li {
            list-style:none;
            border-bottom:1px solid #d6dde0;
            padding-top:15px;
            padding-bottom:15px;
            font-size:13px;
        }
        .content ul li a {
            text-decoration:none;
            color:#3e4346;
        }
        .content ul li a small {
            color:#8b959c;
            font-size:9px;
            text-transform:uppercase;
            font-family:Verdana, Arial, Helvetica, sans-serif;
            position:relative;
            left:4px;
            top:0px;
        }
        .content ul li:last-child {
            border-bottom:none;
        }
        ul.tabs li a {
            background-repeat:repeat-x;
            background-position:bottom;
        }
        ul.tabs li a.active {
            background-repeat:repeat-x;
            background-position:top;
        }
        .content {
            background-repeat:repeat-x;
            background-position:bottom;
        }
        </style>


        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body">
                  <div class="col-sm-12">
                    <div class="w3-container">
                      <div class="w3-bar w3-black">
                        <button class="w3-bar-item w3-button tablink w3-teal" onclick="openCity(event,'Star')">Star Hotel</button>
                        <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Budget')">Budget Hotel</button>
                        <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Syariah')">Syariah Hotel</button>
                        <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'View')">Best View Hotel</button>
                      </div>


                      <div id="Star" class="w3-container w3-border manage"><br><br>
                        <table id="example3" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #26a69a;">
                                    <th style="color:white; width:5%;">Id</th>
                                    <th style="color:white; width:20%;">Name</th>
                                    <th style="color:white; width:20%;">Type</th>
                                    <th style="color:white; width:20%;">Category</th>
                                    <th style="color:white; width:15%;">Grade</th>
                                    <th style="color:white; width:15%;">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php

                              while($data =  mysqli_fetch_array($sql1)){
                              $ids = $data['ids'];
                              $nama = $data['nama'];
                              $type = $data['tipe'];
                              $category = $data['category'];
                              $idc = $data['idc'];
                              $grade = $data['grade'];
                              $stt = $data['stt'];
                              ?>
                                <tr>
                                    <td><?php echo "$ids"; ?></td>
                                    <td><?php echo "$nama"; ?></td>
                                    <td><?php echo "$type"; ?></td>
                                    <td><?php echo "$category"; ?></td>
                                      <?php if(strpos($grade,"1") !== false){ ?>
                                        <td style="background-color: lightblue; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif(strpos($grade,"2") !== false){ ?>
                                        <td style="background-color: lightgreen; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"3") !== false) {?>
                                        <td style="background-color: orange; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"4") !== false) {?>
                                        <td style="background-color: yellow; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"5") !== false) {?>
                                        <td style="background-color: lightgrey; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }else{?>
                                        <td style=""></td>
                                      <?php } ?>
                                      <td>
                                        <div class="btn-group">
                  						            <a href="act/delete_rec.php?id=<?php echo $ids; ?>&category=<?php echo $idc; ?>" class="btn btn-sm btn-default" title='Delete' style="color: #26a69a;"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                      </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                      </div>

                      <div id="Budget" class="w3-container w3-border manage" style="display:none"><br><br>
                        <table id="example3" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #26a69a;">
                                    <th style="color:white; width:5%;">Id</th>
                                    <th style="color:white; width:20%;">Name</th>
                                    <th style="color:white; width:20%;">Type</th>
                                    <th style="color:white; width:20%;">Category</th>
                                    <th style="color:white; width:15%;">Grade</th>
                                    <th style="color:white; width:15%;">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php

                              while($data =  mysqli_fetch_array($sql2)){
                              $ids = $data['ids'];
                              $nama = $data['nama'];
                              $type = $data['tipe'];
                              $category = $data['category'];
                              $grade = $data['grade'];
                              $idc = $data['idc'];
                              $stt = $data['stt'];
                              ?>
                                <tr>
                                    <td><?php echo "$ids"; ?></td>
                                    <td><?php echo "$nama"; ?></td>
                                    <td><?php echo "$type"; ?></td>
                                    <td><?php echo "$category"; ?></td>
                                      <?php if(strpos($grade,"1") !== false){ ?>
                                        <td style="background-color: lightblue; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif(strpos($grade,"2") !== false){ ?>
                                        <td style="background-color: lightgreen; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"3") !== false) {?>
                                        <td style="background-color: orange; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"4") !== false) {?>
                                        <td style="background-color: yellow; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"5") !== false) {?>
                                        <td style="background-color: lightgrey; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }else{?>
                                        <td style=""></td>
                                      <?php } ?>
                                      <td><div class="btn-group">
                                        <a href="act/delete_rec.php?id=<?php echo $ids; ?>&category=<?php echo $idc; ?>" class="btn btn-sm btn-default" title='Delete' style="color: #26a69a;"><i class="fa fa-trash-o"></i></a>
                                      </div></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                      </div>

                      <div id="Syariah" class="w3-container w3-border manage" style="display:none"><br><br>
                        <table id="example3" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #26a69a;">
                                    <th style="color:white; width:5%;">Id</th>
                                    <th style="color:white; width:20%;">Name</th>
                                    <th style="color:white; width:20%;">Type</th>
                                    <th style="color:white; width:20%;">Category</th>
                                    <th style="color:white; width:15%;">Grade</th>
                                    <th style="color:white; width:15%;">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php

                              while($data =  mysqli_fetch_array($sql3)){
                              $ids = $data['ids'];
                              $nama = $data['nama'];
                              $type = $data['tipe'];
                              $category = $data['category'];
                              $grade = $data['grade'];
                              $idc = $data['idc'];
                              $stt = $data['stt'];
                              ?>
                                <tr>
                                    <td><?php echo "$ids"; ?></td>
                                    <td><?php echo "$nama"; ?></td>
                                    <td><?php echo "$type"; ?></td>
                                    <td><?php echo "$category"; ?></td>
                                      <?php if(strpos($grade,"1") !== false){ ?>
                                        <td style="background-color: lightblue; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif(strpos($grade,"2") !== false){ ?>
                                        <td style="background-color: lightgreen; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"3") !== false) {?>
                                        <td style="background-color: orange; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"4") !== false) {?>
                                        <td style="background-color: yellow; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"5") !== false) {?>
                                        <td style="background-color: lightgrey; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }else{?>
                                        <td style=""></td>
                                      <?php } ?>
                                      <td><div class="btn-group">
                                        <a href="act/delete_rec.php?id=<?php echo $ids; ?>&category=<?php echo $idc; ?>" class="btn btn-sm btn-default" title='Delete' style="color: #26a69a;"><i class="fa fa-trash-o"></i></a>
                                      </div></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                      </div>

                      <div id="View" class="w3-container w3-border manage" style="display:none"><br><br>
                        <table id="example3" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #26a69a;">
                                    <th style="color:white; width:5%;">Id</th>
                                    <th style="color:white; width:20%;">Name</th>
                                    <th style="color:white; width:20%;">Type</th>
                                    <th style="color:white; width:20%;">Category</th>
                                    <th style="color:white; width:15%;">Grade</th>
                                    <th style="color:white; width:15%;">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php

                              while($data =  mysqli_fetch_array($sql4)){
                              $ids = $data['ids'];
                              $nama = $data['nama'];
                              $type = $data['tipe'];
                              $category = $data['category'];
                              $grade = $data['grade'];
                              $idc = $data['idc'];
                              $stt = $data['stt'];
                              ?>
                                <tr>
                                    <td><?php echo "$ids"; ?></td>
                                    <td><?php echo "$nama"; ?></td>
                                    <td><?php echo "$type"; ?></td>
                                    <td><?php echo "$category"; ?></td>
                                      <?php if(strpos($grade,"1") !== false){ ?>
                                        <td style="background-color: lightblue; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif(strpos($grade,"2") !== false){ ?>
                                        <td style="background-color: lightgreen; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"3") !== false) {?>
                                        <td style="background-color: orange; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"4") !== false) {?>
                                        <td style="background-color: yellow; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }elseif (strpos($grade,"5") !== false) {?>
                                        <td style="background-color: lightgrey; text-align:center;"><?php echo "$stt"; ?></td>
                                      <?php }else{?>
                                        <td style=""></td>
                                      <?php } ?>
                                      <td><div class="btn-group">
                                        <a href="act/delete_rec.php?id=<?php echo $ids; ?>&category=<?php echo $idc; ?>" class="btn btn-sm btn-default" title='Delete' style="color: #26a69a;"><i class="fa fa-trash-o"></i></a>
                                      </div></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
            </section>
        </div>

        <script>
        function openCity(evt, cityName) {
          var i, x, tablinks;
          x = document.getElementsByClassName("manage");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablink");
          for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-teal", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " w3-teal";
        }
        </script>
      </div>
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
