<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'id' => '2',
                'name' => 'ordinateur.jpg',
                'path' => 'Files/',
                'created' => '2019-09-16 14:25:01',
                'modified' => '2019-09-16 14:25:01',
                'status' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Bose Casque sans fil à réduction de bruit.jpg',
                'path' => 'Files/',
                'created' => '2019-09-16 16:59:27',
                'modified' => '2019-09-16 16:59:27',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'Ugreen.png',
                'path' => 'Files/',
                'created' => '2019-09-17 16:48:18',
                'modified' => '2019-09-17 16:53:07',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
