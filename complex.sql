-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 Tem 2018, 23:38:32
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `complex`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Data Science', '2018-07-09 19:23:58', '2018-07-09 19:23:58'),
(2, 'Web Development', '2018-07-09 19:24:06', '2018-07-09 19:24:06'),
(3, 'Mathematic', '2018-07-09 19:24:13', '2018-07-09 19:24:13'),
(4, 'Tutorials', '2018-07-09 19:24:24', '2018-07-09 19:24:24'),
(5, 'Career', '2018-07-09 19:24:54', '2018-07-09 19:24:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category_menu`
--

CREATE TABLE `category_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category_menu`
--

INSERT INTO `category_menu` (`id`, `category_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 4, 1, NULL, NULL),
(4, 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `menus`
--

INSERT INTO `menus` (`id`, `name`, `main`, `created_at`, `updated_at`) VALUES
(1, 'main_menu', 1, '2018-07-09 19:25:09', '2018-07-09 19:25:09');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(58, '2018_07_08_132451_create_menu_category_table', 1),
(99, '2014_10_12_000000_create_users_table', 2),
(100, '2014_10_12_100000_create_password_resets_table', 2),
(101, '2018_06_28_104808_create_posts_table', 2),
(102, '2018_06_28_105604_create_categories_table', 2),
(103, '2018_07_02_093017_create_tags_table', 2),
(104, '2018_07_02_093734_create_post_tag_table', 2),
(105, '2018_07_03_112225_create_profiles_table', 2),
(106, '2018_07_07_082707_create_settings_table', 2),
(107, '2018_07_07_094500_create_menus_table', 2),
(108, '2018_07_08_133243_create_category_menu_table', 2),
(109, '2018_07_10_215214_insert_user_id_column', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `category_id`, `featured`, `deleted_at`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Is C++ dying ?', 'is-c-dying', '<p class=\"ui_qtext_para\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, Meiryo, serif;\">No. C++ is being used for more and more all the time, especially since C++11.</p><p class=\"ui_qtext_para\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, Meiryo, serif;\">But, the computer industry as a whole is expanding even faster. In the past, you had to be pretty passionate about computers to be able to keep a job in the industry. Now, there is so much demand that a whole new wave of new people are getting involved, and for them, C++ is too difficult to learn. So you have a large segment of the industry that is using things like Java and Javascript.</p><p class=\"ui_qtext_para\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, Meiryo, serif;\">So, there will always be a need for C++, but now there is also room for jobs that can be done with less training. Relative to this new influx, C++ must seem to be outdated and shrinking, especially to those new people. But in absolute terms, C++ use is growing at a great pace.</p><p class=\"ui_qtext_para\" style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, Meiryo, serif;\">There are a few languages that can compete with C++, like Rust and D, but they are not quite there yet, and the evolution of C++ has greatly accelerated in the past few years. They are now talking about releasing new standards every two years now.</p>', 1, 'uploads/posts/1531175279c++.jpg', '2018-07-10 20:21:57', '2018-07-09 19:27:59', '2018-07-10 20:21:57', 1),
(2, 'Write your own Compiler in C !', 'write-your-own-compiler-in-c', '<h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Intro</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">A typical compiler does the following steps:</p><ul style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 30px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(36, 39, 41);\"><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Parsing: the source text is converted to an abstract syntax tree (AST).</li><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Resolution of references to other modules (C postpones this step till linking).</li><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Semantic validation: weeding out syntactically correct statements that make no sense, e.g. unreachable code or duplicate declarations.</li><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Equivalent transformations and high-level optimization: the AST is transformed to represent a more efficient computation with the same semantics. This includes e.g. early calculation of common subexpressions and constant expressions, eliminating excessive local assignments (see also&nbsp;<a href=\"https://en.wikipedia.org/wiki/Static_single_assignment_form\" rel=\"noreferrer\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(127, 58, 33); cursor: pointer;\">SSA</a>), etc.</li><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Code generation: the AST is transformed into linear low-level code, with jumps, register allocation and the like. Some function calls can be inlined at this stage, some loops unrolled, etc.</li><li style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Peephole optimization: the low-level code is scanned for simple local inefficiencies which are eliminated.</li></ul><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Most modern compilers (for instance, gcc and clang) repeat the last two steps once more. They use an intermediate low-level but platform-independent language for initial code generation. Then that language is converted into platform-specific code (x86, ARM, etc) doing roughly the same thing in a platform-optimized way. This includes e.g. the use of vector instructions when possible, instruction reordering to increase branch prediction efficiency, and so on.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">After that, object code is ready for linking. Most native-code compilers know how to call a linker to produce an executable, but it\'s not a compilation step per se. In languages like Java and C# linking may be totally dynamic, done by the VM at load time.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Remember the basics</h2><ul style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 30px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(36, 39, 41);\"><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Make it work</li><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Make it beautiful</li><li style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">Make it efficient</li></ul><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">This classic sequence applies to all software development, but bears repetition.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Concentrate on the first step of the sequence. Create the simplest thing that could possibly work.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Read the books!</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Read the&nbsp;<a href=\"https://rads.stackoverflow.com/amzn/click/0321486811\" rel=\"noreferrer\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(127, 58, 33); cursor: pointer;\">Dragon Book</a>&nbsp;by Aho and Ullman. This is classic and is still quite applicable today.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\"><a href=\"https://rads.stackoverflow.com/amzn/click/0471976970\" rel=\"noreferrer\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(127, 58, 33); cursor: pointer;\">Modern Compiler Design</a>&nbsp;is also praised.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">If this stuff is too hard for you right now, read some intros on parsing first; usually parsing libraries include intros and examples.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Make sure you\'re comfortable working with graphs, especially trees. These things is the stuff programs are made of on the logical level.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Define your language well</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Use whatever notation you want, but make sure you have a complete and consistent description of your language. This includes both syntax and semantics.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">It\'s high time to write snippets of code in your new language as test cases for the future compiler.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Use your favorite language</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">It\'s totally OK to write a compiler in Python or Ruby or whatever language is easy for you. Use simple algorithms you understand well. The first version does not have to be fast, or efficient, or feature-complete. It only needs to be correct enough and easy to modify.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">It\'s also OK to write different stages of a compiler in different languages, if needed.</p><h3 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 17px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Prepare to write a lot of tests</h3><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Your entire language should be covered by test cases; effectively it will be&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">defined</em>&nbsp;by them. Get well-acquainted with your preferred testing framework. Write tests from day one. Concentrate on \'positive\' tests that accept correct code, as opposed to detection of incorrect code.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Run all the tests regularly. Fix broken tests before proceeding. It would be a shame to end up with an ill-defined language that cannot accept valid code.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Create a good parser</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\"><a href=\"http://en.wikipedia.org/wiki/Comparison_of_parser_generators\" rel=\"noreferrer\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(127, 58, 33); cursor: pointer;\">Parser generators are many</a>. Pick whatever you want. You may also write your own parser from scratch, but it only worth it if syntax of your language is&nbsp;<em style=\"margin: 0px; padding: 0px; border: 0px; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">dead</em>&nbsp;simple.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">The parser should detect and report syntax errors. Write a lot of test cases, both positive and negative; reuse the code you wrote while defining the language.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Output of your parser is an abstract syntax tree.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">If your language has modules, the output of the parser may be the simplest representation of \'object code\' you generate. There are plenty of simple ways to dump a tree to a file and to quickly load it back.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Create a semantic validator</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Most probably your language allows for syntactically correct constructions that may make no sense in certain contexts. An example is a duplicate declaration of the same variable or passing a parameter of a wrong type. The validator will detect such errors looking at the tree.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">The validator will also resolve references to other modules written in your language, load these other modules and use in the validation process. For instance, this step will make sure that the number of parameters passed to a function from another module is correct.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Again, write and run a lot of test cases. Trivial cases are as indispensable at troubleshooting as smart and complex.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Generate code</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Use the simplest techniques you know. Often it\'s OK to directly translate a language construct (like an&nbsp;<code style=\"margin: 0px; padding: 1px 5px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: pre-wrap;\">if</code>&nbsp;statement) to a lightly-parametrized code template, not unlike an HTML template.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Again, ignore efficiency and concentrate on correctness.</p><h3 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 17px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Target a platform-independent low-level VM</h3><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">I suppose that you ignore low-level stuff unless you\'re keenly interested in hardware-specific details. These details are gory and complex.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Your options:</p><ul style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 30px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; list-style-position: initial; list-style-image: initial; color: rgb(36, 39, 41);\"><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">LLVM: allows for efficient machine code generation, usually for x86 and ARM.</li><li style=\"margin: 0px 0px 0.5em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">CLR: targets .NET, mostly x86/Windows-based; has a good JIT.</li><li style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; word-wrap: break-word;\">JVM: targets Java world, quite multiplatform, has a good JIT.</li></ul><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">Ignore optimization</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Optimization is hard. Almost always optimization is premature. Generate inefficient but correct code. Implement the whole language before you try to optimize the resulting code.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Of course, trivial optimizations are OK to introduce. But avoid any cunning, hairy stuff before your compiler is stable.</p><h2 style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.3; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 19px; vertical-align: baseline; word-wrap: break-word; color: rgb(36, 39, 41);\">So what?</h2><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">If all this stuff is not too intimidating for you, please proceed! For a simple language, each of the steps may be simpler that you think.</p><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">Seeing a \'Hello world\' from a program that your compiler created might be worth the effort.</p>', 4, 'uploads/posts/1531175393C-language.jpg', '2018-07-10 20:22:00', '2018-07-09 19:29:53', '2018-07-10 20:22:00', 2),
(3, 'Method orWhere does not exist. Laravel 5.3', 'method-orwhere-does-not-exist-laravel-53', '<p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">BadMethodCallException in Macroable.php line 74: Method orWhere does not exist.</p><pre class=\"lang-php prettyprint prettyprinted\" style=\"margin-bottom: 1em; padding: 5px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; width: auto; max-height: 600px; background-color: rgb(239, 240, 241); color: rgb(57, 51, 24); word-wrap: normal;\"><code style=\"margin: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: Consolas, Menlo, Monaco, &quot;Lucida Console&quot;, &quot;Liberation Mono&quot;, &quot;DejaVu Sans Mono&quot;, &quot;Bitstream Vera Sans Mono&quot;, &quot;Courier New&quot;, monospace, sans-serif; font-size: 13px; vertical-align: baseline; background-color: rgb(239, 240, 241); white-space: inherit;\"><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">    $category </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">=</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\"> $categories</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">-&gt;</span><span class=\"kwd\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(16, 16, 148);\">where</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">(</span><span class=\"str\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(125, 39, 39);\">\'Node_ID\'</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">,</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\"> </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">(</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">explode</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">(</span><span class=\"str\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(125, 39, 39);\">\'.\'</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">,</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\"> $cat</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">{</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">$title_id</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">})[</span><span class=\"lit\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(125, 39, 39);\">0</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">]))</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">\r\n        </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">-&gt;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">orWhere</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">(</span><span class=\"str\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(125, 39, 39);\">\'Node_Path\'</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">,</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\"> $cat</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">-&gt;{</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">$category_name</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">})</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">\r\n        </span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">-&gt;</span><span class=\"pln\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">first</span><span class=\"pun\" style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(48, 51, 54);\">();</span></code></pre><p style=\"margin-right: 0px; margin-bottom: 1em; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: inherit; font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 15px; vertical-align: baseline; clear: both; color: rgb(36, 39, 41);\">If I try without \"orWhere\" works, if I use it, throws an Error. Someone knows where is the mistake?</p>', 4, 'uploads/posts/1531175449laravel.jpg', NULL, '2018-07-09 19:30:49', '2018-07-09 19:30:49', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `profiles`
--

INSERT INTO `profiles` (`id`, `avatar`, `about`, `user_id`, `facebook`, `twitter`, `pinterest`, `created_at`, `updated_at`) VALUES
(1, 'uploads\\avatars\\default.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n			    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n			    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n			    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n			    cillum dolore eu fugiat nulla pariatur.', 1, 'facebook.com', 'twitter.com', 'pinterest.com', '2018-07-09 19:23:16', '2018-07-09 19:23:16'),
(2, 'uploads\\avatars\\default.jpg', NULL, 2, NULL, NULL, NULL, '2018-07-10 18:57:03', '2018-07-10 18:57:03');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `contact_number`, `contact_email`, `address`, `footer_title`, `footer_description`, `created_at`, `updated_at`) VALUES
(1, 'Laravel\'s Blog', '+90 544 266 64 17', 'info@larablog.com', 'Turkey, Istanbul', 'Laravel\'s Blog', 'Qolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibham liber tempor cum soluta nobis eleifend option congue nihil uarta decima et quinta. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat eleifend option nihil. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius parum claram.', '2018-07-09 19:23:16', '2018-07-09 19:23:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'C++', '2018-07-09 19:26:23', '2018-07-09 19:26:23'),
(2, 'wordpress 4.6', '2018-07-09 19:28:15', '2018-07-09 19:28:15'),
(3, 'Xiaomi Redmi 5 Plus', '2018-07-09 22:21:30', '2018-07-09 22:21:30'),
(4, 'Laravel 5.6', '2018-07-09 22:21:36', '2018-07-09 22:21:36'),
(5, 'Blogging', '2018-07-09 22:24:49', '2018-07-09 22:24:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Emirhan Ataman', 'emirhan.1ataman@gmail.com', '$2y$10$fvD0dNq8wlxOMxK8LLcNXeZejO5/xY61/44ej3rnAoDdm.SAXqqIO', 1, 'PFEaMfZuzP80ZbqMhIHR5igaOCAvLRXrAbXxPVukX8mr8ObDfbjs6VwWZJRX', '2018-07-09 19:23:16', '2018-07-09 19:23:16'),
(2, 'Emily', 'emily@hasshari.com', '$2y$10$lDylW3n4MsnPOY.Wcwej3OVf32jnkq3gAOa9wfkrvB02yEyXe0JRi', 0, NULL, '2018-07-10 18:57:03', '2018-07-10 18:57:03');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `category_menu`
--
ALTER TABLE `category_menu`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_main_unique` (`main`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `category_menu`
--
ALTER TABLE `category_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
