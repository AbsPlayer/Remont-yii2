<?php

use yii\helpers\Url;
?>

<tr>
    <td>
        <div style='font-size:12px;'>Операции с:</div>
    </td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to(['/admin/categories']) ?>' style='color:#000000'>Категориями товаров</a>
    </td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to(['/admin/grups_admin']) ?>' style='color:#000000'>Группами товаров</a>
    </td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to(['/admin/products_admin']) ?>' style='color:#000000'>Наименованиями товаров</a>
    </td>
</tr>
<tr>
    <td>-----------------------------------------------</td>
</tr>

<?php if (Yii::$app->user->identity['PermissionID'] === 1): ?>
<tr>
    <td>
        <a href='<?= Url::to(['/admin/units'])?>' style='color:#000000'>Единицы измерения</a>
    </td>
</tr>
<?php endif; ?>