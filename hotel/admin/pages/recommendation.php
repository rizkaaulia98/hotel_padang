
<?php
session_start();
$username = $_SESSION['username'];
$id_city  = $_SESSION['id'];
$city     = $_SESSION['name'];

$sql1 = mysqli_query($conn, "SELECT hotel.id as ids, hotel.name as nama, hotel.address, hotel.status as stat, hotel_type.name as type FROM hotel join hotel_type on hotel.id_type=hotel_type.id, city
  where (hotel_type.id=1 or hotel_type.id=2 or hotel_type.id=3 or hotel_type.id=4 or hotel_type.id=5 )
  and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)
  order by hotel.status DESC");

$sql2 = mysqli_query($conn, "SELECT hotel.id as ids, hotel.name as nama, hotel.address, hotel.status as stat, hotel_type.name as type FROM hotel join hotel_type on hotel.id_type=hotel_type.id, city
    where ( hotel.status not like '%D%' or hotel_type.id=6 or hotel_type.id=7 or hotel_type.id=10 or hotel_type.id=11 or hotel_type.id=12 )
    and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)
    order by hotel.status DESC");

$sql3 = mysqli_query($conn, "SELECT hotel.id as ids, hotel.name as nama, hotel.address, hotel.status as stat, hotel_type.name as type FROM hotel join hotel_type on hotel.id_type=hotel_type.id, city
      where (hotel.status is null and hotel.name like '%syaria%')
      and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)
      order by hotel.status DESC");

$sql4 = mysqli_query($conn, "SELECT hotel.id as ids, hotel.name as nama, hotel.address, hotel.status as stat, hotel_type.name as type FROM hotel join hotel_type on hotel.id_type=hotel_type.id, city
    where (hotel.status is null or hotel.status like '%D%' )
    and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)
    order by stat DESC");


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
                            <th style="color:white; width:10%;">Type</th>
                            <th style="color:white; width:30%;">Address</th>
                            <th style="color:white; width:15%;">Status</th>
                            <th style="color:white; width:20%;">Grade</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php

                      while($data =  mysqli_fetch_array($sql1)){
                      $ids = $data['ids'];
                      $nama = $data['nama'];
                      $type = $data['type'];
                      $alamat = $data['address'];
                      $stat = $data['stat'];
                      ?>
                        <tr>
                            <td><?php echo "$ids"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$type"; ?></td>
                            <td><?php echo "$alamat"; ?></td>
                              <?php if(strpos($stat,"A1") !== false){ ?>
                                <td style="background-color: lightblue; text-align:center;"><?php echo "Highly Recommended"; ?></td>
                              <?php }elseif(strpos($stat,"A2") !== false){ ?>
                                <td style="background-color: lightgreen; text-align:center;"><?php echo "Recommended"; ?></td>
                              <?php }elseif (strpos($stat,"A3") !== false) {?>
                                <td style="background-color: orange; text-align:center;"><?php echo "Less Recommended "; ?></td>
                              <?php }elseif (strpos($stat,"A4") !== false) {?>
                                <td style="background-color: yellow; text-align:center;"><?php echo "Not Really Recommended"; ?></td>
                              <?php }elseif (strpos($stat,"A5") !== false) {?>
                                <td style="background-color: lightgrey; text-align:center;"><?php echo "Not Recommended"; ?></td>
                              <?php }elseif (strpos($stat,"C") !== false) {?>
                                <td style="background-color: red; text-align:center;"><?php echo "See Syariah"; ?></td>
                              <?php }elseif (strpos($stat,"D") !== false) {?>
                                <td style="background-color: red; text-align:center;"><?php echo "See Best View"; ?></td>
                              <?php }else{?>
                                <td style=""></td>
                              <?php } ?>
                            <td>
                                <div class="btn-group">
                                  <center>
                                    <a href="?page=setR&st=A1&idH=<?php echo $ids ?>"  title='1'><i class="fa fa-square-o" style="color: blue;" align="center"> 1</i></a>
                                    <a href="?page=setR&st=A2&idH=<?php echo $ids ?>"  title='2'><i class="fa fa-square-o" style="color: green;" align="center"> 2</i></a>
                                    <a href="?page=setR&st=A3&idH=<?php echo $ids ?>"  title='3'><i class="fa fa-square-o" style="color: orange;" align="center"> 3</i></a>
                                    <a href="?page=setR&st=A4&idH=<?php echo $ids ?>"  title='4'><i class="fa fa-square-o" style="color: yellow;" align="center"> 4</i></a>
                                    <a href="?page=setR&st=A5&idH=<?php echo $ids ?>"  title='5'><i class="fa fa-square-o" style="color: grey;" align="center"> 5</i></a>
                                  </center>
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
                            <th style="color:white; width:10%;">Type</th>
                            <th style="color:white; width:30%;">Address</th>
                            <th style="color:white; width:15%;">Status</th>
                            <th style="color:white; width:20%;">Grade</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php
                      while($data =  mysqli_fetch_array($sql2)){
                      $ids = $data['ids'];
                      $nama = $data['nama'];
                      $type = $data['type'];
                      $alamat = $data['address'];
                      $stat = $data['stat'];
                      ?>
                        <tr>
                            <td><?php echo "$ids"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$type"; ?></td>
                            <td><?php echo "$alamat"; ?></td>
                            <?php if(strpos($stat,"B1") !== false){ ?>
                              <td style="background-color: lightblue; text-align:center;"><?php echo "Highly Recommended"; ?></td>
                            <?php }elseif(strpos($stat,"B2") !== false){ ?>
                              <td style="background-color: lightgreen; text-align:center;"><?php echo "Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"B3") !== false) {?>
                              <td style="background-color: orange; text-align:center;"><?php echo "Less Recommended "; ?></td>
                            <?php }elseif (strpos($stat,"B4") !== false) {?>
                              <td style="background-color: yellow; text-align:center;"><?php echo "Not Really Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"B5") !== false) {?>
                              <td style="background-color: lightgrey; text-align:center;"><?php echo "Not Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"C") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Syariah"; ?></td>
                            <?php }elseif (strpos($stat,"D") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Best View"; ?></td>
                            <?php }else{?>
                              <td style=""></td>
                            <?php } ?>
                            <td>
                                <div class="btn-group">
                                  <center>
                                    <a href="?page=setR&st=B1&idH=<?php echo $ids ?>"  title='1'><i class="fa fa-square-o" style="color: blue;" align="center"> 1</i></a>
                                    <a href="?page=setR&st=B2&idH=<?php echo $ids ?>"  title='2'><i class="fa fa-square-o" style="color: green;" align="center"> 2</i></a>
                                    <a href="?page=setR&st=B3&idH=<?php echo $ids ?>"  title='3'><i class="fa fa-square-o" style="color: orange;" align="center"> 3</i></a>
                                    <a href="?page=setR&st=B4&idH=<?php echo $ids ?>"  title='4'><i class="fa fa-square-o" style="color: yellow;" align="center"> 4</i></a>
                                    <a href="?page=setR&st=B5&idH=<?php echo $ids ?>"  title='5'><i class="fa fa-square-o" style="color: grey;" align="center"> 5</i></a>
                                  </center>
                                 </div>
                            </td>
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
                            <th style="color:white; width:10%;">Type</th>
                            <th style="color:white; width:30%;">Address</th>
                            <th style="color:white; width:15%;">Status</th>
                            <th style="color:white; width:20%;">Grade</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php

                      while($data =  mysqli_fetch_array($sql3)){
                      $ids = $data['ids'];
                      $nama = $data['nama'];
                      $type = $data['type'];
                      $alamat = $data['address'];
                      $stat = $data['stat'];
                      ?>
                        <tr>
                            <td><?php echo "$ids"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$type"; ?></td>
                            <td><?php echo "$alamat"; ?></td>
                            <?php if(strpos($stat,"C1") !== false){ ?>
                              <td style="background-color: lightblue; text-align:center;"><?php echo "Highly Recommended"; ?></td>
                            <?php }elseif(strpos($stat,"C2") !== false){ ?>
                              <td style="background-color: lightgreen; text-align:center;"><?php echo "Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"C3") !== false) {?>
                              <td style="background-color: orange; text-align:center;"><?php echo "Less Recommended "; ?></td>
                            <?php }elseif (strpos($stat,"C4") !== false) {?>
                              <td style="background-color: yellow; text-align:center;"><?php echo "Not Really Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"C5") !== false) {?>
                              <td style="background-color: lightgrey; text-align:center;"><?php echo "Not Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"B") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Budget"; ?></td>
                            <?php }elseif (strpos($stat,"A") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Star"; ?></td>
                            <?php }elseif (strpos($stat,"D") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Best View"; ?></td>
                            <?php }else{?>
                              <td style=""></td>
                            <?php } ?>
                            <td>
                                <div class="btn-group">
                                  <center>
                                    <a href="?page=setR&st=C1&idH=<?php echo $ids ?>"  title='1'><i class="fa fa-square-o" style="color: blue;" align="center"> 1</i></a>
                                    <a href="?page=setR&st=C2&idH=<?php echo $ids ?>"  title='2'><i class="fa fa-square-o" style="color: green;" align="center"> 2</i></a>
                                    <a href="?page=setR&st=C3&idH=<?php echo $ids ?>"  title='3'><i class="fa fa-square-o" style="color: orange;" align="center"> 3</i></a>
                                    <a href="?page=setR&st=C4&idH=<?php echo $ids ?>"  title='4'><i class="fa fa-square-o" style="color: yellow;" align="center"> 4</i></a>
                                    <a href="?page=setR&st=C5&idH=<?php echo $ids ?>"  title='5'><i class="fa fa-square-o" style="color: grey;" align="center"> 5</i></a>
                                  </center>
                                 </div>
                            </td>
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
                            <th style="color:white; width:10%;">Type</th>
                            <th style="color:white; width:30%;">Address</th>
                            <th style="color:white; width:15%;">Status</th>
                            <th style="color:white; width:20%;">Grade</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php

                      while($data =  mysqli_fetch_array($sql4)){
                      $ids = $data['ids'];
                      $nama = $data['nama'];
                      $type = $data['type'];
                      $alamat = $data['address'];
                      $stat = $data['stat'];
                      ?>
                        <tr>
                            <td><?php echo "$ids"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$type"; ?></td>
                            <td><?php echo "$alamat"; ?></td>
                            <?php if(strpos($stat,"D1") !== false){ ?>
                              <td style="background-color: lightblue; text-align:center;"><?php echo "Highly Recommended"; ?></td>
                            <?php }elseif(strpos($stat,"D2") !== false){ ?>
                              <td style="background-color: lightgreen; text-align:center;"><?php echo "Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"D3") !== false) {?>
                              <td style="background-color: orange; text-align:center;"><?php echo "Less Recommended "; ?></td>
                            <?php }elseif (strpos($stat,"D4") !== false) {?>
                              <td style="background-color: yellow; text-align:center;"><?php echo "Not Really Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"D5") !== false) {?>
                              <td style="background-color: lightgrey; text-align:center;"><?php echo "Not Recommended"; ?></td>
                            <?php }elseif (strpos($stat,"B") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Budget"; ?></td>
                            <?php }elseif (strpos($stat,"C") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Syariah"; ?></td>
                            <?php }elseif (strpos($stat,"A") !== false) {?>
                              <td style="background-color: red; text-align:center;"><?php echo "See Star"; ?></td>
                            <?php }else{?>
                              <td style=""></td>
                            <?php } ?>
                            <td>
                                <div class="btn-group">
                                  <center>
                                    <a href="?page=setR&st=D1&idH=<?php echo $ids ?>"  title='1'><i class="fa fa-square-o" style="color: blue;" align="center"> 1</i></a>
                                    <a href="?page=setR&st=D2&idH=<?php echo $ids ?>"  title='2'><i class="fa fa-square-o" style="color: green;" align="center"> 2</i></a>
                                    <a href="?page=setR&st=D3&idH=<?php echo $ids ?>"  title='3'><i class="fa fa-square-o" style="color: orange;" align="center"> 3</i></a>
                                    <a href="?page=setR&st=D4&idH=<?php echo $ids ?>"  title='4'><i class="fa fa-square-o" style="color: yellow;" align="center"> 4</i></a>
                                    <a href="?page=setR&st=D5&idH=<?php echo $ids ?>"  title='5'><i class="fa fa-square-o" style="color: grey;" align="center"> 5</i></a>
                                  </center>
                                 </div>
                            </td>
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
// function tabSwitch(new_tab, new_content) {
//
//     document.getElementById('content_1').style.display = 'none';
//     document.getElementById('content_2').style.display = 'none';
//     document.getElementById(new_content).style.display = 'block';
//
//
//     document.getElementById('tab_1').className = '';
//     document.getElementById('tab_2').className = '';
//     document.getElementById(new_tab).className = 'active';
//
// }
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
