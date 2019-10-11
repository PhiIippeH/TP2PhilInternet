<?php
use Migrations\AbstractSeed;

/**
 * AdressesDescriptions seed.
 */
class AdressesDescriptionsSeed extends AbstractSeed
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
                'id' => '3',
                'adress_id' => '4',
                'ville' => 'Laval',
                'province' => 'Québec',
                'pays' => 'Canada',
                'zip_code' => '38g 4hp',
                'created' => '2019-10-07 16:54:10',
                'modified' => '2019-10-07 16:54:10',
            ],
        ];

        $table = $this->table('adresses_descriptions');
        $table->insert($data)->save();
    }
}
