<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GradesFixture
 *
 */
class GradesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'achievement' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => 'logrado o no logrado', 'precision' => null],
        'created' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'submission_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rubrics_item_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'score' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'submission_id' => ['type' => 'index', 'columns' => ['submission_id'], 'length' => []],
            'rubrics_item_id' => ['type' => 'index', 'columns' => ['rubrics_item_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'entrega_calificacion' => ['type' => 'foreign', 'columns' => ['submission_id'], 'references' => ['submissions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'rubricitem' => ['type' => 'foreign', 'columns' => ['rubrics_item_id'], 'references' => ['rubrics_items', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'achievement' => 1,
            'created' => '2016-09-27',
            'modified' => '2016-09-27',
            'submission_id' => 1,
            'rubrics_item_id' => 1,
            'score' => 1
        ],
    ];
}
