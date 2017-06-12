<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Материалы для ремонта';
?>

<table border='0' width='500'>
    <tr>
        <td colspan='2' align='center'>
            <div style='font-weight:bold;'><a href="<?= Url::to('production')?>" title='Продукция' style='color:#000000;'>Продукция</a> -> <a href="<?= Url::to(['grups',
                                                                                                                                                                    'cid' => Html::encode("{$category->CategoryID}")])?>" title='<?= Html::encode("{$category->CategoryName}") ?>' style='color:#000000;'><?= Html::encode("{$category->CategoryName}") ?></a> -> <?= Html::encode("{$grup->GrupName}") ?>
            </div>
        </td>
    </tr>
 <?php
    foreach ($products as $product):
        $img_product_image = Html::encode("{$product->ProductSmallImage}");
        if (strlen($img_product_image) < 1)
            {
            $img_product_image = './images/no_image.jpg';
            }
        ?>
    <tr>
        <td width='65' height='65' background="../images/baget65_65.jpg" align="center" style="background-repeat:no-repeat">
            <a href='<?= Url::to(['product',
                                    'pid' => Html::encode("{$product->ProductID}")])?>' title='<?= Html::encode("{$product->ProductName}") ?>'><img src="<?= $img_product_image ?>" border='0' align='left' width=61 height=61></a>
        </td>
        <td width='360'>
            <img src='../images/w.gif' align='left'><a href='<?= Url::to(['product',
                                                                        'pid' => Html::encode("{$product->ProductID}")])?>' title='<?= Html::encode("{$product->ProductName}") ?>' class="menu"><?= Html::encode("{$product->ProductName}") ?></a>
        </td>
    </tr>
<?php endforeach; ?>
</table>