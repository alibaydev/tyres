<?php

namespace Migrations;

use Application\Service\MigrationHelper;
use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171101190436 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('location_locations');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('code', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('parent_id', 'integer', ['notnull'=>false]);
        $table->addColumn('type', 'integer', ['notnull'=>false]);
        $table->setPrimaryKey(['id']);
        $table->addForeignKeyConstraint('location_locations', ['parent_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'location_parent_id_fk');
        $table->addOption('engine' , 'InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        MigrationHelper::safeDown($schema, [
            'location_locations',
        ]);
    }
}
