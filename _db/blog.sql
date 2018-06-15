-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 03:47 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `report_counter` int(11) NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `content`, `report_counter`, `creation_date`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', 0, '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', 0, '2010-03-25 16:57:16'),
(3, 7, 'Alexandre', 'C\'est top !', 1, '2018-06-15 13:20:11'),
(4, 7, 'Pépito', 'Plop', 0, '2018-06-15 13:49:10'),
(5, 7, 'Nicolas', 'C\'est génial', 0, '2018-06-15 13:49:16'),
(6, 7, 'Pédro', 'C\'est super', 0, '2018-06-15 13:49:23'),
(7, 7, 'Nicolas', 'Youhou !!', 0, '2018-06-15 13:49:32'),
(8, 7, 'Pépito', 'C\'est génial', 0, '2018-06-15 13:49:45'),
(9, 7, 'Alexandre', 'C\'est super', 0, '2018-06-15 13:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Episode 1 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2010-03-25 16:28:41'),
(2, 'Episode 2 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2010-03-27 18:31:11'),
(3, 'Episode 3 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2018-06-15 12:17:18'),
(4, 'Episode 4 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2018-06-15 12:17:26'),
(5, 'Episode 5 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2018-06-15 12:17:33'),
(6, 'Episode 6 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2018-06-15 12:17:43'),
(7, 'Episode 7 du roman \"Billet simple pour l\'Alaska\"', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Ut pulvinar venenatis elit, vel ultrices nisi aliquet at. Nullam arcu felis, aliquam et dolor id, auctor accumsan magna. In lectus lectus, sollicitudin sit amet elit ac, accumsan aliquam dolor. Quisque ut sem sed est blandit scelerisque. Vivamus ac mauris tellus. Aenean faucibus orci sit amet dictum accumsan. Nam bibendum enim id tincidunt malesuada. Nunc eget tincidunt ex. Aliquam non mauris volutpat, hendrerit diam nec, convallis sapien. Sed non elementum nisi. Donec maximus eros sit amet sapien condimentum, et pharetra diam consequat. Integer eget consectetur nulla. Aenean eu sapien mollis, consectetur leo a, congue odio.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Pellentesque dictum nisl non erat vehicula congue. Donec a dui vitae justo dignissim rhoncus a vel ex. Ut eu sapien tempor, vulputate magna quis, rutrum massa. Maecenas quis ante dignissim, suscipit turpis quis, pharetra ante. Integer sagittis, metus vehicula elementum auctor, lorem est aliquet metus, sed sagittis ligula risus sit amet ex. Sed commodo congue condimentum. Mauris ligula est, porttitor ac est vitae, dignissim gravida nunc. In fermentum viverra ultricies. Nam sed sagittis urna, at vulputate libero. Cras luctus sem ex, sed sollicitudin dui sagittis vel. Praesent a justo dolor. Quisque eget iaculis est. Donec iaculis ex eget viverra pretium. Donec mollis et dui sit amet placerat. Phasellus vitae aliquam risus. Phasellus sed eleifend orci, at molestie felis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">In volutpat egestas porttitor. Aenean sodales hendrerit laoreet. Integer finibus pulvinar purus sed aliquam. Duis maximus velit malesuada laoreet sollicitudin. Morbi id neque non lectus consequat consequat. Proin a ex nec purus eleifend laoreet non vitae dolor. Sed facilisis dolor in felis scelerisque suscipit. Nam convallis lorem non nisl feugiat condimentum. In sollicitudin tristique purus, ac elementum nibh commodo et. Cras auctor nulla eu euismod auctor.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Phasellus vestibulum dui dui, quis consequat ante scelerisque at. Nullam a auctor libero. Fusce fringilla malesuada quam, nec sodales dolor fringilla id. Fusce id orci pulvinar augue consectetur laoreet sed in orci. Suspendisse tristique nunc nec lobortis pharetra. Morbi maximus tortor quam, feugiat condimentum orci pulvinar vitae. Sed libero est, rhoncus quis venenatis a, sollicitudin non purus. Fusce eleifend auctor tortor, bibendum tempor ipsum scelerisque vel. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Etiam quam nulla, porttitor in urna eu, sodales elementum leo. Nunc mollis suscipit orci. Aliquam vestibulum condimentum sapien, ut gravida lacus mollis et. Cras condimentum condimentum risus, in accumsan magna aliquam in. Fusce finibus felis dictum magna auctor viverra. Nullam lacus massa, malesuada sed velit a, posuere cursus arcu. Aliquam vitae enim neque. Morbi at iaculis felis. Cras sit amet ex non ante tempus pharetra at eleifend nibh. Vestibulum id fringilla diam. Suspendisse volutpat facilisis urna in blandit. Praesent lacinia nisl purus, in pulvinar ipsum ultricies vitae. Etiam luctus fermentum turpis in scelerisque. In rhoncus nulla at lobortis porta. Suspendisse iaculis nisi a velit luctus, eget condimentum dolor interdum. Integer sodales fringilla aliquet.</p>', '2018-06-15 12:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `user_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `creation_date`, `user_group_id`) VALUES
(1, 'jean', '$2y$10$GvuY6BsImS10vHHQ6M55eunwJk0/sukj.bu0P9W81vNGl4a4x66rq', 'jean@forteroche.com', '2018-06-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`) VALUES
(1, 'administrator'),
(2, 'moderator'),
(3, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_counter` (`report_counter`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
