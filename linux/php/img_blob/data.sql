-- MySQL dump 10.13  Distrib 5.1.54, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (1,'hello, world'),(2,'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'),(3,'hello, world');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_blob`
--

DROP TABLE IF EXISTS `img_blob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_blob` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` mediumblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_blob`
--

LOCK TABLES `img_blob` WRITE;
/*!40000 ALTER TABLE `img_blob` DISABLE KEYS */;
INSERT INTO `img_blob` VALUES (1,'hello, world'),(2,'GIF89aTZ\0�\0\0b���AAA����@@K�\0\0sss寯�__ր���׶  ��̮�������ff�\0\0ۏ������GGLLL�kk�;;��߸���TTf33�00������꿿�\0\0����PP�pp���{\0\0�fff�\0\0�ww�$$=,,�SS�ff����00x\Z\Z���T**���������Ϳ��pp��ﯡ�k\r\rSSS����\0\0�{{�^^=00���z  ���e::UGGB11[((�^^\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0!�\0�\0,\0\0\0\0TZ\0\0��������������������������������������8KE(������������������������EK8�9E+#������������������������#+E9�:������������#0�K@��\0\nH���k@:�P�����#J�H�!�`W��Ǐ CZ��#c�\"�D�\\ɲ�=l�1��͛8sf�$B�%+t\nJ��\nL@Y��ӧa�9ԫX��CAfU�`Êņb\0BV�-h$Bĉ����;�\Z]�2�hBD�%Rl+�ID��`�qwn^h��>��8��Ɠ�=�72\\o(8@�ms�q�!��(u���DH�vh����v\"��j�\r�v�z[�I�5O�0{[��_�VJ���!և�8)Dfi��.(c�n�5^Z�l�!=3�z�礥W�m5������%������u� ��b��3\0^# [�Y�}���5�-g��e�&ߝ�Ȅ���o��`a���ͅ����%�Y� i�X�{�(����6\r��J�ۋ�,�H�I���U��3!N��}��\'�!4��v$JSa|;4&�![F�#=�c#\r�!��I����c!eҵ�d��a5]g3)<y�ٟͤ���͝��(\r��<:Ϝ�p8���x�\'�~.iii��z@	\"$B%��	+�ҠZ�3��i��F����b)Oy��8͛�;l���Y�6���L^�#A2\Z�4\n�u�nWl4��M��4O\n.6����@K\0U�b�r�+.��4�H��|.5ٞ:%���7m|7s��!��˙!�í!����$P/!��Zm�+�lH7\rK�n!?��h�L��\n\\c����p� :C�!4�l4К��!):#��Z�271�;t���_���1!����K2!0+�;�o��V#�!2�k��s�u�hs��{6�8�t�&�=HځKK�� �lb݂��܄��u5S�{����\08�XW>�ٌ��kGs�؎;<��,���4�#���$לM���&�4�a�4���?SO����:����e\r���K.H�3�t��\r?w\n��46Gw>����mH��=�[��w�����\ZP�A|	l�b)D��Z�������CHq�� �A2�\r�(!*B�<�j���@����\"�� (���\r\Z-�!1��� �5��p��CSU���\"� 2V���\"$���v%��5����q�1�����M�L\\�\Z8���q[��Ѥ��(�1#�������L	P�0�D+�C.�a����T	�U~ڻ��!>���*t�3J(H�rp_l�\")�4h�ч�x���H�I���j�V|Z�z�\Z�#�<���*��`-�LJ�\Z���~84ISRbU3X/V�R<z;�3Pg�grq�w|]$��dӑb3�$��˭I}�y����K\0ГF(A�fб{�Ŀ�L��(;�\0}�S��|������3����-�E�]�͌�0\r�8��s\rMg�dz=A��oI�3A�M}��5x�&���M�6g8	Y��\Z��DRϩM^v���1uhф}/��Q\'�InP\Z��.�:��J�$��2��Rl�+YN�F4×�n��w��Y��:6b&s�r���BBU�L&C�jO�jϰ#u�W\'Vp����V��4\0}���	:�ւi�;���j��	1��X+O{(M!z� -�6�Ţ��t�5q?����딳Mdec\'>���9��hg��A�1��X�3���䦔�pl$.W��ѽzd�v���vم%�+�!7��/wp�n�\0�\09Q��:�\0��L�l�\ZٺR��Pl�^����y��3�o��9�n�,/���\'(�׵���\'�Pܴ��D�s��a��֯ ����.��+<p��;�8۫��\n���o�.�K��ꑽ�S�җ������l���H�=$����x��u�uq9cJ�G,���L��^ԧ���o�\\T\0w��q�3@���=���-\0�gI@6����.�b����g^t�ѹ���No��Ai;�8�8ņ����H�mk\n��H͞z���ت����Y˥5��-�<��\ZF�M�!�(`\r�\r�a�m��&���C7�G|>w��Ь%�Ӫ�dX��l���W��x[�(�u!,�Ws���du47��:���qN�Ǭ�F$��D8&�{�����Ve��E�e�6�����W����(�ȵѴ��n��̻���<毙��X�s2�{,HO:V<���;]\'L�ԧ.��S��X��ճ���d�^���������(;���vc��y����}%`��>�g�z���>��zh@h�1���(�8��\0 �㟡����\n��. �����џ����{���@�\'���\n�~�����������2P���H�4`{ld��\Z~4�|y����\0�C(@��\n��cSc���A�gό�ߞx\0���{���\r{G|$P}ΐ?`{�w{�7��\n�\0~�px\0,\0|��}�~vW\r���z��~o\r������{�\0!�#��w��z�x���<x�����\0$@z�}�|�{8XMH|P,`|��z\Z�\0@H|\n����w/��/p�ΐ��\Z�\0U����}��x�y���n�-�����P(xux\0 �n8�v��-��Π (�̠ȃp��g{B�`��Q�|�H|10��P�xs(�u�}_z��������(}{X��$0z���а�,0|.X����\r5��w�$ ��w\01���8w�H���}Ȁӧ{\n���w$��(w���\r�{��Ѕ\n�a~�X��w�x\0?�x-@z�z�����,��zTH�\n���Hb��h{��\0�8�����~��\0>8w����x\0���$`�`~1p\0 �\04i�#�\0/�}?�w�{3i~?\0{-�}&��H �|��zt����\0��_�7\r���H��g���$0���{4v�{�����y9H�0h���xx{�W���zـ)مvg�}�{��v�ȃ1�x�}��������y}�|���i��{ق�������շ��hw���8w\ZP�5x�k�x�皀鏞���`�ֈ~\0�)�+���$\r���w���{�gy�@��G�ݷ�*i{�(��Ȗ혌pYS(������H�\r��X}��Ȉ�n�}�w��	���	�/ؘ8�]h�Չ��W ЕmI����G����~���n	���c���ؘF�~�W����3،5(| ��[����I{�y��Ќ͐�Љ��H}�X�י�I��_xz����\0�\Z�)i��|y��y}���͗��W��y���|��sȟ�H��\0�7����x��9��}z[ʥ��~�עl���z(9��7�4�Z�[:�d&��w�v��R��$�*��{����K\nx?�y����)��X�:J�Cz�Gj���\0}��\Zp�8������������4ڟ��詷�|���Ez�e��$�~��{C��2ȧ��X�� �kz��ț��v\r�*�*J\r ���碈\Z��I��ʖv��@���>��٧|������w10~�P��I�s����\Zp�a��jH� ��D��?p`~�:�P~\Zp�ʇ��g�;ȁ8����ه~xx���\Zy�i�M�k��҈����������(����跚�����V�v%\n\r-0��׀C�w8X\r��P���ǋ4�w��yy��� ��z�(��hy=ɵ���C�{�p�Q�x\nIz���J�~����lh�p�Hyt��4i�j���y����\Z�;ȅ ���7�����i�H�N8�y|KwS8�����HX�^ط�8z�J��I�s�䚉H���;�y����w\'�\r��xi��)\r�v�g��*�2)���������+��0�^g\"��	H#\0\0��A���`�۠�(\r_xv�����8DP��m7I`�`=���]��>��F��[�\\7C�SQpa�,u@`\0pIQ\0J����c1���TQ6\05@���W��\0|4�\0�\0�����8��0\00.|����I`\0\0H��J��L��N��P�\0`\0. \0�\0ĉ@6\07�>�0�d\\�f|�h��j��l��n��p�r<�t\\�v|�x��p�*p`J��\0\0�\0��Ȋ�Ȍ�Ȏ�Ȑɒ<ɔ\\ɖ|ɘ�ɚ�ɜ�ɞL�\0�\0#�`�\0��ʬ�ʮ�ʰ˲<˴\\˶|˸�˺�˼�˾���l�`�w�Ȝ�ʼ����������<��\0;');
/*!40000 ALTER TABLE `img_blob` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-07-08 15:41:20
