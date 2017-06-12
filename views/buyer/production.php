<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Материалы для ремонта';
?>
<table border='0' width='500'>
    <tr>
        <td colspan='2' align='center'>
            <div style='font-weight:bold;'>Продукция
            </div>
        </td>
    </tr>

    <?php
    foreach ($categories as $category):
        $img_product_image = Html::encode("{$category->CategorySmallImage}");
        if (strlen($img_product_image) < 1)
            {
            $img_product_image = '../images/no_image.jpg';
            }
        ?>
        <tr>
            <td width='140' height='65' background="../images/baget140_65.jpg" align="center" style="background-repeat:no-repeat">
                <a href='<?= Url::to(['grups',
                                        'cid' => Html::encode("{$category->CategoryID}")])?>' title='<?= Html::encode("{$category->CategoryName}") ?>'><img src='<?= $img_product_image; ?>' width='62' height='62' border='0' align='center'></a>
            </td>
            <td>
                <img src='../images/w.gif' align='left'><a href='<?= Url::to(['grups',
                                                                            'cid' => Html::encode("{$category->CategoryID}")])?>' title='<?= Html::encode("{$category->CategoryName}") ?>' class="menu"><?= Html::encode("{$category->CategoryName}") ?></a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>