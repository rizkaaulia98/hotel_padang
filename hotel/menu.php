<!--sidebar start-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<?php
session_start();
$username = $_SESSION['username'];
$id_city  = $_SESSION['id'];
$city     = $_SESSION['name'];
 ?>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">


              	  <?php if ($_SESSION['C']==true){ ?>

                    <?php if ($city=='Padang') { ?>
                      <p class="centered"><a href="profile.php"><img src="../_foto/logo.jpeg" class="img-circle" width="80"></a></p>
                    <?php }else if ($city=='Bukittinggi') { ?>
                      <p class="centered"><a href="profile.php"><img src="../_foto/logo.jpeg" class="img-circle" width="80"></a></p>
                    <?php } ?>
                    <h5 class="centered">Hello, <?php echo $_SESSION['username'] ?>!</h5>

                  <?php }else{ ?>
                    <?php if ($city=='Padang') { ?>
                      <p class="centered"><a href="profile.php"><img src="../_foto/logo.jpeg" class="img-circle" width="80"></a></p>
                    <?php }else if ($city=='Bukittinggi') { ?>
                      <p class="centered"><a href="profile.php"><img src="../_foto/logo.jpeg" class="img-circle" width="80"></a></p>
                    <?php } ?>
                    <h5 class="centered">Hello, Visitor!</h5>
                  <?php } ?>

                  <li class="sub">
                      <a href="index.php" style="cursor:pointer;background:none"><i class="icon-home"></i>Home</a>
                  </li>

                  <li class="sub">
                      <a href="about.php" style="cursor:pointer;background:none"><i class="fa fa-info-circle"></i>About</a>
                  </li>
<!-- list hotel -->
                  <li class="sub">
                      <a onclick="init();listHotel();" style="cursor:pointer;background:none"><i class="fa fa-list-ul"></i>List Hotel</a>
                  </li>
<!-- end list hotel -->

<!-- hotel around you -->
                  <li class="sub">
                      <a onclick="" style="cursor:pointer;background:none"><i class="fa fa-compass"></i>Hotel Around You</a>
                      <ul class="treeview-menu">
                         <div class=" form-group" style="color: white;" > <!-- <br> -->
                          <!-- <label>Based On Radius</label><br> -->
                          <label for="inputradius" style="font-size: 10pt";>Radius : </label>
                          <label  id="nilai"  style="font-size: 10pt";>0</label> m

                          <input  type="range" onchange="init();hotel_sekitar_user();cekkk();" id="inputradius" name="inputradius" data-highlight="true" min="0" max="20" value="0" >
                          <script>
                            function cekkk()
                            {
                              document.getElementById('nilai').innerHTML=document.getElementById('inputradius').value*100;
                              // console.log(document.getElementById('inputradius').value*100);
                            }
                          </script>
                        </div>

                      </ul>
                  </li>
<!-- end hotel around you -->

<!-- hotel by -->
                  <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-search"></i>
                        <span>Search Hotel By</span>
                    </a>
                    <ul class="sub">
                      <!-- hotel by name -->
                      <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-sort-alpha-asc"></i> Name</a>
                        <ul class="sub">
                          <li style="margin-top:10px"><input id="input_name" type="text" class="form-control"></li>
                          <li><a onclick="init();cari_hotel(1)" style="cursor:pointer;background:none">Search</a></li>
                        </ul>
                      </li>
                      <!-- end hotel by name -->

                    <!-- by address -->
                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-bookmark-o"></i> Address</a>
                      <ul class="sub">
                        <li style="margin-top:10px"><input id="input_address" type="text" class="form-control"></li>
                        <li><a onclick="init();cari_hotel(2)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>


                    <!-- by type -->
                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-tags"></i> Type</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                        <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_jenis">
                          <?php
                          include('../connect.php');
                          $querysearch="SELECT id, name FROM hotel_type";
                          $hasil=mysqli_query($conn, $querysearch);

                            while($baris = mysqli_fetch_array($hasil)){
                                $id=$baris['id'];
                                $name=$baris['name'];
                                echo "<option value='$id'>$name</option>";
                            }
                          ?>
                        </select>
                        </li>
                        <li><a onclick="init();cari_hotel(3)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>
                    <!-- end by type -->
                    <!-- by room's type -->

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-folder-o"></i> Facility</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                        <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_facility">
                          <?php
                          include('../connect.php');
                          $querysearch="SELECT id, name FROM facility_hotel order by name";
                          $hasil=mysqli_query($conn, $querysearch);

                            while($baris = mysqli_fetch_array($hasil)){
                                $id=$baris['id'];
                                $name=$baris['name'];
                                echo "<option value='$id'>$name</option>";
                            }
                          ?>
                        </select>
                        </li>
                        <li><a onclick="init();cari_hotel(7)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>

                    <!-- <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-tasks"></i> Hotel Service</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                          <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_service">
                            <option value="2">Airport Transfer</option>
                            <option value="15">Laundry</option>
                            <option value="9">Dry Cleaning</option>
                            <option value="16">Massage</option>
                            <option value="22">Spa</option>
                            <option value="23">Salon</option>
                            <option value="28">Valet</option>
                            <option value="32">Breakfast</option>
                            <option value="33">Room Service</option>
                            <option value="41">Kids Center</option>
                            <option value="42">Sauna</option>
                            <option value="6">Car Rental</option>
                            <option value="5">Bicycle Rental</option>
                          </select>

                        </li>
                        <li><a onclick="init();cari_hotel(4)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li> -->

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-star"></i> Hotel Rating</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                          <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_rating">
                            <option value="1"> 1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                          </select>

                        </li>
                        <li><a onclick="init();cari_hotel(6)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>

                    <!-- end by room -->

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-money"></i> Room's Price</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                          <input id="rendah" type="text" class="form-control" placeholder="lowest-price"></br>
                          <input id="tinggi" type="text" class="form-control" placeholder="highest-price">
                        </li>
                        <li><a onclick="init(); cari_hotel(5);" style="cursor:pointer;background:none"> <i class="fa fa-search"></i>Search</a></li>
                      </ul>
                    </li>

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-bus"></i> Trans Access</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                          <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="select_access">
                            <option value="0"> No Bus</option>
                            <option value="1"> Bus</option>
                          </select>

                        </li>
                        <li><a onclick="init();cari_hotel(8)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="icon-car"></i> Public Trans</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                        <select class="form-control kota text-center" style="width:100%;margin-top:10px" id="jurusan">
                          <?php
                          include('../connect.php');
                          $angkot=mysqli_query($conn,"SELECT angkot.id as ids, angkot.destination from angkot, city where city.id = '$id_city' AND st_contains(city.geom, angkot.geom)");
                          while($rowangkot = mysqli_fetch_array($angkot))
                          {
                            echo"<option value=".$rowangkot['ids'].">".$rowangkot['destination']."</option>";
                          }
                          ?>
                        </select>
                        </li>
                        <li><a onclick="init();cariByRoute();" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>


                    </ul>

                  </li>


<!-- end searchby  -->

<!-- rekomendasi -->
                  <!-- <li class="sub">
                      <a onclick="init();menu_rekom();listRekom();rekom_hotel();" style="cursor:pointer;background:none"><i class="fa fa-heart">  Recomendation</i></a>
                  </li> -->

                  <!-- <li class="sub-menu"> -->
                      <!-- <a href="galleryrecommendation.php" style="cursor:pointer;background:none"><i class="fa fa-heart"> Gallery Recomendation</i></a> -->
                      <!-- <ul class="sub"> -->
                        <!-- Based on ratting -->
                        <!-- <li class="sub">
                        <a style="cursor:pointer;background:none" onclick="init();ratingRecommended()" style="cursor:pointer;background:none"><i class="fa fa-thumbs-o-up"></i> Favorite</a>
                        </li>
                        <li class="sub">
                        <a style="cursor:pointer;background:none" onclick="init();halalHotel()" style="cursor:pointer;background:none"><i class="fa fa-building-o"></i> Halal Hotel</a>
                        </li>
                        <li class="sub">
                        <a style="cursor:pointer;background:none" onclick="init();buffetHotel()" style="cursor:pointer;background:none"><i class="fa fa-cutlery"></i> Food Service</a>
                        </li> -->
                      <!-- </ul> -->
                  <!-- </li> -->
<!-- end rekomendasi -->

<!-- transaksi -->
<?php if ($_SESSION['C']==true) { ?>
  <li class="sub">
      <a href="transaction.php?customer=<?php echo $_SESSION['username']; ?>" style="cursor:pointer;background:none"><i class="fa fa-credit-card">  Transaction History</i></a>
  </li>
<?php } ?>

<!-- end of transaksi -->
<!-- dashboard -->
                  <li class="sub-menu">
                      <a class="active" href="../">
                          <i class="fa fa-chevron-circle-left"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end
