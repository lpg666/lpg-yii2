<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

$this->title = 'Html助手';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h2>Html助手demo</h2>

    <!--生成标签-->
        <!--参数1：标签名、参数2：内容需使用Html::encode()、参数3：属性数组-->
        <?= Html::tag('p', Html::encode($this->title), ['class' => 'username']); ?>

    <div style="width: 100%; height: 1px; background: #000; margin: 10px 0;"></div>

    <!--生成css类和样式-->
    <!--根据数据使用样式和类-->
    <?php
        //class
        $options = ['class' => 'btn btn-default'];
        if ($this->title === 'success') {
            Html::removeCssClass($options, 'btn-default');
            Html::addCssClass($options, 'btn-success');
        }
        echo Html::tag('div', 'CLass', $options);

        //style
        $options1 = ['style' => ['width' => '100px', 'height' => '100px'], 'class' => 'btn btn-default'];
        Html::addCssStyle($options1, 'height: 200px; position: absolute; margin-left: 20px;');
        Html::removeCssStyle($options1, ['width', 'height']);
        echo Html::tag('div', 'Style', $options1);
    ?>
    <?= Html::tag('div', '', ['style' => 'clear: both;']); ?>

    <div style="width: 100%; height: 1px; background: #000; margin: 10px 0;"></div>

    <!--标签内容的转码和解码-->
    <?php
        $userName = Html::encode($this->title);
        echo $userName;
        $decodedUserName = Html::decode($userName);
    ?>

    <div style="width: 100%; height: 1px; background: #000; margin: 10px 0;"></div>

    <!--生成表单-->
        <!--表单-->
        <!--参数1：请求地址、参数2：请求方式、参数3：属性设置-->
        <?= Html::beginForm(['url', 'id' => '88'], 'post', ['enctype' => 'multipart/form-data']); ?>
        <?= Html::endForm(); ?>
        <br/>
        <!--按钮-->
        <?= Html::button('Button', ['class' => 'button']) ?>
        <?= Html::submitButton('Submit', ['class' => 'submit']) ?>
        <?= Html::resetButton('Reset', ['class' => 'reset']) ?>
        <br/>
        <!--输入栏-->
        <!--type, input name, input value, options-->
        <?= Html::input('text', 'username', 1111, ['class' => 'aaa']) ?>
        <!--type, model, model attribute name, options-->
        <?= Html::activeInput('text', $model, 'name', ['class' => 'bbb']) ?>
        <br/>
        <!--便捷类型-->
        <?= Html::buttonInput('button', ['class' => 'bbb']) ?>
        <?= Html::submitInput('submit', ['class' => 'bbb']) ?>
        <?= Html::resetInput('reset', ['class' => 'bbb']) ?>

        <?= Html::textInput('username', 2222, ['class' => 'bbb']) ?>
        <?= Html::activeTextInput($model, 'code', ['class' => 'bbb']) ?>

        <?= Html::hiddenInput('username', 2222, ['class' => 'bbb']) ?>
        <?= Html::activeHiddenInput($model, 'code', ['class' => 'bbb']) ?>

        <?= Html::passwordInput('username', 2222, ['class' => 'bbb']) ?>
        <?= Html::activePasswordInput($model, 'code', ['class' => 'bbb']) ?>

        <?= Html::fileInput('username', 2222, ['class' => 'bbb']) ?>
        <?= Html::activeFileInput($model, 'code', ['class' => 'bbb']) ?>

        <?= Html::textarea('username', 2222, ['class' => 'bbb']) ?>
        <?= Html::activeTextarea($model, 'code', ['class' => 'bbb']) ?>
        <br/>
        <!--单选和多选-->
        <?= Html::radio('name', true, ['label' => 'I agree', 'value' => 88]); ?>
        <?= Html::activeRadio($model, 'name', ['class' => 'agreement', 'value' => 88]); ?>

        <?= Html::checkbox('name', true, ['label' => 'I agree']); ?>
        <?= Html::activeCheckbox($model, 'name', ['class' => 'agreement']); ?>
        <br/>
        <!--Select和Select多列-->
        <?= Html::dropDownList('list', 'AU1', ArrayHelper::map([['code' => 'AU', 'name' => 'Australia'], ['code' => 'AU1', 'name' => 'Australia1'], ['code' => 'AU2', 'name' => 'Australia2']], 'code', 'name'), ['class' => 'mmm']) ?>
        <?= Html::activeDropDownList($model, 'code', ArrayHelper::map($data, 'code', 'name')); ?>

        <?= Html::listBox('list', 'AU1', ArrayHelper::map($data, 'code', 'name')); ?>
        <?= Html::activeListBox($model, 'code', ArrayHelper::map($data, 'code', 'name')); ?>
        <br/>
        <!--Labels和Errors-->
        <?= Html::label('User name', 'username', ['class' => 'label username']) ?>
        <?= Html::activeLabel($model, 'name', ['class' => 'label username']) ?>

        <?= Html::errorSummary($model, ['class' => 'errors']) ?>
        <?= Html::error($model, 'name', ['class' => 'errors']) ?>
        <br/>
    <!--样式表和脚本-->
        <!--内联-->
        <?= Html::style('.danger { color: #f00; }') ?>
<!--            <?/*= Html::script('alert("Hello!");', ['defer' => true]); */?>
        <script defer>alert("Hello!");</script>-->
        <!--外联-->
        <?= Html::cssFile('@web/css/ie5.css', ['condition' => 'IE 5']) ?>
        <?= Html::jsFile('@web/js/main.js', ['type' => 'text/javascript']); ?>
    <br/>
    <!--超链接-->
    <?= Html::a('Profile', ['user/view', 'id' => 1], ['class' => 'profile-link']) ?>
    <br/>
    <!--图片-->
    <?= Html::img('@web/favicon.ico', ['alt' => 'My logo']) ?>
    <br/>
    <!--列表-->
    <?= Html::ul($data, ['item' => function($item, $index) {
        return Html::tag('li', $item['name'], ['class' => 'post']);
    }]) ?>