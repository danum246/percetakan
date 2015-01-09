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
                            <th>NIK</th>
                            <th>NPWP</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pegawai as $row) { ?>
                            <tr>
                                <td><?php echo $row->nik;?></td>
                                <td><?php echo $row->npwp;?></td>
                                <td><?php echo $row->nama_pegawai;?></td>
                                <td><?php echo $row->jabatan;?></td>
                                <td><?php echo $row->hp1;?></td>
                                <td>
                                    <?php
                                        echo anchor(base_url().'hrd/datapegawai/edit_data/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>',array('title'=>'Edit')) . ' | ' . 
                                            anchor(base_url().'hrd/datapegawai/deletedata/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('title'=>'Delete', 'onClick'
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Input Data Pegawai</h4>
            </div>
            <?php
            echo form_open(base_url('hrd/datapegawai/savedata'), $data = array('class' => 'form-horizontal row-border', 'data-validate' => 'parsley', 'id' => 'validate-form'));
            ?>
            <div class="modal-body">   
                <div class="form-group" id="kode_barang">
                    <label class="col-sm-3 control-label">Nama Pegawai</label>
                    <div class="col-sm-6">
                        <input type="text" name="nama" placeholder="Nama Pegawai" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">NIK</label>
                    <div class="col-sm-6">
                        <input type="text" name="nik" placeholder="NIK" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">NPWP</label>
                    <div class="col-sm-6">
                        <input type="text" name="npwp" placeholder="NPWP" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-6">
                        <textarea name="alamat" placeholder="Alamat" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Handphone</label>
                    <div class="col-sm-6">
                        <input type="text" name="hp1" placeholder="Handphone" class="form-control" required/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" name="hp2" placeholder="Telepon"  class="form-control" required/>
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Jabatan</label>
                    <div class="col-sm-6">
                        <select name="jabatan" class="form-control" required>
                            <?php foreach ($jabatan as $row) { ?>
                               <option value="<?php echo $row->kode_jabatan?>"> <?php echo $row->jabatan?> </option>
                           <? } ?>
                        </select>
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