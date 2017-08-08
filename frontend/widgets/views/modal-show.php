<?php
/**
 * Created by PhpStorm.
 * User: TuanPV
 * Date: 8/6/2017
 * Time: 6:43 PM
 */

?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Đặt lịch chăm sóc tại Monalisa spa</h4>
            </div>
            <div class="modal-body">
                <form>
                    <fieldset>
                        <div class="form-group form-group-fullname">
                            <label class="control-label" for="fullname">Họ và tên (*): </label>
                            <input type="text" class="form-control" name="full_name" id="full_name"
                                   placeholder="Nhập họ và tên">
                            <p id="name_full" style="color: red">Họ và tên không được để trống</p>
                        </div>
                        <div class="form-group form-group-message">
                            <label class="control-label" for="message">Số điện thoại (*):</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                            <p id="error_phone_empty" style="color: red">Số điện thoại không được để trống</p>
                            <p id="error_phone_incorect" style="color: red">Số điện thoại không đúng định dạng</p>

                        </div>
                        <div class="form-group form-group-message">
                            <label class="control-label" for="start_time">Thời gian (*): </label>
                            <div class="input-group date form_datetime col-md-5" data-date-format="dd/mm/yyyy HH:ii p" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input name="start_time" type="hidden" id="dtp_input1" value="" /><br/>
                            <p id="error_time_empty" style="color: red">Thời gian không được để trống</p>
                            <p id="error_time_incorect" style="color: red">Thời gian đặt không được là quá khứ</p>
                        </div>
                        <div class="form-group form-group-message">
                            <label class="control-label" for="message">Loại dịch vụ (*):</label>
                            <select name="cars" class="form-control">
                                <?php if ($array_dv) {
                                    foreach ($array_dv as $item) {
                                        ?>
                                        <option id="id_dv" name="id_dv" value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group form-group-email">
                            <label class="control-label" for="old">Tuổi: </label>
                            <input type="text" class="form-control" name="old" id="old" placeholder="Nhập số tuổi">
                            <p style="color:red;" id="error_old">Tuổi phải là số</p>
                        </div>
                        <p id="error_validate" style="color:red;"> Vui lòng nhập các trường bắt buộc có dấu * </p>
                    </fieldset>
                </form>
                <button type="submit" id="btn" class="btn btn-primary">Đặt lịch</button>
            </div>
        </div>
    </div>
</div>
