<script type="text/Javascript">
    $(document).ready(function(){
        $('#kode_barang').hide();
        $('#nama_barang').hide();
        $('#kode_barang2').hide();        
        $('#new').change(function(){
           var x =  $(this).val();
           if(x=='1'){
               $('#kode_barang2').hide(); 
               $('#kode_barang').show();
               $('#nama_barang').show();
           } else if(x=='2'){
               $('#kode_barang').hide();
               $('#nama_barang').hide();
               $('#kode_barang2').show();
           }
        });
    });
</script>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Transaksi</h3>                                    
            </div><!-- /.box-header -->
            <a data-toggle="modal" href="#myModal" class="btn btn-primary" style="margin-left:10px;"> New Data </a>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tipe Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($isi as $row) { ?>
                            <tr class="odd">
                                <td><?php echo $row->kd_trans; ?></td>
                                <td><?php echo $row->kd_barang; ?></td>
                                <td><?php echo $row->nama_barang; ?></td>
                                <td><?php echo $row->jumlah_trans; ?></td>
                                <td><?php echo $row->tgl_trans; ?></td>
                                <td><?php echo $row->tipe_transaksi; ?></td>
                                <td>
                                <?php
                                echo anchor(base_url() . 'inventory/transaksi/edit_data/' . $row->id, '<i class="glyphicon glyphicon-pencil"></i>', array('title' => 'Edit')) . ' | ' .
                                anchor(base_url() . 'inventory/transaksi/delete_data/' . $row->id, '<i class="glyphicon glyphicon-trash"></i>', array('title' => 'Delete', 'onClick'
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
                <h4 class="modal-title">Input Barang</h4>
            </div>
            <?php
            echo form_open(base_url('inventory/transaksi_masuk/add_data'), $data = array('class' => 'form-horizontal row-border', 'data-validate' => 'parsley', 'id' => 'validate-form'));
            ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                        <select name="new" class="form-control" id="new">
                            <option value="1" >-select-</option>
                            <option value="1" >New</option>
                            <option value="2">Existing</option>
                        </select>                        
                    </div>
                </div>    
                <div class="form-group" id="kode_barang">
                    <label class="col-sm-3 control-label">Kode Barang</label>
                    <div class="col-sm-6">
                        <input type="text" name="kode_barang" placeholder="Kode Barang" class="form-control" />
                    </div>
                </div>
                <div class="form-group" id="kode_barang2">
                    <label class="col-sm-3 control-label">Kode Barang</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="kode_barang2">
                            <?php foreach($barang as $row){ ?>
                            <option value="<?php echo $row->kd_barang; ?>"><?php echo $row->kd_barang.' | '.$row->nama_barang; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="nama_barang">
                    <label class="col-sm-3 control-label">Nama Barang</label>
                    <div class="col-sm-6">
                        <input type="text" name="nama_barang" placeholder="Nama Barang"  class="form-control" />
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-3 control-label">Kode Transaksi</label>
                    <div class="col-sm-6">
                        <input type="text" name="kode_transaksi" placeholder="Kode Transaksi" required="required" class="form-control" />
                    </div>
                </div>                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Barang</label>
                    <div class="col-sm-6">
                        <input type="number" name="jumlah_barang" placeholder="Jumlah Barang" required="required" class="form-control" />
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