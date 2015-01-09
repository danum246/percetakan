<div class="row">
	 <div class="col-md-9" style="margin-left:50px;">
        <!-- general form elements -->
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">INPUT VOUCHER</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('kasir/pembayaran/list_pembayaran'); ?>" role="form" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label>No Voucher</label>
                        <input type="text" name="voucher" id="total" class="form-control" value=""/>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Cari"/>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
</div>