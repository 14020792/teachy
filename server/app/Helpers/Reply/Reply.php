<?php

namespace App\Helpers\Reply;


class Reply
{
    private $msg = [
        'get_assessments_success' => 'Get assessments successfully',
        'get_subjects_success' => 'Get subjects list successfully',
        'get_subject_success' => 'Get subject successfully',
        'get_criteria_success' => 'Get criteria successfully',
        'invalid_username' => 'Invalid username',
        'incorrect_password' => 'Incorrect password',
        'invalid_credentials' => 'Invalid credentials',
        'login_failed' => 'Failed to login',
        'login_success' => 'Login successfully',
        'register_failed' => 'Registration failed',
        'register_success' => 'Registered successfully',
        'token_failed' => 'Could not create token'
    ];

    public function reply($status, $m, $data = null, $code) {
        return response()->json([
            'status' => $status,
            'msg' => array_key_exists($m, $this->msg) ? $this->msg[$m] : $m,
            'data' => $data
        ], $code);
    }
}