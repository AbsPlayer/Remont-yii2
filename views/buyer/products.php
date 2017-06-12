<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Categories;
use app\models\Grups;

$this->title = 'Материалы для ремонта';

?>

<table border='1' width='500' style="border-collapse: collapse; border: 1px solid black;">
    <thead style="font-weight:bold; text-align:center;">
    <td width='50' align='left'>Категория</td>
    <td width='50' align='left'>Группа</td>
    <td width='50' align='left'>Наименование</td>
    <td width='30'>Закупка/<br>Наценка, %</td>
    <td width='135'>Изображение</td>
    <td width='50'>Операции</td>
</thead>
<tr>
    <td colspan='7' align='left'>
        <a href="<?= Url::to(['product'])
?>"><button>Новый товар</button></a>

    </td>
</tr>
<tr>
    <td colspan='6'>
        <img src="../images/linemid.gif" vspace="10">
    </td>
</tr>
<?php foreach ($products as $product): ?>

    <?php
    $img_product_image = Html::encode("{$product['ProductSmallImage']}");
    if (strlen($img_product_image) < 1)
        {
        $img_product_image = '../images/no_image.jpg';
        }
    ?>

    <tr>
        <td><?= Html::encode("{$product['CategoryName']}") ?></td>
        <td><?= Html::encode("{$product['GrupName']}") ?></td>
        <td><?= Html::encode("{$product['ProductName']}") ?></td>
        <td><?= Html::encode("{$product['ProductPrice']}") ?>/<br><?= Html::encode("{$product['ProductMarga']}")*100 ?> %</td>
        <td align='center'><img src="<?= $img_product_image ?>" height=85 weight=85 alt='<?= Html::encode("{$product['ProductName']}") ?>'></td>
        <td rowspan='2'><a href="<?= Url::to(['product',
                                                'pid' => $product['ProductID']])
    ?>"><button>Изменить</button></a></td>
    </tr>
    <tr>
        <td colspan='5'>
    <?= Html::encode("{$product['ProductInfo']}") ?>
        </td>
    </tr>
<?php endforeach; ?>
<tr>
    <td colspan='6'>
        <img src="../images/linemid.gif" vspace="10">
    </td>
</tr>
<tr>
    <td colspan='6' align='left'>
        <a href="<?= Url::to(['product']) ?>"><button>Новый товар</button></a>

    </td>
</tr>
</table>