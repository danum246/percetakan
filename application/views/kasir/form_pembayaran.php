<script type="text/javascript">
$(document).ready(function() {
    function hitung(){
        var qty = parseInt($("#qty").val());
        var satuan = parseInt($("#satuan").val());
        var finish = parseInt($("#finish").val())
        var total = (satuan * qty) + finish;
        $("#total").val(total);
    }
    
    $("#jenis").change(function() {
        $.ajax({
            url:'<?php echo base_url(); ?>kasir/pembayaran/get_harga/',       
            type:'POST',
            data: {jenis: $("#jenis").val()},
            success:function(data){ 
                $("#satuan").val(data);
             }
        });
        
        hitung();
    });
    
    $("#jenis_finish").change(function() {
        $.ajax({
            url:'<?php echo base_url(); ?>kasir/pembayaran/get_harga_finish/',       
            type:'POST',
            data: {jenis_finish: $("#jenis_finish").val()},
            success:function(data){ 
                
                $("#finish").val(data);
                hitung();
             }
        });
    });
    
    $("#qty").keyup(function() {
        hitung();
    });

});

</script>

<div class="row">
	 <div class="col-md-9" style="margin-left:50px;">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">FORM PEMBAYARAN</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('kasir/pembayaran/tempor'); ?>" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>Jenis Transaksi</label>
                        <select class="form-control" name="jenis" id="jenis" required>
                            <option value="">-- Pilih Jenis Transaksi --</option>
                            <?php foreach ($jenis as $row) { ?>
                                    <option value="<?php echo $row->id;?>"> <?php echo $row->jenis_kasir." - ".$row->ukuran." - ".$row->bahan;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--div class="form-group">
                        <label>Jenis Bahan</label>
                        <select class="form-control" name="bahan" id="bahan">
                            <?php foreach ($bahan as $row) { ?>
                                    <option value="<?php echo $row->kode_bahan;?>"> <?php echo $row->bahan;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label>
                        <select class="form-control" name="ukuran" id="ukuran">
                            <?php foreach ($ukuran as $row) { ?>
                                    <option value="<?php echo $row->kode_ukuran;?>"> <?php echo $row->ukuran;?> </option>
                            <?php } ?>
                        </select>
                    </div-->
                    <div class="form-group">
                        <label>Harga Satuan</label>
                        <input type="text" name="harga_satuan" id="satuan" class="form-control" value="0" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" min="0" value="0" name="jumlah" id="qty" class="form-control" placeholder="Jumlah / Quantity"/>
                    </div>
                    <div class="form-group">
                        <label>Jenis Finishing</label>
                        <select class="form-control" name="jenis_finish" id="jenis_finish" >
                            <option value="">-- Pilih Jenis Finishing --</option>
                            <?php foreach ($finishing as $row) { if($row->id_finishing!=0){ ?>
                                    <option value="<?php echo $row->id_finishing;?>"> <?php echo $row->nama_finishing;?> </option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Finishing</label>
                        <input type="number" min="0" value="0" name="finish" id="finish" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Harga Total</label>
                        <input type="text" name="total" id="total" class="form-control" value="0" readonly/>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Submit"/>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>