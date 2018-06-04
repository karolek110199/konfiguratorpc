<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name='format-detection' content='telephone=no'>
    <title>Zmieniono status zamówienia #<?= $order_id ?> - <?= $status ?></title>
</head>
<body style="-webkit-text-size-adjust:none; background:#fff; padding:0;margin:0">
    <div style="background-color: #fff">
        <!-- WRAPPER-->
        <table  width="100%" style="table-layout: fixed">
            <tr>
                <td>
                    <!-- BODY -->
                    <table align="center" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px; margin:0 auto">
                        <!-- HEADER -->
                        <tr>
                            <td width="600" style="width:600px">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px">
                                    <!-- PREHEADER -->
                                    <tr>
                                        <td height="1" bgcolor="#efefef" style="color:#efefef; font-size: 1px; line-height: 1px">
                                            <div style="color:#efefef; font-size: 1px; line-height: 1px;display:none"></div>
                                        </td>
                                    </tr>
                                    <!-- END OF PREHEADER -->
                                    <tr>
                                        <td height="20" style="height:20px"></td>
                                    </tr>
                                    <!-- PREVIEW LINK -->
                                    <tr>
                                        <td align="center" width="600" style="width:600px;text-align: center; color:#2f302f; font-family: Arial, Helvetica, sans-serif;font-size: 10px">
                                            Jeżeli nie widzisz dobrze tego maila, <a href="$$preview_href$$" style="font-size:10px;color:#2f302f; text-decoration:none;" target="_blank" title="Zobacz w przeglądarce">zobacz go w przeglądarce.</a>
                                        </td>
                                    </tr>
                                    <!-- END OF PREVIEW LINK -->
                                    <tr>
                                        <td height="20" style="height:20px"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td width="600" style="width:600px">
                                <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px">
                                    <tr>
                                        <td height="5" style="height:5px"></td>
                                    </tr>
                                    <tr>
                                        <td width="600" style="width:600px">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px">
                                                <tr>
                                                    <td width="38" style="width:38px"></td>
                                                    <td width="524" style="color:#02477e; font-family: Lato, Helvetica, sans-serif; font-size:32px; padding-top:4px; width:524">
                                                        <a style="color:#02477e; border:none; font-size:32px; font-weight: 900; text-decoration:none;" href="<?= base_url() ?>" target="_blank" title="Sprawdź">
                                                            Konfigurator PC
                                                        </a>
                                                    </td>
                                                    <td width="38" style="width:38px"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="15" style="height:15px"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- END OF HEADER -->
                        <!-- MAIN CONTENT -->
                        <tr>
                            <td bgcolor="#fff" width="600" style="width:600px;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px">
                                    <tr>
                                        <td bgcolor="#fff" width="600" valign="top" style="">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto; width:600px">
                                                <tr>
                                                    <td width="44" style="width:44px"></td>
                                                    <td width="512" style="width:512px;color:#000;font-family:Arial,Verdana;font-size:16px;">
                                                        Witaj, <?= $person['first_name'].' '.$person['last_name'] ?>!<br><br>
                                                        Status Twojego zamówienia został zmieniony na: <strong><?= $status ?></strong>.<br><br>
                                                        Szczegóły Twojego zamówienia możesz sprawdzić klikając w link poniżej:<br>
                                                        <a href="<?= base_url('order/order?orderid='.$order_id.'&allow='.$allow) ?>"><?= base_url('order/order?orderid='.$order_id.'&allow='.$allow) ?></a><br><br>
                                                        Pozdrawiamy, <br><i>Ekipa Konfigurator PC</i>
                                                    </td>
                                                    <td width="44" style="width:44px"></td>

                                                </tr>
                                                <tr>
                                                    <td height="20" style="height:20px;"></td>
                                                </tr>
                                                <tr>
                                                    <td width="44" style="width:44px"></td>
                                                    <td width="512" style="width:512px;color:#000;font-family:Arial,Verdana;font-size:13px;">
                                                        <strong>Jeżeli masz jakieś pytania, bądź nie powinieneś otrzymać tego maila skontaktuj się z administracją <a href="<?= base_url() ?>">Konfigurator PC</a></strong><br />
                                                    </td>
                                                    <td width="44" style="width:44px"></td>
                                                </tr>
                                                <tr>
                                                    <td height="20" style="height:20px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="20" style="height:20px;"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- SOCIAL SECTION -->
                        <tr>
                            <td width="600" style="width:600px">
                                <table align="center" bgcolor="#24262b" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px">
                                    <tr>
                                        <td height="20" style="height:20px"></td>
                                    </tr>
                                    <tr>
                                        <td width="600" style="padding-bottom:4px; width:600px">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600px">
                                                <tr>
                                                    <td width="22" style="width:22px"></td>
                                                    <td align="center" width="556" style="color:#f0f0f0; font-family:Arial, Helvetica, sans-serif; font-size:10px; text-align:left; width:556px">
                                                        Ta wiadomość została automatycznie wysłana na adres email:<br /> <?= $person['email'] ?>,<br />ponieważ dokonałeś zamówienia na <a href="<?= base_url() ?>" style="color:#999;border-bottom:1px dotted #999;text-decoration:none">KonfiguratorPC</a>.<br />Więcej informacji znajduje się na <a href="<?= base_url() ?>" style="color:#999;border-bottom:1px dotted #999;text-decoration:none">KonfiguratorPC</a>.
                                                    </td>
                                                    <td width="22" style="width:22px"></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="20" style="height:20px"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- END OF MAIN CONTENT -->
                    </table>
                    <!-- END OF BODY-->
                </td>
            </tr>
        </table>
        <!-- END OF WRAPPER-->
    </div>
</body>
</html>
