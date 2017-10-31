<?php

namespace Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171005072008 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('user_users');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('email', 'string', ['notnull'=>true, 'length'=>128]);
        $table->addColumn('first_name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('last_name', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('password', 'string', ['notnull'=>true, 'length'=>255]);
        $table->addColumn('is_active', 'boolean', ['notnull'=>true]);
        $table->addColumn('date_created', 'datetime', ['notnull'=>true]);
        $table->addColumn('pwd_reset_token', 'string', ['notnull'=>false, 'length'=>32]);
        $table->addColumn('pwd_reset_token_creation_date', 'datetime', ['notnull'=>false]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['email'], 'email_idx');
        $table->addOption('engine' , 'InnoDB');

        // Create 'roles' table
        $table = $schema->createTable('user_roles');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>128]);
        $table->addColumn('description', 'string', ['notnull'=>true, 'length'=>1024]);
        $table->addColumn('date_created', 'datetime', ['notnull'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['name'], 'name_idx');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('user_roles_hierarchy');
        $table->addColumn('parent_role_id', 'integer', ['notnull'=>true]);
        $table->addColumn('child_role_id', 'integer', ['notnull'=>true]);
        $table->setPrimaryKey(['parent_role_id', 'child_role_id']);
        $table->addForeignKeyConstraint('user_roles', ['parent_role_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'role_role_parent_role_id_fk');
        $table->addForeignKeyConstraint('user_roles', ['child_role_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'role_role_child_role_id_fk');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('user_permissions');
        $table->addColumn('id', 'integer', ['autoincrement'=>true]);
        $table->addColumn('name', 'string', ['notnull'=>true, 'length'=>128]);
        $table->addColumn('description', 'string', ['notnull'=>true, 'length'=>1024]);
        $table->addColumn('date_created', 'datetime', ['notnull'=>true]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['name'], 'name_idx');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('user_roles_permissions');
        $table->addColumn('role_id', 'integer', ['notnull'=>true]);
        $table->addColumn('permission_id', 'integer', ['notnull'=>true]);
        $table->setPrimaryKey(['role_id', 'permission_id']);
        $table->addForeignKeyConstraint('user_roles', ['role_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'role_permission_role_id_fk');
        $table->addForeignKeyConstraint('user_permissions', ['permission_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'role_permission_permission_id_fk');
        $table->addOption('engine' , 'InnoDB');

        $table = $schema->createTable('user_users_roles');
        $table->addColumn('user_id', 'integer', ['notnull'=>true]);
        $table->addColumn('role_id', 'integer', ['notnull'=>true]);
        $table->setPrimaryKey(['user_id', 'role_id']);
        $table->addForeignKeyConstraint('user_users', ['user_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'user_role_user_id_fk');
        $table->addForeignKeyConstraint('user_roles', ['role_id'], ['id'],
            ['onDelete'=>'CASCADE', 'onUpdate'=>'CASCADE'], 'user_role_role_id_fk');
        $table->addOption('engine' , 'InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('user_users_roles');
        $schema->dropTable('user_roles_permissions');
        $schema->dropTable('user_permissions');
        $schema->dropTable('user_roles_hierarchy');
        $schema->dropTable('user_roles');
        $schema->dropTable('user_users');
    }
}
