-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2021 lúc 02:45 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel.sql`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name_pb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `name_pb`, `status`, `created_at`, `updated_at`) VALUES
(1, 'P.Kế toán', 'active', '2021-04-04 08:54:35', '2021-04-04 08:54:35'),
(2, 'P.Nhân sự', 'active', '2021-04-04 08:54:35', '2021-04-09 01:19:56'),
(3, 'P. Truyền thông1', 'active', '2021-04-09 00:28:18', '2021-04-09 01:20:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `regency`
--

CREATE TABLE `regency` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name_cv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `regency`
--

INSERT INTO `regency` (`id`, `department_id`, `name_cv`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nhân viên', 'delete', '2021-04-01 03:17:40', '2021-04-08 21:49:37'),
(2, 1, 'Kế Toán', 'active', '2021-04-01 03:17:40', '2021-04-08 21:49:59'),
(3, 1, 'Tài chính ngân hàng', 'active', '2021-04-08 03:12:14', '2021-04-08 21:46:04'),
(4, 2, 'Lập trình viên', 'active', '2021-04-08 20:01:37', '2021-04-08 23:55:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user', 'active', '2021-03-31 09:00:38', '2021-03-31 09:01:25'),
(2, 'admin', 'active', '2021-03-31 09:00:38', '2021-03-31 09:01:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name_da` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id`, `name_da`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dự án website bán giày MWM', 'active', '2021-04-04 11:35:42', '2021-04-04 11:35:42'),
(2, 'Dự án website bán Quan Ao', 'active', '2021-04-04 11:35:42', '2021-04-04 11:35:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task_user`
--

CREATE TABLE `task_user` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-04-04 11:37:43', '2021-04-04 11:37:43'),
(3, 2, 5, '2021-04-06 09:00:35', '2021-04-06 09:00:35'),
(12, 1, 3, '2021-04-10 21:28:08', '2021-04-10 21:28:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `regency_id` int(11) DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `super_user` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `remember_token`, `status`, `role_id`, `regency_id`, `gender`, `fullname`, `avatar`, `created_at`, `updated_at`, `super_user`) VALUES
(2, 'phucphipham1372000@gmail.com', '$2y$10$rXnXKnRGcKFGtVUE1K1RxO62iobCU8.BaJDMqgWTf8mmbiCtJU54q', NULL, 'active', 1, 1, 1, 'Lê Tấn Phúc', NULL, '2021-04-11 06:05:13', '2021-03-31 08:06:10', NULL),
(3, 'coderit1372000@gmail.com', '$2y$10$HR/XV8xTUO7r7q1rpUEtRe5S/PGwYBJ4dqVqlTZDM//LM5KE2WpNO', NULL, 'active', 2, 2, 0, 'Nguyễn Thị Hạnh', '2021-04-11_145341405_1326080851096653_3298265366673346004_n.jpg', '2021-04-11 08:16:55', '2021-03-31 08:06:10', NULL),
(5, 'abc@gmail.com', '$2y$10$2tyd/IDV.SW0Az2tBFBDEecW9hInjNTzC4R9IHLl..ZFD0Sev4Svq', NULL, 'active', 2, 2, 1, 'phuc', '2021-04-04_team.jpg', '2021-04-12 12:23:53', '2021-04-04 15:34:39', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `regency`
--
ALTER TABLE `regency`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `regency`
--
ALTER TABLE `regency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
