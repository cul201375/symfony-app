<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528223929 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, iduser INT NOT NULL, n VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, pokemon_name VARCHAR(255) NOT NULL, base_form VARCHAR(255) NOT NULL, shiny_form VARCHAR(255) NOT NULL, abilities VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, front_img VARCHAR(400) NOT NULL, back_img VARCHAR(400) NOT NULL, base_xp INT NOT NULL, base_hp INT NOT NULL, evolutions LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', genero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP TABLE pokemon');
    }
}
