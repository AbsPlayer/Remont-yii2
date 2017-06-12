<?php

use yii\helpers\Url;

?>

<tr>
    <td>
        <div style='font-size:12px;' >Операции с:</div>
    </td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to (['categories'])?>' style='color:#000000'>Категориями товаров</a>
    </td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to (['grups'])?>' style='color:#000000'>Группами товаров</a>
    </td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to (['products'])?>' style='color:#000000'>Наименованиями товаров</a>
    </td>
</tr>
<tr>
    <td>-----------------------------------------------</td>
</tr>
<tr>
    <td>
        <a href='<?= Url::to (['units'])?>' style='color:#000000'>Единицы измерения</a>
    </td>
</tr>