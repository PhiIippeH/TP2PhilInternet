<div class="adresses view large-9 medium-8 columns content">
    <h3><?= h($adress->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($adress->user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($adress->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Home Type') ?></th>
            <td><?= h($adress->type_domicile) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bill') ?></th>
            <td><?= h($adress->facture) ?></td>
        </tr>
        <!--tr>
            <th scope="row"><--?= __('Id') ?></th>
            <td><--?= $this->Number->format($adress->id) ?></td>
        </tr-->
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($adress->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($adress->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $adress->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Expeditions') ?></h4>
        <?php if (!empty($adress->expeditions)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <!--th scope="col"><--?= __('Id') ?></th-->
                    <th scope="col"><?= __('Title') ?></th>
                    <!--th scope="col"><-?= __('Created') ?></th>
                    <th scope="col"><-?= __('Modified') ?></th-->
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($adress->expeditions as $expeditions): ?>
                    <tr>
                        <!--td><--?= h($expeditions->id) ?></td-->
                        <td><?= h($expeditions->title) ?></td>
                        <!--td><-?= h($expeditions->created) ?></td>
                        <td><-?= h($expeditions->modified) ?></td-->
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($adress->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <!--th scope="col"><-?= __('Id') ?></th-->

                    <th scope="col"><?= __('Picture') ?></th>

                    <!--th scope="col"><-?= __('Created') ?></th>
                    <th scope="col"><-?= __('Modified') ?></th>
                    <th scope="col"><-?= __('Status') ?></th-->
                </tr>
                <?php foreach ($adress->files as $files): ?>
                    <tr>
                        <!--td><-?= h($files->id) ?></td-->
                        <td>
                            <?php
                            echo $this->Html->image($files->path . $files->name, [
                                "alt" => $files->name,
                            ]);
                            ?>
                        </td>
                        <!--td><-?= h($files->created) ?></td>
                        <td><-?= h($files->modified) ?></td>
                        <td><-?= h($files->status) ?></td-->
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Adresses Descriptions') ?></h4>
        <?php if (!empty($adress->adresses_descriptions)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <!--th scope="col"><-?= __('Adress Id') ?></th-->
                    <th scope="col"><?= __('City') ?></th>
                    <th scope="col"><?= __('Province') ?></th>
                    <th scope="col"><?= __('Country') ?></th>
                    <th scope="col"><?= __('Zip Code') ?></th>
                    <!--th scope="col"><-?= __('Created') ?></th>
                    <th scope="col"><-?= __('Modified') ?></th-->
                </tr>
                <?php foreach ($adress->adresses_descriptions as $adressesDescriptions): ?>
                    <tr>
                        <!--td><-?= h($adressesDescriptions->adress_id) ?></td-->
                        <td><?= h($adressesDescriptions->ville) ?></td>
                        <td><?= h($adressesDescriptions->province) ?></td>
                        <td><?= h($adressesDescriptions->pays) ?></td>
                        <td><?= h($adressesDescriptions->zip_code) ?></td>
                        <!--td><-?= h($adressesDescriptions->created) ?></td>
                        <td><-?= h($adressesDescriptions->modified) ?></td-->
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
