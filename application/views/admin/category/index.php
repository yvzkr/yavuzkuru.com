<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Responsive Hover Table</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Kategori adı</th>
                        <th>Açıklama</th>
                        <th>Resim</th>
                        <th></th>
                    </tr>
                    <?php foreach ($posts as $row){ ?>
                    <tr id="kategori-index-<?=$row->id?>">
                        <td><?=$row->id?></td>
                        <td><?=$row->title?></td>
                        <td><?=$row->description?></td>
                        <td><?=$row->images_id?></td>
                        <td>
                            <a href="<?=base_url('admin/kategoriedit/'.$row->id)?> " title="Edit"><i  class="fa fa-edit"></i></a>
                            <a class="kategori_sil" href="<?=base_url('admin/kategorisil/'.$row->id)?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                            <a href="<?=base_url('admin/kategorigöster')?>" title="View"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

