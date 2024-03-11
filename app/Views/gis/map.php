<style>
    #map {
        height: 50vh;
    }

    .isi-peta {
        color: #6f42c1 !important;
        border: 1px solid #dee6ee;
        border-radius: 5px;
        padding: 5px;
        font-weight: bold;
    }
</style>

<!-- <form action="<?= base_url('gis/cari-lokasi') ?>" method="get"> -->
<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="">Cari Lokasi RTLH <small class="text-warning"><em> * optional </em></small></label>
            <input type="text" name="nama_lokasi" id="nama-filter" class="form-control" placeholder="Inputkan Nama Lokasi" value="<?= isset($param) ? $param : '' ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Cari Desa <small class="text-warning"><em> * optional </em></small></label>
            <select name="desa" id="desa-filter" class="form-control select2">
                <option value=""> -- PILIH DESA -- </option>
                <?php foreach ($desa as $var) : ?>
                    <option value="<?= $var->kode_desa ?>" <?= $select == $var->kode_desa ? 'selected' : '' ?>><?= $var->nama_desa ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="" class="w-100">&nbsp;</label>
            <button id="filterButton" class="btn btn-warning"><i class="fa fa-map"></i> Cari Lokasi</button>
        </div>
    </div>
</div>
<!-- </form> -->
<div class="row mb-3">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div id="map"></div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <hr>
        <h5><i class="fas fa-map"></i> DATA RTLH</h5>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="bg-primary text-light p-1 text-center">No</th>
                        <th class="bg-primary text-light p-1 text-center">Gambar</th>
                        <th class="bg-primary text-light p-1 text-center">NIK</th>
                        <th class="bg-primary text-light p-1 text-center">KK</th>
                        <th class="bg-primary text-light p-1 text-center">Nama Lengkap</th>
                        <th class="bg-primary text-light p-1 text-center">Desa</th>
                        <th class="bg-primary text-light p-1 text-center">Alamat</th>
                        <th class="bg-primary text-light p-1 text-center">Status Tanah</th>
                        <th class="bg-primary text-light p-1 text-center">Bukti Kepemilikan</th>
                        <th class="bg-primary text-light p-1 text-center">Status Bangunan</th>
                    </tr>
                </thead>
                <tbody id="body-detail">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-map"></i> Detil Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <img id="gambar_lokasi" src="<?= base_url('assets/img/default-map.jpg') ?>" alt="" class="w-100" style="max-height: 300px;">
                        <hr>
                        <div class="row">
                            <div class="col-8">
                                <small>Nama Lokasi</small>
                                <p class="isi-peta" id="nama_lokasi"></p>
                            </div>
                            <div class="col-4">
                                <small>Tahun</small>
                                <p class="isi-peta" id="tahun"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small>Desa</small>
                                <p class="isi-peta" id="desa_lokasi"></p>
                            </div>
                            <div class="col-6">
                                <small>Kecamatan</small>
                                <p class="isi-peta" id="kecamatan_lokasi"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <small>Alamat</small>
                                <p class="isi-peta" id="alamat"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small>Status Tanah</small>
                                <p class="isi-peta" id="status_tanah"></p>
                            </div>
                            <div class="col-6">
                                <small>Status Bangunan</small>
                                <p class="isi-peta" id="status_bangunan"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <small>Keterangan</small>
                                <p class="isi-peta" id="keterangan"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary col-12" class="close" data-dismiss="modal" aria-label="Close">TUTUP</button>
            </div>
        </div>
    </div>
</div>

<?= view('gis/js') ?>