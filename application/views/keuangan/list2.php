 <script type="text/javascript">
    $(document).ready(function() {
        $('#tanggal').datepicker();
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
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>PPN</th>
                            <th>PPH</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tampil as $row) { ?>
                        <tr>
                            <td><?php echo $row->keterangan; ?></td>
                            <td><?php echo $row->jumlah; ?></td>
                            <td><?php echo $row->ppn ;?></td>
                            <td><?php echo $row->pph ;?></td>
                            <td><?php echo $row->supplier ;?></td>
                            <td><?php echo $row->tanggal ;?></td>
                            <td><?php 
                                    echo anchor(base_url().'keuangan/transaksi/delete_data/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('title'=>'Delete', 'onClick'
                                            => "return confirm('Apakah anda yakin !')"));?>
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
                <h4 class="modal-title">Transaksi Masuk</h4>
            </div>
            <?php
                echo form_open(base_url('keuangan/transaksi/uang_keluar'), $data = array('class' => 'form-horizontal row-border', 'data-validate'=>'parsley', 'id'=>'validate-form' ));
            ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-6">
                            <textarea name="ket" placeholder="keterangan" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah Uang</label>
                        <div class="col-sm-6">
                            <input type="number" name="jmlh_uang" placeholder="jumlah Uang" required="required" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PPN (10%)</label>
                        <div class="col-sm-6">
                            <input type="number" name="ppn" placeholder="PPN" required="required" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PPH (10%)</label>
                        <div class="col-sm-6">
                            <input type="number" name="pph" placeholder="PPH" required="required" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Supplier</label>
                        <div class="col-sm-6">
                            <input type="text" name="supplier" placeholder="Supplier" required="required" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-6">
                            <input id="tanggal" type="text" name="tgl" placeholder="Supplier" required="required" class="form-control" />
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