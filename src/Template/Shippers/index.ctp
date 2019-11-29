<?php
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Shippers'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Shippers/index', ['block' => 'scriptBottom']);

?>

<div  ng-app="app"  ng-controller="ShipperCRUDCtrl">

    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="shipper_id" ng-model="shipper.shipper_id" /></td>
        </tr>
        <tr>
            <td width="100">Company Name:</td>
            <td><input type="text" id="company_name" ng-model="shipper.company_name" /></td>
        </tr>
        <tr>
            <td width="100">Phone:</td>
            <td><input type="text" id="phone" ng-model="shipper.phone" /></td>
        </tr>
    </table>
    <br /> <br />
    <a ng-click="getShipper(shipper.shipper_id)">Get Shipper</a>
    <a ng-click="updateShipper(shipper.shipper_id, shipper.company_name, shipper.phone)">Update Shipper</a>
    <a ng-click="addShipper(shipper.company_name, shipper.phone)">Add Shipper</a>
    <a ng-click="deleteShipper(shipper.shipper_id)">Delete Shipper</a>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />
    <br />
    <a ng-click="getAllShippers()">Get all Shippers</a><br />
    <br /> <br />
    <table>

    <tr>
        <th>Shipper_id</th>
        <th>Company_Name</th>
        <th>Phone</th>
    </tr>

    </table>
    <div ng-repeat="shipper in shippers">
        <table>
        <tr>
            <td>{{shipper.shipper_id}} </td>
            <td>{{shipper.company_name}} </td>
            <td>{{shipper.phone}} </td>
        </tr>
        </table>
    </div>

    <!-- pre ng-show='shippers'>{{shippers | json }}</pre-->

</div>
