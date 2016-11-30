<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

class OAuthConsumersFixture extends TestFixture
{
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'key' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'secret' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];

    /**
     * Records -> Error SQL al traspasar datos
     *
     * @var array
     */
    /*public $records = [
    		[
    				'id' => 1,
    				'key' => 'key',
    				'secret' => 'secreto'
    		],
    		[
    		'id' => 2,
    		'key' => '',
    		'secret' => ''
    				]
    ];*/
}
