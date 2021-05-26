-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2021 a las 00:54:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zapiola`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amenities`
--

CREATE TABLE `amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `url`, `name_en`, `url_en`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aire acondicionado', 'aire-acondicionado', 'Air-conditioning', 'airconditioning', 5, 1, '2021-05-06 18:08:55', '2021-05-13 15:45:10'),
(2, 'Internet', 'internet', 'Internet', 'internet', 4, 1, '2021-05-06 18:09:00', '2021-05-13 15:44:51'),
(3, 'Televisión por cable', 'televisin-por-cable', 'Cable TV', 'cable-tv', 3, 1, '2021-05-06 18:09:14', '2021-05-13 15:45:27'),
(4, 'Balcón', 'balcn', 'Balcony', 'balcony', 0, 1, '2021-05-06 18:09:32', '2021-05-13 15:44:29'),
(5, 'Estacionamiento', 'estacionamiento', 'Parking', 'parking', 1, 1, '2021-05-06 18:09:43', '2021-05-13 15:45:54'),
(6, 'Piscina', 'piscina', 'Pool', 'pool', 2, 1, '2021-05-06 18:10:06', '2021-05-13 15:45:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE `audits` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audits`
--

INSERT INTO `audits` (`id`, `ip`, `activity`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-05 23:08:50', '2021-05-05 23:08:50'),
(2, '127.0.0.1', 'Descarga reporte de administradores', 1, '2021-05-06 00:01:19', '2021-05-06 00:01:19'),
(3, '127.0.0.1', 'Actualización categoría #2', 1, '2021-05-06 00:21:22', '2021-05-06 00:21:22'),
(4, '127.0.0.1', 'Actualización categoría #1', 1, '2021-05-06 00:21:32', '2021-05-06 00:21:32'),
(5, '127.0.0.1', 'Actualización de nombre del sitio', 1, '2021-05-06 00:21:59', '2021-05-06 00:21:59'),
(6, '127.0.0.1', 'Cierre de sesión', 1, '2021-05-06 00:37:52', '2021-05-06 00:37:52'),
(7, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-06 00:48:22', '2021-05-06 00:48:22'),
(8, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-06 17:39:09', '2021-05-06 17:39:09'),
(9, '127.0.0.1', 'Registro de comodidades #1', 1, '2021-05-06 18:08:55', '2021-05-06 18:08:55'),
(10, '127.0.0.1', 'Registro de comodidades #2', 1, '2021-05-06 18:09:00', '2021-05-06 18:09:00'),
(11, '127.0.0.1', 'Registro de comodidades #3', 1, '2021-05-06 18:09:14', '2021-05-06 18:09:14'),
(12, '127.0.0.1', 'Registro de comodidades #4', 1, '2021-05-06 18:09:33', '2021-05-06 18:09:33'),
(13, '127.0.0.1', 'Registro de comodidades #5', 1, '2021-05-06 18:09:43', '2021-05-06 18:09:43'),
(14, '127.0.0.1', 'Registro de comodidades #6', 1, '2021-05-06 18:10:06', '2021-05-06 18:10:06'),
(15, '127.0.0.1', 'Ordenar comodidades', 1, '2021-05-06 18:10:34', '2021-05-06 18:10:34'),
(16, '127.0.0.1', 'Ordenar comodidades', 1, '2021-05-06 18:10:41', '2021-05-06 18:10:41'),
(17, '127.0.0.1', 'Ordenar tipos de propiedad ', 1, '2021-05-06 18:10:56', '2021-05-06 18:10:56'),
(18, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-07 00:34:24', '2021-05-07 00:34:24'),
(19, '127.0.0.1', 'Actualización de item de menú ID #3', 1, '2021-05-07 00:35:04', '2021-05-07 00:35:04'),
(20, '127.0.0.1', 'Actualización de item de menú ID #3', 1, '2021-05-07 00:35:22', '2021-05-07 00:35:22'),
(21, '127.0.0.1', 'Cierre de sesión', 1, '2021-05-07 01:52:48', '2021-05-07 01:52:48'),
(22, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-07 01:52:59', '2021-05-07 01:52:59'),
(23, '127.0.0.1', 'Actualización de información de contacto', 1, '2021-05-07 01:56:46', '2021-05-07 01:56:46'),
(24, '127.0.0.1', 'Actualización de información de contacto', 1, '2021-05-07 01:57:51', '2021-05-07 01:57:51'),
(25, '127.0.0.1', 'Cierre de sesión', 1, '2021-05-07 02:03:21', '2021-05-07 02:03:21'),
(26, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-07 02:16:44', '2021-05-07 02:16:44'),
(27, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-07 05:24:24', '2021-05-07 05:24:24'),
(28, '127.0.0.1', 'Cierre de sesión', 1, '2021-05-07 05:44:06', '2021-05-07 05:44:06'),
(29, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-07 17:04:38', '2021-05-07 17:04:38'),
(30, '127.0.0.1', 'Actualización de la imagen de pie de página', 1, '2021-05-07 17:07:58', '2021-05-07 17:07:58'),
(31, '127.0.0.1', 'Actualización de la imagen de pie de página', 1, '2021-05-07 17:09:03', '2021-05-07 17:09:03'),
(32, '127.0.0.1', 'Actualización de la imagen de pie de página', 1, '2021-05-07 17:23:00', '2021-05-07 17:23:00'),
(33, '127.0.0.1', 'Actualización de la imagen de pie de página', 1, '2021-05-07 17:23:09', '2021-05-07 17:23:09'),
(34, '127.0.0.1', 'Actualización de la imagen de pie de página', 1, '2021-05-07 17:23:32', '2021-05-07 17:23:32'),
(35, '127.0.0.1', 'Cierre de sesión', 1, '2021-05-07 15:31:04', '2021-05-07 15:31:04'),
(36, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-07 16:18:30', '2021-05-07 16:18:30'),
(37, '127.0.0.1', 'Registro de propiedad ID #1', 1, '2021-05-07 18:24:43', '2021-05-07 18:24:43'),
(38, '127.0.0.1', 'Registro de administrador ID #3', 1, '2021-05-07 18:26:34', '2021-05-07 18:26:34'),
(39, '127.0.0.1', 'Actualización propiedad ID #1', 1, '2021-05-07 18:52:37', '2021-05-07 18:52:37'),
(40, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-10 14:18:40', '2021-05-10 14:18:40'),
(41, '127.0.0.1', 'Actualización sección ID #2', 1, '2021-05-10 14:19:31', '2021-05-10 14:19:31'),
(42, '127.0.0.1', 'Eliminar imagen de propiedad ID #1', 1, '2021-05-10 19:52:38', '2021-05-10 19:52:38'),
(43, '127.0.0.1', 'Actualización propiedad ID #1', 1, '2021-05-10 19:52:45', '2021-05-10 19:52:45'),
(44, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-11 16:22:24', '2021-05-11 16:22:24'),
(45, '127.0.0.1', 'Actualización sección ID #1', 1, '2021-05-11 16:22:59', '2021-05-11 16:22:59'),
(46, '127.0.0.1', 'Eliminar imagen de la sección ID #1', 1, '2021-05-11 16:27:30', '2021-05-11 16:27:30'),
(47, '127.0.0.1', 'Actualización sección ID #1', 1, '2021-05-11 16:27:36', '2021-05-11 16:27:36'),
(48, '127.0.0.1', 'Actualización sección ID #4', 1, '2021-05-11 16:33:42', '2021-05-11 16:33:42'),
(49, '127.0.0.1', 'Actualización sección ID #5', 1, '2021-05-11 16:33:58', '2021-05-11 16:33:58'),
(50, '127.0.0.1', 'Eliminar imagen de la sección ID #5', 1, '2021-05-11 16:44:48', '2021-05-11 16:44:48'),
(51, '127.0.0.1', 'Actualización sección ID #5', 1, '2021-05-11 16:44:54', '2021-05-11 16:44:54'),
(52, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-12 18:13:32', '2021-05-12 18:13:32'),
(53, '127.0.0.1', 'Actualización sección ID #7', 1, '2021-05-12 18:14:02', '2021-05-12 18:14:02'),
(54, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-13 13:49:27', '2021-05-13 13:49:27'),
(55, '127.0.0.1', 'Actualización de nombre del sitio', 1, '2021-05-13 15:16:24', '2021-05-13 15:16:24'),
(56, '127.0.0.1', 'Actualización de nombre del sitio', 1, '2021-05-13 15:16:37', '2021-05-13 15:16:37'),
(57, '127.0.0.1', 'Actualización tipos de propiedad  #1', 1, '2021-05-13 15:39:53', '2021-05-13 15:39:53'),
(58, '127.0.0.1', 'Actualización tipos de propiedad  #2', 1, '2021-05-13 15:40:07', '2021-05-13 15:40:07'),
(59, '127.0.0.1', 'Actualización comodidades #4', 1, '2021-05-13 15:42:56', '2021-05-13 15:42:56'),
(60, '127.0.0.1', 'Actualización comodidades #4', 1, '2021-05-13 15:43:57', '2021-05-13 15:43:57'),
(61, '127.0.0.1', 'Actualización comodidades #4', 1, '2021-05-13 15:44:29', '2021-05-13 15:44:29'),
(62, '127.0.0.1', 'Actualización comodidades #2', 1, '2021-05-13 15:44:51', '2021-05-13 15:44:51'),
(63, '127.0.0.1', 'Actualización comodidades #1', 1, '2021-05-13 15:45:10', '2021-05-13 15:45:10'),
(64, '127.0.0.1', 'Actualización comodidades #3', 1, '2021-05-13 15:45:27', '2021-05-13 15:45:27'),
(65, '127.0.0.1', 'Actualización comodidades #6', 1, '2021-05-13 15:45:41', '2021-05-13 15:45:41'),
(66, '127.0.0.1', 'Actualización comodidades #5', 1, '2021-05-13 15:45:54', '2021-05-13 15:45:54'),
(67, '127.0.0.1', 'Actualización de datos seo', 1, '2021-05-13 15:49:17', '2021-05-13 15:49:17'),
(68, '127.0.0.1', 'Actualización de información de contacto', 1, '2021-05-13 15:56:12', '2021-05-13 15:56:12'),
(69, '127.0.0.1', 'Actualización de item de menú ID #1', 1, '2021-05-13 16:03:38', '2021-05-13 16:03:38'),
(70, '127.0.0.1', 'Actualización de item de menú ID #2', 1, '2021-05-13 16:04:04', '2021-05-13 16:04:04'),
(71, '127.0.0.1', 'Actualización de item de menú ID #3', 1, '2021-05-13 16:04:30', '2021-05-13 16:04:30'),
(72, '127.0.0.1', 'Actualización de item de menú ID #6', 1, '2021-05-13 16:04:48', '2021-05-13 16:04:48'),
(73, '127.0.0.1', 'Actualización sección ID #1', 1, '2021-05-13 16:15:17', '2021-05-13 16:15:17'),
(74, '127.0.0.1', 'Cierre de sesión', 1, '2021-05-13 18:19:21', '2021-05-13 18:19:21'),
(75, '127.0.0.1', 'Inicio de sesión', 1, '2021-05-13 18:19:58', '2021-05-13 18:19:58'),
(76, '127.0.0.1', 'Actualización propiedad ID #1', 1, '2021-05-13 20:32:35', '2021-05-13 20:32:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `title_en`, `url_en`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Inicio', '#inicio', 'Home', '#home', 1, 0, '2020-09-02 00:59:14', '2021-05-13 16:03:38'),
(2, 'Nosotros', '#nosotros', 'About us', '#about-us', 1, 1, '2020-09-02 00:57:57', '2021-05-13 16:04:04'),
(3, 'Propiedades', '#propiedades', 'Properties', '#properties', 1, 2, '2020-09-02 00:58:13', '2021-05-13 16:04:30'),
(6, 'Contacto', '#contacto', 'Contact us', '#contact-us', 1, 5, '2020-09-02 00:58:46', '2021-05-13 16:04:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_12_000000_create_roles_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_08_07_180930_create_settings_table', 1),
(9, '2020_08_07_181014_create_plans_table', 1),
(10, '2020_08_07_181038_create_sections_table', 1),
(11, '2020_08_07_181243_create_blog_categories_table', 1),
(12, '2020_08_07_181259_create_blogs_table', 1),
(13, '2020_08_07_181331_create_audits_table', 1),
(14, '2020_08_07_181429_create_visits_table', 1),
(15, '2020_08_07_182628_create_menus_table', 1),
(16, '2020_08_07_183500_create_modules_table', 1),
(17, '2020_08_07_183737_create_submodules_table', 1),
(18, '2020_08_07_184514_create_permissions_table', 1),
(19, '2020_08_08_012546_create_users_pwa_table', 1),
(20, '2020_08_10_185409_create_comments_table', 1),
(21, '2020_08_17_220200_create_faqs_table', 1),
(22, '2020_08_21_190733_create_activities_table', 1),
(23, '2020_08_24_211405_create_auth_users_table', 1),
(24, '2020_09_03_143119_create_widgets_table', 1),
(25, '2014_10_12_000000_create_users_table', 2),
(26, '2021_01_13_211058_create_revolving_accounts_table', 3),
(27, '2021_01_13_220625_create_inquiries_table', 4),
(28, '2021_01_13_222517_create_months_table', 5),
(29, '2021_01_13_223247_create_month_types_table', 6),
(30, '2021_01_13_232101_add_columns_to_reports_table', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `name`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'user-check', '2020-09-02 04:59:14', '2020-09-02 04:59:14'),
(2, 'Configuración', 'settings', '2020-09-02 04:59:14', '2020-09-02 04:59:14'),
(3, 'Secciones', 'sidebar', '2020-09-02 04:59:14', '2020-09-02 04:59:14'),
(5, 'Propiedades', 'clipboard', '2020-09-02 04:59:14', '2020-09-02 04:59:14'),
(9, 'Soporte', 'headphones', '2020-09-02 04:59:14', '2020-09-02 04:59:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `module` int(11) NOT NULL,
  `submodule` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `properties`
--

CREATE TABLE `properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bedroom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bathroom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `garage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitchen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_maps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `properties`
--

INSERT INTO `properties` (`id`, `title`, `url`, `content`, `title_en`, `url_en`, `content_en`, `image`, `video`, `area`, `bedroom`, `bathroom`, `garage`, `kitchen`, `address`, `google_maps`, `amenities`, `type_id`, `price`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo Sheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu Sheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 1, 52, 0, '2021-05-07 18:24:43', '2021-05-13 20:32:35'),
(2, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 1, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(3, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 1, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(4, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 1, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(5, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 1, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(6, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 1, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(7, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 2, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(8, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 2, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(9, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 2, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(10, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 2, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(11, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 2, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45'),
(12, 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', 'Masons de Villa', 'masons-de-villa', '<p>sSheltek is ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx ea codo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu\r\n\r\nSheltek is the Best should be the consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex eacm</p>', ',1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg,1620672763.jpg', '', '450', '5', '1', '1', '1', '568 E 1st Ave, Ney Jersey', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3026.549886148255!2d-74.25152668459658!3d40.66185147933737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b290e4892d8d%3A0xe5a29bb45494f6a3!2s568%20E%201st%20Ave%2C%20Roselle%2C%20NJ%2007203%2C%20USA!5e0!3m2!1sen!2sve!4v1620910028028!5m2!1sen!2sve\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', ',4,5,6,3,2,1', 2, 52, 0, '2021-05-07 18:24:43', '2021-05-10 19:52:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '2020-09-04 13:15:39', '2020-09-04 13:15:39'),
(3, 'Developer', '2020-09-05 20:19:30', '2020-09-05 20:19:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_url_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `status_content` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `page`, `page_id`, `title`, `subtitle`, `content`, `title_en`, `subtitle_en`, `content_en`, `image`, `button_name`, `button_url`, `button_name_en`, `button_url_en`, `status`, `status_content`, `created_at`, `updated_at`) VALUES
(1, 'Inicio', 1, 'WELCOME TO <span>ZAPIOLA</span>', '', '<p>Lorem consectetur adipiscing elit, sed do eiusmod tempor dolor sit amet contetur adipiscing elit, sed do eiusmod tempor incididunt</p>', 'WELCOME TO <span>ZAPIOLA</span>', '', '<p>Lorem consectetur adipiscing elit, sed do eiusmod tempor dolor sit amet contetur adipiscing elit, sed do eiusmod tempor incididunt</p>', ',1620746855.jpg', '', '', '', '', 1, 1, NULL, '2021-05-13 16:15:17'),
(2, 'Inicio', 1, 'FAMILIA ZAPIOLA', 'Negocios Inmobiliarios', '<p>Zapiola is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo. Lorem is a dummy text do eiusmod tempor dolor sit amet, onsectetur adip iscing elit.</p>', 'ZAPIOLA FAMILY', '\r\nReal Estate Business', '<p>Zapiola is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo. Lorem is a dummy text do eiusmod tempor dolor sit amet, onsectetur adip iscing elit.</p>', ',1620652760.png', 'Contactanos', '#contacto', 'Contact us', '#contact-us', 1, 1, NULL, '2021-05-10 14:19:31'),
(3, 'Inicio', 1, 'NUESTRAS <span>PROPIEDADES</soan>', '', '<p>Zapiola is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>', 'OUR <span>PROPIERTIES</span>', '', '<p>Sheltek is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>', '', '', '', '', '', 1, 1, NULL, NULL),
(4, 'Venta', 2, 'Ventas', '', 'Sales', '', '', '', ',1620747221.jpg', '', '', '', '', 1, 1, NULL, '2021-05-11 16:33:42'),
(5, 'Alquiler', 3, 'Alquiler', '', 'Rental', '', '', '', ',1620747892.jpg', '', '', '', '', 1, 1, NULL, '2021-05-11 16:44:54'),
(6, 'Detalle', 4, 'Otras <span>Propiedades</span>', '', '<p>Sheltek is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>', 'Other <span>Properties</span>', '', '<p>Sheltek is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud</p>', '', '', '', '', '', 1, 1, NULL, NULL),
(7, 'Inicio', 1, 'AWESOME FEATUES', 'HERE IS', '<p>Sheltek is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do smod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi</p>', 'AWESOME FEATUES', '', '<p>Sheltek is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do smod tempor incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris nisi</p>', ',1620839641.jpg', '', '', '', '', 1, 1, NULL, '2021-05-12 18:14:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shedule` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shedule_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name`, `name_en`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `instagram`, `image`, `image_1`, `address`, `shedule`, `shedule_en`, `description`, `keywords`, `description_en`, `keywords_en`, `copy`, `created_at`, `updated_at`) VALUES
(1, 'Zapiola Negocios Inmobiliarios', 'Zapiola Real Estate Business', '+0 123-456-7890', 'info@zapiola.com', 'https://www.facebook.com/', 'https://twitter.com/', '', 'https://www.instagram.com', 'logo_1620333489.png', '1620393776.png', '8901 Marmora Raod, Glasgow, D04 89GR', 'Abiertos de 9am-10pm', 'We are open 9am-10pm', 'test', 'test', 'test', 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', NULL, '2021-05-13 15:56:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submodules`
--

CREATE TABLE `submodules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `submodules`
--

INSERT INTO `submodules` (`id`, `name`, `url`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo usuario', 'users/create', 1, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(2, 'Ver todos', 'users', 1, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(3, 'Rol', 'roles', 1, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(4, 'Auditoria', 'audits', 1, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(5, 'Nombre/Logos', 'options', 2, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(6, 'Información de Contacto', 'contact', 2, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(7, 'SEO', 'seo', 2, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(8, 'Menú Principal', 'menu', 2, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(9, 'Ver Todas', 'sections', 3, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(12, 'Nueva Propiedad', 'properties/create', 5, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(13, 'Ver Propiedades', 'properties', 5, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(14, 'Tipos', 'properties-types', 5, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(21, 'Entrada', 'mailbox-received', 9, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(22, 'Enviados', 'mailbox-sent', 9, '2021-06-05 20:19:30', '2021-06-05 20:19:30'),
(23, 'Servicios', 'properties-amenities', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `name`, `url`, `name_en`, `url_en`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alquiler', 'alquiler', 'Rental', 'rental', 0, 1, '2021-05-06 00:21:32', '2021-05-13 15:39:53'),
(2, 'Venta', 'venta', 'Sale', 'sale', 1, 1, '2021-05-06 00:21:22', '2021-05-13 15:40:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `rol_id`, `password`, `image`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@gmail.com', 1, '$2y$10$2ajuK3P59dqxBCnnL0D2ke/fXfxoSoprBSyL/z3e4rU5EbGryKBru', 'default.png', 1, NULL, NULL, '2020-12-15 20:26:52'),
(2, 'Alfredo Geraldo', 'alfredo@santabros.com.ar', 1, '$2y$10$tjQRpIx1vXuT6fSMh8o16.0TQONfjp9CvNym0Kvb2ETDBDk4au//G', 'default.png', 2, NULL, '2020-09-28 15:41:10', '2020-09-28 15:41:10'),
(3, 'test', 'test@gmail.com', 3, '$2y$10$fZuNSux9fOGEnUO0HqzkZO6zVX6RF6azmk8rtYCMjJxSSjrzIo6/2', 'default.png', 2, NULL, '2021-05-07 18:26:34', '2021-05-07 18:26:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits`
--

CREATE TABLE `visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` int(11) NOT NULL,
  `visit_date` date NOT NULL,
  `visit_hour` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `visits`
--

INSERT INTO `visits` (`id`, `page`, `ip`, `day`, `month`, `year`, `device`, `visit_date`, `visit_hour`, `created_at`, `updated_at`) VALUES
(1, 'Inicio', '34.219.44.253', '4', '01', '2021', 1, '2021-01-14', '23:00:00', '2021-01-15 02:50:45', '2021-01-15 02:50:45'),
(2, 'Praesent justo mauris, tincidunt vitae nisi ultricies.', '66.249.72.209', '5', '01', '2021', 1, '2021-01-15', '02:00:00', '2021-01-15 05:38:42', '2021-01-15 05:38:42'),
(3, 'Inicio', '51.15.251.143', '5', '01', '2021', 1, '2021-01-15', '02:00:00', '2021-01-15 05:53:02', '2021-01-15 05:53:02'),
(4, 'Inicio', '138.246.253.24', '5', '01', '2021', 1, '2021-01-15', '05:00:00', '2021-01-15 08:38:32', '2021-01-15 08:38:32'),
(5, 'Inicio', '34.230.156.67', '5', '01', '2021', 1, '2021-01-15', '08:00:00', '2021-01-15 11:22:38', '2021-01-15 11:22:38'),
(6, 'Inicio', '67.21.36.2', '5', '01', '2021', 1, '2021-01-15', '10:00:00', '2021-01-15 13:46:53', '2021-01-15 13:46:53'),
(7, 'Inicio', '93.158.161.70', '5', '01', '2021', 1, '2021-01-15', '11:00:00', '2021-01-15 14:05:45', '2021-01-15 14:05:45'),
(8, 'Inicio', '77.88.5.70', '5', '01', '2021', 1, '2021-01-15', '11:00:00', '2021-01-15 14:05:56', '2021-01-15 14:05:56'),
(9, 'Inicio', '209.17.97.18', '5', '01', '2021', 1, '2021-01-15', '13:00:00', '2021-01-15 16:26:19', '2021-01-15 16:26:19'),
(10, 'Inicio', '209.17.96.218', '5', '01', '2021', 1, '2021-01-15', '15:00:00', '2021-01-15 18:17:10', '2021-01-15 18:17:10'),
(11, 'Inicio', '35.181.112.20', '5', '01', '2021', 1, '2021-01-15', '15:00:00', '2021-01-15 18:26:11', '2021-01-15 18:26:11'),
(12, 'Inicio', '209.17.96.82', '5', '01', '2021', 1, '2021-01-15', '15:00:00', '2021-01-15 18:44:04', '2021-01-15 18:44:04'),
(13, 'Inicio', '18.136.72.135', '5', '01', '2021', 1, '2021-01-15', '16:00:00', '2021-01-15 19:05:52', '2021-01-15 19:05:52'),
(14, 'Inicio', '209.17.96.58', '5', '01', '2021', 1, '2021-01-15', '17:00:00', '2021-01-15 20:36:37', '2021-01-15 20:36:37'),
(15, 'Inicio', '190.206.36.233', '5', '01', '2021', 1, '2021-01-15', '17:00:00', '2021-01-15 20:56:24', '2021-01-15 20:56:24'),
(16, 'Inicio', '2a01:7e00::f03c:91ff:feac:bf3b', '5', '01', '2021', 1, '2021-01-15', '18:00:00', '2021-01-15 21:00:08', '2021-01-15 21:00:08'),
(17, 'Inicio', '2800:810:596:2ad:5d9c:55a6:84bc:4b57', '5', '01', '2021', 1, '2021-01-15', '18:00:00', '2021-01-15 21:07:35', '2021-01-15 21:07:35'),
(18, 'Inicio', '168.119.212.143', '5', '01', '2021', 1, '2021-01-15', '18:00:00', '2021-01-15 21:33:39', '2021-01-15 21:33:39'),
(19, 'Inicio', '190.205.25.143', '5', '01', '2021', 1, '2021-01-15', '20:00:00', '2021-01-15 23:29:53', '2021-01-15 23:29:53'),
(20, 'Ventas', '127.0.0.1', '5', '05', '2021', 1, '2021-05-07', '13:00:00', '2021-05-07 17:59:31', '2021-05-07 17:59:31'),
(21, 'Alquiler', '127.0.0.1', '5', '05', '2021', 1, '2021-05-07', '14:00:00', '2021-05-07 18:00:39', '2021-05-07 18:00:39'),
(22, 'Inicio', '127.0.0.1', '5', '05', '2021', 1, '2021-05-07', '14:00:00', '2021-05-07 18:55:22', '2021-05-07 18:55:22'),
(23, 'Inicio', '127.0.0.1', '1', '05', '2021', 1, '2021-05-10', '10:00:00', '2021-05-10 14:11:06', '2021-05-10 14:11:06'),
(24, 'Ventas', '127.0.0.1', '1', '05', '2021', 1, '2021-05-10', '10:00:00', '2021-05-10 14:53:52', '2021-05-10 14:53:52'),
(25, 'Alquiler', '127.0.0.1', '1', '05', '2021', 1, '2021-05-10', '10:00:00', '2021-05-10 14:53:57', '2021-05-10 14:53:57'),
(26, 'test', '127.0.0.1', '1', '05', '2021', 1, '2021-05-10', '13:00:00', '2021-05-10 17:33:19', '2021-05-10 17:33:19'),
(27, 'Masons de Villa', '127.0.0.1', '1', '05', '2021', 1, '2021-05-10', '20:00:00', '2021-05-11 00:57:29', '2021-05-11 00:57:29'),
(28, 'Inicio', '127.0.0.1', '2', '05', '2021', 1, '2021-05-11', '09:00:00', '2021-05-11 13:16:06', '2021-05-11 13:16:06'),
(29, 'Ventas', '127.0.0.1', '2', '05', '2021', 1, '2021-05-11', '09:00:00', '2021-05-11 13:16:17', '2021-05-11 13:16:17'),
(30, 'Alquiler', '127.0.0.1', '2', '05', '2021', 1, '2021-05-11', '09:00:00', '2021-05-11 13:49:30', '2021-05-11 13:49:30'),
(31, 'Masons de Villa', '127.0.0.1', '2', '05', '2021', 1, '2021-05-11', '10:00:00', '2021-05-11 14:34:28', '2021-05-11 14:34:28'),
(32, 'Inicio', '127.0.0.1', '3', '05', '2021', 1, '2021-05-12', '08:00:00', '2021-05-12 12:39:10', '2021-05-12 12:39:10'),
(33, 'Masons de Villa', '127.0.0.1', '3', '05', '2021', 1, '2021-05-12', '08:00:00', '2021-05-12 12:48:02', '2021-05-12 12:48:02'),
(34, 'Ventas', '127.0.0.1', '3', '05', '2021', 1, '2021-05-12', '09:00:00', '2021-05-12 13:27:10', '2021-05-12 13:27:10'),
(35, 'Alquiler', '127.0.0.1', '3', '05', '2021', 1, '2021-05-12', '09:00:00', '2021-05-12 13:28:15', '2021-05-12 13:28:15'),
(36, 'Búsqueda', '127.0.0.1', '3', '05', '2021', 1, '2021-05-12', '12:00:00', '2021-05-12 16:51:52', '2021-05-12 16:51:52'),
(37, 'Inicio', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '09:00:00', '2021-05-13 13:35:33', '2021-05-13 13:35:33'),
(38, 'Masons de Villa', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '09:00:00', '2021-05-13 13:35:40', '2021-05-13 13:35:40'),
(39, 'Home', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '12:00:00', '2021-05-13 16:45:22', '2021-05-13 16:45:22'),
(40, 'Sale', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '12:00:00', '2021-05-13 16:52:36', '2021-05-13 16:52:36'),
(41, 'Rental', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '13:00:00', '2021-05-13 17:14:29', '2021-05-13 17:14:29'),
(42, 'Venta', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '13:00:00', '2021-05-13 17:57:38', '2021-05-13 17:57:38'),
(43, 'Alquiler', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '13:00:00', '2021-05-13 17:58:04', '2021-05-13 17:58:04'),
(44, 'Búsqueda', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '14:00:00', '2021-05-13 18:06:33', '2021-05-13 18:06:33'),
(45, 'Search', '127.0.0.1', '4', '05', '2021', 1, '2021-05-13', '15:00:00', '2021-05-13 19:04:51', '2021-05-13 19:04:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `widgets`
--

CREATE TABLE `widgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `counter`, `content`, `image`, `position`, `created_at`, `updated_at`) VALUES
(1, 'LOREM', 20, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n', '', 0, '2020-09-03 00:13:50', '2020-09-03 00:13:50'),
(2, 'LOREM', 20, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n', '', 2, '2020-09-03 00:13:50', '2020-09-04 14:20:44'),
(3, 'LOREM', 20, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n', '', 1, '2020-09-03 00:13:50', '2020-09-04 14:20:44'),
(4, 'LOREM', 20, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>\r\n', '', 3, '2020-09-03 00:13:50', '2020-09-04 14:20:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_rol_id_foreign` (`rol_id`);

--
-- Indices de la tabla `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submodules`
--
ALTER TABLE `submodules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- Indices de la tabla `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `submodules`
--
ALTER TABLE `submodules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `audits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Filtros para la tabla `submodules`
--
ALTER TABLE `submodules`
  ADD CONSTRAINT `submodules_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
