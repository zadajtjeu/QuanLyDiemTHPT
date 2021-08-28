<?php
session_start();
ob_start();
require './../../../template/config.php';

header('Content-Type: application/json');


$response = [];

if((empty($_SESSION['username']) && empty($_SESSION['password']))) {
	$response['error'] = 'Xin lỗi, Phiên làm việc của bạn đã hết hạn. Vui lòng đăng nhập lại!';
}
else {
	if (!empty($_POST['maGV'])) {
		$maGV = (int)htmlspecialchars($_POST['maGV']);

		$taikhoan = array();
		$result = $mysqli->query('SELECT * FROM `taikhoan` WHERE `username`=\''.htmlspecialchars($_SESSION['username']).'\' AND `password`=\''.htmlspecialchars($_SESSION['password']).'\';');

		if ($result->num_rows > 0) {
			$taikhoan = $result->fetch_array(MYSQLI_ASSOC);
			if (in_array($taikhoan['role'], array('admin', 'manager'))) {
				$searchUser = $mysqli->query('SELECT * FROM `giaovien` WHERE `maGV`='.$maGV.';');
				if ($searchUser->num_rows == 0) {
					$response['error'] = 'Giáo viên không tồn tại!';
				} else {
					$delete = $mysqli->query('DELETE FROM `giaovien` WHERE `maGV` = '.$maGV.';');
					
					if ($delete) {
						$response['success'] = 'Xoá thành công.';

						//Gửi email
					} else {
						$response['error'] = 'Lỗi xoá dữ liệu! Giáo viên này có thể đang đảm nhận lớp học nào đó!';
					}
				}
			}else {
				$response['error'] = 'Bạn không có quyền xoá bản ghi này!';
			}
		}
		else {
			$response['error'] = 'Xin lỗi, Phiên làm việc của bạn đã hết hạn. Vui lòng đăng nhập lại!';
		}
	} else {
		$response['error'] = 'Lỗi dữ liệu!';
	}
	

}

echo json_encode($response);