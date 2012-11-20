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
INSERT INTO `img_blob` VALUES (1,'hello, world'),(2,'GIF89aTZ\0æ\0\0b³³³AAAÿÿÿÁ@@K¬\0\0ssså¯¯µ__Ö€€×××¶  ÌÌÌ®™™™ïïïÌff‡\0\0Ûº­³GGLLL¶kk²;;õßß¸ƒƒ‡TTf33±00»ššïÏÏê¿¿¤\0\0¾¾¾ÆPPÐppàŸŸ{\0\0±fff™\0\0·ww¯$$=,,´SS™ff¼¦¦¼00x\Z\ZøøøT**ààà„„„À¯¯Í¿¿›ppúïï¯¡¡k\r\rSSS½²²Œ\0\0Œ{{‰^^=00¥””z  ”††e::UGGB11[((“^^\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0!ù\0ÿ\0,\0\0\0\0TZ\0\0ÿ€‚ƒ„…†‡ˆ‰Š‹ŒŽ‘’“”•–—˜™š›œžŸ ¡¢£¤—8KE(ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿À¶EK8’9E+#ÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâØ#+E9:Ëãîïðñòóôõöâ#0K@í÷\0\nH° Ák@:ÐP¤ÃßÁ‡#JœH±!å`W±£Ç CZ›À#c¡\"ÿDª\\É²å½=lÂ1Á¥Í›8sf›$B¡%+t\nJ´å\nL@Y´©Ó§að9Ô«X³ÊCAfU­`ÃŠÅ†b\0BV¯-h$BÄ‰ÿ®µ;·\Z]º2žhBD‚%Rl+…ID·ˆ`“qwn^hÛ>ÎÆ8²åÆ“¬=Ô72\\o(8@‹ms¤q§!ª†(u³½’DHÈvh‡àƒæv\"Ñíj°\r¹vÖz[ðI¿5OÚ0{[èÑ_ÕVJœø!Ö‡†8)DfiÜí.(cçnæ5^Zûlá!=3»zµç¤¥Wòm5µ÷ÌÄ÷È%°‡È¥ÞuÛ –ˆbÖ¨3\0^# [óY‚}Óà5ô-gŸªe§&ß˜È„ö„ oŠì`a…š¨Í…Œœ¡%ãYã¡ iX˜{–(œŠ–Ø6\rÿŽJÔÛ‹Û,ˆHI¤•ðU‚ 3!N²Þ}¢å\'¤!4¶ˆv$JSa|;4&¥![Fƒ#=Öc#\ræ!ðI€—áµc!eÒµÈd…ùa5]g3)<y„Í¤ÙŸ¯éÍˆÈ(\r§Š<:Ïœ‚p8¤‰xú\'Ÿ~.iii‡ˆz@	\"$B%˜Ð	+œÒ ZÈ3¯‹i€šF“›Ÿb)Oy°8Í›­;l¥ÓîY¤6ÊÊL^ó#A2\Z«4\n¬uÊnWl4µŽM²…4O\n.6›ƒ„@K\0UÂb´rž+.¯Ñ4€HÒ|.5Ùž:%º¿þ7m|7s¬ÿ!ü¾Ë™!‹Ã­!û›¯$P/!ˆ®ZmŸ+«lH7\rKÓn!?£ð®…hËL²\n\\cº»ºî „”pò :CÁ!4êl4Ðš°´!):#á¥éZû271³;t‡Šêª_ÎÓð1!ØýµÕK2!0+²;Âo£·V#Ã!2àk·Ës›u¿hsí®×{6¸8’t²&œ=HÚKK³Ð ËlbÝ‚ÈŽÜ„ìÖu5Sç{€Á†„\08ÜXW>ãµÙŒþÌkGsóØŽ;<¬Ï,«¸4œ#­¹•$×œM¹„Þ&û4´aó…4€¹ë?SOøä†€:ú¸øÂe\rÿôÑK.H 3»t¯ê\r?w\nä’46Gw>ÙòÑìmHä¼=ÿ[À¶w ð€”þ\ZP¿A|	l¹bî„·)D¤ŒZ™ÐÎú ¡¿CHqë ë¼A2ä\rÐ(!*B¨<¬jÙô¡@ñõú\"€ç (¦‘\r\Z-ü!1¡ÁÚ ‡5Ó×p‚¨CSUƒ‰Ž\"Ú 2Vøé°\"$„©®v%ë­Î5¼Äüœq»1Ñ±ÃM‘L\\€\Z8ÂÖÕq[¿»Ñ¤ Ñ(ã1#‹‚ ÔÖøÀL	P†0”D+±C.Ša˜•‘T	ãU~Ú»è±!>Öîÿ*t 3J(H¶rp_lÄ\")ñ4h”Ñ‡”x¡àˆHÉIìàƒjªV|Zézâ–\ZË#ó<èŒà•*€ƒ`-ÁLJ’\Z¯„ä~84ISRbU3X/V®R<z;3Pgˆgrq–w|]$¾ùdÓ‘b3£$¨“Ë­I}ûyçý”¾K\0Ð“ÂŒF(AÅfÐ±{ËÄ¿‰Là¡(;µ\0}ÂS‚ò|ÄòÖÅÂÝ3¤ªÍ-çEä]¡ÍŒØ0\rñ–8ö³s\rMgõdz=AÀìoIÄ3AðM}©¨5x·&Š€Må6g8	Yþ”\Z€”DRÏ©M^vÿž1uhÑ„}/«òQ\'öInP\Zþ“.Ÿ:J¥$¥©2­©Rl¹+YNÍF4Ã—ÉnŒÕw—ÇY‹¹:6b&s¢r°êÃBBU†L&C¯jO»jÏ°#uåW\'VpüŸýÆV•4\0}—™Í	:ÉÖ‚iâ;ƒí™jÓì	1ª‚X+O{(M!zã³ -ë6’Å¢òìt«5q?¥‰‚ªë”³Mdec\'>·ÒÉ9›Íhg¿ÜA¼1°âXî3ŒûŽä¦”¦pl$.WïÚÑ½zd¬v£©×vÙ…%¹+ß!7´Þ/wpßnœ\0›\09Q‚ˆ:¸\0ÖÍLÿlç\ZÙºR·¯Pl¢^óÛÛÜy¶¿3…o…Á9Ÿnÿ,/‚¹Ä\'(²×µ‡øç„\'›PÜ´¯ƒD„s¡Éa¾úÖ¯ –íÁŽ.•ô‚+<p˜ô;Ÿ8Û«Ð÷\nÂÎòoÇ.ðKËÛê‘½×S°Ò—¿Óí¨ˆ©ìÇl¼´ÊHò=$°âÅâxÁèu†uq9cJð™G,ÆñÞL€¼^Ô§çÝîoƒ\\T\0wƒÐq‘3@èü³=Š¥-\0ØgI@6¤‰èþ.”b¯–™³g^tšÑ¹æçNo›ßAi;ÿ8½8Å†¾ÆÓéHÔmk\nÜHÍžz¾™•Øª«ÿšÐYË¥5æ¥-Ý<‹ò\ZF¾M¯!ñ(`\r…\rÈa”mÖã‰&û£ØC7œG|>w¬±Ð¬%ÓªèdX±ÅlŸ«­W‰áx[˜(´u!,ºWs‹•Ñdu47³‰:ÑÑÙqN•Ç¬ÍF$çßD8&…{€‚ËÉËVe”—EÞeÝ6ÀËŽ—WÎò–»üå(ŸÈµÑ´‘ŸnåºÝÌ»œâ“ï<æ¯™ù’Xžs2–{,HO:V<®ô¦;]\'LºÔ§.’¨SýêXˆÕ³Îõ®dë^»ØÝö±›ýìÚ(;Ú×Îvcó¶íyÀ˜ÑÀ}%`·À>Ðgè½z·ûö>÷ÿzh@h¦1ø¾à(È8¼à\0 ãŸ¡ÈËÃ\n°». ° —ÇûÑŸñ¸žè{ë›Ñú@¯\'ìþŒ\nä~ñÜøÁÐúÍž¯2P‚ÿHý4`{ld¾ï\Z~4Ð|y¼€—¯\0åCÂ(@±À\nÏãcScöêÿAógÏŒÚßžx\0îÑß{ìýì§\r{G|$P}Î?`{Ñw{Ý7öç\nÍ\0~Ùpx\0,\0|ÐÀ}ó ~vW\røÀÑz¼×~o\rô‡ø·‚ö‡{Í\0!È#ø£w¨ÿz€x˜÷À<xè÷€Íð\0$@zØ}À|À{8XMH|P,`|ÛÐz\Z \0@H|\nð¸Çèw/àƒ/p‚ÎÌ\Zð\0U˜ÕÇ}ÀàxÐy€„ÀnÈ- À¼·„P(xux\0 Èn8‚v·‡-‡Î  (ˆÌ Èƒpˆ·g{Bø`à‰Q¸|…H|10‚ŠPèxs(‰uÇ}_zÓ÷ƒ˜ÈË÷ž(}{X¤ç†$0z¸’‚Ð°‚,0|.X€÷×§\r5è¾wŠ$ Àšw\01à…Ô8w‰H„Ìð}È€Ó§{\nðÿ”w$ž(wºçƒÈ\r­{¾×Ð…\nÐa~ÑXŒÝw”x\0?€x-@zçz§‡Œãø,ÚçzTHï˜\n‰€åHbˆh{‰ø\0ä8Ž”÷ŽÀ~­§\0>8wæ˜ÈÇÈx\0¿˜‰$`‘`~1p\0  \04iŠ#ø\0/É}?Ðwß{3i~?\0{-ð}&™’H €|¤×ztø‹¾¨\0µˆ_î7\rµ†çH€¹g¸‡$0•ˆ˜{4v§{˜‡Œ…—y9HÉ0hƒÝçxx{ÚWÕ­—zÙ€)Ù…vgŽ}ç{¶vç‰Èƒ1°xãˆ}ø§ÿ’ž—‡y}Ç|ŠÈ”i‰ˆ{Ù‚©Œ¹Õ·’ãhw‰‰æ8w\ZP5xšk¸xÏçš€éž·”Ï`›Öˆ~\0–)+ˆ‚$\rïüwŒ¶‡{®gyÑ@…ÿGƒÝ·’*i{¤(˜ˆÈ–í˜ŒpYS(á €ÂÇHè\r¸—X}‰˜Èˆ‹nÙ}¨w‘Î	ŽÈÐ	ƒ/Ø˜8‹]hÕ‰ˆòW Ð•mI€‰‰„GÈ©ô‰~ùù–n	Š‘cø™ÛØ˜Fˆ~ÈW–§ø’3ØŒ5(| œ¹[Á©‚ŸI{ŸyŸÕÐŒÍžÐ‰ŒÒH}ÈX¡×™ IÿŽ_xzõ—ú\0 \ZèŽ)ižô‰ž|yÊy}ð‰Í—ŸôWŸœyœøÙ|ß÷sÈŸ‰Hç§\0ƒ7 Ä÷£x ð9¤Ú}z[Ê¥ˆˆ~ß×¢lÙæèz(9‚ç7ž4ÈZ“[:Ÿd&Œ¬w¢v‰¢Rº¢$Ÿ*‰’{‡Œ¹–K\nx?àyÍÀ)ŸÊX¨:JžCzœGj¨Ï÷\0}§¤\Zp8òù¤ü‡€ðù–˜ž4ÚŸˆ†è©·Ù|ú Ez–eŠ $À~ÞØ{C˜’2È§ˆíX«Î «kz§ˆÈ›Îð›‡v\rÎ*¬*J\r ¸¥¤ç¢ˆ\ZßI×Ê–vª«@ÿú>ú•Ù§|ç÷«ù–¸w10~ÝPžÇI¬s÷‹ù‹\Zp“aÙÈjH€ …Dú¤?p`~©:¥P~\Zp°Ê‡™Êg„;È8”Ñ÷Ù‡~xx©’ð\Zyùiò·‡MøkÈÒˆ‹º‚¾—œ“‰¯(¢‰§è·š°„°ù•Vèv%\n\r-0ƒ‰×€CÛw8X\rÌ‚P˜‰žÇ‹4Øwø¨yyðƒÑ ‰°z’(“Ôhy=ÉµµúˆC¹{ßp´Q›x\nIz ”ÃJ~è–äú¯lh—pHyt÷œ4i¬j›´y¸Žä\Z¸;È… ÿ±7–Ó÷’Þi‹H‘N8”y|KwS8·‚©—HX¸^Ø·Š8zêJŽíI…s—äš‰Hº•‚;‹y¾©¦æ§w\'é\rÿ˜xi—×)\rÐvÏgð*ß2)‘»õ°»Ð÷‰ƒ+¨×0¼^g\"ú’	H#\0\0‹ÓAÁ¼÷`°Û ß(\r_xvÿ‡†±°8DPà¿m7I`„`=°¼ò»¿]·½>Ð„FÀü[À\\7C SQpaÀ,u@`\0pIQ\0JðÀÜÁc1Á ÀTQ6\05@ÀœÂW‘Â\0|4À\0€\0ñú«Â8ìå0\00.|ÁˆÃ I`\0\0HœÄJ¼ÄLÜÄNüÄP¼\0`\0. \0 \0Ä‰@6\07 >€0Æd\\Æf|ÆhœÆj¼ÆlÜÆnüÆpÇr<Çt\\Çv|ÇxœÇpì*p`J¡À\0\0€\0ˆœÈŠ¼ÈŒÜÈŽüÈÉ’<É”\\É–|É˜œÉš¼ÉœÜÉžLÉ\0À\0#ü`à\0ª¼Ê¬ÜÊ®üÊ°Ë²<Ë´\\Ë¶|Ë¸œËº¼Ë¼ÜË¾üËÀlË`ÈwÌÈœÌÊ¼ÌÌÜÌÎüÌÐÍÒ<ÍÎ\0;');
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
