<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221117091607 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE adherents_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE coachs_id_seq CASCADE');
        $this->addSql('ALTER TABLE adherents ADD email VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE adherents ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE adherents ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE adherents ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE adherents ADD prenom VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_562C7DA3E7927C74 ON adherents (email)');
        $this->addSql('ALTER TABLE coachs ADD email VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE coachs ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE coachs ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE coachs ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE coachs ADD prenom VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_89E318FDE7927C74 ON coachs (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE adherents_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE coachs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX UNIQ_89E318FDE7927C74');
        $this->addSql('ALTER TABLE coachs DROP email');
        $this->addSql('ALTER TABLE coachs DROP roles');
        $this->addSql('ALTER TABLE coachs DROP password');
        $this->addSql('ALTER TABLE coachs DROP nom');
        $this->addSql('ALTER TABLE coachs DROP prenom');
        $this->addSql('DROP INDEX UNIQ_562C7DA3E7927C74');
        $this->addSql('ALTER TABLE adherents DROP email');
        $this->addSql('ALTER TABLE adherents DROP roles');
        $this->addSql('ALTER TABLE adherents DROP password');
        $this->addSql('ALTER TABLE adherents DROP nom');
        $this->addSql('ALTER TABLE adherents DROP prenom');
    }
}
