<?php
$urlToRestApi = $this->Url->build('/api/shippers', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Shippers/index', ['block' => 'scriptBottom']);
?>

<div class="container">
    <div class="row">
        <div class="panel panel-default cocktails-content">
            <div class="panel-heading">Shippers <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Shipper</h2>
                <form class="form" id="shipperAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Company_Name</label>
                        <input type="text" class="form-control" name="company_name" id="company_name"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="shipperAction('add')">Add Shipper</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Cocktail" -->
                </form>
            </div>
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Shipper</h2>
                <form class="form" id="shipperEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Company_Name</label>
                        <input type="text" class="form-control" name="company_name" id="company_nameEdit"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" id="phoneEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="shipper_id" id="shipper_idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="shipperAction('edit')">Update Shipper</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Cocktail" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Company_Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="shipperData">
                <?php
                $count = 0;
                foreach ($shippers as $shipper): $count++;
                    ?>
                    <tr>
                        <td><?php echo '#' . $count; ?></td>
                        <td><?php echo $shipper['company_name']; ?></td>
                        <td><?php echo $shipper['phone']; ?></td>
                        <td>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editShipper('<?php echo $shipper['shipper_id']; ?>')"></a>
                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? shipperAction('delete', '<?php echo $shipper['shipper_id']; ?>') : false;"></a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                <tr><td colspan="5">No Shipper(s) found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
