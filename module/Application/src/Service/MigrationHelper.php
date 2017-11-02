<?php

namespace Application\Service;

use Doctrine\DBAL\Schema\Schema;

class MigrationHelper
{
    public static function safeDown(Schema $schema, $tablesToDrop)
    {
        $db = $schema->getName();
        $tables = $schema->getTableNames();

        foreach ($tablesToDrop as $tableToDrop) {
            if (in_array("$db.$tableToDrop", $tables)) {
                $schema->dropTable($tableToDrop);
            }
        }
    }
}