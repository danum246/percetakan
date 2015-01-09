<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pegawai</h3>                                    
            </div><!-- /.box-header -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary" style="margin-left:10px;"> New Data </a>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Gaji</th>
                            <th>Rentang Waktu (bulan)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gaji as $row) { ?>
                            <tr>
                                <td><?php echo $row->nama_pegawai;?></td>
                                <td><?php echo $row->jabatan;?></td>
                                <td><?php echo number_format($row->gaji);?></td>
                                <td><?php echo $row->rentang_waktu;?></td>
                                <td>
                                    <?php
                                        echo anchor(base_url().'hrd/gajipegawai/edit_data/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>',array('title'=>'Edit')) . ' | ' . 
                                            anchor(base_url().'hrd/gajipegawai/deletedata/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('title'=>'Delete', 'onClick'
                                            => "return confirm('Apakah anda yakin !')"));
                                        ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
               	</table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <script type="text/javascript">
    $(document).ready(function() {
        $("#pegawai").change(function() {
            var nik = $("#pegawai").val();
            $("#nik").val(nik);
            $.ajax({
                url:'<?php echo base_url(); ?>hrd/gajipegawai/get_jabatan/',       
                type:'POST',
                data: {nik: $("#nik").val()},
                success:function(data){ 
                    $("#jabatan").val(data);
                 }
            });
            $.ajax({
                url:'<?php echo base_url(); ?>hrd/gajipegawai/get_kode_jabatan/',       
                type:'POST',
                data: {nik: $("#nik").val()},
                success:function(data){ 
                    $("#kode").val(data);
                 }
            });        
        });
    });
    </script>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Input Data Gaji Pegawai</h4>
            </div>
            <?php
            echo form_open(base_url('hrd/gajipegawai/savedata'), $data = array('class' => 'form-horizontal row-border', 'data-validate' => 'parsley', 'id' => 'validate-form'));
            ?>
            <input type="hidden" name="kode" id="kode" readonly/>
            <div class="modal-body">   
                <div class="form-group" id="kode_barang">
                    <label class="col-sm-3 control-label">Nama Pegawai</label>
                    <div class="col-sm-6">
                        <select name="pegawai" id="pegawai" class="form-control">
                            <option> Pilih Nama </option>
                            <?php foreach ($pegawai as $row) { ?>
                                <option value="<?php echo $row->nik;?>"> <?php echo $row->nama_pegawai;?> </option>
                           <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">NIK</label>
                    <div class="col-sm-6">
                        <input type="text" name="nik" id="nik" placeholder="NIK" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Jabatan</label>
                    <div class="col-sm-6">
                        <input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control" readonly/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Gaji</label>
                    <div class="col-sm-6">
                        <input type="number" name="gaji" placeholder="Gaji" class="form-control" />
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Rentang Waktu</label>
                    <div class="col-sm-6">
                        <input type="number" name="waktu" placeholder="Bulan" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save changes</button>
            </div>
            <?php echo form_close(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->