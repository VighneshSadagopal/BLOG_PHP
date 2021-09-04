-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2021 at 08:58 PM
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
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `po_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(1200) NOT NULL,
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`po_id`, `name`, `message`, `id`, `status`) VALUES
(1, 'Rajesh', 'I Rajesh Have Read All The Terms And Conditions And Accept It', 5, 'checked'),
(6, 'atul', 'I atul Have Read All The Terms And Conditions And Accept It', 8, 'checked'),
(9, 'mahesh ', 'I mahesh  Have Read All The Terms And Conditions And Accept It', 7, 'checked'),
(10, 'vishal', 'I vishal Have Read All The Terms And Conditions And Accept It', 6, 'checked'),
(11, 'raj', 'I raj Have Read All The Terms And Conditions And Accept It', 9, 'checked'),
(24, 'rahul', 'I rahul Have Read All The Terms And Conditions And Accept It', 19, 'checked'),
(25, 'jaideep', 'I jaideep Have Read All The Terms And Conditions And Accept It', 20, 'checked'),
(28, 'nikita', 'I nikita Have Read All The Terms And Conditions And Accept It', 0, 'unchecked');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `short` varchar(1200) NOT NULL,
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `author`, `title`, `description`, `short`, `id`, `images`, `category`) VALUES
(1, 'admin', 'cars', 'Ducati Motor Holding S.p.A. (Italian pronunciation: [duˈkaːti]) is the motorcycle-manufacturing division of Italian company Ducati, headquartered in Bologna, Italy. The company is owned by Italian automotive manufacturer Lamborghini, through its German parent company Audi, itself owned by the Volkswagen Group.', 'Ducati Motor Holding S.p.A. (Italian pronunciation: [duˈkaːti]) is the motorcycle-manufacturing division of Italian company Ducati, headquartered in Bologna, Italy. The company is owned by Italian automotive manufacturer Lamborghini, through its German pa', 1, 'a4e8f394-313b-11ea-a329-0bcf87a328f2.jfif', 'social'),
(3, 'admin', 'The Chunin Exam Battles Are On!', 'Get ready to cheer for your favorite characters, because the Chunin Exam battles are on! Naruto’s Shadow Clones face a wall of hands when he takes on Neji. In the midst of a bitter match between Sasuke and Gaara, Orochimaru strikes! Together with the sinister Sound Ninja, he wreaks his serpentine revenge on The Village Hidden in the Leaves with only the Hokage to stop him. Naruto desperately tries to keep a rampaging Gaara from succumbing to his rage! Can he break through Gaara’s pain?', 'Your favorite old school battles in Naruto, Set 3 on Blu-ray!', 11, 'naryto.jfif', 'anime'),
(4, 'admin', 'Planet', 'EARTH IS A BEAUTIFUL PLANET FULL OF LIVING AND NON LIVING CREATURES. THOUGH DUE TO SOME UPCOMING GLOBAL AWARNESS THE GREENERY FROM THE EARTH IS GONE MISSING . IF WITH TIME THEIRS NO RETURN OF TREES THEIR WILL BE NO RETURN OF HAPPINESS AMONG THE PEOPLE LIVING ON THE EARTH TOO.\r\nSO IT IS VERY NECESSARY TO SAVE THE REMAINING NATURAL THINGS TO GET SAVED FROM NATURAL CALAMITIES', 'MOTHER EARTH NEEDS TO BE PROTECTED and its regaining the natural cause that affects most of the human beign.', 11, 'earth.jpg', 'social'),
(5, 'admin', 'LOREM', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of ', 5, 'lorem-ipsum-fi-2.png', 'social'),
(6, 'admin', 'Chef', 'This dahi wada recipe is an adaptation of the best-selling dahi wada at San Francisco restaurant Besharam. Chef/owner Heena Patel is a lifelong vegetarian and grew up eating lots of legumes, grains, and vegetables. Her restaurant reflects the food of her upbringing: simple and highly flavorful Gujrati food. Unlike traditional dahi wada, where the lentils are served as puffs, Chef Patel smashes them flat, which creates a larger surface area for the creamy yogurt and the rest of the toppings. While Chef Patel prefers to leave the fritters unseasoned so her chutneys can really shine, you can spice yours up by adding ginger and chili pepper or diced green chilis and even mustard seeds to the lentil batter.', 'Known as “dahi bhalla” in the northern parts of India and “dahi wada” (or vada) in the southern parts of India, this chaat recipe involves making lentil fritters (wada), dousing them in a creamy yogurt (dahi) sauce, and then serving them with a variety of', 5, 'dahiwadaa.jfif', 'food'),
(7, 'admin', 'Devkund', 'The Devkund Waterfall trek distance is about 5-6 Kms on one side. It involves moderate trekking of a total of 4 hours with an easy difficulty level. The trek route is plain in the majority of the portions, with some medium ascent of 300 ft at the end of the trail. The route to the secluded falls is an enchanting one as it meanders through lush jungles, gushing rivers, tiny hamlets, and mountain valleys. The terrain gets rocky and muddy in many places. It crosses 3-4 streams and vast open fields along the way. Along the path, there is cute little man-made wooden bridges to cross the waters. En route to Devkund, trekkers come across a hydroelectric power generating dam called Mulshi Dam Or Tata Power Dam, in the quaint village of Bhira. The hydroelectric plant of Bhira was the third plant installed by the Tata Power Company Ltd in 1927. If you are lucky, you will catch a glimpse of picture-perfect sunrise against the backdrop of huge mountains, lush greenery, and glistening waters. The t', 'Devkund Waterfall is located in Bhira Patnus and since it went viral on social media, it has become extremely crowded and dangerous place. Several lives have been lost while amateurs try to visit this place on their own. It is the confluence of three wate', 5, 't031ld9d3k1fep6p5fjwyj4admb7_DevkundWaterfall_Banner.jpg', 'travel'),
(8, 'admin', 'Torna', 'The Torna fort or the Prachandagad, situated in the southwest of the Pune district of the western part of the Maharashtra state, is a the major tourist attraction of Maharashtra tourism. The village base of Velhe is situated 50 km. from the city of Pune. This was the first fort to be captured by the Shivaji Maharaj in the year 1643, when he was just 16 years old and this formed the nucleus of Maratha Empire. This fort is perched at a height of 1403 meters above the sea level. The name of the fort is derived from the words, Prachanda, which means huge and gad, which means fort in Marathi. This hill fort Torna is known as the highest fort perched on a hill top in the district of the Puna Satara Highway at Nasarapur. Traveller need to take the road Nasarapur to reach the Torna Fort. It takes about 2 hours to see the fort properly. Various places can be seen around the fort, such as Budhla Machi, Zunjar Machi, Kothi Darwaja, Kokan darwaja, Menghai Goddess temple, Bini Darwaja, Sadar, Toran', 'Torna Fort, also known as Prachandagad, is a large fort located in Pune district, in the Indian state of Maharashtra. It is historically significant because it was the first fort captured by Shivaji in 1646, at the age of 16. The hill has an elevation of ', 5, 'shutterstock_736678642-1280x720.jpg', 'travel'),
(9, 'admin', 'Messi', 'Messi said on Tuesday: “I am excited to begin a new chapter of my career at Paris Saint-Germain. Everything about the club matches my football ambitions. I know how talented the squad and the coaching staff are here.\r\n\r\n“I am determined to help build something special for the club and the fans, and I am looking forward to stepping out onto the pitch at the Parc des Princes.”\r\n\r\nNasser Al-Khelaifi, the club’s chairman and CEO, added: “I am delighted that Lionel Messi has chosen to join Paris Saint-Germain and we are proud to welcome him and his family to Paris.\r\n\r\n“He has made no secret of his desire to continue competing at the very highest level and winning trophies, and naturally our ambition as a club is to do the same. The addition of Leo to our world class squad continues a very strategic and successful transfer window for the club.\r\n\r\n“Led by our outstanding coach and his staff, I look forward to the team making history together for our fans all around the world.”\r\n\r\nThe Athletic', 'Lionel Messi has completed his free transfer to Paris Saint-Germain following the expiration of his contract at Barcelona. ... Messi said on Tuesday: “I am excited to begin a new chapter of my career at Paris Saint-Germain. Everything about the club mat', 5, 'transfers-messi.jpg', 'sports'),
(10, 'admin', 'Real Madrid are narrowing', 'Real Madrid has its sights trained on Kylian Mbappe and no one else. The club has remained shockingly quiet since the summer of 2019 when the club signed Eden Hazard.\r\n\r\nWhile their home ground is being completely overhauled and upgraded, the club has been playing it safe financially as they try to make a run at both Mbappe and Erling Haaland - the two most exciting young talents in European football.', 'Confirmed. Real Madrid have made a formal bid for €160m to sign Kylian Mbappé immediatly. NO green light from Paris Saint-Germain yet', 5, '46be0a92ed020ce93d7348837ced0871.jpg', 'sports'),
(11, 'admin', 'VALORANT’s Tower ', 'The VALORANT page on the Prime Gaming Loot website shows all of the in-game cosmetics that were previously made available, which include other gun buddies, sprays, and player cards. It also shows that more items are going to be made available in the next few months.\r\n\r\nTo claim the Tower of Power gun buddy from this page, click Claim Now and it will ask you to sign in to your Amazon Prime or Prime Gaming account. If this account isn’t already connected, it will open a window to Riot’s website and ask you to sign into your VALORANT account to connect the two. Once you’re signed in and connected, head back to the loot page and complete the confirmation. When you sign back into VALORANT, the Tower of Power gun buddy should be there for you to equip.', 'VALORANT players can use their Amazon Prime subscription to get their hands on the latest gun buddy from Riot, the Tower of Power.\r\nThe Tower of Power is the latest monthly VALORANT item available from the Prime Gaming Loot system, which rewards', 1, 'valorant-reyna.png', 'gaming'),
(12, 'admin', 'Katakirr', 'This chain has five outlets across the city, but the oldest one is at Karve Nagar near Cummins College. When you enter, you will notice a wide-bottomed pot with a fiery red curry simmering on a stove. This is their secret sauce, which makes their misal among the spiciest in the city. This curry, or sample as it is called, is poured over a plate of potato, farsan and sev, and garnished with onions. The result is so spicy it’s best to wash it down with buttermilk (taak). The standard 10-minute wait can go up to an hour on weekends, proof of just how good the misal here is.', 'The Ultimate Guide To Best Places To Find Cheap Drinks In Hyderabad\r\nThe Ultimate Guide To Best Chinese Restaurants In Hyderabad\r\nThe most basic way to describe misal would be to call it a blend of farsan, sev, poha, potato and onion served with ', 3, '5667583ae3a715c2a644a70ed2900456_1564377095.jpg', 'food'),
(13, 'vighnesh', 'IPL craze to breakout again', 'The second stage of IPL 2021, which is set to begin on September 19 in the UAE with a showpiece fixture between Mumbai Indians and Chennai Super Kings, is likely to host crowds.\r\n\r\nIf it does indeed go ahead, it will be the first time that crowds will be present at an IPL tournament since 2019. IPL 2020, won by Mumbai Indians and also hosted in the UAE, went ahead behind closed doors. The first half of IPL 2021 was also conducted behind closed doors but was soon postponed due to the COVID-19 situation in India.', 'According to reports, the Emirates Cricket Board (ECB) are working with the Board of Cricket Control in India (BCCI) and the UAE government to host matches at 60% capacity. Gulf News reported that ECB secretary Mubashir Usmani is working at gaining consent ', 1, '917968-ipl.jpg', 'sports'),
(14, 'vighnesh', 'Panchgani', 'Located about 102 kilometers away from Pune, Panchgani boasts the picturesque hills and enchanting valleys wrapped in the lush green nature. It features several vantage points, teeming with evergreen panoramic vistas. Being one of the beautiful hill stations near pune, it offers excellent scope to witness the charm of the mountains and delve into the serene nature. The scenic view of the mountains during the rainy season is an unusual sight to catch. Upon reaching, do not leave the chance to indulge in paragliding and boating.', 'Panchgani is a hill station southeast of Mumbai in India’s Maharashtra state. It’s known for the Table Land, a huge volcanic plateau. Lookouts like Sydney Point and Parsi Point offer views of Dhom Dam lake and Kamalgad Fort, used as a prison by the British in the early 19th century.', 1, 'Panchghani_Hill.jpg', 'travel'),
(15, 'admin', 'Peace is power: pacifism in shonen', 'Perhaps the only shonen flagship which can be crowned in any way pacifist is Naruto. The episodes-spanning battles are all in place, but Naruto Uzumaki repeatedly talks his opponents down from their rage and let them glimpse their inner light. He works to defeat their shadow selves with the charisma and compassion he is beloved for, eventually doing the same for himself in what is his greatest achievement. Confronting one’s own demons, as we know, is far more difficult than helping others face theirs. Instead of declaring battle with the leader of his foes, the Akatsuki, he remains true to his path up until that point and talks with him. When the ego would yearn to be freed and lesser heroes would unleash their hidden wrath, Naruto chooses kindness.', 'The peaceful conclusion of the Naruto manga and anime go to show that there is hope for adventurous shonen stories, without the careless violence. Trigun mangaka Yasuhiro Nightow has explained in interviews how conflicted he felt about people a', 5, 'shippuden-naruto-sasuke.jpg', 'anime'),
(16, 'admin', 'Can Boruto surpass Naruto and Sasuke ?', 'Boruto as a shinobi has a strong bloodline and probably the strongest since the time of the Otsutsuki and his bloodline may give him abilities that would make him like one of them. His father is an Uzumaki famed for their chakra reserve and longevity and also is also the reincarnate of Asura Otsutsuki. His mother is a Hyuuga who are known for their chakra control, gentle fist taijutsu and their famed dojutsu, the byakugan. Compared to both his parents who were late bloomers, he is a genius in the shinobi arts like his master Sasuke. ', 'Boruto as a shinobi has a strong bloodline and probably the strongest since the time of the Otsutsuki and his bloodline may give him abilities that would make him like one of them. His father is an Uzumaki famed for their chakra reserve and longevity and ', 5, 'Boruto-Anime-and-Manga-Featured.jpg', 'anime'),
(17, 'admin', 'the future of Valorant Champions', 'Riot Games chose only a few select regions for the first Valorant Champions Tour. Considering the ever-growing popularity of Valorant, as well as Riot’s previous track record with League of Legends esports, it might not be premature to speculate that they’ll be adding more regions soon.\r\n\r\nWith the growth of Valorant esports communities in South Asia, especially in India, it makes sense to organize a full season with teams from Challengers qualifying for the Masters and Champions, through the Valorant Champions Tour 2022.', 'The thrilling final match between the top two teams was watched by over 50,000 people. Furthermore, Global Esports will be the first Indian team to compete in the Valorant Champions Tour, and could potentially qualify for the main Valorant Champions 2021.', 5, 'bf11e-16304086576200.jfif', 'gaming'),
(22, 'jaideep', 'Lonavla', 'Lonavala is a hill station surrounded by green valleys in western India near Mumbai. The Karla Caves and the Bhaja Caves are ancient Buddhist shrines carved out of the rock. They feature massive pillars and intricate relief sculptures. South of the Bhaja Caves sits the imposing Lohagad Fort, with its 4 gates. West of here is Bhushi Dam, where water overflows onto a set of steps during rainy season.', 'Lonavala is a hill station surrounded by green valleys in western India near Mumbai. The Karla Caves and the Bhaja Caves are ancient Buddhist shrines carved out of the rock. They feature massive pillars and intricate relief sculptures.', 0, 'Lonavalamh.jpg', 'travel');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `your` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `your`, `usertype`, `dob`) VALUES
(1, 'vighnesh', 's.vighneshofficial@gmail.com', 'b27cfbe8c1b9d6ee725acf20bf86e689', 'hi i am a student', 'user', '2000-04-18'),
(2, 'Karthik Sadagopal', 'karthik@gmail.com', '04206f8a576b1640330ca78cd7285328', 'Hi i am a food blooger', 'user', '2010-03-20'),
(3, 'Rajesh', 'rajesh@gmail.com', 'bf44e33d9745e04551770c7a5a6cdb3b', 'i am a teacher will be posting blogs over development and etiquettes', 'user', '2000-05-25'),
(4, 'Chaitrali Tawade', 'chaitralitawade@gmail.com', 'chaitrali123', 'i am an interior designer and will be posting some blogs over designing stuff', 'user', '2001-02-28'),
(5, 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '', 'admin', ''),
(6, 'vishal', 'vishal@gmail.com', '01e70ef35b60ca856a22d974811c9611', '', 'user', ''),
(7, 'ramesh', 'ramesh@gmail.com', 'ramesh123', '', 'user', ''),
(8, 'atul', 'atul@gmail.com', '8e82a1040429639446dabc3b54ec9a2d', '', 'user', ''),
(9, 'raj', 'raj@gmail.com', 'cac5ff630494aa784ce97b9fafac2500', '', 'user', ''),
(10, 'manoj', 'manoj@gmail.com', '977c0156d7403e2bebba75cdf5652678', '', '', ''),
(11, 'nikita', 'nikita@gmail.com', 'a500b93bd1d753f1155876ea03d3b6de', '', '', ''),
(12, 'vikkie', 'vighnesh.sadagopal@qed42.com', '647d703a8408227a69825c1a1f8aaa08', '', '', ''),
(13, 'hitesh', 'hitesh@gmail.com', '1d0f071b6e5428bb961b6714d117a056', '', '', ''),
(15, 'jaideep', 'jaideep@gmail.com', '832ecbc87a6a8a5c9c6b2ba5a7e200f3', '', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`po_id`),
  ADD KEY `foreign` (`id`);

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
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `po_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
