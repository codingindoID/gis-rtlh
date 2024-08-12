<script>
    let nama_lokasi = $('#nama_filter').val()
    let desa = $('#desa_filter').val()
    let base_url = $('#base_url').data('id')
    let latitude = $('#lat-cari').data('val')
    let longitude = $('#long-cari').data('val')
    latitude = latitude ? latitude : "-6.5897518";
    longitude = longitude ? longitude : "110.6651467";

    let latleng = [latitude, longitude]
    let map = L.map('map', {
        scrollWheelZoom: false,
    }).setView(latleng, 12);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Dev By : <a target="__blank" href="https://pengenngoding.com">GIS-RTLH</a>',
        maxZoom: 20,
        id: 'mapbox/satellite-streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiY29kaW5naW5kb2plcGFyYSIsImEiOiJjbDA2cDM1NWgwNGIwM2JwZDNsdzltMTdjIn0.wt3TChqH_CNIvj5PsgzwXA'
    }).addTo(map);
    let layerGroup = new L.LayerGroup();
    layerGroup.addTo(map);

    let marker = [];


    filterButton.addEventListener('click', () => {
        filterMap()
    })

    function filterMap() {
        let nama_lokasi = $('#nama-filter').val()
        let desa = $('#desa-filter').val()
        $('#body-detail').html("");
        fetch(base_url + 'gis/filter-peta', {
                method: 'post',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'nama_lokasi': nama_lokasi,
                    'desa': desa
                })
            })
            .then(response => response.json())
            .then(data => {
                /* reset Layer Marker */
                if (marker.length > 0) {
                    for (let i = 0; i < marker.length; i++) {
                        map.removeLayer(marker[i]);
                    }
                }
                /* show Data Marker */
                dataMarker(data['lokasi']);

                /* Tabel */
                $('#body-detail').html(data['table'])
            })
            .catch(err => console.log(err))
    }

    function dataMarker(data) {
        let lat = "";
        let leng = "";

        for (let index = 0; index < data.length; index++) {
            let latLeng = [data[index]['latitude'], data[index]['longitude']];
            let iconMarker = L.icon({
                iconUrl: `${base_url}assets/img/house.png`,
                iconSize: [30, 30]
            });

            let layerMarker = L.marker(latLeng, {
                icon: iconMarker
            }).addTo(map);
            marker.push(layerMarker);

            lat = data[index]['latitude'];
            leng = data[index]['longitude'];
            /* setOnclick Pada Marker */
            layerMarker.addEventListener('click', function(e) {
                $.ajax({
                    type: "post",
                    url: `${base_url}gis/detail-peta`,
                    data: {
                        id: data[index].id
                    },
                    dataType: "json",
                    success: function(response) {
                        let image = response.gambar ?
                            'uploads/map/' + response.gambar :
                            'assets/img/default-map.jpg';
                        $('#gambar_lokasi').attr("src", base_url + image);
                        $('#nama_lokasi').text(response.nama_lokasi)
                        $('#desa_lokasi').text(response.nama_desa)
                        $('#kecamatan_lokasi').text(response.nama_kecamatan)
                        $('#alamat').text(response.alamat)
                        $('#tahun').text(response.tahun)
                        $('#status_tanah').text(response.status_tanah)
                        $('#status_bangunan').text(response.status_rumah)
                        $('#keterangan').text(response.keterangan)
                        let location = `https://www.google.com/maps?q=${response.latitude},${response.longitude}`;
                        $('#direction').attr('href', location)
                    }
                });
                $('#modalMap').modal('show')
            })
        }
        map.setView([lat, leng], 15);
    }

    function modalDetail(ctx) {
        let id = $(ctx).data('id')
        $.ajax({
            type: "post",
            url: `${base_url}gis/detail-peta`,
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                let image = response.gambar ?
                    'uploads/map/' + response.gambar :
                    'assets/img/default-map.jpg';
                $('#gambar_lokasi').attr("src", base_url + image);
                $('#nama_lokasi').text(response.nama_lokasi)
                $('#desa_lokasi').text(response.nama_desa)
                $('#kecamatan_lokasi').text(response.nama_kecamatan)
                $('#alamat').text(response.alamat)
                $('#tahun').text(response.tahun)
                $('#status_tanah').text(response.status_tanah)
                $('#status_bangunan').text(response.status_rumah)
                $('#keterangan').text(response.keterangan)
                $('#direction').attr('href', location)
            }
        });
        $('#modalMap').modal('show')
    }
</script>