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
$LANG['plugin_order']['title'][1] = "Orders management";

$LANG['plugin_order'][0] = "Order number";
$LANG['plugin_order'][1] = "Date of order";
$LANG['plugin_order'][2] = "Description";
$LANG['plugin_order'][3] = "Budget";
$LANG['plugin_order'][11] = "No order found";
$LANG['plugin_order'][12] = "Delivery form";
$LANG['plugin_order'][13] = "Price tax free";
$LANG['plugin_order'][14] = "Price ATI";
$LANG['plugin_order'][25] = "VAT";
$LANG['plugin_order'][28] = "Invoce number";
$LANG['plugin_order'][31] = "Supplier invoice number";
$LANG['plugin_order'][32] = "Payment conditions";
$LANG['plugin_order'][34] = "Generate orders based on financial informations";
$LANG['plugin_order'][35] = "Delete orders based on financial informations";
$LANG['plugin_order'][37] = "Orders generated based on financial informations:";
$LANG['plugin_order'][39] = "Order name";
$LANG['plugin_order'][40] = "Delivry location";
$LANG['plugin_order'][42] = "Cannot link several items to one detail line";
$LANG['plugin_order'][43] = "Back to menu";
$LANG['plugin_order'][44] = "An order number is mandatory !";
$LANG['plugin_order'][45] = "Cannot generate items not delivered";
$LANG['plugin_order'][46] = "Cannot link items not delivered";
$LANG['plugin_order'][47] = "Order informations";

$LANG['plugin_order']['status'][0] = "Order status";
$LANG['plugin_order']['status'][1] = "Being delivered";
$LANG['plugin_order']['status'][2] = "Delivered";
$LANG['plugin_order']['status'][7] = "Waiting for approval";
$LANG['plugin_order']['status'][8] = "Taken delivrery";
$LANG['plugin_order']['status'][9] = "Draft";
$LANG['plugin_order']['status'][10] = "Canceled";
$LANG['plugin_order']['status'][11] = "Waiting for delivery";
$LANG['plugin_order']['status'][12] = "Validate";

$LANG['plugin_order']['item'][0] = "Associated items";
$LANG['plugin_order']['item'][2] = "No associated item";
$LANG['plugin_order']['item'][3] = "No items for this order";

$LANG['plugin_order']['detail'][0] = "Detail(s)";
$LANG['plugin_order']['detail'][1] = "Type";
$LANG['plugin_order']['detail'][2] = "Reference";
$LANG['plugin_order']['detail'][3] = "Delivered quantity";
$LANG['plugin_order']['detail'][4] = "Unit price tax free";
$LANG['plugin_order']['detail'][5] = "Add to the order";
$LANG['plugin_order']['detail'][7] = "Ordered quantity";
$LANG['plugin_order']['detail'][8] = "Price AIT";
$LANG['plugin_order']['detail'][9] = "Total price tax free";
$LANG['plugin_order']['detail'][10] = "Total price ATI";
$LANG['plugin_order']['detail'][17] = "Detail line(s)";
$LANG['plugin_order']['detail'][18] = "Discounted unit price tax free";
$LANG['plugin_order']['detail'][19] = "Item status";
$LANG['plugin_order']['detail'][20] = "No item to take delivery of";
$LANG['plugin_order']['detail'][21] = "Delivry date";
$LANG['plugin_order']['detail'][23] = "Item not taken delivery";
$LANG['plugin_order']['detail'][25] = "Discount (%)";
$LANG['plugin_order']['detail'][27] = "Please select a supplier";
$LANG['plugin_order']['detail'][28] = "Reference is already used in this order";
$LANG['plugin_order']['detail'][29] = "No item selected";
$LANG['plugin_order']['detail'][30] = "Item successfully selected";
$LANG['plugin_order']['detail'][31] = "Item successfully taken delivery";
$LANG['plugin_order']['detail'][32] = "Item already taken delivery";
$LANG['plugin_order']['detail'][33] = "The discount pourcentage must be between 0 and 100";
$LANG['plugin_order']['detail'][34] = "Add reference";
$LANG['plugin_order']['detail'][35] = "Remove reference";
$LANG['plugin_order']['detail'][36] = "Do you really want to delete these details ? Delivred items will be deleted !";

$LANG['plugin_order']['delivery'][1] = "Item delivered";
$LANG['plugin_order']['delivery'][2] = "Take item delivery";
$LANG['plugin_order']['delivery'][3] = "Generate item";
$LANG['plugin_order']['delivery'][5] = "Delivered items";
$LANG['plugin_order']['delivery'][9] = "Generate";
$LANG['plugin_order']['delivery'][11] = "Link to an existing item";
$LANG['plugin_order']['delivery'][12] = "Delete item link";
$LANG['plugin_order']['delivery'][13] = "Item generated by using order";
$LANG['plugin_order']['delivery'][14] = "Item linked to order";
$LANG['plugin_order']['delivery'][15] = "Item unlink form order";
$LANG['plugin_order']['delivery'][16] = "Item already linked to another one";
$LANG['plugin_order']['delivery'][17] = "No item to generate";

$LANG['plugin_order']['profile'][0] = "Rights management";
$LANG['plugin_order']['profile'][1] = "Order validation";
$LANG['plugin_order']['profile'][2] = "Cancel order";
$LANG['plugin_order']['profile'][3] = "Edit a validated order";

$LANG['plugin_order']['reference'][1] = "Product reference";
$LANG['plugin_order']['reference'][2] = "Add a reference";
$LANG['plugin_order']['reference'][3] = "List references";
$LANG['plugin_order']['reference'][4] = "Type de matériel";
$LANG['plugin_order']['reference'][5] = "Supplier for the reference";
$LANG['plugin_order']['reference'][6] = "A reference with the same name still exists";
$LANG['plugin_order']['reference'][7] = "Reference(s) in use";
$LANG['plugin_order']['reference'][8] = "Cannot create reference without a name";
$LANG['plugin_order']['reference'][9] = "Cannot create reference without a type";

$LANG['plugin_order']['setup'][2] = "Plugin not usable from the helpdesk interface";

$LANG['plugin_order']['config'][0] = "Plugin configuration";
$LANG['plugin_order']['config'][1] = "Default VAT";
$LANG['plugin_order']['config'][2] = "Use validation process";

$LANG['plugin_order']['mailing'][0] = "Order validation query";
$LANG['plugin_order']['mailing'][1] = "See order details";
$LANG['plugin_order']['mailing'][2] = "by";

$LANG['plugin_order']['infocom'][1] = "Some fields cannont be modified because they belong to an order";

$LANG['plugin_order']['history'][1] = "Item generated from an order";

$LANG['plugin_order']['validation'][1] = "Request order validation";
$LANG['plugin_order']['validation'][2] = "Order validated";
$LANG['plugin_order']['validation'][3] = "Order being taken delivery";
$LANG['plugin_order']['validation'][4] = "Order delivered";
$LANG['plugin_order']['validation'][5] = "Order canceled";
$LANG['plugin_order']['validation'][6] = "Validation process";
$LANG['plugin_order']['validation'][7] = "Order validation successfully requested";
$LANG['plugin_order']['validation'][9] = "Validate order";
$LANG['plugin_order']['validation'][10] = "Order is validated";
$LANG['plugin_order']['validation'][11] = "Ask for validation";
$LANG['plugin_order']['validation'][13] = "Cancel ask for validation";
$LANG['plugin_order']['validation'][14] = "Validation query is now canceled";
$LANG['plugin_order']['validation'][15] = "Order is in draft state";
$LANG['plugin_order']['validation'][16] = "Validation canceled successfully";
$LANG['plugin_order']['validation'][17] = "Edit order";

$LANG['plugin_order']['menu'][1] = "Manage orders";
$LANG['plugin_order']['menu'][2] = "Manage products references";
?>