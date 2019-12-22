<?php
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Shippers'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Shippers/index', ['block' => 'scriptBottom']);

?>
<div class="container" ng-app="app">
    <div class="container" ng-controller="usersCtrl" class="d-inline-block align-top-right">
        <div id="login-btn" class="fixed-action-btn" style="top:45px; right:24px;">
            <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger red" href="#modal-login-form"><i class="material-icons left">account_box</i>Login</a>
        </div>
        <!-- modal for user login -->
        <div id="modal-login-form" class="modal-debug">
            <div class="modal-content">
                <div id="example1"></div>
                <p style="color:red;">{{ captcha_status}}</p>
                <h4 id="modal-login-title">Login</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input ng-model="email" type="text" class="validate" id="username" name="email" placeholder="Type email here..." />
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12">
                        <input ng-model="password" type="password" class="validate" id="password" name="password" placeholder="Type password here..." />
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12">
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em" ng-click="login()"><i class="material-icons left">add</i>Login</a>
                        <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- floating button for logout/change password -->
        <div id="logout-btn" class="fixed-action-btn" style="top:45px; right:24px;">
            <a class="waves-effect waves-light btn margin-bottom-1em modal-trigger red" href="#modal-logout-form"><i
                    class="material-icons left">eject</i>Logout (Change Password)</a>
        </div>
        <!-- modal for user logout -->
        <div id="modal-logout-form" class="modal-debug">
            <div class="modal-content">
                <h4 id="modal-login-title">Logout or Change Password</h4>
                <div class="row">
                    <div class="input-field col s12">
                        <input ng-model="newPassword" type="password" class="validate" id="form-password"
                               placeholder="Type password here..."/>
                        <label for="password">New Password</label>
                    </div>
                    <div class="input-field col s12">
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em"
                           ng-click="changePassword()"><i class="material-icons left">autorenew</i>Change Password</a>
                        <a id="btn-create-login" class="waves-effect waves-light btn margin-bottom-1em"
                           ng-click="logout()"><i
                                class="material-icons left">eject</i>Logout</a>
                        <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i
                                class="material-icons left">close</i>Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div ng-controller="ShipperCRUDCtrl">

        <table>
            <tr>
                <td width="100">ID:</td>
                <td><input type="text" id="shipper_id" ng-model="shipper.shipper_id"/></td>
            </tr>
            <tr>
                <td width="100">Company Name:</td>
                <td><input type="text" id="company_name" ng-model="shipper.company_name"/></td>
            </tr>
            <tr>
                <td width="100">Phone:</td>
                <td><input type="text" id="phone" ng-model="shipper.phone"/></td>
            </tr>
        </table>
        <br/> <br/>
        <a ng-click="getShipper(shipper.shipper_id)">Get Shipper</a>
        <a ng-click="updateShipper(shipper.shipper_id, shipper.company_name, shipper.phone)">Update Shipper</a>
        <a ng-click="addShipper(shipper.company_name, shipper.phone)">Add Shipper</a>
        <a ng-click="deleteShipper(shipper.shipper_id)">Delete Shipper</a>

        <br/> <br/>
        <p style="color: green">{{message}}</p>
        <p style="color: red">{{errorMessage}}</p>

        <br/>
        <br/>
        <a ng-click="getAllShippers()">Get all Shippers</a><br/>
        <br/> <br/>
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
                    <td>{{shipper.shipper_id}}</td>
                    <td>{{shipper.company_name}}</td>
                    <td>{{shipper.phone}}</td>
                </tr>
            </table>
        </div>

        <!-- pre ng-show='shippers'>{{shippers | json }}</pre-->

    </div>
</div>
