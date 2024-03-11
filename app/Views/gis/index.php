<div class="row">
    <div class="col-12">
        <a href="<?= base_url('gis/add') ?>" class="btn btn-primary mb-3"><i class="fa fa-map"></i> Tambah Data</a>
        <a href="<?= base_url('gis/map') ?>" class="btn btn-info mb-3"><i class="fa fa-map"></i> Lihat Map</a>
        <div class="table-responsive">
            <table class="table data-table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Lengkap</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Alamat</th>
                        <th>Tahun</th>
                        <th>Status Tanah</th>
                        <th>Status Rumah</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Keterangan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($map as $var) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td>
                                <?php
                                $src = base_url('assets/img/default-map.jpg');
                                if ($var->gambar != null) {
                                    $src = base_url(PATHUPLOADMAP) . $var->gambar;
                                }
                                ?>
                                <img src="<?= $src  ?>" alt="<?= $var->nama_lokasi ?>" class="w-100" style="max-width: 100px;">
                            </td>
                            <td><?= $var->nama_lokasi ?></td>
                            <td><?= $var->nama_desa ?></td>
                            <td><?= $var->nama_kecamatan ?></td>
                            <td><?= $var->alamat ?></td>
                            <td><?= $var->tahun ?></td>
                            <td><?= $var->status_tanah ?></td>
                            <td><?= $var->status_rumah ?></td>
                            <td><?= $var->latitude ?></td>
                            <td><?= $var->longitude ?></td>
                            <td><?= $var->keterangan ?></td>
                            <td class="text-center">
                                <form action="<?= base_url('gis/delete') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $var->id ?>">
                                    <a href="<?= base_url('gis/edit/') . $var->id ?>" class="btn btn-xs btn-warning">Edit</a>
                                    <button type="sumbit" class="btn btn-xs btn-danger">hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>