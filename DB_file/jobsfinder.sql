-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 05:35 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_applying_job`
--

CREATE TABLE `candidate_applying_job` (
  `id` int(254) NOT NULL,
  `jobseekeremail` varchar(254) NOT NULL,
  `job_id` int(254) NOT NULL,
  `apply_date` varchar(25) NOT NULL,
  `apply_time` varchar(20) NOT NULL,
  `jobholder_see_or_not` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_applying_job`
--

INSERT INTO `candidate_applying_job` (`id`, `jobseekeremail`, `job_id`, `apply_date`, `apply_time`, `jobholder_see_or_not`) VALUES
(3, 'mokbul@gmail.com', 32, '2018-09-23 ', '16:12:23 pm', 0),
(9, 'mokbul@gmail.com', 31, '2018-09-25', '16:12:23 pm', 1),
(10, 'mokbul@gmail.com', 25, '2018-09-24 ', '17:12:23 pm', 1),
(18, 'mokbul15-469@diu.edu.bd', 31, '2018-09-24', '18:12:23 pm', 0),
(24, 'mokbul@gmail.com', 24, '2018-09-25', '17:16:48 pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complete_contest`
--

CREATE TABLE `complete_contest` (
  `subject_id` int(254) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `end_time` varchar(20) NOT NULL,
  `exam_take` int(254) NOT NULL,
  `year` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complete_contest`
--

INSERT INTO `complete_contest` (`subject_id`, `subject_name`, `end_date`, `end_time`, `exam_take`, `year`) VALUES
(1, 'math', '2018-03-28', '05:20:00 pm', 10, '2018'),
(2, 'Civil', '2018-03-31', '05:00:00 pm', 0, '2018'),
(5, 'CSE', '2018-03-23', '05:20:00 pm', 100, '2018'),
(19, 'Taxtile', '2017-03-26', '10:00:00 am', 4, '2017');

-- --------------------------------------------------------

--
-- Table structure for table `educational_requirments`
--

CREATE TABLE `educational_requirments` (
  `id` int(254) NOT NULL,
  `job_id` int(254) NOT NULL,
  `education_requirment_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `educational_requirments`
--

INSERT INTO `educational_requirments` (`id`, `job_id`, `education_requirment_name`) VALUES
(21, 22, '3'),
(22, 22, '5000'),
(36, 23, 'We do not care about your academic records, GPA or anything.'),
(37, 23, 'We just need your Programming Skill.'),
(38, 24, '33333333'),
(39, 25, '444444444'),
(40, 26, '5555555'),
(41, 27, '22222'),
(42, 28, '777777777'),
(52, 31, 'eeeeeeeeee'),
(53, 31, 'eeee');

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

CREATE TABLE `education_info` (
  `id` int(254) NOT NULL,
  `jobseeker_id` int(254) NOT NULL,
  `education_title` varchar(254) NOT NULL,
  `education_major` varchar(254) NOT NULL,
  `education_institute_name` varchar(254) NOT NULL,
  `education_result` varchar(10) DEFAULT NULL,
  `passing_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education_info`
--

INSERT INTO `education_info` (`id`, `jobseeker_id`, `education_title`, `education_major`, `education_institute_name`, `education_result`, `passing_year`) VALUES
(3, 2, 'gdf', 'dffgd', 'gdfg', '20', '2018'),
(4, 2, 'dsdf', 'sfds', 'sfsdf', '33', '222');

-- --------------------------------------------------------

--
-- Table structure for table `jobholder_industry_type`
--

CREATE TABLE `jobholder_industry_type` (
  `id` int(254) NOT NULL,
  `industry_type` varchar(200) NOT NULL,
  `jobholder_username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobholder_industry_type`
--

INSERT INTO `jobholder_industry_type` (`id`, `industry_type`, `jobholder_username`) VALUES
(1, 'Conglomerates', 'company_email'),
(2, 'Oil & gas', 'hhhhh'),
(3, 'ICT', 'hhhhh'),
(4, 'Others', 'ccc'),
(5, 'Advertising Agencey', 'mmm'),
(6, 'ICT', 'mmm'),
(7, 'Utilities', 'mmm'),
(8, 'Others', 'hjgjgh'),
(9, 'Telecommunications', 'jobholder@gmail.com'),
(10, 'ICT', 'jobholder@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobholder_info`
--

CREATE TABLE `jobholder_info` (
  `username` varchar(30) NOT NULL,
  `password` varchar(254) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `alternative_company_name` varchar(200) DEFAULT NULL,
  `contact_person_designation` varchar(50) NOT NULL,
  `contact_person_phone` varchar(20) NOT NULL,
  `contact_person_email` varchar(100) NOT NULL,
  `business_description` varchar(254) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_country` varchar(100) NOT NULL,
  `company_city` varchar(100) NOT NULL,
  `company_area` varchar(100) NOT NULL,
  `billing_address` varchar(100) DEFAULT NULL,
  `website_address` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jobholder_info`
--

INSERT INTO `jobholder_info` (`username`, `password`, `company_name`, `alternative_company_name`, `contact_person_designation`, `contact_person_phone`, `contact_person_email`, `business_description`, `company_address`, `company_country`, `company_city`, `company_area`, `billing_address`, `website_address`) VALUES
('company_email', '$2y$10$vuDuuANMy.rKZJ/lol4fwelcS5RvHKk1lo89Xt7W5MqZIgDsN/MAy', 'THESOFTKING.COM', 'ccc', 'ccc', '555', 'anik@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'ccc', 'bangladesh', 'dhaka', 'arambag', NULL, 'www.google.com'),
('hhhhh', '$2y$10$avfZERkqf2BMNB8BimdYveicQR2qwb5kumwvnmT4ztu.xFIQcnDpC', 'hhhh', NULL, 'hhh', '888', 'mokbul@gmail.com', 'hhhhh', 'hhhh', 'bangladesh', 'dhaka', 'Agargaon', NULL, NULL),
('hjgjgh', '$2y$10$np6HMIlfkairXp7.BZORkuKEI0WGt3/EVSOBiAHpfJJ5RO4HwKrv.', 'fffffffffff', 'ffffffffffff', 'ffffffff', '4444444', 'mokbul@gmail.com', 'gggggggggg', 'ggggggg', 'pakistan', 'comilla', 'ashulia', NULL, NULL),
('jobholder@gmail.com', '$2y$10$vl8s/g1perTfM2soifwmmeh5ce.HqX4op39nwX6HkgU/8zQtSlyqS', 'FS IT', NULL, 'Admin', '1778207719', 'mokbul@gmail.com', 'IT Base ...', 'Dhaka', 'bangladesh', 'dhaka', 'arambag', NULL, NULL),
('mmm', '$2y$10$EE9Llt1.fDfhv8/zsWbQUeoVsJlCnrczoveze4osJunkl0ieprSR6', 'mmm', 'mmm', 'mm', '66', 'mokbul@gmail.com', 'mmm', 'mmm', 'bangladesh', 'dhaka', 'arambag', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_education_skill_language_ref_info`
--

CREATE TABLE `jobseeker_education_skill_language_ref_info` (
  `id` int(254) NOT NULL,
  `jobseekeremail` varchar(100) NOT NULL,
  `education_title` varchar(100) DEFAULT NULL,
  `education_major` varchar(200) DEFAULT NULL,
  `education_institute_name` varchar(254) DEFAULT NULL,
  `education_result` varchar(10) DEFAULT NULL,
  `passing_year` varchar(10) DEFAULT NULL,
  `skill` varchar(100) DEFAULT NULL,
  `skill_experiance` varchar(50) DEFAULT NULL,
  `skill_proficency` varchar(100) DEFAULT NULL,
  `language` varchar(20) DEFAULT NULL,
  `language_spoken_type` varchar(10) DEFAULT NULL,
  `language_writting_type` varchar(10) DEFAULT NULL,
  `language_reading_type` varchar(10) DEFAULT NULL,
  `ref_name` varchar(100) DEFAULT NULL,
  `ref_designation` varchar(50) DEFAULT NULL,
  `ref_relationship` varchar(50) DEFAULT NULL,
  `ref_phone` varchar(20) DEFAULT NULL,
  `ref_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker_education_skill_language_ref_info`
--

INSERT INTO `jobseeker_education_skill_language_ref_info` (`id`, `jobseekeremail`, `education_title`, `education_major`, `education_institute_name`, `education_result`, `passing_year`, `skill`, `skill_experiance`, `skill_proficency`, `language`, `language_spoken_type`, `language_writting_type`, `language_reading_type`, `ref_name`, `ref_designation`, `ref_relationship`, `ref_phone`, `ref_email`) VALUES
(60, 'mokbul15-469@diu.edu.bd', 'ff', NULL, NULL, NULL, NULL, NULL, 'llll', NULL, NULL, NULL, NULL, '5555555555', NULL, NULL, NULL, NULL, NULL),
(76, 'mokbul15-469@diu.edu.bd', NULL, NULL, NULL, NULL, NULL, 'asaS', '66', 'DDDFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'mokbul15-469@diu.edu.bd', 'ggg', 'ggg', 'gg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_info`
--

CREATE TABLE `jobseeker_info` (
  `id` int(254) NOT NULL,
  `jobseekeremail` varchar(254) NOT NULL,
  `firstname` varchar(254) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `jobseekerpassword` varchar(254) DEFAULT NULL,
  `fathername` varchar(50) DEFAULT NULL,
  `mothername` varchar(50) DEFAULT NULL,
  `DOB` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  `marital_status` varchar(15) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `present_address` varchar(254) DEFAULT NULL,
  `permanent_address` varchar(254) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `optional_email` varchar(254) DEFAULT NULL,
  `candidate_image` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jobseeker_info`
--

INSERT INTO `jobseeker_info` (`id`, `jobseekeremail`, `firstname`, `lastname`, `jobseekerpassword`, `fathername`, `mothername`, `DOB`, `gender`, `religion`, `marital_status`, `nationality`, `present_address`, `permanent_address`, `mobile`, `optional_email`, `candidate_image`) VALUES
(1, 'mokbul15-469@diu.edu.bd', 'Anik', 'Ahmed', '$2y$10$lus3T251Vap9yBjRAUkpwOdXhNdoX1khN19x9zJ.GorpIvIr5Seiy', 'Abdul Awal Patwary', 'Shajeda Akhter', '2018-05-01', 'Male', 'Islam', 'Single', 'Bangladeshi', 'Savar,Ashulia', 'Monohorgong,Comilla', '179622672', 'radwancse503@gmail.com', 'public/uploaded_candidate_image/mokbul15-469@diu.edu.bd.jpg'),
(2, 'mokbul@gmail.com', 'Md Mokbul', 'hossain', '$2y$10$odg1u.BPOBT4aynhsDb5AudlSdfRiwmARqHsATJWmezrKbR6SgzAC', 'md abul hossain', 'Golapi begum', '1995-03-22', 'Male', 'Islam', 'Single', 'Bangladehi', 'Saver,Ashulia,dhaka', 'Fulshore,Natore,Rajshahi,Bangladesh', '0001778207719', 'mokbul15-469@gmail.com', 'public/uploaded_candidate_image/mokbul@gmail.com.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_description`
--

CREATE TABLE `job_description` (
  `id` int(254) NOT NULL,
  `job_id` int(254) NOT NULL,
  `job_description_details` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_description`
--

INSERT INTO `job_description` (`id`, `job_id`, `job_description_details`) VALUES
(20, 22, '3'),
(36, 23, 'Age At least 18 year(s)'),
(37, 23, 'Fresher with Skill can Apply'),
(38, 23, 'Good communication skills and excellent problem solving skills.'),
(39, 23, 'Have a good understanding of software development methodologies.'),
(40, 23, 'Ability to meet deadlines and achieve specified results.'),
(41, 24, '333333333'),
(42, 25, '4444444'),
(43, 26, '5555555'),
(44, 27, '2222'),
(45, 28, '66666666'),
(56, 31, 'dddddddd'),
(57, 31, 'ddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `job_designation`
--

CREATE TABLE `job_designation` (
  `id` int(254) NOT NULL,
  `designation_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_designation`
--

INSERT INTO `job_designation` (`id`, `designation_name`) VALUES
(1, 'Accountancy and financialmanagement'),
(11, 'Back-End Developer'),
(13, 'clenner'),
(10, 'Front End Developer'),
(12, 'IT & Telecommunication'),
(5, 'Laravel Developer'),
(9, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `job_info`
--

CREATE TABLE `job_info` (
  `id` int(254) NOT NULL,
  `client_user_name` varchar(200) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `job_designation_id` varchar(200) NOT NULL,
  `number_of_vacancies` int(200) NOT NULL,
  `avilability_day` int(254) NOT NULL,
  `candidate_min_age` int(254) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `salary_range` varchar(254) DEFAULT NULL,
  `experience_of_years` int(254) NOT NULL,
  `published_on` varchar(50) NOT NULL,
  `deadline` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_info`
--

INSERT INTO `job_info` (`id`, `client_user_name`, `company_email`, `job_designation_id`, `number_of_vacancies`, `avilability_day`, `candidate_min_age`, `job_type`, `salary_range`, `experience_of_years`, `published_on`, `deadline`) VALUES
(23, 'company_email', 'mizan@gmail.com', '1', 22, 22, 22, 'Parmanent', '88 to 100', 2, '2018-08-10', '2018-09-19'),
(24, 'company_email', 'gggggggg@gmail.com', '9', 11, 22, 33, 'Contract', '333', 3, '2018-06-24', '2018-07-19'),
(25, 'company_email', 'aaa@gmail.com', '13', 44, 4, 4, 'Freelance', '444', 4, '2018-06-08', '2018-06-19'),
(26, 'company_email', 'mokbul@gmail.com', '13', 22, 6, 55, 'Internship', '555', 5, '2018-06-08', '2018-06-14'),
(27, 'company_email', 'mokbul@gmail.com', '10', 22, 10, 22, 'Freelance', '2222', 2, '2018-06-08', '2018-06-18'),
(28, 'company_email', 'mokbulhossain098@gmail.com', '12', 10, 10, 44, 'Freelance', '7777', 7, '2018-06-09', '2018-06-19'),
(30, 'company_email', 'mokbul@gmail.com', '5', 5, 5, 22, 'Full Time', '5000 to 50000', 4, '2018-06-28', '2018-07-03'),
(31, 'jobholder@gmail.com', 'wwwww@gmail.com', '11', 9, 10, 55, 'Full Time', '22  to 22222', 0, '2018-06-28', '2018-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `job_requirments`
--

CREATE TABLE `job_requirments` (
  `id` int(254) NOT NULL,
  `job_id` varchar(254) NOT NULL,
  `job_requirment_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_requirments`
--

INSERT INTO `job_requirments` (`id`, `job_id`, `job_requirment_name`) VALUES
(22, '22', '1000'),
(23, '22', '200'),
(45, '23', 'Solve Problems with codes.'),
(46, '23', 'Knowledge of Core PHP and Laravel Framework.'),
(47, '23', 'Must have good expertise on MVC architecture.'),
(48, '23', 'Strong Knowledge about MySQL.'),
(49, '23', 'Must have experience in HTML5, CSS3, Bootstrap, JavaScript, JQuery and AJAX'),
(50, '23', 'Must have Knowledge about cPanel/WHM'),
(51, '23', 'Experience with Angular is a PLUS'),
(52, '23', 'Experience with RESTFUL API is a PLUS'),
(53, '24', '3333333333'),
(54, '25', '4444444'),
(55, '26', '5555555'),
(56, '27', '2222'),
(57, '28', '55555555'),
(75, '31', 'rrrrr'),
(76, '31', 'rrrrrrrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `job_sources`
--

CREATE TABLE `job_sources` (
  `id` int(254) NOT NULL,
  `job_id` int(254) NOT NULL,
  `job_source_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_sources`
--

INSERT INTO `job_sources` (`id`, `job_id`, `job_source_name`) VALUES
(20, 22, '33'),
(31, 23, 'Jobs Finder.Com'),
(32, 23, 'www.google.com'),
(33, 24, '3333333'),
(34, 25, '444444444'),
(35, 26, '55555555'),
(36, 27, '222222'),
(37, 28, '777777'),
(44, 31, 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(254) NOT NULL,
  `job_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `job_name`) VALUES
(1, 'Full Time'),
(2, 'Contract'),
(3, 'Internship'),
(4, 'Freelance'),
(5, 'Parmanent'),
(6, 'Half Time');

-- --------------------------------------------------------

--
-- Table structure for table `language_info`
--

CREATE TABLE `language_info` (
  `id` int(254) NOT NULL,
  `jobseeker_id` int(254) NOT NULL,
  `language` varchar(254) NOT NULL,
  `language_spoken_type` varchar(50) DEFAULT NULL,
  `language_writting_type` varchar(50) DEFAULT NULL,
  `language_reading_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_info`
--

INSERT INTO `language_info` (`id`, `jobseeker_id`, `language`, `language_spoken_type`, `language_writting_type`, `language_reading_type`) VALUES
(3, 1, 'ssd', 'sdsd', 'sds', NULL),
(5, 2, 'dfd', 'dfd', 'fdsf', 'dfdfiui');

-- --------------------------------------------------------

--
-- Table structure for table `live_contest_result`
--

CREATE TABLE `live_contest_result` (
  `id` int(254) NOT NULL,
  `jobseekeremail` varchar(254) NOT NULL,
  `subject_id` int(254) NOT NULL,
  `subject_name` varchar(254) NOT NULL,
  `result` int(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_contest_result`
--

INSERT INTO `live_contest_result` (`id`, `jobseekeremail`, `subject_id`, `subject_name`, `result`) VALUES
(1, 'mokbul@gmail.com', 1, 'MATH', 60),
(2, 'mokbul15-469@diu.edu.bd', 2, 'MATH', 80);

-- --------------------------------------------------------

--
-- Table structure for table `make_question`
--

CREATE TABLE `make_question` (
  `question_id` int(254) NOT NULL,
  `subject_name` varchar(254) NOT NULL,
  `question_1_title` varchar(254) NOT NULL,
  `question_1_correct_answer` varchar(254) NOT NULL,
  `question_1_prob_1` varchar(254) NOT NULL,
  `question_1_prob_2` varchar(254) NOT NULL,
  `question_1_prob_3` varchar(254) NOT NULL,
  `question_1_prob_4` varchar(254) NOT NULL,
  `question_2_title` varchar(254) NOT NULL,
  `question_2_correct_answer` varchar(254) NOT NULL,
  `question_2_prob_1` varchar(254) NOT NULL,
  `question_2_prob_2` varchar(254) NOT NULL,
  `question_2_prob_3` varchar(254) NOT NULL,
  `question_2_prob_4` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make_question`
--

INSERT INTO `make_question` (`question_id`, `subject_name`, `question_1_title`, `question_1_correct_answer`, `question_1_prob_1`, `question_1_prob_2`, `question_1_prob_3`, `question_1_prob_4`, `question_2_title`, `question_2_correct_answer`, `question_2_prob_1`, `question_2_prob_2`, `question_2_prob_3`, `question_2_prob_4`) VALUES
(1, 'math', 'Where is the capital of Bangladesh', 'Dhaka', 'natore', 'Comilla', 'Pabna', '', 'Which department student are huge in DIU', 'CSE', 'EEE', 'Cvil', 'Textile', 'BBA'),
(2, 'CSE', 'CSE question 1', 'Correct Answer 1', 'prob answer 1', 'prob answer 2', 'prob answer 3', '', 'CSE question 2', 'Correct Answer 2', 'prob answer 1', 'prob answer 2', 'prob answer 3', 'prob answer 4'),
(3, 'Taxtile', 'Taxtile question 1', 'Correct answer 1', 'prob answer 1', 'prob answer 2', 'prob answer 3', 'prob answer 4', 'Taxtile question 2', 'Correct answer 2', 'prob answer 1', 'prob answer 2', 'prob answer 3', ''),
(4, 'EEE', 'EEE question 1', 'Correct answer 1', 'Prob answer 1', 'Prob answer 2', 'Prob answer 3', '', 'EEE question 2', 'Correct answer 2', 'Prob answer 1', 'Prob answer 2', 'Prob answer 3', ''),
(5, 'Civil', 'Civil question 1', 'Correct answer 1', 'prob answer 1', 'prob answer 2', 'prob answer 3', 'prob answer 4', 'Civil question 2', 'Correct answer 2', 'prob answer 1', 'prob answer 2', 'prob answer 3', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_benifits`
--

CREATE TABLE `other_benifits` (
  `id` int(254) NOT NULL,
  `job_id` int(254) NOT NULL,
  `other_benifit_name` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_benifits`
--

INSERT INTO `other_benifits` (`id`, `job_id`, `other_benifit_name`) VALUES
(20, 22, '3'),
(31, 23, 'Festival Bonus.'),
(32, 23, 'Snacks & Coffiee.'),
(33, 24, '333333333'),
(34, 25, '4444444'),
(35, 26, '5555555'),
(36, 27, '22222222'),
(37, 28, '7777777777'),
(44, 31, 'ooooo');

-- --------------------------------------------------------

--
-- Table structure for table `project_info`
--

CREATE TABLE `project_info` (
  `id` int(254) NOT NULL,
  `jobseeker_id` int(254) NOT NULL,
  `project_name` varchar(254) NOT NULL,
  `project_discription` varchar(254) NOT NULL,
  `project_link` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_contest`
--

CREATE TABLE `question_contest` (
  `subject_id` int(254) NOT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` varchar(15) DEFAULT NULL,
  `exam_take` int(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recomonded_designation`
--

CREATE TABLE `recomonded_designation` (
  `id` int(254) NOT NULL,
  `jobseekeremail` varchar(254) NOT NULL,
  `designation_id` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recomonded_designation`
--

INSERT INTO `recomonded_designation` (`id`, `jobseekeremail`, `designation_id`) VALUES
(42, 'mokbul15-469@diu.edu.bd', '1'),
(43, 'mokbul15-469@diu.edu.bd', '11'),
(44, 'mokbul15-469@diu.edu.bd', '12'),
(50, 'mokbul@gmail.com', '11');

-- --------------------------------------------------------

--
-- Table structure for table `ref_info`
--

CREATE TABLE `ref_info` (
  `id` int(254) NOT NULL,
  `jobseeker_id` int(254) NOT NULL,
  `ref_name` varchar(254) NOT NULL,
  `ref_designation` varchar(254) NOT NULL,
  `ref_relationship` varchar(254) DEFAULT NULL,
  `ref_phone` varchar(20) DEFAULT NULL,
  `ref_email` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_info`
--

INSERT INTO `ref_info` (`id`, `jobseeker_id`, `ref_name`, `ref_designation`, `ref_relationship`, `ref_phone`, `ref_email`) VALUES
(3, 1, 'ttt', 'ttt', 'kkk', 'ttt', 'wwww'),
(5, 1, 'hhhh', 'hhhhh', NULL, NULL, NULL),
(6, 2, 'rrr', 'sds', 'sds', 'sdfs', 'rrrr555oo99gtdf');

-- --------------------------------------------------------

--
-- Table structure for table `skill_info`
--

CREATE TABLE `skill_info` (
  `id` int(254) NOT NULL,
  `jobseeker_id` int(254) NOT NULL,
  `skill` varchar(254) NOT NULL,
  `skill_experiance` varchar(254) NOT NULL,
  `skill_proficency` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_info`
--

INSERT INTO `skill_info` (`id`, `jobseeker_id`, `skill`, `skill_experiance`, `skill_proficency`) VALUES
(6, 1, 'dd', 'dd', 'dd'),
(7, 1, 'gg', 'ggg', 'gg'),
(8, 1, 'iii', 'iii', NULL),
(9, 1, 'tt', 'ttt', NULL),
(10, 1, 'ggg', 'ggg', 'ggg'),
(11, 2, 'html', 'good', 'bad'),
(12, 2, 'fghf', 'fhfgh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill_test`
--

CREATE TABLE `skill_test` (
  `id` int(254) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subject_name` varchar(254) NOT NULL,
  `question1` varchar(254) NOT NULL,
  `question1_correct_answer` varchar(254) NOT NULL,
  `question1_prob1` varchar(254) NOT NULL,
  `question1_prob2` varchar(254) NOT NULL,
  `question1_prob3` varchar(254) NOT NULL,
  `question2` varchar(254) NOT NULL,
  `question2_correct_answer` varchar(254) NOT NULL,
  `question2_prob1` varchar(254) NOT NULL,
  `question2_prob2` varchar(254) NOT NULL,
  `question2_prob3` varchar(254) NOT NULL,
  `question3` varchar(254) NOT NULL,
  `question3_correct_answer` varchar(254) NOT NULL,
  `question3_prob1` varchar(254) NOT NULL,
  `question3_prob2` varchar(254) NOT NULL,
  `question3_prob3` varchar(254) NOT NULL,
  `question4` varchar(254) NOT NULL,
  `question4_correct_answer` varchar(254) NOT NULL,
  `question4_prob1` varchar(254) NOT NULL,
  `question4_prob2` varchar(254) NOT NULL,
  `question4_prob3` varchar(254) NOT NULL,
  `question5` varchar(254) NOT NULL,
  `question5_correct_answer` varchar(254) NOT NULL,
  `question5_prob1` varchar(254) NOT NULL,
  `question5_prob2` varchar(254) NOT NULL,
  `question5_prob3` varchar(254) NOT NULL,
  `question6` varchar(254) NOT NULL,
  `question6_correct_answer` varchar(254) NOT NULL,
  `question6_prob1` varchar(254) NOT NULL,
  `question6_prob2` varchar(254) NOT NULL,
  `question6_prob3` varchar(254) NOT NULL,
  `question7` varchar(254) NOT NULL,
  `question7_correct_answer` varchar(254) NOT NULL,
  `question7_prob1` varchar(254) NOT NULL,
  `question7_prob2` varchar(254) NOT NULL,
  `question7_prob3` varchar(254) NOT NULL,
  `question8` varchar(254) NOT NULL,
  `question8_correct_answer` varchar(254) NOT NULL,
  `question8_prob1` varchar(254) NOT NULL,
  `question8_prob2` varchar(254) NOT NULL,
  `question8_prob3` varchar(254) NOT NULL,
  `question9` varchar(254) NOT NULL,
  `question9_correct_answer` varchar(254) NOT NULL,
  `question9_prob1` varchar(254) NOT NULL,
  `question9_prob2` varchar(254) NOT NULL,
  `question9_prob3` varchar(254) NOT NULL,
  `question10` varchar(254) NOT NULL,
  `question10_correct_answer` varchar(254) NOT NULL,
  `question10_prob1` varchar(254) NOT NULL,
  `question10_prob2` varchar(254) NOT NULL,
  `question10_prob3` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_test`
--

INSERT INTO `skill_test` (`id`, `category`, `subject_name`, `question1`, `question1_correct_answer`, `question1_prob1`, `question1_prob2`, `question1_prob3`, `question2`, `question2_correct_answer`, `question2_prob1`, `question2_prob2`, `question2_prob3`, `question3`, `question3_correct_answer`, `question3_prob1`, `question3_prob2`, `question3_prob3`, `question4`, `question4_correct_answer`, `question4_prob1`, `question4_prob2`, `question4_prob3`, `question5`, `question5_correct_answer`, `question5_prob1`, `question5_prob2`, `question5_prob3`, `question6`, `question6_correct_answer`, `question6_prob1`, `question6_prob2`, `question6_prob3`, `question7`, `question7_correct_answer`, `question7_prob1`, `question7_prob2`, `question7_prob3`, `question8`, `question8_correct_answer`, `question8_prob1`, `question8_prob2`, `question8_prob3`, `question9`, `question9_correct_answer`, `question9_prob1`, `question9_prob2`, `question9_prob3`, `question10`, `question10_correct_answer`, `question10_prob1`, `question10_prob2`, `question10_prob3`) VALUES
(1, 'web', 'HTML5', 'Which of the following video file formats are currently supported by the <video> element of HTML 5.0?', 'Ogg', 'CCTVs', 'MPEG 4 ', '3GPP', 'Which of the following are valid values for the content editable attribute of the element in HTML 5.0?', 'true ', 'false ', '0', '1', 'Can a web page contain multiple <header> elements? What about <footer> elements?', 'yes', 'no', 'only header', 'none of the above', 'Which of the following tag represents an independent piece of content of a document in HTML5?', 'article', 'aside', 'section', 'header', 'Which of the following tag represents a piece of content that is only slightly related to the rest of the page in HTML5?', 'aside', 'section', 'article', 'header', 'Which of the following input control represents a date consisting of a year and a month encoded according to ISO 8601 in Web Form 2.0?', 'month', 'datetime', 'datetime-local', 'date', 'Which of the following is true about Cookies?', 'All of .', 'Cookies are included with every HTTP request, thereby slowing down your web application by transmitting the same data.', 'Cookies are included with every HTTP request, thereby sending data unencrypted over the internet.', 'Cookies are limited to about 4 KB of data . Not enough to store required data.', 'Which of the following method retrieves the current geographic location of the user?', 'geolocation.getCurrentPosition()', 'geolocation.watchPosition()', 'geolocation.clearPosition()', 'None of.', 'Which of the following attribute specifies a keyboard shortcut to access an element in HTML5?', 'accesskey', 'key', 'contextmenu', 'contextkey', 'Which of the following attribute triggers event after the document is printed?', 'onafterprint', 'offlineprint', 'onprint', 'onbeforeprint');

-- --------------------------------------------------------

--
-- Table structure for table `skill_test_result`
--

CREATE TABLE `skill_test_result` (
  `id` int(254) NOT NULL,
  `jobseekeremail` varchar(254) NOT NULL,
  `subject_id` int(254) NOT NULL,
  `subject_name` varchar(254) NOT NULL,
  `result` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_test_result`
--

INSERT INTO `skill_test_result` (`id`, `jobseekeremail`, `subject_id`, `subject_name`, `result`) VALUES
(4, 'mokbul@gmail.com', 1, 'HTML5', '50'),
(5, 'mokbul15-469@diu.edu.bd', 1, 'HTML5', '100'),
(6, 'mokbul15-469@diu.edu.bd', 2, 'MATH', '30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_applying_job`
--
ALTER TABLE `candidate_applying_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_contest`
--
ALTER TABLE `complete_contest`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `educational_requirments`
--
ALTER TABLE `educational_requirments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_info`
--
ALTER TABLE `education_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobholder_industry_type`
--
ALTER TABLE `jobholder_industry_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobholder_username` (`jobholder_username`);

--
-- Indexes for table `jobholder_info`
--
ALTER TABLE `jobholder_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `jobseeker_education_skill_language_ref_info`
--
ALTER TABLE `jobseeker_education_skill_language_ref_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_info`
--
ALTER TABLE `jobseeker_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobseekeremail` (`jobseekeremail`);

--
-- Indexes for table `job_description`
--
ALTER TABLE `job_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_designation`
--
ALTER TABLE `job_designation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation_name` (`designation_name`);

--
-- Indexes for table `job_info`
--
ALTER TABLE `job_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requirments`
--
ALTER TABLE `job_requirments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_sources`
--
ALTER TABLE `job_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_info`
--
ALTER TABLE `language_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_contest_result`
--
ALTER TABLE `live_contest_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make_question`
--
ALTER TABLE `make_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `other_benifits`
--
ALTER TABLE `other_benifits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_info`
--
ALTER TABLE `project_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_contest`
--
ALTER TABLE `question_contest`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `recomonded_designation`
--
ALTER TABLE `recomonded_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_info`
--
ALTER TABLE `ref_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_info`
--
ALTER TABLE `skill_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_test`
--
ALTER TABLE `skill_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_test_result`
--
ALTER TABLE `skill_test_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_applying_job`
--
ALTER TABLE `candidate_applying_job`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complete_contest`
--
ALTER TABLE `complete_contest`
  MODIFY `subject_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `educational_requirments`
--
ALTER TABLE `educational_requirments`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `education_info`
--
ALTER TABLE `education_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobholder_industry_type`
--
ALTER TABLE `jobholder_industry_type`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobseeker_education_skill_language_ref_info`
--
ALTER TABLE `jobseeker_education_skill_language_ref_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `jobseeker_info`
--
ALTER TABLE `jobseeker_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_description`
--
ALTER TABLE `job_description`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `job_designation`
--
ALTER TABLE `job_designation`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_info`
--
ALTER TABLE `job_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `job_requirments`
--
ALTER TABLE `job_requirments`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `job_sources`
--
ALTER TABLE `job_sources`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language_info`
--
ALTER TABLE `language_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `live_contest_result`
--
ALTER TABLE `live_contest_result`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `make_question`
--
ALTER TABLE `make_question`
  MODIFY `question_id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `other_benifits`
--
ALTER TABLE `other_benifits`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `project_info`
--
ALTER TABLE `project_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_contest`
--
ALTER TABLE `question_contest`
  MODIFY `subject_id` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recomonded_designation`
--
ALTER TABLE `recomonded_designation`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `ref_info`
--
ALTER TABLE `ref_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill_info`
--
ALTER TABLE `skill_info`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `skill_test`
--
ALTER TABLE `skill_test`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skill_test_result`
--
ALTER TABLE `skill_test_result`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
