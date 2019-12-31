-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Dez-2019 às 05:15
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinder`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `user_from`, `user_to`, `action`) VALUES
(6, 1, 5, 1),
(7, 5, 2, 0),
(8, 5, 1, 1),
(9, 1, 3, 1),
(10, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `bio` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `longi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`, `sexo`, `idade`, `bio`, `imagem`, `localizacao`, `lat`, `longi`) VALUES
(1, 'teste@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'João', 'masculino', 18, 'Eng.Elétrico', 'https://images.wallpaperscraft.com/image/boy_silhouette_sunset_sky_sea_120026_1920x1080.jpg', 'Santa Maria', '-28.2989', '-54.2573'),
(2, 'carlos@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'Carlos Ribeiro', 'masculino', 24, 'Skatista', 'https://i0.heartyhosting.com/www.dewtour.com/wp-content/uploads/2018/06/Carlos_Ribeiro_Boost_Switch_Jam_Long_Beach_Durso.jpg?resize=1920%2C1080&ssl=1', 'Santa Maria', '0', '0'),
(3, 'paula@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ana Paula', 'feminino', 19, 'Ed.Física', 'https://images.unsplash.com/photo-1433588641602-7c1083c4f0e2', 'Santa Maria', '-28.3004', '-54.2499'),
(4, 'fernanda@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernanda Bak', 'feminino', 20, 'Web Designer', 'https://i.pinimg.com/originals/08/0c/8b/080c8bee137bc213bae9970379f7f9e2.jpg', 'Santa Maria', '0', '0'),
(5, 'eduarda@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'Eduarda', 'feminino', 22, 'Modelo', 'https://wallpaperaccess.com/full/24487.jpg', 'Santa Maria', '-29.703421', '-53.815201'),
(6, 'Luis', 'e10adc3949ba59abbe56e057f20f883e', 'Luis', 'masculino', 18, 'vivendo', 'https://i.pinimg.com/originals/88/29/02/88290214e191ea8f28ff743b8d34cdd8.jpg', 'Santa Maria', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
