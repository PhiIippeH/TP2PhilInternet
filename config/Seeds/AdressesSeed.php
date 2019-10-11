<?php
use Migrations\AbstractSeed;

/**
 * Adresses seed.
 */
class AdressesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '4',
                'user_id' => '6',
                'title' => '500 Avenue montmorency',
                'date_adresse_envoi' => NULL,
                'date_adresse_Reception' => NULL,
                'type_domicile' => 'Apartment',
                'facture' => 'New pair of earphone for David $ 300 plus tax + shipping costs because we are cheap $ 25',
                'slug' => '500-Avenue-Montmorency',
                'published' => '1',
                'created' => '2019-09-16 14:58:02',
                'modified' => '2019-10-07 12:53:01',
            ],
            [
                'id' => '5',
                'user_id' => '17',
                'title' => '300 Rue Boivin',
                'date_adresse_envoi' => NULL,
                'date_adresse_Reception' => NULL,
                'type_domicile' => NULL,
                'facture' => NULL,
                'slug' => '300-Rue-Boivin',
                'published' => '1',
                'created' => '2019-10-07 22:14:47',
                'modified' => '2019-10-07 22:14:47',
            ],
        ];

        $table = $this->table('adresses');
        $table->insert($data)->save();
    }
}
