<?php

namespace Migrations;

use Application\Service\MigrationHelper;
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

        $table = $schema->createTable('car_bolts');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addUniqueIndex(['name'], 'name_idx');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_rims');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addColumn('width', 'float', ['notnull'=>true]);
        $table->addColumn('diameter', 'float', ['notnull'=>true]);
        $table->addColumn('hub_diameter', 'float', ['notnull'=>true]);
        $table->addColumn('pcd', 'float', ['notnull'=>true]);
        $table->addColumn('xfactor', 'float', ['notnull'=>true]);
        $table->addColumn('et', 'integer', ['notnull'=>true]);
        $table->addColumn('mounting_hole', 'integer', ['notnull'=>true]);
        $table->addColumn('flange', 'integer', ['notnull'=>true]);
        $table->addColumn('symmetry', 'integer', ['notnull'=>true]);
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_tires');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addColumn('width', 'float', ['notnull'=>true]);
        $table->addColumn('height', 'float', ['notnull'=>true]);
        $table->addColumn('radius', 'float', ['notnull'=>true]);
        $table->addColumn('season', 'integer', ['notnull'=>true]);
        $table->addColumn('is_xl', 'boolean', ['notnull'=>true]);
        $table->addColumn('is_fr', 'boolean', ['notnull'=>true]);
        $table->addColumn('is_zr', 'boolean', ['notnull'=>true]);
        $table->addColumn('is_run_flat', 'boolean', ['notnull'=>true]);
        $table->addColumn('has_thorns', 'boolean', ['notnull'=>true]);
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_cars');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addColumn('modification_id', 'integer', ['notnull'=>true]);
        $table->addColumn('owner_id', 'integer', ['notnull'=>true]);
        $table->addColumn('is_verified', 'boolean', ['notnull'=>true]);
        $table->addColumn('data_created', 'datetime', ['notnull'=>true]);
        $table->addColumn('date_updated', 'datetime', ['notnull'=>false]);
        $table->addForeignKeyConstraint('car_modifications', ['modification_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'car_modification_id_fk');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_equipments');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addColumn('modification_id', 'integer', ['notnull'=>true]);
        $table->addColumn('rim_id', 'integer', ['notnull'=>true]);
        $table->addColumn('tire_id', 'integer', ['notnull'=>true]);
        $table->addColumn('is_factory', 'boolean', ['notnull'=>true]);
        $table->addForeignKeyConstraint('car_modifications', ['modification_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'equipment_modification_id_fk');
        $table->addForeignKeyConstraint('car_rims', ['rim_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'equipment_rim_id_fk');
        $table->addForeignKeyConstraint('car_tires', ['tire_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'equipment_tire_id_fk');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_detail_brands');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addUniqueIndex(['name'], 'name_idx');
        $table->setPrimaryKey(['id']);
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('car_detail_models');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('detail_brand_id', 'integer', ['notnull'=>true]);
        $table->addColumn('type', 'integer', ['notnull'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addForeignKeyConstraint('car_detail_brands', ['detail_brand_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'detail_model_brand_id_fk');
        $table->addOption('engine' , 'InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        MigrationHelper::safeDown($schema, [
            'car_detail_models',
            'car_detail_brands',
            'car_equipments',
            'car_cars',
            'car_tires',
            'car_rims',
            'car_bolts',
            'car_modifications',
            'car_generations',
            'car_models',
            'car_brands',
        ]);
    }
}
