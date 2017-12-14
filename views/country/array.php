<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Country;

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

$data = [
    ['id' => '123', 'name' => 'aaa', 'class' => 'x'],
    ['id' => '124', 'name' => 'bbb', 'class' => 'x'],
    ['id' => '345', 'name' => 'ccc', 'class' => 'y'],
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

    <!--检查键名的存在-->
    <!--参数1：key、参数2：所检数组、参数3：是否区分大小写-->
    <?= var_dump(ArrayHelper::keyExists('foo', $array, false)); ?>
    <br/>
    <!--获取列的值-->
    <?= var_dump(ArrayHelper::getColumn($data, 'id')); ?>
    <br/>
    <?php
        $result =  ArrayHelper::getColumn($data, function ($element) {
           return $element['id'];
        });
        var_dump($result);
    ?>
    <br>
    <!--重建数组索引-->
    <?php
        $result = ArrayHelper::index($data, 'id');
        print_r($result);
    ?>
    <br>
    <!--建立哈希表-->
    <?php
        print_r(ArrayHelper::map($data, 'id', 'name'));
        echo '<br>';
        print_r(ArrayHelper::map($data, 'id', 'name', 'class'));
    ?>
    <br>
    <!--多维排序-->
    <?php
        var_dump(ArrayHelper::multisort($data, ['id', 'name'], [SORT_ASC, SORT_DESC]));
    ?>
    <br>
    <!--检测数组类型-->
    <?php
        // 不指定键名的数组
        $indexed = ['Qiang', 'Paul'];
        var_dump(ArrayHelper::isIndexed($indexed));

        // 所有键名都是字符串
        $associative = ['framework' => 'Yii', 'version' => '2.0'];
        var_dump(ArrayHelper::isAssociative($associative));
    ?>
    <!--HTML的编码和解码-->
    <?php
        $encoded = ArrayHelper::htmlEncode($data);
        $decoded = ArrayHelper::htmlDecode($data);
    ?>
    <br>
    <!--对象转化为数组-->
    <?php
        $posts = Country::find()->limit(10)->all();
        $a = ArrayHelper::toArray($posts, []);
        var_dump($a);
    ?>