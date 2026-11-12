<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Kiểm tra xem email đã tồn tại chưa
            $existingUser = \App\Models\User::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email này đã được sử dụng!'
                ], 200);
            }

            // Tạo mới user (Dùng đúng cột full_name như trong phpMyAdmin của bạn)
            \App\Models\User::create([
                'full_name' => $request->full_name, // Chỉnh lại từ 'name' thành 'full_name'
                'email' => $request->email,
                'password' => $request->password,   // Lưu mật khẩu dạng thô trước để dễ test đăng nhập ở bước sau
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký tài khoản thành công!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Lỗi Server: ' . $e->getMessage()
            ], 200);
        }
    }  
}