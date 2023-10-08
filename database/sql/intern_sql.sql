/*
 Navicat Premium Data Transfer

 Source Server         : chipt
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : intern_sql

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 24/09/2023 17:36:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `coupons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipping` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `blog` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `setting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `returnorder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `review` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `orders` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `reports` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alluser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `adminuserrole` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` int NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_team_id` bigint UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'Admin', 'admin@gmail.com', '2023-08-20 21:07:38', '$2y$10$.9WWJ9q9SBCXMYft3Jg5u.2CjsEOCrzZUyvakxu2XkH2i3HDUdbmK', '0372953222', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '2OkPe5dhToZ356DFE08jOY22xYgjhWObXe3dmabMRMSwCbc1RqBYL0L0ueFu', NULL, '202308290704Phạm Thanh Chi.jpg', '2023-08-20 21:07:38', '2023-08-29 07:04:52');
INSERT INTO `admins` VALUES (2, 'Nhân Viên', 'staff@gmail.com', NULL, '$2y$10$BObEyLWL.Yn68dCO2.UWhexGEPjBsm1jUmHVhw8yg4AXzN81ccOsi', '0372953288', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'upload/admin-images/1776771534875029.jpg', '2023-09-11 19:43:06', '2023-09-11 19:43:06');

-- ----------------------------
-- Table structure for blog_post_categories
-- ----------------------------
DROP TABLE IF EXISTS `blog_post_categories`;
CREATE TABLE `blog_post_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_post_categories
-- ----------------------------
INSERT INTO `blog_post_categories` VALUES (2, 'KIẾN THỨC', 'kiến-thức', '2023-09-10 08:41:16', '2023-09-10 08:41:16');
INSERT INTO `blog_post_categories` VALUES (3, 'XU HƯỚNG', 'xu-hướng', '2023-09-10 08:41:41', '2023-09-10 08:41:41');
INSERT INTO `blog_post_categories` VALUES (4, 'PHONG CÁCH', 'phong-cách', '2023-09-10 08:41:27', '2023-09-10 08:41:27');

-- ----------------------------
-- Table structure for blog_posts
-- ----------------------------
DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE `blog_posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_posts
-- ----------------------------
INSERT INTO `blog_posts` VALUES (1, 2, 'Merino Wool - một trong ba loại len cao cấp nhất thế giới để tạo ra các kiệt tác mùa đông', 'merino-wool---một-trong-ba-loại-len-cao-cấp-nhất-thế-giới-để-tạo-ra-các-kiệt-tác-mùa-đông', 'upload/post/1776640032238888.jpg', '<p style=\"text-align:justify\"><em><strong>V&agrave;o m&ugrave;a đ&ocirc;ng, đồ len lu&ocirc;n l&agrave; sản phẩm để giữ ấm thượng thừa. Tuy vậy, c&oacute; v&ocirc; v&agrave;n chất liệu len kh&aacute;c nhau. Vậy loại len n&agrave;o l&agrave; tốt nhất? C&ugrave;ng IVY moda t&igrave;m hiểu th&ecirc;m về chất lượng len v&agrave; sản phẩm cao cấp m&agrave; ch&uacute;ng ta đang lựa chọn sử dụng trong m&ugrave;a lạnh n&agrave;y.</strong></em></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Chất liệu len đ&atilde; được con người sử dụng từ c&aacute;ch đ&acirc;y &iacute;t nhất 6000 năm trước C&ocirc;ng Nguy&ecirc;n. Người Iran cổ đại l&agrave; người đầu ti&ecirc;n thuần ho&aacute; cừu, lấy len để giữ ấm cơ thể. Với nhiều ưu điểm như: khả năng giữ ấm; kh&ocirc;ng thấm nước; kh&ocirc;ng bắt lửa; tự l&agrave;m sạch&hellip; len trở th&agrave;nh một trong những nguy&ecirc;n liệu phổ biến của nhiều mặt h&agrave;ng như: quần &aacute;o, chăn, ga, gối, găng tay&hellip;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Trải qua h&agrave;ng ngh&igrave;n năm đến ng&agrave;y nay, c&ugrave;ng với sự ph&aacute;t triển mạnh của ng&agrave;nh c&ocirc;ng nghiệp thời trang v&agrave; nhu cầu mạnh mẽ của kh&aacute;ch h&agrave;ng trong việc y&ecirc;u cầu khắt khe hơn về chất liệu. Len l&ocirc;ng cừu đ&atilde; từng bước đạt được sự h&agrave;i l&ograve;ng v&agrave; trở th&agrave;nh một chất liệu được ưa chuộng, gi&uacute;p định h&igrave;nh phong c&aacute;ch c&aacute; nh&acirc;n cho người mặc cũng như tạo nhiều cảm hứng cho c&aacute;c nh&agrave; thiết kế thời trang.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/10/ca0a042e134b69210d91ffb81fa5ec7b.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Kh&ocirc;ng chỉ ri&ecirc;ng c&aacute;c thương hiệu nổi tiếng tr&ecirc;n thế giới ch&uacute; trọng v&agrave;o chất liệu n&agrave;y, m&agrave; nh&agrave; mốt IVY moda đ&atilde; ti&ecirc;n phong trong việc hợp t&aacute;c với c&ocirc;ng ty Woolmark, mang d&ograve;ng len l&ocirc;ng cừu cao cấp về thị trường Việt Nam. Để t&igrave;m hiểu th&ecirc;m về loại len l&ocirc;ng cừu, ch&uacute;ng ta cần biết rằng, với mỗi loại động vật sẽ cho ra một loại len với chất lượng kh&aacute;c nhau. Trong đ&oacute;, len l&ocirc;ng cừu được sử dụng nhiều nhất ( 96-97%), l&ocirc;ng d&ecirc; (2%), l&ocirc;ng lạc đ&agrave; (1%), kh&aacute;c như thỏ, b&ograve;,&hellip;(1%). V&agrave; trong trường hợp, c&ugrave;ng một loại động vật nhưng khi ch&uacute;ng được nu&ocirc;i dưỡng trong những điều kiện kh&aacute;c nhau hoặc độ tuổi kh&aacute;c nhau cũng cho ra chất lượng l&ocirc;ng kh&aacute;c nhau. Chất lượng len c&ograve;n phụ thuộc v&agrave;o vị tr&iacute; l&ocirc;ng tr&ecirc;n cơ thể của c&aacute;c lo&agrave;i động vật. Lớp l&ocirc;ng trong c&ugrave;ng, gần với bề mặt da nhất sẽ l&agrave; lớp l&ocirc;ng c&oacute; gi&aacute; trị nhất. Bởi ch&uacute;ng l&agrave; những sợi tơ mịn nhất v&agrave; c&oacute; khả năng giữ ấm tốt nhất. Ngo&agrave;i ra độ d&agrave;i của sợ l&ocirc;ng; độ mịn (đường k&iacute;nh đo bằng micron) cũng ảnh hưởng đến chất lượng của sợi len.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><em><strong>V&igrave; sao IVY moda lựa chọn Len Merino (Merino Wool) để chế t&aacute;c ra c&aacute;c sản phẩm cao cấp?</strong></em></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Khi xu hướng sử dụng c&aacute;c sản phẩm may mặc, thời trang quay về gi&aacute; trị bản ng&atilde; của n&oacute;, tức chất liệu được ch&uacute; trọng h&agrave;ng đầu b&ecirc;n cạnh kiểu d&aacute;ng, len cừu Merino đ&atilde; được chọn lựa. Len cừu Merino &Uacute;c l&agrave; kết quả của nhiều năm nghi&ecirc;n cứu v&agrave; ph&aacute;t triển. B&ecirc;n cạnh rất nhiều giống cừu c&oacute; thể tạo l&ocirc;ng l&agrave;m len như: cừu Roughe Fell, cừu Soay, cừu Texel&hellip; th&igrave; Merino l&agrave; giống cừu tốt nhất với lớp l&ocirc;ng mềm mịn, xốp, độ d&agrave;i l&ocirc;ng ph&ugrave; hợp nhất cho việc sản xuất c&aacute;c loại sợi.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Hơn thế nữa, Merino Wool l&agrave; một trong top 3 chất liệu len h&agrave;ng đầu thế giới, b&ecirc;n cạnh loại Virgin Wool (Len nguy&ecirc;n chất) v&agrave; len Cashmere. IVY moda sẽ giới thiệu v&agrave; chia sẻ cụ thể hơn về loại len thương hạng n&agrave;y.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/10/ec5c001389353b6353b6a07410d964af.png\" /></p>\r\n\r\n<p style=\"text-align:justify\">Ch&uacute;ng ta thường &iacute;t c&oacute; nhận thức r&otilde; được về chất liệu cao cấp, đặc biệt hơn l&agrave; chất liệu cao cấp th&acirc;n thiện với m&ocirc;i trường. Với len Merino (Merino Wool), đ&acirc;y l&agrave; loại l&ocirc;ng l&yacute; tưởng, mềm mịn nhất trong c&aacute;c loại l&ocirc;ng cừu. Mỗi sợi l&ocirc;ng Merino c&oacute; thể được uốn cong hơn 20.000 lần m&agrave; kh&ocirc;ng sợ bị đứt g&atilde;y, d&ugrave; n&oacute; chỉ mảnh bằng 1/5 t&oacute;c người. Điều n&agrave;y tạo ra t&iacute;nh đ&agrave;n hồi tuyệt vời của vải len Merino sau khi được dệt, c&oacute; thể chế tạo c&aacute;c sản phẩm b&oacute; s&aacute;t cơ thể m&agrave; vẫn giữ ấm, giữ form d&aacute;ng ban đầu. Xơ len Merino dễ uốn cong, triệt ti&ecirc;u cảm gi&aacute;c ch&acirc;m tr&iacute;ch, ngứa ng&aacute;y khi tiếp x&uacute;c với bề mặt da, chống tia UV, khả năng chống ch&aacute;y v&agrave; t&iacute;nh linh hoạt trong sử dụng. Nghi&ecirc;n cứu gần đ&acirc;y c&ograve;n cho thấy khả năng trị liệu của len Merino si&ecirc;u mịn đối với những người bị dị ứng da.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/10/e0b68618804debbdcc32dad1a45bf70c.png\" /></p>\r\n\r\n<p style=\"text-align:justify\">Bởi vậy, len cừu Merino được ứng dụng để sản xuất rất nhiều loại trang phục, kh&ocirc;ng loại trừ bất cứ một sản phẩm n&agrave;o &ldquo;từ đầu đến ch&acirc;n&rdquo;, &ldquo;từ trong ra ngo&agrave;i&rdquo; như: &aacute;o len, &aacute;o ống, khăn qu&agrave;ng, găng tay, tất, quần denim từ chất liệu len, lớp l&oacute;t của gi&agrave;y thể thao, lớp giữ ấm của boot m&ugrave;a Đ&ocirc;ng&hellip; Thậm ch&iacute;, len cừu Merino với độ tho&aacute;ng kh&iacute; cao, giữ ấm v&agrave;o m&ugrave;a Đ&ocirc;ng, giữ ẩm tốt v&agrave;o m&ugrave;a H&egrave;, c&ograve;n được ứng dụng để sản xuất những chiếc &aacute;o T-shirt, jacket thể thao đ&ograve;i hỏi độ mềm, dễ cử động, co gi&atilde;n tốt.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/10/603df88bc5b6b00794264846221ea3e7.png\" /></p>\r\n\r\n<p style=\"text-align:justify\">Tại Việt Nam, với kh&iacute; hậu nhiệt đới lạnh gi&aacute; m&ugrave;a Đ&ocirc;ng, n&oacute;ng ẩm m&ugrave;a H&egrave; &ndash; đ&acirc;y l&agrave; thi&ecirc;n đường để len cừu Merino ph&aacute;t huy t&aacute;c dụng của m&igrave;nh: Giữ ấm m&ugrave;a Đ&ocirc;ng v&agrave; giữ ẩm m&ugrave;a H&egrave; để tạo sự m&aacute;t mẻ cho cơ thể. Len cừu Merino c&oacute; khả năng h&uacute;t ẩm v&agrave; nhả ẩm khi điều kiện kh&iacute; hậu xung quanh thay đổi. Sợi len c&oacute; cấu tr&uacute;c tế b&agrave;o phức tạp gi&uacute;p n&oacute; c&oacute; thể hấp thụ hơi ẩm đến 35% trọng lượng của n&oacute;, nhưng đẩy chất lỏng cho ph&eacute;p giải ph&oacute;ng ẩm khỏi cơ thể người v&agrave; bay hơi. Điều n&agrave;y tạo ra cho len những đặc t&iacute;nh tiện nghi tuyệt vời v&agrave; l&agrave;m cho len c&oacute; thể &ldquo;h&iacute;t thở/h&ocirc; hấp&rdquo; được. Hơn nữa, len cừu Merino lại c&oacute; khả năng chống mưa, gi&oacute; để bảo vệ người mặc như ch&iacute;nh những ch&uacute; cừu Merino tự điều h&ograve;a tr&ecirc;n c&aacute;nh đồng cỏ khi gặp nắng, mưa, tự chống thấm, tự giữ độ ẩm&hellip; Tất cả những đặc t&iacute;nh tự nhi&ecirc;n ấy của l&ocirc;ng cừu Merino được đưa v&agrave;o sợi len.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/10/cb61beb39440d0c340251a60941ce9df.png\" /><img alt=\"image\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/10/3d2fdc7a3cb512b4aecb1ea422b04ed0.png\" /></p>\r\n\r\n<p style=\"text-align:justify\">Cuối c&ugrave;ng, những kiệt t&aacute;c của IVY moda được c&aacute;c nghệ nh&acirc;n đẳng cấp thực hiện tỉ mỉ v&agrave; trau chuốt trong từng chi tiết, mỗi thiết kế đều được kiểm định chất lượng nghi&ecirc;m ngặt với c&ocirc;ng đoạn xử l&yacute; thủ c&ocirc;ng h&agrave;ng trăm giờ đồng hồ. C&aacute;c mũi kh&acirc;u tinh tế, phom d&aacute;ng chuẩn từng centimet mang đến đẳng cấp kh&aacute;c biệt, cho ra những sản phẩm thủ c&ocirc;ng nhưng v&ocirc; c&ugrave;ng hiện đại, đến tay c&aacute;c kh&aacute;ch h&agrave;ng y&ecirc;u qu&yacute; của IVY moda.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>', '2023-09-10 08:52:48', NULL);
INSERT INTO `blog_posts` VALUES (2, 3, 'Ngọc Anh “Phố trong làng” gợi ý chị em sắm áo dạ cừu Merino chuẩn xu hướng mới nhất với style sang xịn mịn lại còn dễ phối đồ', 'ngọc-anh-“phố-trong-làng”-gợi-ý-chị-em-sắm-áo-dạ-cừu-merino-chuẩn-xu-hướng-mới-nhất-với-style-sang-xịn-mịn-lại-còn-dễ-phối-đồ', 'upload/post/1776640332827433.png', '<p style=\"text-align:justify\">Chiếc &aacute;o dạ với chất liệu l&ocirc;ng cừu Merino đang l&agrave; lựa chọn ưu việt nhất cho c&aacute;c chị em, gi&aacute; th&agrave;nh hợp l&yacute;, giữ ấm mặc đẹp v&agrave; diện cả được ở những nơi lạnh &acirc;m độ.</p>\r\n\r\n<p style=\"text-align:justify\">Năm nay Tết đến sớm, cảm gi&aacute;c thời điểm cuối năm c&ocirc;ng suất phải tất bật hơn hẳn mọi năm. Mới Noel v&agrave;i h&ocirc;m l&agrave; đ&atilde; phải sắm sửa đồ đẹp cho một năm mới ấm &aacute;p v&agrave; may mắn. N&agrave;ng y t&aacute; xinh đẹp Ngọc Anh của &ldquo;Phố trong l&agrave;ng&rdquo; kh&ocirc;ng ngại bật m&iacute; cho hội chị em chiếc &aacute;o thần kỳ n&ecirc;n sắm cho tủ đồ đ&ocirc;ng. &Aacute;o dạ l&ocirc;ng cừu với chất liệu Merino Wool - một trong ba loại len cao cấp nhất thế giới sẽ kh&ocirc;ng l&agrave;m ai phải thất vọng m&agrave; c&ograve;n gi&uacute;p tiết kiệm khối thời gian để chuẩn bị cho một năm mới đầy may mắn, thần th&aacute;i sang chảnh v&agrave; xinh đẹp hơn.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/d73feb675c50e6e54dc6aaf81eb10019.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Kiệt t&aacute;c n&agrave;y được c&aacute;c nghệ nh&acirc;n đẳng cấp thực hiện tỉ mỉ v&agrave; trau chuốt trong từng chi tiết, mỗi thiết kế đều được kiểm định chất lượng nghi&ecirc;m ngặt với c&ocirc;ng đoạn xử l&yacute; thủ c&ocirc;ng h&agrave;ng trăm giờ đồng hồ.</p>\r\n\r\n<h2 style=\"text-align:justify\">V&igrave; sao Merino Wool xứng đ&aacute;ng được nhiều chị em y&ecirc;u th&iacute;ch v&agrave; lựa chọn cho m&ugrave;a đ&ocirc;ng?</h2>\r\n\r\n<p style=\"text-align:justify\">Khi xu hướng sử dụng c&aacute;c sản phẩm may mặc, thời trang quay về gi&aacute; trị bản ng&atilde; của n&oacute;, tức chất liệu được ch&uacute; trọng h&agrave;ng đầu b&ecirc;n cạnh kiểu d&aacute;ng, len cừu Merino đ&atilde; được chọn lựa. Len cừu Merino &Uacute;c l&agrave; kết quả của nhiều năm nghi&ecirc;n cứu v&agrave; ph&aacute;t triển. B&ecirc;n cạnh rất nhiều giống cừu c&oacute; thể tạo l&ocirc;ng l&agrave;m len như: cừu Roughe Fell, cừu Soay, cừu Texel&hellip; th&igrave; Merino l&agrave; giống cừu tốt nhất với lớp l&ocirc;ng mềm mịn, xốp, độ d&agrave;i l&ocirc;ng ph&ugrave; hợp nhất cho việc sản xuất c&aacute;c loại sợi. Hơn thế nữa, Merino Wool l&agrave; một trong top 3 chất liệu len h&agrave;ng đầu thế giới, b&ecirc;n cạnh loại Virgin Wool (Len nguy&ecirc;n chất) v&agrave; len Cashmere.</p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;c mũi kh&acirc;u tinh tế, form d&aacute;ng chuẩn từng centimet mang đến đẳng cấp kh&aacute;c biệt, đảm bảo cho ra những sản phẩm thủ c&ocirc;ng nhưng v&ocirc; c&ugrave;ng hiện đại đến tay c&aacute;c qu&yacute; c&ocirc; xinh đẹp.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/eb3c5d787ac773c109fee5930d49df91.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\"><em>Nữ diễn vi&ecirc;n của &ldquo;Phố trong l&agrave;ng&rdquo; c&ograve;n khoe c&ocirc; nghiện mặc &aacute;o dạ l&ocirc;ng cừu n&agrave;y v&igrave; n&oacute; &quot;chữa&quot; được&nbsp;t&iacute;nh dị ứng sự xổ v&agrave; x&ugrave; l&ocirc;ng của &aacute;o dạ th&ocirc;ng thường sau khi giặt của c&ocirc; n&agrave;ng. Ngọc Anh chia sẻ rằng&nbsp;loại l&ocirc;ng cừu đắt gi&aacute; n&agrave;y chắc chắn sẽ trở th&agrave;nh chất liệu thịnh&nbsp;h&agrave;nh&nbsp;được mọi nh&agrave; mốt lựa chọn cho c&aacute;c sản phẩm thời trang Thu Đ&ocirc;ng.</em></p>\r\n\r\n<p style=\"text-align:justify\">Ch&uacute;ng ta thường &iacute;t c&oacute; nhận thức r&otilde; được về chất liệu cao cấp, đặc biệt hơn l&agrave; chất liệu cao cấp th&acirc;n thiện với m&ocirc;i trường. Với len Merino (Merino Wool), đ&acirc;y l&agrave; loại l&ocirc;ng l&yacute; tưởng, mềm mịn nhất trong c&aacute;c loại l&ocirc;ng cừu. Mỗi sợi l&ocirc;ng Merino c&oacute; thể được uốn cong hơn 20.000 lần m&agrave; kh&ocirc;ng sợ bị đứt g&atilde;y, d&ugrave; n&oacute; chỉ mảnh bằng 1/5 t&oacute;c người. Điều n&agrave;y tạo ra t&iacute;nh đ&agrave;n hồi tuyệt vời của vải len Merino sau khi được dệt, c&oacute; thể chế tạo c&aacute;c sản phẩm b&oacute; s&aacute;t cơ thể m&agrave; vẫn giữ ấm, giữ form d&aacute;ng ban đầu. Xơ len Merino dễ uốn cong, triệt ti&ecirc;u cảm gi&aacute;c ch&acirc;m tr&iacute;ch, ngứa ng&aacute;y khi tiếp x&uacute;c với bề mặt da, chống tia UV, khả năng chống ch&aacute;y v&agrave; t&iacute;nh linh hoạt trong sử dụng. Nghi&ecirc;n cứu gần đ&acirc;y c&ograve;n cho thấy khả năng trị liệu của len Merino si&ecirc;u mịn đối với những người bị dị ứng da.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/2719730617f50849b15f19331f9ab17a.png\" /><em>N&agrave;ng &Aacute; kh&ocirc;i Thuỳ Dương cũng ưu &aacute;i chưng diện &aacute;o dạ l&ocirc;ng cừu v&agrave;o những ng&agrave;y cuối năm khi đi mua sắm.</em></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Bởi vậy, len cừu Merino được ứng dụng để sản xuất rất nhiều loại trang phục, kh&ocirc;ng loại trừ bất cứ một sản phẩm n&agrave;o &ldquo;từ đầu đến ch&acirc;n&rdquo;, &ldquo;từ trong ra ngo&agrave;i&rdquo; như: &aacute;o len, &aacute;o ống, khăn qu&agrave;ng, găng tay, tất, quần denim từ chất liệu len, lớp l&oacute;t của gi&agrave;y thể thao, lớp giữ ấm của boot m&ugrave;a Đ&ocirc;ng&hellip; Thậm ch&iacute;, len cừu Merino với độ tho&aacute;ng kh&iacute; cao, giữ ấm v&agrave;o m&ugrave;a Đ&ocirc;ng, giữ ẩm tốt v&agrave;o m&ugrave;a H&egrave;, c&ograve;n được ứng dụng để sản xuất những chiếc &aacute;o T-shirt, jacket thể thao đ&ograve;i hỏi độ mềm, dễ cử động, co gi&atilde;n tốt.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/563ed2fe39422da318b28402d1e34e00.jpg\" /><em>N&agrave;ng hoa kh&ocirc;i ảnh H&agrave; Nội Hồng Ngọc cũng năn nổ t&igrave;m v&agrave; sắm cả set len l&ocirc;ng cừu Merino để cho bằng chị bằng em. Diện cả c&acirc;y Merino Wool gồm &aacute;o kho&aacute;c v&agrave; set len hồng gi&uacute;p c&ocirc; n&agrave;ng trẻ trung v&agrave; sang chảnh th&ecirc;m 10 ch&acirc;n k&iacute;nh.</em></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/0d7ccb0ebbdf913fe5da61c5657e02a9.jpg\" />Chiếc &aacute;o len l&ocirc;ng cừu Merino được Xu&acirc;n Mai mix&amp;match c&ugrave;ng quần b&ograve; v&agrave; trench coat tr&ocirc;ng thật sang chảnh v&agrave; thời thượng.</p>\r\n\r\n<p style=\"text-align:justify\">BTV H&agrave; Vũ của VTV th&igrave; lại qu&aacute; kết kiểu d&aacute;ng kinh điển của chiếc &aacute;o, ngo&agrave;i ra chất liệu tạo ra th&agrave;nh phẩm lu&ocirc;n l&agrave; yếu tố quan t&acirc;m h&agrave;ng đầu của c&ocirc; n&agrave;ng khi lựa chọn những sản phẩm cao cấp. Thế n&ecirc;n, kiệt t&aacute;c n&agrave;y ph&aacute;i đẹp kh&ocirc;ng được bỏ lỡ trong m&ugrave;a đ&ocirc;ng năm nay đ&acirc;u.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/cfc7c1fd7249d231f024a6bbc233468b.png\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Tại Việt Nam, với kh&iacute; hậu nhiệt đới lạnh gi&aacute; m&ugrave;a Đ&ocirc;ng, n&oacute;ng ẩm m&ugrave;a H&egrave; &ndash; đ&acirc;y l&agrave; thi&ecirc;n đường để len cừu Merino ph&aacute;t huy t&aacute;c dụng của m&igrave;nh: Giữ ấm m&ugrave;a Đ&ocirc;ng v&agrave; giữ ẩm m&ugrave;a H&egrave; để tạo sự m&aacute;t mẻ cho cơ thể. Len cừu Merino c&oacute; khả năng h&uacute;t ẩm v&agrave; nhả ẩm khi điều kiện kh&iacute; hậu xung quanh thay đổi. Sợi len c&oacute; cấu tr&uacute;c tế b&agrave;o phức tạp gi&uacute;p n&oacute; c&oacute; thể hấp thụ hơi ẩm đến 35% trọng lượng của n&oacute;, nhưng đẩy chất lỏng cho ph&eacute;p giải ph&oacute;ng ẩm khỏi cơ thể người v&agrave; bay hơi. Điều n&agrave;y tạo ra cho len những đặc t&iacute;nh tiện nghi tuyệt vời v&agrave; l&agrave;m cho len c&oacute; thể &ldquo;h&iacute;t thở/h&ocirc; hấp&rdquo; được. Hơn nữa, len cừu Merino lại c&oacute; khả năng chống mưa, gi&oacute; để bảo vệ người mặc như ch&iacute;nh những ch&uacute; cừu Merino tự điều h&ograve;a tr&ecirc;n c&aacute;nh đồng cỏ khi gặp nắng, mưa, tự chống thấm, tự giữ độ ẩm&hellip; Tất cả những đặc t&iacute;nh tự nhi&ecirc;n ấy của l&ocirc;ng cừu Merino được đưa v&agrave;o sợi len.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/f2feb13cac3905d966b3dfff414a149a.png\" /><em>N&agrave;ng &aacute; hậu Miss Fitness Model Việt Nam 2021 Kim Phụng tinh tế kho&aacute;c &aacute;o dạ l&ocirc;ng cừu c&ugrave;ng chiếc đầm dạ hội dự tiệc. Đ&acirc;y l&agrave; set đồ m&agrave; c&ocirc; n&agrave;ng rất th&iacute;ch v&igrave; tr&ocirc;ng vừa sang lại vừa nền n&atilde;, dễ d&agrave;ng diện ở nhiều sự kiện.</em></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/19ff274cf5deb680afed148b2829c34c.png\" /><em>C&ocirc; n&agrave;ng ch&aacute;u g&aacute;i xinh đẹp của Gi&aacute;o sư Lương Định Của cũng rất say m&ecirc; chiếc &aacute;o dạ&nbsp;l&ocirc;ng cừu n&agrave;y. C&ocirc; n&agrave;ng t&acirc;m sự rằng&nbsp;ở Th&agrave;nh phố Hồ Ch&iacute; Minh th&igrave; vẫn phải c&oacute; &aacute;o kho&aacute;c dạ&nbsp;để diện đi chơi&nbsp;Đ&agrave; Lạt hoặc c&aacute;c chuyến du ngoạn ở trời T&acirc;y.</em></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"https://pubcdn.ivymoda.com/files/news/2023/01/03/f101b9fb8902e09667ed9b7a87e5bbe1.png\" />N&agrave;ng &eacute;n xinh đẹp Cấn Hồng Anh của VTVCab cũng như nhiều sự kiện nổi tiếng cũng hết mực y&ecirc;u chiều chiếc &aacute;o dạ l&ocirc;ng cừu Merino n&agrave;y. C&ocirc; n&agrave;ng hay phải dẫn những sự kiện trang trọng ngo&agrave;i trời, trong dịp cuối năm thời tiết lạnh như thế n&agrave;y th&igrave; c&oacute; th&ecirc;m &aacute;o dạ cao cấp kho&aacute;c ngo&agrave;i khiến Hồng Anh tự tin hơn v&agrave; thần th&aacute;i sang xịn hơn biết bao nhi&ecirc;u.</p>\r\n\r\n<p style=\"text-align:justify\">&Aacute;o dạ len l&ocirc;ng cừu Merino kiểu d&aacute;ng đơn giản c&ugrave;ng những gam m&agrave;u sắc dễ phối sẽ tiện dụng v&agrave; hỗ trợ n&acirc;ng tầm nhan sắc cho ph&aacute;i đẹp thời điểm v&agrave;ng cuối năm biết bao nhi&ecirc;u. D&ugrave; gi&aacute; th&agrave;nh nhỉnh một ch&uacute;t nhưng c&oacute; &ldquo;đắt xắt ra miếng&rdquo; m&agrave; c&ograve;n đảm bảo bền đẹp vượt thời gian. Xứng đ&aacute;ng l&agrave; must-have-item của chị em trong m&ugrave;a đ&ocirc;ng n&agrave;y.</p>\r\n\r\n<p style=\"text-align:justify\">(Ảnh FB nh&acirc;n vật)</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:125.521px; text-align:justify; top:17px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '2023-09-10 08:57:35', NULL);
INSERT INTO `blog_posts` VALUES (3, 4, '11 cách phối đồ đi chơi Noel giúp nàng trở nên cuốn hút trong mùa Giáng sinh', '11-cách-phối-đồ-đi-chơi-noel-giúp-nàng-trở-nên-cuốn-hút-trong-mùa-giáng-sinh', 'upload/post/1776640455234330.png', '<p style=\"text-align:justify\">Cuối năm l&agrave; khoảng thời gian của rất nhiều lễ hội kh&aacute;c nhau từ Noel, Tết Dương Lịch, Tết &Acirc;m Lịch,... Những dịp lễ kể tr&ecirc;n rất được c&aacute;c bạn nữ y&ecirc;u th&iacute;ch bởi bạn c&oacute; thể thỏa sức diện những bộ c&aacute;nh đẹp đi chơi. Vậy c&aacute;c bạn c&oacute; biết c&aacute;ch chọn&nbsp;<a href=\"https://ivymoda.com/tin-tuc/bai-viet/phoi-do-di-choi-noel-1229\" target=\"_blank\">phối đồ đi chơi Noel</a>&nbsp;để bản th&acirc;n nổi bật nhất chưa? Nếu chưa h&atilde;y c&ugrave;ng tham khảo ngay những set đồ được gợi &yacute; dưới đ&acirc;y n&agrave;ng nh&eacute;.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h2 style=\"text-align:justify\">Những gam m&agrave;u trang phục n&ecirc;n sử dụng v&agrave;o Noel</h2>\r\n\r\n<p style=\"text-align:justify\">Nhắc đến Noel chắc hẳn bạn sẽ nghĩ ngay tới tới 2 m&agrave;u sắc biểu tượng như m&agrave;u xanh v&agrave; đỏ. Vậy c&ograve;n m&agrave;u sắc n&agrave;o m&agrave; bạn c&oacute; thể sử dụng v&agrave;o m&ugrave;a Noel kh&ocirc;ng? H&atilde;y c&ugrave;ng t&igrave;m hiểu ngay nh&eacute;!</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<h3 style=\"text-align:justify\">M&agrave;u đỏ nổi bật</h3>\r\n\r\n<p style=\"text-align:justify\">M&agrave;u sắc đầu ti&ecirc;n&nbsp; biểu tượng cho m&ugrave;a Gi&aacute;ng sinh chắc chắn phải kể đến m&agrave;u đỏ. M&agrave;u đỏ được sử dụng rất nhiều v&agrave;o ng&agrave;y Gi&aacute;ng sinh với niềm tin v&agrave;o sự may mắn, an l&agrave;nh v&agrave; vui vẻ. Ở c&aacute;c nước c&oacute; tuyết rơi, trang phục m&agrave;u đỏ cũng gi&uacute;p người diện trở n&ecirc;n nổi bật hơn tr&ecirc;n nền m&agrave;u trắng của Tuyết, đ&acirc;y cũng ch&iacute;nh l&agrave; 2 m&agrave;u sắc dễ nhận thấy nhất v&agrave;o mỗi dịp Ch&uacute;a Gi&aacute;ng thế. Chỉ cần kho&aacute;c l&ecirc;n m&igrave;nh một chiếc &aacute;o cho&agrave;ng m&agrave;u đỏ hoặc một chiếc &aacute;o len đỏ l&agrave; đ&atilde; c&oacute; thể cảm nhận được kh&ocirc;ng kh&iacute; Gi&aacute;ng sinh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Màu đỏ nổi bật\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/d31d5a201154437d2b4b19bafa1902eb.png\" /></p>\r\n\r\n<h3 style=\"text-align:justify\">M&agrave;u xanh l&aacute; - M&agrave;u sắc của sự hy vọng</h3>\r\n\r\n<p style=\"text-align:justify\">B&ecirc;n cạnh m&agrave;u đỏ th&igrave; m&agrave;u xanh l&aacute; cũng l&agrave; gam m&agrave;u được ưa chuộng sử dụng nhiều trong mỗi dịp lễ Gi&aacute;ng sinh. M&agrave;u xanh l&agrave; m&agrave;u sắc đặc trưng biểu tượng cho c&acirc;y th&ocirc;ng Noel. Tuy kh&ocirc;ng qu&aacute; sặc sỡ v&agrave; nổi bật như m&agrave;u đỏ nhưng vẫn c&oacute; thể đem đến cho bạn vẻ đẹp nổi bật trong m&ugrave;a đ&ocirc;ng. Nếu bạn đang kh&ocirc;ng biết kết hợp đồ m&agrave;u xanh l&aacute; với m&agrave;u g&igrave; th&igrave; h&atilde;y lựa chọn 2 m&agrave;u sắc trung t&iacute;nh l&agrave; m&agrave;u đen v&agrave; m&agrave;u trắng.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/ao-polo-len-dang-croptop-ms-57m7803-36351\" target=\"_blank\"><img alt=\"Màu xanh lá - Màu sắc của sự hy vọng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/0b9a4aeff4ad7b0dce2cc9a94cc60e18.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">M&agrave;u trắng tinh kh&ocirc;i</h3>\r\n\r\n<p style=\"text-align:justify\">M&agrave;u đỏ biểu tượng cho sự may mắn, m&agrave;u xanh l&agrave; h&igrave;nh ảnh c&acirc;y th&ocirc;ng Noel v&agrave; trắng tượng trưng cho tuyết. Trắng, đỏ, xanh l&agrave; 3 gam m&agrave;u đặc trưng, chủ đạo trong những ng&agrave;y lễ Gi&aacute;ng sinh. Bạn c&oacute; thể kết hợp trang phục với 3 m&agrave;u sắc đỏ, xanh v&agrave; trắng l&agrave; đ&atilde; c&oacute; ngay một set đồ đậm chất Gi&aacute;ng sinh cho m&igrave;nh rồi đấy.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/ao-len-gan-co-kieu-ms-58b8822-36353\" target=\"_blank\"><img alt=\"Trang phục màu trắng tinh khôi\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/f28e52a809b294e86f9bff9a74625b68.png\" /></a></p>\r\n\r\n<h2 style=\"text-align:justify\">Gợi &yacute; những trang phục th&iacute;ch hợp mặc trong m&ugrave;a Gi&aacute;ng sinh</h2>\r\n\r\n<p style=\"text-align:justify\">Khi đ&atilde; nắm được những m&agrave;u sắc đặc trưng cho m&ugrave;a Gi&aacute;ng sinh, h&atilde;y c&ugrave;ng xem c&oacute; những trang phục n&agrave;o gi&uacute;p c&aacute;c n&agrave;ng trở n&ecirc;n cuốn h&uacute;t, nổi bật trong m&ugrave;a Gi&aacute;ng sinh năm nay nh&eacute;.</p>\r\n\r\n<h3 style=\"text-align:justify\">Ch&acirc;n v&aacute;y ngắn trẻ trung</h3>\r\n\r\n<p style=\"text-align:justify\">Ch&acirc;n v&aacute;y ngắn chắc chắn l&agrave; item kh&ocirc;ng thể thiếu trong set đồ h&agrave;ng ng&agrave;y của ph&aacute;i đẹp. Ở miền Bắc, thời tiết r&eacute;t lạnh chị em c&oacute; thể lựa chọn những chiếc ch&acirc;n v&aacute;y d&aacute;ng d&agrave;i, ch&acirc;n v&aacute;y len hay ch&acirc;n v&aacute;y midi để phối đồ c&ugrave;ng &aacute;o len hoặc &aacute;o thun năng động.</p>\r\n\r\n<p style=\"text-align:justify\">Những n&agrave;ng sống tại miền Nam c&oacute; thể diện nhiều loại v&aacute;y &aacute;o đa dạng hơn như ch&acirc;n v&aacute;y ngắn, v&aacute;y x&ograve;e, v&aacute;y tennis,...</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/chan-vay-xep-ly-lech-1-ben-ms-31b9447-36063\" target=\"_blank\"><img alt=\"Chân váy ngắn trẻ trung\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/e781f7a0a50f86da7012f094f0f1ca9e.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">Họa tiết kẻ caro thời thượng</h3>\r\n\r\n<p style=\"text-align:justify\">Họa tiết kẻ caro lu&ocirc;n l&agrave; họa tiết được c&aacute;c thương hiệu thời trang cao cấp ưu &aacute;i lựa chọn. Kết hợp m&agrave;u đỏ v&agrave; xanh, đỏ v&agrave; trắng hoặc m&agrave;u xanh v&agrave; trắng,... l&agrave; những sự kết hợp được ưa chuộng nhất v&agrave;o m&ugrave;a Noel.</p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;c bạn c&oacute; thể lựa chọn cho m&igrave;nh những thiết kế ch&acirc;n v&aacute;y kẻ caro, &aacute;o kho&aacute;c hay những chiếc &aacute;o len, khăn qu&agrave;ng cổ m&agrave;u đỏ, trắng hoặc xanh m&agrave; bạn y&ecirc;u th&iacute;ch.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/beige-handmade-wool-ms-77m6816-36323\" target=\"_blank\"><img alt=\"Họa tiết kẻ caro thời thượng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/6cfa4b10cdea9658a400e51ec21e2716.png\" /></a></p>\r\n\r\n<h2 style=\"text-align:justify\">Những c&aacute;ch phối đồ đi chơi Noel đẹp d&agrave;nh cho c&aacute;c n&agrave;ng</h2>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o len kết hợp c&ugrave;ng quần jeans trẻ trung</h3>\r\n\r\n<p style=\"text-align:justify\">B&ecirc;n cạnh những chiếc &aacute;o m&agrave;u sắc v&agrave; trang phục được ưa chuộng v&agrave;o m&ugrave;a Noel được chia sẻ tr&ecirc;n đ&acirc;y, m&igrave;nh sẽ giới thiệu th&ecirc;m cho bạn c&aacute;ch mix đồ đi chơi Noel đơn giản m&agrave; vẫn bắt mắt. Kết hợp quần jean c&ugrave;ng &aacute;o kho&aacute;c hay những chiếc &aacute;o len hoặc khăn qu&agrave;ng cổ m&agrave;u đỏ, trắng v&agrave; xanh.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/ao-thun-in-dap-hoa-noi-ms-58m7937-35946\" target=\"_blank\"><img alt=\"Áo len kết hợp cùng quần jeans trẻ trung\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/3691ef89ba37ad5db06e94a27dc7ec76.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">Set &aacute;o v&agrave; ch&acirc;n v&aacute;y len kết hợp c&ugrave;ng &aacute;o kho&aacute;c thời thượng</h3>\r\n\r\n<p style=\"text-align:justify\">&Aacute;o len kết hợp c&ugrave;ng ch&acirc;n v&aacute;y len đồng bộ sẽ l&agrave; sự kết hợp ho&agrave;n hảo d&agrave;nh cho những c&ocirc; n&agrave;ng nữ t&iacute;nh v&agrave;o mỗi bữa tiệc gi&aacute;ng sinh sắp tới. Một set đồ tương đối đơn giản nhưng vẫn đủ thanh lịch, nữ t&iacute;nh, xinh xắn tạo thiện cảm tốt đẹp với những người xung quanh bạn. V&igrave; set đồ tương đối đơn giản n&ecirc;n bạn h&atilde;y chọn cho m&igrave;nh 1 đ&ocirc;i boots cổ lửng hoặc một đ&ocirc;i gi&agrave;y da kh&aacute;c m&agrave;u l&agrave;m điểm nhấn cho set đồ.</p>\r\n\r\n<p style=\"text-align:justify\">Với những c&ocirc; n&agrave;ng c&oacute; d&aacute;ng người nhỏ xinh c&oacute; thể kết hợp th&ecirc;m c&ugrave;ng một chiếc &aacute;o l&ocirc;ng hoặc &aacute;o kho&aacute;c d&aacute;ng d&agrave;i để c&acirc;n bằng cơ thể.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/merino-wool-high-neck-sweater-ao-len-long-cuu-ms-58m7834-36562\" target=\"_blank\"><img alt=\"Set áo và chân váy len kết hợp cùng áo khoác thời thượng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/11a63bcdd9202bf523999a20932c0488.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o len c&ugrave;ng ch&acirc;n v&aacute;y xếp ly nhẹ nh&agrave;ng</h3>\r\n\r\n<p style=\"text-align:justify\">V&aacute;y xếp ly l&agrave; một item phổ biến trong mọi tủ đồ của c&aacute;c n&agrave;ng theo đuổi phong c&aacute;ch nhẹ nh&agrave;ng. &Aacute;o len kết hợp c&ugrave;ng ch&acirc;n v&aacute;y xếp ly l&agrave; c&aacute;ch phối đồ tương đối an to&agrave;n nhưng kh&ocirc;ng mang đến cảm gi&aacute;c nh&agrave;m ch&aacute;n, bạn chi cần nhấn nh&aacute; bằng một ch&uacute;t chi tiết nhỏ như thắt lưng, mũ, khăn qu&agrave;ng cổ l&agrave; đ&atilde; c&oacute; set đồ ho&agrave;n hảo trong những ng&agrave;y lễ Noel.</p>\r\n\r\n<p style=\"text-align:justify\">Thay v&igrave; thả &aacute;o su&ocirc;ng, bạn h&atilde;y thử sơ vin vạt trước &aacute;o len với v&aacute;y xếp ly, đ&acirc;y l&agrave; một mẹo nhỏ gi&uacute;p tăng gu thẩm mỹ v&agrave; t&ocirc;n v&oacute;c d&aacute;ng của bạn rất tốt.</p>\r\n\r\n<p style=\"text-align:justify\">Nếu bạn l&agrave; người y&ecirc;u th&iacute;ch phong c&aacute;ch trẻ trung năng động nhưng vẫn muốn mặc v&aacute;y xếp ly, th&igrave; h&atilde;y thử kết hợp th&ecirc;m một chiếc &aacute;o sơ mi b&ecirc;n trong &aacute;o len. Một c&aacute;ch phối đồ vừa năng động lại gi&uacute;p bạn &ldquo;hack&rdquo; tuổi rất tốt. C&aacute;ch phối đồ n&agrave;y cũng được rất nhiều c&ocirc; g&aacute;i văn ph&ograve;ng v&agrave; học sinh &aacute;p dụng trong cuộc sống h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/ao-len-long-cuu-co-lo-cach-dieu-ms-58b7973-27008\" target=\"_blank\"><img alt=\"Áo len cùng chân váy xếp ly nhẹ nhàng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/36a0c10c20aac7cb8b838131ba96c43f.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o kho&aacute;c đ&iacute;nh hoa nổi v&agrave; ch&acirc;n v&aacute;y chữ A t&ocirc;n d&aacute;ng</h3>\r\n\r\n<p style=\"text-align:justify\">Ch&acirc;n v&aacute;y chữ A lu&ocirc;n c&oacute; sức h&uacute;t đặc biệt với chị em ph&aacute;i đẹp. D&ugrave; bạn theo đuổi phong c&aacute;ch n&agrave;o, th&igrave; h&atilde;y thức ng&agrave;y qua phong c&aacute;ch tr&ecirc;n kể tr&ecirc;n kh&ocirc;ng bao giờ lỗi mốt. Một chiếc &aacute;o 2 d&acirc;y hoặc &aacute;o len cổ cao kết hợp c&ugrave;ng ch&acirc;n v&aacute;y chữ A kh&ocirc;ng chỉ ph&ugrave; hợp mặc v&agrave;o m&ugrave;a đ&ocirc;ng m&agrave; c&aacute;ch phối n&agrave;y cũng rất th&iacute;ch hợp để bạn diện v&agrave;o những ng&agrave;y thu m&aacute;t lạnh.</p>\r\n\r\n<p style=\"text-align:justify\">Ch&acirc;n v&aacute;y chữ A gi&uacute;p bạn t&ocirc;n l&ecirc;n đ&ocirc;i ch&acirc;n d&agrave;i thon gọn v&agrave; đường cong h&igrave;nh thể, kho&aacute;c th&ecirc;m một chiếc &aacute;o đ&iacute;nh hoa nổi tạo ra một tổng thể kh&ocirc;ng qu&aacute; cầu kỳ nhưng nh&atilde; nhặn, xinh xắn l&agrave; lựa chọn tuyệt vời để bạn c&oacute; thể đi dự tiệc gi&aacute;ng sinh.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/chan-vay-chu-a-dinh-hoa-noi-ms-31b9163-35379\" target=\"_blank\"><img alt=\"Áo khoác đính hoa nổi và chân váy chữ A tôn dáng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/034ef15f4a471da0c87bc5f510ca04bb.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o sơ mi sơ vin c&ugrave;ng quần ống rộng m&agrave;u đỏ nổi bật</h3>\r\n\r\n<p style=\"text-align:justify\">Quần ống rộng hay c&ograve;n gọi l&agrave; culottes l&agrave; chiếc quần thời trượng rất được ưa chuộng trong năm nay. Nếu đ&atilde; ch&aacute;n những chiếc đầm v&aacute;y th&igrave; sao bạn kh&ocirc;ng thử bắt kết hợp &aacute;o sơ mi c&ugrave;ng thiết kế quần ống rộng, set đồ n&agrave;y sẽ ph&ugrave; hợp nhất với những c&ocirc; n&agrave;ng trong S&agrave;i G&ograve;n trong m&ugrave;a Noel năm nay.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/quan-dai-ong-rong-ms-22m7617-35041\" target=\"_blank\"><img alt=\"Áo sơ mi sơ vin cùng quần ống rộng màu đỏ nổi bật\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/3e131bc22354040f9c35b4cf26cea6c9.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">Đầm đỏ, đầm xanh nổi bật</h3>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/dam-nhung-xoe-tay-bong-ms-48m7944-36255\" target=\"_blank\"><img alt=\"đầm đỏ nổi bật trong mùa Noel\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/1f54c107515275a5ed6469db3a6b338e.png\" /></a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/dam-so-mi-theu-hoa-ms-47b9455-36056\" target=\"_blank\"><img alt=\"đầm sơ mi xanh lá tôn dáng, nổi bật trong màu Giáng sinh\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/9bde7d40cfed7dcb607efd321ff4e7e7.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o kho&aacute;c c&ugrave;ng quần thun legging thời thượng</h3>\r\n\r\n<p style=\"text-align:justify\">Trong tủ đồ của ph&aacute;i đẹp chắc chắn kh&ocirc;ng thể thiếu những quần thun legging với t&iacute;nh ứng dụng cao. Bạn n&ecirc;n lựa chọn những chiếc quần thun legging c&oacute; gam m&agrave;u đơn giản như đen kết hợp c&ugrave;ng chiếc &aacute;o kho&aacute;c kiểu m&agrave;u nổi bật hơn như đỏ hoặc xanh l&aacute;, set đồ n&agrave;y sẽ ngay lập tức gi&uacute;p bạn trở n&ecirc;n s&agrave;nh điệu v&agrave; nổi bật hơn trong mọi bữa tiệc c&ugrave;ng gia đ&igrave;nh v&agrave; bạn b&egrave; v&agrave;o dịp cuối năm. Để set đồ kh&ocirc;ng đơn điệu bạn c&oacute; thể phối layer với &aacute;o kho&aacute;c ngo&agrave;i v&agrave; c&aacute;c phụ kiện như t&uacute;i x&aacute;ch v&agrave; mũ.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/ao-thun-tre-vai-ms-58m8060-35543\" target=\"_blank\"><img alt=\"Áo khoác cùng quần thun legging thời thượng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/857128998eb3cc8b2970656837f09aba.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o măng t&ocirc; kết hợp c&ugrave;ng croptop trẻ trung</h3>\r\n\r\n<p style=\"text-align:justify\">Croptop c&ugrave;ng &aacute;o măng t&ocirc; l&agrave; 2 items được nhiều nghệ sĩ H&agrave;n ưa chuộng v&igrave; khả năng &ldquo;hack d&aacute;ng&rdquo; cực đỉnh. Đ&acirc;y l&agrave; 2 mới nghe qua c&oacute; vẻ kh&ocirc;ng li&ecirc;n quan đến nhau nhưng khi kết hợp với nhau lại rất ăn &yacute; v&agrave; thời thượng.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;c phối đồ n&agrave;y vừa gi&uacute;p bạn khoe kh&eacute;o được v&ograve;ng eo thon gọn, vừa thanh lịch kh&ocirc;ng qu&aacute; hở nhờ c&oacute; &aacute;o măng t&ocirc; kho&aacute;c ngo&agrave;i. Để set đồ của m&igrave;nh c&oacute; kh&ocirc;ng kh&iacute; Gi&aacute;ng sinh bạn h&atilde;y chọn &aacute;o croptop hoặc &aacute;o kho&aacute;c c&oacute; m&agrave;u đỏ bạn nh&eacute;. Với set đồ kể tr&ecirc;n sẽ ph&ugrave; hợp nhất khi diện c&ugrave;ng quần &acirc;u ống rộng, d&aacute;ng d&agrave;i.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Áo măng tô kết hợp cùng croptop trẻ trung\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/c46c0fcbf73641c7808b858329b426bf.png\" /></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o măng t&ocirc; v&agrave; ch&acirc;n v&aacute;y thời thượng</h3>\r\n\r\n<p style=\"text-align:justify\">Ch&acirc;n v&aacute;y&nbsp;l&agrave; một item tương đối dễ&nbsp;phối đồ, chỉ cần một ch&uacute;t tinh &yacute; l&agrave; bạn sẽ c&oacute; ngay một set đồ&nbsp;vừa nhẹ nh&agrave;ng&nbsp;lại&nbsp;vừa quyến rũ, độc đ&aacute;o. Nếu tự tin với đ&ocirc;i ch&acirc;n của m&igrave;nh bạn h&atilde;y chọn những chiếc ch&acirc;n v&aacute;y ngắn&nbsp;để t&ocirc;n l&ecirc;n đường cong một c&aacute;ch ho&agrave;n mỹ nhất. B&ecirc;n cạnh đ&oacute; những chiếc v&aacute;y d&agrave;i&nbsp;cũng l&agrave; lựa chọn ho&agrave;n hảo nếu n&agrave;ng muốn che đi khuyết điểm tr&ecirc;n đ&ocirc;i ch&acirc;n của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Áo măng tô và chân váy thời thượng\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/f7ed484d345868df54e7de188cfbbb7e.png\" /></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o cardigan kết hợp c&ugrave;ng ch&acirc;n v&aacute;y</h3>\r\n\r\n<p style=\"text-align:justify\">Nếu l&agrave; người c&oacute; v&oacute;c d&aacute;ng cao gầy th&igrave; h&atilde;y thử sử dụng ch&acirc;n v&aacute;y d&aacute;ng x&ograve;e kết hợp c&ugrave;ng một chiếc cardigan nhẹ nh&agrave;ng. C&aacute;c phối đồ n&agrave;y sẽ gi&uacute;p cơ thể bạn trở n&ecirc;n đầy đặn v&agrave; thanh tho&aacute;t hơn. Những n&agrave;ng c&oacute; th&acirc;n h&igrave;nh đầy đặn h&atilde;y thử phối đồ với ch&acirc;n v&aacute;y chữ A để giấu nhẹm đi những khuyết điểm tr&ecirc;n cơ thể.</p>\r\n\r\n<p style=\"text-align:justify\">Để ph&ugrave; hợp với kh&ocirc;ng kh&iacute; Noel c&aacute;c bạn h&atilde;y ưu ti&ecirc;n lựa chọn &aacute;o cardigan m&agrave;u đỏ, m&agrave;u xanh hoặc những m&agrave;u n&acirc;u trầm.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://ivymoda.com/sanpham/chan-vay-khaki-phoi-khuy-truoc-ms-31m8032-36067\" target=\"_blank\"><img alt=\"Áo cardigan kết hợp cùng chân váy\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/b37caee00389d58da3ccd9700c6f9cb8.png\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">&Aacute;o cardigan c&ugrave;ng ch&acirc;n v&aacute;y gingham</h3>\r\n\r\n<p style=\"text-align:justify\">Ch&acirc;n v&aacute;y gingham c&oacute; thiết kế tương tự như v&aacute;y midi, tuy nhi&ecirc;n phần dưới t&ugrave;ng v&aacute;y của gingham sẽ c&oacute; phần đu&ocirc;i x&ograve;e nhẹ nh&agrave;ng, bay bổng hơn. Nếu muốn c&oacute; một ch&uacute;t điểm nhấn cho set đồ nhưng vẫn an to&agrave;n th&igrave; &aacute;o cardigan kết hợp c&ugrave;ng ch&acirc;n v&aacute;y gingham ch&iacute;nh l&agrave; &ldquo;ch&acirc;n &aacute;i&rdquo; d&agrave;nh cho bạn. Đừng qu&ecirc;n lựa chọn những items c&oacute; m&agrave;u sắc v&agrave; họa tiết Gi&aacute;ng sinh để điểm th&ecirc;m cho set đồ của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Áo cardigan cùng chân váy gingham\" src=\"https://pubcdn.ivymoda.com/files/news/2022/12/14/46ca326083eefaa212e2d0e7b1680759.png\" /></p>\r\n\r\n<p style=\"text-align:justify\">Tr&ecirc;n đ&acirc;y l&agrave; những gợi &yacute; phối đồ đi chơi Noel cho ph&aacute;i đẹp th&ecirc;m nổi bật, cuốn h&uacute;t mọi &aacute;nh nh&igrave;n. Hy vọng qua b&agrave;i viết tr&ecirc;n bạn đ&atilde; lựa chọn được cho m&igrave;nh những set đồ ưng &yacute;. Đừng qu&ecirc;n gh&eacute; qua website/app&nbsp;<a href=\"https://ivymoda.com/\" target=\"_blank\">IVY moda</a>&nbsp;để lựa chọn cho m&igrave;nh những set đồ mới cho dịp&nbsp;<a href=\"https://ivymoda.com/tin-tuc/bai-viet/noel-1226\" target=\"_blank\">Noel</a>&nbsp;năm nay.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:125.521px; text-align:justify; top:19px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '2023-09-10 08:59:31', NULL);

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES (1, 'Ck', 'ck', 'upload/brand/1776634288165937.png', NULL, '2023-09-10 07:21:30');
INSERT INTO `brands` VALUES (3, 'McQ', 'mcq', 'upload/brand/1776633748355683.png', NULL, '2023-09-10 07:12:56');
INSERT INTO `brands` VALUES (4, 'Pull&Bear', 'pull&bear', 'upload/brand/1776633756776774.png', NULL, '2023-09-10 07:13:03');
INSERT INTO `brands` VALUES (5, 'Mango', 'mango', 'upload/brand/1776633740860433.png', NULL, '2023-09-10 07:12:48');
INSERT INTO `brands` VALUES (6, 'Bershka', 'bershka', 'upload/brand/1776633731990850.png', NULL, '2023-09-10 07:12:40');
INSERT INTO `brands` VALUES (7, 'H&M', 'h&m', 'upload/brand/1776634036722769.png', NULL, '2023-09-10 07:17:30');
INSERT INTO `brands` VALUES (8, 'Hypebeast', 'hypebeast', 'upload/brand/1776634227069151.png', NULL, '2023-09-10 07:20:32');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Nam', 'nam', 'fa fa-male', NULL, NULL);
INSERT INTO `categories` VALUES (2, 'Nữ', 'nữ', 'fa fa-female', NULL, '2023-08-30 04:32:32');
INSERT INTO `categories` VALUES (3, 'Trẻ em', 'trẻ-em', 'fa fa-child', NULL, NULL);

-- ----------------------------
-- Table structure for coupons
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int NOT NULL,
  `coupon_validity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupons
-- ----------------------------
INSERT INTO `coupons` VALUES (3, 'SALE', 50, '2023-09-20', 1, '2023-09-06 02:21:01', '2023-09-06 02:21:01');
INSERT INTO `coupons` VALUES (5, 'AAA', 50, '2023-09-05', 1, '2023-09-04 04:17:43', '2023-09-04 04:17:43');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_08_20_202647_create_sessions_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_08_20_205756_create_admins_table', 2);
INSERT INTO `migrations` VALUES (8, '2023_08_29_080522_create_brands_table', 3);
INSERT INTO `migrations` VALUES (9, '2023_08_29_083202_create_brands_table', 4);
INSERT INTO `migrations` VALUES (10, '2023_08_30_035224_create_categories_table', 5);
INSERT INTO `migrations` VALUES (11, '2023_08_30_035400_create_sub_categories_table', 5);
INSERT INTO `migrations` VALUES (12, '2023_08_30_063257_create_sub_sub_categories_table', 6);
INSERT INTO `migrations` VALUES (13, '2023_08_30_071125_create_products_table', 7);
INSERT INTO `migrations` VALUES (14, '2023_08_30_071144_create_multi_imgs_table', 7);
INSERT INTO `migrations` VALUES (15, '2023_08_31_023329_create_sliders_table', 8);
INSERT INTO `migrations` VALUES (16, '2023_09_01_005513_create_wishlists_table', 9);
INSERT INTO `migrations` VALUES (17, '2023_09_01_020308_create_coupons_table', 10);
INSERT INTO `migrations` VALUES (18, '2023_09_01_023007_create_ship_provinces_table', 11);
INSERT INTO `migrations` VALUES (19, '2023_09_01_023024_create_ship_districts_table', 11);
INSERT INTO `migrations` VALUES (20, '2023_09_01_023042_create_ship_wards_table', 11);
INSERT INTO `migrations` VALUES (21, '2023_09_01_025400_create_ship_cities_table', 12);
INSERT INTO `migrations` VALUES (22, '2023_09_01_025411_create_ship_districts_table', 12);
INSERT INTO `migrations` VALUES (23, '2023_09_01_025421_create_ship_wards_table', 12);
INSERT INTO `migrations` VALUES (24, '2023_09_04_155739_create_shippings_table', 13);
INSERT INTO `migrations` VALUES (25, '2023_09_05_124838_create_orders_table', 14);
INSERT INTO `migrations` VALUES (26, '2023_09_05_124951_create_order_items_table', 14);
INSERT INTO `migrations` VALUES (27, '2023_09_10_073811_create_blog_posts_table', 15);
INSERT INTO `migrations` VALUES (28, '2023_09_10_073832_create_blog_post_categories_table', 15);
INSERT INTO `migrations` VALUES (29, '2023_09_11_081549_create_reviews_table', 16);

-- ----------------------------
-- Table structure for multi_imgs
-- ----------------------------
DROP TABLE IF EXISTS `multi_imgs`;
CREATE TABLE `multi_imgs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `photo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of multi_imgs
-- ----------------------------
INSERT INTO `multi_imgs` VALUES (2, 2, 'upload/products/multi-image/1775644562598585.jpg', '2023-08-30 09:10:15', NULL);
INSERT INTO `multi_imgs` VALUES (3, 2, 'upload/products/multi-image/1775644563869496.jpg', '2023-08-30 09:10:16', NULL);
INSERT INTO `multi_imgs` VALUES (4, 2, 'upload/products/multi-image/1775644565087559.jpg', '2023-08-30 09:10:18', NULL);
INSERT INTO `multi_imgs` VALUES (5, 3, 'upload/products/multi-image/1775645390383281.jpg', '2023-08-30 09:23:24', NULL);
INSERT INTO `multi_imgs` VALUES (6, 3, 'upload/products/multi-image/1775645390909715.jpg', '2023-08-30 09:23:24', NULL);
INSERT INTO `multi_imgs` VALUES (7, 3, 'upload/products/multi-image/1775645391499031.jpg', '2023-08-30 09:23:25', NULL);
INSERT INTO `multi_imgs` VALUES (8, 4, 'upload/products/multi-image/1775645571533309.jpg', '2023-08-30 09:26:17', NULL);
INSERT INTO `multi_imgs` VALUES (9, 4, 'upload/products/multi-image/1775645572251919.jpg', '2023-08-30 09:26:17', NULL);
INSERT INTO `multi_imgs` VALUES (10, 4, 'upload/products/multi-image/1775645572842161.jpg', '2023-08-30 09:26:18', NULL);
INSERT INTO `multi_imgs` VALUES (11, 5, 'upload/products/multi-image/1775645851037615.jpg', '2023-08-30 09:30:43', NULL);
INSERT INTO `multi_imgs` VALUES (12, 5, 'upload/products/multi-image/1775645851340033.jpg', '2023-08-30 09:30:44', NULL);
INSERT INTO `multi_imgs` VALUES (13, 5, 'upload/products/multi-image/1775645851922876.jpg', '2023-08-30 09:30:44', NULL);
INSERT INTO `multi_imgs` VALUES (14, 6, 'upload/products/multi-image/1775646097565117.jpg', '2023-08-30 09:34:38', NULL);
INSERT INTO `multi_imgs` VALUES (15, 6, 'upload/products/multi-image/1775646097934231.jpg', '2023-08-30 09:34:39', NULL);
INSERT INTO `multi_imgs` VALUES (16, 6, 'upload/products/multi-image/1775646098475752.jpg', '2023-08-30 09:34:39', NULL);
INSERT INTO `multi_imgs` VALUES (17, 7, 'upload/products/multi-image/1775646483404365.jpg', '2023-08-30 09:40:46', NULL);
INSERT INTO `multi_imgs` VALUES (18, 7, 'upload/products/multi-image/1775646483703230.jpg', '2023-08-30 09:40:46', NULL);
INSERT INTO `multi_imgs` VALUES (19, 7, 'upload/products/multi-image/1775646484007689.jpg', '2023-08-30 09:40:47', NULL);
INSERT INTO `multi_imgs` VALUES (20, 8, 'upload/products/multi-image/1775646754508358.jpg', '2023-08-30 09:45:05', NULL);
INSERT INTO `multi_imgs` VALUES (21, 8, 'upload/products/multi-image/1775646754855740.jpg', '2023-08-30 09:45:05', NULL);
INSERT INTO `multi_imgs` VALUES (22, 8, 'upload/products/multi-image/1775646755161560.jpg', '2023-08-30 09:45:05', NULL);
INSERT INTO `multi_imgs` VALUES (23, 9, 'upload/products/multi-image/1775646933732510.jpg', '2023-08-30 09:47:56', NULL);
INSERT INTO `multi_imgs` VALUES (24, 9, 'upload/products/multi-image/1775646934082572.jpg', '2023-08-30 09:47:56', NULL);
INSERT INTO `multi_imgs` VALUES (25, 10, 'upload/products/multi-image/1775647112715642.jpg', '2023-08-30 09:50:46', NULL);
INSERT INTO `multi_imgs` VALUES (26, 10, 'upload/products/multi-image/1775647113018661.jpg', '2023-08-30 09:50:47', NULL);
INSERT INTO `multi_imgs` VALUES (27, 10, 'upload/products/multi-image/1775647113374095.jpg', '2023-08-30 09:50:47', NULL);
INSERT INTO `multi_imgs` VALUES (28, 11, 'upload/products/multi-image/1775647287283678.jpg', '2023-08-30 09:53:33', NULL);
INSERT INTO `multi_imgs` VALUES (29, 11, 'upload/products/multi-image/1775647287643300.jpg', '2023-08-30 09:53:33', NULL);
INSERT INTO `multi_imgs` VALUES (30, 11, 'upload/products/multi-image/1775647287949009.jpg', '2023-08-30 09:53:33', NULL);
INSERT INTO `multi_imgs` VALUES (31, 12, 'upload/products/multi-image/1775647405460114.jpg', '2023-08-30 09:55:25', NULL);
INSERT INTO `multi_imgs` VALUES (32, 12, 'upload/products/multi-image/1775647405768581.jpg', '2023-08-30 09:55:26', NULL);
INSERT INTO `multi_imgs` VALUES (33, 13, 'upload/products/multi-image/1775647500833412.jpg', '2023-08-30 09:56:56', NULL);
INSERT INTO `multi_imgs` VALUES (34, 13, 'upload/products/multi-image/1775647501145214.jpg', '2023-08-30 09:56:57', NULL);

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_items_order_id_foreign`(`order_id` ASC) USING BTREE,
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES (1, 2, 10, 'Trắng', 'M', '1', 225000.00, '2023-09-06 02:36:34', NULL);
INSERT INTO `order_items` VALUES (2, 2, 10, 'Trắng', 'L', '1', 225000.00, '2023-09-06 02:36:34', NULL);
INSERT INTO `order_items` VALUES (3, 3, 11, 'Đen', 'M', '1', 244000.00, '2023-09-06 03:35:57', NULL);
INSERT INTO `order_items` VALUES (4, 4, 8, 'Hồng nhạt', 'M', '1', 500000.00, '2023-09-06 03:57:09', NULL);
INSERT INTO `order_items` VALUES (5, 5, 7, 'Xanh Táo', 'M', '1', 255000.00, '2023-09-06 04:25:14', NULL);
INSERT INTO `order_items` VALUES (6, 6, 12, 'Đen', 'M', '1', 350000.00, '2023-09-11 07:48:11', NULL);
INSERT INTO `order_items` VALUES (7, 7, 13, 'Xanh Tím Than', 'L', '2', 200000.00, '2023-09-11 09:35:26', NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `ward_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int NULL DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10, 2) NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `processing_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `picked_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `shipped_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `delivered_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `cancel_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `return_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `return_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `return_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 3, 1, 2, 3, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', NULL, 'ngõ 850 - đường láng', 'card_1NnBWeEvRTLlCGYTeDFX7sYv', 'Thẻ tín dụng', 'txn_3NnBWfEvRTLlCGYT0GQUVRYl', 'usd', 225000.00, '64f7e480b3cd3', 'EOS81944761', '06 September 2023', 'September', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', '2023-09-06 02:31:30', NULL);
INSERT INTO `orders` VALUES (2, 3, 1, 2, 3, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', NULL, 'ngõ 850 - đường láng', 'card_1NnBbVEvRTLlCGYTQTg9exrF', 'Thẻ tín dụng', 'txn_3NnBbWEvRTLlCGYT1jYNAtRm', 'usd', 225000.00, '64f7e5ae050a8', 'EOS18826297', '06 September 2023', 'September', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', '2023-09-06 02:36:31', NULL);
INSERT INTO `orders` VALUES (3, 3, 4, 5, 7, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', NULL, NULL, 'cash', 'Khi giao hàng', NULL, 'USD', 122000.00, NULL, 'EOS98229231', '06 September 2023', 'September', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '11/09/2023', 'test lý do lần 2', '2', 'delivered', '2023-09-06 03:35:53', '2023-09-11 04:36:24');
INSERT INTO `orders` VALUES (4, 3, 1, 1, 2, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', NULL, NULL, 'cash', 'Khi giao hàng', NULL, 'USD', 500000.00, NULL, 'EOS17148820', '06 September 2023', 'September', '2023', NULL, NULL, NULL, NULL, NULL, NULL, '07/09/2023', 'test lý do trả hàng', '0', 'delivered', '2023-09-06 03:57:05', '2023-09-07 01:59:16');
INSERT INTO `orders` VALUES (5, 3, 2, 4, 11, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', NULL, NULL, 'cash', 'Khi giao hàng', NULL, 'USD', 127500.00, NULL, 'EOS73347098', '09/06/2023', '09', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', '2023-09-06 04:25:10', NULL);
INSERT INTO `orders` VALUES (6, 3, 1, 2, 3, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', NULL, 'test ghi  chú', 'card_1Np4qdEvRTLlCGYTt0D5zI5X', 'Thẻ tín dụng', 'txn_3Np4qgEvRTLlCGYT1sTT9BpL', 'usd', 350000.00, '64fec62b06195', 'EOS98177322', '11/09/2023', '09', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', '2023-09-11 07:48:02', NULL);
INSERT INTO `orders` VALUES (7, 4, 2, 4, 11, 'Nguyen Van Tuan', 'tuannv@gmail.com', '0372953299', NULL, 'giao hàng tận ngõ', 'cash', 'Khi giao hàng', NULL, 'USD', 400000.00, NULL, 'EOS67020391', '11/09/2023', '09', '2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', '2023-09-11 09:35:21', '2023-09-11 09:36:58');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('tuannv@gmail.com', '$2y$10$NOrVIszzeZUfzbUP575Yh.qP2syHoi2Bb9WakTJs.KV1iN1AitFyK', '2023-08-24 09:14:15');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `subsubcategory_id` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `short_descp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int NULL DEFAULT NULL,
  `featured` int NULL DEFAULT NULL,
  `product_new` int NULL DEFAULT NULL,
  `status` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (2, 1, 1, 2, 2, 'Áo thun nam cổ đức', 'Áo-thun-nam-cổ-đức', '58E3059', '100', 'Lorem,Ipsum,Amet', 'M, L, XL', 'Xanh lá đậm,Xanh ghi đá', '1090000', '327000', '<p>&Aacute;o thun cổ đức&nbsp;c&agrave;i 3&nbsp;khuy c&agrave;i. Tay d&agrave;i bo gấu. Th&ecirc;u chữ nhiều m&agrave;u 1 b&ecirc;n ngực. D&aacute;ng &aacute;o su&ocirc;ng với m&agrave;u đơn sắc dễ phối hợp.<br />\r\nSử dụng chất liệu thun mềm mại, th&ocirc;ng tho&aacute;ng v&agrave; co gi&atilde;n tối ưu, tạo cảm gi&aacute;c thoải m&aacute;i khi mặc. Mix c&ugrave;ng quần jean, quần short...để c&oacute; set đồ năng động cho m&ugrave;a n&agrave;y.</p>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Men</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>&Aacute;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Cổ &aacute;o</strong></td>\r\n			<td>C&ocirc;̉ đức</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Tay &aacute;o</strong></td>\r\n			<td>Tay dài</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Dài thường</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Thun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:15px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775644561347419.jpg', 1, 1, NULL, 1, '2023-08-30 09:12:14', '2023-08-30 09:12:14');
INSERT INTO `products` VALUES (3, 1, 1, 2, 1, 'Áo polo phối vạch', 'Áo-polo-phối-vạch', '57E3344', '100', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Trắng,Xanh dương đậm', '500000', NULL, '<p style=\"text-align:justify\">&Aacute;o polo trơn cổ đức với độ d&agrave;i vừa phải kết hợp c&ugrave;ng tay ngắn sẽ l&agrave; lựa chọn ho&agrave;n hảo cho những buổi&nbsp;đi chơi, cũng c&oacute; thể cả đi l&agrave;m.</p>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td style=\"text-align:justify\">Men</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td style=\"text-align:justify\">&Aacute;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Cổ &aacute;o</strong></td>\r\n			<td style=\"text-align:justify\">C&ocirc;̉ đức</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Tay &aacute;o</strong></td>\r\n			<td style=\"text-align:justify\">Tay ngắn</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td style=\"text-align:justify\">Kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Độ d&agrave;i</strong></td>\r\n			<td style=\"text-align:justify\">Dài thường</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Họa tiết</strong></td>\r\n			<td style=\"text-align:justify\">Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:justify\"><strong>Chất liệu</strong></td>\r\n			<td style=\"text-align:justify\">Thun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'upload/products/thambnail/1775645389899923.jpg', NULL, 1, 1, 1, '2023-08-30 09:23:23', NULL);
INSERT INTO `products` VALUES (4, 3, 1, 3, 3, 'Quần bò Nam Slim Fit', 'quần-bò-nam-slim-fit', '25E3144', '50', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Đen', '450000', NULL, '<p style=\"text-align:justify\">- Quần jeans d&agrave;i chạm mắt c&aacute; ch&acirc;n.<br />\r\n- D&aacute;ng quần &ocirc;m nhẹ, ống đứng.<br />\r\n-&nbsp;Đằng trước c&oacute; khuy c&agrave;i v&agrave; kh&oacute;a k&eacute;o. Ph&iacute;a sau c&oacute; t&uacute;i ngang, ph&iacute;a trước c&oacute; 2 t&uacute;i ch&eacute;o.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:402.177px; top:20px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Men</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Slim fit</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Qua mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Denim</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:29px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775645571071746.jpg', NULL, 1, 1, 1, '2023-08-30 09:26:16', NULL);
INSERT INTO `products` VALUES (5, 3, 1, 3, 4, 'Quần tây kể dáng Slim', 'quần-tây-kể-dáng-slim', '22E2743', '50', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Kẻ khói đậm,Kẻ nâu socola', '1350000', '405000', '<p style=\"text-align:justify\">Quần d&agrave;i đai khuy lệch c&oacute; đỉa. C&oacute; 2 t&uacute;i ch&eacute;o. 2 t&uacute;i sau may viền c&oacute; khuy c&agrave;i. Gấu quần may sẵn kiểu lật.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:403.729px; top:8px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Men</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Slim</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Qua mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Kẻ</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Tuysi</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:13px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775645850638396.jpg', 1, NULL, 1, 1, '2023-08-30 09:30:43', NULL);
INSERT INTO `products` VALUES (6, 3, 2, 4, 5, 'Set áo yếm và quần suông dập nổi', 'set-áo-yếm-và-quần-suông-dập-nổi', '16B9265', '20', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Trắng,Xanh matcha', '744000', NULL, '<p style=\"text-align:justify\">&Aacute;o d&aacute;ng cổ yếm, ph&iacute;a trước c&oacute; phần cut-out h&igrave;nh giọt nước. &Aacute;o c&oacute; phần vai trễ. Vai v&agrave; th&acirc;n &aacute;o liền nhau, được xếp bởi 3 tầng với độ bồng bềnh tự nhi&ecirc;n. Ph&iacute;a sau &aacute;o c&oacute; kh&oacute;a k&eacute;o. Chất liệu dập nổi</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:403.5px; top:-9px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>You</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>&Aacute;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Cổ &aacute;o</strong></td>\r\n			<td>C&ocirc;̉ khác</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Tay &aacute;o</strong></td>\r\n			<td>2d&acirc;y</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Xòe</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Croptop</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Lụa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:33px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775646097183091.jpg', NULL, 1, 1, 1, '2023-08-30 09:34:38', NULL);
INSERT INTO `products` VALUES (7, 1, 2, 4, 6, 'Áo thun peplum dập lỗ tạo kiểu', 'Áo-thun-peplum-dập-lỗ-tạo-kiểu', '57B9446', '10', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Xanh Táo,Đen', '850000', '255000', '<p style=\"text-align:justify\">&Aacute;o kiểu cổ tr&ograve;n, tay lửng, eo xếp ly tạo kiểu peplum. Điểm nhấn l&agrave; chi tiết&nbsp;th&ecirc;u,&nbsp;đục lỗ tạo kiểu b&ecirc;n ph&iacute;a vai phải mang lại sự trẻ trung cho người mặc.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:403.771px; top:-3px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>You</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>&Aacute;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Cổ &aacute;o</strong></td>\r\n			<td>C&ocirc;̉ tròn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Tay &aacute;o</strong></td>\r\n			<td>Tay ngắn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Peplum</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Dài thường</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Thun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:9px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775646483027193.jpg', 1, 1, NULL, 1, '2023-08-30 09:41:53', '2023-08-30 09:41:53');
INSERT INTO `products` VALUES (8, 1, 2, 5, 7, 'Quần Baggy Dây Lưng Thắt Nơ', 'quần-baggy-dây-lưng-thắt-nơ', '22M8344', '20', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Hồng nhạt,Nâu socola', '500000', NULL, '<p style=\"text-align:justify\">Với kiểu d&aacute;ng ống đứng thanh tho&aacute;t, chiếc quần n&agrave;y gi&uacute;p t&ocirc;n l&ecirc;n đ&ocirc;i ch&acirc;n d&agrave;i v&agrave; sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những buổi đi l&agrave;m hay c&aacute;c sự kiện đặc biệt. Chất liệu tu&yacute;t si mềm mại v&agrave; tho&aacute;ng m&aacute;t, gi&uacute;p bạn cảm thấy thoải m&aacute;i v&agrave; tự tin suốt cả ng&agrave;y d&agrave;i.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:402.99px; top:23px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Ladies</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>&Ocirc;́ng đứng</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Qua mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Tuysi</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:32px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775646754180477.jpg', NULL, NULL, 1, 1, '2023-08-30 09:45:04', NULL);
INSERT INTO `products` VALUES (9, 1, 2, 5, 8, 'Quần jeans ống rộng', 'quần-jeans-ống-rộng', '25M7828', '10', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Xanh ghi đá', '1090000', '545000', '<p style=\"text-align:justify\">Quần jean d&aacute;ng lửng, form &ocirc;m nhẹ. Ph&iacute;a trước c&oacute; khuy c&agrave;i v&agrave; kh&oacute;a k&eacute;o. Ph&iacute;a sau c&oacute; t&uacute;i hộp.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:377.615px; top:-11px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Ladies</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>&Ocirc;́ng đứng</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Ngang mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Denim</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:20px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775646933399769.jpg', 1, NULL, NULL, 1, '2023-08-30 09:47:55', NULL);
INSERT INTO `products` VALUES (10, 3, 3, 7, 9, 'áo sơ mi cổ Peterpan', 'áo-sơ-mi-cổ-peterpan', '16G1223', '30', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Trắng', '225000', NULL, '<p style=\"text-align:justify\">&Aacute;o sơ mi cổ&nbsp;Peterpan viền b&egrave;o. Tay ngắn bo gấu. D&aacute;ng &aacute;o xu&ocirc;ng. C&agrave;i bằng h&agrave;ng khuy ph&iacute;a trước. Chất vải th&ocirc; đũi c&oacute; họa tiết nổi.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:76.2188px; text-align:justify; top:15px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Girl</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>&Aacute;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Cổ &aacute;o</strong></td>\r\n			<td>C&ocirc;̉ Peterpan</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Tay &aacute;o</strong></td>\r\n			<td>Tay ngắn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Xu&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Dài thường</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Th&ocirc;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:400.49px; top:6px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775647112388233.jpg', NULL, 1, NULL, 1, '2023-08-30 09:50:46', NULL);
INSERT INTO `products` VALUES (11, 3, 3, 7, 10, 'Quần sooc party time', 'quần-sooc-party-time', '20G1618', '30', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Đen', '349000', '244000', '<p style=\"text-align:justify\">Sản phẩm được l&agrave;m từ chất liệu vải th&ocirc;ng tho&aacute;ng, đảm bảo an to&agrave;n cho l&agrave;n da nhạy cảm của b&eacute;. Chất liệu n&agrave;y gi&uacute;p cho b&eacute; cảm thấy thoải m&aacute;i v&agrave; tự do vận độn</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:393.635px; top:-13px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Girl</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>&Ocirc;́ng su&ocirc;ng</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Ngang đ&ugrave;i</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Thun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:29px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775647286957344.jpg', 1, NULL, 1, 1, '2023-08-30 09:53:32', NULL);
INSERT INTO `products` VALUES (12, 3, 3, 6, 11, 'áo Polo thêu hình', 'áo-polo-thêu-hình', '57K1541', '10', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Đen', '350000', NULL, '<p style=\"text-align:justify\">Sử dụng chất liệu vải tho&aacute;ng m&aacute;t, th&ocirc;ng tho&aacute;ng cho những hoạt động vui chơi học tập&nbsp;của b&eacute;. &Aacute;o c&oacute; th&ecirc;u h&igrave;nh trước ngực tạo n&ecirc;n điểm độc đ&aacute;o v&agrave; thu h&uacute;t, h&igrave;nh ảnh được th&ecirc;u nổi, tỉ mỉ tới từng chi tiết, kh&ocirc;ng bị&nbsp;phai m&agrave;u v&agrave; bền bỉ theo thời gian.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:76.2188px; text-align:justify; top:-2px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Boy</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>&Aacute;o</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Cổ &aacute;o</strong></td>\r\n			<td>C&ocirc;̉ đức</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Tay &aacute;o</strong></td>\r\n			<td>Tay ngắn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Dài thường</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Thun</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:-2px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775647405137190.jpg', NULL, 1, NULL, 1, '2023-08-30 09:55:25', NULL);
INSERT INTO `products` VALUES (13, 1, 3, 6, 12, 'Quần dài khaki bé trai', 'quần-dài-khaki-bé-trai', '22K1374', '48', 'Lorem,Ipsum,Amet', 'M,L,XL', 'Xanh tím than', '500000', '200000', '<p style=\"text-align:justify\">Quần d&agrave;i khaki cạp chun co gi&atilde;n, 2 t&uacute;i ch&eacute;o 2 b&ecirc;n - nắp t&uacute;i giả đ&iacute;nh khuy dưới ống quần. Gấu bo chun co gi&atilde;n.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"left:76.2188px; text-align:justify; top:15px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', '<table style=\"width:70%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>D&ograve;ng sản phẩm</strong></td>\r\n			<td>Boy</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Nh&oacute;m sản phẩm</strong></td>\r\n			<td>Quần</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Kiểu d&aacute;ng</strong></td>\r\n			<td>Kh&aacute;c</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Độ d&agrave;i</strong></td>\r\n			<td>Ngang mắt c&aacute; ch&acirc;n</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Họa tiết</strong></td>\r\n			<td>Trơn</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Chất liệu</strong></td>\r\n			<td>Khaki</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<div class=\"ddict_btn\" style=\"left:121.167px; top:27px\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>', 'upload/products/thambnail/1775647500499357.jpg', NULL, 1, NULL, 1, '2023-08-30 09:56:56', '2023-09-11 09:38:07');

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `reviews_product_id_foreign`(`product_id` ASC) USING BTREE,
  INDEX `reviews_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reviews
-- ----------------------------
INSERT INTO `reviews` VALUES (1, 12, 3, 'Áo rất đẹp và phù hợp với túi tiền người mua!', 'Áo đen trẻ em', '1', '2023-09-11 08:38:50', '2023-09-11 08:39:32');
INSERT INTO `reviews` VALUES (2, 12, 4, 'Sản phẩm phải nói là quá tuyệt vời các bạn hãy đến mua ngay nhé!', 'Chúng tôi yêu thích sản phẩm này', '1', '2023-09-11 08:59:08', '2023-09-11 09:01:44');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id` ASC) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('UWWIVpqmXxz1mhkzwrTUX0qAUWIOuM2GwzLV59i3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTHViaEpzWXZPUXdSaVJMZVVhT1dkRXpIUG5hbHFOZUt0M29KbXlkcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1694508308);
INSERT INTO `sessions` VALUES ('vHGZLmQYe8knpHmPguIXtchGsFFpO71gp5N7wPMQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU0pjcDdGeHdLN3VMMWwxdE5wYnh6MDJMMEZaZmdmTjBWVE8xRzMxeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ibG9nL2NhdGVnb3J5Ijt9fQ==', 1694509012);

-- ----------------------------
-- Table structure for ship_cities
-- ----------------------------
DROP TABLE IF EXISTS `ship_cities`;
CREATE TABLE `ship_cities`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ship_cities
-- ----------------------------
INSERT INTO `ship_cities` VALUES (1, 'Hà Nội', '2023-09-01 03:32:38', NULL);
INSERT INTO `ship_cities` VALUES (2, 'Hồ Chí Minh', '2023-09-01 03:32:51', NULL);
INSERT INTO `ship_cities` VALUES (4, 'Quảng Ninh', '2023-09-01 03:35:08', NULL);

-- ----------------------------
-- Table structure for ship_districts
-- ----------------------------
DROP TABLE IF EXISTS `ship_districts`;
CREATE TABLE `ship_districts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_id` bigint UNSIGNED NOT NULL,
  `district_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ship_districts
-- ----------------------------
INSERT INTO `ship_districts` VALUES (1, 1, 'Cầu Giấy', '2023-09-01 03:35:21', NULL);
INSERT INTO `ship_districts` VALUES (2, 1, 'Đống Đa', '2023-09-01 03:42:41', '2023-09-01 03:42:41');
INSERT INTO `ship_districts` VALUES (3, 2, 'Bình Thạnh', '2023-09-01 03:35:54', NULL);
INSERT INTO `ship_districts` VALUES (4, 2, 'Tân Bình', '2023-09-01 03:36:02', NULL);
INSERT INTO `ship_districts` VALUES (5, 4, 'Móng Cái', '2023-09-01 03:36:12', NULL);
INSERT INTO `ship_districts` VALUES (6, 4, 'Đông Triều', '2023-09-01 03:36:21', NULL);

-- ----------------------------
-- Table structure for ship_wards
-- ----------------------------
DROP TABLE IF EXISTS `ship_wards`;
CREATE TABLE `ship_wards`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  `ward_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ship_wards
-- ----------------------------
INSERT INTO `ship_wards` VALUES (1, 1, 1, 'Quan Hoa', '2023-09-01 03:44:00', NULL);
INSERT INTO `ship_wards` VALUES (2, 1, 1, 'Dịch Vọng', '2023-09-01 03:44:10', NULL);
INSERT INTO `ship_wards` VALUES (3, 1, 2, 'Láng Thượng', '2023-09-01 03:45:28', NULL);
INSERT INTO `ship_wards` VALUES (4, 1, 2, 'Ngã Tư Sở', '2023-09-01 03:45:42', NULL);
INSERT INTO `ship_wards` VALUES (5, 4, 6, 'Tân Việt', '2023-09-01 03:45:55', NULL);
INSERT INTO `ship_wards` VALUES (6, 4, 6, 'Tràng An', '2023-09-01 03:46:04', NULL);
INSERT INTO `ship_wards` VALUES (7, 4, 5, 'Hải Yên', '2023-09-01 03:46:16', NULL);
INSERT INTO `ship_wards` VALUES (8, 4, 5, 'Ka Long', '2023-09-01 03:53:13', '2023-09-01 03:53:13');
INSERT INTO `ship_wards` VALUES (9, 2, 3, '1', '2023-09-01 03:47:01', NULL);
INSERT INTO `ship_wards` VALUES (10, 2, 3, '2', '2023-09-01 03:47:06', NULL);
INSERT INTO `ship_wards` VALUES (11, 2, 4, '3', '2023-09-01 03:47:35', NULL);
INSERT INTO `ship_wards` VALUES (12, 2, 4, '4', '2023-09-01 03:47:42', NULL);

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (1, 'upload/slider/1775712246885712.jpg', 'thời trang nữ', 'thiết kế tối giản nhưng không đơn giản', 1, NULL, '2023-08-31 03:06:52');
INSERT INTO `sliders` VALUES (2, 'upload/slider/1775712265392135.jpg', 'thời trang nam', 'thiết kế tối giản nhưng không đơn giản', 1, NULL, NULL);

-- ----------------------------
-- Table structure for sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_categories
-- ----------------------------
INSERT INTO `sub_categories` VALUES (2, 1, 'Áo', 'Áo', NULL, NULL);
INSERT INTO `sub_categories` VALUES (3, 1, 'Quần', 'quần', NULL, NULL);
INSERT INTO `sub_categories` VALUES (4, 2, 'Áo', 'Áo', NULL, NULL);
INSERT INTO `sub_categories` VALUES (5, 2, 'Quần', 'quần', NULL, NULL);
INSERT INTO `sub_categories` VALUES (6, 3, 'Bé trai', 'bé-trai', NULL, '2023-08-30 07:01:44');
INSERT INTO `sub_categories` VALUES (7, 3, 'Bé gái', 'bé-gái', NULL, '2023-08-30 07:01:53');

-- ----------------------------
-- Table structure for sub_sub_categories
-- ----------------------------
DROP TABLE IF EXISTS `sub_sub_categories`;
CREATE TABLE `sub_sub_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `subsubcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_sub_categories
-- ----------------------------
INSERT INTO `sub_sub_categories` VALUES (1, 1, 2, 'Áo polo', 'Áo-polo', NULL, '2023-08-30 06:55:04');
INSERT INTO `sub_sub_categories` VALUES (2, 1, 2, 'Áo thun', 'Áo-thun', NULL, '2023-08-30 06:55:11');
INSERT INTO `sub_sub_categories` VALUES (3, 1, 3, 'Quần jeans', 'quần-jeans', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (4, 1, 3, 'Quần tây', 'quần-tây', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (5, 2, 4, 'Áo croptop', 'Áo-croptop', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (6, 2, 4, 'Áo kiểu', 'Áo-kiểu', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (7, 2, 5, 'Quần baggy', 'quần-baggy', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (8, 2, 5, 'Quần jeans', 'quần-jeans', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (9, 3, 7, 'Áo bé gái', 'Áo-bé-gái', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (10, 3, 7, 'Quần bé gái', 'quần-bé-gái', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (11, 3, 6, 'Áo bé trai', 'Áo-bé-trai', NULL, NULL);
INSERT INTO `sub_sub_categories` VALUES (12, 3, 6, 'Quần bé trai', 'quần-bé-trai', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_seen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `current_team_id` bigint UNSIGNED NULL DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'User', 'user@gmail.com', '0372953299', NULL, NULL, '$2y$10$pNH8JVdsXIAZC76MGgEtk.YgUSl3DxzuZMdFH6che3J35XMub6nWm', NULL, NULL, NULL, NULL, NULL, '202308290800Phạm Thanh Chi.jpg', '2023-08-20 20:55:06', '2023-08-29 08:00:36');
INSERT INTO `users` VALUES (3, 'Phạm Thanh Chi', 'thanhchi.pham.14@gmail.com', '0372953295', '2023-09-11 20:24:12', NULL, '$2y$10$cyBIfLouzcTD2uqXX6vgkusZy5q5xsBO3VD8NCsVcwjFn2eoAeDA.', NULL, NULL, NULL, NULL, NULL, '2023090602449b2f7a01d1872920310860e6da91be82.jpg', '2023-09-06 02:19:28', '2023-09-11 20:24:12');
INSERT INTO `users` VALUES (4, 'NguyenVanTuan', 'tuannv@gmail.com', '0372953299', '2023-09-11 21:59:02', NULL, '$2y$10$n2UtAcNecWT/OKXOHxX1OeAjEes96ChJPhVyfHbrBQfVJij0iowXW', NULL, NULL, NULL, NULL, NULL, '202309110857KH.jpg', '2023-09-11 08:57:07', '2023-09-11 21:59:02');

-- ----------------------------
-- Table structure for wishlists
-- ----------------------------
DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of wishlists
-- ----------------------------
INSERT INTO `wishlists` VALUES (2, 1, 13, '2023-09-01 01:30:16', NULL);
INSERT INTO `wishlists` VALUES (3, 1, 12, '2023-09-01 01:30:18', NULL);

SET FOREIGN_KEY_CHECKS = 1;
