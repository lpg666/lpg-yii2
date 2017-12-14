<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Url助手';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h2>Url助手demo</h2>

    <!--获得通用URL-->
    <?php
        //
        $relativeHomeUrl = Url::home();
        // 获取当前协议
        $absoluteHomeUrl = Url::home(true);
        // 指定协议
        $httpsAbsoluteHomeUrl = Url::home('https');
        var_dump($relativeHomeUrl, $absoluteHomeUrl, $httpsAbsoluteHomeUrl);
        echo '<br>';
        echo Url::toRoute('site/index') . '<br>';
        echo Url::toRoute(['site/index', 'src' => 'ref1', '#' => 'name']) . '<br>';

        echo Url::to(['site/index', 'src' => 'ref1', '#' => 'name']) . '<br>';

        echo Url::current(['id' => 100]) . '<br>';
    ?>

    <!--记住URLs-->
    <?php
        // Remember current URL
        Url::remember();

        // Remember URL specified. See Url::to() for argument format.
        Url::remember(['product/view', 'id' => 42]);

        // Remember URL specified with a name given
        Url::remember(['product/view', 'id' => 42], 'product');

        // 在后续的请求处理中，可以用如下方式获得记住的 URL：
        echo $url = Url::previous() . '<br>';

        echo $productUrl = Url::previous('product') . '<br>';
    ?>

    <!--检查相对URLs-->
    <?= $isRelative = Url::isRelative('test/it'); ?>