-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 09:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(32, 'Health', 3),
(37, 'politics', 2),
(38, 'business', 2),
(40, 'fashion', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(63, 'How Eating Only in the Daytime Can Help People With Type 2 Diabetes', 'Restricting eating to a 10-hour window during the daytime could have beneficial health benefits for people with type 2 diabetes.\r\n\r\nThatâ€™s according to research published today that reports that a time-restricted eating (TRE) protocol can result in improvements to metabolic health in adults with type 2 diabetes, including a decrease in 24-hour glucose levels.\r\n\r\nâ€œA daytime 10-hour TRE regimen for three weeks decreases glucose levels and prolongs the time spent in the normal blood sugar range in adults with type 2 diabetes as compared with spreading daily food intake over at least 14 hours. These data highlight the potential benefit of TRE in type 2 diabetes,â€ the study authors wrote.\r\n\r\nPrevious research has indicated that time-restricted eating can have positive metabolic effects in people with obesity or who are overweight. Researchers said restricting eating to a window of fewer than 12 hours can decrease blood sugar levels, improve insulin sensitivity, and increase fat burning.\r\n\r\nThe authors of the new study note that in many Western countries, food is available 24 hours a day and a tendency to spread eating out over a long period of time can be problematic.\r\n\r\nâ€œIn Western society, most people tend to spread their daily food intake over a minimum of 14 hours likely resulting in the absence of a true, nocturnal fasted state. Restricting food intake to a predefined time window (typically less than 12 hours)â€¦ restores the cycle of daytime eating and prolonged fasting during the evening and night,â€ the study authors wrote', '32', '26 Jul,2022', 49, '1658809011_index.jpg'),
(64, '6 Simple Tips to Help You Keep Cool During a Heat Wave', 'Environmental factors such as weather and internal body heat resulting from metabolic processes both contribute to how the body is heated. When the body becomes hot, your body temperature can increase your heart rate and blood flow to the skin because blood vessels dilate to increase sweating.\r\n\r\nâ€œHeat mostly dehydrates you and warms up your core temperature. When you are outside in the heat, gradually over time, the body will lose moisture and warm up, which accelerates [the dehydration] process,â€ Dr. Jen Brull, family physician and board member of the American Academy of Family Physicians, told Healthline.\r\n\r\nWhen the body is unable to regulate its temperature due to extreme heat, this can cause illness, including heat cramps, heat exhaustion, heatstroke, and hyperthermia, states WHO.', '32', '26 Jul,2022', 49, '1658809308_index.jpg'),
(65, 'How a Diet High in Carotenoids Can Help Women Live Longer, Better', 'Women tend to live longer than men but, paradoxically, tend to have more health issues as they age.\r\n\r\nScientists have speculated that it might be due to various factors, including hormonal and genetic differences between women and men.\r\n\r\nHowever, new research from the University of Georgia suggests that it may be related to dietary factors.\r\n\r\nMany of the conditions that affect women as they get older, like osteoporosis, dementia, cataracts, and macular degeneration, have been linked to a dietary shortfall of a type of phytonutrient called carotenoids.\r\n\r\nCarotenoids are the pigments that give foods like sweet potatoes, bell peppers, and tomatoes their bright colors.\r\n\r\nPreventing these diseases could be a matter of awareness and making different food choices, according to the studyâ€™s authors.', '32', '26 Jul,2022', 49, '1658809556_index.jpg'),
(66, 'AAP Accuses L-G Admin of Allowing BJP Leaders to Retain Govt Accommodation in Jammu & Kashmir', 'Senior AAP leader and former minister Harsh Dev Singh Monday accused the Jammu and Kashmir administration of allowing some BJP leaders to retain government bungalows despite the dissolution of assembly in 2018.\r\n\r\nHe alleged not only were these leaders allowed to retain the estates department bungalows but several of them had been permitted to stay without any rent.\r\n\r\nâ€œDespite the assembly having been dissolved in 2018, the bureaucrats had allowed the BJP leaders to retain the government mansions including ministerial bungalows in defiance of the SOPs and in blatant circumvention of the orders of the High Court,\" Singh said.\r\n\r\nReferring to a reply obtained by him recently in response to an RTI application, Singh said the rent outstanding against individual leaders ran into lakhs with the estates department authorities failing to act. Likewise, the power tariff ran into several lakhs against several such MLAs in respect of the estates quarters illegally retained by them, he alleged.', '37', '26 Jul,2022', 47, '1658810037_images.jpg'),
(67, 'Ambani vs Adani: 5G is about to become a battlefield for two of Indiaâ€™s richest people', 'The airwaves sale could raise as much as 1.1 trillion rupees ($14 billion), according to a June estimate by local rating company ICRA Ltd\r\nNSE -0.85 %. The empire of Adani, who overtook Ambani as Asiaâ€™s richest man earlier this year, is downplaying its foray into a new playing field for the group. It said its interest in 5G waves is about â€œprivate network solutionsâ€ and enhancing cybersecurity at the firmâ€™s airports and ports, with no intention of entering the consumer mobile space currently dominated by Ambani.\r\n\r\nET PRIME - POPULAR INDUSTRY STORIES', '38', '26 Jul,2022', 47, '1658810165_index.jpg'),
(68, 'Rupa & Co scions take over Cloudtailâ€™s home, kitchen and sports business', 'Kolkata-based garment maker Rupa and Companyâ€™s third-generation promoters - Siddhant Agarwal and Aparesh Agarwal - have started a new seller business called RetailEZ on Amazon India, according to multiple sources aware of the matter.\r\n\r\nThe new entity is taking over Cloudtail\'s home and kitchen business from sellers and suppliers, the sources said.\r\n\r\nRetailEZ is among many new sellers that are taking over Cloudtailâ€™s business following Amazonâ€™s acquisition of the latterâ€™s parent company Prione.', '38', '26 Jul,2022', 46, '1658810399_index.jpg'),
(69, 'Parliament Monsoon Session Updates: On Day 7 of Proceedings, AAP Gives Notice on Price Rise & GST', 'Parliament Monsoon Session Updates, July 26, 2022: AAP lawmaker Sanjay Singh on Tuesday a notice on inflation and GST in the Upper House under Rajya Sabha\'s rule 267.', '37', '26 Jul,2022', 46, '1658810560_index.jpg'),
(70, 'At Manilaâ€™s Rainbow Ball, Voguing Holds a Special Meaning', 'in its second year running, the Pride Month event brought local and international ballroom performers alike to the Ayala Malls Circuit on June 11. Hosted by House of Mizrahi, a well-known voguing house in the Philippines, the ball encouraged the crowd to put forward their best dance moves and to celebrate inclusivity. â€œWe were not really expecting too much, we thought it would be just a small crowd,â€ says Mother Xyza, the houseâ€™s founder and main organizer, of the event. â€œBut it was amazing to see lots of people appreciating and getting to know more about the community and the culture.â€', '40', '26 Jul,2022', 48, '1658811115_index.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `website_name` varchar(60) NOT NULL,
  `footer_desc` varchar(255) NOT NULL,
  `website_logo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`website_name`, `footer_desc`, `website_logo`) VALUES
('News website', '                                                                                                                                                                 <a href=\"\"> patelac2807@gmail.com/2022  </a>                                                  ', 'Ambika-logos(1).png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(46, 'jay', 'patel', 'jay11', '5db450959bc7f779a3ffbb885bcf3ddb', 0),
(47, 'chi', 'patel', 'chi11', 'eeb891203092955a706fa2011832d8e3', 0),
(48, 'narmada', 'patel', 'narmada11', '9c1ad00a16a7c67e2727b471ac969e96', 1),
(49, 'archana', 'patel', 'archana11', '91183e1cb4e46961f86a2ef6287927ad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
