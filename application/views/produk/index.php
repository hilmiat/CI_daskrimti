<div class="table-responsive">
    <?=anchor('product/add','<span data-feather="plus-square"></span>Tambah produk')?>
    <?=form_open()?>
    <?=form_input('search','','placeholder="Cari..."')?>
    <?=form_submit('cari','Cari')?>
    <?=form_close()?>

    <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td> <td>Nama</td> <td>Harga</td> <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_produk as $key => $produk):?>
                <tr>
                    <td><?=$key+1?></td>
                    <td><?=$produk->nama_product?></td>
                    <td align="right"><?=number_format($produk->harga,2,',','.')?></td>
                    <td>
                        <?=anchor('Product/detail/'.$produk->id,'<span data-feather="eye"></span> detail')?> 
                        |  
                        <?=anchor('Product/update/'.$produk->id,'<span data-feather="edit"></span>update')?>  
                        | 
                        <?=anchor(
                            'Product/hapus_produk/'.$produk->id,
                            '<span data-feather="trash"></span>hapus',
                            'onclick="return confirm(\'Hapus?\')"')?>
            <!-- <a href="" onclick="return confirm('Hapus?')">hapus</a> -->
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>