<?php

namespace App\Helpers\Reply;


class Reply
{
    private $msg = [
        'register_failed' => 'Registration failed',
        'register_success' => 'Registered successfully'
    ];

    public function reply($status, $m, $data = null, $code) {
        return response()->json([
            'status' => $status,
            'msg' => array_key_exists($m, $this->msg) ? $this->msg[$m] : $m,
            'data' => $data
        ], $code);
    }
}