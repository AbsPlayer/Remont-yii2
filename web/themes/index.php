<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Материалы для ремонта</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
        <link rel="STYLESHEET" type="text/css" href="style.css">
    </head>

    <body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
        <?php $this->beginBody() ?>
        <form ID='f' name='main' method='POST' enctype='multipart/form-data'>
            <table cellpadding="0" cellspacing="0" border="0" height="100%">
                <tr>
                    <td rowspan="10" width="50%" height="100%" background="images/bg1222.jpg" style="background-position:right top; background-repeat:repeat-y"></td>
                    <td rowspan="10" width="1" bgcolor="#000000"></td>
                    <td colspan="2" valign="top">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td rowspan="2"><img src="images/p01.jpg"></td>
                                <td><img src="images/p02.gif"></td>
                            </tr>
                            <tr>
                                <td rowspan="2"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2"><img src="images/name1.jpg"></td>
                            </tr>
                            <tr>
                                <td colspan="2" width="780" height="31" background="images/menuback.gif" align="center" class="menu"><a href='index.php' title='На главную страницу сайта'><img src="images/m01_1.jpg" border="0"></a><a href="categories.php" title='Продукция'><img src="images/m02_1.jpg" border="0"></a><a href="contacts.php" title='Контакты'><img src="images/m03_1.jpg" border="0"></a></td>
                            </tr>
                        </table>
                    </td>
                    <td rowspan="10" width="1" bgcolor="#000000"></td>
                    <td rowspan="10" width="50%" height="100%" background="images/bg1223.jpg" style="background-position:left top; background-repeat:repeat-y"></td>
                </tr>
                <tr>
                    <td valign="top"  height="100%" width="245" background="images/bgleft.gif" style="background-repeat:repeat-y;">
                        <table cellpadding="0" cellspacing="0" border="0" height="100%">
                            <tr>
                                <td background="images/cap01.gif" width="245" height="57" align="center" class="cap1">Актуальное предложение</td>
                            </tr>
                            <tr>
                                <td height="342" valign="top">
                                    <table border='0'>
                                        OUT;
                                        $db->$admin_menu();
                                        echo <<<OUT
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="images/lineleft.gif" vspace="10"></td>
                        </tr>
                        <tr>
                            <td height="60" valign="center" align="left">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td colspan='2' align='center'>
                                            {$mistake_message}
                                        </td>
                                    </tr>
                                    <tr>
                                        OUT;
                                        $db->$menu();
                                        echo <<<OUT
                                        </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="images/lineleft.gif" vspace="10"></td>
                        </tr>
                        <tr>
                            <td height="60" valign="center" align="center">
                                <table>
                                    <tr>
                                        <td>
                                            <script type="text/javascript" language="javascript">
                                                hotlog_js = "1.0";
                                                hotlog_r = "" + Math.random() + "&s=619087&im=116&r=" + escape(document.referrer) + "&pg=" +
                                                        escape(window.location.href);
                                                document.cookie = "hotlog=1; path=/";
                                                hotlog_r += "&c=" + (document.cookie ? "Y" : "N");
                                            </script>
                                            <script type="text/javascript" language="javascript1.1">
                                                hotlog_js = "1.1";hotlog_r += "&j=" + (navigator.javaEnabled() ? "Y" : "N")
                                            </script>
                                            <script type="text/javascript" language="javascript1.2">
                                                hotlog_js = "1.2";
                                                hotlog_r += "&wh=" + screen.width + 'x' + screen.height + "&px=" +
                                                        (((navigator.appName.substring(0, 3) == "Mic")) ?
                                                                screen.colorDepth : screen.pixelDepth)</script>
                                            <script type="text/javascript" language="javascript1.3">hotlog_js = "1.3"</script>
                                            <script type="text/javascript" language="javascript">hotlog_r += "&js=" + hotlog_js;
                                                document.write("<a href='http://click.hotlog.ru/?619087' target='_top'><img " +
                                                        " src='http://hit30.hotlog.ru/cgi-bin/hotlog/count?" +
                                                        hotlog_r + "&' border=0 width=88 height=31 alt=HotLog><\/a>")
                                            </script>
                                            <noscript>
                                            <a href="http://click.hotlog.ru/?619087" target="_top">
                                                <img src="http://hit30.hotlog.ru/cgi-bin/hotlog/count?s=619087&amp;im=116" border="0"
                                                     width="88" height="31" alt="HotLog"></a>
                                            </noscript>
                                        </td>
                                        <td>
                                            <!-- SpyLOG -->
                                            <script src="http://tools.spylog.ru/counter_cv.js" id="spylog_code" type="text/javascript" counter="1165997" part="" track_links="ext" page_level="0">
                                            </script>
                                            <noscript>
                                            <a href="http://u11659.97.spylog.com/cnt?cid=1165997&f=3&p=0" target="_blank">
                                                <img src="http://u11659.97.spylog.com/cnt?cid=1165997&p=0" alt="SpyLOG" border="0" width="88" height="31"></a>
                                            </noscript>
                                            <!--/ SpyLOG -->
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="100%"></td>
                        </tr>
                    </table>
                </td>
                <td valign="top" height="100%">
                    <table cellpadding="0" cellspacing="0" border="0" height="100%">
                        <tr>
                            <td width="320" background="images/capwelcome1.gif" style="background-repeat:no-repeat">
                                <div style="padding-left:90px;padding-top:3px;font-size:12px;" valign="center" class="cap1">
                                    Материалы для ремонта
                                </div>
                            </td>
                            <td width="216" height="42" background="images/bgsearch.gif" style="background-repeat:no-repeat">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="535" height="100%" background="images/bgmid.gif" valign="top">
                                <table cellspacing="0" cellspacing="0" border="0">
                                    <tr>
                                        <td>
                                            <table border='0'>
                                                <tr><td width='10'><img src="images/spacer.gif"></td>
                                                    <td>
                                                        OUT;
                                                        //Вывод контента
                                                        include_once ($_contentFileName);
                                                        echo <<<OUT
                                                    </td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr><td align="center"><img src="images/linemid.gif" vspace="10"></td></tr>
                                    <tr>
                                        <td colspan="2" valign="top">
                                            <table cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td valign="top">
                                                        <table cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td rowspan="4" width="18"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" width="158" height="1" bgcolor="#BBBBBB"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="1" height="185" bgcolor="#BBBBBB"></td>
                                                                <td width="156" valign="top">
                                                                    <img src="images/pic05.jpg" hspace="8" vspace="10">
                                                                    <div class="mid2" style="text-indent:5px;"><img src="images/w.gif" align="left">Сухие смеси<br>Этот товар на сайте появится в перспективе</div>
                                                                    <!--<div align="right" style=""><a href=""><img src="images/learnmore.gif" hspace="15" vspace="10" border="0"></a></div>-->
                                                                </td>
                                                                <td width="1" height="185" bgcolor="#BBBBBB"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" width="158" height="1" bgcolor="#BBBBBB"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td valign="top">
                                                        <table cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td valign="top">
                                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                                        <tr>
                                                                            <td rowspan="4" width="10"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3" width="158" height="1" bgcolor="#BBBBBB"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="1" height="185" bgcolor="#BBBBBB"></td>
                                                                            <td width="156" valign="top">
                                                                                <img src="images/pic06.jpg" hspace="8" vspace="10">
                                                                                <div class="mid2" style="text-indent:5px;"><img src="images/w.gif" align="left">Краски<br>Этот товар на сайте появится в перспективе</div>
                                                                                <!--<div align="right" style=""><a href=""><img src="images/learnmore.gif" hspace="15" vspace="10" border="0"></a></div>-->
                                                                            </td>
                                                                            <td width="1" height="185" bgcolor="#BBBBBB"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3" width="158" height="1" bgcolor="#BBBBBB"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td valign="top">
                                                        <table cellpadding="0" cellspacing="0" border="0">
                                                            <tr>
                                                                <td valign="top">
                                                                    <table cellpadding="0" cellspacing="0" border="0">
                                                                        <tr>
                                                                            <td rowspan="4" width="10"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3" width="158" height="1" bgcolor="#BBBBBB"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="1" height="185" bgcolor="#BBBBBB"></td>
                                                                            <td width="156" valign="top">
                                                                                <img src="images/pic07.jpg" hspace="8" vspace="10">
                                                                                <div class="mid2" style="text-indent:5px;"><img src="images/w.gif" align="left">Консультации<br>В телефонном режиме мы проконсультируем Вас по интересующим вопросам</div>
                                                                                <div align="right" style=""><a href="contacts.php" title='Контакты'><img src="images/learnmore.gif" hspace="15" vspace="10" border="0"></a></div>
                                                                            </td>
                                                                            <td width="1" height="185" bgcolor="#BBBBBB"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="3" width="158" height="1" bgcolor="#BBBBBB"></td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="100%"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><img src="images/bottom.gif"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="780" height="28" background="images/bgmenu.gif" align="center" class="menu"><a href='index.php' title='На главную страницу сайта' class="menu">Главная</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="categories.php" title='Продукция' class="menu">Продукция</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="contacts.php" title='Контакты' class="menu">Контакты</a></td>
            </tr>
            <tr>
                <td colspan="2" width="780" height="52" background="images/footer.gif" align="center">Copyright &copy; 2009 <strong>me.</strong></td>
            </tr>
        </table>
        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>