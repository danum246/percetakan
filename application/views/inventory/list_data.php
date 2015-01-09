<!-- The following CSS are included as plugins and can be removed if unused-->

<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/plugins/datatables/dataTables.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/plugins/codeprettifier/prettify.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/plugins/form-toggle/toggles.css' /> 
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>assets/fonts/glyphicons/css/glyphicons.min.css' />

<div id="page-heading">
    <ol class="breadcrumb">
        <li><a href="index.php">Dashboad</a></li>
        <li>List Data</li>
    </ol>

    <h1>Data Barang</h1>
    <div class="options">
        <div class="btn-toolbar">
            <!--a data-toggle="modal" href="#myModal" class="btn btn-primary"> New Data </a-->
            <div class="btn-group hidden-xs">
                <a href='#' class="btn btn-muted dropdown-toggle" data-toggle='dropdown'><i class="icon-cloud-download"></i><span class="hidden-sm"> Export as  </span><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Excel File (*.xlsx)</a></li>
                    <li><a href="#">PDF File (*.pdf)</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-indigo">
                <div class="panel-heading">
                    <h4>Inline Data Tables</h4>
                </div>
                <div class="panel-body collapse in">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="editable">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <!--th>Aksi</th-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($isi as $row) { ?>
                                <tr class="odd">
                                    <td><?php echo $row->kd_barang; ?></td>
                                    <td><?php echo $row->nama_barang; ?></td>
                                    <td><?php echo $row->jumlah; ?></td>
                                    <!--td>
                                        <?php
                                            echo anchor(base_url().'inventory/databarang/edit_data/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>',array('title'=>'Edit')) . ' | ' . 
                                                anchor(base_url().'inventory/databarang/delete_data/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('title'=>'Delete', 'onClick'
                                                => "return confirm('Apakah anda yakin !')"));
                                            ?>
                                    </td-->
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table><!--end table-->
                </div>
            </div>
        </div>
    </div>

</div>    <!-- container -->
</div <!-- container -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Input Barang</h4>
            </div>
            <?php
                echo form_open(base_url('inventory/databarang/add_data'), $data = array('class' => 'form-horizontal row-border', 'data-validate'=>'parsley', 'id'=>'validate-form' ));
            ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kode Barang</label>
                        <div class="col-sm-6">
                            <input type="text" name="kode_barang" placeholder="Kode Barang" required="required" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Barang</label>
                        <div class="col-sm-6">
                            <input type="text" name="nama_barang" placeholder="Nama Barang" required="required" class="form-control" />
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