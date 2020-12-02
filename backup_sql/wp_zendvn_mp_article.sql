-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 07:49 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordpress4`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_zendvn_mp_article`
--

CREATE TABLE IF NOT EXISTS `wp_zendvn_mp_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `wp_zendvn_mp_article`
--

INSERT INTO `wp_zendvn_mp_article` (`id`, `title`, `slug`, `picture`, `content`, `author_id`, `status`) VALUES
(1, 'Hàn Quốc vô địch, Thái Lan trắng tay tại ASIAD 17', 'han-quoc-vo-dich-thai-lan-trang-tay-tai-asiad-17', 'picture001.png', 'Bàn thắng vàng ở phút 120+2 giúp Hàn Quốc giành chiến thắng nghẹt thở 1-0 trước CHDCND Triều Tiên ở trận chung kết. Trong khi đó Iraq đánh bại Thái Lan với cùng tỷ số để đoạt HCĐ.', 1, 0),
(2, 'Messi Hàn Quốc dẫn đầu bộ tứ siêu đẳng đối đầu U19 Việt Nam', 'messi-han-quoc-dan-dau-bo-tu-sieu-dang-doi-dau-u19-viet-nam', 'picture002.png', 'Liên đoàn bóng đá Hàn Quốc (KFA) đã công bố đội hình 23 cầu thủ đội U19 chuẩn bị cho giải châu Á sắp tới. Họ tự tin cho rằng đây là đội hình mạnh nhất từ trước đến nay.', 1, 1),
(3, 'Niềm vui nhân đôi của chàng thủ quân Olympic Việt Nam', 'niem-vui-nhan-doi-cua-chang-thu-quan-olympic-viet-nam', 'picture003.png', 'Thi đấu ấn tượng tại Asian Games 17, được triệu tập vào đội tuyển Việt Nam tham dự chuyến tập huấn Nhật Bản, tiền vệ Ngô Hoàng Thịnh còn nhận thêm tin vui từ gia đình.', 2, 1),
(4, 'ĐT U19 Việt Nam sẽ tạo bất ngờ cho đối thủ', 'dt-u19-viet-nam-se-tao-bat-ngo-cho-doi-thu', 'picture004.png', 'Dù nằm ở bảng đấu được coi là “tử thần” tại VCK U19 châu Á 2014, nhưng U19 Việt Nam đã và đang chuẩn bị những món quà bất ngờ dành cho các “đại gia” đến từ Đông Á.', 1, 1),
(5, 'Đối thủ của U19 VN chỉ cần 5 ngày chuẩn bị cho giải châu Á', 'doi-thu-cua-u19-vn-chi-can-5-ngay-chuan-bi-cho-giai-chau-a', 'picture005.png', 'Hôm 29/9 vừa qua, tuyển U19 Nhật Bản đã tập trung trở lại để chuẩn bị cho VCK U19 châu Á sẽ khởi tranh trong ít ngày tới tại Myanmar.', 3, 1),
(6, ' Lịch thi đấu của U19 Việt Nam tại VCK châu Á 2014', 'lich-thi-dau-cua-u19-viet-nam-tai-vck-chau-a-2014', 'picture006.png', 'Dù có được lịch thi đấu thuận lợi thì thầy trò HLV Graechen vẫn sẽ gặp rất nhiều khó khăn khi nằm ở bảng đấu tử thần cùng với U19 Hàn Quốc, Nhật Bản và Trung Quốc.', 1, 1),
(7, 'U19 Australia nhắm vé dự giải U20 thế giới', 'u19-australia-nham-ve-du-giai-u20-the-gioi', 'picture007.png', 'HLV Paul Okon của U19 Australia đã chốt danh sách 23 cầu thủ dự VCK U19 châu Á diễn ra tại Myanmar tháng 10 tới với mục tiêu giành quyền tham dự giải U20 thế giới 2015.', 1, 0),
(8, 'Tuấn Anh trở lại tập luyện, hoàn tất giáo án nặng', 'tuan-anh-tro-lai-tap-luyen-hoan-tat-giao-an-nang', 'picture008.png', 'Chấn thương đầu gối của Tuấn Anh đã bình phục hoàn toàn, tiền vệ trụ cột trở lại tập luyện cùng các đồng đội U19 Việt Nam từ sáng qua (29/9).', 2, 1),
(9, 'Bổ sung HLV ngoại chuyên về thể lực cho U19 Việt Nam', 'bo-sung-hlv-ngoai-chuyen-ve-the-luc-cho-u19-viet-nam', 'picture009.png', 'Các cầu thủ U19 VN liên tiếp gặp phải những chấn thương trên sân cỏ vì điểm yếu về thể lực. Bầu Đức sẽ tuyển thêm một HLV thể lực người Pháp làm trợ lý cho HLV Graechen.', 1, 0),
(10, 'Công Phượng lập cú đúp vào lưới đội hình hai U19 VN', 'cong-phuong-lap-cu-dup-vao-luoi-doi-hinh-hai-u19-vn', 'picture010.png', 'Để giảm bớt sự nhàm chán sau hơn 1 tuần tập luyện tại Hàm Rồng, HLV Graechen đã chia đội hình U19 Việt Nam làm đôi để tổ chức một trận thi đấu đối kháng.', 3, 0),
(11, 'Bầu Đức tuyển sinh gà nòi tiếp bước đàn anh ở U19 Việt Nam', 'bau-duc-tuyen-sinh-ga-noi-tiep-buoc-dan-anh-o-u19-viet-nam', 'picture011.png', 'Học viện HAGL Arsenal-JMG của bầu Đức tiếp tục tuyển sinh cầu thủ nhí cho khóa 3 và 4 để tiếp nối các đàn anh Công Phượng, Tuấn Anh, Xuân Trường... đang thi đấu thành công ở U19 VN', 2, 0),
(12, 'Cầu thủ người Gia Rai trở lại thi đấu cho U19 Việt Nam', 'cau-thu-nguoi-gia-rai-tro-lai-thi-dau-cho-u19-viet-nam', 'picture012.png', 'Theo quy định của AFC, các đội tham dự VCK U19 châu Á sẽ được đăng ký thêm 3 cầu thủ so với số lượng đăng ký tại giải U19 Đông Nam Á vừa diễn ra tại Hà Nội.', 1, 1),
(14, 'HLV Graechen: ''Học trò của tôi đủ sức đá V.League''', 'hlv-graechen-hoc-tro-cua-toi-du-suc-da-vleague', 'picture014.png', 'HLV Guillaume Graechen tự tin nói rằng các học trò của ông luôn biết cách để tránh xa những cám dỗ, đứng vững trên con đường trở thành cầu thủ chuyên nghiệp', 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
