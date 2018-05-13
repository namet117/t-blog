<?php
/**
 * Created by PhpStorm.
 * User: namet
 * Date: 2018/5/12
 * Time: 23:17
 */

namespace App\Services;

class UserService extends BaseService
{
    public function loginByOauth2($uid, $oauth_name)
    {
        $oauth_info = OauthUser::where(compact('uid', 'oauth_name'))->first();

        if (!$oauth_info) {
            return false;
        }

        return $this->loginByUserId($oauth_info['user_id']);
    }

    public function createUserByOauth2($infos)
    {
        $user = User::create([
            'username' => $infos['uname'],
            'avatar' => $infos['avatar'],
            'remember_token' => bcrypt($infos['uname'] . '#' . time()),
            'api_token' => mt_rand(1000000, 9999999),
        ]);

        $oauth_info = OauthUser::create([
            'user_id' => $user->id,
            'oauth_name' => $infos['oauth_name'],
            'uid' => $infos['uid'],
            'uname' => $infos['uname'],
            'avatar' => $infos['avatar'],
            'access_token' => $infos['access_token'],
            'expire_time' => $infos['expire_time'],
            'refresh_token' => $infos['refresh_token'] ?? '',
            'extends' => json_encode($infos),
        ]);
        
    }
}
