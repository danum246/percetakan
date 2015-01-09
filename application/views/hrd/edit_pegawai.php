<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pegawai</h3>                                    
            </div><!-- /.box-header -->
            <form action="<?php echo base_url('hrd/datapegawai/updatedata/'.$dataedit->id.''); ?>" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $dataedit->nama_pegawai;?>"/>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?php echo $dataedit->nik;?>"/>
                    </div>
                    <div class="form-group">
                        <label>NPWP</label>
                        <input type="text" name="npwp" class="form-control" value="<?php echo $dataedit->npwp;?>"/>
                    </div>
                    <div class="form-group">
                        <label>Handphone</label>
                        <input type="text" name="hp1" class="form-control" value="<?php echo $dataedit->hp1;?>"/>
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" name="hp2" class="form-control" value="<?php echo $dataedit->hp2;?>"/>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" ><?php echo $dataedit->alamat;?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select class="form-control" name="jabatan">
                            <option> Pilih Jabatan </option>
                            <?php foreach ($jabatan as $row) { ?>
                                <option value="<?php echo $row->kode_jabatan;?>"> <?php echo $row->jabatan;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="box-footer">
                    	<input type="submit" class="btn btn-primary" value="Submit"/>
                	</div>
            	</div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </div>
</div>