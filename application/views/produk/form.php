
<?=form_open('product/add')?>
  <?=validation_errors('<div class="alert alert-danger" role="alert">','</div>');?>
 

  <div class="form-group">
    <label for="jenis_product">Jenis Produk</label> 
    <?php //$ar_jenis=array('Elektronik','Pakaian','Otomotif');?>
    <?=form_dropdown('jenis_product',
        $ar_jenis,
        set_value('jenis_product'),
        'class="form-control"')?>
        <?=form_error('jenis_product','<small class="text-danger">','</small>')?>
  </div>
  <div class="form-group">
    <label for="kategori_product">Kategori Produk</label> 
    <?=form_dropdown('kategori_product',
        '',
        set_value('kategori_product'),
        'class="form-control"')?>
        <?=form_error('kategori_product','<small class="text-danger">','</small>')?>
  </div>

  <div class="form-group">
    <label for="nama_product">Nama Produk</label>
    <?=form_input('nama_product',
        set_value('nama_product'),
        'class="form-control" placeholder="Nama Produk"')?>
    <small id="namaHelp" class="form-text text-muted">
        Tuliskan nama Produk</small>
        <?=form_error('nama_product','<small class="text-danger">','</small>')?>
  </div>

  <div class="form-group">
    <label for="harga">Harga</label>
    <?=form_input('harga',
        set_value('harga'),
        'class="form-control" placeholder="Harga"')?>
    <small id="hargaHelp" class="form-text text-muted">
        Tuliskan harga Produk</small>
        <?=form_error('harga','<small class="text-danger">','</small>')?>
  </div>
  <div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <?=form_textarea('deskripsi',
        set_value('deskripsi'),
        'class="form-control" placeholder="Deskripsi"')?>
    <small id="deskripsiHelp" class="form-text text-muted">
        Tuliskan Deskripsi Produk</small>
        <?=form_error('deskripsi','<small class="text-danger">','</small>')?>
  </div>
  <?=form_submit('submit','Simpan','class="btn btn-primary"')?>
  <?=form_reset('submit','Clear','class="btn btn-primary"')?>
<?=form_close()?>

<script>
    $('select[name="jenis_product"]').on('change',function(){
        var dipilih = $(this).val();
        console.log('Dipilih:',dipilih);
        $.ajax({
            url:"<?=site_url()?>"+"/product/cari_kategori/"+dipilih,
            type:'GET',
            success:function(data){
                //hapus isi kategori
                $('select[name="kategori_product"]').empty();
                //isi dropdown kategori
                $.each(JSON.parse(data),function(k,v){
                    $('select[name="kategori_product"]')
                    .append('<option value="'+k+'">'+v+'</option>');
                })
                
            }
        });
    });
</script>