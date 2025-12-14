CREATE TABLE `utm_data` (
    `id` int NOT NULL AUTO_INCREMENT,
    `source` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `medium` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `campaign` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
    `content` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `term` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
    `created` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_520_ci;
