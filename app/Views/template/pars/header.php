<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= APPNAME ?></title>

    <script src="<?= base_url('assets/') ?>js/jquery-3.7.1.min.js"></script>
    <!-- select 2 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/jquery-selectric/selectric.css">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/fontawesome/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/components.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- MAP LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <div id="base_url" data-id="<?= base_url() ?>"></div>
    <style>
        .pointer {
            cursor: pointer;
        }

        .hover:hover {
            cursor: pointer;
            transform: scale(1.01);
        }

        .p-0 {
            padding: 0 !important;
        }

        .p-1 {
            padding: 5px !important;
        }

        .p-2 {
            padding: 8px !important;
        }
    </style>
</head>