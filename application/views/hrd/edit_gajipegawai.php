<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Gaji Pegawai</h3>                                    
            </div><!-- /.box-header -->
            <form action="<?php echo base_url('hrd/gajipegawai/updatedata/'.$dataedit->id.''); ?>" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input type="text" class="form-control" value="<?php echo $dataedit->nama_pegawai." - ".$dataedit->nik;?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" value="<?php echo $dataedit->jabatan;?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Gaji</label>
                        <input type="text" name="gaji" class="form-control" value="<?php echo $dataedit->gaji;?>"/>
                    </div>
                    <div class="form-group">
                        <label>Rentang Waktu</label>
                        <input type="text" name="waktu" class="form-control" value="<?php echo $dataedit->rentang_waktu;?>"/>
                    </div>
                    <div class="box-footer">
                    	<input type="submit" class="btn btn-primary" value="Submit"/>
                	</div>
            	</div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
    </div>
</div>