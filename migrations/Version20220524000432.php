<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524000432 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, id_user INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokedex_pokemon (pokedex_id INT NOT NULL, pokemon_id INT NOT NULL, INDEX IDX_BD0379D5372A5D14 (pokedex_id), INDEX IDX_BD0379D52FE71C3E (pokemon_id), PRIMARY KEY(pokedex_id, pokemon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, tipo VARCHAR(255) NOT NULL, genero VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokedex_pokemon ADD CONSTRAINT FK_BD0379D5372A5D14 FOREIGN KEY (pokedex_id) REFERENCES pokedex (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokedex_pokemon ADD CONSTRAINT FK_BD0379D52FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokedex_pokemon DROP FOREIGN KEY FK_BD0379D5372A5D14');
        $this->addSql('ALTER TABLE pokedex_pokemon DROP FOREIGN KEY FK_BD0379D52FE71C3E');
        $this->addSql('DROP TABLE pokedex');
        $this->addSql('DROP TABLE pokedex_pokemon');
        $this->addSql('DROP TABLE pokemon');
    }
}
