<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221229203244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, UNIQUE INDEX UNIQ_880E0D76A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_client (admin_id INT NOT NULL, client_id INT NOT NULL, INDEX IDX_9A8C35AC642B8210 (admin_id), INDEX IDX_9A8C35AC19EB6921 (client_id), PRIMARY KEY(admin_id, client_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_proprietaire (admin_id INT NOT NULL, proprietaire_id INT NOT NULL, INDEX IDX_10A23B3B642B8210 (admin_id), INDEX IDX_10A23B3B76C50E4A (proprietaire_id), PRIMARY KEY(admin_id, proprietaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(100) NOT NULL, tel VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, date DATE NOT NULL, adresse_livraison VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, date_livraison DATE DEFAULT NULL, payment VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, quantite INT DEFAULT NULL, livraison VARCHAR(255) DEFAULT NULL, INDEX IDX_4BCD5F682EA2E54 (commande_id), INDEX IDX_4BCD5F6F347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garde (id INT AUTO_INCREMENT NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, proprietaire_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date_expiration DATE NOT NULL, prix_ht DOUBLE PRECISION NOT NULL, prix_tva DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, quantite INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_29A5EC27BCF5E72D (categorie_id), INDEX IDX_29A5EC2776C50E4A (proprietaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nom_pharmacie VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_69E399D6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire_garde (proprietaire_id INT NOT NULL, garde_id INT NOT NULL, INDEX IDX_141303DA76C50E4A (proprietaire_id), INDEX IDX_141303DA2D6D57CE (garde_id), PRIMARY KEY(proprietaire_id, garde_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, sujet VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, emmeteur VARCHAR(255) NOT NULL, INDEX IDX_CE606404A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, registred_at DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, statut VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, nb_visite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE admin_client ADD CONSTRAINT FK_9A8C35AC642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_client ADD CONSTRAINT FK_9A8C35AC19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_proprietaire ADD CONSTRAINT FK_10A23B3B642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE admin_proprietaire ADD CONSTRAINT FK_10A23B3B76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE details_commande ADD CONSTRAINT FK_4BCD5F682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE details_commande ADD CONSTRAINT FK_4BCD5F6F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2776C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE proprietaire ADD CONSTRAINT FK_69E399D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE proprietaire_garde ADD CONSTRAINT FK_141303DA76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE proprietaire_garde ADD CONSTRAINT FK_141303DA2D6D57CE FOREIGN KEY (garde_id) REFERENCES garde (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76A76ED395');
        $this->addSql('ALTER TABLE admin_client DROP FOREIGN KEY FK_9A8C35AC642B8210');
        $this->addSql('ALTER TABLE admin_client DROP FOREIGN KEY FK_9A8C35AC19EB6921');
        $this->addSql('ALTER TABLE admin_proprietaire DROP FOREIGN KEY FK_10A23B3B642B8210');
        $this->addSql('ALTER TABLE admin_proprietaire DROP FOREIGN KEY FK_10A23B3B76C50E4A');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE details_commande DROP FOREIGN KEY FK_4BCD5F682EA2E54');
        $this->addSql('ALTER TABLE details_commande DROP FOREIGN KEY FK_4BCD5F6F347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2776C50E4A');
        $this->addSql('ALTER TABLE proprietaire DROP FOREIGN KEY FK_69E399D6A76ED395');
        $this->addSql('ALTER TABLE proprietaire_garde DROP FOREIGN KEY FK_141303DA76C50E4A');
        $this->addSql('ALTER TABLE proprietaire_garde DROP FOREIGN KEY FK_141303DA2D6D57CE');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404A76ED395');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE admin_client');
        $this->addSql('DROP TABLE admin_proprietaire');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE details_commande');
        $this->addSql('DROP TABLE garde');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE proprietaire_garde');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE visite');
    }
}
