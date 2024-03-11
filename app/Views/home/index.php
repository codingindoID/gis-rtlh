<div class="row">
    <div class="col-md-3">
        <div class="card card-body hover bg-primary position-relative" onclick="location.href='<?= base_url('gis') ?>'">
            <p>LOKASI RTLH</p>
            <h2><?= $countrtlh ?></h2>
            <img src="<?= base_url('assets/img/map.png') ?>" alt="" class="w-100 position-absolute" style="max-width: 100px; right: 10px; top: 10px;">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body hover bg-info position-relative" onclick="location.href='<?= base_url('users') ?>'">
            <p>PENGGUNA APLIKASI</p>
            <h2><?= $countuser ?></h2>
            <img src="<?= base_url('assets/img/man.png') ?>" alt="" class="w-100 position-absolute" style="max-width: 100px; right: 10px; top: 10px;">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body hover bg-warning position-relative">
            <p>KECAMATAN</p>
            <h2><?= $countuser ?></h2>
            <img src="<?= base_url('assets/img/barn.png') ?>" alt="" class="w-100 position-absolute" style="max-width: 100px; right: 10px; top: 10px;">
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body hover bg-danger position-relative">
            <p>DESA</p>
            <h2><?= $countuser ?></h2>
            <img src="<?= base_url('assets/img/farm.png') ?>" alt="" class="w-100 position-absolute" style="max-width: 100px; right: 10px; top: 10px;">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-striped data-table">
                <thead>
                    <tr class="text-center">
                        <th class="p-2 bg-primary text-white">No</th>
                        <th class="p-2 bg-primary text-white">Kecamatan</th>
                        <th class="p-2 bg-primary text-white">Total Data RTLH</th>
                        <th class="p-2 bg-primary text-white">aksi</th>
                    </tr>
                </thead>
                <tbody id="body-data">
                    <?php $no = 1  ?>
                    <?php foreach ($gis as $var) : ?>
                        <tr>
                            <td class="text-center p-1"><?= $no++ ?></td>
                            <td class="p-1"><b><?= $var->nama_kecamatan ?></b></td>
                            <td class="text-center p-1"><?= $var->total ?></td>
                            <td class="p-1 text-center">
                                <a class="btn btn-sm btn-primary" href="<?= base_url('gis') ?>"><i class="fa fa-map"></i> Lihat Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>