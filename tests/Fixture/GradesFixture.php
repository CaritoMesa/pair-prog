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
        'rubric_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'submission_id' => ['type' => 'index', 'columns' => ['submission_id'], 'length' => []],
            'rubric_id' => ['type' => 'index', 'columns' => ['rubric_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'rubrica_calificacion' => ['type' => 'foreign', 'columns' => ['rubric_id'], 'references' => ['rubrics', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'entrega_calificacion' => ['type' => 'foreign', 'columns' => ['submission_id'], 'references' => ['submissions', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'created' => '2016-09-07',
            'modified' => '2016-09-07',
            'submission_id' => 1,
            'rubric_id' => 1
        ],
    ];
}
