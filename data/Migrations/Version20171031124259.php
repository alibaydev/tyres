<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171031124259 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('car_brands');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['name'], 'name_idx');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_models');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('brand_id', 'integer', ['notnull'=>true, 'length'=>255]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['brand_id', 'name'], 'name_idx');
        $table->addForeignKeyConstraint('car_brands', ['brand_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'model_brand_id_fk');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_generations');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('model_id', 'integer', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('year_from', 'integer', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('year_to', 'integer', ['notnull'=>true, 'length'=>255]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['model_id', 'name'], 'name_idx');
        $table->addForeignKeyConstraint('car_models', ['model_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'generation_model_id_fk');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_modifications');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('generation_id', 'integer', ['notnull'=>true, 'length'=>255]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['generation_id', 'name'], 'name_idx');
        $table->addForeignKeyConstraint('car_generations', ['generation_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'modification_generation_id_fk');
        $table->addOption('engine' , 'InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('car_modifications');
        $schema->dropTable('car_generations');
        $schema->dropTable('car_models');
        $schema->dropTable('car_brands');
    }
}
