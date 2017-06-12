<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<?php foreach ($act_offs as $act_off): ?>
<tr>
    <td width='138' height='138' align='center' background="../images/baget138_138.jpg" style="background-repeat:no-repeat;">
        <img src="<?= $act_off['ProductBigImage']?>" width='132' height='132' border='0'>
    </td>
    <td>
        <div class="cap"><?= $act_off['GrupName']?></div>
        <div class="left"><?= $act_off['ProductName']?></div>
        <a href="<?= Url::to(['product',
                                'pid' => $act_off['ProductID']])?>"><img src="../images/learnmore.gif" border="0" vspace="10"></a>
    </td>
</tr>
<?php endforeach; ?>