-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 09:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `kode_alternatif` varchar(30) NOT NULL,
  `nama_alternatif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `kode_alternatif`, `nama_alternatif`) VALUES
(24, 'TNM001', 'Bawang Merah'),
(25, 'TNM002', 'Jagung'),
(26, 'TNM003', 'Padi'),
(27, 'TNM004', 'Kedelai'),
(28, 'TNM005', 'Cabai Merah'),
(29, 'TNM006', 'Kacang Panjang'),
(30, 'TNM007', 'Kentang'),
(31, 'TNM008', 'Wortel'),
(32, 'TNM009', 'Lobak'),
(33, 'TNM010', 'Bawang Putih'),
(34, 'TNM011', 'Paprika'),
(35, 'TNM012', 'Kubis'),
(36, 'TNM013', 'Petai'),
(37, 'TNM014', 'Selada'),
(38, 'TNM015', 'Sawi'),
(39, 'TNM016', 'Bayam'),
(40, 'TNM017', 'Buncis'),
(41, 'TNM018', 'Kacang Kapri'),
(42, 'TNM019', 'Mentimun'),
(43, 'TNM020', 'Terong'),
(44, 'TNM021', 'Pare'),
(45, 'TNM022', 'Brokoli'),
(46, 'TNM023', 'Asparagus'),
(47, 'TNM024', 'Tomat Sayur'),
(48, 'TNM025', 'Petsai'),
(49, 'TNM026', 'Biet'),
(50, 'TNM027', 'Sorgum'),
(51, 'TNM028', 'Gandum'),
(52, 'TNM029', 'Talas'),
(53, 'TNM030', 'Ubi Jalar');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `selisih` tinyint(3) NOT NULL,
  `nilai_bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `selisih`, `nilai_bobot`, `keterangan`) VALUES
(1, 0, 5, 'Tidak ada selisih'),
(2, 1, 4.5, 'kelebihan selisih 1 tingkat'),
(3, -1, 4, 'kekurangan selisih 1 tingkat'),
(4, 2, 3.5, 'kelebihan selisih 2 tingkat'),
(5, -2, 3, 'kekurangan selisih 2 tingkat'),
(6, 3, 2.5, 'kelebihan selisih 3 tingkat'),
(7, -3, 2, 'kekurangan selisih 3 tingkat'),
(8, 4, 1.5, 'kelebihan selisih 4 tingkat'),
(9, -4, 1, 'kekurangan selisih 4 tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `jenis_kriteria` set('core','secondary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `jenis_kriteria`) VALUES
(6, 'C1', 'Kedalaman Tanah', 'core'),
(7, 'C2', 'Kelembaban', 'core'),
(8, 'C3', 'Tekstur Tanah', 'core'),
(9, 'C4', 'Temperatur', 'secondary'),
(16, 'C5', 'Bahan Kasar', 'core'),
(17, 'C6', 'Kematangan Gambut', 'core'),
(18, 'C7', 'Drainase', 'secondary'),
(19, 'C8', 'Bahaya Erosi', 'secondary'),
(20, 'C9', 'Ketebalan Gambut', 'core'),
(21, 'C10', 'Genangan/Bahaya Banjir', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `profil_standar`
--

CREATE TABLE `profil_standar` (
  `id_profil` int(11) NOT NULL,
  `kode_alternatif` varchar(30) NOT NULL,
  `kode_kriteria` varchar(30) NOT NULL,
  `nilai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_standar`
--

INSERT INTO `profil_standar` (`id_profil`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(381, 'TNM001', 'C1', 4),
(382, 'TNM001', 'C2', 3),
(383, 'TNM001', 'C3', 4),
(384, 'TNM001', 'C4', 2),
(385, 'TNM001', 'C5', 4),
(386, 'TNM001', 'C6', 3),
(387, 'TNM001', 'C7', 2),
(388, 'TNM001', 'C8', 4),
(389, 'TNM001', 'C9', 4),
(390, 'TNM001', 'C10', 4),
(391, 'TNM002', 'C1', 1),
(392, 'TNM002', 'C2', 2),
(393, 'TNM002', 'C3', 3),
(394, 'TNM002', 'C4', 3),
(395, 'TNM002', 'C5', 2),
(396, 'TNM002', 'C6', 4),
(397, 'TNM002', 'C7', 1),
(398, 'TNM002', 'C8', 2),
(399, 'TNM002', 'C9', 2),
(400, 'TNM002', 'C10', 4),
(401, 'TNM003', 'C1', 4),
(402, 'TNM003', 'C2', 3),
(403, 'TNM003', 'C3', 1),
(404, 'TNM003', 'C4', 2),
(405, 'TNM003', 'C5', 2),
(406, 'TNM003', 'C6', 3),
(407, 'TNM003', 'C7', 4),
(408, 'TNM003', 'C8', 1),
(409, 'TNM003', 'C9', 1),
(410, 'TNM003', 'C10', 3),
(411, 'TNM004', 'C1', 3),
(412, 'TNM004', 'C2', 1),
(413, 'TNM004', 'C3', 3),
(414, 'TNM004', 'C4', 4),
(415, 'TNM004', 'C5', 1),
(416, 'TNM004', 'C6', 1),
(417, 'TNM004', 'C7', 1),
(418, 'TNM004', 'C8', 4),
(419, 'TNM004', 'C9', 2),
(420, 'TNM004', 'C10', 4),
(421, 'TNM005', 'C1', 4),
(422, 'TNM005', 'C2', 2),
(423, 'TNM005', 'C3', 1),
(424, 'TNM005', 'C4', 2),
(425, 'TNM005', 'C5', 1),
(426, 'TNM005', 'C6', 1),
(427, 'TNM005', 'C7', 1),
(428, 'TNM005', 'C8', 4),
(429, 'TNM005', 'C9', 3),
(430, 'TNM005', 'C10', 3),
(431, 'TNM006', 'C1', 1),
(432, 'TNM006', 'C2', 3),
(433, 'TNM006', 'C3', 3),
(434, 'TNM006', 'C4', 2),
(435, 'TNM006', 'C5', 4),
(436, 'TNM006', 'C6', 3),
(437, 'TNM006', 'C7', 3),
(438, 'TNM006', 'C8', 4),
(439, 'TNM006', 'C9', 2),
(440, 'TNM006', 'C10', 3),
(441, 'TNM007', 'C1', 2),
(442, 'TNM007', 'C2', 3),
(443, 'TNM007', 'C3', 4),
(444, 'TNM007', 'C4', 1),
(445, 'TNM007', 'C5', 3),
(446, 'TNM007', 'C6', 4),
(447, 'TNM007', 'C7', 2),
(448, 'TNM007', 'C8', 4),
(449, 'TNM007', 'C9', 3),
(450, 'TNM007', 'C10', 4),
(451, 'TNM008', 'C1', 4),
(452, 'TNM008', 'C2', 1),
(453, 'TNM008', 'C3', 4),
(454, 'TNM008', 'C4', 2),
(455, 'TNM008', 'C5', 1),
(456, 'TNM008', 'C6', 2),
(457, 'TNM008', 'C7', 2),
(458, 'TNM008', 'C8', 3),
(459, 'TNM008', 'C9', 1),
(460, 'TNM008', 'C10', 1),
(461, 'TNM009', 'C1', 1),
(462, 'TNM009', 'C2', 3),
(463, 'TNM009', 'C3', 4),
(464, 'TNM009', 'C4', 4),
(465, 'TNM009', 'C5', 4),
(466, 'TNM009', 'C6', 3),
(467, 'TNM009', 'C7', 2),
(468, 'TNM009', 'C8', 3),
(469, 'TNM009', 'C9', 3),
(470, 'TNM009', 'C10', 4),
(471, 'TNM010', 'C1', 3),
(472, 'TNM010', 'C2', 3),
(473, 'TNM010', 'C3', 4),
(474, 'TNM010', 'C4', 1),
(475, 'TNM010', 'C5', 3),
(476, 'TNM010', 'C6', 4),
(477, 'TNM010', 'C7', 2),
(478, 'TNM010', 'C8', 2),
(479, 'TNM010', 'C9', 2),
(480, 'TNM010', 'C10', 4),
(481, 'TNM011', 'C1', 3),
(482, 'TNM011', 'C2', 4),
(483, 'TNM011', 'C3', 1),
(484, 'TNM011', 'C4', 3),
(485, 'TNM011', 'C5', 4),
(486, 'TNM011', 'C6', 3),
(487, 'TNM011', 'C7', 1),
(488, 'TNM011', 'C8', 3),
(489, 'TNM011', 'C9', 3),
(490, 'TNM011', 'C10', 3),
(491, 'TNM012', 'C1', 2),
(492, 'TNM012', 'C2', 1),
(493, 'TNM012', 'C3', 4),
(494, 'TNM012', 'C4', 3),
(495, 'TNM012', 'C5', 4),
(496, 'TNM012', 'C6', 4),
(497, 'TNM012', 'C7', 1),
(498, 'TNM012', 'C8', 4),
(499, 'TNM012', 'C9', 1),
(500, 'TNM012', 'C10', 3),
(501, 'TNM013', 'C1', 2),
(502, 'TNM013', 'C2', 2),
(503, 'TNM013', 'C3', 3),
(504, 'TNM013', 'C4', 3),
(505, 'TNM013', 'C5', 4),
(506, 'TNM013', 'C6', 2),
(507, 'TNM013', 'C7', 3),
(508, 'TNM013', 'C8', 1),
(509, 'TNM013', 'C9', 3),
(510, 'TNM013', 'C10', 4),
(511, 'TNM014', 'C1', 2),
(512, 'TNM014', 'C2', 1),
(513, 'TNM014', 'C3', 4),
(514, 'TNM014', 'C4', 4),
(515, 'TNM014', 'C5', 4),
(516, 'TNM014', 'C6', 1),
(517, 'TNM014', 'C7', 2),
(518, 'TNM014', 'C8', 3),
(519, 'TNM014', 'C9', 3),
(520, 'TNM014', 'C10', 4),
(521, 'TNM015', 'C1', 1),
(522, 'TNM015', 'C2', 1),
(523, 'TNM015', 'C3', 4),
(524, 'TNM015', 'C4', 2),
(525, 'TNM015', 'C5', 3),
(526, 'TNM015', 'C6', 3),
(527, 'TNM015', 'C7', 3),
(528, 'TNM015', 'C8', 3),
(529, 'TNM015', 'C9', 2),
(530, 'TNM015', 'C10', 4),
(531, 'TNM016', 'C1', 2),
(532, 'TNM016', 'C2', 1),
(533, 'TNM016', 'C3', 2),
(534, 'TNM016', 'C4', 2),
(535, 'TNM016', 'C5', 3),
(536, 'TNM016', 'C6', 3),
(537, 'TNM016', 'C7', 3),
(538, 'TNM016', 'C8', 3),
(539, 'TNM016', 'C9', 4),
(540, 'TNM016', 'C10', 3),
(541, 'TNM017', 'C1', 1),
(542, 'TNM017', 'C2', 1),
(543, 'TNM017', 'C3', 4),
(544, 'TNM017', 'C4', 4),
(545, 'TNM017', 'C5', 2),
(546, 'TNM017', 'C6', 3),
(547, 'TNM017', 'C7', 2),
(548, 'TNM017', 'C8', 3),
(549, 'TNM017', 'C9', 2),
(550, 'TNM017', 'C10', 4),
(551, 'TNM018', 'C1', 4),
(552, 'TNM018', 'C2', 4),
(553, 'TNM018', 'C3', 1),
(554, 'TNM018', 'C4', 3),
(555, 'TNM018', 'C5', 4),
(556, 'TNM018', 'C6', 3),
(557, 'TNM018', 'C7', 1),
(558, 'TNM018', 'C8', 4),
(559, 'TNM018', 'C9', 4),
(560, 'TNM018', 'C10', 3),
(561, 'TNM019', 'C1', 3),
(562, 'TNM019', 'C2', 1),
(563, 'TNM019', 'C3', 4),
(564, 'TNM019', 'C4', 2),
(565, 'TNM019', 'C5', 4),
(566, 'TNM019', 'C6', 3),
(567, 'TNM019', 'C7', 2),
(568, 'TNM019', 'C8', 4),
(569, 'TNM019', 'C9', 1),
(570, 'TNM019', 'C10', 3),
(571, 'TNM020', 'C1', 2),
(572, 'TNM020', 'C2', 3),
(573, 'TNM020', 'C3', 2),
(574, 'TNM020', 'C4', 3),
(575, 'TNM020', 'C5', 2),
(576, 'TNM020', 'C6', 2),
(577, 'TNM020', 'C7', 2),
(578, 'TNM020', 'C8', 2),
(579, 'TNM020', 'C9', 2),
(580, 'TNM020', 'C10', 4),
(581, 'TNM021', 'C1', 4),
(582, 'TNM021', 'C2', 2),
(583, 'TNM021', 'C3', 2),
(584, 'TNM021', 'C4', 1),
(585, 'TNM021', 'C5', 1),
(586, 'TNM021', 'C6', 1),
(587, 'TNM021', 'C7', 2),
(588, 'TNM021', 'C8', 4),
(589, 'TNM021', 'C9', 4),
(590, 'TNM021', 'C10', 4),
(591, 'TNM022', 'C1', 4),
(592, 'TNM022', 'C2', 3),
(593, 'TNM022', 'C3', 4),
(594, 'TNM022', 'C4', 3),
(595, 'TNM022', 'C5', 4),
(596, 'TNM022', 'C6', 3),
(597, 'TNM022', 'C7', 1),
(598, 'TNM022', 'C8', 3),
(599, 'TNM022', 'C9', 2),
(600, 'TNM022', 'C10', 1),
(601, 'TNM023', 'C1', 1),
(602, 'TNM023', 'C2', 2),
(603, 'TNM023', 'C3', 4),
(604, 'TNM023', 'C4', 3),
(605, 'TNM023', 'C5', 1),
(606, 'TNM023', 'C6', 4),
(607, 'TNM023', 'C7', 2),
(608, 'TNM023', 'C8', 4),
(609, 'TNM023', 'C9', 3),
(610, 'TNM023', 'C10', 4),
(611, 'TNM024', 'C1', 1),
(612, 'TNM024', 'C2', 1),
(613, 'TNM024', 'C3', 4),
(614, 'TNM024', 'C4', 1),
(615, 'TNM024', 'C5', 1),
(616, 'TNM024', 'C6', 3),
(617, 'TNM024', 'C7', 2),
(618, 'TNM024', 'C8', 4),
(619, 'TNM024', 'C9', 4),
(620, 'TNM024', 'C10', 2),
(621, 'TNM025', 'C1', 3),
(622, 'TNM025', 'C2', 1),
(623, 'TNM025', 'C3', 4),
(624, 'TNM025', 'C4', 4),
(625, 'TNM025', 'C5', 1),
(626, 'TNM025', 'C6', 3),
(627, 'TNM025', 'C7', 4),
(628, 'TNM025', 'C8', 1),
(629, 'TNM025', 'C9', 3),
(630, 'TNM025', 'C10', 4),
(631, 'TNM026', 'C1', 2),
(632, 'TNM026', 'C2', 1),
(633, 'TNM026', 'C3', 3),
(634, 'TNM026', 'C4', 3),
(635, 'TNM026', 'C5', 3),
(636, 'TNM026', 'C6', 4),
(637, 'TNM026', 'C7', 1),
(638, 'TNM026', 'C8', 3),
(639, 'TNM026', 'C9', 3),
(640, 'TNM026', 'C10', 3),
(641, 'TNM027', 'C1', 4),
(642, 'TNM027', 'C2', 4),
(643, 'TNM027', 'C3', 3),
(644, 'TNM027', 'C4', 3),
(645, 'TNM027', 'C5', 1),
(646, 'TNM027', 'C6', 3),
(647, 'TNM027', 'C7', 4),
(648, 'TNM027', 'C8', 3),
(649, 'TNM027', 'C9', 1),
(650, 'TNM027', 'C10', 4),
(651, 'TNM028', 'C1', 2),
(652, 'TNM028', 'C2', 1),
(653, 'TNM028', 'C3', 3),
(654, 'TNM028', 'C4', 3),
(655, 'TNM028', 'C5', 3),
(656, 'TNM028', 'C6', 1),
(657, 'TNM028', 'C7', 1),
(658, 'TNM028', 'C8', 3),
(659, 'TNM028', 'C9', 1),
(660, 'TNM028', 'C10', 4),
(661, 'TNM029', 'C1', 2),
(662, 'TNM029', 'C2', 1),
(663, 'TNM029', 'C3', 3),
(664, 'TNM029', 'C4', 3),
(665, 'TNM029', 'C5', 3),
(666, 'TNM029', 'C6', 4),
(667, 'TNM029', 'C7', 3),
(668, 'TNM029', 'C8', 1),
(669, 'TNM029', 'C9', 3),
(670, 'TNM029', 'C10', 3),
(671, 'TNM030', 'C1', 2),
(672, 'TNM030', 'C2', 1),
(673, 'TNM030', 'C3', 2),
(674, 'TNM030', 'C4', 4),
(675, 'TNM030', 'C5', 4),
(676, 'TNM030', 'C6', 3),
(677, 'TNM030', 'C7', 2),
(678, 'TNM030', 'C8', 4),
(679, 'TNM030', 'C9', 1),
(680, 'TNM030', 'C10', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsul`
--

CREATE TABLE `tb_konsul` (
  `kode_konsul` varchar(11) NOT NULL,
  `nama_konsul` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `hasil` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$2y$10$b6sbD3g5iOCSMQUlTf1m0eMYWSrJAD8Dr1FjaB.itZEjWrRUBUQuW', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `profil_standar`
--
ALTER TABLE `profil_standar`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_konsul`
--
ALTER TABLE `tb_konsul`
  ADD PRIMARY KEY (`kode_konsul`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profil_standar`
--
ALTER TABLE `profil_standar`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
