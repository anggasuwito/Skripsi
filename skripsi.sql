-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Sep 2019 pada 14.21
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `harga` bigint(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `photo`, `photo2`, `photo3`, `photo4`, `nama`, `alamat`, `harga`, `satuan`, `deskripsi`, `jenis`, `kategori`, `wilayah`, `fasilitas`, `kode`, `lat`, `lng`) VALUES
(1, '1557197600-5cd0f31fc2da3.jpg', '1557197600-5cd0f31fc2f26.jpg', '1557197600-5cd0f31fc3025.jpg', '1557197600-5cd0f31fc3117.jpg', 'Permata', 'Manibang dua, malalayang', 700000, '03', 'Kost dilengkapi CCTV, bersih, aman, dan nyaman. FREE WiFi.\r\n\r\nKhusus mahasiswa/i, pekerja, karyawan/i single yang fokus kuliah/ kerja dan menginginkan tempat kos nyaman, aman, dan tenang untuk santai dan beristirahat.\r\n\r\nKost Permata solusinya, karena :\r\n\r\nKamar cukup luas, semua sama 3mx3m, dilengkapi AC/Kipas Angin.\r\n\r\nJangan khawatir Harga terjangkau dan bervariasi mulai dari 650.000 - 1.100.000 rb/bln semua bisa menikmati fasilitas umumnya.\r\n\r\nLt. 1 khusus wanita \r\n-650rb, fas kamar : tempat tidur + seprei, meja, kursi, lemari.\r\n\r\nLt. 2 pria/wanita \r\n- 700rb / bln, fas kamar : tempat tidur + seprei, meja, kursi, lemari.\r\n- 800rb/ bln, fas kamar : tempat tidur + seprei, meja, kursi, lemari, kipas angin, kamar mandi dalam\r\n- 1,1 jt/bln, fas kamar : tempat tidur + seprei, meja, kursi, lemari, AC, kamar mandi dalam.\r\n\r\nSemua kamar Listrik token.\r\n\r\nFasilitas umum untuk para penghuni kos : \r\nFree WiFi, Dapur umum + wastafel, ruang santai + tv, tempat mencuci baju, jemuran pakaian, teras luas, Parkiran luas untuk motor dan mobil.\r\n\r\nKost dilengkapi CCTV, aman,bersih, air lancar, dekat akbid Trinita, Politeknik kesehatan, Fakultas Kedokteran Malalalayang, RSUP Kandou, Pertamina Malalayang.\r\n\r\nAlamat:\r\nManibang dua, Malalayang\r\n\r\nIngin bertanya2 dulu/ mengecek tempat bisa hubungi:\r\n081390909042 tlp/wa\r\n089698732174 tlp/wa', '11', '21,22,23', '303', '401,402,403,404,405,406,407,408,409,410,411,412,416', 'malalayang', '1.457038810263204', '124.80089753866196'),
(2, '1557251633-5cd1c630bdf9b.jpg', '1557251633-5cd1c630be0b6.jpg', '', '', 'Abu Ella', 'komplex belakang perum PDK malalayang', 1250000, '03', 'KOST ABU ELLA\r\nBebas sopan\r\nAlamat komplex belakang perum PDK malalayang\r\n\r\nHarga 1.250 /bln\r\nKamar luas ukuran 3,5 Ã— 5,5\r\nFasilitas Lengkap\r\nAC\r\nSPRINGBED\r\nLEMARI\r\nKURSI\r\nKM DALAM\r\nDAPUR MINI/WASTAFEL DALAM\r\nDAPUR UMUM\r\nPARKIRAN LUAS\r\nListrik token\r\n\r\nSerius hub 082190000918 / inbox', '11', '22,23', '303', '401,402,403,404,405,406,407,409,410,411,412', 'malalayang', '1.4475253895784295', '124.81474578380585'),
(3, '1557251776-5cd1c6c007b1f.jpg', '1557251776-5cd1c6c007c27.jpg', '1557251776-5cd1c6c007cff.jpg', '1557251776-5cd1c6c007dce.jpg', 'Anugerah', 'Malalayang Manibang', 800000, '03', 'Kost Anugerah..\r\nFree wifi/camera cctv\r\nMalalayang Manibang\r\nHarga mulai dari..\r\n800 - Non Ac,spring bad,lemari,meja\r\n1 jt - Ac,spring bad,lemari,meja,\r\n1,5jt - Ac,springbad,lemari,meja,TV,wastafel\r\n2,5jtAc,springbad,lemari,sofa,meja,TV,kulkas,wastafel,...\r\nSemua kamar ada kamar mandi dalam..\r\nKost Aman,bebas tapi sopan.\r\nHub.0813-4118-2311 via tlp/wa', '11', '22,23', '303', '401,402,403,404,405,406,407,409,410,411,412', 'malalayang', '1.4540329434181403', '124.80418055152052'),
(4, '1557251943-5cd1c7674a3fe.jpg', '1557251943-5cd1c7674a541.jpg', '1557251943-5cd1c7674a640.jpg', '1557251943-5cd1c7674a732.jpg', 'Griya Anugrah', 'Malalayang Dua', 850000, '03', 'Tahun baru kamar kos baru, Ayo yang minat kos rasa hotel minimalis boleh cek di kos griya anugrah malalayang 2. Harga tetap 1 orang Rp 850.000/bln dan harga 2 orang atau keluarga cukup Rp 900.000/bln/kamar. siapa cepat dia dapat. Hub 08124402203 Pak Terry.', '11', '23,24', '303', '402,403,404,405,406,407,408,409,411,412', 'malalayang', '1.4546202386789857', '124.79238152503967'),
(5, '1557252085-5cd1c7f4ec9f0.jpg', '1557252085-5cd1c7f4ecfd4.jpg', '1557252085-5cd1c7f4ed0e8.jpg', '1557252085-5cd1c7f4ed1c8.jpg', 'Magnolia Residence', 'malalayang 1 lorong martabak kencana lurus ke arah laut mentok sblh kanan', 1750000, '03', 'Kost exlusive magnolia residence\r\nAlamat: malalayang 1 lorong martabak kencana lurus ke arah laut mentok sblh kanan..\r\n\r\nHarga 1.750rb/bln + deposit 500rb (dposit akan di kembalikan apabila tdk ada krusakan fasilitas dan di kembalikan jika pnghuni melapor trlbih dahulu 2 minggu sebelum keluar)..\r\n\r\nFasilitas kamar: free wifi,listrik pintar,AC,springbed,kamar mandi dlm+water heater+wastafel,televisi,lemari baju,meja/kursi..khusus lantai 2 dan 3 ada balkon\r\n\r\nFasilitas kost: lobby,parkiran motor/mobil luas,security 1x24 hours,generator..\r\n\r\nUntuk info lebih lanjut hubungi\r\n082194261439', '11', '23,24,25', '303', '401,402,403,404,405,406,407,409,410,411,412', 'malalayang', '1.4582293256993264', '124.81325447559357'),
(6, '1557252197-5cd1c865490f6.jpg', '1557252197-5cd1c86549225.jpg', '1557252197-5cd1c86549336.jpg', '', 'Millard', 'Jl.Sea lorong gereja Tiberias belakang Smp N8 mdo(-+150 m dari Alfamidi malalayang)', 750000, '03', 'Millard Kost Manado\r\nMenerima kost!!!\r\nFasilitas :\r\n\r\n- Kamar Mandi/Wc dalam\r\n- Kasur/ Lemari\r\n- Ukuran Kamar 3X4 M\r\n- Ada Gengset\r\n- Air Sumur\r\n- Dekat Warung Makan & Kios\r\n- Dekat Jalan Raya Malalayang\r\n- Bisa jalan kaki sampai jalur Angkot\r\n- Bebas Sopan\r\n- Pagar 1x24jam bebas keluar masuk\r\nkarena menggunakan kode 4 digit\r\n- Harga 750 K\r\n- FREE Wi-Fi\r\n\r\nDengan Alamat :\r\nJl.Sea lorong gereja Tiberias belakang Smp N8 mdo(-+150 m dari Alfamidi malalayang)', '11', '23', '303', '402,403,404,407,409,411,413', 'malalayang', '1.4531910815239988', '124.81115967035294'),
(7, '1557252408-5cd1c93874817.jpg', '1557252408-5cd1c93874984.jpg', '1557252408-5cd1c93874a76.jpg', '1557252408-5cd1c93874b4b.jpg', 'Perumahan Celebes', 'Malalayang jln sea (perumahan celebes)', 20000000, '04', 'Di kontrakkan rumah..\r\nAlamat : Malalayang jln sea (perumahan celebes)\r\n\r\n- 3kmr besar\r\n- 1 km/wc\r\n- garasi mobil/motor\r\n- dapur bersih/kotor\r\n- 2lt. (View pemandangan kota manado)\r\n- 1 springbed besar\r\n- 1 kasur kecil (untuk 2org)\r\n- 1set kursi ukir\r\n- 1 kulkas 1pntu\r\n- 1 lemari konteiner\r\n\r\nPertahun 20jt nego\r\nPerbulan 2.5jt\r\n\r\nTlp/wa 085342155118', '12', '24', '303', '403,404,405,406,407,411,412,416', 'malalayang', '1.440691074555506', '124.80402628156264'),
(8, '1557252581-5cd1c9e53b252.jpg', '1557252581-5cd1c9e53b39b.jpg', '1557252581-5cd1c9e53b4b2.jpg', '1557252581-5cd1c9e53b596.jpg', 'Rumah Malalayang', 'Malalayang', 17500000, '04', 'Disewakan rumah di Malalayang\r\n2 Kt\r\n1 Km \r\nRuang Tamu\r\nDapur\r\nRp17.5jt/tahun.\r\nhub.081341331198\r\nwa081340214530', '12', '', '303', '403,404,411,413,416', 'malalayang', '1.4521961359107174', '124.81205115630792'),
(9, '1557252776-5cd1caa7874b4.jpg', '1557252776-5cd1caa7875ce.jpg', '1557252776-5cd1caa7876af.jpg', '1557252776-5cd1caa78778a.jpg', 'Rumah Tipe 54 Dolog', 'Perumahan Dolog, Malalayang', 25000000, '04', 'Dikontrakan per tahun, rumah tipe 54. Alamat perumahan Dolog, Malalayang, 5 menit ke kampus unsrat. Ruang tamu 1, ruang keluarga 1, kamar tidur 3, kamar mandi 1, dapur, listrik pintar token, sumur, pompa listrik, halaman bisa parkir motor dan 3 mobil, ada Pagar, tembok keliling aman. Lingkungan aman. Pertahun 25jt. Fasilitas tambahan Kulkas, kursi tamu dan meja makan. Hp/wa 085240311133', '12', '', '303', '403,404,411,412,416', 'malalayang', '1.4488192384306107', '124.8178008245369'),
(10, '1557305936-5cd29a503c822.jpg', '1557305936-5cd29a50415a8.jpg', '1557305936-5cd29a50416bf.jpg', '1557305936-5cd29a50417b1.jpg', 'Ci India', 'ALAMAT GERBANG PERUM KAIRAGI PERMAI(KAIPER)\r\nRMH NMR 2 SBLUM MOFFE COFFE STORE', 600000, '03', 'Kost Ci India Politeknik kairagi dua. Maaf no coment lngsung wa or cek lokasi. Bulanan/mingguan.\r\nTerima orng baik2 dan jelas. \r\nBebas sopan\r\nHarga 600rb max 2 orng. \r\nFass busa, konteiner baju, sprei,bantal.meja.kmndi luar. Free listrik (pemakaian wajar), free wifi.\r\n\r\nHarga 1.050.000 max 2 orng. \r\nFass Ac, lemari, t4 tdur, kmndi dlam, sprei, bantal.meja.listrik pintar. Free wifi\r\n\r\nHarga 1.200.000 max 2 orng\r\nFass Ac, lemari, t4 tidur, kmndi dalam, sprei, bantal, meja, kursi. Listrik pintar. Free wifi\r\n\r\nFass umum. Dapur, t4 cuci/jemur baju, wifi,\r\nParkiran aman,ada penjaga, ada cctv .\r\nKunci pagar masing2. \r\nMikrolet lewat samping rumah.T4 makan byk. Gereja,masjid dekat. \r\nTransmart cma 5rb nae gojek.3 mnt ke lippo plaza. 1/x nae mikro ke giant paal 2.\r\nAir banyk, bersih, bebas pakai.\r\n\r\nALAMAT GERBANG PERUM KAIRAGI PERMAI(KAIPER)\r\nRMH NMR 2 SBLUM MOFFE COFFE STORE. \r\nWA 081340803135 OR INBOX', '11', '23', '304', '401,402,403,404,405,406,407,409,410,411,413', 'paaldua', '1.5128542610998204', '124.89060670137405'),
(11, '1557306059-5cd29acac69fd.jpg', '1557306059-5cd29acac6e00.jpg', '', '', 'Cozy Home', 'Jl. Martadinata, Pompa bensin Paal dua, Masuk lorong arah terminal paal dua, Cozy Home Kost sebelah kanan', 850000, '03', 'Cozy Home Kost, \r\nMasih tersedia kamar kosong..\r\nRp.850.000 / Bulan.\r\n\r\nInfo selengkapnya Hub :\r\nHp : 0813 5652 3333', '11', '23', '304', '401,402,403,404,405,406,407,409,410,411,412', 'paaldua', '1.4860936411750338', '124.85950112342834'),
(12, '1557306207-5cd29b5ed619a.jpg', '1557306207-5cd29b5ed62ae.jpg', '1557306207-5cd29b5ed638a.jpg', '1557306207-5cd29b5ed66d5.jpg', 'Liwas Ranomuut', 'liwas ranomuut paal dua', 700000, '03', 'yg mo cari kos kosan.lokasi liwas ranomuut paal dua. hub w.a 0823 9392 9255', '11', '23', '304', '402,403,404,405,406,407,408,409,410,413', 'paaldua', '1.4813693833277686', '124.86978156305554'),
(13, '1557306349-5cd29bec81cce.jpg', '1557306349-5cd29bec81de5.jpg', '', '', 'Quin Mart', 'Paal 2 lorong quin mart', 800000, '03', 'Kamar kost AC / km dalam , free WiFi , parkir luas , ada juga non AC / km dalam harga terjangkau. Dalam kota dekat ke Bandara cepat dan aman. inbox saja yg berminat.', '11', '23', '304', '401,402,403,404,405,406,407,409,410,411,412', 'paaldua', '1.4866627596238753', '124.85811475833589'),
(14, '1557367358-5cd38a3dcdba1.jpg', '1557367358-5cd38a3dcfdd5.jpg', '1557367358-5cd38a3dcfef0.jpg', '1557367358-5cd38a3dcfff9.jpg', 'GPI Mapanget', 'GPI Mapanget Manado', 13000000, '04', 'Rumah kontrakan 1 thn 13 jt...\r\nRumahnya di daerah GPI Mapanget Manado\r\nRumah tingkat, masih baru\r\nUntuk info lebih lanjut bisa hubungi saya via inbox atw WA 089531405402\r\nTerima kasih', '12', '24', '305', '403,404,411,412,416', 'mapanget', '1.546634369708494', '124.89850580692291'),
(15, '1557367570-5cd38b1250da1.jpg', '1557367570-5cd38b1250f36.jpg', '1557367570-5cd38b1253826.jpg', '1557367570-5cd38b12539b9.jpg', 'Griya 1', 'Mapanget griya 1', 6000000, '04', 'Rumah di kontrakan 6 JT / thn, harga bisa nego\r\nLokasi Mapanget griya 1 \r\nMemiliki 2 kamar dengan AC, lemari, kasur...\r\nMines dapur..\r\nUntuk info lebih lanjut hub no 082394653709', '12', '', '305', '403,404,410,413,416', 'mapanget', '1.5304064285147672', '124.93707675930773'),
(16, '1557367712-5cd38ba006d8f.jpg', '1557367712-5cd38ba006eba.jpg', '1557367712-5cd38ba006fd0.jpg', '1557367712-5cd38ba0070c7.jpg', 'Griya Indah 1', 'Rumah terletak di jalan utama perumahan', 8000000, '04', 'Dikontrakkan rumah di Mapanget Griya Indah1\r\nIsi 2kamar tidur Ada 1unit Ac di kamar , Air melimpah jetpum 50meter pakai filter,pagar tinggi garasi bisa masuk mobil satu .\r\nRumah terletak dijalan utama perumahan\r\nHarga 8juta/tahun(nego tipis), ambil 2tahun 15juta\r\n\r\nSerius hub: 082311311111\r\n\r\nNn: maaf tidak bisa bulanan!!', '12', '', '305', '403,404,411,412,416', 'mapanget', '1.5323831524976883', '124.918028842779'),
(17, '1557367831-5cd38c1720657.jpg', '1557367831-5cd38c17207dd.jpg', '1557367831-5cd38c1720905.jpg', '', 'Griya Indah 3', 'Mapanget Griya Indah 3', 7500000, '04', 'Siapa tau ada yg lagi cari rumah kontrakan..\r\nKlu di mapanget griya indah 3 mau?\r\n3 kamar tidur 2 kamar mandi dapur besar halaman parkir bisa 2 mobil listrik 1300 air sumur bor telphon rumah indihome...akses kendaraan umum mikro lewat depan rumah..15juta 2 thn', '12', '', '305', '403,404,411,412,416', 'mapanget', '1.5242094287652932', '124.93856279695888'),
(18, '1557367950-5cd38c8d9dcf0.jpg', '1557367950-5cd38c8d9de1d.jpg', '1557367950-5cd38c8da13af.jpg', '1557367950-5cd38c8da153c.jpg', 'Griya Indah 3 Blok C no 9', 'Mapanget grya indah 3 blok c no 9 (samping mesjid Al ikhlas)', 10000000, '04', 'Di kontrakkan\r\nRumah & barang\r\nMapanget grya indah 3 blok c no 9 (samping mesjid Al ikhlas)\r\n10jt/ thn #nego\r\nInfo kontak wa/ 081356663115', '12', '', '305', '403,404,405,406,407,408,409,411,412,416', 'mapanget', '1.5407125685052918', '124.92796182013353'),
(19, '1557368105-5cd38d293f9b0.jpg', '1557368105-5cd38d293fb1b.jpg', '1557368105-5cd38d293fc3a.jpg', '1557368105-5cd38d293fd46.jpg', 'Griya Indah 3 Blok G no 32', 'Lokasi MAPANGET GRIYA INDAH 3 Blok G/32\r\n(Dekat karpet biru)', 16000000, '03', 'Dikontrakkan/ disewakan.\r\nBagi yg bisa merawat rumah.\r\nLokasi MAPANGET GRIYA INDAH 3 Blok G/32\r\n(Dekat karpet biru)\r\n(READY TANGGAL 17 SEPTEMBER)\r\nâ€¢ 2 kamar tidur (1 kamar lengkap springbed )\r\nâ€¢ 1 Toilet besar closet duduk pintu multi\r\nâ€¢ Ruang tamu\r\nâ€¢ Ruang keluarga (dilengkapi AC)\r\nâ€¢ Dapur+kitchen set mini\r\nâ€¢ Tempat parkir\r\nâ€¢ Taman di depan\r\nâ€¢ Free area di belakang\r\nâ€¢ Air sumur pompa + Tong\r\nâ€¢ Listrik pintar\r\nâ€¢ Jaringan indihome sdh ada jika mau lanjut bayar iurn 500/bln jaringan unlimited internet dan tlp dan tv kabel.\r\n\r\nCocok untuk keluarga kecil.\r\nFoto pada saat rumah masih byk barang skrg tgl springbed dll.\r\n\r\nMore info : PM Inbox atau di wa 082 192 888 115 (Own)', '12', '', '305', '401,403,404,405,406,407,408,409,411,412,416', 'mapanget', '1.514358820025252', '124.92086032797238'),
(20, '1557368214-5cd38d95badb4.jpg', '1557368214-5cd38d95baed2.jpg', '1557368214-5cd38d95bafca.jpg', '1557368214-5cd38d95bb0a4.jpg', 'Griya Indah 4', 'Perum Mapanget Griya Indah IV Blok B/148', 20000000, '04', 'Disewakan Rumah di Perum Mapanget Griya Indah IV Blok B/148\r\nLT 120 LB 80\r\nKT 3 KM 1\r\nLIstrik 900 \r\nAir Bor\r\nHarga Rp.20 jt / thn\r\nInfo 081340413137', '12', '', '305', '403,404,411,412,416', 'mapanget', '1.5252450985218884', '124.92671123439334'),
(21, '1557368362-5cd38e29b4b3a.jpg', '1557368362-5cd38e29b4c68.jpg', '1557368362-5cd38e29b4d67.jpg', '1557368362-5cd38e29c0a27.jpg', 'Korpri Griya Blok H no 49', 'Di perum korpri griya blok H no 49', 4000000, '03', 'Dikontrakkan rumah diperum korpri griya mapanget blok H no 49...\r\n* kamar 2 \r\n* kamar mandi 1\r\n* dapur masih dapur darurat\r\n*listrik token\r\n* air sumur\r\nDikontrakkan 4 jt/thn min 2 thn...(jd 8 jt 2 thn)\r\nMinat hub 089671764735 atau via inbox\r\n(Diutamakan muslim)', '12', '', '305', '403,404,411,413,416', 'mapanget', '1.5282325989045282', '124.93192633453214'),
(22, '1557368491-5cd38eaab7e07.jpg', '1557368491-5cd38eaab7f25.jpg', '1557368491-5cd38eaab801c.jpg', '1557368491-5cd38eaab80f4.jpg', 'Korpri Mapanget', 'Dekat bandara', 10000000, '04', 'di kontrakan..rumah kosong..di perum korpri mapanget..dekat bandara..ada listrik&air bor..boleh sewa / 6 bulan...nnti baku ator harga..hub jo Wa085341619185', '12', '', '305', '403,404,411,413,416', 'mapanget', '1.528611800842573', '124.93117762698364'),
(23, '1557368576-5cd38eff82747.jpg', '1557368576-5cd38eff828b7.jpg', '1557368576-5cd38eff829e8.jpg', '1557368576-5cd38eff82b20.jpg', 'Paviliun', 'Lokasi jln raya teterusan mapanget, blakang bandara', 500000, '03', 'Paviliun di kontrakan\r\n500rb/bln\r\nLokasi jln raya teterusan mapanget, blakang bandara\r\nMinat hub 085298669229', '12', '', '305', '', 'mapanget', '1.5356202990146475', '124.9281859964035'),
(24, '1557368663-5cd38f568aa14.jpg', '1557368663-5cd38f568ab49.jpg', '', '', 'Perum CBA Gold', 'Perum cba gold di mapanget dekat rm teterusan bandara', 4000000, '04', 'kontrakan...\r\nPerum cba gold di mapanget dekat rm teterusan bandara.', '12', '', '305', '403,404,410,413,416', 'mapanget', '1.5351869548846921', '124.93436388399198'),
(25, '1557368774-5cd38fc650d7b.jpg', '1557368774-5cd38fc658603.jpg', '1557368774-5cd38fc658781.jpg', '', 'Perum Korpri', 'Alamat Perum Korpri Blok B/110 Mapanget, dari karpet biru trus trus le sampe dapa indomaret seblah kiri.\r\nDekat bandara, dekat transstudio, ada mikro jurusan talawaan yg lewat sampe di gerbang perumahan.\r\n(rumah bagian depan perumahan, gampang dapa, akses maso dr gerbang perumahan gampang)', 10000000, '04', 'dikontrakan karna dapa sayang belum ada yang tinggal akang.\r\nHubungi hanya nomor di bawah ini\r\n08114397050\r\n08989712812', '12', '', '305', '403,404,411,412,416', 'mapanget', '1.5291319117910023', '124.93310995078741'),
(26, '1557368899-5cd39043423fd.jpg', '', '', '', 'Taman Mapanget Raya', 'Perumahan Taman Mapanget Raya ( kelurahan mapanget barat)', 5000000, '04', 'Rumah dikontrakan alamat Perumahan Taman Mapanget Raya ( kelurahan mapanget barat)\r\nfasilitas 2 kamar, 1 kamar mandi, air sumur, listrik... \r\nharga 5jt pertahun boleh nego...\r\n\r\nuntuk info lebih lanjut hubungi no :085145316408', '12', '', '305', '403,404,411,413,416', 'mapanget', '1.5549324238479592', '124.91244792938232'),
(27, '1557369133-5cd3912d58b5b.jpg', '1557369133-5cd3912d58cf5.jpg', '1557369133-5cd3912d58e35.jpg', '', 'Beiby Cici', 'Jln Politeknik nmr 192, Kairagi Dua, Mapanget, Kota Manado, Sulawesi Utara', 575000, '03', 'BEIBY CICI KOST\r\nTaman Perum Kairagi Permai nmr Dua. Jln Politeknik nmr 192, Kairagi Dua, Mapanget, Kota Manado, Sulawesi Utara\r\n0813-4080-3135', '11', '23', '305', '401,402,403,404,405,406,407,409,411,412', 'mapanget', '1.5128582830109192', '124.89060401916504'),
(28, '1557369301-5cd391d56f1d7.jpg', '1557369301-5cd391d56f2f9.jpg', '1557369301-5cd391d56f3f3.jpg', '1557369301-5cd391d56f4db.jpg', 'Kampus Politeknik', 'sebelah kampus politeknik mapanget manado perum poligriya indah', 800000, '03', 'kos di sebelah kampus politeknik mapanget manado perum poligriya indah..fasilitas kamar mandi dlm,Kasur,ac Rp 800.000.kamar mandi dlm n kasur Rp 600.000 no hp or wa 085353666789.ada dapur,Parkiran oto n motor.bebas rapi....', '11', '23', '305', '402,403,404,405,406,407,408,409,410,412', 'mapanget', '1.5172462883152418', '124.88754215410609'),
(29, '1557369409-5cd39240d747f.jpg', '1557369409-5cd39240d75a9.jpg', '1557369409-5cd39240d76ac.jpg', '1557369409-5cd39240d77a1.jpg', 'Koka', 'Daerah samping bandara samratulangi manado, koka mapanget barat.', 750000, '03', 'Info kost!!!\r\nDaerah samping bandara samratulangi manado, koka mapanget barat.\r\n\r\nAman, nyaman, bersih, garasi motor/oto, ada tempat jemur pakaian.\r\n\r\nDalam kamar ada kasur, kontainer pakaian, meja susun, kursi, KM dalam, wastafel dan dapur kecil untuk masak, listrik pintar.\r\n\r\nHarga:\r\n1 orang 750/bulan\r\n2 orang 800/bulan\r\n\r\nHubungi nomor/ WA\r\n+62 852 40138724\r\nAto boleh juga comment dan inbox\r\nKost baru jadi masi banyak kamar tersedia \r\nTerima kasih\r\nGBU', '11', '23', '305', '402,404,405,406,407,409,410,412', 'mapanget', '1.5578409446473993', '124.9107094790379'),
(30, '1557399323-5cd4071abda85.jpg', '1557399323-5cd4071ac4e7b.jpg', '', '', 'Coklat', 'Alamat Jl. Pemuda 1, Sario Tumpaan, Sario. Manado. (akses Lrg. Bambuden/Grapari/Rockrand)', 800000, '03', 'TERIMA KOST\r\n\r\nKOST COKLAT\r\nAlamat Jl. Pemuda 1, Sario Tumpaan, Sario. Manado. (akses Lrg. Bambuden/Grapari/Rockrand)\r\n. \r\nKost pria/wanita, suami istri (tidak menerima pasangan yg bukan suami istri)\r\n. \r\nHUB WA : 085285807808 / 085256055588 \r\n. \r\nFasilitas:\r\nKamar mandi dalam (khusus kmr besar dan standar) \r\nAC, SPRINGBED, LEMARI, MEJA\r\nPemasangan TV KABEL, iuran bulanan gratis (TV bawa sendiri)\r\nListrik tiap kmr (token)\r\nFree WI-FI, CCTV, Free Sprei\r\nAir lancar, Jemuran, Tempat cuci baju\r\nParkiran, Dapur Umum.\r\n.\r\nHARGA:\r\nkmr mandi luar 800rb\r\nKmr mandi dalam 1,2jt', '11', '21,23', '306', '401,402,403,404,405,406,407,409,410,412', 'sario', '1.4671313580654992', '124.83382433652878'),
(31, '1557399422-5cd4077e3c35e.jpg', '1557399422-5cd4077e3c4c2.jpg', '', '', 'Koni', 'Koni Sario', 700000, '03', 'Yang butuh kos daerah koni sario... ini ada 2 kamar kos..\r\nStatusnya rumah saya kontrak trus ada 2 kamar lebih mo kasih kos jadi bisa pakai dapur dan ruang tamu...\r\nKamar kosong dan kamar mandi luar, ukuran beda...\r\nBisa sendiri, berdua ato keluarga..\r\nYg berminat dan mo tanya alamat dan harga inbox ato tlp/wa 085240804982\r\nYg comment bantu up aja....\r\nThx..', '11', '23', '306', '403,404,405,406,407,408,409,411,413,416', 'sario', '1.4692911696929032', '124.83491767546286'),
(32, '1557399531-5cd407eb1d8f7.jpg', '1557399531-5cd407eb1da6e.jpg', '1557399531-5cd407eb1dbb1.jpg', '1557399531-5cd407eb1dce0.jpg', 'Ontario Homestay', 'Jln Ahmad Yani (depan koni) pas di belakang Polsek Sario', 1200000, '03', 'wa 081340704545', '11', '21,23,26', '306', '401,402,403,404,405,406,407,408,409,410,411,413', 'sario', '1.4718344054558234', '124.83415424823761'),
(33, '1557399615-5cd4083e9fb41.jpg', '1557399615-5cd4083e9fce5.jpg', '1557399615-5cd4083e9fe0e.jpg', '1557399615-5cd4083e9ff13.jpg', 'Sario Bethesda', 'Sario Bethesda', 850000, '03', 'Kamar kosan area sario bethesda n harga kamar 850rb peroran/bulan.n klo ba 2 orang tambah 50rb KM dalam meteran token pulsa isi sendiri. contac hp 085340614332', '11', '23', '306', '402,403,404,405,406,407,410,411,412', 'sario', '1.46195741899298', '124.83143655463107'),
(34, '1557412218-5cd4397a71160.jpg', '1557412218-5cd4397a7131b.jpg', '1557412218-5cd4397a71740.jpg', '1557412218-5cd4397a7185e.jpg', 'Cereme', 'Singkil 2 jln bengawan solo, kompleks mesjid nurul iman,, tembus jln ke cereme', 400000, '03', 'Sisa 2 Kamar besar dan luas dinding beton 500. Kamar ukuran sedang dinding papan 400. Singkil 2 jln bengawan solo, kompleks mesjid nurul iman,, tembus jln ke cereme.', '11', '23,24', '307', '404,411,413', 'singkil', '1.4991847696314622', '124.85264777976226'),
(35, '1557412341-5cd439f5706b8.jpg', '1557412341-5cd439f57082a.jpg', '1557412341-5cd439f570948.jpg', '1557412341-5cd439f570a56.jpg', 'Lorong KUA Singkil', 'Lorong KUA Singkil 1 Manado', 500000, '03', 'Info kost\r\nUk Kamar 3x5 + km/wc dlm\r\nListrik token 900w tiap kamar\r\nDapur umum\r\n500rb/bln untuk 1 orang\r\n600rb/bln untuk 2 orang\r\nInfo lebih lanjut tlpn/wa 083132103114', '11', '23', '307', '402,403,404,405,406,407,408,411,412', 'singkil', '1.49802342314157', '124.85216660443803'),
(36, '1557412490-5cd43a898f8f6.jpg', '1557412490-5cd43a898fa43.jpg', '1557412490-5cd43a898fb52.jpg', '1557412490-5cd43a898fc57.jpg', 'Husni Tamrin', 'jl.husni thamrin cereme,singkil', 12000000, '04', 'Di sewakan rumah tengah kota manado\r\n\r\n- kamar tidur 2\r\n- kamar mandi 2\r\n- dapur kotor\r\n- dapur bersih\r\n- ac \r\n- air sumur asli\r\n- mesin air jetpom\r\n\r\nAlamat jl.husni thamrin cereme,singkil\r\n\r\nMikro lewat cereme pasar 45\r\n\r\nDekat kepasar tuminting\r\nDekat ke kawasan megamas\r\nDekat ke jembatan soekarno\r\nDekat ke pasar bersehati\r\nDekat ke samrat\r\n\r\nHarga 1thn 12jt (tanpa ac) pake AC tamba 3jt\r\n\r\nMinat 081242003950 tlp/wa', '12', '24', '307', '401,402,403,404,405,406,407,408,409,411,412,415,416', 'singkil', '1.5036599988689587', '124.8449196844474'),
(37, '1557412616-5cd43b081958f.jpg', '1557412616-5cd43b08196b8.jpg', '1557412616-5cd43b08197d9.jpg', '1557412616-5cd43b081993f.jpg', 'Perum Star', 'Perum star singkil manado', 10000000, '04', '', '12', '25', '307', '401,403,404,405,406,407,410,412,416', 'singkil', '1.5029891415043743', '124.85457152638924'),
(38, '1557412724-5cd43b745bf28.jpg', '', '', '', 'Singkil Pancuran', 'di daerah wonasa singkil pancuran', 12000000, '04', 'post ulang dang. mo s kontrak rumah di daerah wonasa singkil pancuran. 3 kmrtdur, lstrik pintar, air lancar, mines parkiran oto cma parkiran motor, rmh dkat masjid, mo s kontrak so dg perabot 12jta/tahun. Minat? serius hubungi no 085340651155/08539997059', '12', '', '307', '403,404,405,406,407,408,409,411,412,416', 'singkil', '1.4962985920478002', '124.84823178339775'),
(39, '1557413650-5cd43f118e950.jpg', '1557413650-5cd43f118ea6a.jpg', '1557413650-5cd43f118eb56.jpg', '1557413650-5cd43f118ec3b.jpg', 'Kalasey', 'dekat jln trans sulawesi sek 20 m...area Kalasey/Malalayang', 40000000, '04', 'Dikontrakkan Rumah 2 lantai,atas panggung 6 kamar,,,3 wc/kmr mandi dalam,,,ac 2 kamar,,full perabotan...parkiran luas garasi bisa 2 mobil halaman depan bisa 7,8 mobil...air lancar tdk dipungut biaya...air desa dan parigi...dekat jln trans sulawesi sek 20 m...area Kalasey/Malalayang,,,40 jt/thn nego minimal 2 thn,,,,lokasi asri dan nyaman,aman 100% dijamin!!!...tersedia kolam ikan minat hubungi pemilik langsung CP 081295868068', '12', '24', '303', '403,404,405,406,407,411,412,415,416', 'malalayang', '1.4591359940019744', '124.77648915857742'),
(40, '1557416471-5cd44a171e77b.jpg', '', '', '', 'Ferdinand', 'tikala', 700000, '03', 'Kost tgal 1 kamar\r\nTikala Km dalam bersih aer lancar \r\nDi utamakan yg bekerja spaya nda menunggak doi kost\r\nHub 0821 9576 0877', '11', '23', '308', '401,403,404,405,406,407,409,410,413', 'tikala', '1.4757412876496974', '124.8589805387619'),
(41, '1557416609-5cd44aa166162.jpg', '1557416609-5cd44aa166453.jpg', '1557416609-5cd44aa166599.jpg', '1557416609-5cd44aa1666a9.jpg', 'Ta Lia', 'jl. Lumimuut 8 no. 19, masuk jl samping dealer honda muka pompa bensin Lumimuut Tikala', 1350000, '03', 'Ta Lia kos di Lumimuut Tikala, ada 1 kamar kosong khusus untuk karyawan/ti, pasangan suami istri sah Rp. 1350.000, daerah sangat strategis, jalan kaki ke kantor pemkot manado,lapangan sparta tikala, camat wenang, jl. Lumimuut 8 no. 19, masuk jl samping dealer honda muka pompa bensin Lumimuut Tikala hub. Ph/wa 081291853548, ph 087783240021.\r\n\r\nFAS. DALAM KAMAR\r\n* KMM ( TOILET DUDUK) \r\n* SPRINGBED \r\n* LEMARI BAJU\r\n* MEJA\r\n* TV \r\n* AC\r\n\r\nFAS UMUM\r\n* MESIN CUCI\r\n* DAPUR\r\n\r\nLISTRIK TOKEN BAYAR MASING2 SESUAI PEMAKAIAN.', '11', '23', '308', '401,402,403,404,405,406,407,409,411,412', 'tikala', '1.48378758820136', '124.8472501085289');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_item` varchar(300) NOT NULL,
  `nama_penyedia` varchar(300) NOT NULL,
  `nama_pemesan` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_item`, `nama_penyedia`, `nama_pemesan`, `status`) VALUES
(1, '41', 'tikala', 'angga', '1'),
(2, '39', 'malalayang', 'angga', '3'),
(3, '35', 'singkil', 'angga', '1'),
(4, '3', 'malalayang', 'angga', '3'),
(5, '40', 'tikala', 'angga', '1'),
(11, '40', 'tikala', 'coba', '1'),
(12, '9', 'malalayang', 'danial', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fotoprofil` varchar(500) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fotoprofil`, `username`, `name`, `tlp`, `alamat`, `password`) VALUES
(1, '', 'malalayang', 'malalayang', '082196350118', '', '$2y$10$J7uK3TnhBz1vs3gYFnEMbe/p4t35gH/Yj7bfLXkyWgCBH8GjelADy'),
(2, '', 'paaldua', 'paaldua', '085256205098', '', '$2y$10$BbZpK8wprDbWbYn79VkPlOqaGR0PfTHSLSA5.V/ZFD7.dG3scMnNm'),
(3, '', 'mapanget', 'mapanget', '082157644332', '', '$2y$10$dZm7gxtMkubjWDmQccDIWeilXKvYnG1t6Tuk4tpbOaB4G45pGolzi'),
(4, '', 'sario', 'sario', '081143488122', '', '$2y$10$Nr3EwQXhtMLOUCmBvvEC8.UbzYbsaSAoRFX8a2CegHreHhhtNgJ72'),
(5, '', 'singkil', 'singkil', '081244632800', '', '$2y$10$B8g5sq3KDcqInQW36OhnVOREicvMMhXnYp3soQRE8.u/ueuBNiata'),
(6, '', 'tikala', 'tikala', '087859677600', '', '$2y$10$wpynSGe9N0Q3JUMmV9jVaOYX8ytqRYqqAmqv2JTHwhF9esTVP/fOy'),
(7, '1565000998-5d4805260c305.jpg', 'angga', 'angga', '085399921552', '', '$2y$10$2IJfJEEPczJUG/uuP2WK1.6N//ar8YIa.Zbm6wXz/QDjdTgabbS6S'),
(9, '1565023428-5d485cc39c6c6.jpg', 'coba', 'coba', '1231892138', '', '$2y$10$5XBUkzpgcn4Y1sz.KOShH.zal6Xvlqnywm70g49glqarAvfmnfgCO'),
(10, '', 'danial', 'danial', '087688778877', 'sekitaran kampus UNSRAT', '$2y$10$AXhbMfcOMYDZXcaJ98rFQ..qGEUU/BAHMi68ttrRnovD54YsI1kla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
