 <?php

$username = $_SESSION['username'];
 ?>
<div class="col-sm-12">  <!-- menampilkan list hotel-->
    <section class="panel">
        <div class="panel-body">
            <div><h2><a href="?page=hotel_add" title="Add Hotel" style="color: #26a69a;"><i class="fa fa-plus"></i> Add Hotel</a></h2></div><br>
            <div class="box-body">
                <div class="form-group">
                    <form method="post" action="pages/hotel_detail.php">
                        <input type="text" name="username" class="hidden">

                    <table id="example2" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr style="background-color: #26a69a;">
                                <th style="color:white;">Id</th>
                                <th style="color:white;">Name</th>
                                <th style="color:white;">Address</th>
                                <th style="color:white;">Admin</th>
                                <th style="color:white;">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM hotel order by name ASC");
                            while($data =  mysqli_fetch_array($sql)){
                            $id = $data['id'];
                            $nama = $data['name'];
                            $alamat = $data['address'];
                            $username = $data['username'];
                        ?>
                            <tr>
                                <td><?php echo "$id"; ?></td>
                                <td><?php echo "$nama"; ?></td>
                                <td><?php echo "$alamat"; ?></td>
                                <td><?php echo "$username"; ?></td>
                                <td>
                                    <div class="btn-group">
                						<a href="?page=hotel_detail&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Detail' style="color: #26a69a;"><i class="fa fa-list"></i></a>
                            <a href="act/hotel_delete.php?id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete' style="color: #26a69a;"><i class="fa fa-trash-o"></i></a>
                            <?php if ($username == null) { ?>
                              <a href="?page=user_add" class="btn btn-sm btn-default" title="Set Admin" tooltip="Set Admin" style="color: #26a69a;"><i class="fa fa-pencil"></i></a>
                          <?php  } else { ?>
                            <a href="?page=user_update&username=<?php echo $username; ?>" class="btn btn-sm btn-default" title='Update Admin' style="color: #26a69a;"><i class="fa fa-edit"></i></a>

                        <?php  } ?>



                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
