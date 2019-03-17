<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DANH SÁCH SINH VIÊN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="/phpdemo/view/asset/js/list.js"></script>

</head>

<body>
<div class="container">
    <h2>Danh sách sinh viên</h2>
    <button type="button" id="addBtn" class="btn btn-primary" style="margin-bottom: 20px">Tạo mới</button>
    <table class="table table-striped table-bordered table-hover" cellspacing="0" id="tblStudent">
        <thead>
        <tr>
            <th><input type="checkbox" id = "checkAll">  </th>
            <th>Mã sv</span></th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Khoa</th>
            <th>Chuyên ngành</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button type="button" class="btn btn-primary" id ="deleteStud">Xóa</button>
</div>

<!-- Modal add new-->
<div class="modal fade" id="modalStudent" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id = "addTil">Tạo mới sinh viên</h4>
                <h4 class="modal-title" id = "updateTil" >Cập nhật sinh viên</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id = "studentForm" method="post">

                    <input type="hidden" id="key" value =""/>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="student_id" required>Mã sinh viên*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="maSv"  name="student_id">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="student_name" required>Họ tên*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hoTen"  name="student_name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="gioiTinh" required>Giới tính*</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="gioiTinh" name = "sex"/>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="ngaySinh" required>Ngày sinh*</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="ngaySinh" name="birth_date" value=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="diaChi">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="diaChi"  name="address"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="soDt" required>Số điện thoại*</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="soDt"  name="phone"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2" for="khoa" required>Khoa*</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="khoa" name ="department_id">
                                <?php
                                foreach($departmentList as $item){
                                    echo '<option value="'.$item['department_id'].'">'.$item['department_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="chuyenNganh" required>Chuyên ngành*</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="chuyenNganh" name ="major_id">
                                <?php
                                foreach($majorList as $item){
                                    echo '<option value="'.$item['major_id'].'">'.$item['major_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id ="submitBtn">Thêm</button>
                <button type="submit" class="btn btn-default" id ="updateBtn" >Cập nhật</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>