<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="index.php">Dashboad</a></li>
        <li>Form</li>
        <li class="active">Form Components</li>
    </ol>

    <h1>Edit Data</h1>
</div>

<div class="container">

    <div class="panel panel-midnightblue">
        <div class="panel-heading">
            <h4</h4>
        </div>
        <div class="panel-body collapse in">
            <?php
                echo form_open(base_url('inventory/databarang/edit_data'), $data = array('class' => 'form-horizontal row-border', 'data-validate'=>'parsley', 'id'=>'validate-form' ));
            ?>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Kode Barang</label>
                    <div class="col-sm-6">
                        <input type="hidden" name="id_barang" value="<?php echo $isi->id; ?>" placeholder="Kode Barang" required="required" class="form-control" />
                        <input type="text" name="kode_barang" value="<?php echo $isi->kd_barang; ?>" placeholder="Kode Barang" required="required" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Barang</label>
                    <div class="col-sm-6">
                        <input type="text" name="nama_barang" value="<?php echo $isi->nama_barang; ?>" placeholder="Nama Barang" required="required" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Barang</label>
                    <div class="col-sm-6">
                        <input type="number" name="jumlah_barang" value="<?php echo $isi->jumlah; ?>" placeholder="Jumlah Barang" required="required" class="form-control" />
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="btn-toolbar">
                                <button class="btn-primary btn">Submit</button>
                                <button class="btn-default btn">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                echo form_close();
            ?>
        </div>
    </div>
</div>
