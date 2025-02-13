<?php

declare(strict_types=1);

namespace Alura\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250209212646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criação de uma tabela de testes';
    }

    public function up(Schema $schema): void
    {
//        $this->addSql('CREATE TABLE teste (id INTEGER PRIMARY KEY, coluna_teste VARCHAR(225), PRIMARY KEY (id);)');
        $table = $schema->createTable('teste');
        $table->addColumn('id', 'integer')->setAutoincrement(true);
        $table->addColumn('coluna_teste', 'string');

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
//        $this->addSql('DROP TABLE teste;');
        $schema->dropTable('teste');
    }
}
