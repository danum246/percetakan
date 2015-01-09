<div class="row"> 
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Transaksi</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                	 <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($isi as $row) { ?>
                            <tr class="odd">
                                <td><?php echo $row->kd_barang; ?></td>
                                <td><?php echo $row->nama_barang; ?></td>
                                <td><?php echo $row->jumlah; ?></td>
                                <td>
                                    <?php
                                        echo anchor(base_url().'inventory/databarang/edit_data/'.$row->id, '<i class="glyphicon glyphicon-pencil"></i>',array('title'=>'Edit')) . ' | ' . 
                                            anchor(base_url().'inventory/databarang/delete_data/'.$row->id, '<i class="glyphicon glyphicon-trash"></i>', array('title'=>'Delete', 'onClick'
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