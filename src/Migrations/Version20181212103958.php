<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212103958 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stage (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(80) NOT NULL, description VARCHAR(400) DEFAULT NULL, contact VARCHAR(45) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE wp_commentmeta');
        $this->addSql('DROP TABLE wp_comments');
        $this->addSql('DROP TABLE wp_links');
        $this->addSql('DROP TABLE wp_options');
        $this->addSql('DROP TABLE wp_postmeta');
        $this->addSql('DROP TABLE wp_posts');
        $this->addSql('DROP TABLE wp_term_relationships');
        $this->addSql('DROP TABLE wp_term_taxonomy');
        $this->addSql('DROP TABLE wp_termmeta');
        $this->addSql('DROP TABLE wp_terms');
        $this->addSql('DROP TABLE wp_usermeta');
        $this->addSql('DROP TABLE wp_users');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wp_commentmeta (meta_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, comment_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, meta_key VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, meta_value LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX comment_id (comment_id), INDEX meta_key (meta_key), PRIMARY KEY(meta_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_comments (comment_ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, comment_post_ID BIGINT UNSIGNED DEFAULT 0 NOT NULL, comment_author TINYTEXT NOT NULL COLLATE utf8mb4_unicode_ci, comment_author_email VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_author_url VARCHAR(200) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_author_IP VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, comment_date_gmt DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, comment_content TEXT NOT NULL COLLATE utf8mb4_unicode_ci, comment_karma INT DEFAULT 0 NOT NULL, comment_approved VARCHAR(20) DEFAULT \'1\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_agent VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_type VARCHAR(20) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_parent BIGINT UNSIGNED DEFAULT 0 NOT NULL, user_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, INDEX comment_post_ID (comment_post_ID), INDEX comment_approved_date_gmt (comment_approved, comment_date_gmt), INDEX comment_date_gmt (comment_date_gmt), INDEX comment_parent (comment_parent), INDEX comment_author_email (comment_author_email), PRIMARY KEY(comment_ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_links (link_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, link_url VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, link_name VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, link_image VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, link_target VARCHAR(25) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, link_description VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, link_visible VARCHAR(20) DEFAULT \'Y\' NOT NULL COLLATE utf8mb4_unicode_ci, link_owner BIGINT UNSIGNED DEFAULT 1 NOT NULL, link_rating INT DEFAULT 0 NOT NULL, link_updated DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, link_rel VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, link_notes MEDIUMTEXT NOT NULL COLLATE utf8mb4_unicode_ci, link_rss VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, INDEX link_visible (link_visible), PRIMARY KEY(link_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_options (option_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, option_name VARCHAR(191) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, option_value LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, autoload VARCHAR(20) DEFAULT \'yes\' NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX option_name (option_name), PRIMARY KEY(option_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_postmeta (meta_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, post_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, meta_key VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, meta_value LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX post_id (post_id), INDEX meta_key (meta_key), PRIMARY KEY(meta_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_posts (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, post_author BIGINT UNSIGNED DEFAULT 0 NOT NULL, post_date DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, post_date_gmt DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, post_content LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, post_title TEXT NOT NULL COLLATE utf8mb4_unicode_ci, post_excerpt TEXT NOT NULL COLLATE utf8mb4_unicode_ci, post_status VARCHAR(20) DEFAULT \'publish\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_status VARCHAR(20) DEFAULT \'open\' NOT NULL COLLATE utf8mb4_unicode_ci, ping_status VARCHAR(20) DEFAULT \'open\' NOT NULL COLLATE utf8mb4_unicode_ci, post_password VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, post_name VARCHAR(200) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, to_ping TEXT NOT NULL COLLATE utf8mb4_unicode_ci, pinged TEXT NOT NULL COLLATE utf8mb4_unicode_ci, post_modified DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, post_modified_gmt DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, post_content_filtered LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, post_parent BIGINT UNSIGNED DEFAULT 0 NOT NULL, guid VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, menu_order INT DEFAULT 0 NOT NULL, post_type VARCHAR(20) DEFAULT \'post\' NOT NULL COLLATE utf8mb4_unicode_ci, post_mime_type VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, comment_count BIGINT DEFAULT 0 NOT NULL, INDEX post_name (post_name), INDEX type_status_date (post_type, post_status, post_date, ID), INDEX post_parent (post_parent), INDEX post_author (post_author), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_term_relationships (object_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, term_taxonomy_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, term_order INT DEFAULT 0 NOT NULL, INDEX term_taxonomy_id (term_taxonomy_id), PRIMARY KEY(object_id, term_taxonomy_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_term_taxonomy (term_taxonomy_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, term_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, taxonomy VARCHAR(32) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, description LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, parent BIGINT UNSIGNED DEFAULT 0 NOT NULL, count BIGINT DEFAULT 0 NOT NULL, UNIQUE INDEX term_id_taxonomy (term_id, taxonomy), INDEX taxonomy (taxonomy), PRIMARY KEY(term_taxonomy_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_termmeta (meta_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, term_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, meta_key VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, meta_value LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX term_id (term_id), INDEX meta_key (meta_key), PRIMARY KEY(meta_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_terms (term_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(200) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, slug VARCHAR(200) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, term_group BIGINT DEFAULT 0 NOT NULL, INDEX slug (slug), INDEX name (name), PRIMARY KEY(term_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_usermeta (umeta_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user_id BIGINT UNSIGNED DEFAULT 0 NOT NULL, meta_key VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, meta_value LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX user_id (user_id), INDEX meta_key (meta_key), PRIMARY KEY(umeta_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wp_users (ID BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, user_login VARCHAR(60) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, user_pass VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, user_nicename VARCHAR(50) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, user_email VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, user_url VARCHAR(100) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, user_registered DATETIME DEFAULT \'0000-00-00 00:00:00\' NOT NULL, user_activation_key VARCHAR(255) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, user_status INT DEFAULT 0 NOT NULL, display_name VARCHAR(250) DEFAULT \'\' NOT NULL COLLATE utf8mb4_unicode_ci, INDEX user_login_key (user_login), INDEX user_nicename (user_nicename), INDEX user_email (user_email), PRIMARY KEY(ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE stage');
    }
}
