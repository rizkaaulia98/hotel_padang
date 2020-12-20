<?php
    session_start();
    $username = $_SESSION['username'];
    $id_city  = $_SESSION['id'];
    $city     = $_SESSION['name'];
 ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Website untuk pengembangan wisata Padang">
        <meta name="author" content="Rizka">
        <meta name="keyword" content="Hotel, SI Unand, Unand, Wisata">



        <title>About Hotel</title>

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style-responsive.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <link rel="stylesheet" type="text/css" href="assets/js/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" type="text/css" href="assets/js/mystyle.css">
        <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css">

        <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/icomoon/styles.css">
        <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="_map.js"></script>

        <!-- TOMBOL PRINT (FLOATING BUTTON) -->
        <style type="text/css">
            .act-btn
            {
                background: #2ab9ac;
                display: block;
                width: 50px;
                height: 50px;
                line-height: 50px;
                text-align: center;
                color: white;
                font-size: 30px;
                font-weight: bold;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                text-decoration: none;
                transition: ease all 0.3s;
                position: fixed;
                right: 30px;
                bottom:30px;
            }
            .act-btn:hover{background: #ca2222}
        </style>

        <style>
            .responsive {
              width: 100%;
              height: auto;
            }
        </style>
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3HWQ56" height="0" width="0" style="display:none;visibility:hidden">
            </iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        <section id="container" >
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" style="color: white" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="index.php" class="logo" style="font-family: arial; font-size: 19px"><b>WEBGIS</b> • About <?php echo $city;?> Hotel </a>
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <?php
                            //echo "username $username, role $role";
                            if($_SESSION['C'] == false)
                            {
                              echo "<a href='admin/login.php' class='logo' style='font-size:14px;color:white'><i class='icon-enter6'></i>
                              <b>Login</b></a>";
                              //echo "username $username, role $role,$_SESSION['C'] || $_SESSION['A'] || $_SESSION['P'] ";
                            }
                            else{
                              echo "<a href='admin/act/logout.php' class='logo' style='font-size:14px;color:white'><i class='icon-esc'></i>
                              <b>logout</b></a>";
                              //echo "username $username, role $role";
                            }
                        ?>
                        <li>
                            <div id="loader" style="display:none"></div>
                        </li>
                        <li id="loader_text" style="margin-top:13px;display:none"><b>Loading</b></li>
                        <li class="nav pull-right top-menu"></li>
                    </ul>
                </div>
            </header>

            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li class="sub-menu">
                            <a href="index.php">
                                <i class="fa fa-chevron-circle-left"></i>
                                <span>Back To Home</span>
                            </a>
                        </li>
            	    </ul>
                </div>
            </aside>

            <section id="main-content">
                <section class="wrapper site-min-height">
                    <div class="row">
                        <div class="col-lg-8 main-chart">
                            <div class="panel">
                                <div class="panel-body" id="panelPrint" style="margin: 20px">
                                    <h2 style="color: #26a69a; font-family: arial"><i class="fa fa-info-circle"></i><b> About <?php echo "$city" ?></b></h2>
                                    <br>
                                    <div class="box-body">
                                        <!-- <h4 style="color: #26a69a; font-family: arial; font-size: 20px"><b> <?php echo $city; ?> Hotel</b></h4> -->
                                        <?php
                                        require '../connect.php';
                                        $rc = mysqli_query($conn, "SELECT distinct count(hotel_recommendation.id_hotel) as jl from hotel_recommendation join hotel on hotel.id=hotel_recommendation.id_hotel, city
                                                                    where city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)");
                                        $haha = mysqli_fetch_array($rc);
                                        $jml = $haha['jl'];
                                        $ct = mysqli_query($conn,"SELECT count(hotel.id) as jl from hotel, city where city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)");
                                        $acc = mysqli_fetch_array($ct);
                                        $jl = $acc['jl'];
                                            if ($id_city == 'CT01') {
                                            ?>
                                                <p style="text-align: justify;">
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    Padang is the capital and largest city of the Indonesian province of West Sumatra.
                                                    With an estimated population of 939,112 as of 2018, it is the 16th most populous city in Indonesia and the most populous city on the west coast of Sumatra <i class="icon-info22" title="https://padangkota.bps.go.id/dynamictable/2018/10/29/247/jumlah-penduduk-menurut-kecamatn-dan-jenis-kelamin-di-kota-padang-2010---2017-jiwa-.html" style="color: lightgrey;"></i>.
                                                    The Padang metropolitan area is the third most populous metropolitan area in Sumatra with a population of over 1.4 million <i class="icon-info22" title="https://sumbar.bps.go.id/dynamictable/2019/06/17/321/penduduk-provinsi-sumatera-barat-menurut-kabupaten-kota-2019.html" style="color: lightgrey; size: 2px;"></i>.
                                                    Padang is widely known for its Minangkabau culture, cuisine, and sunset beaches.<br>
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    The city of Padang is located on the west coast of the island of Sumatra, with a total area of 694.96 km2, equivalent to 1.65% of the area of West Sumatra <i class="icon-info22" title="http://sumbar.bps.go.id/?page=artikel&fd=artikel&act=lihat&idtopik=203&idartikel=102" style="color: lightgrey; size: 2px;"></i>.
                                                    More than 60% of the area of Padang is in the form of hills covered by protection forests. Only around 205.007 km2 of the territory is an urban area <i class="icon-info22" title="http://www.padang.go.id/index.php?option=com_content&view=article&id=49&Itemid=59" style="color: lightgrey; size: 2px;"></i>.
                                                    The hills stretch in the east and south of the city. The notable hills in Padang include Lampu Hill, Mount Padang, Gado-Gado Hill, and Pegambiran Hill. The city of Padang has a coastline of 68.126 km on the mainland of Sumatra. In addition, there are also 19 small islands, including Sikuai Island with an area of 4.4 ha in Bungus Teluk Kabung Subdistrict, Toran Island covering 25 ha and Pisang Gadang Island in Padang Selatan Subdistrict.
                                                    <i class="icon-info22" title="http://www.ppk-kp3k.dkp.go.id/" style="color: lightgrey; size: 2px;"></i>.<i class="icon-info22" title="http://www.kp3k.dkp.go.id/" style="color: lightgrey; size: 2px;"></i>.<br>
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    The city had historically been a trading center since the pre-colonial era, trading in pepper and gold. The Dutch made contact with the city in the mid 17th century, eventually constructing a fortress and taking over control of the city from the Pagaruyung Kingdom.
                                                    Save several interruptions of British rule, Padang remained part of the Dutch East Indies as one of its major cities until Indonesian independence <i class="icon-info22" title="http://www.kicc.jp/" style="color: lightgrey; size: 2px;"></i>.<br>
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    The city of Padang is divided into 11 districts (kecamatan):
                                                    <ol>
                                                      <li>Bungus Teluk Kabung</li>
                                                      <li>Koto Tangah</li>
                                                      <li>Kuranji</li>
                                                      <li>Lubuk Begalung</li>
                                                      <li>Lubuk Kilangan</li>
                                                      <li>Nanggalo</li>
                                                      <li>Padang Barat</li>
                                                      <li>Padang Selatan</li>
                                                      <li>Padang Timur</li>
                                                      <li>Padang Utara</li>
                                                      <li>Pauh</li>
                                                    </ol>



                                                </p>
                                            <?php
                                          } elseif ($id_city == 'CT02') {
                                            ?>
                                                <p style="text-align: justify;">
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    Bukittinggi, is the third largest city in West Sumatra, Indonesia, with a population of over 124,000 people and an area of 25.24 km2 <i class="icon-info22" title="https://bukittinggikota.bps.go.id/publikasi.html" style="color: lightgrey;"></i> It is in the Minangkabau Highlands, 90 km by road from the West Sumatran capital city of Padang.
                                                    The whole area directly borders to the Agam Regency, making it an enclave, and is located at 0°18′20″S 100°22′9″E, near the volcanoes Mount Singgalang (inactive) and Mount Marapi (still active).
                                                    At 930 m above sea level, the city has a cool climate with temperatures between 16.1° to 24.9 °C.<br>
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    Bukittinggi used to be known as Fort de Kock and was once dubbed "Parijs van Sumatera". The city was the capital of Indonesia during the Emergency Government of the Republic of Indonesia (PDRI). Before it became the capital of PDRI, the city was a centre of government at the time of the Dutch East Indies and during the Japanese colonial period.
                                                    Bukittinggi is also known as a leading tourist city in West Sumatra. It is twinned with Seremban in Negeri Sembilan, Malaysia.
                                                    The city is the birthplace of Mohammad Hatta, Indonesian co-proclamator and Assaat, then Indonesian (acting) president.
                                                    Koto Gadang village in the southwest of city produces an abundance of statesmen, ministers, doctors, economist, artist and scholars who make great contribution to Indonesia, namely Sutan Sjahrir, Agus Salim, Bahder Djohan, Rohana Kudus, Emil Salim, Dr. Syahrir, etc. <i class="icon-info22" title="https://en.wikipedia.org/wiki/Bukittinggi#Culture" style="color: lightgrey;"></i> <br>
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    Bukittinggi is divided into three districts (kecamatan), which are further divided into five villages (nagari) and 24 kelurahan. The districts are:
                                                    <ol>
                                                      <li>Guguk Panjang</li>
                                                      <li>Mandiangin Koto Selayan</li>
                                                      <li>Aur Birugo Tigo Baleh</li>
                                                    </ol>

                                                </p>
                                            <?php
                                            }
                                         ?>


                                        <br>
                                        <?php
                                            if ($id_city == 'CT01') {
                                            ?>
                                            <img src="../_foto/2.jpeg" width="200" height="100" class="responsive">
                                            <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Grand Mosque of West Sumatra, a new modern large mosque that is built with Minangkabau architecture.
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                            The Mosque is located on Jalan Khatib Sulaiman, city centre of Padang</p>

                                            <?php
                                          } elseif ($id_city == 'CT02') {
                                            ?>
                                            <img src="../_foto/3.jpg" width="300" height="200" class="responsive">
                                            <p>&nbsp&nbsp&nbsp Jam Gadang, a clock tower located in the heart of the city, is a symbol for the city and a well-visited tourist spot.</p>
                                            <?php
                                            }
                                         ?>

                                        <br>
                                        <br>
                                        <!-- LIST RECOMMENDATION TOURISM -->
                                        <div class="box-body">
                                            <div class="form-group">
                                                <h4 style="color: #26a69a; font-family: arial; font-size: 20px"><b>Hotel Recommendation in <?php echo $city;?> City</b></h4>
                                                <p style="text-align: justify;">
                                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                    To accommodate tourists for their needs while traveling, there are various kinds of accommodation place, such as hotel, inn, guest house, etc,
                                                     which are availabe in the City of <?php echo "$city" ?>.
                                                    For recommended hotels, the assessment is carried out by the local government based on the assessment parameters set by the local government.
                                                    <br>
                                                </p>
                                                <p>The table below shows list of <?php echo "$jml"; ?> recommended hotels based on the local government's assessment:</p>
                                                <table id="example3" class="table table-hover table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:  1%; text-align: center;">No.</th>
                                                            <th style="width: 30%; text-align: center;">Name</th>
                                                            <th style="width: 35%; text-align: center;">Address</th>
                                                            <th style="width: 10%; text-align: center;">Category</th>
                                                            <th style="width: 10%; text-align: center;">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_type">
                                                        <?php
                                                            require '../connect.php';
                                                            $sql = mysqli_query($conn, "SELECT hotel_recommendation.id_hotel as ids, hotel.name as nama, hotel.address, hotel_recommendation.grade as grade, hotel_recommendation.id_kategori,
                                                            hotel_type.name as tipe, hotel_recommendation_category.id as idc, hotel_recommendation_category.name as category, grade.name as stt
                                                            FROM hotel join hotel_type on hotel.id_type=hotel_type.id
                                                            join hotel_recommendation on hotel.id=hotel_recommendation.id_hotel
                                                            join grade on hotel_recommendation.grade=grade.grade
                                                            join hotel_recommendation_category on hotel_recommendation_category.id=hotel_recommendation.id_kategori, city
                                                            where city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom) order by hotel_recommendation.grade");
                                                            $i = 1;
                                                            while($data =  mysqli_fetch_array($sql))
                                                            {
                                                                $id      = $data['id'];
                                                                $name    = $data['nama'];
                                                                $address = $data['address'];
                                                                $type    = $data['tipe'];
                                                                $reco    = $data['category'];
                                                                $stt    = $data['stt'];
                                                                $grade    = $data['grade'];
                                                                $idc   = $data['idc'];


                                                                ?>
                                                            <tr>
                                                                <td style="text-align: center;"><?php echo "$i"; ?></td>
                                                                <td><?php echo "$name"; ?></td>
                                                                <td><?php echo "$address"; ?></td>
                                                                <td style="text-align: center;"><?php echo "$reco"; ?></td>
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
                                                            </tr>
                                                                <?php
                                                                $i++;
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <?php
                                                    if ($id_city == 'CT01') {
                                                    ?>
                                                    <p style="text-align: justify;">
                                                        The table below shows list of <?php echo "$jl"; ?> recorded hotels in the City of <?php echo "$city"; ?>:
                                                    </p>

                                                    <?php
                                                  } elseif ($id_city == 'CT02') {
                                                    ?>
                                                    <p style="text-align: justify;">
                                                      The table below shows list of <?php echo "$jl"; ?> recorded hotels in the City of <?php echo "$city"; ?>:

                                                    </p>

                                                    <?php
                                                    }
                                                 ?>
                                                 <table id="example3" class="table table-hover table-bordered table-striped">
                                                     <thead>
                                                         <tr>
                                                             <th style="width:  1%; text-align: center;">No.</th>
                                                             <th style="width: 30%; text-align: center;">Name</th>
                                                             <th style="width: 45%; text-align: center;">Address</th>
                                                             <th style="width: 11%; text-align: center;">Type</th>
                                                         </tr>
                                                     </thead>
                                                 <tbody id="table_type">
                                                     <?php
                                                         require '../connect.php';
                                                         $sql = "SELECT hotel.id, hotel.name, hotel.address, hotel_type.name as tipe from hotel
                                                         join hotel_type on hotel.id_type=hotel_type.id, city
                                                         WHERE city.id = '$id_city' AND ST_CONTAINS(city.geom, hotel.geom)
                                                         ORDER BY tipe ASC";

                                                         $result = mysqli_query($conn, $sql);

                                                         $i = 1;
                                                         while($data =  mysqli_fetch_array($result))
                                                         {
                                                             $id      = $data['id'];
                                                             $name    = $data['name'];
                                                             $address = $data['address'];
                                                             $type    = $data['tipe'];
                                                             ?>
                                                         <tr>
                                                             <td  style="text-align: center;"><?php echo "$i"; ?></td>
                                                             <td><?php echo "$name"; ?></td>
                                                             <td><?php echo "$address"; ?></td>
                                                             <td style="text-align: center;"><?php echo "$type"; ?></td>
                                                         </tr>
                                                             <?php
                                                             $i++;
                                                         }
                                                     ?>
                                                 </tbody>
                                             </table>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
        <script type="text/javascript" src="assets/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js" class="include"></script>
        <script type="text/javascript" src="assets/js/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="assets/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>
        <script type="text/javascript" src="assets/js/jquery.sparkline.js"></script>
        <script type="text/javascript" src="_map.js"></script>
        <script type="text/javascript" src="assets/js/common-scripts.js"></script>
        <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

        <script type="text/javascript">
            $(function() {
                //fancybox
                jQuery(".fancybox").fancybox();
            });
        </script>

        <script type="text/javascript">
            function printDiv(divName)
            {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>

        <!-- TOMBOL PRINT (FLOATING BUTTON) -->
        <a onclick="printDiv('panelPrint')"  class="act-btn btn-success">
            <i class="icon-printer" style="color: white;"></i>
        </a>
    </body>
</html>
