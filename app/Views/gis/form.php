<style>
    #map {
        height: 60vh;
    }
</style>
<h5><i class="fa fa-map"></i> Form Tambah Data LOKASI RTLH</h5>

<div class="row">
    <div class="col-6">
        <form action="<?= base_url('gis/save') ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <input type="hidden" name="id" value="<?= isset($map->id) ? $map->id : '' ?>">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nomor NIK</label>
                        <input type="text" name="nik" class="form-control" value="<?= isset($map->nik) ? $map->nik : '' ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Nomor KK</label>
                        <input type="text" name="kk" class="form-control" value="<?= isset($map->kk) ? $map->kk : '' ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama_lokasi" class="form-control" value="<?= isset($map->nama_lokasi) ? $map->nama_lokasi : '' ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Tahun</label>
                        <input type="text" name="tahun" class="form-control" value="<?= isset($map->tahun) ? $map->tahun : '' ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Status Tanah</label>
                        <input type="text" name="status_tanah" class="form-control" value="<?= isset($map->status_tanah) ? $map->status_tanah : '' ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Status Bangunan</label>
                        <input type="text" name="status_rumah" class="form-control" value="<?= isset($map->status_rumah) ? $map->status_rumah : '' ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <select name="kecamatan" required id="kecamatan" onchange="cariDesa(this)" class="form-control select2 w-100">
                            <option value=""> -- PILIH -- </option>
                            <?php foreach ($kecamatan as $var) : ?>
                                <option value="<?= $var->kode_kecamatan ?>" <?= isset($map->kecamatan) && $map->kecamatan == $var->kode_kecamatan  ? 'selected' : ''  ?>> <?= $var->nama_kecamatan ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Desa</label>
                        <select name="desa" required id="desa" class="form-control select2 w-100">
                            <option value=""> -- PILIH -- </option>
                            <?php if (isset($desa)) : ?>
                                <?php foreach ($desa as $var) : ?>
                                    <option value="<?= $var->kode_desa ?>" <?= $var->kode_desa == $map->desa ? 'selected' : '' ?>> <?= $var->nama_desa ?> </option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <textarea name="alamat" rows="5" class="form-control"><?= isset($map->alamat) ? $map->alamat : '' ?></textarea>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Latitude</label>
                        <input type="text" name="latitude" id="lat" class="form-control" value="<?= isset($map->latitude) ? $map->latitude : '' ?>">
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Longitude</label>
                        <input type="text" name="longitude" id="leng" class="form-control" value="<?= isset($map->longitude) ? $map->longitude : '' ?>">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Cek Titik</label>
                        <span onclick="cekMarker()" class="btn btn-warning col-12">Cek</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Keterangan Lokasi</label>
                        <textarea name="keterangan" rows="4" class="form-control"><?= isset($map->keterangan) ? $map->keterangan : '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Gambar Lokasi</label>
                        <input type="file" name="gambar" class="form-control <?= isset($validation['gambar']) ? 'is-invalid' : '' ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation['gambar']) ? $validation['gambar'] : '' ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-6">
        <div id="map"></div>
    </div>
</div>

<script>
    let base = $('#base_url').data('id')
    let latitude = $('#lat').val()
    let longitude = $('#leng').val()

    latitute = latitude ? latitude : "-6.5897518";
    longitude = longitude ? longitude : "110.6651467";
    let latleng = [latitute, longitude]
    let map = L.map('map').setView(latleng, 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Dev By : <a target="__blank" href="https://pengenngoding.com">PengenNgoding</a>',
        maxZoom: 20,
        id: 'mapbox/satellite-streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiY29kaW5naW5kb2plcGFyYSIsImEiOiJjbDA2cDM1NWgwNGIwM2JwZDNsdzltMTdjIn0.wt3TChqH_CNIvj5PsgzwXA'
    }).addTo(map);

    let marker = L.marker(latleng).addTo(map);
    map.on('click', function(e) {
        lat = e.latlng.lat;
        lon = e.latlng.lng;
        if (marker != undefined) {
            map.removeLayer(marker);
        };

        //Add a marker to show where you clicked.
        marker = L.marker([lat, lon]).addTo(map);
        $('#lat').val(lat)
        $('#leng').val(lon)
    });

    function cariDesa(ctx) {
        let id_kecamatan = $(ctx).val()
        $('#desa').html("")
        $.ajax({
            type: "get",
            url: `${base}ajax-get-desa/${id_kecamatan}`,
            dataType: "json",
            success: function(response) {
                let html = '<option> -- PILIH DESA -- </option>'
                for (let index = 0; index < response.length; index++) {
                    html += `<option value="${response[index].kode_desa}"> ${response[index].nama_desa} </option>`
                }
                $('#desa').html(html)
            }
        });
    }

    function cekMarker() {
        let lat = $('#lat').val()
        let lon = $('#leng').val()
        if (marker != undefined) {
            map.removeLayer(marker);
        };

        //Add a marker to show where you clicked.
        marker = L.marker([lat, lon]).addTo(map);
        $('#lat').val(lat)
        $('#leng').val(lon)
    }
</script>