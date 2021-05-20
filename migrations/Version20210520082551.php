<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520082551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actor (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, image VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE actor_movie (actor_id INTEGER NOT NULL, movie_id INTEGER NOT NULL, PRIMARY KEY(actor_id, movie_id))');
        $this->addSql('CREATE INDEX IDX_39DA19FB10DAF24A ON actor_movie (actor_id)');
        $this->addSql('CREATE INDEX IDX_39DA19FB8F93B6FC ON actor_movie (movie_id)');
        $this->addSql('CREATE TABLE genre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE genre_movie (genre_id INTEGER NOT NULL, movie_id INTEGER NOT NULL, PRIMARY KEY(genre_id, movie_id))');
        $this->addSql('CREATE INDEX IDX_A058EDAA4296D31F ON genre_movie (genre_id)');
        $this->addSql('CREATE INDEX IDX_A058EDAA8F93B6FC ON genre_movie (movie_id)');
        $this->addSql('CREATE TABLE movie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, created_by_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, vo_name VARCHAR(255) DEFAULT NULL, release_date DATE DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, synopsis CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_1D5EF26FB03A8386 ON movie (created_by_id)');
        $this->addSql('CREATE TABLE studio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE studio_movie (studio_id INTEGER NOT NULL, movie_id INTEGER NOT NULL, PRIMARY KEY(studio_id, movie_id))');
        $this->addSql('CREATE INDEX IDX_E3EB12A2446F285F ON studio_movie (studio_id)');
        $this->addSql('CREATE INDEX IDX_E3EB12A28F93B6FC ON studio_movie (movie_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, username VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE watch_list (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, movie_id INTEGER NOT NULL, user_id INTEGER NOT NULL, seen BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_152B584B8F93B6FC ON watch_list (movie_id)');
        $this->addSql('CREATE INDEX IDX_152B584BA76ED395 ON watch_list (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE actor_movie');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE genre_movie');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE studio');
        $this->addSql('DROP TABLE studio_movie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE watch_list');
    }
}
