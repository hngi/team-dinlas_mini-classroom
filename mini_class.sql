-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 12:03 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(255) NOT NULL,
  `teacher_id` int(255) NOT NULL,
  `title` varchar(150) NOT NULL,
  `level` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed` int(5) NOT NULL DEFAULT '0',
  `class_thumbnail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `teacher_id`, `title`, `level`, `description`, `date_created`, `completed`, `class_thumbnail`) VALUES
(1, 1, 'Node JS The Complete Guide', 'beginner', 'Just a title', '2019-09-27 21:48:46', 0, ''),
(2, 1, 'ANother title of mine', 'expert', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt nam totam dignissimos quidem, doloribus dolorum repudiandae qui! Nesciunt quis autem harum repellat, voluptates consequuntur est odit dolore, nihil eligendi iste!', '2019-09-28 02:38:47', 0, 'files/1569634727_stubs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `class_items`
--

CREATE TABLE `class_items` (
  `item_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `youtube_link` varchar(200) NOT NULL,
  `pdf_file` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_items`
--

INSERT INTO `class_items` (`item_id`, `class_id`, `item_title`, `youtube_link`, `pdf_file`, `content`, `date_added`) VALUES
(4, 1, 'How to Beat Stage 4', 'https://www.youtube.com/watch?v=yj0GGoUl8RQ', '', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quaerat, neque vitae saepe dolores adipisci quibusdam illo fugiat exercitationem veniam numquam, at nisi nihil tenetur. Omnis dolorem doloribus deleniti officia iusto, vitae quod doloremque. Similique et, vel provident nam quas cum a, ad eos dolore error officia harum itaque ducimus nihil obcaecati laudantium quae rem qui pariatur ex tenetur molestias veritatis! Eos pariatur iste atque maxime officiis voluptatibus ducimus voluptas suscipit? Reprehenderit numquam officia eveniet, cupiditate ad ullam sapiente eius quod porro totam labore laudantium iure, illum deserunt quo? Velit beatae laborum id nulla inventore maiores distinctio at dolorem soluta harum delectus ipsum pariatur vero labore autem, perferendis unde provident hic!', '2019-09-27 22:23:28'),
(5, 1, 'A Full instance of lorem', 'https://www.youtube.com/watch?v=VTOppFV1LoQ', '', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quaerat nostrum sequi ut iste atque sapiente labore velit et officiis ipsa, perferendis quae ab minus! Aspernatur quas sequi blanditiis iusto vel suscipit perspiciatis eum consequatur ut delectus rerum atque, nostrum alias quasi maxime dolor et aperiam harum possimus natus exercitationem! Nesciunt sapiente at laboriosam necessitatibus blanditiis modi soluta. Dolores beatae numquam exercitationem sequi odio illo expedita natus quod amet nesciunt id blanditiis necessitatibus iure eveniet rem quo, doloribus in corporis culpa voluptate a dolor unde impedit repudiandae. At magnam consequuntur commodi!', '2019-09-27 22:24:05'),
(6, 2, 'Data Communications and Networking', 'https://www.youtube.com/watch?v=yj0GGoUl8RQ', 'files/1569634994_StartNg_Cert.pdf', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam placeat. Necessitatibus, aliquam? Dolore, iure excepturi doloremque quos maiores, delectus hic alias vitae nesciunt ullam suscipit at vel eum, velit provident est rerum iusto accusantium atque! Expedita pariatur necessitatibus vero sed obcaecati similique alias repellendus, ad animi debitis? Voluptatem vero in voluptatibus nisi expedita id ipsam quam, corporis nulla aut laborum mollitia minus culpa iure architecto, assumenda doloremque enim! Placeat dolorem adipisci quibusdam, voluptatum fugit molestiae, temporibus doloribus voluptates officiis praesentium, minus dolores qui assumenda cum ad atque sunt debitis?', '2019-09-28 02:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `class_rating`
--

CREATE TABLE `class_rating` (
  `rating_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `class_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(255) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `student_photo` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `fullname`, `email`, `student_photo`, `password`, `phone`, `active`, `date`, `bio`) VALUES
(1, 'yusuf muhammad', 'student@gmail.com', '', 'jaxman', '08099595959', 1, '2019-09-28 03:50:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE `student_class` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `date_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`id`, `student_id`, `class_id`, `date_joined`) VALUES
(1, 1, 1, '2019-09-28 03:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `bio` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `teacher_photo` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `email`, `fullname`, `bio`, `password`, `phone`, `teacher_photo`, `date`) VALUES
(1, 'jude@gmail.com', 'Jude Jonathan', 'hgcfghu uguygy', 'jaxman', '08099595959', 'assets/teacher_photos/1569636970_jude2.jpg', '2019-09-26 10:28:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_items`
--
ALTER TABLE `class_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `class_rating`
--
ALTER TABLE `class_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_items`
--
ALTER TABLE `class_items`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_rating`
--
ALTER TABLE `class_rating`
  MODIFY `rating_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_class`
--
ALTER TABLE `student_class`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
