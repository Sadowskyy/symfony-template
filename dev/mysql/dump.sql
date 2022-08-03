-- You can paste here some schemas etc. also you can do it in another file with .sql extension
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
    `id`               int(10) NOT NULL AUTO_INCREMENT,
    `uuid`             varchar(36) CHARACTER SET utf8  NOT NULL,
    `email`            varchar(250) CHARACTER SET utf8 NOT NULL,
    `password`         char(60) CHARACTER SET utf8              DEFAULT NULL,
    `active`           char(1) CHARACTER SET utf8      NOT NULL DEFAULT '0',
    `language`         char(2) CHARACTER SET utf8      NOT NULL,
    `name`             varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '',
    `api_key`        char(32) CHARACTER SET utf8     NOT NULL DEFAULT '',
    `account_id`       int(10) NOT NULL,
    `created_at`       datetime                        NOT NULL,
    `updated_at`       datetime                        NOT NULL,
    PRIMARY KEY (`id`),
    KEY                `email` (`email`),
    KEY                `legacy` (`legacy_id`),
    KEY                `account_id` (`account_id`),
    KEY                `uuid` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
