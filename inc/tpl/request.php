<?php
/**
 * sysPass
 * 
 * @author nuxsmin
 * @link http://syspass.org
 * @copyright 2012 Rubén Domínguez nuxsmin@syspass.org
 *  
 * This file is part of sysPass.
 *
 * sysPass is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * sysPass is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with sysPass.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
defined('APP_ROOT') || die(_('No es posible acceder directamente a este archivo'));

$account = new SP_Account;
$account->accountId = $data['id'];
$account->getAccount();

?>

<div id="title" class="midroundup titleNormal"><? echo _('Solicitar Modificación de Cuenta'); ?></div>

<form method="post" name="requestmodify" id="frmRequestModify" >
    <table class="data round">
        <tr>
            <td class="descField"><? echo _('Nombre'); ?></td><td class="valField"><? echo $account->accountName; ?></td>
        </tr>
        <tr>
            <td class="descField"><? echo _('Cliente'); ?></td><td class="valField"><? echo $account->accountCustomerName; ?></td>
        </tr>
        <tr>
            <td class="descField"><? echo _('URL / IP'); ?></td>
            <td class="valField"><A href="<? echo $account->accountUrl; ?>" target="_blank"><? echo $account->accountUrl; ?></td>
        </tr>
        <tr>
            <td class="descField"><? echo _('Usuario'); ?></td>
            <td class="valField"><? echo $account->accountLogin; ?></td>
        </tr>
        <tr>
            <td class="descField"><? echo _('Petición'); ?></td>
            <td class="valField">
                <textarea name="description" cols="30" rows="5" placeholder="<? echo _('Descripción de la petición'); ?>" maxlength="1000"></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" name="accountid" value="<? echo $account->accountId; ?>" />
    <input type="hidden" name="sk" value="<? echo SP_Common::getSessionKey(TRUE); ?>">
    <input type="hidden" name="is_ajax" value="1">
</form>

<div class="action">
    <ul>
        <li>
            <img SRC="imgs/back.png" title="<? echo _('Atrás'); ?>" class="inputImg" id="btnBack" OnClick="doAction('<? echo $data['lastaction']; ?>', 'accsearch',<? echo $account->accountId; ?>)" />
        </li>
        <li>
            <img SRC="imgs/check.png" title="<? echo _('Enviar'); ?>" class="inputImg" id="btnSave" OnClick="sendRequest();" />
        </li>
    </ul>
</div>