<!--sidebar start-->
<!-- Global site tag (gtag.js) - Google Analytics -->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">


              	  <?php if ($_SESSION['C']==true){ ?>
                    <p class="centered"><a href="profile.php"><img src="../_foto/2.jpeg" class="img-circle" width="80"></a></p>
                    <h5 class="centered">Hello, <?php echo $_SESSION['username'] ?>!</h5>
                  <?php }else{ ?>
                    <p class="centered"><a href="index.php"><img src="../_foto/2.jpeg" class="img-circle" width="80"></a></p>
                    <h5 class="centered">Hello, Visitor!</h5>
                  <?php } ?>

                  <li class="sub">
                      <a href="aboutHotel.php" style="cursor:pointer;background:none"><i class="fa fa-info-circle"></i>About Hotel in Padang</a>
                  </li>
<!-- list hotel -->
                  <li class="sub">
                      <a href="index.php" onclick="init();listHotel();" style="cursor:pointer;background:none"><i class="fa fa-list-ul"></i>List Hotel</a>
                  </li>


<!-- end list hotel -->

<!-- hotel around you -->
                  <li class="sub">
                      <a href="index.php" onclick="" style="cursor:pointer;background:none"><i class="fa fa-compass"></i>Hotel Around You</a>
                      <ul class="treeview-menu">

                      </ul>
                  </li>
<!-- end hotel around you -->

<!-- hotel by -->
                  <li class="sub-menu">
                    <a href="index.php" >
                        <i class="fa fa-search"></i>
                        <span>Search Hotel By</span>
                    </a>
                    <ul class="sub">
                      <!-- hotel by name -->
                      <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-sort-alpha-asc"></i> By Name</a>
                        <ul class="sub">
                          <li style="margin-top:10px"><input id="input_name" type="text" class="form-control"></li>
                          <li><a onclick="init();cari_hotel(1)" style="cursor:pointer;background:none">Search</a></li>
                        </ul>
                      </li>
                      <!-- end hotel by name -->

                    <!-- by address -->
                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-bookmark-o"></i> By Address</a>
                      <ul class="sub">
                        <li style="margin-top:10px"><input id="input_address" type="text" class="form-control"></li>
                        <li><a onclick="init();cari_hotel(2)" style="cursor:pointer;background:none">Search</a></li>
                      </ul>
                    </li>


                    <!-- by type -->
                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-tags"></i> By Type</a>
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
                      <a style="cursor:pointer;background:none"><i class="fa fa-folder-o"></i> By Facility</a>
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

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-tasks"></i> By Hotel Service</a>
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
                    </li>

                    <li class="sub">
                      <a style="cursor:pointer;background:none"><i class="fa fa-star"></i> By Hotel Rating</a>
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
                      <a style="cursor:pointer;background:none"><i class="fa fa-money"></i> By Room's Price</a>
                      <ul class="sub">
                        <li style="margin-top:10px">
                          <input id="rendah" type="text" class="form-control" placeholder="lowest-price"></br>
                          <input id="tinggi" type="text" class="form-control" placeholder="highest-price">
                        </li>
                        <li><a onclick="init(); cari_hotel(5);" style="cursor:pointer;background:none"> <i class="fa fa-search"></i>Search</a></li>
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
