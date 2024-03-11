<div class="row">
    <div class="col-6">
        <form action="<?= base_url('users/save-profile') ?>" method="post">
            <div class="row">
                <input type="hidden" name="id" value="<?= old('id') ? old('id') : $profile->id ?>">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control <?= isset($validation['username']) ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= old('username') ? old('username') : $profile->username  ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation['username']) ? $validation['username'] : '' ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Display Name</label>
                        <input name="display" rows="4" class="form-control <?= isset($validation['display']) ? 'is-invalid' : '' ?>" placeholder="Display Name" value="<?= old('display') ? old('display') : $profile->display ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation['display']) ? $validation['display'] : '' ?>
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
        <form action="<?= base_url('users/update-password') ?>" method="post">
            <input type="hidden" name="id" value="<?= isset($profile->id) ? $profile->id : '' ?>">
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
</div>