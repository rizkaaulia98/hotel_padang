<div class="col-sm-12">  <!-- menampilkan Room type-->
    <section class="panel">
        <div class="panel-body">
            <a href="?page=roomtype_add" class="btn btn-compose" title="Add Room Type"><i class="fa fa-plus"></i>Type</a>
            <div class="box-body">
                <div class="form-group">
                    <table id="example3" class="table table-hover table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Id Type</th>
                                <th>Room Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM room order by id_type ASC");
                            while($data =  mysqli_fetch_array($sql)){
                            $id = $data['id_type'];
                            $type = $data['name'];
                        ?>
                            <tr>
                                <td><?php echo "$id"; ?></td>
                                <td><?php echo "$type"; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=roomtype_update&id=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Update'><i class="fa fa-edit"></i>Update</a>
                            			<a href="act/roomtype_delete.php?id_type=<?php echo $id; ?>" class="btn btn-sm btn-default" title='Delete'><i class="fa fa-trash-o"></i></a>
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
