<?php

namespace App\Helpers\Reply;


class Reply
{
    private $msg = [
        'assess_success' => 'Đánh giá thành công',
        'comment_success' => 'Gửi bình luận thành công',
        'get_assessments_success' => 'Get assessments successfully',
        'get_subjects_success' => 'Get subjects list successfully',
        'get_subject_success' => 'Get subject successfully',
        'get_criteria_success' => 'Get criteria successfully',
        'get_profile_success' => 'Get user profile successfully',
        'get_comments_success' => 'Get comments successfully',
        'invalid_username' => 'Tên người dùng không chính xác',
        'incorrect_password' => 'Mật khẩu không chính xác',
        'invalid_credentials' => 'Invalid credentials',
        'login_failed' => 'Đăng nhập không thành công',
        'login_success' => 'Đăng nhập thành công',
        'register_failed' => 'Đăng kí không thành công',
        'register_success' => 'Đăng kí thành công',
        'token_failed' => 'Could not create token',
        'update_failed' => 'Cập nhật tài khoản không thành công',
        'update_success' => 'Cập nhật tài khoản thành công'
    ];

    public function reply($status, $m, $data = null, $code) {
        return response()->json([
            'status' => $status,
            'msg' => array_key_exists($m, $this->msg) ? $this->msg[$m] : $m,
            'data' => $data
        ], $code);
    }
}