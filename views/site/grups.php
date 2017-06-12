<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Материалы для ремонта';
?>

<table border='0' width='500'>
    <tr>
        <td colspan='2' align='center'>
            <div style='font-weight:bold;'><a href="<?= Url::to('production') ?>" title='Продукция' style='color:#000000;'>Продукция</a> -> <?= Html::encode("{$category->CategoryName}") ?>
            </div>
        </td>
    </tr>
    <?php
    foreach ($grups as $grup):
        $img_product_image = Html::encode("{$grup->GrupSmallImage}");
        if (strlen($img_product_image) < 1)
            {
            $img_product_image = '../images/no_image.jpg';
            }
        ?>
        <tr>
            <td width='65' height='65' background="../images/baget65_65.jpg" align="center" style="background-repeat:no-repeat">
                <a href='<?= Url::to(['products',
                                        'gid' => Html::encode("{$grup->GrupID}")]);
        ?>' title='<?= Html::encode("{$grup->GrupName}") ?>'><img src="<?= $img_product_image ?>" width='62' height='62' border='0' align='center'></a>
            </td>
            <td>
                <img src='../images/w.gif' align='left' hspace='10'><a href='<?= Url::to(['products',
                                                                                        'gid' => Html::encode("{$grup->GrupID}")]);
               ?>' title='<?= Html::encode("{$grup->GrupName}") ?>' class="menu"><?= Html::encode("{$grup->GrupName}") ?></a>
            </td>
        </tr>
<?php endforeach; ?>
</table>