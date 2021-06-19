<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-pass" name="form">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="password_new">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="password_new" placeholder="Mật khẩu mới" name="password_new">
                    </div>
                    <div class="form-group">
                        <label for="res_password">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="res_password" placeholder="Nhập lại mật khẩu" name="res_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submit-form">Đổi mật khẩu </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
