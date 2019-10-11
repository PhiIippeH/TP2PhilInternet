<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '6',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$ohbe3ABiyOIScykkwSlt/ed.SzJMRh5x/swkcS45mC7.xl0ybR2eW',
                'UUID' => '',
                'link' => '',
                'Status' => '1',
                'created' => '2019-09-09 14:53:31',
                'modified' => '2019-09-09 14:53:31',
            ],
            [
                'id' => '17',
                'email' => 'SuperUtilisateur@SuperUtilisateur.com',
                'password' => '$2y$10$aKMFDx31hZjuOkRSj/D28uaCRyaYqpDasZjIgYDkvPd6Hxatvi85q',
                'UUID' => '423c0e3f-0732-420e-9d15-364f1504694c',
                'link' => '',
                'Status' => '1',
                'created' => '2019-10-07 20:13:41',
                'modified' => '2019-10-07 20:13:41',
            ],
            [
                'id' => '25',
                'email' => 'Utilisateur@Utilisateur.com',
                'password' => '$2y$10$lW87s5bjnRI2rQhrfs2x.ejjLGNrprigPAL1/ifBr9pp72IV33Spa',
                'UUID' => 'f4ed4495-d957-4718-84be-44d444cd2e71',
                'link' => 'http://localhost:8080/TP01/AdresseUtilisateur_V_Vrai/users/confirm/f4ed4495-d957-4718-84be-44d444cd2e71',
                'Status' => '0',
                'created' => '2019-10-07 22:31:07',
                'modified' => '2019-10-07 22:31:07',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
