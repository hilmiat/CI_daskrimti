<?= anchor('welcome/test','Pindah ke welcome-test')?>
<table border=1>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data_siswa as $k=>$siswa): ?>
        <tr>
            <td><?=$k+1?></td>
            <td><?=anchor('home/detail/'.$k,$siswa['nama'])?></td>
            <td><?=$siswa['alamat']?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>