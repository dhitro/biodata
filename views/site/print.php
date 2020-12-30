<h3>Laporan Biodata User</h3>


<table class="table table-striped mb-0">

    <tr>
        <th>Alamat</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>TTL</th>
        <th>Jenis Kelamin</th>
        <th>Status Kawin</th>
        <th>Agama</th>
        <th>Pekerjaan</th>
    </tr>
    <?php

    foreach ($model as $key => $value) {
    ?>
        <tr>
            <td>
                <?= $value['alamat'] . " " . $value['kabupaten'] . " " . $value['provinsi'] ?>

            </td>
            <td>
                <?= $value['nik'] ?>
            </td>
            <td>
                <a href="#" class="font-weight-600"><img src="assets/stisla/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> <?= $value['nama'] ?></a>
            </td>
            <td>
                <?= $value['tempatlahir'] ?> <br> <?= $value['tanggallahir'] ?>
            </td>

            <td>
                <?= $value['jkelamin'] == 'P' ? 'Perempuan' : 'Laki-laki' ?>
            </td>
            <td>
                <?= $value['statuskawin'] ?>
            </td>
            <td>
                <?= $value['agama'] ?>
            </td>
            <td>
                <?= $value['pekerjaan'] ?>
            </td>


        </tr>
    <?php }
    ?>
    <tr>

</table>