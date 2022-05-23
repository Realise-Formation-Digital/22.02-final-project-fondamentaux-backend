SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Structure de la table `columns`
--
DROP TABLE IF EXISTS `columns`;
CREATE TABLE `columns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Déchargement des données de la table `colums`
--
INSERT INTO `columns` (`id`, `name`, `color`)
VALUES (1, 'To Do', 'Red'),
  (2, 'In Progress', 'Orange'),
  (3, 'Done', 'Green');
ALTER TABLE `columns`
ADD PRIMARY KEY (`id`);
-- Structure de la table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`)
VALUES (
    1,
    'groupe_Vinko',
    'Da Silva',
    'Bruno',
    'dasilva@gmail.com'
  ),
  (
    2,
    'groupe_Vinko',
    'Kherbache',
    'Sami',
    'Sami_kherbache@hotmail.com'
  ),
  (
    3,
    'groupe_Vinko',
    'roditi',
    'Vinko',
    'vinko.d.roditi@gmail.com'
  ),
  (
    4,
    'groupe_Vinko',
    'Gosselke',
    'Loic',
    'GosselkeLoic@gmail.com'
  ),
  (
    5,
    'groupe_Bachir',
    'Aouad',
    'Bachir',
    'bachiraouad.aouad@gmail.com'
  ),
  (
    6,
    'groupe_Bachir',
    'Sousa',
    'Gabriel',
    'gab1000sousa@gmail.com'
  ),
  (
    7,
    'groupe_Bachir',
    'Dejean',
    'Xavier',
    'dejuan.xavier@gmail.com'
  ),
  (
    8,
    'groupe_Aniello',
    'Cortez',
    'Diago',
    'cortezdiago@gmail.com'
  ),
  (
    9,
    'groupe_Aniello',
    'Olivera',
    'Diogo',
    'diogu.7@hotmail.com'
  ),
  (
    10,
    'groupe_Aniello',
    'ferrera',
    'Gabriel',
    'j.gabriel.fds.1@gmail.com'
  ),
  (
    11,
    'groupe_Aniello',
    'Frasca',
    'Aniello',
    'aniellofrasca@gmail.com'
  ),
  (
    12,
    'groupe_Lamine',
    'Naitliman',
    'Eyes',
    'Eyes.naitliman@gmail.com'
  ),
  (
    13,
    'groupe_Lamine',
    'Ezechiel-Favre',
    'Yonathan',
    'esechiel.yonathan.favre@gmail.com'
  ),
  (
    14,
    'groupe_Lamine',
    'Lamine',
    'Sakho',
    'sakho.lamine2k19@gmail.com'
  ),
  (
    15,
    'groupe_Olivier',
    'Sow',
    'Boubakar',
    'boubakars@gmail.com'
  ),
  (
    16,
    'groupe_Olivier',
    'Vavrina',
    'Patrick',
    'patrick@club-linux.ch'
  ),
  (
    17,
    'groupe_Olivier',
    'Olivier',
    'Cardona',
    'ocardo73@gmail.com'
  );
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);
--
-- Structure de la table `tasks`

--
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_from` varchar(255) NOT NULL,
  `date_to` varchar(255) NOT NULL,
  `status` ENUM('draft', 'open', 'close'),
  `columns_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `columns_id` (`columns_id`),
  UNIQUE KEY `users_id` (`users_id`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`columns_id`) REFERENCES `columns` (`id`),
  CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

INSERT INTO tasks (
    id,
    name,
    description,
    date_from,
    date_to,
    status,
    columns_id,
    users_id
  )
VALUES (
    1,
    'Groupe_KANBAN',
    'supression',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '1'
  ),
  (
    2,
    'Groupe_KANBAN',
    'edition',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '2'
  ),
  (
    3,
    'Groupe_KANBAN',
    'base KANBAN',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '3'
  ),
  (
    4,
    'Groupe_KANBAN',
    'requête AXIOS',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '4'
  ),
  (
    5,
    'Groupe_CALENDAR',
    'fullcalendarJS',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '5'
  ),
  (
    6,
    'Groupe_CALENDAR',
    'notion de date_to_from',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '6'
  ),
  (
    7,
    'Groupe_CALENDAR',
    'modal avec détail de la tache',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '7'
  ),
  (
    8,
    'Groupe_TEMPLATES',
    'Page enregistrement avec formulaire',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '8'
  ),
  (
    9,
    'Groupe_TEMPLATES',
    'Page enregistrement avec formulaire',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '9'
  ),
  (
    10,
    'Groupe_TEMPLATES',
    'Page accueil',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '10'
  ),
  (
    11,
    'Groupe_TEMPLATES',
    'footer et header',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '11'
  ),
  (
    12,
    'Groupe_Controller_PHP',
    'Scrum et Taskcontroller et routeTask',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '12'
  ),
  (
    13,
    'Groupe_Controller_PHP',
    'UsersController et routeUsers',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '13'
  ),
  (
    14,
    'Groupe_Controller_PHP',
    'ColumnsControler et routeColumn',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '14'
  ),
  (
    15,
    'Groupe_Models_BDD',
    'Models',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '15'
  ),
  (
    16,
    'Groupe_Models_BDD',
    'BDD',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '16'
  ),
  (
    17,
    'Groupe_Models_BDD',
    'Models et BDD',
    '14.05.22',
    '26.05.22',
    'open',
    '2',
    '17'
  );
PRIMARY KEY (`id`),
UNIQUE KEY `columns_id` (`columns_id`),
UNIQUE KEY `users_id` (`users_id`),
CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`columns_id`) REFERENCES `columns` (`id`),
CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`columns_id`) REFERENCES `columns` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;