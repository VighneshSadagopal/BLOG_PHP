-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 12:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `short` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `images` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `author`, `title`, `description`, `short`, `id`, `images`) VALUES
(1, 'admin', 'Wordpress', 'WordPress is a free, open-source website creation platform. On a more technical level, WordPress is a content management system (CMS) written in PHP that uses a MySQL database. In non-geek speak, WordPress is the easiest and most powerful blogging and website builder in existence today.', 'nice offical website which is used as web designing', 1, ''),
(2, 'admin', 'cars', 'Ducati Motor Holding S.p.A. (Italian pronunciation: [duˈkaːti]) is the motorcycle-manufacturing division of Italian company Ducati, headquartered in Bologna, Italy. The company is owned by Italian automotive manufacturer Lamborghini, through its German parent company Audi, itself owned by the Volkswagen Group.', 'Ducati Motor Holding S.p.A. (Italian pronunciation: [duˈkaːti]) is the motorcycle-manufacturing division of Italian company Ducati, headquartered in Bologna, Italy. The company is owned by Italian automotive manufacturer Lamborghini, through its German pa', 1, ''),
(3, 'admin', 'LOREM EPSUM', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum ', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form,', 1, ''),
(4, 'vighnesh', 'Bugs are biting: Safety precautions for children', 'The most effective repellent is DEET (N, N-diethyl-meta-toluamide). It works against both mosquitoes and ticks, and is definitely the go-to repellent if you really want or need to prevent bites. The higher the concentration, the longer it lasts: 10% will give you about two hours of coverage, while 30% can protect you for about five hours. The American Academy of Pediatrics (AAP) recommends not using more than 30% on kids, and not using any repellents on infants less than 2 months old.\r\n\r\nThe most common side effect is skin irritation, and if you ingest it (you never know with little kids) it can lead to nausea and vomiting. Eye irritation is possible, which is why you should never spray any repellent directly to the face, but rather put it on your hands and then carefully apply to the face. ', 'If you spend time outdoors — which we all should do, for all sorts of reasons — you are likely to encounter biting bugs. Most of the time the bites are just a nuisance. But besides the fact that sometimes they can be painful or itchy, bug bites can lead t', 2, ''),
(5, 'admin', '10 Foods Are Almost Pure ', '1. Chicken breast\r\nChicken is one of the most commonly consumed high protein foods.\r\n2. Turkey breast\r\nTurkey is a low fat source of protein. The breast is the leanest part of the bird.\r\n3. Egg whites\r\nLike most other animal foods, eggs have high quality protein that contains all the amino acids.\r\n4. Dried fish\r\nDried fish is a tasty snack that comes in many varieties.\r\n5. Shrimp\r\nShrimp is a great food to include in your diet.\r\n6. Tuna\r\nTuna is very low in calories and fat, which makes it an almost pure-protein food.\r\n7. Halibut\r\nHalibut is another fish that is a great source of complete protein. Half of a fillet (159 grams) of halibut provides 36 grams of protein and 176 calories (16Trusted Source).\r\n8. Tilapia\r\nTilapia is a popular, relatively inexpensive fish.\r\n9. Cod\r\nCod is a cold-water fish with a d', 'The foods listed above are rich in protein.\r\nMany have other health benefits as well due to their high content of omega-3s, vitamins, and minerals.\r\nBecause these foods are so high in protein, they’re also incredibly filling despite being low in calories.', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `your` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `dob`, `your`, `usertype`) VALUES
(1, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2021-08-15', 'this is my blog where i post all my stuff ', 'admin'),
(2, 'vighnesh', 's.vighneshofficial@gmail.com', 'b27cfbe8c1b9d6ee725acf20bf86e689', '2000-04-18', 'I am student i have just completed my graduation and will appear soon for job i post content with mixology and favourite content is about music . I am a musician I am a keyboard player.', 'user'),
(3, 'Karthik Sadagopal', 'karthik@gmail.com', '04206f8a576b1640330ca78cd7285328', '2021-08-12', '', 'user'),
(4, 'Rocky Fernandez', 'rocky@gmail.com', 'a1109fb84511bc88d90dff250a110477', '2021-08-12', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
