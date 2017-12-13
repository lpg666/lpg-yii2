<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Array助手';
$this->params['breadcrumbs'][] = $this->title;

class User
{
    public $name = 'Alex';
}

$array = [
    'foo' => [
        'bar' => new User(),
    ]
];
?>
    <h2>Array助手demo</h2>

    <!--获取值-->
        <!--点号分割的数组键名或对象属性组成的字符串-->
        <?= ArrayHelper::getValue($array, 'foo.bar.name', '默认为null'); ?>
        <!--返回一个值的回调函数-->
        <?php
            $fullName = ArrayHelper::getValue($array, function ($array, $defaultValue) {
                return $array['foo']['bar']->name;
            });
            echo '<br/>'.$fullName.'<br/>';
        ?>
        <!--取值后立刻删除-->
        <?= $type = ArrayHelper::remove($array, 'type'); ?>