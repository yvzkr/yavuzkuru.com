<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Kategori ekle</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?=current_url()?>" method="post">
            <!-- text input -->
            <div class="form-group">
                <label>Başlık</label>
                <input type="text" name="title" class="form-control" placeholder="Başlık" >
            </div>
            <div class="form-group">
                <label>Açıklama</label>
                <input type="text" name="description" class="form-control" placeholder="Bir Açıklama giriniz">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="userfile" size="20" id="exampleInputFile"/>

                <p class="help-block">Lütfen Kategori İçin Bir Fotoğraf Yükleyiniz.</p>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Gönder</button>
            </div>


        </form>
    </div>
    <!-- /.box-body -->
</div>