      <!-- Main Content -->
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <?php
      $count = count($model);

      $label = $level == 1 ? 'Data User Keseluruhan' : 'Data Diri Anda';

      ?>
      <div class="col-12 col-sm-12 mx-auto">
        <div class="card">

          <div class="card-header">

            <h4><?= $label ?></h4>
            <?= $entry = $count > 0 || empty($search) ? "" : "<a class='btn btn-danger btn-lg' href='index.php?r=biodata/create'>  Entry data  </a>" ?>
            <?= $cari = $level == 1 ? "
            <form><input class='form-control' name='search' type='search' placeholder='Search' aria-label='Search' data-width='350'>
            <small>Cari Berdarsarkan Kata Kunci </small><button class='btn' type='submit'><i class='fas fa-search'></i></button>
            </form>
            " : ""; ?>
          </div>

          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  foreach ($model as $key => $value) {
                  ?>

                    <td>
                      <?= $value['alamat'] ?>
                      <div class="table-links">
                        <?= $value['provinsi'] ?>
                        <div class="bullet"></div>
                        <?= $value['kabupaten'] ?>
                      </div>
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
                      <a href="index.php?r=biodata%2Fupdate&id=<?= $value['id'] ?>" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                      <a href="index.php?r=biodata%2Fdelete&id=<?= $value['id'] ?>" data-method="post" class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-trash"></i></a>
                    </td>

                    </tr>
                  <?php }
                  ?>
                  <tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>