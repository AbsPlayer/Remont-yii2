<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Материалы для ремонта';

//Расчёт и форматирование цены товара
$price = round((Html::encode("{$product->ProductPrice}") * (1 + Html::encode("{$product->ProductMarga}"))), 1);
$price = sprintf("%01.2f", $price);

// Вывод таблицы цветов RAL для кровли
$ral = "";
if ($grup->GrupID == 1 or $grup->GrupID == 2)
    {
    $link = Url::to('ral');
    $ral = "<a href='{$link}' style='color:#000000'>  Таблица возможных цветов</a>";
    }
?>

<table border='0' width='500'>
    <tr>
        <td align='center'>
            <div style='font-weight:bold;'><a href="<?= Url::to('production') ?>" title='Продукция' style='color:#000000;'>Продукция</a> ->
                <a href="<?= Url::to(['grups',
                    'cid' => Html::encode("{$category->CategoryID}")])?>" title='<?= Html::encode("{$category->CategoryName}") ?>' style='color:#000000;'><?= Html::encode("{$category->CategoryName}") ?></a> ->
                <a href="<?= Url::to(['products',
                       'gid' => Html::encode("{$grup->GrupID}")])?>" title='<?= Html::encode("{$grup->GrupName}") ?>' style='color:#000000;'><?= Html::encode("{$grup->GrupName}") ?></a> ->
                       <?= Html::encode("{$product->ProductName}") ?>
            </div>
        </td>
    </tr>

    <tr>
        <td width='500' align='center'>
            <table border='0'>
                <tr>
                    <td width='300' height='300' background="../images/baget300_300.jpg" align="center" valign='center' style="background-repeat:no-repeat">
                        <img src='<?= Html::encode("{$product->ProductBigImage}") ?>' border='0'>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
<?= Html::encode("{$product->ProductInfo}") ?>
<?= $ral ?>
        </td>
    </tr>
    <tr>
        <td>
            <div style='font-weight:bold;'>Цена: <font style='font-style: italic; font-size:12px'> <?= $price ?> грн. за <?= Html::encode("{$unit->UnitName}") ?></font>
        </td>
    </tr>

</table>
