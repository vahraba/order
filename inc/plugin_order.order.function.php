<?php

/*----------------------------------------------------------------------
   GLPI - Gestionnaire Libre de Parc Informatique
   Copyright (C) 2003-2008 by the INDEPNET Development Team.

   http://indepnet.net/   http://glpi-project.org/
   ----------------------------------------------------------------------
   LICENSE

   This file is part of GLPI.

   GLPI is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.

   GLPI is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with GLPI; if not, write to the Free Software
   Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
   ----------------------------------------------------------------------*/
/*----------------------------------------------------------------------
    Original Author of file:
    Purpose of file:
    ----------------------------------------------------------------------*/
function plugin_order_showOrderInfoByDeviceID($device_type, $deviceID) {
	global $LANG, $INFOFORM_PAGES, $CFG_GLPI;
	$device = new PluginOrderDevice;
	$infos = $device->getOrderInfosByDeviceID($device_type, $deviceID);
	if ($infos) {
		echo "<div class='center'>";
		echo "<table class='tab_cadre_fixe'>";
		echo "<tr align='center'><th colspan='2'>" . $LANG['plugin_order'][47] . ": </th></tr>";
		echo "<tr align='center'><td class='tab_bg_2'>" . $LANG['plugin_order'][39] . "</td>";
		echo "<td class='tab_bg_2'>";
		if (plugin_order_haveRight("order", "r"))
			echo "<a href='" . $CFG_GLPI["root_doc"] . "/" . $INFOFORM_PAGES[PLUGIN_ORDER_TYPE] . "?ID=" . $infos["ID"] . "'>" . $infos["name"] . "</a>";
		else
			echo $infos["name"];
		echo "</td></tr>";
		echo "<tr align='center'><td class='tab_bg_2'>" . $LANG['plugin_order']['detail'][21] . "</td>";
		echo "<td class='tab_bg_2'>" . convDate($infos["date"]) . "</td></tr>";
		echo "</table></div>";
	}
}

function plugin_order_addStatusLog($orderID, $status, $comments = '') {
	global $LANG;

	switch ($status) {
		case ORDER_STATUS_DRAFT :
			$changes = $LANG['plugin_order']['validation'][15];
			break;
		case ORDER_STATUS_WAITING_APPROVAL :
			$changes = $LANG['plugin_order']['validation'][1];
			break;
		case ORDER_STATUS_APPROVED :
			$changes = $LANG['plugin_order']['validation'][2];
			break;
		case ORDER_STATUS_PARTIALLY_DELIVRED :
			$changes = $LANG['plugin_order']['validation'][3];
			break;
		case ORDER_STATUS_COMPLETLY_DELIVERED :
			$changes = $LANG['plugin_order']['validation'][4];
			break;
		case ORDER_STATUS_CANCELED :
			$changes = $LANG['plugin_order']['validation'][5];
			break;
	}

	if ($comments != '')
		$changes .= " : ".$comments;

	plugin_order_addHistory(PLUGIN_ORDER_TYPE, '',$changes,$orderID);
//	historyLog($orderID, PLUGIN_ORDER_TYPE, $changes, 0, HISTORY_LOG_SIMPLE_MESSAGE);
}

function plugin_order_addHistory($type, $old_value='',$new_value='',$ID)
{
	$changes[0] = 0;
	$changes[1] = $old_value;
	$changes[2] = $new_value;
	historyLog($ID, $type, $changes, 0, HISTORY_LOG_SIMPLE_MESSAGE);
}
function plugin_order_canUpdateOrder($orderID) {
	global $ORDER_VALIDATION_STATUS;
	if ($orderID > 0) {
		$order = new PluginOrder;
		$order->getFromDB($orderID);
		return (in_array($order->fields["status"], $ORDER_VALIDATION_STATUS));
	} else
		return true;
}

function plugin_order_updateOrderStatus($orderID, $status, $comments = '') {
	$input["status"] = $status;
	$input["ID"] = $orderID;
	$plugin_order = new PluginOrder;
	$plugin_order->dohistory = false;
	$plugin_order->update($input);
	plugin_order_addStatusLog($orderID, $status, $comments);
	return true;
}

function plugin_order_updateDelivryStatus($orderID) {
	global $DB;

	$order = new PluginOrder;
	$order->getFromDB($orderID);

	$query = "SELECT status FROM `glpi_plugin_order_detail` WHERE FK_order=$orderID";
	$result = $DB->query($query);
	$all_delivered = true;

	while ($data = $DB->fetch_array($result))
		if (!$data["status"])
			$all_delivered = false;

	if ($all_delivered && $order->fields["status"] != ORDER_STATUS_COMPLETLY_DELIVERED)
		plugin_order_updateOrderStatus($orderID, ORDER_STATUS_COMPLETLY_DELIVERED);
	elseif ($order->fields["status"] != ORDER_STATUS_PARTIALLY_DELIVRED) plugin_order_updateOrderStatus($orderID, ORDER_STATUS_PARTIALLY_DELIVRED);
}

function plugin_order_showValidationForm($target, $orderID) {
	global $LANG, $ORDER_VALIDATION_STATUS;
	$order = new PluginOrder;
	$order->getFromDB($orderID);

	if (plugin_order_canDisplayValidationForm($orderID)) {
		echo "<form method='post' name='form' action=\"$target\">";
		echo "<table class='tab_cadre_fixe'>";

		echo "<tr class='tab_bg_2'><th colspan='2'>" . $LANG['plugin_order']['validation'][6] . "</th></tr>";

		echo "<tr class='tab_bg_1'>";
		echo "<td align='center' valign='top'>";
		echo $LANG['common'][25] . ":&nbsp;";
		echo "<textarea cols='40' rows='4' name='comments'></textarea>";
		echo "</td>";

		echo "<td align='center'>";
		echo "<input type='hidden' name='ID' value=\"$orderID\">\n";

		if ($order->canCancelOrder()) {
			echo "<input type='submit' name='cancel_order' value=\"" . $LANG['plugin_order']['validation'][12] . "\" class='submit'>";
			$link = "<br><br>";
		}

		$config = plugin_order_getConfig();

		if ($order->canValidate()) {
			echo $link . "<input type='submit' name='validate' value=\"" . $LANG['plugin_order']['validation'][9] . "\" class='submit'>";
			$link = "<br><br>";
		}

		if ($order->canCancelValidationRequest()) {
			echo $link . "<input type='submit' name='cancel_waiting_for_approval' value=\"" . $LANG['plugin_order']['validation'][13] . "\" class='submit'>";
			$link = "<br><br>";
		}

		if ($order->canDoValidationRequest()) {
			echo $link . "<input type='submit' name='waiting_for_approval' value=\"" . $LANG['plugin_order']['validation'][11] . "\" class='submit'>";
			$link = "<br><br>";
		}

		if ($order->canUndoValidation()) {
			echo $link . "<input type='submit' name='undovalidation' value=\"" . $LANG['plugin_order']['validation'][17] . "\" class='submit'>";
			$link = "<br><br>";
		}

		echo "</td>";
		echo "</tr>";

		echo "</table></form>";
	}
}

function plugin_order_canDisplayValidationForm($orderID) {
	$order = new PluginOrder;
	$order->getFromDB($orderID);

	//If it's an order creation -> do not display form
	if (!$orderID)
		return false;
	else
		return ($order->canValidate() || $order->canUndoValidation() || $order->canCancelOrder());
}

function plugin_order_displayPrice($price) {
	return sprintf("%.2f", $price);
}
?>