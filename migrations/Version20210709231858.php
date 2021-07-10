<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210709231858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classification (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification_medicaments (classification_id INT NOT NULL, medicaments_id INT NOT NULL, INDEX IDX_E698AAEB2A86559F (classification_id), INDEX IDX_E698AAEBC403D7FB (medicaments_id), PRIMARY KEY(classification_id, medicaments_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes (id INT AUTO_INCREMENT NOT NULL, pharmacies_id INT DEFAULT NULL, clients_id INT DEFAULT NULL, mat VARCHAR(255) NOT NULL, date DATE DEFAULT NULL, INDEX IDX_35D4282C6DA819FC (pharmacies_id), INDEX IDX_35D4282CAB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commandes_medicaments (commandes_id INT NOT NULL, medicaments_id INT NOT NULL, INDEX IDX_901D6A708BF5C2E6 (commandes_id), INDEX IDX_901D6A70C403D7FB (medicaments_id), PRIMARY KEY(commandes_id, medicaments_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseurs_medicaments (fournisseurs_id INT NOT NULL, medicaments_id INT NOT NULL, INDEX IDX_C380E8AA27ACDDFD (fournisseurs_id), INDEX IDX_C380E8AAC403D7FB (medicaments_id), PRIMARY KEY(fournisseurs_id, medicaments_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medicaments (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, pa DOUBLE PRECISION NOT NULL, pv DOUBLE PRECISION NOT NULL, qte INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacies (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacies_medicaments (pharmacies_id INT NOT NULL, medicaments_id INT NOT NULL, INDEX IDX_709BB83D6DA819FC (pharmacies_id), INDEX IDX_709BB83DC403D7FB (medicaments_id), PRIMARY KEY(pharmacies_id, medicaments_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacies_fournisseurs (pharmacies_id INT NOT NULL, fournisseurs_id INT NOT NULL, INDEX IDX_879C545A6DA819FC (pharmacies_id), INDEX IDX_879C545A27ACDDFD (fournisseurs_id), PRIMARY KEY(pharmacies_id, fournisseurs_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pharmacies_clients (pharmacies_id INT NOT NULL, clients_id INT NOT NULL, INDEX IDX_7120FE166DA819FC (pharmacies_id), INDEX IDX_7120FE16AB014612 (clients_id), PRIMARY KEY(pharmacies_id, clients_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel VARCHAR(20) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classification_medicaments ADD CONSTRAINT FK_E698AAEB2A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classification_medicaments ADD CONSTRAINT FK_E698AAEBC403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicaments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282C6DA819FC FOREIGN KEY (pharmacies_id) REFERENCES pharmacies (id)');
        $this->addSql('ALTER TABLE commandes ADD CONSTRAINT FK_35D4282CAB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
        $this->addSql('ALTER TABLE commandes_medicaments ADD CONSTRAINT FK_901D6A708BF5C2E6 FOREIGN KEY (commandes_id) REFERENCES commandes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commandes_medicaments ADD CONSTRAINT FK_901D6A70C403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicaments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournisseurs_medicaments ADD CONSTRAINT FK_C380E8AA27ACDDFD FOREIGN KEY (fournisseurs_id) REFERENCES fournisseurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fournisseurs_medicaments ADD CONSTRAINT FK_C380E8AAC403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicaments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pharmacies_medicaments ADD CONSTRAINT FK_709BB83D6DA819FC FOREIGN KEY (pharmacies_id) REFERENCES pharmacies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pharmacies_medicaments ADD CONSTRAINT FK_709BB83DC403D7FB FOREIGN KEY (medicaments_id) REFERENCES medicaments (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pharmacies_fournisseurs ADD CONSTRAINT FK_879C545A6DA819FC FOREIGN KEY (pharmacies_id) REFERENCES pharmacies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pharmacies_fournisseurs ADD CONSTRAINT FK_879C545A27ACDDFD FOREIGN KEY (fournisseurs_id) REFERENCES fournisseurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pharmacies_clients ADD CONSTRAINT FK_7120FE166DA819FC FOREIGN KEY (pharmacies_id) REFERENCES pharmacies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pharmacies_clients ADD CONSTRAINT FK_7120FE16AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification_medicaments DROP FOREIGN KEY FK_E698AAEB2A86559F');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282CAB014612');
        $this->addSql('ALTER TABLE pharmacies_clients DROP FOREIGN KEY FK_7120FE16AB014612');
        $this->addSql('ALTER TABLE commandes_medicaments DROP FOREIGN KEY FK_901D6A708BF5C2E6');
        $this->addSql('ALTER TABLE fournisseurs_medicaments DROP FOREIGN KEY FK_C380E8AA27ACDDFD');
        $this->addSql('ALTER TABLE pharmacies_fournisseurs DROP FOREIGN KEY FK_879C545A27ACDDFD');
        $this->addSql('ALTER TABLE classification_medicaments DROP FOREIGN KEY FK_E698AAEBC403D7FB');
        $this->addSql('ALTER TABLE commandes_medicaments DROP FOREIGN KEY FK_901D6A70C403D7FB');
        $this->addSql('ALTER TABLE fournisseurs_medicaments DROP FOREIGN KEY FK_C380E8AAC403D7FB');
        $this->addSql('ALTER TABLE pharmacies_medicaments DROP FOREIGN KEY FK_709BB83DC403D7FB');
        $this->addSql('ALTER TABLE commandes DROP FOREIGN KEY FK_35D4282C6DA819FC');
        $this->addSql('ALTER TABLE pharmacies_medicaments DROP FOREIGN KEY FK_709BB83D6DA819FC');
        $this->addSql('ALTER TABLE pharmacies_fournisseurs DROP FOREIGN KEY FK_879C545A6DA819FC');
        $this->addSql('ALTER TABLE pharmacies_clients DROP FOREIGN KEY FK_7120FE166DA819FC');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE classification_medicaments');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE commandes');
        $this->addSql('DROP TABLE commandes_medicaments');
        $this->addSql('DROP TABLE fournisseurs');
        $this->addSql('DROP TABLE fournisseurs_medicaments');
        $this->addSql('DROP TABLE medicaments');
        $this->addSql('DROP TABLE pharmacies');
        $this->addSql('DROP TABLE pharmacies_medicaments');
        $this->addSql('DROP TABLE pharmacies_fournisseurs');
        $this->addSql('DROP TABLE pharmacies_clients');
        $this->addSql('DROP TABLE users');
    }
}
