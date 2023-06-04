<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221117075304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE collective_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE libre_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE adherents_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE coachs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE adherents (id INT NOT NULL, num_fiche_sante_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_562C7DA39530A131 ON adherents (num_fiche_sante_id)');
        $this->addSql('CREATE TABLE coachs (id INT NOT NULL, specialite VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE collective_adherents (collective_id INT NOT NULL, adherents_id INT NOT NULL, PRIMARY KEY(collective_id, adherents_id))');
        $this->addSql('CREATE INDEX IDX_C2949DE8EBB8240F ON collective_adherents (collective_id)');
        $this->addSql('CREATE INDEX IDX_C2949DE815364D07 ON collective_adherents (adherents_id)');
        $this->addSql('ALTER TABLE adherents ADD CONSTRAINT FK_562C7DA39530A131 FOREIGN KEY (num_fiche_sante_id) REFERENCES fiche_san (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collective_adherents ADD CONSTRAINT FK_C2949DE8EBB8240F FOREIGN KEY (collective_id) REFERENCES "seance" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collective_adherents ADD CONSTRAINT FK_C2949DE815364D07 FOREIGN KEY (adherents_id) REFERENCES adherents (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT fk_8d93d6499530a131');
        $this->addSql('ALTER TABLE collective DROP CONSTRAINT fk_f09f15a260450ea1');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE collective');
        $this->addSql('DROP TABLE libre');
        $this->addSql('ALTER TABLE seance ADD coachs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD discr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE seance ADD nb_activite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD nb_places INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD nb_personnes INT DEFAULT NULL');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E60450EA1 FOREIGN KEY (coachs_id) REFERENCES coachs (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_DF7DFD0E60450EA1 ON seance (coachs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "seance" DROP CONSTRAINT FK_DF7DFD0E60450EA1');
        $this->addSql('DROP SEQUENCE adherents_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE coachs_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE collective_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE libre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, num_fiche_sante_id INT NOT NULL, mail VARCHAR(50) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, specialite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_8d93d6499530a131 ON "user" (num_fiche_sante_id)');
        $this->addSql('CREATE TABLE collective (id INT NOT NULL, coachs_id INT DEFAULT NULL, nb_places INT NOT NULL, nb_personnes INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_f09f15a260450ea1 ON collective (coachs_id)');
        $this->addSql('CREATE TABLE libre (id INT NOT NULL, nb_activite INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT fk_8d93d6499530a131 FOREIGN KEY (num_fiche_sante_id) REFERENCES fiche_san (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE collective ADD CONSTRAINT fk_f09f15a260450ea1 FOREIGN KEY (coachs_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE adherents DROP CONSTRAINT FK_562C7DA39530A131');
        $this->addSql('ALTER TABLE collective_adherents DROP CONSTRAINT FK_C2949DE8EBB8240F');
        $this->addSql('ALTER TABLE collective_adherents DROP CONSTRAINT FK_C2949DE815364D07');
        $this->addSql('DROP TABLE adherents');
        $this->addSql('DROP TABLE coachs');
        $this->addSql('DROP TABLE collective_adherents');
        $this->addSql('DROP INDEX IDX_DF7DFD0E60450EA1');
        $this->addSql('ALTER TABLE "seance" DROP coachs_id');
        $this->addSql('ALTER TABLE "seance" DROP discr');
        $this->addSql('ALTER TABLE "seance" DROP nb_activite');
        $this->addSql('ALTER TABLE "seance" DROP nb_places');
        $this->addSql('ALTER TABLE "seance" DROP nb_personnes');
    }
}
