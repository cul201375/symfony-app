<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528232602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex_pokemon (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokedex_pokemon_pokedex (pokedex_pokemon_id INT NOT NULL, pokedex_id INT NOT NULL, INDEX IDX_4EB044518AF7A153 (pokedex_pokemon_id), INDEX IDX_4EB04451372A5D14 (pokedex_id), PRIMARY KEY(pokedex_pokemon_id, pokedex_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokedex_pokemon_pokemon (pokedex_pokemon_id INT NOT NULL, pokemon_id INT NOT NULL, INDEX IDX_4F5A22058AF7A153 (pokedex_pokemon_id), INDEX IDX_4F5A22052FE71C3E (pokemon_id), PRIMARY KEY(pokedex_pokemon_id, pokemon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pokedex_pokemon_pokedex ADD CONSTRAINT FK_4EB044518AF7A153 FOREIGN KEY (pokedex_pokemon_id) REFERENCES pokedex_pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokedex_pokemon_pokedex ADD CONSTRAINT FK_4EB04451372A5D14 FOREIGN KEY (pokedex_id) REFERENCES pokedex (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokedex_pokemon_pokemon ADD CONSTRAINT FK_4F5A22058AF7A153 FOREIGN KEY (pokedex_pokemon_id) REFERENCES pokedex_pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokedex_pokemon_pokemon ADD CONSTRAINT FK_4F5A22052FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokedex ADD id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE pokedex ADD CONSTRAINT FK_6336F6A779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6336F6A779F37AE5 ON pokedex (id_user_id)');
        $this->addSql('ALTER TABLE pokemon ADD genero_id INT NOT NULL');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F3BCE7B795 FOREIGN KEY (genero_id) REFERENCES gender (id)');
        $this->addSql('CREATE INDEX IDX_62DC90F3BCE7B795 ON pokemon (genero_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokedex_pokemon_pokedex DROP FOREIGN KEY FK_4EB044518AF7A153');
        $this->addSql('ALTER TABLE pokedex_pokemon_pokemon DROP FOREIGN KEY FK_4F5A22058AF7A153');
        $this->addSql('DROP TABLE pokedex_pokemon');
        $this->addSql('DROP TABLE pokedex_pokemon_pokedex');
        $this->addSql('DROP TABLE pokedex_pokemon_pokemon');
        $this->addSql('ALTER TABLE pokedex DROP FOREIGN KEY FK_6336F6A779F37AE5');
        $this->addSql('DROP INDEX IDX_6336F6A779F37AE5 ON pokedex');
        $this->addSql('ALTER TABLE pokedex DROP id_user_id');
        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F3BCE7B795');
        $this->addSql('DROP INDEX IDX_62DC90F3BCE7B795 ON pokemon');
        $this->addSql('ALTER TABLE pokemon DROP genero_id');
    }
}
