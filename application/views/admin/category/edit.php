<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Kategori ekle</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?=current_url()?>" method="post" enctype='multipart/form-data'>
            <!-- text input -->
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" placeholder="Başlık" value="<?=$category->title?>">
            </div>
            <div class="form-group">
                <label>Açıklama</label>
                <input type="text" name="description" class="form-control" placeholder="Bir Açıklama giriniz" value="<?=$category->description?>" >
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Güncelle</button>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
</div>