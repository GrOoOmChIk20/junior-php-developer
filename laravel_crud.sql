-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 27 2025 г., 13:01
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_crud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `list_task`
--

CREATE TABLE `list_task` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `list_task`
--

INSERT INTO `list_task` (`id`, `title`, `description`, `status`, `deleted_at`) VALUES
(1, 'Купить продукты', 'Молоко, хлеб, яйца, фрукты для салата', 'pending', NULL),
(2, 'Закончить отчёт по проекту', 'Проверить все данные, составить заключение и отправить менеджеру', 'in progress', NULL),
(3, 'Позвонить клиенту Иванову', 'Обсудить детали нового заказа и уточнить сроки доставки', 'completed', NULL),
(4, 'Запланировать отпуск', 'Выбрать направление, забронировать билеты и отель', 'pending', NULL),
(5, 'Прочитать новую статью', 'Изучить материалы по машинному обучению и сделать заметки', 'in progress', NULL),
(6, 'Убрать рабочее место', 'Очистить стол, рассортировать документы, протереть монитор', 'pending', NULL),
(7, 'Подготовить презентацию', 'Собрать ключевые данные и создать слайды для встречи в пятницу', 'in progress', NULL),
(8, 'Отменить встречу с Петровым', 'Перенести на следующую неделю из-за загруженности', 'cancelled', NULL),
(9, 'Обновить программное обеспечение', 'Установить последние обновления для операционной системы и приложений', 'completed', NULL),
(10, 'Зарегистрироваться на вебинар', 'Найти интересный вебинар по фронтенду и пройти регистрацию', 'pending', NULL),
(11, 'Подготовить отчет за месяц', 'Создать подробный отчет о работе за текущий месяц с графиками и анализом', 'в работе', NULL),
(12, 'ыssыыы', 'выфвыф', 'ssssssыфыф', '2025-10-27 07:01:04'),
(13, 'Обновить дизайн сайта', 'Переделать главную страницу сайта согласно новым требованиям дизайнера', 'в работе', NULL),
(14, 'Проверить работоспособность API', 'Протестировать все эндпоинты API на корректность работы и производительность', 'завершено', NULL),
(15, 'Написать документацию', 'Создать техническую документацию для нового модуля системы', 'запланировано', NULL),
(16, 'Оптимизировать базу данных', 'Проанализировать запросы и добавить необходимые индексы для ускорения работы', 'в работе', NULL),
(17, 'Провести код-ревью', 'Проверить код коллег на соответствие стандартам и выявить возможные улучшения', 'завершено', NULL),
(18, 'Настроить CI/CD pipeline', 'Автоматизировать процесс деплоя с помощью GitHub Actions', 'запланировано', NULL),
(19, 'Решить баг в системе уведомлений', 'Исправить ошибку с отправкой email уведомлений пользователям', 'в работе', NULL),
(20, 'Создать backup системы', 'Настроить автоматическое резервное копирование базы данных и файлов', 'завершено', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `list_task`
--
ALTER TABLE `list_task`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `list_task`
--
ALTER TABLE `list_task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
