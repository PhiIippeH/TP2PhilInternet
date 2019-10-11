<?php
use Migrations\AbstractSeed;

/**
 * AdressesExpeditions seed.
 */
class AdressesExpeditionsSeed extends AbstractSeed
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
                'adress_id' => '4',
                'expedition_id' => '1',
            ],
            [
                'adress_id' => '5',
                'expedition_id' => '4',
            ],
        ];

        $table = $this->table('adresses_expeditions');
        $table->insert($data)->save();
    }
}
