-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 août 2022 à 13:33
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `journal`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `nom`, `prenom`, `mail`, `content`) VALUES
(1, 'AKEB DAOUD', 'Elia', 'elia-akeb@hotmail.fr', 'Super');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id_publication`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `titre`, `content`) VALUES
(13, 'Id suscipit molestiae sed alias ', 'Lorem ipsum dolor sit amet. Quo corrupti dignissimos non cupiditate nostrum eum voluptas recusandae ut dolore sint qui enim ipsam est accusantium officiis aut modi unde. Ab voluptas facere in amet amet in quasi optio et ullam error. Et ratione eveniet non nesciunt totam At nemo sint ut quia sint dolor dolor ut dolore quia et deleniti eaque. Qui sunt odio ut perferendis impedit et impedit adipisci.\r\n\r\nId suscipit molestiae sed alias exercitationem ut tempora dolore aut galisum ut explicabo impedit et maiores omnis. Nam dolorem quia qui sint aspernatur cum fuga laborum quo modi saepe ut omnis nesciunt aut esse exercitationem rem quia iste.\r\n\r\nUt ducimus delectus est recusandae dolore et blanditiis molestias eum illum minus aut dicta ipsum. Hic voluptate dolores sit voluptatem molestiae et doloremque galisum eos consequatur architecto vel harum aspernatur cum quis quibusdam ea recusandae voluptas.\r\n\r\nSit velit dolores non commodi omnis ut sint necessitatibus ut laboriosam cumque est dicta omnis et dignissimos internos eos quae similique. Et impedit alias ut rerum nobis et laboriosam sint est nostrum repellendus eos quia velit et laboriosam dolores qui quae! Est quisquam asperiores quo totam omnis est dolorem blanditiis aut voluptatibus saepe qui velit obcaecati quo quasi dolor aut ducimus magni. Sed voluptates odio ea debitis magnam itaque quisquam hic Quis galisum qui iure accusantium et consequatur suscipit.\r\n\r\nSed necessitatibus minima est dolore possimus qui esse dolore vel molestiae ipsa est cupiditate enim aut dolores voluptatibus ad fugit aperiam. Est fuga impedit et ullam galisum vel nulla distinctio qui similique enim. Vel debitis incidunt sit omnis suscipit eos unde fugiat quo omnis quaerat. Sed necessitatibus harum quo suscipit eveniet id nihil recusandae eum animi quam in inventore esse nam mollitia eius.\r\n\r\nVel sapiente voluptas sit nihil dolore id veniam ratione est accusamus officia. Non quam fugiat a velit molestiae ut consequatur tempore. Ut consequatur iusto eum facilis quia non unde quis eos eius dolore vel sint galisum aut quaerat tempora! Eum magni facere qui eligendi obcaecati ad illum iusto!\r\n\r\nIn doloribus dolore sit alias laudantium ut optio sequi ut cupiditate excepturi. Sed perspiciatis distinctio qui repudiandae optio ut illo temporibus ea voluptates asperiores 33 inventore perspiciatis non dolorem nemo et dolorem assumenda?'),
(14, 'Et dolores voluptas sit blanditiis', 'Lorem ipsum dolor sit amet. A aperiam cupiditate At sunt adipisci a fugiat corrupti est obcaecati similique et omnis itaque cum voluptate incidunt cum doloremque maiores. Non molestiae dolore id vero cupiditate qui iusto consequatur 33 beatae magnam aut corporis odio.\r\n\r\nQui saepe dolor et magnam voluptas aut veniam molestias vel consequatur obcaecati est omnis ipsa non libero enim. Id consequatur soluta qui fugiat animi aut facilis voluptatem.\r\n\r\nEt blanditiis laudantium aut molestiae dolorum est quia eveniet est similique accusantium aut doloribus quae est aperiam autem. Quo dicta quibusdam qui unde distinctio in voluptatum neque. Eos autem voluptas non dolores quos in blanditiis asperiores sit quia delectus ut internos iste At assumenda adipisci et temporibus mollitia. Ea obcaecati explicabo aut amet beatae sed sunt amet et quidem officiis.\r\n\r\nEt dolores voluptas sit blanditiis dolor aut ullam minus est obcaecati dolores id quibusdam illo. Non nostrum officia quo maxime perspiciatis est provident expedita sed aliquid saepe rem veniam quia eum quas assumenda At galisum pariatur.\r\n\r\nUt animi minus ea error accusantium vel vero saepe quo quod quibusdam est pariatur quam et provident omnis aut corporis dignissimos. Et necessitatibus fugit quo consectetur perspiciatis nam unde eaque vel velit quia. Id debitis facilis et ullam dolorum eos nobis sapiente ex voluptatem facere et nemo autem sed illum voluptas et iusto saepe?\r\n\r\nSed ratione quia et dolorem officiis sed sint reiciendis aut quia obcaecati aut assumenda dolorum est officiis voluptas. Hic consequatur modi qui facilis sapiente quo officiis quia aut fugiat amet.\r\n\r\nEa quos voluptatum est internos ullam eos dolorem provident qui voluptas dolorem. Non laboriosam itaque non consectetur adipisci cum iste velit et labore autem vel aperiam facilis sit sint quod aut enim aspernatur. Cum itaque cupiditate aut aliquam tenetur qui galisum suscipit vel ullam rerum? 33 omnis corrupti quo molestiae molestias est inventore assumenda cum neque assumenda.\r\n\r\nQui velit sint hic reiciendis incidunt rem eveniet accusamus nam animi beatae et voluptatem blanditiis ea magnam facere qui eaque repellendus. Eos consequatur dolore qui laborum repellendus eum sunt obcaecati sit quos perspiciatis. Sit possimus odio ut corporis velit sed quisquam voluptatem qui placeat doloremque! Sit consectetur dolor aut sunt sint in aspernatur nulla et sapiente unde?\r\n\r\nEst architecto asperiores non odio optio et ducimus aliquam ea nemo consequatur sit dolores tempore eum dolorem dolore ex debitis illo. Aut fugiat alias qui exercitationem voluptas in dolores ipsa eum ipsa architecto sed labore voluptatum. Est dolorem accusamus qui voluptate dolorem est rerum recusandae et autem obcaecati quo nemo adipisci in facere modi ab repudiandae veritatis! Et pariatur sint ut voluptatibus laudantium aut eaque voluptas qui labore quas et enim cumque?\r\n\r\nEt quia magnam ea neque dolor qui ratione laboriosam. Aut repudiandae rerum et veritatis esse ut quas architecto aut quasi dolorum sit tempore quibusdam. Id voluptas et unde fugiat in fugit rerum.'),
(15, 'Qui libero eaque', ' Texte gÃ©nÃ©rÃ©\r\nLorem ipsum dolor sit amet. Qui accusantium odio in commodi soluta ut maxime corrupti non voluptatem ullam cum magnam esse? Ut sunt voluptate est facilis nulla eos autem voluptas.\r\n\r\nEt eaque quia est velit quasi et dolor facere vel amet Quis et nostrum iure. Rem labore doloremque sit harum voluptatem ut internos atque ad facere alias ut labore reiciendis. Non voluptatem impedit vel debitis distinctio ut assumenda consequatur. Ab quia voluptatum eos laborum veniam quo veniam numquam hic quia facilis ut culpa veritatis!\r\n\r\nEt blanditiis dignissimos non quia unde qui Quis tempora ut explicabo laboriosam et odit sunt. Ut nemo aspernatur qui similique impedit et sunt quia id culpa molestiae! Hic omnis excepturi aut impedit praesentium id praesentium porro est exercitationem necessitatibus. Sed voluptas adipisci sit laborum nobis aut voluptatem necessitatibus est omnis asperiores est quis enim ut exercitationem esse.\r\n\r\nAd nihil eveniet ut laudantium eius a impedit quae et eius exercitationem et quibusdam magni eos repellendus autem et dolores facilis! Hic eligendi tenetur ex minus laborum aut repellat nobis. Nam cupiditate quia non velit recusandae ut corrupti voluptas sit nesciunt quisquam est repellat provident et expedita nihil vel rerum nemo.'),
(16, 'Et eaque quia est velit', 'Lorem ipsum dolor sit amet. Qui accusantium odio in commodi soluta ut maxime corrupti non voluptatem ullam cum magnam esse? Ut sunt voluptate est facilis nulla eos autem voluptas.\r\n\r\nEt eaque quia est velit quasi et dolor facere vel amet Quis et nostrum iure. Rem labore doloremque sit harum voluptatem ut internos atque ad facere alias ut labore reiciendis. Non voluptatem impedit vel debitis distinctio ut assumenda consequatur. Ab quia voluptatum eos laborum veniam quo veniam numquam hic quia facilis ut culpa veritatis!\r\n\r\nEt blanditiis dignissimos non quia unde qui Quis tempora ut explicabo laboriosam et odit sunt. Ut nemo aspernatur qui similique impedit et sunt quia id culpa molestiae! Hic omnis excepturi aut impedit praesentium id praesentium porro est exercitationem necessitatibus. Sed voluptas adipisci sit laborum nobis aut voluptatem necessitatibus est omnis asperiores est quis enim ut exercitationem esse.\r\n\r\nAd nihil eveniet ut laudantium eius a impedit quae et eius exercitationem et quibusdam magni eos repellendus autem et dolores facilis! Hic eligendi tenetur ex minus laborum aut repellat nobis. Nam cupiditate quia non velit recusandae ut corrupti voluptas sit nesciunt quisquam est repellat provident et expedita nihil vel rerum nemo.\r\n\r\nQui libero eaque cum dolores sint vel aliquid nemo ea iure autem qui accusantium illum est aliquid asperiores aut aperiam aliquam. Cum accusamus quia eum quia necessitatibus et delectus libero et unde exercitationem sit excepturi maxime ut obcaecati alias. Qui laborum galisum sit natus esse ea officiis exercitationem. Et sunt atque ut quae animi et laudantium perferendis a beatae fugiat et natus voluptatem At animi rerum qui ducimus voluptatem.\r\n\r\nUt voluptatem sint ad vero facere rem iure fugit ut voluptatum sunt ex nemo inventore nam dignissimos iusto eum commodi iusto! At enim inventore ea voluptatem maiores id officiis nihil et illum eligendi ea assumenda cupiditate. In voluptas error qui repudiandae magnam ea voluptate rerum aut voluptatem nesciunt qui delectus odio nemo mollitia et eligendi quidem.\r\n\r\nQuo sint nesciunt id illo magni ut repellat vero vel tenetur iste. Est perferendis alias eos sunt sequi et adipisci corrupti in dolor accusantium exercitationem.\r\n\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `nom`, `prenom`, `mail`, `mdp`, `role`) VALUES
(23, 'AKEB', 'Elia', 'elia-akeb@gmail.com', '$2y$10$hY15HIiX11dkD5WkegAZluny/Lx5x9Odx4Op3a4a3u4rsBOg8ILpq', 'admin'),
(24, 'Ripoll', 'Lila', 'lila@gmail.com', '$2y$10$L3yg1Q7ko6.sICV8H1YJheL9qPATCyn9M0vc5UvVEVHUOI9vZ.4LO', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
