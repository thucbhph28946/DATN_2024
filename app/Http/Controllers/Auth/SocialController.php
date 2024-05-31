<?php
/*
 * JobClass - Job Board Web Application
 * Copyright (c) BeDigit. All Rights Reserved
 *
 * Website: https://laraclassifier.com/jobclass
 * Author: BeDigit | https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - https://codecanyon.net/licenses/standard
 */

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Social\SaveProviderData;
use App\Http\Controllers\Auth\Helpers\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

/**
 * @group Social Auth
 */
class SocialController extends Controller
{
    use AuthenticatesUsers, SaveProviderData;

    private array $network = [
        'google'          => 'google',
    ];
    private array $networkChecker;

    private string $serviceNotFound = 'Mạng xã hội "%s" không có sẵn.';
    private string $serviceNotEnabled = 'Mạng xã hội "%s" không được kích hoạt.';
    private string $serviceError = "Lỗi không xác định. Dịch vụ không hoạt động.";

    public function __construct()
    {
        $this->networkChecker = [
            'google'          => (
                env('GOOGLE_CLIENT_ID')
                && env('GOOGLE_CLIENT_SECRET')
            ),
        ];
    }

    public function getProviderTargetUrl(string $provider)
    {
        $serviceKey = $this->network[$provider] ?? null;
        if (empty($serviceKey)) {
            $message = sprintf($this->serviceNotFound, $provider);
            return response()->json(['error' => $message], 404);
        }

        // Check if the Provider is enabled
        $providerIsEnabled = (array_key_exists($provider, $this->networkChecker) && $this->networkChecker[$provider]);
        if (!$providerIsEnabled) {
            $message = sprintf($this->serviceNotEnabled, $provider);

            return response()->json(['error' => $message], 404);
        }

        // Redirect to the Provider's website
        try {
            $socialiteObj = Socialite::driver($serviceKey)->stateless();
            return response()->json(['success' => true, 'message' => 'Get link thành công', 'url' => $socialiteObj->redirect()->getTargetUrl()]);
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            if (empty($message)) {
                $message = $this->serviceError;
            }
            return response()->json(['success' => false, 'message' => $message]);
        }
    }

    /**
     * Get user info
     *
     * @urlParam provider string required The provider's name - Possible values: facebook, linkedin, or google. Example: null
     *
     * @param $provider
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleProviderCallback($provider)
    {
        $serviceKey = $this->network[$provider] ?? null;
        if (empty($serviceKey)) {
            $message = sprintf($this->serviceNotFound, $provider);
            return response()->json(['error' => $message], 404);
        }

        try {
            // Lấy mã ủy quyền từ yêu cầu
            $authCode = request()->input('code');
            if (empty($authCode)) {
                return response()->json(['success' => false, 'message' => 'Authorization code không hợp lệ'], 400);
            }

            // Đổi mã ủy quyền lấy access token và thông tin người dùng
            $socialiteUser = Socialite::driver($serviceKey)->stateless()->user();

            if (!$socialiteUser) {
                return response()->json(['success' => false, 'message' => 'Lỗi không xác định vui lòng thử lại'], 500);
            }

            // Email not found
            if (!filter_var($socialiteUser->getEmail(), FILTER_VALIDATE_EMAIL)) {
                return response()->json(['success' => false, 'message' => 'Email không tồn tại', 'provider' => str($provider)->headline()]);
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            if (empty($message)) {
                $message = $this->serviceError;
            }
            return response()->json(['success' => false, 'message' => $message]);
        }

        // SAVE USER
        return $this->saveUser($provider, $socialiteUser);
    }
}
