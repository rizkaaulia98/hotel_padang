<?php
include '../../connect.php';
$id = $_GET["id"];
$id_hotel = $_SESSION['id'];
$admin=$_SESSION['username'];
$user = $_POST['username'];

$hasil=mysqli_query($conn, "SELECT hotel.id, hotel.name, hotel.address, hotel.cp, hotel.ktp, hotel.marriage_book, hotel.mushalla, hotel_type.name as type_hotel, st_x(st_centroid(hotel.geom)) as lon,st_y(st_centroid(hotel.geom)) as lat from hotel left join hotel_type on hotel_type.id=hotel.id_type where hotel.id='$id'");
while($baris = mysqli_fetch_array($hasil)){
  $id=$baris['id'];
  $name_hotel=$baris['name'];
  $address=$baris['address'];
  $cp=$baris['cp'];
  $ktp=$baris['ktp'];
  $marriage_book=$baris['marriage_book'];
  $mushalla=$baris['mushalla'];
  $hotel_type=$baris['type_hotel'];
  $lng=$baris['lon'];
  $lat=$baris['lat'];
  $cp=$baris['cp'];
  if ($lat=='' || $lng==''){
    $lat='<span style="color:red">Kosong</span>';
    $lng='<span style="color:red">Kosong</span>';
  }
}

	$syarat="-";
	if ($ktp == 1 && $marriage_book == 1) {
	  $syarat = "KTP & Buku Nikah";
	}
	else if ($ktp == 1) {
	  $syarat = "KTP";
	} else if ($marriage_book == 1) {
	  $syarat = "Buku Nikah";
	}

	$mushalla_stat = "-";
	if ($mushalla == 1) {
	  $mushalla_stat = "Ada Mushalla";
	};
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

<?php
// string number_format(float $number[, int $decimals = 0]);
    $sql = mysqli_query($conn, "SELECT count(id_review) as review from review where id_hotel = '$id'");
    $data =  mysqli_fetch_array($sql);
    $review = $data['review'];

        $sql = mysqli_query($conn, "SELECT AVG(rating) as rate from review where id_hotel = '$id'");
        $data =  mysqli_fetch_array($sql);
        //$id = $data['id'];
        $username = $data['username'];
        $rating = $data['rate'];
        $rata=number_format($rating,1, '.','');

        // raaata rating

        $querysearch ="SELECT id_hotel AS id, count(*) as review, AVG(rating) AS rating FROM review where id_hotel='$id'";

        $result=mysqli_query($conn, $querysearch);

        while($row = mysqli_fetch_array($result))
        {
          $idhotel=$row['id'];
          $rata=$row['rating'];
          $review=$row['review'];

          $dataarray[]=array('id'=>$idhotel, 'rating'=>$rata,'review'=>$review);
        }

?>
<div class="col-sm-10">
    <section class="panel">
        <div class="panel-body">
          <div class="col-sm-12">

              <h2 ><i class="fa fa-star"></i>  Customer Rating & Review</h2>
                    <div id='star-containerz' style="font-size: 16px">

                    <p> Rating Average: &nbsp;
                      <?php
                        if ($rata == 5 || $rata == 4 || $rata == 3 || $rata == 2 || $rata == 1) {
                          echo $rata.'.0 &nbsp';
                        }else{
                          echo substr($rata, 0,3).'&nbsp';
                        }

                       ?>
                      <i class="fa fa-star star2 <?php echo $rata >= 1 ? "star-checked" : ""; ?>"></i>
                      <i class="fa fa-star star2 <?php echo $rata >= 2 ? "star-checked" : ""; ?>"></i>
                      <i class="fa fa-star star2 <?php echo $rata >= 3 ? "star-checked" : ""; ?>"></i>
                      <i class="fa fa-star star2 <?php echo $rata >= 4 ? "star-checked" : ""; ?>"></i>
                      <i class="fa fa-star star2 <?php echo $rata == 5 ? "star-checked" : ""; ?>"></i>
                    </p>
                    </div><br>

              <div class="col-sm-8">
                <table id="example3" class="table table-hover table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                          <th >No</th>
                          <th >Date</th>
                          <th >Username</th>
                            <th >Comment</th>
                            <th >Rating</th>
                            <th >Action</th>
                        </tr>
                    </thead>

                    <tbody>
                      <?php
                          $sql = mysqli_query($conn, "SELECT review.* from review join admin on review.name=admin.username left join hotel on review.id_hotel=hotel.id where review.id_hotel='$id'");
                          $no=0;
                          while($data =  mysqli_fetch_array($sql)){
                            $name = $data['name'];
                            $id_review = $data['id_review'];
                            $date = $data['tanggal'];
                            $comment = $data['comment'];
                            $rating = $data['rating'];
                            $no++;

                      ?>

                        <tr>
                          <td ><?php echo "$no"; ?></td>
                          <td ><?php echo "$date"; ?></td>
                          <td ><?php echo "$name"; ?></td>
                            <td ><?php echo "$comment"; ?></td>
                            <td >
                              <i style="font-size: 9px;"class="fa fa-star star2 <?php echo $rating >= 1 ? "star-checked" : ""; ?>"></i>
                              <i style="font-size: 9px;" class="fa fa-star star2 <?php echo $rating >= 2 ? "star-checked" : ""; ?>"></i>
                              <i style="font-size: 9px;" class="fa fa-star star2 <?php echo $rating >= 3 ? "star-checked" : ""; ?>"></i>
                              <i style="font-size: 9px;" class="fa fa-star star2 <?php echo $rating >= 4 ? "star-checked" : ""; ?>"></i>
                              <i style="font-size: 9px;" class="fa fa-star star2 <?php echo $rating == 5 ? "star-checked" : ""; ?>"></i>
                            </td>
                            <td>
                                <div class="btn-group">
                              <a href="act/delete_review.php?id=<?php echo $id_review; ?>&idh=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
                          </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
      </div>
    </section>
</div>
<script type="text/javascript">
    var id_cek = 0;
    function r(){
       // console.log('Coti ya');
       $('.fa-info').click(function(){
        // console.log('hy, atashi no namae wa Coti desu');
        $("#star2-1,#star2-2,#star2-3,#star2-4,#star2-5").removeClass('star-checked');
      });
    }
  </script>
