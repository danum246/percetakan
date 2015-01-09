<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Total Pembelanjaan</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
                <form action="<?php echo base_url('kasir/pembayaran/detail'); ?>"  method="post">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>QTY</th>
                        <th>Finishing</th>
                        <th>Jumlah</th>
                    </tr>
                    <?php $n=1; $total=0; $keterangan=""; foreach ($isi as $row){ ?>
                    <tr>
                        <td><?php echo $n; ?>.</td>
                        <td><?php echo $row->jenis_kasir.'-'.$row->ukuran.'-'.$row->bahan; ?></td>
                        <td><?php echo $row->harga_satuan; ?></td>
                        <td><?php echo $row->qty; ?></td>
                        <td><?php echo $row->nama_finishing; ?></td>
                        <td><?php echo $row->harga_total; ?></td>
                    </tr>
                    <?php $n++; $total = $row->harga_total + $total; $keterangan =  $keterangan.', '.$row->jenis_kasir.'-'.$row->ukuran.'-'.$row->bahan; } ?>
                    <tr>
                        <th colspan="5"><h3>Total</h3></th>
                        <th><h3>Rp. <?php echo number_format($total)?></h3></th>
                    </tr>                    
                    <input type="hidden" name="total" value="<?php echo $total; ?>" />
                    <input type="hidden" name="keterangan" value="<?php echo $keterangan; ?>" />
                </table>
                <br>
                <div style="padding:10px;">
                    <input type="button" class="btn btn-success" value="Print"  onClick="window.open('<?php echo base_url().'kasir/pembayaran/print_pembayaran/'.$voucher; ?>','name','height=500,width=500')">
                </div>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>