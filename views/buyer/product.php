<?php

use yii\helpers\Html;
use app\models\Grups;

$this->title = 'Материалы для ремонта';
?>

<?php
$img_product_image = Html::encode("{$product['ProductBigImage']}");
if (strlen($img_product_image) < 1)
    {
    $img_product_image = '../images/no_image.jpg';
    }
if ($pid != 0)
    {
    $cid = Grups::find()->where('GrupID = :gid', [':gid' => $product['GrupID']])->one()->CategoryID;
    $u = $product['UnitID'];
    } else
    {
    $cid = 0; // категория по умолчанию, отображаются все
    $u = 3;
    if (Yii::$app->request->post())
        {
        $cid = Yii::$app->request->post()['CategoryIDhidden'];
        }
    }
?>

<?= Html::beginForm('product', 'post', ['enctype' => 'multipart/form-data', 'name' => 'cat_drop']) ?>

<script type="text/javascript">
    function Choice()
    {
        form = document.getElementsByName('cat_drop')[0];
        form.h.value = Number(document.getElementById('cat').value);
        form.submit();
    }
</script>

<script>
    $(document).ready(function () {
        $('#ProductImage').change(function () {
            var input = $(this)[0];
            if (input.files && input.files[0]) {
                if (input.files[0].type.match('image.*')) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img_preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    console.log('ошибка, не изображение');
                }
            } else {
                console.log('хьюстон у нас проблема');
            }
        });
    });
</script>
<table border="1" width='500' style="border-collapse: collapse; border: 1px solid black;">
    <tr>
        <td rowspan=5>
            <img id="img_preview" src='<?= $img_product_image ?>' width=200>
        </td>
        <td width=100>
            Категория
        </td>
        <td width=150>
            <input ID='h' type='hidden' name='CategoryIDhidden' value='<?= $cid ?>'/>
            <select ID='cat' class='width' name='CategoryID' onChange='Choice()'>

                <?php foreach ($categories as $category): ?>
                    <?php
                    if ($category->CategoryID == $cid)
                        {
                        $selected = 'selected';
                        } else
                        {
                        $selected = '';
                        }
                    ?>
                    <OPTION VALUE=<?= Html::encode("{$category->CategoryID}") ?> <?= $selected ?> ><?= Html::encode("{$category->CategoryName}") ?>
                    <?php endforeach; ?>

            </select>
        </td>
    </tr>
    <tr>
        <td width=100>
            Группа товара
        </td>
        <td width=150>
            <select ID='g' class='width' name='GrupID'>
                <?php foreach ($grups as $grup): ?>
                    <?php
                    if ($grup->GrupID == $product['GrupID'])
                        {
                        $grup_selected = 'selected';
                        } else
                        {
                        $grup_selected = '';
                        }
                    ?>
                    <?php if ($grup->CategoryID == $cid OR $cid === 0): ?>
                        <OPTION VALUE=<?= Html::encode("{$grup->GrupID}") ?> <?= $grup_selected ?> ><?= Html::encode("{$grup->GrupName}") ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td width=100>
            Наименование
        </td>
        <td width=150>
            <?=
            Html::input('text', 'ProductName', $product['ProductName'], ['size' => 25,
                'placeholder' => 'Новый товар',
                'onfocus' => "this.placeholder=''",
                'onblur' => "this.placeholder='Новый товар'",])
            ?>
        </td>
    </tr>
    <tr>
        <td width=100>
            Закупка / Наценка / Ед.изм.
        </td>
        <td width=150>
            <?=
            Html::input('text', 'ProductPrice', $product['ProductPrice'], ['size' => 6,
                'placeholder' => '0',
                'onfocus' => "this.placeholder=''",
                'onblur' => "this.placeholder='Цена'",])
            ?><br>
            <?=
            Html::input('text', 'ProductMarga', $product['ProductMarga'] * 100, ['size' => 4,
                'placeholder' => '0',
                'onfocus' => "this.placeholder=''",
                'onblur' => "this.placeholder='0'",])
            ?> %<br>
            <select ID='u' class='width_unit' name='UnitID'>
                <?php foreach ($units as $unit): ?>
                    <?php
                    if ($unit->UnitID == $u)
                        {
                        $unit_selected = 'selected';
                        } else
                        {
                        $unit_selected = '';
                        }
                    ?>
                    <OPTION VALUE=<?= Html::encode("{$unit->UnitID}") ?> <?= $unit_selected ?> ><?= Html::encode("{$unit->UnitName}") ?>
                    <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td width=100>
            Доп. информация
        </td>
        <td width=150>

            <?=
            Html::Textarea('ProductInfo', $product['ProductInfo'], ['rows' => 3,
                'cols' => 25,
                'placeholder' => 'Дополнительная информация',
                'onfocus' => "this.placeholder=''",
                'onblur' => "this.placeholder='Дополнительная информация'",
            ])
            ?>
        </td>
    </tr>
    <tr>
        <td colspan=3>
            <?= Html::fileInput('ProductImage', NULL, ['id' => 'ProductImage', 'accept' => 'image/*']) ?>
        </td>
    </tr>
    <tr>
        <td colspan=3 align='center' width=540>
            <?= ($pid != 0) ? Html::submitButton('Сохранить', ['name' => 'update', 'value' => $product['ProductID']]) : Html::submitButton('Сохранить', ['name' => 'add']) ?>
            &nbsp;<?= Html::submitButton('Отмена', ['name' => 'cancel']) ?>
        </td>
    </tr>
</table>
<?= Html::endForm() ?>