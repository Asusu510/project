-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 04:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_hot` tinyint(4) NOT NULL DEFAULT 0,
  `a_status` tinyint(4) NOT NULL DEFAULT 1,
  `a_menu_id` int(11) NOT NULL DEFAULT 0,
  `a_view` int(11) NOT NULL DEFAULT 0,
  `a_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `a_name`, `a_slug`, `a_hot`, `a_status`, `a_menu_id`, `a_view`, `a_description`, `a_avatar`, `a_content`, `created_at`, `updated_at`) VALUES
(1, 'Bài viết mới', 'bai-viet-moi', 0, 1, 2, 0, '<p>Sed a sapien in tellus fringilla vestibulum. Sed elementum nisl eget turpis pharetra, vel posuere felis volutpat. Sed elementum enim nulla, ac molestie orci sollicitudin ac. Cras vitae purus lacus. Pellentesque vel urna id nibh vehicula sagittis eget in turpis. Fusce semper pellentesque lacus. In augue augue, commodo sit amet turpis sit amet, posuere faucibus nunc. Morbi justo ipsum, tincidunt viverra augue sed, blandit gravida felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin vel magna libero. In varius venenatis libero, eget commodo augue tincidunt id. Proin sem nulla, faucibus id risus vel, vestibulum rhoncus tellus. Morbi maximus pretium nisl.</p>\r\n<p>Donec faucibus enim vitae volutpat sollicitudin. Mauris gravida nulla turpis, sit amet feugiat magna laoreet nec. Phasellus ut velit at tortor euismod placerat. Sed vulputate quam vel convallis convallis. Fusce gravida maximus elit non ullamcorper. Integer urna nunc, vehicula eu elit pharetra, condimentum tempor justo. Proin ac laoreet enim. Cras a lectus sit amet lacus ornare iaculis id sit amet ante.</p>\r\n<p><span class=\"style-italic\">Donec faucibus enim vitae volutpat sollicitudin. Mauris gravida nulla turpis, sit amet feugiat magna laoreet nec. Phasellus ut velit at tortor euismod placerat. Sed vulputate quam vel convallis convallis. Fusce gravida maximus elit non ullamcorper. Integer urna nunc, vehicula eu elit pharetra</span></p>\r\n<p>Fusce semper pellentesque lacus. In augue augue, commodo sit amet turpis sit amet, posuere faucibus nunc. Morbi justo ipsum, tincidunt viverra augue sed, blandit gravida felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin vel magna libero. In varius venenatis libero, eget commodo augue tincidunt id. Proin sem nulla, faucibus id risus vel, vestibulum rhoncus tellus. Morbi maximus pretium nisl.</p>', '1.jpg', NULL, '2020-09-29 05:45:53', '2020-09-29 07:00:44'),
(2, 'Chương trình khuyến mại', 'chuong-trinh-khuyen-mai', 1, 1, 2, 0, '<div class=\"ttm-box-desc-text\">\r\n<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n</div>\r\n<div class=\"mt-20\">\r\n<p>Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placerat sem mi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n</div>\r\n<h4>Less for this away much</h4>\r\n<p>Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placerat sem mi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n<blockquote>Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ort. Proin viverra.</blockquote>\r\n<p>Dummy, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauenim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placat semmi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n<div class=\"mt-30\"><img class=\"img-fluid alignleft\" src=\"http://localhost:88/project_sem_I/public/assets/images/single-img-two.jpg\" alt=\"\">\r\n<h5>Beneficial Strategies</h5>\r\n<p>Proin viverra nisi at nisl imperdiet auctnec ornare, estsed tincidunare tincidunt. trisutincidat,<br>senibeget.</p>\r\n<ul class=\"ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor pt-5\">\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Quisque aliquet nibh sit amet lectus auctor.</span></li>\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Nulla at metus ultricies, placerat augue sed.</span></li>\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Curabitur mollis ex vestibulum, ullamcorper.</span></li>\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Quisque aliquet nibh sit amet lectus aucto.</span></li>\r\n</ul>\r\n</div>\r\n<p></p>\r\n<div class=\"ttm-blogbox-desc-footer\">\r\n<div class=\"ttm-blogbox-footer-readmore\"></div>\r\n</div>\r\n<p></p>\r\n<div class=\"mt-30\">\r\n<h4>Why Integrate Side Projects?</h4>\r\n</div>\r\n<p><span>Suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placerat sem mi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</span><span>.</span></p>', '17-Blog2.png', NULL, '2020-09-29 05:47:13', '2020-09-29 07:19:24'),
(4, 'giới thiệu sản phẩm', 'gioi-thieu-san-pham', 1, 1, 5, 0, '<div class=\"ttm-box-desc-text\">\r\n<p>Mauris id enim id purus ornare tincidunt. Aenean vel consequat risus. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim sem at sem. Fusce tempus ex nibh, eget vulputate ligula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n</div>\r\n<div class=\"mt-20\">\r\n<p>Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placerat sem mi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n</div>\r\n<h4>Less for this away much</h4>\r\n<p>Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placerat sem mi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n<blockquote>Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ort. Proin viverra.</blockquote>\r\n<p>Dummy, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauenim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placat semmi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n<div class=\"mt-30\"><img class=\"img-fluid alignleft\" src=\"file:///D:/Template/tools/images/single-img-two.jpg\" alt=\"\">\r\n<h5>Beneficial Strategies</h5>\r\n<p>Proin viverra nisi at nisl imperdiet auctnec ornare, estsed tincidunare tincidunt. trisutincidat,<br>senibeget.</p>\r\n<ul class=\"ttm-list ttm-list-style-icon ttm-list-icon-color-skincolor pt-5\">\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Quisque aliquet nibh sit amet lectus auctor.</span></li>\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Nulla at metus ultricies, placerat augue sed.</span></li>\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Curabitur mollis ex vestibulum, ullamcorper.</span></li>\r\n<li><span class=\"fa fa-check\"></span><span class=\"ttm-list-li-content\">Quisque aliquet nibh sit amet lectus aucto.</span></li>\r\n</ul>\r\n</div>\r\n<div class=\"mt-30\">\r\n<h4>Why Integrate Side Projects?</h4>\r\n<p>Suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at Donec ornare, est sed tincidunt placerat, sem mi suscipit mi, at varius enim Mauris ienim id purus ornare tincidunt. Aenean vel consequat riss. Proin viverra nisi at nisl imperdiet auctor. Donec ornare, esed tincidunt placerat sem mi suscipit mi, at varius enim sem at sem. Fuce tempus ex nibh, eget vlputate lgula ornare eget. Nunc facilisis erat at ligula blandit tempor. maecenas</p>\r\n</div>', '8%20(1).jpg', NULL, '2020-09-29 06:55:21', '2020-09-29 07:19:20'),
(6, 'cuối tuần mặc gì chơi', 'cuoi-tuan-mac-gi-choi', 1, 1, 1, 0, '<div class=\"head-detail_blog\">\r\n<h1>CUỐI TUẦN MẶC GÌ ĐI CHƠI</h1>\r\n<span class=\"date-detail\"></span></div>\r\n<div class=\"nd\">\r\n<p>Mùa hè luôn là thời điểm nắng nóng khiến các chàng trai luôn mong muốn tìm được cho mình một item thoải mái nhưng lại đầy cuốn hút trong mắt người đối diện, điều đấy sẽ không hề khó khi các chàng trai tin tưởng và lựa chọn thương hiệu H2T <br><br>Một số ý tưởng sau đây đến từ các stylist nhà H2T hy vọng sẽ định hình được phong cách mà các chàng trai đang theo đuổi hoặc sẽ thay đổi để bắt kịp xu hướng thời trang hiện nay<br><br>Với những mẫu Polo lịch lãm được kết hợp cùng quần short hy vọng sẽ đem lại cho các chàng trai một set đồ perfect.</p>\r\n<p><img src=\"https://h2tstore.vn/media/news/1706__26A3962.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3958.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3953.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3945.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3934.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3947.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3931.jpg\" alt=\"\" width=\"1000\" height=\"1000\"><img src=\"https://h2tstore.vn/media/news/1706__26A3939.jpg\" alt=\"\" width=\"1000\" height=\"1000\"></p>\r\n</div>', '5.jpg', NULL, '2020-09-29 07:00:32', '2020-09-29 07:01:59'),
(9, 'Đừng tiếc Chi mạnh tay cho 48 mẫu Áo Khoác Parka Cực Ấm, Ưa Chuộng nhất mùa Lạnh này', 'dung-tiec-chi-manh-tay-cho-48-mau-ao-khoac-parka-cuc-am-ua-chuong-nhat-mua-lanh-nay', 0, 1, 5, 0, '<p lang=\"zxx\" align=\"JUSTIFY\"><span><a href=\"https://h2tshop.com/ao-khoac-nam.html\">Áo Khoác Parka</a> thường được gọi với cái tên “bình dân” là áo khoác Bắc Cực hay Anorak là trang phục tốt nhất để chống lại cái rét buốt của khí hậu những ngày đại hàn. Áo được làm từ các loại vải không thấm nước và có độ dài dao động trong khoảng từ thắt lưng tới đầu gối. Những chiếc <strong>áo khoác Parka</strong> của <a href=\"https://h2tshop.com/\">H2T</a> được thiết kế hơi rộng, đem lại cảm giác thoải mái, phóng khoáng và một chút “bụi phủi” mang đậm chất du mục cho người mặc. Đừng tiếc chi mạnh tay cho 1 in 48 mẫu Áo Khoác Parka \"Cực\" ấm Ưa Chuộng nhất mùa Lạnh này nhé bởi bạn sẽ không bao giờ thất vọng đâu!</span></p>\r\n<ul>\r\n<li lang=\"zxx\"><span><strong>Áo Khoác Parka là gì?</strong></span></li>\r\n</ul>\r\n<p lang=\"zxx\" align=\"JUSTIFY\">Có nguồn gốc từ loại áo chống rét của người Eskimo, áo parka rất được ưu ái trong những ngày đại hàn bởi khả năng giữ ấm tuyệt vời. Đặc điểm của chiếc áo khoác này tại H2T là được cắt may rộng rãi, có thể có mũ và lớp lót lông bên trong, thường gắn liền với các gam màu trầm, quân đội như xanh khaki, nâu, đen... Item này rất được ưa chuộng ở các nước xứ lạnh bởi ngoài khả năng giữ ấm tương đối tốt, nó còn mang lại nét phóng khoáng, thoải mái cho người mặc.</p>\r\n<p lang=\"zxx\" align=\"JUSTIFY\">Để chống chọi hiệu quả với cái rét ẩm của miền Bắc, bạn nên diện những chiếc áo dày dặn bên trong như len vặn thừng để giữ ấm tuyệt đối cho cơ thể. Cũng nên chọn áo trong có gam màu tương phản với áo parka để trang phục thêm nổi bật hơn trong các mẫu dưới đây của H2T nhé.</p>\r\n<p lang=\"zxx\" align=\"JUSTIFY\"><span><strong>Áo Khoác Parka - TOP áo khoác nam được yêu thích nhất tại H2T</strong></span></p>\r\n<p class=\"p1\">Nếu có một lời khuyên dành cho bạn ngay khi tiết trời đang sang thu vào đông này thì đó là: Đừng ngại chi tiền cho những chiếc áo khoác chất lượng! Có thể nói không một món đồ nào quan trọng và đáng đầu tư hơn một chiếc áo khoác ấm khi trời chuyển lạnh. Để chọn được chiếc áo khoác tốt và phù hợp nhất bạn nên ưu tiên 3 tiêu chí: chất liệu, kiểu dáng và sự tiện dụng. Vì sao chất liệu cần được đặt lên hàng đầu? Bởi một chiếc áo khoác có chất liệu tốt sẽ thể hiện khả năng giữ ấm tuyệt vời của nó. Mà trời lạnh thì không gì quý giá hơn sự ấm áp phải không?</p>\r\n<p class=\"p1\"><span><strong>1. Áo parka nam AK-0549</strong></span></p>\r\n<p class=\"p1\"><img src=\"https://h2tshop.com/media/product/2446_36_1.jpg\" alt=\"\" width=\"800\" height=\"800\"></p>\r\n<p class=\"p1\">Dáng áo parka này giữ ấm cực tốt. Kiểu dáng trẻ trung, tiện lợi phù hợp với thời trang dạo phố thường ngày là điểm mạnh của áo parka. Chất liệu gió bên ngoài cùng lớp lót ấm áp bên trong giúp bạn có thể sống sót qua mùa đông khắc nghiệt nhất.</p>\r\n<p class=\"p1\"><span><strong>&gt;&gt;&gt; Chi tiết SP: <a href=\"https://h2tshop.com/ao-parka-nam-ak-0549.html\">Áo parka nam AK-0549</a></strong></span></p>\r\n<p class=\"p1\"><span><strong>2. Parka kaki zanzi AK-0486</strong></span></p>\r\n<p class=\"p1\"><img src=\"https://h2tshop.com/media/product/2390_27_1.jpg\" alt=\"\" width=\"800\" height=\"800\"></p>\r\n<p class=\"p1\">Áo thường được đệm lớp bông dày, với mũ to bản có viền lông, là vũ khí chống gió rét, mưa nhỏ rất tốt. Parka xanh quân đội vẫn luôn là màu sắc được phái mạnh ưa chộng nhất bên cạnh những màu sắc khác cũng như xanh hải quân, đen, xám… Chúng dễ kết hợp với các trang phục khác như áo bò, vest, sơ mi, áo phông…</p>\r\n<p class=\"p1\"><span><strong>&gt;&gt;&gt; Chi tiết SP:<a href=\"https://h2tshop.com/parka-kaki-zanzi-ak-0486.html\"> Parka kaki zanzi AK-0486</a></strong></span></p>\r\n<p class=\"p1\"><strong><span>3. Parka gió nam AP-0527</span></strong></p>\r\n<p><img src=\"https://h2tshop.com/media/product/2404_14_1.jpg\" alt=\"\" width=\"800\" height=\"800\"></p>\r\n<p>Áo Parka nam thường được giới trẻ lựa chọn cho mình vào mùa đông. Nếu bạn là tín đồ thời trang thì chắc chắn không thể thiếu áo <strong>Parka gió nam AP-0527</strong> này trong tủ đồ của bạn. Với <strong>Chất liệu </strong>Vải gió cao cấp, chống thấm nước tới 90%, trần bông ấm áp, thiết kế trẻ trung năng động, bo thun ở cổ tay, túi to 2 bên rất tiện lợi cho người mặc.</p>\r\n<p><span><strong>&gt;&gt;&gt; Chi tiết SP: <a href=\"https://h2tshop.com/parka-gio-nam-ap-0527.html\">Parka gió nam AP-0527</a></strong></span></p>\r\n<p><strong><span>4. Parka zanzi lót lông cao cấp AK-0520</span></strong></p>\r\n<p><img src=\"https://h2tshop.com/media/product/2397_1_1.jpg\" alt=\"\" width=\"800\" height=\"800\"></p>\r\n<p>Đúng như tên gọi của nó, áo có lớp ngoài vải gió cao cấp cùng mix da mang đến vẻ cá tính, thời thượng cho các chàng trai. Ngoài ra, lớp lót lông dạy dặn bên trong sẽ giúp các chàng cực ấm áp trong những thời tiết lạnh hay cực lạnh đấy. Chàng có thể mix cùng <a href=\"https://h2tshop.com/ao-thun.html\">áo len, áo thun</a><span> </span>cùng<span> </span><a href=\"https://h2tshop.com/quan-nam/c37.html\">quần hộp<span> </span></a>cùng tông màu zanzi hay<a href=\"https://h2tshop.com/quan-bo-nam/c5.html\"><span> </span>quần jean</a><span> </span>tối màu là đã cực chất rồi. </p>\r\n<p><span><strong>&gt;&gt;&gt; Chi tiết SP:<a href=\"https://h2tshop.com/parka-zanzi-lot-long-cao-cap-ak-0520.html\"> Parka zanzi lót lông cao cấp AK-0520</a></strong></span></p>\r\n<p><span><strong>5. Áo parka kaki AK-0489</strong></span></p>\r\n<p><img src=\"https://h2tshop.com/media/product/2375_32_1.jpg\" alt=\"\" width=\"800\" height=\"800\"></p>\r\n<p>Chất liệu kaki dày dặn kèm lót lông ấm áp cũng là một trong số những áo khoác Parka nam cực hot cho những ngày lạnh. Bạn thấy đấy, chiếc áo này cực dễ mặc và mix đồ cho những chàng trai hay cả những cô gái yêu thích phong cách cá tính, chất chơi. </p>\r\n<p><span><strong>&gt;&gt;&gt; Chi tiết SP: <a href=\"https://h2tshop.com/ao-parka-kaki-ak-0489.html\">Áo parka kaki AK-0489</a></strong></span></p>\r\n<p><strong><span>6. Áo Parka nam AK-0487</span></strong></p>\r\n<p><img src=\"https://h2tshop.com/media/product/2371_29_1.jpg\" alt=\"\" width=\"800\" height=\"800\"></p>\r\n<p>Bất chấp xu hướng thời trang thay đổi chóng mặt những chiếc <strong>Áo Parka nam AK-0487</strong> trải qua bao nhiêu mùa vẫn là một món đồ được giới trẻ ưa chuộng. <strong>Chất liệu</strong>: Kaki dày dặn, bên trong được trần 1 lớp bông ấm áp. <strong>Áo Parka nam AK-0487</strong> dài qua mông, chất liệu dày dặn phần mũ có lông, đặc biệt gây ấn tượng cho người mặc bằng phong cách cá tính, các khóa kéo được thiết kế bố trí tinh tế ở túi áo và phần trước ngực kết hợp với túi kéo khóa bên rất phù hợp với các chàng trai năng động.</p>\r\n<p><span><strong>&gt;&gt;&gt; Chi tiết SP: <a href=\"https://h2tshop.com/ao-parka-nam-ak-0487.html\">Áo Parka nam AK-0487</a></strong></span></p>\r\n<p>Parka không phải là xu hướng mới xuất hiện gần đây, chúng đã từng xuất hiện trên sàn catwalk từ những năm 2008-2009. Và cho tới nay, những chiếc áo parka vẫn luôn là cảm hứng sáng tạo cho các nhà thiết kế mỗi dịp Thu/Đông mới. Mùa Thu/Đông năm nay, H2T đã thổi một luồng gió mới cho áo parka khi tạo cho chúng những chi tiết và điểm nhấn rất mới lạ như:  với chi tiết đuôi tôm, phần lông đắp ở mũ, tay áo hay viền da tinh tế, màu sắc tươi sáng và rực rỡ hơn.</p>\r\n<p><span><strong>Bạn hãy Tiếp tục xem tại đây</strong>: </span></p>\r\n<ul>\r\n<li><span><a href=\"https://h2tshop.com/ao-khoac-nam.html\">42 mẫu Áo Khoác Parka \"Cực\" ấm Ưa Chuộng nhất mùa Lạnh này</a></span></li>\r\n<li><span><a href=\"https://h2tshop.com/top-99-mau-ao-khoac-jeans-nam-moi-nhat-2019-cho-cac-chang-trai-thoi-thuong.html\">TOP 99 Mẫu Áo Khoác Jeans nam mới nhất 2019 cho các chàng Trai Thời Thượng</a></span></li>\r\n</ul>', '107_h2t.png', NULL, '2020-09-29 07:09:04', NULL),
(10, 'Hướng dẫn cách giặt và bảo quản quần âu đúng cách', 'huong-dan-cach-giat-va-bao-quan-quan-au-dung-cach', 0, 1, 6, 0, '<div><strong>Quần âu cùng với <a href=\"https://h2tshop.com/so-mi-dai-tay/c11.html\">áo sơ mi nam</a> là các trang phục tạo nên vẻ lịch lãm của quý ông. Và việc làm sạch chúng cũng đòi hỏi rất nhiều kỳ công từ người dùng. </strong><br><strong>Thực tế hiện nay cho thấy, dù bạn có giữ gìn chiếc <a href=\"https://h2tshop.com/quan-au-nam/c7.html\">quần âu</a><span> </span>của mình như thế nào đi chăng nữa thì cũng không tránh được việc phải đem chúng đi giặt. Đối với nhiều loại quần tây có vải len thì nếu không chú ý trong việc giặt là sẽ khiến cho chiếc quần nhanh chóng bị phai màu, xù lông, biến dạng… Bài viết sau đây sẽ giúp bạn cách giặt và bảo quản quần âu sao cho bền đẹp nhất.</strong></div>\r\n<h2><span><strong>#1. Hạn chế giặt thường xuyên đối với quần âu</strong></span></h2>\r\n<div>Theo như các chuyên gia và nhà sản xuất thì quần tây chỉ nên giặt khi cần thiết, khoảng 2-3 lần trong tháng. Điều này sẽ giúp cho chiếc quần được bền màu hơn, chất liệu theo đó cũng được đảm bảo hơn.<br>Quần âu chủ yếu bao gồm chất liệu là cotton và linen bạn có thể lựa chọn giữa giặt khô hoặc giặt ướt đều được. Tuy nhiên, nếu lựa chọn giặt ướt thì bạn nên giặt bằng tay để chiếc quần được bền đẹp hơn. Nguyên nhân là bởi khi giặt tay thì phần nào chiếc quần âu sẽ không bị vò nhiều lần như máy giặt, qua đó đảm bảo chiếc quần được giữ dáng tốt hơn.<br><br><a class=\"fancy_image\" href=\"https://jpcleaning.com.vn/images/2018/04/26/hot.gif\" rel=\"fancy_gallery\"><img src=\"https://jpcleaning.com.vn/images/2018/04/26/hot.gif\" alt=\"\"></a><em><strong><a href=\"http://h2tshop.com/7-bien-tau-giup-quy-ong-dien-so-mi-ca-tuan-khong-chan/a98.html\">7 biến tấu giúp quý ông diện sơ mi cả tuần không chán</a></strong></em></div>\r\n<div><br><img src=\"https://h2tshop.com/media/product/1242_16_7.jpg\" alt=\"\"></div>\r\n<div>\r\n<h1 class=\"h-title left\"><span><em><a href=\"https://h2tshop.com/quan-au-nam-q-1640/p1242.html\">Quần âu nam Q - 1640</a> - H2TShop</em></span></h1>\r\n</div>\r\n<div><span><strong>#2. Hạn chế dùng nước xả vải và chất tẩy với quần âu</strong></span></div>\r\n<div> </div>\r\n<div>Trên mỗi chiếc quần đều có gắn các tag lưu ý về điều kiện cũng như <strong><a href=\"http://h2tshop.com/huong-dan-cach-su-dung-va-bao-quan-ao-da-tai-nha-h2t/a75.html\">hướng dẫn cách giặt</a></strong><span> </span>đối với từng loại quần tây. Đa phần trên mác đều đưa ra lời gợi ý đó là bạn nên dùng sữa tắm, xà phòng thay vì bột giặt để làm sạch quần âu. Đặc biệt, không được dùng các bột giặt có tính tẩy trắng cao để tránh làm bạc màu và sờn vải.<br>Đối với nước xả vải, hầu hết mọi người đều dùng trên đồ giặt của mình để chúng có mùi hương được thơm lâu. Tuy nhiên, mặt trái của việc sử dụng nước xả vải trên quần tây đó là làm vải nhanh mềm từ đó làm mất form ban đầu của quần.<br><br><strong>&gt;&gt;&gt; Xem thêm:</strong> <em><strong><a href=\"http://h2tshop.com/nhung-mon-do-co-ban-giup-dan-ong-tro-nen-quyen-ru/a100.html\">Những món đồ cơ bản giúp đàn ông trở nên quyến rũ</a></strong></em></div>\r\n<h2><span><strong>#3. Phơi quần âu nam đúng cách</strong></span></h2>\r\n<div>Quần tây là trang phục cực kỳ chú trọng tới việc giữ form dáng. Trong quá trình giặt và phơi, bạn nên chú ý không nên sấy, vắt kiệt chiếc quần khiến quần bị để lại vết nhàu trên vải. Trong quá trình phơi, bạn nên phơi ở phần đỉa của thắt lưng hoặc có thể gập đôi quần và vắt lên mắc quần áo. Khi phơi, nên lộn mặt trái của quần ra ngoài để hạn chế sự phai màu. Khu vực thích hợp để phơi quần tây đó là ở nơi có bóng râm, tránh nắng trực tiếp, để cho quần khô tự nhiên.</div>\r\n<h2><span><strong>#4. Là ủi quần tây đúng cách</strong></span></h2>\r\n<div>Nguyên tắc để có được một chiếc quần là ủi phẳng phiu đó là trước hết bạn cần lộn các túi bên trong ra và ủi trước. Sau đó, là ủi tới các phần đường xẻ của khóa quần và thắt lưng quần. Đối với phần nếp ly quần, để tránh hiện tượng bị nhăn, bạn trước hết cần gấp quần tây thẳng, so 2 ống với nhau và dùng kẹp cố định chặt 4 góc rồi ủi. Có thể xịt thêm 1 ít nước để có được các nếp ly gọn gàng, phẳng lỳ.</div>', '101_1.jpg', NULL, '2020-09-29 07:14:42', NULL),
(11, 'Những món đồ cơ bản giúp đàn ông trở nên quyến rũ', 'nhung-mon-do-co-ban-giup-dan-ong-tro-nen-quyen-ru', 0, 1, 6, 0, '<p>Đàn ông vốn không coi <strong><a href=\"https://h2tshop.com/that-lung/c28.html\">thắt lưng</a></strong>, ví tiền hay cà vạt là những vật trang sức. Nhưng họ không ngờ rằng, nhờ chúng mà cá tính của phái mạnh được được nhân lên gấp bội. Không khó để sắm về những món đồ đảm bảo chức năng, nhưng tận dụng chúng để nâng tầm phòng cách thì là điều không phải mày râu nào cũng nắm rõ.</p>\r\n<p><img src=\"http://mtv.vn/img/men-fashion.jpg\" alt=\"Kết quả hình ảnh cho gu thời trang nam sành điệu\"></p>\r\n<p><em>Phong cách, thần thái và gu thời trang sành điệu của cánh mày râu chính là điều phái đẹp ngưỡng mộ.</em></p>\r\n<p><span><strong>Kính mắt</strong></span></p>\r\n<p>Bên cạnh việc bảo vệ đôi mắt khỏi tác hại của môi trường, kính râm còn mang đến cho phái mạnh phong cách thời trang rất riêng biệt.</p>\r\n<p><em>Mỗi mày râu nên có ít nhất một cặp kính mắt nam với kiểu dáng phù hợp gương mặt và màu sắc lịch lãm, ấn tượng. Đây là món phụ kiện thu hút sự chú ý đặc biệt đến diện mạo của phái mạnh., giúp họ nổi bật hơn khi đeo hay cả khi kẹp chúng ở cổ - túi áo.</em></p>\r\n<p><span><strong><a href=\"https://h2tshop.com/that-lung/c28.html\">Thắt lưng</a></strong></span></p>\r\n<p><strong><a href=\"https://h2tshop.com/quan-au-nam/c7.html\">Quần âu</a></strong> và <strong><a href=\"https://h2tshop.com/so-mi-dai-tay/c11.html\">sơ mi nam</a><span> </span></strong>là những trang phục không thể thiếu với đàn ông, nhất là trong những dịp trọng đại. Sự kết hợp giữa chúng chỉ thực sự ăn ý khi có mặt chiếc thắt lưng da thật sang trọng. Phái mạnh đừng coi thường tầm quan trọng của vật dụng vốn bị che lấp bởi trang phục này. Chỉ cần nhìn thoáng qua người đối diện cũng có thể đánh giá gu thời trang, sự đẳng cấp của bạn bằng chất liệu, ổ khóa và những chi tiết trên chiếc thắt lưng da.</p>\r\n<p><img src=\"http://suckhoedanong.vn/uploads/001-SKDO-new-sitemap/5-Phong-cach/2-Thoi-trang/3-loi-co-ban-thuong-mac-o-phong-cach-thoi-trang-nam/3-loi-co-ban-thuong-mac-o-phong-cach-thoi-trang-nam.jpg\" alt=\"Kết quả hình ảnh cho thắt lưng nam người mẫu\"></p>\r\n<p><strong>&gt;&gt; Tham khảo: <a href=\"https://h2tshop.com/that-lung/c28.html\">Những mẫu thắt lưng da cao cấp của H2TShop</a></strong></p>\r\n<p><span><strong>Cà vạt</strong></span></p>\r\n<p>Là <strong><a href=\"https://h2tshop.com/phu-kien/c3.html\">phụ kiện</a></strong><span> </span>quen thuộc trong tủ đồ của phái mạnh nhưng không phải tất cả cánh đàn ông đều sử dụng hiệu quả vật dụng này. Thông thường, họ chỉ mang cà vạt trong những dịp quan trọng, cho rằng đó là một thủ tục rườm rà. Nhưng phái mạnh quên mất rằng, đây chính là điểm nhấn bắt mắt trên nền bộ trang phục đơn giản của nam giới. Nếu cánh mày râu không sở hữu chiếc sơ mi quá ấn tượng, hãy phối chúng cùng màu cà – vạt thật nổi bật. Chỉ bấy nhiêu thôi cũng đủ biến phái mạnh thành tâm điểm của mọi cuộc họp hành, giao lưu hay hội thảo.</p>\r\n<p><img src=\"http://dreamshop.com.vn/images/news/main/e1baa3nh-3.jpg\" alt=\"Hình ảnh có liên quan\"></p>\r\n<p><span><strong><a href=\"https://h2tshop.com/vi-da/c30.html\">Ví tiền</a></strong></span></p>\r\n<p>Sự quyến rũ của đàn ông có lẽ sẽ giảm đi một nửa nếu họ xuất hiện trước mặt đối phương và rút ra một chiếc ví sần sùi, nhàu nát. Chẳng phải phụ nữ đang quá dò xét về khả năng tài chính của phái mạnh đâu. Chỉ đơn giản là họ muốn xem cách mày râu chăm sóc ra sao với cái ‘kho tài lộc’ của mình.</p>\r\n<p><img src=\"https://h2tshop.com/media/product/702_3_34_4.jpg\" alt=\"\"></p>\r\n<div class=\"content-blog-detail\">\r\n<p><em>Không cần phải là món đồ có màu sắc hay thiết kế quá kiểu cách, đàn ông nên chọn cho mình chiếc ví đơn giản nhưng đủ để thể hiện cá tính riêng biệt.</em></p>\r\n</div>', '3-loi-co-ban-thuong-mac-o-phong-cach-thoi-trang-nam.jpg', NULL, '2020-09-29 07:17:14', NULL),
(12, 'Quần kaki nam - item không bao giờ lỗi mốt', 'quan-kaki-nam-item-khong-bao-gio-loi-mot', 0, 1, 6, 0, '<p class=\"content-excerpt\">Chiếc <strong><a href=\"https://h2tshop.com/quan-kaki/c6.html\">quần kaki nam</a></strong><span> </span>tưởng chừng sẽ làm người mặc khó chịu với dáng bó sát nhưng thực tế không phải vậy. Được làm từ chất liệu kaki bền đẹp, có khả năng co giãn và thấm hút mồ hôi, quần kaki đem lại cảm giác thoải mái, kể cả khi vận động.</p>\r\n<div class=\"lo-post-content\">\r\n<p>Quần kaki nam được xem là một trong những items không bao giờ lỗi mốt bởi khả năng kết hợp với mọi loại áo từ<span> </span><strong><a href=\"https://h2tshop.com/so-mi-dai-tay/c11.html\">sơ mi nam</a></strong>, <strong><a href=\"https://h2tshop.com/ao-phong-ao-thun-nam/c8.html\">áo thun</a></strong><span> </span>đến áo len,…Có rất nhiều kiểu quần kaki nam khác nhau như quần kaki ống côn, quần kaki ống đứng, hay quần kaki baggy. Và với bài viết này,<span> </span><strong>H2TShop</strong><span> </span>sẽ giúp các chàng trai tìm hiểu về đặc điểm cũng như cách phối quần kaki nam quen thuộc.</p>\r\n<p><img src=\"https://h2tshop.com/media/product/1008_1_7.jpg\" alt=\"\"></p>\r\n<p>So với những chiếc quần kaki thông thường, quần kaki ống côn có thiết kế phần ống quần bó sát, giúp người mặc có cảm giác đôi chân thon gọn và dài hơn. Chiếc quần kaki ống côn tưởng chừng sẽ gây khó chịu bởi phom dáng bó sát nhưng với độ co giãn và thấm hút mồ hôi của chất liệu kaki, chiếc quần này không chỉ tôn dáng mà còn đem lại sự thoải mái kể cả khi vận động nhiều.</p>\r\n<p>Hãy cùng điểm qua một vài gợi ý mix and match cùng chiếc quần kaki sau đây nhé!</p>\r\n<p><span><strong>#1. Năng động với áo thun</strong></span></p>\r\n<p>Với sự đa dạng về kiểu dáng cũng như màu sắc, không có lý do gì để bạn không yêu thích cách phối quần kaki ống côn với áo thun phải không nào? Cách mix đồ này đem đến cho các chàng trai vẻ ngoài trẻ trung, năng động, rất thích hợp cho những buổi dạo phố cuối tuần hoặc hẹn hò lãng mạn.</p>\r\n<p><img src=\"https://www.lofficiel.vn/wp-content/uploads/2018/05/10/quan-ong-con-8.jpg\" alt=\"cách phối quần kaki ống côn với áo thun tay dài\"></p>\r\n<div id=\"attachment_88049\" class=\"wp-caption aligncenter\">\r\n<div class=\"wp-caption-text\">Áo thun tay dài và nón fedora thanh lịch và trẻ trung</div>\r\n<div class=\"wp-caption-text\"> </div>\r\n<div class=\"wp-caption-text\"><img src=\"https://www.lofficiel.vn/wp-content/uploads/2018/05/10/quan-ong-con-3.jpg\" alt=\"cách phối quần kaki ống côn với áo polo\"></div>\r\n<div class=\"wp-caption-text\">Khỏe khoắn và năng động với <strong><a href=\"https://h2tshop.com/ao-phong-nam-atc18-0162/p1943.html\">áo polo</a></strong></div>\r\n<div class=\"wp-caption-text\"> </div>\r\n<div class=\"wp-caption-text\"><span><strong>#2. Lịch lãm khi kết hợp với áo sơ mi</strong></span></div>\r\n<div class=\"wp-caption-text\"> </div>\r\n<div class=\"wp-caption-text\">Nếu chọn quần kaki ống côn để đi làm mỗi ngày, bạn chỉ cần chú ý đến thời tiết để chọn được một chiếc áo sơ mi phù hợp. Với những ngày thời tiết mát mẻ, áo sơ mi dài tay và cà vạt sẽ là một lựa chọn hoàn hảo. Ngược lại,<span> </span><strong><a href=\"https://h2tshop.com/ao-so-mi-nam-smc18-0153/p1941.html\">áo sơ mi ngắn tay</a></strong> và quần kaki ống côn sẽ thích hợp hơn với những ngày thời tiết oi bức.\r\n<p><img src=\"https://h2tshop.com/media/product/1941_3989153098_1498883322.jpg\" alt=\"\"></p>\r\n<p><em><strong>Quần kaki nam + <a href=\"https://h2tshop.com/ao-so-mi-nam-smc18-0153/p1941.html\">Áo Sơ Mi Nam SMC18-0153</a></strong></em></p>\r\n<p><em><strong><img src=\"https://h2tshop.com/media/product/1855_8308356346_2007896927.jpg\" alt=\"\"></strong></em></p>\r\n<p> </p>\r\n</div>\r\n</div>\r\n<p><strong>Bạn vẫn có thể chọn những chiếc<span> </span><a href=\"https://h2tshop.com/ao-so-mi-nam-smc18-0097/p1855.html\">Áo Sơ Mi Nam SMC18-0097</a>  thanh lịch và tinh tế để kết hợp với quần kaki </strong></p>\r\n<p><span><strong>#3. Kết hợp với giầy</strong></span></p>\r\n<p>Cũng giống như <strong><a href=\"https://h2tshop.com/quan-bo-nam/c5.html\">quần jeans</a>, </strong>quần kaki ống côn có thể kết hợp được với hầu hết các loại giày như sneakers, sandals, <strong><a href=\"https://h2tshop.com/giay-da-nam-g-992/p1507.html\">boots</a></strong><span> </span>hay giày lười loafer. Chỉ cần chọn được một đôi giày phù hợp với trang phục là phong cách thời trang của bạn đã được nâng tầm rồi.</p>\r\n<p><strong><img src=\"https://h2tshop.com/media/product/1752_20_1.jpg\" alt=\"\"></strong></p>\r\n<div id=\"attachment_88064\" class=\"wp-caption aligncenter\">\r\n<div class=\"wp-caption-text\">Nhưng sneaker vẫn là sự lựa chọn của đông đảo cánh đàn ông vì sự tiện dụng và năng động</div>\r\n</div>\r\n<p> <img src=\"https://h2tstore.vn/media/news/1506_quan-ong-con-12.jpg\" alt=\"\" width=\"691\" height=\"1037\"></p>\r\n<div id=\"attachment_88053\" class=\"wp-caption aligncenter\">\r\n<div class=\"wp-caption-text\">Những chàng trai lịch lãm không thể thiếu những đôi loafer cổ điển và thời thượng</div>\r\n<div class=\"wp-caption-text\"> </div>\r\n<div class=\"wp-caption-text\"><span><strong>#4. Điểm thêm phụ kiện</strong></span></div>\r\n<div class=\"wp-caption-text\"> </div>\r\n<div class=\"wp-caption-text\">Để có thể phối đồ với quần kaki ống côn một cách hiệu quả và nổi bật, phái mạnh đừng quên điểm thêm <strong><a href=\"https://h2tshop.com/phu-kien/c3.html\">phụ kiện</a><span> </span></strong>để làm điểm nhấn như nón, kính mát, đồng hồ, vòng đeo tay,…</div>\r\n</div>\r\n</div>', '94_1008__mg_5420.jpg', NULL, '2020-09-29 07:22:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `br_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_hot` tinyint(4) NOT NULL DEFAULT 0,
  `br_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `br_name`, `br_slug`, `br_hot`, `br_active`, `created_at`, `updated_at`) VALUES
(1, 'gucci1', 'gucci1', 0, 1, '2020-09-10 08:18:15', NULL),
(2, 'thời trang NEM Fashion', 'thoi-trang-nem-fashion', 0, 1, '2020-09-10 08:18:27', NULL),
(3, 'Seven AM.', 'seven-am', 0, 1, '2020-09-10 08:18:31', NULL),
(4, 'K&K Fashion.', 'kk-fashion', 0, 1, '2020-09-10 08:18:36', NULL),
(5, 'Eva de Eva.', 'eva-de-eva', 0, 1, '2020-09-10 08:18:41', NULL),
(6, 'Elise.', 'elise', 0, 1, '2020-09-10 08:18:46', NULL),
(7, 'Hnoss', 'hnoss', 0, 1, '2020-09-10 08:18:50', NULL),
(8, 'H2T', 'h2t', 0, 1, '2020-09-10 08:18:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_status` tinyint(4) NOT NULL DEFAULT 1,
  `c_hot` tinyint(4) NOT NULL DEFAULT 0,
  `c_parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_slug`, `c_status`, `c_hot`, `c_parent_id`, `created_at`, `updated_at`) VALUES
(6, 'áo sơ mi', 'ao-so-mi', 1, 1, 5, '2020-09-10 08:13:56', '2020-09-26 17:46:59'),
(7, 'áo thun', 'ao-thun', 1, 1, 5, '2020-09-10 08:14:07', '2020-09-26 17:46:44'),
(12, 'áo phông', 'ao-phong', 1, 1, 5, '2020-09-10 08:15:54', '2020-09-26 17:46:55'),
(15, 'quần kaki', 'quan-kaki', 1, 1, 13, '2020-09-10 08:16:45', '2020-09-29 11:50:51'),
(16, 'quần jogger', 'quan-jogger', 1, 0, 14, '2020-09-10 08:16:56', '2020-09-26 17:46:16'),
(17, 'áo vest', 'ao-vest', 1, 0, 0, '2020-09-29 10:58:00', NULL),
(18, 'trang sức', 'trang-suc', 1, 0, 0, '2020-09-29 10:58:12', NULL),
(19, 'giầy', 'giay', 1, 1, 0, '2020-09-29 10:58:17', '2020-09-29 11:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `coupon_code_id` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `phone`, `address`, `avatar`, `last_login`, `birthday`, `gender`, `coupon_code_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'quang', 'quang@gmail.com', NULL, '$2y$10$eEaunPgdmzGTN7NvauAN1.Isx99wvz1stOaGLZw8iiv5HFpkoT8nK', 1, '0981558501', 'số 3 ngõ 361 vũ tông phan', 'anh.jpg', NULL, '1998-05-10', 1, NULL, '3vnNOlZJGSF7DZKArPN6UwLpehqnrXQkl59SNp8Qlp7XfnhebbS4wALEKUbl', NULL, '2020-09-29 14:41:08'),
(9, 'nguyen quang', 'waitdou2212@gmail.com', NULL, '$2y$10$UIovNPgSEqMgdzhKsUAu/.iL9SArpv5hPMLKLVlVQyWQInVCSlofq', 1, '0981558563', NULL, NULL, NULL, NULL, NULL, NULL, 'oy05oECIqNYG4x7t6rHLke4KH0bjJwOAh6e3X9HrgVKW5s13bIlGBWhTuRzP', '2020-09-17 01:08:55', '2020-09-28 10:57:10'),
(11, 'test', 'test@gmail.com', NULL, '$2y$10$D8eupANZFslBA6fmb/41Bu60WyLkhwFBHs9.5.Bf1Mhx4sq7jRZ2u', 0, '0951251', NULL, NULL, NULL, NULL, NULL, NULL, 'M8RW58jSpLm05pdLkldEHNK5lQgCQJZBbLJTOVdo3cs8dWaGi8i9x3zYsVM6', '2020-09-28 17:43:39', '2020-09-28 17:43:49'),
(12, 'chung', 'chung@gmail.com', NULL, '$2y$10$hhD2arvfBnRJQDSTuOl9AusZKVTeyL2cACirNMdjrRlIlDF.37zCa', 1, '012365478', NULL, NULL, NULL, NULL, NULL, NULL, 'BoXLr895iSZaam3hx1KqRWySOCSu63u4Vit5qrYdT6IF5wxyI3jqB4QTsKE9', '2020-09-29 11:30:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cl_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cl_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `cl_name`, `cl_status`, `created_at`, `updated_at`) VALUES
(1, 'trắng xanh', 1, '2020-09-10 08:22:09', NULL),
(2, 'trắng', 1, '2020-09-10 08:33:41', NULL),
(3, 'nâu', 1, '2020-09-10 08:35:59', NULL),
(4, 'xám', 1, '2020-09-10 08:38:12', NULL),
(5, 'đen', 1, '2020-09-10 08:40:42', NULL),
(6, 'đỏ', 1, '2020-09-10 08:56:21', NULL),
(7, 'xanh', 1, '2020-09-10 10:04:41', NULL),
(8, 'tím', 1, '2020-09-29 11:23:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fa_user_id` int(11) NOT NULL DEFAULT 0,
  `fa_product_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `fa_user_id`, `fa_product_id`, `created_at`, `updated_at`) VALUES
(114, 1, 15, NULL, NULL),
(119, 1, 16, NULL, NULL),
(122, 9, 16, NULL, NULL),
(125, 9, 15, NULL, NULL),
(127, 9, 25, NULL, NULL),
(128, 9, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `k_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `k_hot` tinyint(4) NOT NULL DEFAULT 0,
  `k_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `k_name`, `k_slug`, `k_hot`, `k_description`, `created_at`, `updated_at`) VALUES
(2, 'sản phẩm mới', 'san-pham-moi', 0, 'mới về hàng', '2020-09-10 08:17:27', NULL),
(3, 'bán chạy', 'ban-chay', 0, 'mua nhiều', '2020-09-10 08:17:40', NULL),
(4, 'nổi bât', 'noi-bat', 0, 'đẹp chất lượng', '2020-09-10 08:18:03', NULL),
(6, 'sale 99', 'sale-99', 0, 'ok', '2020-09-19 02:51:42', NULL),
(7, 'hot', 'hot', 0, 'dđ', '2020-09-19 02:51:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mn_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mn_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mn_status` tinyint(4) NOT NULL DEFAULT 1,
  `mn_hot` tinyint(4) NOT NULL DEFAULT 0,
  `mn_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mn_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mn_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `mn_name`, `mn_slug`, `mn_status`, `mn_hot`, `mn_avatar`, `mn_banner`, `mn_description`, `created_at`, `updated_at`) VALUES
(1, 'sự kiện', 'su-kien', 1, 0, NULL, NULL, NULL, '2020-09-29 05:41:56', '2020-09-29 05:49:02'),
(2, 'khuyến mãi', 'khuyen-mai', 1, 0, NULL, NULL, NULL, '2020-09-29 05:42:02', NULL),
(5, 'giới thiệu', 'gioi-thieu', 1, 0, NULL, NULL, NULL, '2020-09-29 06:54:41', NULL),
(6, 'thông tin bổ ích', 'thong-tin-bo-ich', 1, 0, NULL, NULL, NULL, '2020-09-29 07:11:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_10_075617_create_categories_table', 1),
(5, '2020_09_10_075638_create_brands_table', 1),
(6, '2020_09_10_075654_create_products_table', 1),
(7, '2020_09_10_075721_create_keywords_table', 1),
(8, '2020_09_10_075738_create_products_keywords_table', 1),
(9, '2020_09_10_075800_create_sizes_table', 1),
(10, '2020_09_10_075814_create_colors_table', 1),
(11, '2020_09_10_080421_create_products_details_table', 1),
(12, '2020_09_14_110342_create_clients_table', 2),
(13, '2020_09_15_082136_create_orders_table', 3),
(14, '2020_09_15_085801_create_orders_details_table', 4),
(15, '2020_09_15_085912_create_shippings_table', 4),
(16, '2020_09_16_145106_create_favourites_table', 5),
(17, '2020_09_18_045505_create_ratings_table', 6),
(18, '2020_09_21_155030_create_slides_table', 7),
(19, '2020_09_23_161649_create_payments_table', 8),
(20, '2020_09_27_130923_create_roles_table', 9),
(21, '2020_09_27_131047_create_user_roles_table', 10),
(22, '2020_09_27_133415_create_roles_table', 11),
(23, '2020_09_27_133456_create_user_roles_table', 11),
(24, '2020_09_29_102939_create_blogs_table', 12),
(25, '2020_09_29_103430_create_articles_table', 12),
(26, '2020_09_29_122242_create_menus_table', 13),
(27, '2020_09_29_122328_create_articles_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_total_money` int(11) NOT NULL DEFAULT 0,
  `order_shipping_fee` int(11) DEFAULT 0,
  `order_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_payment` tinyint(4) DEFAULT 1,
  `order_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_user_id`, `order_total_money`, `order_shipping_fee`, `order_name`, `order_email`, `order_phone`, `order_address`, `order_payment`, `order_status`, `created_at`, `updated_at`, `order_note`) VALUES
(53, 9, 320000, 2, 'nguyen quang', 'waitdou2212@gmail.com', '0981558563', 'so 3 ngo 361 vu tong phan', 1, -1, '2020-09-23 17:00:00', '2020-09-29 11:32:25', 'assfd'),
(54, 1, 320000, 2, 'quang', 'quang@gmail.com', '0981558501', 'so 3 ngo 361 vu tong phan', 1, 2, '2020-09-24 08:18:31', '2020-09-25 20:42:49', 'cẩn thận nha'),
(55, 1, 560000, 2, 'quang', 'quang@gmail.com', '0981558501', 'so 3 ngo 361 vu tong phan', 2, 3, '2020-09-24 08:32:34', '2020-09-25 20:43:54', 'ádfadsfsdaf'),
(56, 1, 250000, 2, 'quang', 'quang@gmail.com', '0981558501', 'so 3 ngo 361 vu tong phan', 1, 1, '2020-09-25 20:43:33', NULL, 'giao hàng cẩn thận'),
(57, 1, 320000, 2, 'quang', 'quang@gmail.com', '0981558501', 'nam gian nam truc nam dinh', 1, 3, '2020-09-26 04:55:46', '2020-09-26 04:56:31', 'goi điện trước khi giao hàng'),
(58, 1, 98000, 2, 'quang', 'quang@gmail.com', '0981558501', 'van chang', 2, 3, '2020-09-26 05:02:32', '2020-09-26 05:02:56', 'giao hàng tối'),
(60, 9, 298000, 2, 'nguyen quang', 'waitdou2212@gmail.com', '0981558563', NULL, 1, 1, '2020-09-29 11:27:34', NULL, 'giao hàng cẩn thận nha'),
(61, 12, 448000, 2, 'chung', 'chung@gmail.com', '012365478', NULL, 2, 2, '2020-09-29 11:32:03', '2020-09-29 11:32:19', 'gọi trước khi giao hàng');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `od_order_id` int(11) NOT NULL DEFAULT 0,
  `od_product_id` int(11) NOT NULL DEFAULT 0,
  `od_qty` tinyint(4) NOT NULL DEFAULT 0,
  `od_price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `od_order_id`, `od_product_id`, `od_qty`, `od_price`, `created_at`, `updated_at`) VALUES
(74, 53, 18, 1, 320000, NULL, NULL),
(75, 54, 18, 1, 320000, NULL, NULL),
(76, 55, 16, 1, 560000, NULL, NULL),
(77, 56, 6, 1, 250000, NULL, NULL),
(78, 57, 18, 1, 320000, NULL, NULL),
(79, 58, 5, 1, 98000, NULL, NULL),
(81, 60, 25, 1, 99000, NULL, NULL),
(82, 60, 23, 1, 199000, NULL, NULL),
(83, 61, 25, 1, 99000, NULL, NULL),
(84, 61, 23, 1, 199000, NULL, NULL),
(85, 61, 24, 1, 150000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán khi nhận hàng', '1', '2020-09-23 16:22:13', '2020-09-23 16:22:13'),
(2, 'Thanh toán online', '1', '2020-09-23 16:23:01', '2020-09-23 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` int(11) NOT NULL DEFAULT 0,
  `pro_price_entry` int(11) DEFAULT 0 COMMENT 'giá nhập',
  `pro_sale` int(11) DEFAULT 0,
  `pro_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_avatar_list` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_view` int(11) NOT NULL DEFAULT 0,
  `pro_hot` tinyint(4) NOT NULL DEFAULT 0,
  `pro_active` tinyint(4) NOT NULL DEFAULT 1,
  `pro_pay` int(11) NOT NULL DEFAULT 0,
  `pro_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_number` int(11) DEFAULT NULL,
  `pro_review_total` int(11) NOT NULL DEFAULT 0,
  `pro_review_star` int(11) NOT NULL DEFAULT 0,
  `pro_category_id` bigint(20) UNSIGNED NOT NULL,
  `pro_brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pro_name`, `pro_slug`, `pro_price`, `pro_price_entry`, `pro_sale`, `pro_avatar`, `pro_avatar_list`, `pro_view`, `pro_hot`, `pro_active`, `pro_pay`, `pro_description`, `pro_content`, `pro_number`, `pro_review_total`, `pro_review_star`, `pro_category_id`, `pro_brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun phối màu AT 1081', 'ao-thun-phoi-mau-at-1081', 234997, 150000, 0, '3073__nik6457.jpg', '3073__nik6457.jpg,3073__nik6460.jpg,3073__nik6461.jpg,3073__nik6462.jpg,3073__nik6465.jpg', 8, 0, 1, 1, '<p><strong><span>ÁO PHÔNG NAM</span></strong></p>\r\n<p><span><strong><em><span><a href=\"https://h2tstore.vn/ao-thun-khong-co.html\">Áo thun nam</a></span> </em></strong>luôn là item gắn liền với thời tiết mùa hè mùa hè, Với thiết kế đơn giản và phổ biến trên thị trường. Bên cạnh thiết kế đơn sắc, áo thun phối màu cũng là sản phẩm thu hút nhiều sự quan tâm. Chính vì thế trong bộ sưu tập hè 2020 MIIX đã cho ra mắt dòng sản phẩm phối màu đơn giản nhưng mang lại sự chú ý từ những người xung quanh.</span></p>\r\n<p><strong><span>C<span>hất liệu:</span></span></strong><span><span>  </span>100% cotton</span></p>\r\n<p><span><strong><span>Thiết kế áo: </span></strong></span></p>\r\n<p><span>+ Thoáng mát thoải mái ( cotton)</span></p>\r\n<p><span>+ Thấm hút mồ hôi tốt ( cotton)</span></p>\r\n<p><span>+ Mềm mại, thân thiện với da ( cotton)</span></p>\r\n<p><span><strong><span>Màu sắc:</span></strong><span>  <span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Trắng phối Ghi (Gc), xanh đậm phối đen(Kc), trắng phối xanh nhạt (Kn), đen (Bc)</span></span></span></p>\r\n<p><strong><span> Size hiện có:</span></strong><span> S, M, L, XL</span></p>\r\n<p><strong><span>Mix and Match <span>: </span></span></strong><span><span>Đơn giản chỉ cần 1 chiếc</span></span><span><span> <em><strong><span><a href=\"https://h2tstore.vn/quan-ngo.html\">quần short</a></span></strong></em></span><span> và 1 đôi </span><span><strong><em><span><a href=\"https://h2tstore.vn/giay-da-nam.html\">giày thể thao</a> </span></em></strong></span><span><span><span>đã cho bạn một set đồ tự tin</span></span></span><span><span> </span></span></span></p>', NULL, 50, 0, 0, 7, 8, '2020-09-10 08:22:09', '2020-09-29 10:56:33'),
(3, 'Sơ mi công sở trắng SM-1034', 'so-mi-cong-so-trang-sm-1034', 435000, 350000, 0, '3064_35abaef5694e9210cb5f.jpg', '3064_35abaef5694e9210cb5f%20(1).jpg,3064_35abaef5694e9210cb5f%20(2).jpg,3064_35abaef5694e9210cb5f.jpg,3064_43dcca860d3df663af2c.jpg,3064_7ab371eab6514d0f1440.jpg,3064_d9fe3abbfd00065e5f11.jpg', 3, 0, 1, 1, '<p><strong>SƠ MI NAM</strong></p>\r\n<p><span>Sơ mi là mẫu áo tồn tại theo thời gian. Từ những chiếc<span> <a href=\"https://h2tstore.vn/so-mi-dai-tay-2.html\">áo sơ mi</a></span> truyền thống đến hiện đại với những thiết kế tinh tế cầu kỳ hơn. <strong>Sơ</strong> <strong>mi trắng công sở SM-1034</strong> là mẫu áo thần thánh đem lại cho bạn vẻ đẹp trẻ trung, lịch lãm mà không kém phần sang trọng.</span></p>\r\n<p><strong>Chất liệu:<span> </span></strong><span>50% bamboo, 50% Polyester</span></p>\r\n<p><span><span><strong>Thiết kế áo: <span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br></span></strong><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">+ Kháng khuẩn và chống tia UV. ( bamboo)</span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br>+ Bề mặt bóng đẹp ( bamboo)<br>+ An toàn không gây kích ứng da ( bamboo)<br>+ Thấm hút mồ hôi tốt ( bamboo)<br>+ Giữ phom dáng ( polyeste)<br>+ Ổn định kích thước, độ nhăn nhàu thấp ( polyeste)<br></span></span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><span><span>+ Độ bền cao, dễ chăm sóc và dễ sử dụng.( polyeste)</span></span></span></span><strong><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br></span></strong></p>\r\n<p><span><strong>Màu sắc:</strong> Trắng (Tc)</span></p>\r\n<p><span><strong>Size hiện có:</strong> S, M, L, XL</span></p>\r\n<p><strong>Mix and Match: </strong></p>\r\n<ul>\r\n<li>Từ cổ chí kim gắn liền với sơ mi luôn là <span><a href=\"https://h2tstore.vn/quan-au-nam.html\">quần tây</a></span> sang trọng, lịch sự.</li>\r\n<li>Ngoài ra, với kiểu dáng hiện đại thì sơ mi kết hợp cùng quần Kaki hay Jean đều rất nổi bật.</li>\r\n</ul>', NULL, 50, 0, 0, 6, 1, '2020-09-10 08:33:41', '2020-09-11 23:30:33'),
(4, 'Áo phông polo nam AP-1075', 'ao-phong-polo-nam-ap-1075', 365000, 300000, 299998, '3067__26a3777.jpg', '3067__26a0897%20(1).jpg,3067__26a0897.jpg,3067__26a3773.jpg,3067__26a3775.jpg,3067__26a3776.jpg,3067__26a3777.jpg', 3, 1, 1, 3, '<p><strong><span>ÁO PHÔNG NAM</span></strong></p>\r\n<p><span><strong><em><span><a href=\"https://h2tstore.vn/ao-thun-polo.html\"><span>Áo thun nam</span></a></span></em></strong></span><strong><em><span> </span></em></strong><span>polo<strong><em> </em></strong>là mẫu áo đơn giản kết hợp kiểu dáng giữa cổ đức và chất thun thoáng mát. Là item đã được cải tiến phối màu so với thiết kế cổ điển thông thường cho cánh mày râu, không những mang lại cho người mặc sự lịch lãm nhưng đồng thời cũng trẻ trung. Thiết kế trơn đơn giản dễ phối đồ .</span></p>\r\n<p><strong><span>Chất liệu:</span></strong><span> 85% cotton, 15% polyester</span></p>\r\n<p><strong><span>Thiết kế áo: </span></strong></p>\r\n<p><span><span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">+ Thoáng mát thoải mái ( cotton)<br>+ Thấm hút mồ hôi tốt ( cotton)<br>+ Mềm mại, thân thiện với da ( cotton)<br>+ Giữ phom dáng ( polyeste)<br>+ Ổn định kích thước, độ nhăn nhàu thấp ( polyeste)<br></span></span><span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">+ Độ bền cao, dễ chăm sóc và dễ sử dụng.( polyeste)</span></span><strong><span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br></span></span></strong></span></p>\r\n<p><strong><span>Màu sắc:</span></strong><span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Trắng (Tc), đen(Bc), xanh(Xc), tím than đậm (Kđ), tím than nhạt (Kn), ghi đậm(Gđ), ghi nhạt (Gn), cam(Oc), hồng(Hc)</span></span></p>\r\n<p><strong><span> Size hiện có:</span></strong><span> S, M, L, XL</span></p>\r\n<p><strong><span>Mix and Match : </span></strong><span>Đơn giản chỉ cần 1 chiếc</span><span> <strong><em><span><a href=\"https://h2tstore.vn/quan-ngo.html\">quần short</a></span></em></strong></span><span><span> </span>và 1 đôi </span><em><strong><span><span><a href=\"https://h2tstore.vn/giay-da-nam.html\">giày thể thao</a></span> </span></strong></em><span>đã cho bạn một set đồ tự tin</span></p>', NULL, 9, 0, 0, 12, 4, '2020-09-10 08:35:59', '2020-09-21 22:01:54'),
(5, 'Áo thun 3 lỗ AT-0753', 'ao-thun-3-lo-at-0753', 98000, 30000, 0, '2702__mg_3442.jpg', '2702__mg_3442.jpg,2702__mg_3459.jpg,2702__mg_3461.jpg,2702__mg_3463.jpg,2702__mg_3465.jpg,2702__mg_3466.jpg,2702__mg_3471.jpg,2702__mg_3473.jpg', 7, 1, 1, 4, 'thoáng mát', NULL, 47, 0, 0, 7, 7, '2020-09-10 08:37:04', '2020-09-29 10:56:43'),
(6, 'Áo thun nam in hình ATV0-1171', 'ao-thun-nam-in-hinh-atv0-1171', 250000, 150000, 0, '3183__nik0111.jpg', '3183__nik0104.jpg,3183__nik0106.jpg,3183__nik0107.jpg,3183__nik0111%20(1).jpg,3183__nik0111%20(2).jpg,3183__nik0111.jpg,3183__nik0114.jpg', 16, 1, 1, 14, '<p><strong>ÁOTHUN NAM</strong></p>\r\n<p><span><strong><a href=\"https://h2tstore.vn/ao-thun-khong-co.html\"><em>Áo thun nam</em></a></strong></span> là trang phục thông dụng nhất trong thế giới thời trang và chưa có một phụ kiện thời trang nào đánh bật được vị trí số 1 của nó. Luôn là mẫu áo cực đơn giản nhưng lại không hề đơn giản chút nào. Phù hợp với mọi đối tượng sử dụng. Với thiết kế đơn giản mặt trước bassic trơn lưng áp họa tiết in chữ làm điểm nhấn nổi bật cho người mặc.</p>\r\n<p><strong>Thiết kế áo:</strong></p>\r\n<ul>\r\n<li>Áo cổ tròn, thiết kế đơn giản, dễ phối đố.</li>\r\n<li>Gam màu lạnh phù hợp với mọi lứa tuổi</li>\r\n<li>Dáng áo basic truyền thống.</li>\r\n</ul>\r\n<p><strong>Đặc tính áo: </strong></p>\r\n<ul>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Thoáng mát thoải mái ( cotton)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Thấm hút mồ hôi tốt ( cotton)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Mềm mại, thân thiện với da ( cotton)</span><strong><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br></span></strong></li>\r\n</ul>\r\n<p><strong>Màu sắc: </strong>Đen (Bc)</p>\r\n<p><strong>Size hiện có: </strong>S, M, L, XL</p>\r\n<p><strong>Mix and Match: </strong></p>\r\n<ul>\r\n<li>Chẳng cần phối đồ gì cho phức tạp, chỉ cần phối hợp cùng chiếc <em><strong><span><a href=\"https://h2tstore.vn/quan-bo-nam.html\">quần jean</a></span> </strong></em> và <span><strong><a href=\"https://h2tstore.vn/giay-da-nam.html\"><em>đôi giày thể thao</em></a></strong></span> đã có 1 set đồ cực kỳ năng động rồi.</li>\r\n<li>Đơn giản chỉ cần 1 chiếc <span><strong><em><a href=\"https://h2tstore.vn/quan-ngo.html\">quần short</a></em></strong></span> và 1 đôi <span><em><strong><a href=\"https://h2tstore.vn/giay-da-nam.html\">giày thể thao</a> </strong></em></span>đã cho bạn một set đồ tự tin</li>\r\n</ul>', NULL, 44, 0, 0, 7, 3, '2020-09-10 08:38:12', '2020-09-29 10:56:22'),
(7, 'Quần hộp kaki Q-1009', 'quan-hop-kaki-q-1009', 495000, 300000, 0, '3164__26a7479.jpg', '3164__26a7479.jpg,3164__26a7491.jpg,3164__26a7492.jpg,3164__26a7494.jpg,3164__26a7495.jpg', 2, 0, 1, 1, '<p><span><em><strong><a href=\"https://h2tstore.vn/quan-kaki.html\">Quần Jogger kaki</a></strong></em> </span>là mẫu quần không quá quen thuộc hay thông dụng như quần Jean hay quần âu. Hiện nay quần jogger kaki vẫn là mẫu quần được giới bạn trẻ rất ưa chuộng. Xuất phát từ quần thể thao truyền thống, quần jogger kaki được kết hợp giữa phong cách đầy trẻ trung, năng động cùng với sự sang trọng và lịch lãm. đem lại phong cách riêng cho các chàng trai</p>\r\n<p><strong>Chất liệu:</strong> 94% cotton, 6% elastane </p>\r\n<p><strong>Thiết kế quần: </strong></p>\r\n<ul>\r\n<li>Thiết kế basic, màu sắc không kén người mặc.</li>\r\n<li>Túi túi chéo truyền thống, kiểu dáng trẻ trung có kèm khóa kéo.</li>\r\n<li>Khuy cài cùng dây rút đi kèm sẽ tạo cảm giác thoải mái vận động</li>\r\n</ul>\r\n<p><strong>Đặc tính quần :</strong></p>\r\n<ul>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Thoáng mát thoải mái ( cotton)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Thấm hút mồ hôi tốt ( cotton)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Mềm mại, thân thiện với da ( cotton)</span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Giữ phom dáng ( elastane)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Có khả năng đàn hồi tốt ( elastane)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Được cài trong vải sợi chính để tạo tăng độ co giãnthoải mái ( elastane)</span></li>\r\n</ul>', NULL, 49, 0, 0, 15, 3, '2020-09-10 08:39:36', '2020-09-11 23:29:44'),
(8, 'Quần Jogger QOH0-1125', 'quan-jogger-qoh0-1125', 425000, 250000, 0, '3141__nik7746.jpg', '3141__nik7746%20(2).jpg,3141__nik7746.jpg,3141__nik7752.jpg,3141__nik7753.jpg,3141__nik7760.jpg,3141__nik7762.jpg', 1, 0, 1, 1, '<p><span><em><strong><a href=\"https://h2tstore.vn/quan-kaki.html\">Quần Jogger kaki</a></strong></em> </span>là mẫu quần không quá quen thuộc hay thông dụng như quần Jean hay quần âu. Hiện nay quần jogger kaki vẫn là mẫu quần được giới bạn trẻ rất ưa chuộng. Xuất phát từ quần thể thao truyền thống, quần jogger kaki được kết hợp giữa phong cách đầy trẻ trung, năng động cùng với sự sang trọng và lịch lãm. đem lại phong cách riêng cho các chàng trai</p>\r\n<p><strong>Chất liệu:</strong> 94% cotton, 6% elastane </p>\r\n<p><strong>Thiết kế quần: </strong></p>\r\n<ul>\r\n<li>Thiết kế basic, màu sắc không kén người mặc.</li>\r\n<li>Túi túi chéo truyền thống, kiểu dáng trẻ trung có kèm khóa kéo.</li>\r\n<li>Khuy cài cùng dây rút đi kèm sẽ tạo cảm giác thoải mái vận động</li>\r\n</ul>\r\n<p><strong>Đặc tính quần :</strong></p>\r\n<ul>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Thoáng mát thoải mái ( cotton)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Thấm hút mồ hôi tốt ( cotton)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Mềm mại, thân thiện với da ( cotton)</span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Giữ phom dáng ( elastane)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Có khả năng đàn hồi tốt ( elastane)<br></span></li>\r\n<li><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Được cài trong vải sợi chính để tạo tăng độ co giãnthoải mái ( elastane)</span></li>\r\n</ul>', NULL, 49, 0, 0, 16, 2, '2020-09-10 08:40:42', '2020-09-11 23:30:10'),
(14, 'Áo thun cotton basic AT-0828', 'ao-thun-cotton-basic-at-0828', 195000, 99999, 0, '2780__dsc0531.jpg', '2780__dsc0531.jpg,2780__dsc0541.jpg,2780__dsc0543.jpg,2780__dsc0662.jpg,2780__dsc0682.jpg', 14, 1, 1, 8, '<p><strong>ÁO PHÔNG ĐƠN GIẢN NHẸ NHÀNG</strong></p>\r\n<p>Áo phông là mẫu áo cực đơn giản nhưng lại không hề đơn giản chút nào. Được gọi là mẫu áo thần thánh mix được với tất cả các set đồ. Có thể nhắc đến mẫu<span> </span><strong>Áo thun cotton basic AT-0828</strong><span> </span>với màu sắc đơn giản, trầm tính cực dễ kết hợp đồ.</p>\r\n<p><strong>Chất liệu: </strong>Cotton, mềm mịn.</p>\r\n<p><strong>Thiết kế áo:</strong></p>\r\n<ul>\r\n<li>Áo cổ tròn, thiết kế đơn giản, dễ phối đố.</li>\r\n<li>Gam màu lạnh phù hợp với mọi lứa tuổi</li>\r\n<li>Dáng áo basic truyền thống.</li>\r\n</ul>', NULL, 44, 0, 0, 7, 2, '2020-09-10 09:58:46', '2020-09-11 23:28:25'),
(15, 'Áo thun nam ATC0-1219', 'ao-thun-nam-atc0-1219', 320000, 150000, 0, '3330__nik0658.jpg', '3330__nik0658%20(1).jpg,3330__nik0658.jpg,3330__nik0660.jpg,3330__nik0666.jpg,3330__nik0667.jpg,3330__nik0669.jpg', 30, 1, 1, 19, '<p><strong>ÁO PHÔNG ĐƠN GIẢN NHẸ NHÀNG</strong></p>\r\n<p>Áo phông là mẫu áo cực đơn giản nhưng lại không hề đơn giản chút nào. Được gọi là mẫu áo thần thánh mix được với tất cả các set đồ. Có thể nhắc đến mẫu<span> </span><strong>Áo thun cotton basic AT-0828</strong><span> </span>với màu sắc đơn giản, trầm tính cực dễ kết hợp đồ.</p>\r\n<p><strong>Chất liệu: </strong>Cotton, mềm mịn.</p>\r\n<p><strong>Thiết kế áo:</strong></p>\r\n<ul>\r\n<li>Áo cổ tròn, thiết kế đơn giản, dễ phối đố.</li>\r\n<li>Gam màu lạnh phù hợp với mọi lứa tuổi</li>\r\n<li>Dáng áo basic truyền thống.</li>\r\n</ul>\r\n<p><strong>Màu sắc: </strong>Ghi, Đen, Trắng</p>\r\n<p><strong>Size hiện có: </strong>S, M, L, XL</p>', NULL, 0, 5, 16, 7, 4, '2020-09-10 10:04:41', '2020-09-19 01:43:16'),
(16, 'Áo sơ mi Oxford SMT0-1094', 'ao-so-mi-oxford-smt0-1094', 560000, 400000, 0, '3133__nik7080.jpg', '3073__nik6465%20(1).jpg,3073__nik6465.jpg,3133__nik7073.jpg,3133__nik7076.jpg,3133__nik7077.jpg', 25, 0, 1, 2, '<p><span><strong>SƠ MI NAM</strong></span></p>\r\n<p><span><span><a href=\"https://h2tstore.vn/so-mi-dai-tay-2.html\"><em>Sơ mi</em> </a></span>là mẫu áo tồn tại theo thời gian không thể thiếu cùng các chàng trai. Từ những chiếc<span> <a href=\"https://h2tstore.vn/so-mi-dai-tay-2.html\">áo sơ mi</a></span> truyền thống đến hiện đại với những thiết kế tinh tế cầu kỳ hơn.Sơ mi kaki là mẫu áo mới được phát triển và ưa chuộng mấy năm gần đây. Tuy là những sản phẩm mới nhưng lại được giới trẻ khá ưa chuộng</span></p>\r\n<p><span><strong>Chất liệu:</strong> 100% cotton. (kaki)</span></p>\r\n<p><span><strong>Thiết kế áo: <span data-sheets-value=\"{\" data-sheets-userformat=\"{\"> <span data-sheets-value=\"{\" data-sheets-userformat=\"{\">  <br></span></span></strong><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">+ Thoáng mát thoải mái ( cotton)</span></span><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br>+ Thấm hút mồ hôi tốt ( cotton)<br>+ Mềm mại, thân thiện với da ( cotton)</span></span></span></p>\r\n<p><span><strong>Màu sắc:</strong> <span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Sọc vàng (Vc), sọc xanh(Xc)</span><strong><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><span data-sheets-value=\"{\" data-sheets-userformat=\"{\"><br></span></span></strong></span></p>\r\n<p><span><strong>Size hiện có:</strong> S, M, L, XL</span></p>\r\n<p><span><strong>Mix and Match: </strong></span></p>\r\n<ul>\r\n<li><span>Từ cổ chí kim gắn liền với sơ mi luôn là <em><span><a href=\"https://h2tstore.vn/quan-au-nam.html\">quần tây</a></span></em> sang trọng, lịch sự.</span></li>\r\n<li><span>Ngoài ra, với kiểu dáng hiện đại thì sơ mi kết hợp cùng <span><em><a href=\"https://h2tstore.vn/quan-kaki.html\">quần Kaki</a></em></span> hay <span><a href=\"https://h2tstore.vn/quan-bo-nam.html\"><em>Jean</em></a></span> đều rất nổi bật.</span></li>\r\n</ul>', NULL, 48, 2, 8, 6, 4, '2020-09-12 05:13:13', '2020-09-28 09:34:09'),
(18, 'Áo thun nam ATC0-1207', 'ao-thun-nam-atc0-1207', 320000, 249996, 0, '3320__nik0514.jpg', '3320__nik0512.jpg,3320__nik0514%20(1).jpg,3320__nik0514.jpg,3320__nik0517.jpg,3320__nik0531.jpg', 35, 0, 1, 32, '<ul class=\"tab-control\" role=\"tablist\">\r\n<li class=\"active\" id=\"tab1\"><a href=\"https://h2tstore.vn/ao-thun-nam-atc0-1207.html#description\">MÔ TẢ CHI TIẾT</a></li>\r\n</ul>\r\n<div class=\"tab-content\">\r\n<div class=\"tab-pane active\" id=\"description\">\r\n<div class=\"content\">\r\n<p><img src=\"https://h2tstore.vn/media/product/3320__nik0517.jpg\" alt=\"\"></p>\r\n</div>\r\n</div>\r\n</div>', NULL, 40, 5, 18, 7, 3, '2020-09-12 21:50:24', '2020-09-23 08:53:36'),
(19, 'Giày thể thao G-0812', 'giay-the-thao-g-0812', 795000, 600000, 0, '2770_23_1.jpg', '2770_23_9.jpg,2770_23_8.jpg,2770_23_7.jpg,2770_23_6.jpg', 2, 0, 1, 0, '<p><strong>GIÀY NAM TRẺ TRUNG</strong></p>\r\n<p>Giày nam từng một thời \"làm mưa, làm gió\" và cho đến nay nó vẫn được ưa chuộng. Khi nhu cầu sử dụng cùng thị hiếu người tiêu dùng ngày càng cao thì bắt buộc những mẫu thiết kế giày càng phải thay đổi kiểu dáng liên tục để phù hợp với thị trường. Mẫu <strong>giày thể thao G-0812</strong> sẽ mang đến cho bạn phong cách giày thể thao mới nhất.<strong> </strong></p>\r\n<p><strong>Chất liệu: </strong>Sợi vải đan.</p>\r\n<p><strong>Thiết kế giày: </strong></p>\r\n<ul>\r\n<li>Giày được thiết kế dáng thể thao khỏe khoắn.</li>\r\n<li>Điểm khác biệt là giày được thiết kế đế cao 2-3p, thân giày chun nỉ co giãn thoải mái.</li>\r\n</ul>\r\n<p><strong>Màu sắc: </strong>Đen, Trắng</p>\r\n<p><strong>Size hiện có: </strong>38, 39, 40, 41, 42, 43</p>\r\n<p><strong>Mix and Match: </strong></p>\r\n<ul>\r\n<li>Kiểu dáng được thiết kế Basic nên dễ dàng kết hợp với bất kỳ 1 set đồ nào từ đơn giản đến cá tính, trẻ trung.</li>\r\n</ul>', NULL, 50, 0, 0, 19, 1, '2020-09-29 11:04:08', '2020-09-29 11:06:22'),
(20, 'Chelsea boots nam G-1001', 'chelsea-boots-nam-g-1001', 890000, 700000, 0, '2987__nik8523.jpg', '2987__nik8526.jpg,2987__nik8525.jpg,2987__nik8525%20(1).jpg,2987__nik8524%20(1).jpg,2987__nik8523.jpg', 2, 0, 1, 0, '<p><strong>GIÀY NAM CỰC CHẤT</strong></p>\r\n<p>Boots nam là một trong những mẫu giày cực hot thời gian gần đây. Thiết kế từ chất liệu da, những mẫu giày nam ngày càng được biến tấu đẹp hơn, hợp thời trang hơn. Mẫu <span><a href=\"https://h2tstore.vn/giay-da-nam.html\">Giày nam</a></span><strong> Chealsea Boots nam G-1001</strong> sẽ đốn ngã những tín đồ giày Boots từ ánh nhìn đầu tiên.</p>\r\n<p><strong>Chất liệu:</strong> Da trơn.</p>\r\n<p><strong>Thiết kế giày: </strong></p>\r\n<ul>\r\n<li>Thiết kế cổ giày cao quá mắt cá chân dễ đi không bị vướng gót.</li>\r\n<li>Đế gỗ chắc chắn.</li>\r\n</ul>\r\n<p><strong>Màu sắc:</strong> Đen</p>\r\n<p><strong>Size hiện có:</strong> 38, 39, 40, 41, 42, 43</p>\r\n<p><strong>Mix and Match:</strong> </p>\r\n<ul>\r\n<li>Còn gì hợp gout hơn khi <strong>Đôi Chelsea boots nam G-1001</strong> kế hợp cùng <span><a href=\"https://h2tstore.vn/quan-bo-nam.html\">quần jean</a></span>, vài chiếc <a href=\"https://h2tstore.vn/ao-thun.html\">á<span>o nỉ</span></a> dài tay trông bạn rất bảnh đó nhé.</li>\r\n</ul>', NULL, 30, 0, 0, 19, 5, '2020-09-29 11:08:59', NULL),
(22, 'Quần jean nam QJD0-1199', 'quan-jean-nam-qjd0-1199', 580000, 400000, 0, '3311__nik8617.jpg', '3311__nik8618.jpg,3311__nik8617.jpg,3311__nik8617%20(1).jpg,3311__nik8616.jpg,3311__nik8611.jpg', 2, 0, 1, 0, 'hàng đẹp chất lượng cao', NULL, 20, 0, 0, 16, 6, '2020-09-29 11:17:29', NULL),
(23, 'Quần hộp kaki co giãn Q-0319', 'quan-hop-kaki-co-gian-q-0319', 199000, 100000, 0, '2201_0319%20(1).jpg', '2201_9190351084_2145446%20(1).jpg,2201_13_4.jpg,2201_13_3.jpg,2201_0319.jpg,2201_0319%20(1).jpg', 3, 0, 1, 2, '<p><strong><span>QUẦN TÚI HỘP CÁ TÍNH</span></strong></p>\r\n<p><span>Gần đây, những chiếc quần túi hộp đã quay lại phổ biến hơn bao giờ hết. Thật dễ dàng để bạn biến phong cách thời trang của mình trở nên chất hơn với <strong>Quần hộp Kaki Q- 0530 </strong>mà <a href=\"https://h2tshop.com/\">H2T </a>mang đến cho bạn</span></p>\r\n<p><span><strong>Chất liệu</strong>: Kaki dày dặn, bền màu</span></p>\r\n<h1><span>Thiết kế:</span></h1>\r\n<ul>\r\n<li><span><strong>Quần hộp Kaki Q- 0530<span> </span></strong>có 2 sắc màu đen và ghi rất dễ trong việc phối đồ, đặc biệt màu đen đang được nhiều bạn trẻ yêu thích bởi sự bí ẩn, cá tính mạnh mẽ.</span></li>\r\n<li><span><strong>Quần hộp Kaki Quần- 0530</strong> có ống rộng vừa phải tạo cảm giác thoải mái không quá bó sát khó chịu, cùng với những chiếc túi hộp to rất phù hợp cho những chàng trai thích sự thoải mái mang phong cách phong trần cá tính.</span></li>\r\n</ul>\r\n<p><span><strong>Màu sắc</strong>:  Ghi  </span></p>\r\n<p><span><strong>Size hiện có sẵn</strong>: S, M, L, XL, XXL</span></p>\r\n<h1><span>Mix and Match:</span></h1>\r\n<ul>\r\n<li><span>Với chiếc quần <strong>Quần hộp Kaki Q- 0530</strong> không khó để bạn phối cùng những chiếc <a href=\"https://h2tshop.com/so-mi-dai-tay.html\">Áo sơ mi</a> oversized.</span></li>\r\n<li><span><a href=\"https://h2tshop.com/quan-kaki/c6.html\">Quần hộp Kaki</a> + Áo phông + <a href=\"https://h2tshop.com/tui-xach/c29.html\">Túi khoác chéo </a>sẽ giúp bạn nhìn trông cá tính.</span></li>\r\n</ul>', NULL, 18, 0, 0, 15, 7, '2020-09-29 11:20:47', NULL),
(24, 'Áo phông Justmen AP-0754', 'ao-phong-justmen-ap-0754', 150000, 80000, 0, '2731_0754%20(2).jpg', '2731_1_8.jpg,2731_1_7.jpg,2731_1_6.jpg,2731_0754%20(2).jpg,2731_0754%20(1).jpg', 3, 0, 1, 1, '<div id=\"product-detail-bottom-left\">\r\n<div class=\"article describe detail-tab info_tab clearfix\">\r\n<div class=\"tab-content\">\r\n<div class=\"tab-pane active\" id=\"description\">\r\n<div class=\"content\">\r\n<p><img src=\"https://h2tstore.vn/media/product/2731_1_7.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_8.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_4.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_3.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_1.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_2.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_6.jpg\" alt=\"\"><img src=\"https://h2tstore.vn/media/product/2731_1_5.jpg\" alt=\"\"></p>\r\n</div>\r\n</div>\r\n</div>\r\n<ul class=\"tab-control\" role=\"tablist\" id=\"binhluan\">\r\n<li class=\"active\"><a href=\"https://h2tstore.vn/ao-phong-polo-justmen-ap-0754.html#comment\">BÌNH LUẬN<span> </span><span class=\"ducdt_review_count\">(0)</span></a></li>\r\n</ul>\r\n<div class=\"tab-pane pt-0\" id=\"comment\">\r\n<div class=\"comment-form\"><form action=\"https://h2tstore.vn/ajax/post_comment.php\" method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return check_field(0)\" class=\"form-post m-0\">\r\n<div class=\"relative\"><textarea name=\"user_post[content]\" placeholder=\"Mời bạn viết đánh giá về sản phẩm này, vui lòng viết tiếng Việt có dấu\" id=\"content0\"></textarea>\r\n<div class=\"group-form\"></div>\r\n</div>\r\n</form></div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"product-detail-bottom-right\">\r\n<div class=\"article news detail-tab clearfix\">\r\n<ul class=\"tab-control\" role=\"tablist\">\r\n<ul class=\"tab-control\" role=\"tablist\">\r\n<li role=\"presentation\" class=\"active\"><a href=\"https://h2tstore.vn/ao-phong-polo-justmen-ap-0754.html#news\" aria-controls=\"home\" role=\"tab\" data-toggle=\"tab\">TIN TỨC NỔI BẬT</a></li>\r\n</ul>\r\n</ul>\r\n<span> </span>\r\n<ul class=\"tab-control\" role=\"tablist\">\r\n<li class=\"view-all\"><a href=\"https://h2tstore.vn/tin-tuc\">Xem hết</a></li>\r\n</ul>\r\n<div class=\"tab-content\">\r\n<div role=\"tabpanel\" class=\"tab-pane active\">\r\n<div class=\"item\">\r\n<div class=\"image\"><img src=\"https://h2tstore.vn/media/news/120_116__26a3967.jpg\" alt=\"CUỐI TUẦN MẶC GÌ ĐI CHƠI\"></div>\r\n<a href=\"https://h2tstore.vn/cuoi-tuan-mac-gi-di-choi.html\" class=\"clearfix\"></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', NULL, 19, 2, 3, 7, 2, '2020-09-29 11:23:21', '2020-09-29 11:31:30'),
(25, 'Áo Sơ Mi SMR18-0040', 'ao-so-mi-smr18-0040', 99000, 50000, 0, '1759_0040%20(1).jpg', '1759__dsc6931.jpg,1759__dsc6923.jpg,1759__dsc6919.jpg,1759_0040.jpg,1759_0040%20(1).jpg', 3, 0, 1, 2, '<h1><strong>Mô tả sản phẩm</strong></h1>\r\n<div class=\"box-detail\">\r\n<p><strong>Sơ mi denim ắt hẳn là một cái tên không mấy xa lạ đối với những gã trai ngông nghênh, trên người đầy bụi bặm cá tính. Chỉ với chiếc<a href=\"https://h2tshop.com/so-mi-dai-tay/c11.html\"><span> </span>sơ mi dài tay</a> đơn giản, nhưng hiệu quả của cách phối đồ này đem lại nhiều bất ngờ. Dù bạn lặp lại phong cách này liên tục thì chỉ với một chút biến tấu nhỏ là bạn sẽ luôn cá tính trong mắt người đối diện. Cùng<span> </span><a href=\"https://h2tshop.com/\">H2tshop<span> </span></a>điểm danh các mãu sơ mi nam dài tay nhé!</strong></p>\r\n</div>\r\n<p><strong>👑 Chất liệu:</strong> demi</p>\r\n<p><strong>👑 Màu sắc:</strong> Nâu, Xanh đen, Đen</p>\r\n<p><strong>👑 Size hiện có sẵn: M, L, XL, XXL</strong></p>\r\n<p><strong>👑 Thiết kế áo:</strong> <strong>Kiểu Classic cổ điển -</strong> cổ Đức (hay Narro Point). Khi đóng cúc áo trên cùng, hai bên cổ tạo với nhau một góc tầm 80-90 độ. Phần cổ thường được bôi một lớp hồ cứng nhằm cố định, khiến cổ áo cứng cáp hơn, không bị rũ. Cúc cài, vạt áo vát nhẹ và có cúc ở cổ tay áo. </p>\r\n<p>🚹<span> </span><strong>Áo Sơ Mi Nam SMR18-0040</strong><span> </span>+ Quần shorts chinos,<span> </span><a href=\"https://h2tshop.com/quan-ngo/c13.html\"><strong>quần shorts jeans</strong></a>, quần shorts nỉ đều dễ dàng kết thân với sơ mi denim.</p>\r\n<p>🚹<span> </span><strong>Áo Sơ Mi Nam SMR18-0040</strong><span> </span>Với khí hậu nóng bức của Việt Nam, mở khuy cổ áo đôi khi lại nam tính hơn nhiều. Về quần, bạn có thể chọn quần tây,<span> </span><a href=\"https://h2tshop.com/quan-kaki/c6.html\"><strong>quần kaki</strong><span> </span></a>hoặc<span> </span><a href=\"https://h2tshop.com/quan-bo-nam/c5.html\"><strong>quần jeans</strong></a><span> </span>tùy thích.</p>\r\n<p>🚹<span> </span><strong>Áo Sơ Mi Nam SMR18-0040<span> </span></strong>làm khoác ngoài<span> </span><a href=\"https://h2tshop.com/ao-phong-ao-thun-nam/c8.html\"><strong>áo phông</strong></a>, mặc cùng quần jeans khác tông màu hoặc quần kaki đơn giản. Thông thường nam giới hay kết hợp với áo phông trắng mặc bên trong. Tuy nhiên, với những chiếc sơ mi đậm màu, bạn có thể mặc cùng với áo phông đen hoặc tối màu, hiệu ứng đem lại sẽ làm bạn bất ngờ đấy.</p>', NULL, 18, 4, 13, 6, 5, '2020-09-29 11:25:49', '2020-09-29 11:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE `products_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_product_id` bigint(20) UNSIGNED NOT NULL,
  `prod_color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `prod_size_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`id`, `prod_product_id`, `prod_color_id`, `prod_size_id`) VALUES
(2, 3, 2, 2),
(6, 7, 3, 4),
(7, 8, 5, 5),
(12, 14, 5, 3),
(13, 15, 7, 3),
(19, 4, 3, 2),
(20, 18, 5, 1),
(21, 16, 2, 1),
(22, 6, 4, 2),
(23, 1, 1, 1),
(24, 5, 2, 3),
(28, 19, 2, 1),
(29, 20, 5, 6),
(33, 22, 7, 8),
(34, 23, 3, 9),
(36, 24, 8, 3),
(37, 25, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_keywords`
--

CREATE TABLE `products_keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pk_product_id` bigint(20) UNSIGNED NOT NULL,
  `pk_keyword_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_keywords`
--

INSERT INTO `products_keywords` (`id`, `pk_product_id`, `pk_keyword_id`) VALUES
(22, 14, 4),
(23, 15, 3),
(27, 7, 3),
(28, 8, 3),
(29, 3, 2),
(39, 4, 3),
(40, 18, 2),
(41, 16, 2),
(42, 6, 3),
(43, 1, 2),
(44, 5, 2),
(48, 19, 2),
(49, 20, 2),
(53, 22, 4),
(54, 23, 7),
(56, 24, 3),
(57, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `r_user_id` int(11) NOT NULL DEFAULT 0,
  `r_product_id` int(11) NOT NULL DEFAULT 0,
  `r_status` tinyint(4) NOT NULL DEFAULT 0,
  `r_number` tinyint(4) NOT NULL DEFAULT 0,
  `r_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `r_user_id`, `r_product_id`, `r_status`, `r_number`, `r_content`, `created_at`, `updated_at`) VALUES
(83, 1, 18, 0, 3, 'sản phẩm tạm được', '2020-09-18 20:12:51', '2020-09-18 20:12:51'),
(84, 1, 18, 0, 1, 'san pham tuyet voi. Lan sau toi se mua no', '2020-09-19 00:13:09', '2020-09-19 00:13:09'),
(85, 1, 18, 0, 4, 'sản phẩm bình thường', '2020-09-19 00:13:47', '2020-09-19 00:13:47'),
(86, 1, 18, 0, 5, 'sản phẩm trên cả tuyệt vời', '2020-09-19 00:14:16', '2020-09-19 00:14:16'),
(87, 1, 18, 0, 5, 'sản phẩm đẹp chắc chắn', '2020-09-19 00:14:35', '2020-09-19 00:14:35'),
(88, 1, 15, 0, 2, 'sản phẩm tương đối tệ', '2020-09-19 00:15:12', '2020-09-19 00:15:12'),
(89, 1, 15, 0, 2, 'giao hàng chậm', '2020-09-19 00:15:28', '2020-09-19 00:15:28'),
(90, 1, 15, 0, 5, 'sản phẩm tuyệt vời', '2020-09-19 00:15:41', '2020-09-19 00:15:41'),
(91, 1, 15, 0, 5, 'giao hàng nhanh hàng đẹp chất lượng nhân viên nhiệt tình', '2020-09-19 00:16:02', '2020-09-19 00:16:02'),
(92, 9, 15, 0, 2, 'tạm được', '2020-09-19 01:43:16', '2020-09-19 01:43:16'),
(94, 9, 16, 0, 3, 'sản phẩm này khá ok', '2020-09-28 09:34:09', '2020-09-28 09:34:09'),
(95, 9, 25, 0, 5, 'sản phẩm quá tuyệt vời . t đã mua 2 cái', '2020-09-29 11:28:09', '2020-09-29 11:28:09'),
(96, 9, 24, 0, 1, 'sản phẩm khá tệ', '2020-09-29 11:28:33', '2020-09-29 11:28:33'),
(97, 9, 25, 0, 3, 'tạm được', '2020-09-29 11:28:48', '2020-09-29 11:28:48'),
(98, 9, 25, 0, 1, 'cực kì tệ', '2020-09-29 11:29:03', '2020-09-29 11:29:03'),
(99, 12, 25, 0, 4, 'sản phẩm đẹp chất lượng nhưng giao hàng hơi chậm', '2020-09-29 11:31:09', '2020-09-29 11:31:09'),
(100, 12, 24, 0, 2, 'sản phẩm tệ được mỗi giao hàng nhanh', '2020-09-29 11:31:30', '2020-09-29 11:31:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '[\"admin.get.login\",\"admin.get.register\",\"admin.get.error\",\"admin.get.profile\",\"admin.index\",\"admin.get.logout\",\"admin.category.index\",\"admin.category.view\",\"admin.category.create\",\"admin.category.update\",\"admin.category.active\",\"admin.category.hot\",\"admin.category.delete\",\"admin.product.index\",\"admin.product.view\",\"admin.product.create\",\"admin.product.update\",\"admin.product.active\",\"admin.product.hot\",\"admin.product.delete\",\"admin.image.index\",\"admin.keyword.index\",\"admin.keyword.create\",\"admin.keyword.update\",\"admin.keyword.hot\",\"admin.keyword.delete\",\"admin.brand.index\",\"admin.brand.create\",\"admin.brand.update\",\"admin.brand.hot\",\"admin.brand.delete\",\"admin.user.index\",\"admin.user.status\",\"admin.user.create\",\"admin.user.update\",\"admin.user.delete\",\"admin.client.index\",\"admin.client.view\",\"admin.client.status\",\"admin.client.delete\",\"admin.rating.index\",\"admin.rating.delete\",\"admin.slide.index\",\"admin.slide.create\",\"admin.slide.update\",\"admin.slide.active\",\"admin.slide.delete\",\"admin.order.index\",\"admin.order.delete\",\"ajax.admin.order.order_detail.delete\",\"ajax.admin.order.detail\",\"admin.order.action\",\"admin.role.index\",\"admin.role.create\",\"admin.role.update\",\"admin.role.delete\",\"admin.menu.index\",\"admin.menu.create\",\"admin.menu.update\",\"admin.menu.active\",\"admin.menu.hot\",\"admin.menu.delete\",\"admin.article.index\",\"admin.article.create\",\"admin.article.update\",\"admin.article.active\",\"admin.article.hot\",\"admin.article.delete\"]', NULL, '2020-09-29 05:40:01'),
(11, 'CTV quản lý sản phẩm', '[\"admin.index\",\"admin.get.logout\",\"admin.product.index\",\"admin.product.view\",\"admin.product.create\",\"admin.product.update\",\"admin.product.active\",\"admin.product.hot\",\"admin.product.delete\",\"admin.keyword.index\",\"admin.keyword.create\",\"admin.keyword.update\",\"admin.keyword.hot\",\"admin.keyword.delete\",\"admin.brand.index\",\"admin.brand.create\",\"admin.brand.update\",\"admin.brand.hot\",\"admin.brand.delete\",\"admin.index\",\"admin.get.logout\"]', NULL, '2020-09-28 03:20:21'),
(12, 'CTV quản lý đơn hàng', '[\"admin.order.index\",\"admin.order.delete\",\"ajax.admin.order.order_detail.delete\",\"ajax.admin.order.detail\",\"admin.order.action\",\"admin.index\",\"admin.get.logout\"]', NULL, NULL),
(13, 'CTV quản lý system', '[\"admin.slide.index\",\"admin.slide.create\",\"admin.slide.update\",\"admin.slide.active\",\"admin.slide.delete\",\"admin.index\",\"admin.get.logout\"]', NULL, NULL),
(17, 'CTV quản lý danh mục', '[\"admin.category.index\",\"admin.category.view\",\"admin.category.create\",\"admin.category.update\",\"admin.category.active\",\"admin.category.hot\",\"admin.category.delete\",\"admin.product.index\",\"admin.product.view\",\"admin.product.create\",\"admin.product.update\",\"admin.product.active\",\"admin.product.hot\",\"admin.product.delete\",\"admin.index\",\"admin.get.logout\"]', NULL, NULL),
(18, 'khách', '[\"admin.index\",\"admin.get.logout\",\"admin.index\",\"admin.get.logout\"]', NULL, NULL),
(19, 'chỉ xem', '[\"admin.index\",\"admin.category.index\",\"admin.product.index\",\"admin.image.index\",\"admin.keyword.index\",\"admin.brand.index\",\"admin.user.index\",\"admin.rating.index\",\"admin.slide.index\",\"admin.order.index\",\"admin.role.index\"]', NULL, '2020-09-29 11:32:55'),
(20, 'CTV quản lý menu và bài viết', '[\"admin.menu.index\",\"admin.menu.create\",\"admin.menu.update\",\"admin.menu.active\",\"admin.menu.hot\",\"admin.menu.delete\",\"admin.article.index\",\"admin.article.create\",\"admin.article.update\",\"admin.article.active\",\"admin.article.hot\",\"admin.article.delete\",\"admin.index\",\"admin.get.logout\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_status` tinyint(4) DEFAULT NULL,
  `shipping_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `shipping_type`, `shipping_status`, `shipping_fee`, `created_at`, `updated_at`) VALUES
(1, 'giao hàng thường\r\n', 1, '30000', '2020-09-23 16:37:08', '2020-09-23 16:37:08'),
(2, 'giao hàng trong vòng 24h', 1, '50000', '2020-09-23 16:39:43', '2020-09-23 16:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sz_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sz_status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `sz_name`, `sz_status`, `created_at`, `updated_at`) VALUES
(1, 'M', 1, '2020-09-10 08:22:09', NULL),
(2, 'L', 1, '2020-09-10 08:33:41', NULL),
(3, 'S', 1, '2020-09-10 08:37:04', NULL),
(4, '29', 1, '2020-09-10 08:39:36', NULL),
(5, '30', 1, '2020-09-10 08:40:42', NULL),
(6, '40', 1, '2020-09-29 11:08:59', NULL),
(7, 'XXl', 1, '2020-09-29 11:12:59', NULL),
(8, '34', 1, '2020-09-29 11:17:29', NULL),
(9, '32', 1, '2020-09-29 11:20:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sd_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sd_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sd_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sd_target` tinyint(4) NOT NULL DEFAULT 1,
  `sd_action` tinyint(4) NOT NULL DEFAULT 1,
  `sd_sort` tinyint(4) NOT NULL DEFAULT 1,
  `sd_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `sd_title`, `sd_link`, `sd_image`, `sd_target`, `sd_action`, `sd_sort`, `sd_status`, `created_at`, `updated_at`) VALUES
(4, 'welcome to asusu shop', 'http://localhost/project/product', '14.jpg', 1, 1, 1, 1, '2020-09-22 02:53:22', '2020-09-22 03:21:25'),
(5, 'let get a look', 'http://localhost/project/product', '13.jpg', 1, 1, 2, 1, '2020-09-22 03:15:12', '2020-09-22 03:21:31'),
(7, 'shop now', 'http://localhost/project/product', '12.jpg', 1, 1, 3, 1, '2020-09-22 03:17:04', '2020-09-22 03:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `status`, `address`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'nguyễn quang', 'waitdou2212@gmail.com', NULL, 1, NULL, NULL, '$2y$10$fITL6ngNJYe.ftOgIWu2H.tgFXlVlh1x8O7V40axay.cEVLBjILyC', '0SvCQEU9Lppj5fhIVKOUwJmBqnRYR44DKVNLuYh8W333AgRf1XatbtdUS5LU', '2020-09-28 04:54:02', '2020-09-28 04:54:02'),
(16, 'nam', 'nam@gmail.com', NULL, 1, NULL, NULL, '$2y$10$yxVtjaBE2NQ5xuxVWpG2Vux6AZaTlEH6nE.qffkyhzu/ASk.KHVcK', NULL, '2020-09-28 16:40:48', '2020-09-28 16:40:48'),
(17, 'Admin manager', 'admin@gmail.com', NULL, 1, NULL, NULL, '$2y$10$7Ku4OcoxEiJBLdaTsIIQS.ODXSIhPuAgx8iSkzOEgQKw4fjH4HI..', NULL, '2020-09-28 03:22:20', NULL),
(18, 'cuong', 'cuong@gmail.com', NULL, 1, NULL, NULL, '$2y$10$AUxEf3JAbKb0K0HACOEwyOGz1hoUNVanyx4o4wIBH15m2MyY0PYua', NULL, '2020-09-28 04:39:09', '2020-09-28 04:39:09'),
(26, 'test', 'test@gmail.com', NULL, 0, NULL, NULL, '$2y$10$KAw.5.5A5KRkwT95EekxTuvuUEfi0h1jvjpMkopyd3jkwSloi6wa6', NULL, '2020-09-28 16:39:27', '2020-09-28 17:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(12, 1),
(16, 11),
(16, 12),
(17, 1),
(18, 18),
(26, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_a_slug_index` (`a_slug`),
  ADD KEY `articles_a_hot_index` (`a_hot`),
  ADD KEY `articles_a_status_index` (`a_status`),
  ADD KEY `articles_a_blog_id_index` (`a_menu_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_br_slug_unique` (`br_slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_c_slug_unique` (`c_slug`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_cl_name_unique` (`cl_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favourites_fa_user_id_fa_product_id_unique` (`fa_user_id`,`fa_product_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_k_slug_unique` (`k_slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_mn_slug_unique` (`mn_slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_pro_category_id_foreign` (`pro_category_id`),
  ADD KEY `products_pro_brand_id_foreign` (`pro_brand_id`);

--
-- Indexes for table `products_details`
--
ALTER TABLE `products_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_details_prod_product_id_foreign` (`prod_product_id`),
  ADD KEY `products_details_prod_color_id_foreign` (`prod_color_id`),
  ADD KEY `products_details_prod_size_id_foreign` (`prod_size_id`);

--
-- Indexes for table `products_keywords`
--
ALTER TABLE `products_keywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_keywords_pk_product_id_foreign` (`pk_product_id`),
  ADD KEY `products_keywords_pk_keyword_id_foreign` (`pk_keyword_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_sz_name_unique` (`sz_name`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products_details`
--
ALTER TABLE `products_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products_keywords`
--
ALTER TABLE `products_keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_pro_brand_id_foreign` FOREIGN KEY (`pro_brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_pro_category_id_foreign` FOREIGN KEY (`pro_category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `products_details`
--
ALTER TABLE `products_details`
  ADD CONSTRAINT `products_details_prod_color_id_foreign` FOREIGN KEY (`prod_color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `products_details_prod_product_id_foreign` FOREIGN KEY (`prod_product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_details_prod_size_id_foreign` FOREIGN KEY (`prod_size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `products_keywords`
--
ALTER TABLE `products_keywords`
  ADD CONSTRAINT `products_keywords_pk_keyword_id_foreign` FOREIGN KEY (`pk_keyword_id`) REFERENCES `keywords` (`id`),
  ADD CONSTRAINT `products_keywords_pk_product_id_foreign` FOREIGN KEY (`pk_product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
