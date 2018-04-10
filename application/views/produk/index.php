<div class="table-responsive">
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
                    <td><?=$produk->harga?></td>
                    <td>
        <?=anchor('Product/detail/'.$produk->id,'detail')?> 
                        | update | 
        <?=anchor(
            'Product/hapus_produk/'.$produk->id,
            'hapus',
            'onclick="return confirm(\'Hapus?\')"')?>
            <!-- <a href="" onclick="return confirm('Hapus?')">hapus</a> -->
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>