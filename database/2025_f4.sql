-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2025 lúc 09:22 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `2025_f4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `path` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `path`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Xanh - Vì Cộng Đồng', 'forestry4.0@ifee.edu.vn', '$2y$12$UJcqPapstlxZNLvbBzuOeuKBFAW2YKlveacbUx1KvMJM3912PgbSy', NULL, NULL, '2025-05-10 02:12:49', '2025-05-10 02:12:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-05-10 16:13:44', '2025-05-10 16:13:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_document_items`
--

CREATE TABLE `cart_document_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `uploader_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `path` text NOT NULL,
  `download_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `documents`
--

INSERT INTO `documents` (`id`, `type_id`, `uploader_id`, `title`, `price`, `path`, `download_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(580, 36, 1, 'Các hoạt động thích ứng với Quy định EUDR', 26000, '1/36/document1.pdf', 0, NULL, NULL, NULL),
(581, 36, 1, 'Quy định của Liên minh châu Âu về các sản phẩm không gây phá rừng (EUDR).', 16000, '1/36/document2.pdf', 0, NULL, NULL, NULL),
(582, 36, 1, 'Tình hình xuất nhập khẩu cao su của việt nam 2023 và tác động eudr đối với ngành cao su', 43000, '1/36/document3.pdf', 0, NULL, NULL, NULL),
(583, 36, 1, 'EU action to protect and restore the world’s forests', 33000, '1/36/document4.pdf', 0, NULL, NULL, NULL),
(584, 37, 1, 'Tài liệu hướng dẫn thực hiện Quy định (EU) 2023/1115 về sản phẩm không gây phá rừng (Tiếng Anh)', 18000, '1/37/document1.pdf', 0, NULL, NULL, NULL),
(585, 37, 1, 'Tài liệu hướng dẫn thực hiện Quy định (EU) 2023/1115 về sản phẩm không gây phá rừng', 17000, '1/37/document2.pdf', 0, NULL, NULL, NULL),
(586, 37, 1, 'Các câu hỏi thường gặp Về việc thực hiện Quy định của Liên minh châu Âu về sản phẩm không gây phá rừng', 17000, '1/37/document3.pdf', 0, NULL, NULL, NULL),
(587, 37, 1, 'Yêu cầu thực hiện Hệ thống trách nhiệm giải trình của PEFC đối với quy định sản xuất hàng hóa không gây mất rừng (PEFC EUDR DDS)', 15000, '1/37/document4.pdf', 0, NULL, NULL, NULL),
(588, 38, 1, 'Quyết định về việc công bố diện tích rừng thuộc các lưu vực làm cơ sở thực hiện chính sách chi trả dịch vụ môi trường rừng', 43000, '2/38/document1.pdf', 0, NULL, NULL, NULL),
(589, 38, 1, 'Hỏi đáp về pháp luật lâm nghiệp', 41000, '2/38/document2.pdf', 0, NULL, NULL, NULL),
(590, 38, 1, 'Thành lập Quỹ Bảo vệ và Phát triển rừng Việt Nam', 24000, '2/38/document3.pdf', 0, NULL, NULL, NULL),
(591, 38, 1, 'Ban hành điều lệ mẫu về tổ chức và hoạt động của Quỹ Bảo vệ và Phát triển rừng cấp tỉnh', 27000, '2/38/document4.pdf', 0, NULL, NULL, NULL),
(592, 39, 1, 'Báo cáo Nghiên cứu thí điểm CPFES_Final', 50000, '2/39/document1.pdf', 0, NULL, NULL, NULL),
(593, 39, 1, 'Văn bản xin ý kiến góp ý', 20000, '2/39/document2.pdf', 0, NULL, NULL, NULL),
(594, 40, 1, 'Sổ tay hướng dẫn trả tiền dịch vụ môi trường rừng qua tài khoản ngân hàng', 34000, '2/40/document1.pdf', 0, NULL, NULL, NULL),
(595, 40, 1, 'Phân bổ tiền chi trả từ Chi trả dịch vụ môi trường rừng (PFES) ở Việt Nam', 20000, '2/40/document2.pdf', 0, NULL, NULL, NULL),
(596, 40, 1, 'Sổ tay hướng dẫn trả tiền dịch vụ môi trường rừng qua giao dịch điện tử, bưu điện', 22000, '2/40/document3.pdf', 0, NULL, NULL, NULL),
(597, 40, 1, 'Sơ đồ dòng tiền trong chi trả dịch vụ môi trường rừng', 18000, '2/40/document4.pdf', 0, NULL, NULL, NULL),
(598, 41, 1, 'Cộng đồng thực hiện chính sách chi trả DVMTR', 17000, '2/41/document1.pdf', 0, NULL, NULL, NULL),
(599, 41, 1, 'Sơ đồ dòng tiền trong chi trả dịch vụ môi trường rừng', 48000, '2/41/document2.pdf', 0, NULL, NULL, NULL),
(600, 41, 1, 'Cẩm nang quản lý và sử dụng tiền dịch vụ môi trường rừng tại thôn, bản', 28000, '2/41/document3.pdf', 0, NULL, NULL, NULL),
(601, 41, 1, 'Tài liệu Cacbon PFES', 24000, '2/41/document4.pdf', 0, NULL, NULL, NULL),
(602, 42, 1, 'Quyết định số 4147/QĐ-BNN-TCLN ngày 25/10/2021 Ban hành hướng dẫn kỹ thuật trồng rừng đối với 4 loài cây ngập mặn: Dà vôi, Dừa nước, Đước vòi và Tra bồ đề', 20000, '3/42/document1.pdf', 0, NULL, NULL, NULL),
(603, 42, 1, 'Nghị quyết số 32/2016/NQ-HĐND ngày 21/07/2016 Quy định về phí bình tuyển, công nhận cây mẹ, cây đầu dòng, vườn giống cây lâm nghiệp, rừng giống trên địa bàn tỉnh Hà Giang', 46000, '3/42/document2.pdf', 0, NULL, NULL, NULL),
(604, 42, 1, 'Thông tư 107/2021/TT-BTC ngày 03/12/2021 Quy định quản lý, sử dụng và thanh quyết toán kinh phí sự nghiệp thực hiện nhiệm vụ phát triển sản xuất giống trong Chương trình Phát triển nghiên cứu, sản xuất giống phục vụ cơ cấu lại ngành nông nghiệp giai đoạn 2021-2030', 47000, '3/42/document3.pdf', 0, NULL, NULL, NULL),
(605, 42, 1, 'Quyết định số 472/QĐ-BNN-TCLN ngày 17/02/2016 Ban hành Quy chế quản lý và sử dụng cơ sở dữ liệu về giống cây trồng lâm nghiệp', 37000, '3/42/document4.pdf', 0, NULL, NULL, NULL),
(606, 43, 1, 'Tài liệu Xây dựng và quản lý rừng giống', 27000, '3/43/document1.pdf', 0, NULL, NULL, NULL),
(607, 43, 1, 'Tổng hợp thông tin về giống cây trồng Lâm nghiệp', 40000, '3/43/document2.pdf', 0, NULL, NULL, NULL),
(608, 43, 1, 'Kỹ thuật Lâm sinh nâng cao', 33000, '3/43/document3.pdf', 0, NULL, NULL, NULL),
(609, 43, 1, 'Hướng dẫn kỹ thuật lâm sinh đơn giản cho rừng tự nhiên Việt Nam.', 24000, '3/43/document4.pdf', 0, NULL, NULL, NULL),
(610, 44, 1, 'Tài liệu tập huấn các biện pháp kỹ thuật lâm sinh trong phát triển rừng tự nhiên', 30000, '3/44/document1.pdf', 0, NULL, NULL, NULL),
(611, 44, 1, 'Tài liệu tập huấn các biện pháp kỹ thuật lâm sinh trong phát triển rừng trồng', 43000, '3/44/document2.pdf', 0, NULL, NULL, NULL),
(612, 45, 1, 'Đề án nâng cao độ che phủ rừng giai đoạn 2021 - 2025 định hướng 2030', 21000, '3/45/document1.pdf', 0, NULL, NULL, NULL),
(613, 45, 1, 'Báo cáo đề án phát triển rừng bền vững bằng phương thức nông lâm kết hợp và trồng cây phân tán giai đoạn 2021 - 2025 tỉnh Đắk Nông', 24000, '3/45/document2.pdf', 0, NULL, NULL, NULL),
(614, 46, 1, 'Hướng dẫn kỹ thuật trồng mới và trồng bổ sung 3 loài cây ngập mặn Cây bần chua (Sonneratia caseolaris (L.) Engler); cây Trang (Kandelia obovata Sheue, Liu & Yong); Cây Mắm biển (Avicennia marina (Forssk.) Vierh)', 27000, '3/46/document1.pdf', 0, NULL, NULL, NULL),
(615, 46, 1, 'Kỹ thuật trồng thâm canh keo lai mô ah1 &ah7 theo hướng cung cấp gỗ lớn tại tuyên quang, phú thọ và bắc giang', 21000, '3/46/document2.pdf', 0, NULL, NULL, NULL),
(616, 46, 1, 'Kỹ thuật trồng thâm canh cây trám đen ghép', 31000, '3/46/document3.pdf', 0, NULL, NULL, NULL),
(617, 47, 1, 'Công nhận giống cây trồng lâm nghiệp (9 giống Bạch đàn mới)', 39000, '4/47/document1.pdf', 0, NULL, NULL, NULL),
(618, 47, 1, 'Công nhận tiến bộ kỹ thuật “Kỹ thuật nhân giống cây Huỷnh (Tarrietia javanica Blume) bằng gieo ươm từ hạt\"', 46000, '4/47/document2.pdf', 0, NULL, NULL, NULL),
(619, 47, 1, 'Hướng dẫn kỹ thuật gieo ươm, trồng, chăm sóc, nuôi dưỡng, khai thác, sơ chế và bảo quản sản phẩm Quế ( Cinamomum cassia BL)', 43000, '4/47/document3.pdf', 0, NULL, NULL, NULL),
(620, 47, 1, 'Quyết định về việc công nhận giống cây trồng Lâm nghiệp (03 dòng Keo lá tràm: AA56, AA92 và AA95)', 32000, '4/47/document4.pdf', 0, NULL, NULL, NULL),
(621, 48, 1, 'Quyết định số 171/QĐ-TTg về việc phê duyệt Đề án nâng cao chất lượng rừng nhằm bảo tồn hệ sinh thái rừng và phòng, chống thiên tai đến năm 20230', 23000, '5/48/document1.pdf', 0, NULL, NULL, NULL),
(622, 48, 1, 'Nghị định 27/2024/NĐ-CP về việc sửa đổi, bổ sung một số điều của Nghị định 156/2018/NĐ-CP ngày 16 tháng 11 năm 2018 của Chính phủ quy định chi tiết thi hành một số điều của Luật Lâm nghiệp', 35000, '5/48/document2.pdf', 0, NULL, NULL, NULL),
(623, 48, 1, 'Quyết định số 171/QĐ-TTg của Thủ tướng Chính phủ ngày 07/2/2024 Phê duyệt Đề án nâng cao chất lượng rừng nhằm bảo tồn hệ sinh thái rừng và phòng, chống thiên tai đến năm 2030', 40000, '5/48/document3.pdf', 0, NULL, NULL, NULL),
(624, 48, 1, 'Thông tư số Số: 13/2023/TT-BNNPTNT ngày 30/11/2023 Sửa đổi bổ sung một số điều của Thông tư số 28/2018/TTBNNPTNT', 24000, '5/48/document4.pdf', 0, NULL, NULL, NULL),
(625, 49, 1, 'Guidance document for the development of sustainable forest management plans (Intended for organization)', 36000, '5/49/document1.pdf', 0, NULL, NULL, NULL),
(626, 49, 1, 'Hướng dẫn xây dựng Phương án Quản lý rừng bền vững (Dành cho chủ rừng là tổ chức)', 49000, '5/49/document2.pdf', 0, NULL, NULL, NULL),
(627, 49, 1, 'Guidance document for the development of sustainable forest management plans (Intended for households, individuals and communities)', 44000, '5/49/document3.pdf', 0, NULL, NULL, NULL),
(628, 49, 1, 'Hướng dẫn xây dựng Phương án Quản lý rừng bền vững (Dành cho chủ rừng là hộ gia đình, các nhân, cộng đồng dân cư', 33000, '5/49/document4.pdf', 0, NULL, NULL, NULL),
(629, 50, 1, 'Kinh nghiệm thực hiện quản lý rừng bên vững và chứng chỉ rừng đối với công ty lâm nghiệp', 30000, '5/50/document1.pdf', 0, NULL, NULL, NULL),
(630, 50, 1, 'Chính sách tham vấn', 15000, '5/50/document2.pdf', 0, NULL, NULL, NULL),
(631, 50, 1, 'Chính sách về giải quyết khiếu nại', 22000, '5/50/document3.pdf', 0, NULL, NULL, NULL),
(632, 50, 1, 'Hướng dẫn đánh giá theo bộ tiêu chuẩn quản lý rừng SFC quốc gia Việt Nam', 39000, '5/50/document4.pdf', 0, NULL, NULL, NULL),
(633, 51, 1, 'Phương án quản lý rừng bền vững giai đoạn 2021-2030 của Vườn Quốc gia Bidoup - Núi Bà', 27000, '5/51/document1.pdf', 0, NULL, NULL, NULL),
(634, 51, 1, 'Phương án quản lý rừng bền vững của ban quản lý rừng phòng hộ Nam Cát Tiên, giai đoạn 2022-2031', 11000, '5/51/document2.pdf', 0, NULL, NULL, NULL),
(635, 51, 1, 'Phương án quản lý rừng bền vững Vườn Quốc gia Tà Đùng, giai đoạn 2021 - 2030', 27000, '5/51/document3.pdf', 0, NULL, NULL, NULL),
(636, 51, 1, 'Phương án QLRBV VQG Cúc Phương', 44000, '5/51/document4.pdf', 0, NULL, NULL, NULL),
(637, 52, 1, 'Quản lý và sử dụng đất tại các công ty lâm nghiệp', 50000, '5/52/document1.pdf', 0, NULL, NULL, NULL),
(638, 52, 1, 'Thực trạng và giải pháp Khoán đất lâm nghiệp trong các công ty Lâm nghiệp', 31000, '5/52/document2.pdf', 0, NULL, NULL, NULL),
(639, 52, 1, 'Dự thảo Báo cáo Nghiên cứu, đánh giá hiện trạng và đề xuất giải pháp giao khoán đất lâm nghiệp trong các công ty lâm nghiệp', 17000, '5/52/document3.pdf', 0, NULL, NULL, NULL),
(640, 52, 1, 'Cơ chế tài chính bền vững trong hoạt động kinh doanh và dịch vụ du lịch sinh thái tại các Vườn Quốc gia và Khu bảo tồn thiên nhiên ở Việt Nam', 29000, '5/52/document4.pdf', 0, NULL, NULL, NULL),
(641, 53, 1, 'Quyết định số 153/QĐ-UBND ngày 23/1/2024 về việc phê duyệt Đề án du lịch sinh thái, nghỉ dưỡng, giải trí Vườn Quốc gia Phong Nha - Kẻ Bàng, giai đoạn 2021 - 2030.', 48000, '5/53/document1.pdf', 0, NULL, NULL, NULL),
(642, 54, 1, 'Luật Lâm nghiệp', 43000, '6/54/document1.pdf', 0, NULL, NULL, NULL),
(643, 54, 1, 'Nghị định quy định chi tiết thi hành một số điều của Luật Lâm nghiệp', 44000, '6/54/document2.pdf', 0, NULL, NULL, NULL),
(644, 54, 1, 'Thông tư Số: 20/2023/TT-BNNPTNT quy định phương pháp đinh giá rừng; Hướng dẫn định khung giá rừng', 31000, '6/54/document3.pdf', 0, NULL, NULL, NULL),
(645, 54, 1, 'Quyết định Số: 06/2021/QĐ-UBND Ban hành khung giá các loại rừng trên địa bàn tỉnh Bình Thuận', 22000, '6/54/document4.pdf', 0, NULL, NULL, NULL),
(646, 55, 1, 'Kinh nghiệm quốc tế và các đề xuất sửa đổi khung pháp lý về định giá rừng tại Việt Nam', 45000, '6/55/document1.pdf', 0, NULL, NULL, NULL),
(647, 56, 1, 'Báo cáo thuyết minh thực hiện nhiệm vụ điều tra, khảo sát, xây dựng khung giá các loại rừng trên địa bàn Tỉnh Thanh Hóa', 49000, '6/56/document1.pdf', 0, NULL, NULL, NULL),
(648, 56, 1, 'Báo cáo đề án xây dựng khung giá rừng trên địa bàn tỉnh Hòa Bình', 22000, '6/56/document2.pdf', 0, NULL, NULL, NULL),
(649, 56, 1, 'Báo cáo đề án xây dựng khung giá rừng trên địa bàn tỉnh Đắk Nông', 22000, '6/56/document3.pdf', 0, NULL, NULL, NULL),
(650, 56, 1, 'Báo cáo đề án xây dựng khung giá rừng trên địa bàn tỉnh Đắk Lắk', 28000, '6/56/document4.pdf', 0, NULL, NULL, NULL),
(651, 57, 1, 'Mẫu khóa ảnh vệ tinh phục vụ xây dựng bản đồ hiện trạng rừng - Yêu cầu kỹ thuật', 26000, '7/57/document1.pdf', 0, NULL, NULL, NULL),
(652, 57, 1, 'Bản đồ lập địa - Quy định trình bày và thể hiện nội dung - Phần 1: Bản đồ lập địa cấp I', 24000, '7/57/document2.pdf', 0, NULL, NULL, NULL),
(653, 57, 1, 'Bản đồ lập địa - Quy định trình bày và thể hiện nội dung - Phần 2: Bản đồ lập địa cấp II ', 43000, '7/57/document3.pdf', 0, NULL, NULL, NULL),
(654, 57, 1, 'Bản đồ lập địa - Quy định trình bày và thể hiện nội dung - Phần 3: Bản đồ lập địa cấp III', 45000, '7/57/document4.pdf', 0, NULL, NULL, NULL),
(655, 58, 1, 'Thông tư số 21/2023/TT-BNNPTNT về Quy định một số định mức kinh tế - kỹ thuật về Lâm nghiệp', 40000, '8/58/document1.pdf', 0, NULL, NULL, NULL),
(656, 58, 1, 'Nghị định số 58/2024/NĐ-CP về một số chính sách đầu tư trong lâm nghiệp', 34000, '8/58/document2.pdf', 0, NULL, NULL, NULL),
(657, 58, 1, 'Thông tư số 05/2024/TT-BNNPTNT về việc Quy định địnhmức kinh tế - kỹ thuật điều tra rừng', 23000, '8/58/document3.pdf', 0, NULL, NULL, NULL),
(658, 58, 1, 'Thông tư 42/2014/TT-BTNMT về Định mức kinh tế - kỹ thuật thống kê, kiểm kê đất đai và lập bản đồ hiện trạng sử dụng đất do Bộ trưởng Bộ Tài nguyên và Môi trường ban hành', 42000, '8/58/document4.pdf', 0, NULL, NULL, NULL),
(659, 59, 1, 'Xây dựng định mức kinh tế kỹ thuật dự án điều tra, đánh giá và giám sát tài nguyên rừng quốc gia', 38000, '8/59/document1.pdf', 0, NULL, NULL, NULL),
(660, 60, 1, 'Xây dựng bộ định mức kinh tế - kỹ thuật thực hiện đề án kiểm kê rừng toàn quốc giai đoạn 2024 - 2025', 30000, '8/60/document1.pdf', 0, NULL, NULL, NULL),
(661, 61, 1, 'Sách hướng dẫn thi hành luật về định dạng các loài rùa cạn và rùa nước ngọt Việt Nam', 11000, '9/61/document1.pdf', 0, NULL, NULL, NULL),
(662, 61, 1, 'Côn trùng rừng', 43000, '9/61/document2.pdf', 0, NULL, NULL, NULL),
(663, 61, 1, 'Nhận dạng nhanh một số loài động vật hoang dã được Công ước CITES và Pháp luật Việt Nam bảo vệ', 20000, '9/61/document3.pdf', 0, NULL, NULL, NULL),
(664, 61, 1, 'Động vật rừng', 22000, '9/61/document4.pdf', 0, NULL, NULL, NULL),
(665, 62, 1, 'Thực vật rừng', 33000, '9/62/document1.pdf', 0, NULL, NULL, NULL),
(666, 62, 1, 'Sổ tay nhận biết các loài cây gỗ thường gặp kiểu rừng khô thưa cây họ dầu (rừng khộp) ở tây nguyên', 45000, '9/62/document2.pdf', 0, NULL, NULL, NULL),
(667, 62, 1, 'Sổ tay nhận biết các loài cây gỗ thường gặp kiểu rừng lá rộng thường xanh và nửa rụng lá ở tây nguyên', 25000, '9/62/document3.pdf', 0, NULL, NULL, NULL),
(668, 62, 1, 'Bảng tra cứu tên loài (tiếng việt) cho sách cây cỏ Việt Nam quyển 1, 2, 3', 30000, '9/62/document4.pdf', 0, NULL, NULL, NULL),
(669, 63, 1, 'Thông tư 53/2024/TT-BTNMT về việc Ban hành quy trình kỹ thuật kiểm kê, quan trắc đa dạng sinh học', 21000, '10/63/document1.pdf', 0, NULL, NULL, NULL),
(670, 63, 1, 'Thông tư số 11/2024/TT-BNNPTNT về Quy định định mức kinh tế - kỹ thuật kiểm kê rừng, theo dõi diễn biến rừng', 31000, '10/63/document2.pdf', 0, NULL, NULL, NULL),
(671, 63, 1, 'Quyết định số 145/QĐ-KL-CĐS về việc ban hành \"Sổ tay hướng dẫn kỹ thuật điều tra rừng\"', 10000, '10/63/document3.pdf', 0, NULL, NULL, NULL),
(672, 63, 1, 'Thông tư số 16/2023/TT-BNNPTNT về việc Sửa đổi, bổ sung một số điều của Thông tư số 33/2018/TT-BNNPTNT ngày 16 tháng 11 năm 2018 của Bộ trưởng Bộ Nông nghiệp và Phát triển nông thôn quy định về điều tra, kiểm kê và theo dõi diễn biến rừng', 31000, '10/63/document4.pdf', 0, NULL, NULL, NULL),
(673, 64, 1, 'Thông tư số 39/2023/TT-BTC về Quy định mức thu, chế độ thu, nộp, miễn, quản lý và sử dụng phí khai thác và sử dụng dữ liệu viễn thám quốc gia', 46000, '10/64/document1.pdf', 0, NULL, NULL, NULL),
(674, 64, 1, 'Công văn về việc điều tra, đánh giá hiện trạng rừng', 34000, '10/64/document2.pdf', 0, NULL, NULL, NULL),
(675, 64, 1, 'THÔNG BÁO Kết luận của Phó Thủ tướng Chính phủ Trần Lưu Quang tại cuộc họp về dự thảo Đề án kiểm kê rừng toàn quốc', 21000, '10/64/document3.pdf', 0, NULL, NULL, NULL),
(676, 65, 1, 'Sổ tay Hướng dẫn kỹ thuật điều tra rừng', 37000, '10/65/document1.pdf', 0, NULL, NULL, NULL),
(677, 66, 1, 'TCVN 12510-1:2018 rừng trồng – rừng phòng hộ ven biển', 12000, '10/66/document1.pdf', 0, NULL, NULL, NULL),
(678, 66, 1, 'Hướng dẫn sử dụng phần mềm quản lý dữ liệu điều tra kiểm kê rừng', 10000, '10/66/document2.pdf', 0, NULL, NULL, NULL),
(679, 66, 1, 'Hướng dẫn kiểm tra, nghiệm thu thành quả điều tra, kiểm kê rừng', 33000, '10/66/document3.pdf', 0, NULL, NULL, NULL),
(680, 66, 1, 'Hướng dẫn xây dựng, biên tập bản đồ điều tra, kiểm kê rừng', 35000, '10/66/document4.pdf', 0, NULL, NULL, NULL),
(681, 67, 1, 'Hướng dẫn sử dụng tạm thời phần mềm cập nhật diễn biến rừng', 30000, '10/67/document1.pdf', 0, NULL, NULL, NULL),
(682, 67, 1, 'Phương pháp xác định diện tích rừng bị thiệt hại do thiên tai', 50000, '10/67/document2.pdf', 0, NULL, NULL, NULL),
(683, 67, 1, 'Các khu rừng đặc dụng Việt Nam', 49000, '10/67/document3.pdf', 0, NULL, NULL, NULL),
(684, 68, 1, 'Quyết định phê duyệt Đề án Thành lập và phát triển thị trường các-bon tại Việt Nam', 39000, '11/68/document1.pdf', 0, NULL, NULL, NULL),
(685, 68, 1, 'Quyết định ban hành Sổ tay hướng dẫn kỹ thuật xác định sinh khối và trữ lượng các - bon rừng ngập mặn', 48000, '11/68/document2.pdf', 0, NULL, NULL, NULL),
(686, 68, 1, 'Quyết định số 641 /qđ-bnn-tcln v/v ban hành kế hoạch chia sẻ lợi ích từ thỏa thuận chi trả giảm phát thải khí nhà kính vùng bắc trung bộ', 14000, '11/68/document3.pdf', 0, NULL, NULL, NULL),
(687, 68, 1, 'Quyết định số 882/QĐ-TTg ngày 22/7/2022 của Thủ tướng Chính phủ phê duyệt Kế hoạch hành động quốc gia về tăng trưởng xanh giai đoạn 2021 - 2030', 37000, '11/68/document4.pdf', 0, NULL, NULL, NULL),
(688, 69, 1, 'Kế hoạch chia sẻ lợi ích từ thỏa thuận chi trả giảm phát thải khí nhà kính vùng bắc trung bộ', 20000, '11/69/document1.pdf', 0, NULL, NULL, NULL),
(689, 69, 1, 'Chỉ thị số 13/CT-TTg về tăng cường công tác quản lý tín chỉ các-bon nhằm thực hiện Đóng góp do quốc gia tự quyết định', 41000, '11/69/document2.pdf', 0, NULL, NULL, NULL),
(690, 69, 1, 'Quyết định số 55/QĐ-TCLN-VP về việc giao nhiệm vụ triển kai Quyết định số 366/QĐ-BNN-TCLN ngày 19 tháng 01 năm 2023 của Bộ trưởng Bộ Nông nghiệp và Phát triển nôn thôn về việc thực hiện Nghị định số 107/2022/NĐ-CP ngày 28 tháng 12 năm 2022 của Chính phủ về thí điểm chuyển nhượng kết quả giảm phát thải và quản lý tài chính Thỏa thuận chi trả giảm phát thải khí nhà kính vùng Bắc Trung Bộ', 47000, '11/69/document3.pdf', 0, NULL, NULL, NULL),
(691, 70, 1, 'Chính sách chi trả giảm phát thải vùng Bắc Trung Bộ - Hỏi đáp dành cho cá nhân, hộ gia đình và cộng đồng quản lý, bảo vệ rừng', 34000, '11/70/document1.pdf', 0, NULL, NULL, NULL),
(692, 70, 1, 'Thị trường Cac bon xanh tại Việt Nam - Cifor', 30000, '11/70/document2.pdf', 0, NULL, NULL, NULL),
(693, 71, 1, 'How National legislation can advance carbon justice a policy toolkit', 48000, '11/71/document1.pdf', 0, NULL, NULL, NULL),
(694, 71, 1, 'Thị trường Carbon - một số khái niệm', 15000, '11/71/document2.pdf', 0, NULL, NULL, NULL),
(695, 71, 1, 'Quyết định phê duyệt Đề án Thành lập và phát triển thị trường các-bon tại Việt Nam', 35000, '11/71/document3.pdf', 0, NULL, NULL, NULL),
(696, 71, 1, 'Quyết định ban hành Sổ tay hướng dẫn kỹ thuật xác định sinh khối và trữ lượng các - bon rừng ngập mặn', 36000, '11/71/document4.pdf', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_downloads`
--

CREATE TABLE `document_downloads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL,
  `download_time` datetime DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_fields`
--

CREATE TABLE `document_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `bg_class` varchar(50) NOT NULL,
  `tx_class` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `document_fields`
--

INSERT INTO `document_fields` (`id`, `name`, `slug`, `bg_class`, `tx_class`, `icon_class`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quy định chống phá rừng EU', 'quy-dinh-chong-pha-rung-eu', 'bg-secondary-transparent', 'tx-secondary', 'bi bi-shield-check', NULL, NULL, NULL),
(2, 'Quỹ bảo vệ phát triển rừng', 'quy-bao-ve-phat-trien-rung', 'bg-success-transparent', 'tx-success', 'bi bi-patch-check', NULL, NULL, NULL),
(3, 'Giống Lâm nghiệp - Lâm sinh', 'giong-lam-nghiep-lam-sinh', 'bg-purple-transparent', 'tx-purple', 'bi bi-flower3', NULL, NULL, NULL),
(4, 'Mùa vụ trồng rừng', 'mua-vu-trong-rung', 'bg-info-transparent', 'tx-info', 'bi bi-brightness-low', NULL, NULL, NULL),
(5, 'Quản lý rừng bền vững', 'quan-ly-rung-ben-vung', 'bg-pink-transparent', 'tx-pink', 'bi bi-tree', NULL, NULL, NULL),
(6, 'Khung giá rừng', 'khung-gia-rung', 'bg-danger-transparent', 'tx-danger', 'bi bi-coin', NULL, NULL, NULL),
(7, 'Tiêu chuẩn Việt Nam', 'tieu-chuan-viet-nam', 'bg-warning-transparent', 'tx-warning', 'bi bi-journal-check', NULL, NULL, NULL),
(8, 'Định mức kinh tế kỹ thuật', 'dinh-muc-kinh-te-ky-thuat', 'bg-teal-transparent', 'tx-teal', 'bi bi-currency-euro', NULL, NULL, NULL),
(9, 'Đa dạng sinh học', 'da-dang-sinh-hoc', 'bg-secondary-transparent', 'tx-secondary', 'bi bi-twitter', NULL, NULL, NULL),
(10, 'Dự án điều tra rừng', 'du-an-dieu-tra-rung', 'bg-success-transparent', 'tx-success', 'bi bi-layers', NULL, NULL, NULL),
(11, 'Chi trả Các bon', 'chi-tra-cac-bon', 'bg-primary-transparent', 'tx-primary', 'bi bi-c-circle', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_images`
--

CREATE TABLE `document_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `document_types`
--

INSERT INTO `document_types` (`id`, `field_id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 1, 'Đề tài/Dự án/Nhiệm vụ', 'de-tai-du-an-nhiem-vu', NULL, NULL, NULL),
(37, 1, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', NULL, NULL, NULL),
(38, 2, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(39, 2, 'Công văn/Văn bản', 'cong-van-van-ban', NULL, NULL, NULL),
(40, 2, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(41, 2, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', NULL, NULL, NULL),
(42, 3, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(43, 3, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(44, 3, 'Bài giảng', 'bai-giang', NULL, NULL, NULL),
(45, 3, 'Đề tài/Dự án/Nhiệm vụ', 'de-tai-du-an-nhiem-vu', NULL, NULL, NULL),
(46, 3, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', NULL, NULL, NULL),
(47, 4, 'Tài liệu', 'tai-lieu', NULL, NULL, NULL),
(48, 5, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(49, 5, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(50, 5, 'Bài giảng', 'bai-giang', NULL, NULL, NULL),
(51, 5, 'Đề tài/Dự án/Nhiệm vụ', 'de-tai-du-an-nhiem-vu', NULL, NULL, NULL),
(52, 5, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', NULL, NULL, NULL),
(53, 5, 'Đề án DLST', 'de-an-dlst', NULL, NULL, NULL),
(54, 6, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(55, 6, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(56, 6, 'Đề tài/Dự án/Nhiệm vụ', 'de-tai-du-an-nhiem-vu', NULL, NULL, NULL),
(57, 7, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(58, 8, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(59, 8, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(60, 8, 'Đề tài/Dự án/Nhiệm vụ', 'de-tai-du-an-nhiem-vu', NULL, NULL, NULL),
(61, 9, 'Động vật', 'dong-vat', NULL, NULL, NULL),
(62, 9, 'Thực vật', 'thuc-vat', NULL, NULL, NULL),
(63, 10, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(64, 10, 'Công văn/Văn bản', 'cong-van-van-ban', NULL, NULL, NULL),
(65, 10, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(66, 10, 'Bài giảng', 'bai-giang', NULL, NULL, NULL),
(67, 10, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', NULL, NULL, NULL),
(68, 11, 'Văn bản pháp lý', 'van-ban-phap-ly', NULL, NULL, NULL),
(69, 11, 'Công văn/Văn bản', 'cong-van-van-ban', NULL, NULL, NULL),
(70, 11, 'Sổ tay/Tài liệu hướng dẫn', 'so-tay-tai-lieu-huong-dan', NULL, NULL, NULL),
(71, 11, 'Tài liệu tham khảo', 'tai-lieu-tham-khao', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2025_05_06_033730_create_admins_table', 1),
(3, '2025_05_06_033731_create_users_table', 1),
(4, '2025_05_06_035421_create_document_fields_table', 1),
(5, '2025_05_06_035422_create_document_types_table', 1),
(6, '2025_05_06_035423_create_documents_table', 1),
(7, '2025_05_06_035424_create_packages_table', 1),
(8, '2025_05_06_035425_create_carts_table', 1),
(9, '2025_05_06_035425_create_package_users_table', 1),
(10, '2025_05_06_035426_create_cart_document_items_table', 1),
(11, '2025_05_06_035427_create_orders_table', 1),
(12, '2025_05_06_035428_create_order_document_items_table', 1),
(13, '2025_05_06_035429_create_order_package_items_table', 1),
(14, '2025_05_06_035430_create_payments_table', 1),
(15, '2025_05_06_035431_create_document_downloads_table', 1),
(16, '2025_05_06_081211_create_document_images_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `type` enum('none','package') NOT NULL DEFAULT 'none',
  `status` enum('pending','paid','cancelled','complete') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_document_items`
--

CREATE TABLE `order_document_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `original_price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_package_items`
--

CREATE TABLE `order_package_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `download_document_limit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `duration_days` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `packages`
--

INSERT INTO `packages` (`id`, `name`, `download_document_limit`, `price`, `duration_days`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Miễn phí', 3, 0, 0, '2025-05-10 02:12:49', '2025-05-10 02:12:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_users`
--

CREATE TABLE `package_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `downloads_remaining` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `package_users`
--

INSERT INTO `package_users` (`id`, `user_id`, `package_id`, `downloads_remaining`, `start_date`, `end_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 3, '2025-05-10', '2025-05-10', '2025-05-10 16:13:44', '2025-05-10 16:13:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `vnp_TxnRef` varchar(255) NOT NULL,
  `vnp_Amount` int(11) NOT NULL,
  `vnp_ResponseCode` varchar(255) DEFAULT NULL,
  `vnp_TransactionNo` varchar(255) DEFAULT NULL,
  `vnp_BankCode` varchar(255) DEFAULT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `path` text DEFAULT NULL,
  `password_reset_code` varchar(255) DEFAULT NULL,
  `password_reset_expires_at` timestamp NULL DEFAULT NULL,
  `verified_at` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `path`, `password_reset_code`, `password_reset_expires_at`, `verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trần Văn Hải', 'tranvanhai.work@gmail.com', '$2y$12$hXJH0.gxDC4czC5VQI7pm.5vanpxP934y8vEZ80dQJHMkKmxF9pkO', NULL, NULL, NULL, 127, '2025-05-10 16:13:44', '2025-05-10 16:13:44', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `cart_document_items`
--
ALTER TABLE `cart_document_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_document_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_document_items_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_type_id_foreign` (`type_id`),
  ADD KEY `documents_uploader_id_foreign` (`uploader_id`);

--
-- Chỉ mục cho bảng `document_downloads`
--
ALTER TABLE `document_downloads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `document_downloads_code_unique` (`code`),
  ADD KEY `document_downloads_order_id_foreign` (`order_id`),
  ADD KEY `document_downloads_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `document_fields`
--
ALTER TABLE `document_fields`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `document_images`
--
ALTER TABLE `document_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_images_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_types_field_id_foreign` (`field_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_code_unique` (`order_code`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_document_items`
--
ALTER TABLE `order_document_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_document_items_order_id_foreign` (`order_id`),
  ADD KEY `order_document_items_document_id_foreign` (`document_id`);

--
-- Chỉ mục cho bảng `order_package_items`
--
ALTER TABLE `order_package_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_package_items_order_id_foreign` (`order_id`),
  ADD KEY `order_package_items_package_id_foreign` (`package_id`);

--
-- Chỉ mục cho bảng `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_name_unique` (`name`);

--
-- Chỉ mục cho bảng `package_users`
--
ALTER TABLE `package_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_users_user_id_foreign` (`user_id`),
  ADD KEY `package_users_package_id_foreign` (`package_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_vnp_txnref_unique` (`vnp_TxnRef`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart_document_items`
--
ALTER TABLE `cart_document_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=697;

--
-- AUTO_INCREMENT cho bảng `document_downloads`
--
ALTER TABLE `document_downloads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `document_fields`
--
ALTER TABLE `document_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `document_images`
--
ALTER TABLE `document_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_document_items`
--
ALTER TABLE `order_document_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_package_items`
--
ALTER TABLE `order_package_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `package_users`
--
ALTER TABLE `package_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_document_items`
--
ALTER TABLE `cart_document_items`
  ADD CONSTRAINT `cart_document_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_document_items_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `document_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_uploader_id_foreign` FOREIGN KEY (`uploader_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `document_downloads`
--
ALTER TABLE `document_downloads`
  ADD CONSTRAINT `document_downloads_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `document_downloads_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `document_images`
--
ALTER TABLE `document_images`
  ADD CONSTRAINT `document_images_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `document_types`
--
ALTER TABLE `document_types`
  ADD CONSTRAINT `document_types_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `document_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_document_items`
--
ALTER TABLE `order_document_items`
  ADD CONSTRAINT `order_document_items_document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_document_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_package_items`
--
ALTER TABLE `order_package_items`
  ADD CONSTRAINT `order_package_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_package_items_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `package_users`
--
ALTER TABLE `package_users`
  ADD CONSTRAINT `package_users_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
