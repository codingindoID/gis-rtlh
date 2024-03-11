<div class="row">
    <div class="col-6">
        <form action="<?= base_url('users/save') ?>" method="post">
            <div class="row">
                <input type="hidden" name="id" value="<?= old('id') ? old('id') : (isset($user->id) ? $user->id : '') ?>">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control <?= isset($validation['username']) ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= old('username') ? old('username') : (isset($user->username) ? $user->username : '') ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation['username']) ? $validation['username'] : '' ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Display Name</label>
                        <input name="display" rows="4" class="form-control <?= isset($validation['display']) ? 'is-invalid' : '' ?>" placeholder="Display Name" value="<?= old('display') ? old('display') : (isset($user->display) ? $user->display : '') ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation['display']) ? $validation['display'] : '' ?>
                        </div>
                    </div>
                </div>
                <?php if (!isset($user)) : ?>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input name="password" rows="4" class="form-control <?= isset($validation['password']) ? 'is-invalid' : '' ?>" placeholder="Tentukan Password">
                            <div class="invalid-feedback">
                                <?= isset($validation['password']) ? $validation['password'] : '' ?>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
    <?php if (isset($user)) : ?>
        <div class="col-6">
            <form action="<?= base_url('users/update-password') ?>" method="post">
                <input type="hidden" name="id" value="<?= isset($user->id) ? $user->id : '' ?>">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control <?= isset($validation['password']) ? 'is-invalid' : '' ?>" placeholder="password">
                        <div class="invalid-feedback">
                            <?= isset($validation['password']) ? $validation['password'] : '' ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    <?php endif ?>
</div>