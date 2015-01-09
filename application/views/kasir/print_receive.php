<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        window.print();
    });
</script>
<section class="content invoice" style="width:100%;">                    
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header" style="font-size: 12px;">
                KHARISMA AMALIA 
                <small class="pull-right">Date: <?php echo date('d-m-Y')?></small>
            </h2>                            
        </div><!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12" style="font-size: 10px;">
            <p style="font-size: 12px;">
                Nama Costumer : <?php echo $isi[0]->customer; ?>
            </p>                            
        </div><!-- /.col -->
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive" >
            <table class="table table-striped" style=" width: 100%; ">
            	<thead>
                    <tr>
                        <th style="font-size: 14px;">No</th>
                        <th style="font-size: 14px;">Pembelian</th>
                        <th style="font-size: 14px;text-align: right;">Harga</th>
                    </tr>                                    
                </thead>
                <tbody>
                    <?php $n=1; $total=0; foreach ($isi as $row){ ?>
                    <tr>
                        <td style="font-size: 12px;"><?php echo $n; ?></td>
                        <td style="font-size: 12px;"><?php echo $row->jenis_kasir.'-'.$row->ukuran.'-'.$row->bahan;
							if($row->nama_finishing!='None'){echo ' + <br> '.$row->nama_finishing.'('.$row->harga_finishing.')';}
						?></td>
                        <td style="font-size: 12px;text-align: right;"><?php echo number_format($row->harga_satuan * $row->qty); ?></td>
                    </tr>
                    <?php $n++; $total = $row->harga_total + $total; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
        	<h4 class="page-header">
                <p class="pull-right">Total : Rp. <?php echo number_format($total)?></p>
            </h4>
        </div>
    </div>
</section>