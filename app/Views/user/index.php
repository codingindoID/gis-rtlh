<div class="row mb-3">
    <div class="col">
        <a href="<?= base_url('users/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pengguna</a>
    </div>
</div>
<div class="table-responsive">
    <table class="table data-table">
        <thead>
            <tr class="text-center">
                <th width="5%">No</th>
                <th>Username</th>
                <th>Display Name</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($users as $var) : ?>
                <?php if ($var->id != session('session_id')) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $var->username ?></td>
                        <td><?= $var->display ?></td>
                        <td class="text-center">
                            <form action="<?= base_url('users/delete') ?>" method="post">
                                <input type="hidden" value="<?= $var->id ?>" name="id">
                                <a href="<?= base_url('users/edit/') . $var->id ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <button href="#" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>