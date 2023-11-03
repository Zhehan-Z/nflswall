<?php

namespace app\common;

use think\Facade;
use think\facade\Session;
use think\facade\Request;
use think\facade\Db;

class BackEnd extends Facade
{
    /**
     * @description: 后端依API验证uuid并获取当前用户数据
     * @return {*}
     * @Author: github.com/zhiguai
     * @Date: 2022-12-29 18:57:00
     * @LastEditTime: Do not edit
     * @LastEditors: github.com/zhiguai
     */
    protected static function mArrayGetNowAdminAllData()
    {
        //整理数据
        $uuid = Request::param('uuid');
        if (empty($uuid)) {
            return array(400, '缺少uuid');
        }
        //查询数据
        $result = Db::table('admin')
            ->where('uuid', $uuid)
            ->find();
        //判断数据是否存在
        if (empty($result)) {
            return array(401, '当前uuid已失效请重新登入');
        } else {
            //返回用户数据
            return $result;
        }
    }

    /**
     * @description: 生成UUID
     * @return {*}
     * @Author: github.com/zhiguai
     * @Date: 2022-12-29 18:57:34
     * @LastEditTime: Do not edit
     * @LastEditors: github.com/zhiguai
     */
    protected static function mStringGenerateUUID()
    {
        $charid = md5(uniqid(mt_rand(), true));
        $hyphen = chr(45); // "-"
        $uuid = //chr(123) "{"
            substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12);
        //.chr(125); "}"
        return $uuid;
    }

    /**
     * @description: 编辑配置文件
     * @return {*}
     * @Author: github.com/zhiguai
     * @Date: 2023-07-18 15:16:37
     * @LastEditTime: Do not edit
     * @LastEditors: github.com/zhiguai
     * @param {*} $filename
     * @param {*} $data
     */
    protected static function mBoolCoverConfig($filename, $data, $free = false, $env = 'lovecards'): bool
    {
        $filename = '../config/' . $filename . '.php';
        $str_file = file_get_contents($filename);

        if ($free == true) {
            foreach ($data as $key => $value) {
                //构建正则匹配
                $pattern = "/env\('" . $env . "\." . $key . "',\s*([^']*)\)/";
                //判断是否成功匹配
                if (preg_match($pattern, $str_file)) {
                    //匹配成功更新
                    $str_file = preg_replace($pattern, "env('" . $env . "." . $key . "', " . $value . ")", $str_file);
                }
            }
        } else {
            foreach ($data as $key => $value) {
                //构建正则匹配
                $pattern = "/env\('" . $env . "\." . $key . "',\s*'([^']*)'\)/";
                //判断是否成功匹配
                if (preg_match($pattern, $str_file)) {
                    //匹配成功更新
                    $str_file = preg_replace($pattern, "env('" . $env . "." . $key . "', '" . $value . "')", $str_file);
                }
            }
        }

        //写入并返回结果
        if (!file_put_contents($filename, $str_file)) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * @description: 依Session实现的防抖
     * @return {*}
     * @Author: github.com/zhiguai
     * @Date: 2023-07-18 15:17:21
     * @LastEditTime: Do not edit
     * @LastEditors: github.com/zhiguai
     * @param {*} $setName
     * @param {*} $time
     */
    protected static function mRemindEasyDebounce($setName, $time = 6)
    {
        if (strtotime(date("Y-m-d H:i:s")) > strtotime(Session::get($setName))) {
            //符合要求
            $result = [true];
        } else {
            $result = [false, '您的操作太快了，稍后再试试试吧'];
        }
        //设置上次时间
        Session::set($setName, date("Y-m-d H:i:s", strtotime('+' . $time . ' second')));
        //返回结果
        return $result;
    }
}