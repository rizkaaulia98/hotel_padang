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
                <button class="w3-bar-item w3-button tablink w3-teal" onclick="openCity(event,'Customer')">Customer</button>
                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Admin')">Hotel Admin</button>
              </div>
              <div id="Customer" class="w3-container w3-border manage"><br><br>
                <table id="example3" class="table table-hover table-bordered table-striped">
                    <thead class="w3-teal">
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $sql = mysqli_query($conn, "SELECT name ,username, email, last_login from admin where role='C'");
                        while($data =  mysqli_fetch_array($sql)){
                        //$id = $data['id'];
                        $username = $data['username'];
                        $nama = $data['name'];
                        $email = $data['email'];
                        $last_login = $data['last_login'];

                    ?>
                        <tr>
                            <td><?php echo "$username"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$email"; ?></td>
                            <td><?php echo "$last_login"; ?></td>

                            <td>
                                <div class="btn-group">
                              <a href="act/delete_cust.php?id=<?php echo $username; ?>" title='Delete' style="color:teal;"><i class="fa fa-trash-o"></i></a>
                          </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>

              <div id="Admin" class="w3-container w3-border manage" style="display:none"><br><br>
                <table id="example3" class="table table-hover table-bordered table-striped">
                  <header>
                    <h2><a href="?page=user_add" title='Add New User' style="color:teal;"><i class="fa fa-plus"></i> Add New Hotel Admin</a></h2><br>

                  </header>
                    <thead class="w3-teal">
                        <tr>
                            <th>Hotel Name</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $sql = mysqli_query($conn, "SELECT admin.name ,admin.username, admin.email, admin.last_login, hotel.name as hotel
                          from admin join hotel using (username), city where admin.role='P' and city.id='$id_city' AND ST_CONTAINS(city.geom, hotel.geom)
                          order by hotel.name asc");
                        while($data =  mysqli_fetch_array($sql)){
                        //$id = $data['id'];
                        $username = $data['username'];
                        $nama = $data['name'];
                        $name = $data['hotel'];
                        $email = $data['email'];
                        $last_login = $data['last_login'];

                    ?>
                        <tr>
                            <td><?php echo "$name"; ?></td>
                            <td><?php echo "$username"; ?></td>
                            <td><?php echo "$nama"; ?></td>
                            <td><?php echo "$email"; ?></td>
                            <td><?php echo "$last_login"; ?></td>

                            <td>
                                <div class="btn-group">
                              <a href="?page=user_update&username=<?php echo $username; ?>" title='Update' style="color:teal;"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                              <a href="act/delete_user.php?id=<?php echo $username; ?>"  title='Delete' style="color:teal;"><i class="fa fa-trash-o"></i></a>
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
</script>
