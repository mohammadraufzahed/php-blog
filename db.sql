-- Create users table
CREATE TABLE IF NOT EXISTS `users`
(
    `id`         INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username`   VARCHAR(50)  NOT NULL UNIQUE,
    `password`   VARCHAR(255) NOT NULL,
    `email`      VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci,
    `is_admin`   ENUM ('Y', 'N') DEFAULT 'N',
    `created_at` DATETIME        DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS `settings`
(
    `blogTitle`       VARCHAR(50)  NOT NULL,
    `blogDescription` VARCHAR(150) NOT NULL,
    `blogAuthor`      VARCHAR(40)  NOT NULL,
    `blogAuthorInfo`  VARCHAR(250) NOT NULL
);
CREATE TABLE IF NOT EXISTS `posts`
(
    `id`         INT             NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id`    INT             NOT NULL,
    `title`      VARCHAR(255)    NOT NULL,
    `body`       TEXT            NOT NULL,
    `created_at` TIMESTAMP                DEFAULT CURRENT_TIMESTAMP,
    `published`  ENUM ('Y', 'N') NOT NULL DEFAULT 'N'
);

INSERT INTO `settings`(`blogTitle`, `blogDescription`, `blogAuthor`, `blogAuthorInfo`) VALUES ('Blog', 'Simple Blog', 'Jonh', 'Pro developer');
INSERT INTO `users`(`username`, `password`, `email`, `is_admin`) VALUES ('admin', '$2y$10$sJp2evNq5fp8SkJu7CfGQOmY7pIMHFLd09eORbCVabkHlinn6RoOm', 'email@riseup.net', 'Y');
commit;