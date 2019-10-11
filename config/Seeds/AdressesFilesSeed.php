<?php
use Migrations\AbstractSeed;

/**
 * AdressesFiles seed.
 */
class AdressesFilesSeed extends AbstractSeed
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
                'adress_id' => '4',
                'file_id' => '3',
            ],
            [
                'id' => '5',
                'adress_id' => '5',
                'file_id' => '4',
            ],
        ];

        $table = $this->table('adresses_files');
        $table->insert($data)->save();
    }
}
