<?php

namespace app\api\controller;

//公共类
use app\Common\Common;

class Upload
{
    //上传图片-POST
    public function image()
    {
        // 获取表单上传文件
        $file = request()->file('file');

        //验证
        try {
            validate(['file' => [     //file是你自定义的键名，目的是为了对check里数组中的
                'fileSize' => 1024 * 1000 * 2, //允许文件大小
                'fileExt'  => array('jpg', 'png'),  //文件后缀
                //'fileMime' => array('jpg', 'png'),  //文件类型
            ]])->check(['file' => $file]); //对上传的$file进行验证

            $saveName = \think\facade\Filesystem::disk('public')->putFile('image', $file); //保存文件名

            return Common::create($saveName, '上传成功', 200);
        } catch (\Exception $e) {
            return Common::create($e->getMessage(), '上传失败', 400);
        }

        //返回数据
        //return Common::create([], '添加成功', 200);
    }
}
