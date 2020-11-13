<div class="col-sm-8">  <!-- menampilkan fasilitas-->
    <section class="panel">
        <div class="panel-body">
            <div><h2><a href="?page=fasilitas_add" title="Add Facilities" style="color: #26a69a;"><i class="fa fa-plus"></i> Add Facilities</a></h2></div><br>
            <div class="box-body">
                <div class="form-group">
                    <table id="example3" class="table table-hover table-bordered table-striped" style="width: 50%">
                        <thead>
                            <tr style="background-color:#26a69a;">
                                <th style="color:white;">Id</th>
                                <th style="color:white;">Facility</th>
                                <th style="color:white;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM facility_hotel order by id ASC");
                            while($data =  mysqli_fetch_array($sql)){
                            $id_fasilitas = $data['id'];
                            $nama_fasilitas = $data['name'];
                        ?>
                            <tr>
                                <td><?php echo "$id_fasilitas"; ?></td>
                                <td><?php echo "$nama_fasilitas"; ?></td>
                                <td>
                                    <div class="btn-group">
                                  <a href="?page=fasilitas_update&id=<?php echo $id_fasilitas; ?>" class="btn btn-sm btn-default" title='Update' style="color: #26a69a;">
                                    <i class="fa fa-edit"></i></a>
                            			<a href="act/fasilitas_delete.php?id_fasilitas=<?php echo $id_fasilitas; ?>" class="btn btn-sm btn-default" title='Delete' style="color: #26a69a;">
                                    <i class="fa fa-trash-o"></i></a>
                        			</div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
