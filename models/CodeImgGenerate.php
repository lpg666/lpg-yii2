<?php
namespace app\models;

use yii\captcha\CaptchaAction;

class CodeImgGenerate extends CaptchaAction
{
    private $verifycode;

    public function __construct()
    {
        $this->init();
        $this->minLength = 4;
        $this->maxLength = 4;
        $this->width = 80;
        $this->height = 40;
    }

    //return image data//返回图片二进制
    public function inline(){
        return $this->renderImage($this->getPhrase());
    }

    //return image code//返回图片验证码
    public function getPhrase(){
        if($this->verifycode){
            return $this->verifycode;
        }else{
            return $this->verifycode = $this->generateVerifyCode();
        }
    }
}
?>