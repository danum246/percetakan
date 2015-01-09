<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pesanan</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                	<thead>
                        <tr>
                            <th>Voucher</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                        <?php foreach ($isi as $row){ ?>
                        	<tr>
                        		<td><?php echo $row->voucher; ?></td>
                        		<td><?php if($row->status_pembayaran==1){ echo "Lunas"; }else{ echo "Belum Dibayar"; } ?></td>
                                        <td><a href="<?php echo base_url().'kasir/pembayaran/detailpesanan/'.$row->voucher; ?>"><input type="button" value="Detail" class="btn btn-primary" /></a></td>
                        	</tr>
                        <?php } ?>
                        </tbody>
                    </thead>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>