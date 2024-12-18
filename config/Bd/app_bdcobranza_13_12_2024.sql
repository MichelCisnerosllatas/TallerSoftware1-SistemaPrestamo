CREATE DATABASE  IF NOT EXISTS `appcobra_bdcobranza` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `appcobra_bdcobranza`;

CREATE TABLE `pais` (
  `idPais` INT PRIMARY KEY AUTO_INCREMENT COMMENT 'id unico de pais',
  `cod` varchar(45) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL COMMENT 'nombre del pais',
  `capital` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL COMMENT 'la nacionalidad, si es peruano por ejemplo',
  `region` varchar(500) DEFAULT NULL,
  `idioma` varchar(500) DEFAULT NULL,
  `moneda` varchar(100) DEFAULT NULL,
  `simbmoneda` varchar(100) DEFAULT NULL,
  `rutabandera` varchar(1000) DEFAULT NULL,
  `rutaescudo` varchar(1000) DEFAULT NULL,
  `rutamapa1` varchar(800) DEFAULT NULL,
  `rutamapa2` varchar(800) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `fecharegistro` datetime DEFAULT NULL
);
LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'+500','South Georgia','King Edward Point',NULL,'Antarctic','','Saint Helena pound','Â£','https://flagcdn.com/w320/gs.png','','https://goo.gl/maps/mJzdaBwKBbm2B81q9','https://www.openstreetmap.org/relation/1983629','Activo',NULL),(2,'+1473','Grenada','St. George\'s',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/gd.png','https://mainfacts.com/media/images/coats_of_arms/gd.png','https://goo.gl/maps/rqWyfUAt4xhvk1Zy9','https://www.openstreetmap.org/relation/550727','Activo',NULL),(3,'+41','Switzerland','Bern',NULL,'Europe','','Swiss franc','Fr.','https://flagcdn.com/w320/ch.png','https://mainfacts.com/media/images/coats_of_arms/ch.png','https://goo.gl/maps/uVuZcXaxSx5jLyEC9','https://www.openstreetmap.org/relation/51701','Activo',NULL),(4,'+232','Sierra Leone','Freetown',NULL,'Africa','','Sierra Leonean leone','Le','https://flagcdn.com/w320/sl.png','https://mainfacts.com/media/images/coats_of_arms/sl.png','https://goo.gl/maps/jhacar85oq9QaeKB7','https://www.openstreetmap.org/relation/192777','Activo',NULL),(5,'+36','Hungary','Budapest',NULL,'Europe','','Hungarian forint','Ft','https://flagcdn.com/w320/hu.png','https://mainfacts.com/media/images/coats_of_arms/hu.png','https://goo.gl/maps/9gfPupm5bffixiFJ6','https://www.openstreetmap.org/relation/21335','Activo',NULL),(6,'+886','Taiwan','Taipei',NULL,'Asia','','New Taiwan dollar','$','https://flagcdn.com/w320/tw.png','https://mainfacts.com/media/images/coats_of_arms/tw.png','https://goo.gl/maps/HgMKFQjNadF3Wa6B6','https://www.openstreetmap.org/relation/449220','Activo',NULL),(7,'+681','Wallis and Futuna','Mata-Utu',NULL,'Oceania','','CFP franc','â?£','https://flagcdn.com/w320/wf.png','','https://goo.gl/maps/CzVqK74QYtbHv65r5','https://www.openstreetmap.org/relation/3412448','Activo',NULL),(8,'+1246','Barbados','Bridgetown',NULL,'Americas','','Barbadian dollar','$','https://flagcdn.com/w320/bb.png','https://mainfacts.com/media/images/coats_of_arms/bb.png','https://goo.gl/maps/2m36v8STvbGAWd9c7','https://www.openstreetmap.org/relation/547511','Activo',NULL),(9,'+64','Pitcairn Islands','Adamstown',NULL,'Oceania','','New Zealand dollar','$','https://flagcdn.com/w320/pn.png','','https://goo.gl/maps/XGJMnMAigXjXcxSa7','https://www.openstreetmap.org/relation/2185375','Activo',NULL),(10,'+225','Ivory Coast','Yamoussoukro',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/ci.png','https://mainfacts.com/media/images/coats_of_arms/ci.png','https://goo.gl/maps/wKsmN7f5qAeNtGjP6','https://www.openstreetmap.org/relation/192779','Activo',NULL),(11,'+216','Tunisia','Tunis',NULL,'Africa','','Tunisian dinar','Ø¯.Øª','https://flagcdn.com/w320/tn.png','https://mainfacts.com/media/images/coats_of_arms/tn.png','https://goo.gl/maps/KgUmpZdUuNRaougs8','https://www.openstreetmap.org/relation/192757','Activo',NULL),(12,'+39','Italy','Rome',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/it.png','https://mainfacts.com/media/images/coats_of_arms/it.png','https://goo.gl/maps/8M1K27TDj7StTRTq8','https://www.openstreetmap.org/relation/365331','Activo',NULL),(13,'+229','Benin','Porto-Novo',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/bj.png','https://mainfacts.com/media/images/coats_of_arms/bj.png','https://goo.gl/maps/uMw1BsHEXQYgVFFu6','https://www.openstreetmap.org/relation/192784','Activo',NULL),(14,'+62','Indonesia','Jakarta',NULL,'Asia','','Indonesian rupiah','Rp','https://flagcdn.com/w320/id.png','https://mainfacts.com/media/images/coats_of_arms/id.png','https://goo.gl/maps/9gfPupm5bffixiFJ6','https://www.openstreetmap.org/relation/21335','Activo',NULL),(15,'+238','Cape Verde','Praia',NULL,'Africa','','Cape Verdean escudo','Esc','https://flagcdn.com/w320/cv.png','https://mainfacts.com/media/images/coats_of_arms/cv.png','https://goo.gl/maps/Kc9vy5ChjuiAgMfXA','https://www.openstreetmap.org/relation/535774','Activo',NULL),(16,'+1869','Saint Kitts and Nevis','Basseterre',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/kn.png','https://mainfacts.com/media/images/coats_of_arms/kn.png','https://goo.gl/maps/qiaVwcLVTXX3eoTNA','https://www.openstreetmap.org/relation/536899','Activo',NULL),(17,'+856','Laos','Vientiane',NULL,'Asia','','Lao kip','â?­','https://flagcdn.com/w320/la.png','https://mainfacts.com/media/images/coats_of_arms/la.png','https://goo.gl/maps/F3asVB7sRKgSnwbE7','https://www.openstreetmap.org/relation/49903','Activo',NULL),(18,'+599','Caribbean Netherlands','Kralendijk',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/bq.png','https://mainfacts.com/media/images/coats_of_arms/bq.png','https://goo.gl/maps/4XVes1P6uEDTz77WA','https://www.openstreetmap.org/relation/1216720','Activo',NULL),(19,'+256','Uganda','Kampala',NULL,'Africa','','Ugandan shilling','Sh','https://flagcdn.com/w320/ug.png','https://mainfacts.com/media/images/coats_of_arms/ug.png','https://goo.gl/maps/Y7812hFiGa8LD9N68','https://www.openstreetmap.org/relation/192796','Activo',NULL),(20,'+376','Andorra','Andorra la Vella',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/ad.png','https://mainfacts.com/media/images/coats_of_arms/ad.png','https://goo.gl/maps/JqAnacWE2qEznKgw7','https://www.openstreetmap.org/relation/9407','Activo',NULL),(21,'+257','Burundi','Gitega',NULL,'Africa','','Burundian franc','Fr','https://flagcdn.com/w320/bi.png','https://mainfacts.com/media/images/coats_of_arms/bi.png','https://goo.gl/maps/RXPWoRrB9tfrJpUG7','https://www.openstreetmap.org/relation/195269','Activo',NULL),(22,'+27','South Africa','Pretoria, Bloemfontein, Cape Town',NULL,'Africa','','South African rand','R','https://flagcdn.com/w320/za.png','https://mainfacts.com/media/images/coats_of_arms/za.png','https://goo.gl/maps/CLCZ1R8Uz1KpYhRv6','https://www.openstreetmap.org/relation/87565','Activo',NULL),(23,'+33','France','Paris',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/fr.png','https://mainfacts.com/media/images/coats_of_arms/fr.png','https://goo.gl/maps/g7QxxSFsWyTPKuzd7','https://www.openstreetmap.org/relation/1403916','Activo',NULL),(24,'+218','Libya','Tripoli',NULL,'Africa','','Libyan dinar','Ù?.Ø¯','https://flagcdn.com/w320/ly.png','https://mainfacts.com/media/images/coats_of_arms/ly.png','https://goo.gl/maps/eLgGnaQWcJEdYRMy5','openstreetmap.org/relation/192758','Activo',NULL),(25,'+52','Mexico','Mexico City',NULL,'Americas','','Mexican peso','$','https://flagcdn.com/w320/mx.png','https://mainfacts.com/media/images/coats_of_arms/mx.png','https://goo.gl/maps/s5g7imNPMDEePxzbA','https://www.openstreetmap.org/relation/114686','Activo',NULL),(26,'+241','Gabon','Libreville',NULL,'Africa','','Central African CFA franc','Fr','https://flagcdn.com/w320/ga.png','https://mainfacts.com/media/images/coats_of_arms/ga.png','https://goo.gl/maps/vyRSkqw1H1fnq4ry6','https://www.openstreetmap.org/relation/192793','Activo',NULL),(27,'+1670','Northern Mariana Islands','Saipan',NULL,'Oceania','','United States dollar','$','https://flagcdn.com/w320/mp.png','','https://goo.gl/maps/cpZ67knoRAcfu1417','https://www.openstreetmap.org/relation/306004','Activo',NULL),(28,'+389','North Macedonia','Skopje',NULL,'Europe','','denar','den','https://flagcdn.com/w320/mk.png','https://mainfacts.com/media/images/coats_of_arms/mk.png','https://goo.gl/maps/55Q8MEnF6ACdu3q79','https://www.openstreetmap.org/relation/53293','Activo',NULL),(29,'+86','China','Beijing',NULL,'Asia','','Chinese yuan','Â¥','https://flagcdn.com/w320/cn.png','https://mainfacts.com/media/images/coats_of_arms/cn.png','https://goo.gl/maps/p9qC6vgiFRRXzvGi7','https://www.openstreetmap.org/relation/270056','Activo',NULL),(30,'+967','Yemen','Sana\'a',NULL,'Asia','','Yemeni rial','ï·¼','https://flagcdn.com/w320/ye.png','https://mainfacts.com/media/images/coats_of_arms/ye.png','https://goo.gl/maps/WCmE76HKcLideQQw7','https://www.openstreetmap.org/relation/305092','Activo',NULL),(31,'+590','Saint BarthÃ©lemy','Gustavia',NULL,'Americas','','Euro','â?¬','https://flagcdn.com/w320/bl.png','','https://goo.gl/maps/Mc7GqH466S7AAk297','https://www.openstreetmap.org/relation/7552779','Activo',NULL),(32,'+44','Guernsey','St. Peter Port',NULL,'Europe','','British pound, Guernsey pound','Â£, Â£','https://flagcdn.com/w320/gg.png','https://mainfacts.com/media/images/coats_of_arms/gg.png','https://goo.gl/maps/6kXnQU5QvEZMD9VB7','https://www.openstreetmap.org/relation/270009','Activo',NULL),(33,'+677','Solomon Islands','Honiara',NULL,'Oceania','','Solomon Islands dollar','$','https://flagcdn.com/w320/sb.png','https://mainfacts.com/media/images/coats_of_arms/sb.png','https://goo.gl/maps/JbPkx86Ywjv8C1n8A','https://www.openstreetmap.org/relation/1857436','Activo',NULL),(34,'+4779','Svalbard and Jan Mayen','Longyearbyen',NULL,'Europe','','krone','kr','https://flagcdn.com/w320/sj.png','','https://goo.gl/maps/L2wyyn3cQ16PzQ5J8','https://www.openstreetmap.org/relation/1337397','Activo',NULL),(35,'+298','Faroe Islands','TÃ³rshavn',NULL,'Europe','','Danish krone, Faroese krÃ³na','kr, kr','https://flagcdn.com/w320/fo.png','https://mainfacts.com/media/images/coats_of_arms/fo.png','https://goo.gl/maps/6sTru4SmHdEVcNkM6','https://www.openstreetmap.org/relation/52939','Activo',NULL),(36,'+998','Uzbekistan','Tashkent',NULL,'Asia','','Uzbekistani soÊ»m','so\'m','https://flagcdn.com/w320/uz.png','https://mainfacts.com/media/images/coats_of_arms/uz.png','https://goo.gl/maps/AJpo6MjMx23qSWCz8','https://www.openstreetmap.org/relation/196240','Activo',NULL),(37,'+20','Egypt','Cairo',NULL,'Africa','','Egyptian pound','Â£','https://flagcdn.com/w320/eg.png','https://mainfacts.com/media/images/coats_of_arms/eg.png','https://goo.gl/maps/uoDRhXbsqjG6L7VG7','https://www.openstreetmap.org/relation/1473947','Activo',NULL),(38,'+221','Senegal','Dakar',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/sn.png','https://mainfacts.com/media/images/coats_of_arms/sn.png','https://goo.gl/maps/o5f1uD5nyihCL3HCA','https://www.openstreetmap.org/relation/192775','Activo',NULL),(39,'+94','Sri Lanka','Sri Jayawardenepura Kotte',NULL,'Asia','','Sri Lankan rupee','Rs  à¶»à·?','https://flagcdn.com/w320/lk.png','https://mainfacts.com/media/images/coats_of_arms/lk.png','https://goo.gl/maps/VkPHoeFSfgzRQCDv8','https://www.openstreetmap.org/relation/536807','Activo',NULL),(40,'+970','Palestine','Ramallah, Jerusalem',NULL,'Asia','','Egyptian pound, Israeli new shekel, Jordanian dinar','EÂ£, â?ª, JD','https://flagcdn.com/w320/ps.png','https://mainfacts.com/media/images/coats_of_arms/ps.png','https://goo.gl/maps/QvTbkRdmdWEoYAmt5','https://www.openstreetmap.org/relation/1703814','Activo',NULL),(41,'+880','Bangladesh','Dhaka',NULL,'Asia','','Bangladeshi taka','à§³','https://flagcdn.com/w320/bd.png','https://mainfacts.com/media/images/coats_of_arms/bd.png','https://goo.gl/maps/op6gmLbHcvv6rLhH6','https://www.openstreetmap.org/relation/184640','Activo',NULL),(42,'+51','Peru','Lima',NULL,'Americas','','Peruvian sol','S/ ','https://flagcdn.com/w320/pe.png','https://mainfacts.com/media/images/coats_of_arms/pe.png','https://goo.gl/maps/uDWEUaXNcZTng1fP6','https://www.openstreetmap.org/relation/288247','Activo',NULL),(43,'+65','Singapore','Singapore',NULL,'Asia','','Singapore dollar','$','https://flagcdn.com/w320/sg.png','https://mainfacts.com/media/images/coats_of_arms/sg.png','https://goo.gl/maps/QbQt9Y9b5KFzsahV6','https://www.openstreetmap.org/relation/536780','Activo',NULL),(44,'+90','Turkey','Ankara',NULL,'Asia','','Turkish lira','â?º','https://flagcdn.com/w320/tr.png','https://mainfacts.com/media/images/coats_of_arms/tr.png','https://goo.gl/maps/dXFFraiUDfcB6Quk6','https://www.openstreetmap.org/relation/174737','Activo',NULL),(45,'+93','Afghanistan','Kabul',NULL,'Asia','','Afghan afghani','Ø?','https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_the_Taliban.svg/320px-Flag_of_the_Taliban.svg.png','https://mainfacts.com/media/images/coats_of_arms/af.png','https://goo.gl/maps/BXBGw7yUUFknCfva9','https://www.openstreetmap.org/relation/303427','Activo',NULL),(46,'+297','Aruba','Oranjestad',NULL,'Americas','','Aruban florin','Æ?','https://flagcdn.com/w320/aw.png','https://mainfacts.com/media/images/coats_of_arms/aw.png','https://goo.gl/maps/8hopbQqifHAgyZyg8','https://www.openstreetmap.org/relation/1231749','Activo',NULL),(47,'+682','Cook Islands','Avarua',NULL,'Oceania','','Cook Islands dollar, New Zealand dollar','$, $','https://flagcdn.com/w320/ck.png','https://mainfacts.com/media/images/coats_of_arms/ck.png','https://goo.gl/maps/nrGZrvWRGB4WHgDC9','https://www.openstreetmap.org/relation/2184233','Activo',NULL),(48,'+44','United Kingdom','London',NULL,'Europe','','British pound','Â£','https://flagcdn.com/w320/gb.png','https://mainfacts.com/media/images/coats_of_arms/gb.png','https://goo.gl/maps/FoDtc3UKMkFsXAjHA','https://www.openstreetmap.org/relation/62149','Activo',NULL),(49,'+260','Zambia','Lusaka',NULL,'Africa','','Zambian kwacha','ZK','https://flagcdn.com/w320/zm.png','https://mainfacts.com/media/images/coats_of_arms/zm.png','https://goo.gl/maps/mweBcqvW8TppZW6q9','https://www.openstreetmap.org/relation/195271','Activo',NULL),(50,'+358','Finland','Helsinki',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/fi.png','https://mainfacts.com/media/images/coats_of_arms/fi.png','https://goo.gl/maps/HjgWDCNKRAYHrkMn8','openstreetmap.org/relation/54224','Activo',NULL),(51,'+227','Niger','Niamey',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/ne.png','https://mainfacts.com/media/images/coats_of_arms/ne.png','https://goo.gl/maps/VKNU2TLsZcgxM49c8','https://www.openstreetmap.org/relation/192786','Activo',NULL),(52,'+61','Christmas Island','Flying Fish Cove',NULL,'Oceania','','Australian dollar','$','https://flagcdn.com/w320/cx.png','https://mainfacts.com/media/images/coats_of_arms/cx.png','https://goo.gl/maps/ZC17hHsQZpShN5wk9','https://www.openstreetmap.org/relation/6365444','Activo',NULL),(53,'+690','Tokelau','Fakaofo',NULL,'Oceania','','New Zealand dollar','$','https://flagcdn.com/w320/tk.png','','https://goo.gl/maps/Ap5qN8qien6pT9UN6','https://www.openstreetmap.org/relation/2186600','Activo',NULL),(54,'+245','Guinea-Bissau','Bissau',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/gw.png','https://mainfacts.com/media/images/coats_of_arms/gw.png','https://goo.gl/maps/5Wyaz17miUc1zLc67','https://www.openstreetmap.org/relation/192776','Activo',NULL),(55,'+994','Azerbaijan','Baku',NULL,'Asia','','Azerbaijani manat','â?¼','https://flagcdn.com/w320/az.png','https://mainfacts.com/media/images/coats_of_arms/az.png','https://goo.gl/maps/az3Zz7ar2aoB9AUc6','https://www.openstreetmap.org/relation/364110','Activo',NULL),(56,'+262','RÃ©union','Saint-Denis',NULL,'Africa','','Euro','â?¬','https://flagcdn.com/w320/re.png','','https://goo.gl/maps/wWpBrXsp8UHVbah29','https://www.openstreetmap.org/relation/1785276','Activo',NULL),(57,'+253','Djibouti','Djibouti',NULL,'Africa','','Djiboutian franc','Fr','https://flagcdn.com/w320/dj.png','https://mainfacts.com/media/images/coats_of_arms/dj.png','https://goo.gl/maps/V1HWfzN3bS1kwf4C6','https://www.openstreetmap.org/relation/192801','Activo',NULL),(58,'+850','North Korea','Pyongyang',NULL,'Asia','','North Korean won','â?©','https://flagcdn.com/w320/kp.png','https://mainfacts.com/media/images/coats_of_arms/kp.png','https://goo.gl/maps/9q5T2DMeH5JL7Tky6','https://www.openstreetmap.org/relation/192734','Activo',NULL),(59,'+230','Mauritius','Port Louis',NULL,'Africa','','Mauritian rupee','â?¨','https://flagcdn.com/w320/mu.png','https://mainfacts.com/media/images/coats_of_arms/mu.png','https://goo.gl/maps/PpKtZ4W3tir5iGrz7','https://www.openstreetmap.org/relation/535828','Activo',NULL),(60,'+1664','Montserrat','Plymouth',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/ms.png','https://mainfacts.com/media/images/coats_of_arms/ms.png','https://goo.gl/maps/CSbe7UmxPmiwQB7GA','https://www.openstreetmap.org/relation/537257','Activo',NULL),(61,'+1340','United States Virgin Islands','Charlotte Amalie',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/vi.png','','https://goo.gl/maps/mBfreywj8dor6q4m9','openstreetmap.org/relation/286898','Activo',NULL),(62,'+57','Colombia','BogotÃ¡',NULL,'Americas','','Colombian peso','$','https://flagcdn.com/w320/co.png','https://mainfacts.com/media/images/coats_of_arms/co.png','https://goo.gl/maps/zix9qNFX69E9yZ2M6','https://www.openstreetmap.org/relation/120027','Activo',NULL),(63,'+30','Greece','Athens',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/gr.png','https://mainfacts.com/media/images/coats_of_arms/gr.png','https://goo.gl/maps/LHGcAvuRyD2iKECC6','https://www.openstreetmap.org/relation/192307','Activo',NULL),(64,'+385','Croatia','Zagreb',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/hr.png','https://mainfacts.com/media/images/coats_of_arms/hr.png','https://goo.gl/maps/qSG6xTKUmrYpwmGQ6','https://www.openstreetmap.org/relation/214885','Activo',NULL),(65,'+212','Morocco','Rabat',NULL,'Africa','','Moroccan dirham','Ø¯.Ù?.','https://flagcdn.com/w320/ma.png','https://mainfacts.com/media/images/coats_of_arms/ma.png','https://goo.gl/maps/6oMv3dyBZg3iaXQ5A','https://www.openstreetmap.org/relation/3630439','Activo',NULL),(66,'+213','Algeria','Algiers',NULL,'Africa','','Algerian dinar','Ø¯.Ø¬','https://flagcdn.com/w320/dz.png','https://mainfacts.com/media/images/coats_of_arms/dz.png','https://goo.gl/maps/RsAyAfyaiNVb8DpW8','https://www.openstreetmap.org/relation/192756','Activo',NULL),(67,'','Antarctica','',NULL,'Antarctic','','','','https://flagcdn.com/w320/aq.png','https://mainfacts.com/media/images/coats_of_arms/aq.png','https://goo.gl/maps/kyBuJriu4itiXank7','https://www.openstreetmap.org/node/36966060','Activo',NULL),(68,'+31','Netherlands','Amsterdam',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/nl.png','https://mainfacts.com/media/images/coats_of_arms/nl.png','https://goo.gl/maps/Hv6zQswGhFxoVVBm6','https://www.openstreetmap.org/relation/47796','Activo',NULL),(69,'+249','Sudan','Khartoum',NULL,'Africa','','Sudanese pound','Ø¬.Ø³','https://flagcdn.com/w320/sd.png','https://mainfacts.com/media/images/coats_of_arms/sd.png','https://goo.gl/maps/bNW7YUJCaqR8zcXn7','https://www.openstreetmap.org/relation/192789','Activo',NULL),(70,'+679','Fiji','Suva',NULL,'Oceania','','Fijian dollar','$','https://flagcdn.com/w320/fj.png','https://mainfacts.com/media/images/coats_of_arms/fj.png','https://goo.gl/maps/r9fhDqoLZdg1zmE99','https://www.openstreetmap.org/relation/571747','Activo',NULL),(71,'+423','Liechtenstein','Vaduz',NULL,'Europe','','Swiss franc','Fr','https://flagcdn.com/w320/li.png','https://mainfacts.com/media/images/coats_of_arms/li.png','https://goo.gl/maps/KNuHeiJzAPodwM7y6','https://www.openstreetmap.org/relation/1155955','Activo',NULL),(72,'+977','Nepal','Kathmandu',NULL,'Asia','','Nepalese rupee','â?¨','https://flagcdn.com/w320/np.png','https://mainfacts.com/media/images/coats_of_arms/np.png','https://goo.gl/maps/UMj2zpbQp7B5c3yT7','https://www.openstreetmap.org/relation/184633','Activo',NULL),(73,'+1787, 939','Puerto Rico','San Juan',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/pr.png','','https://goo.gl/maps/sygfDbtwn389wu8x5','https://www.openstreetmap.org/relation/4422604','Activo',NULL),(74,'+995','Georgia','Tbilisi',NULL,'Asia','','lari','â?¾','https://flagcdn.com/w320/ge.png','https://mainfacts.com/media/images/coats_of_arms/ge.png','https://goo.gl/maps/bvCaGBePR1ZEDK5cA','https://www.openstreetmap.org/relation/28699','Activo',NULL),(75,'+92','Pakistan','Islamabad',NULL,'Asia','','Pakistani rupee','â?¨','https://flagcdn.com/w320/pk.png','https://mainfacts.com/media/images/coats_of_arms/pk.png','https://goo.gl/maps/5LYujdfR5yLUXoERA','https://www.openstreetmap.org/relation/307573','Activo',NULL),(76,'+377','Monaco','Monaco',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/mc.png','https://mainfacts.com/media/images/coats_of_arms/mc.png','https://goo.gl/maps/DGpndDot28bYdXYn7','https://www.openstreetmap.org/relation/1124039','Activo',NULL),(77,'+267','Botswana','Gaborone',NULL,'Africa','','Botswana pula','P','https://flagcdn.com/w320/bw.png','https://mainfacts.com/media/images/coats_of_arms/bw.png','https://goo.gl/maps/E364KeLy6N4JwxwQ8','https://www.openstreetmap.org/relation/1889339','Activo',NULL),(78,'+961','Lebanon','Beirut',NULL,'Asia','','Lebanese pound','Ù?.Ù?','https://flagcdn.com/w320/lb.png','https://mainfacts.com/media/images/coats_of_arms/lb.png','https://goo.gl/maps/Sz5VCU8UFBqMyTdc9','https://www.openstreetmap.org/relation/184843','Activo',NULL),(79,'+675','Papua New Guinea','Port Moresby',NULL,'Oceania','','Papua New Guinean kina','K','https://flagcdn.com/w320/pg.png','https://mainfacts.com/media/images/coats_of_arms/pg.png','https://goo.gl/maps/ChGmzZBjZ3vnBwR2A','https://goo.gl/maps/ChGmzZBjZ3vnBwR2A','Activo',NULL),(80,'+262','Mayotte','Mamoudzou',NULL,'Africa','','Euro','â?¬','https://flagcdn.com/w320/yt.png','','https://goo.gl/maps/1e7MXmfBwQv3TQGF7','https://www.openstreetmap.org/relation/1259885','Activo',NULL),(81,'+1809, 829, 849','Dominican Republic','Santo Domingo',NULL,'Americas','','Dominican peso','$','https://flagcdn.com/w320/do.png','https://mainfacts.com/media/images/coats_of_arms/do.png','https://goo.gl/maps/soxooTHxEeiAbn3UA','https://www.openstreetmap.org/relation/307828','Activo',NULL),(82,'+672','Norfolk Island','Kingston',NULL,'Oceania','','Australian dollar','$','https://flagcdn.com/w320/nf.png','','https://goo.gl/maps/pbvtm6XYd1iZbjky5','https://www.openstreetmap.org/relation/2574988','Activo',NULL),(83,'+47','Bouvet Island','',NULL,'Antarctic','','','','https://flagcdn.com/w320/bv.png','','https://goo.gl/maps/7WRQAEKZb4uK36yi9','https://www.openstreetmap.org/way/174996681','Activo',NULL),(84,'+974','Qatar','Doha',NULL,'Asia','','Qatari riyal','Ø±.Ù?','https://flagcdn.com/w320/qa.png','https://mainfacts.com/media/images/coats_of_arms/qa.png','https://goo.gl/maps/ZV76Y49z7LLUZ2KQ6','https://www.openstreetmap.org/relation/305095','Activo',NULL),(85,'+261','Madagascar','Antananarivo',NULL,'Africa','','Malagasy ariary','Ar','https://flagcdn.com/w320/mg.png','https://mainfacts.com/media/images/coats_of_arms/mg.png','https://goo.gl/maps/AHQh2ABBaFW6Ngj26','https://www.openstreetmap.org/relation/447325','Activo',NULL),(86,'+91','India','New Delhi',NULL,'Asia','','Indian rupee','â?¹','https://flagcdn.com/w320/in.png','https://mainfacts.com/media/images/coats_of_arms/in.png','https://goo.gl/maps/WSk3fLwG4vtPQetp7','https://www.openstreetmap.org/relation/304716','Activo',NULL),(87,'+963','Syria','Damascus',NULL,'Asia','','Syrian pound','Â£','https://flagcdn.com/w320/sy.png','https://mainfacts.com/media/images/coats_of_arms/sy.png','https://goo.gl/maps/Xe3VnFbwdb4nv2SM9','https://www.openstreetmap.org/relation/184840','Activo',NULL),(88,'+382','Montenegro','Podgorica',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/me.png','https://mainfacts.com/media/images/coats_of_arms/me.png','https://goo.gl/maps/4THX1fM7WqANuPbB8','https://www.openstreetmap.org/relation/53296','Activo',NULL),(89,'+268','Eswatini','Mbabane',NULL,'Africa','','Swazi lilangeni, South African rand','L, R','https://flagcdn.com/w320/sz.png','','https://goo.gl/maps/cUY79eqQihFSE8hV6','https://www.openstreetmap.org/relation/88210','Activo',NULL),(90,'+595','Paraguay','AsunciÃ³n',NULL,'Americas','','Paraguayan guaranÃ­','â?²','https://flagcdn.com/w320/py.png','https://mainfacts.com/media/images/coats_of_arms/py.png','https://goo.gl/maps/JtnqG73WJn1Gx6mz6','https://www.openstreetmap.org/relation/287077','Activo',NULL),(91,'+503','El Salvador','San Salvador',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/sv.png','https://mainfacts.com/media/images/coats_of_arms/sv.png','https://goo.gl/maps/cZnCEi5sEMQtKKcB7','https://www.openstreetmap.org/relation/1520612','Activo',NULL),(92,'+380','Ukraine','Kyiv',NULL,'Europe','','Ukrainian hryvnia','â?´','https://flagcdn.com/w320/ua.png','https://mainfacts.com/media/images/coats_of_arms/ua.png','https://goo.gl/maps/DvgJMiPJ7aozKFZv7','https://www.openstreetmap.org/relation/60199','Activo',NULL),(93,'+44','Isle of Man','Douglas',NULL,'Europe','','British pound, Manx pound','Â£, Â£','https://flagcdn.com/w320/im.png','https://mainfacts.com/media/images/coats_of_arms/im.png','https://goo.gl/maps/4DqVHDgVaFgnh8ZV8','https://www.openstreetmap.org/relation/62269','Activo',NULL),(94,'+264','Namibia','Windhoek',NULL,'Africa','','Namibian dollar, South African rand','$, R','https://flagcdn.com/w320/na.png','https://mainfacts.com/media/images/coats_of_arms/na.png','https://goo.gl/maps/oR1i8BFEYX3EY83WA','https://www.openstreetmap.org/relation/195266','Activo',NULL),(95,'+971','United Arab Emirates','Abu Dhabi',NULL,'Asia','','United Arab Emirates dirham','Ø¯.Ø¥','https://flagcdn.com/w320/ae.png','https://mainfacts.com/media/images/coats_of_arms/ae.png','https://goo.gl/maps/AZZTDA6GzVAnKMVd8','https://www.openstreetmap.org/relation/307763','Activo',NULL),(96,'+359','Bulgaria','Sofia',NULL,'Europe','','Bulgarian lev','Ð»Ð²','https://flagcdn.com/w320/bg.png','https://mainfacts.com/media/images/coats_of_arms/bg.png','https://goo.gl/maps/F5uAhDGWzc3BrHfm9','https://www.openstreetmap.org/relation/186382','Activo',NULL),(97,'+299','Greenland','Nuuk',NULL,'Americas','','krone','kr.','https://flagcdn.com/w320/gl.png','https://mainfacts.com/media/images/coats_of_arms/gl.png','https://goo.gl/maps/j3289UPEQXt1ceSy8','https://www.openstreetmap.org/relation/2184073','Activo',NULL),(98,'+49','Germany','Berlin',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/de.png','https://mainfacts.com/media/images/coats_of_arms/de.png','https://goo.gl/maps/mD9FBMq1nvXUBrkv6','https://www.openstreetmap.org/relation/51477','Activo',NULL),(99,'+855','Cambodia','Phnom Penh',NULL,'Asia','','Cambodian riel, United States dollar','á??, $','https://flagcdn.com/w320/kh.png','https://mainfacts.com/media/images/coats_of_arms/kh.png','https://goo.gl/maps/nztQtFSrUXZymJaW8','https://www.openstreetmap.org/relation/49898','Activo',NULL),(100,'+964','Iraq','Baghdad',NULL,'Asia','','Iraqi dinar','Ø¹.Ø¯','https://flagcdn.com/w320/iq.png','https://mainfacts.com/media/images/coats_of_arms/iq.png','https://goo.gl/maps/iL8Bmy1sUCW9fUk18','https://www.openstreetmap.org/relation/304934','Activo',NULL),(101,'+262','French Southern and Antarctic Lands','Port-aux-FranÃ§ais',NULL,'Antarctic','','Euro','â?¬','https://flagcdn.com/w320/tf.png','https://mainfacts.com/media/images/coats_of_arms/tf.png','https://goo.gl/maps/6ua6CX1m4w1xF2Em7','https://www.openstreetmap.org/relation/2186658','Activo',NULL),(102,'+46','Sweden','Stockholm',NULL,'Europe','','Swedish krona','kr','https://flagcdn.com/w320/se.png','https://mainfacts.com/media/images/coats_of_arms/se.png','https://goo.gl/maps/iqygE491ADVgnBW39','https://www.openstreetmap.org/relation/52822','Activo',NULL),(103,'+53','Cuba','Havana',NULL,'Americas','','Cuban convertible peso, Cuban peso','$, $','https://flagcdn.com/w320/cu.png','https://mainfacts.com/media/images/coats_of_arms/cu.png','https://goo.gl/maps/1dDw1QfZspfMUTm99','https://www.openstreetmap.org/relation/307833','Activo',NULL),(104,'+996','Kyrgyzstan','Bishkek',NULL,'Asia','','Kyrgyzstani som','Ñ','https://flagcdn.com/w320/kg.png','https://mainfacts.com/media/images/coats_of_arms/kg.png','https://goo.gl/maps/SKG8BSMMQVvxkRkB7','https://www.openstreetmap.org/relation/178009','Activo',NULL),(105,'+73, 4, 5, 8, 9','Russia','Moscow',NULL,'Europe','','Russian ruble','â?½','https://flagcdn.com/w320/ru.png','https://mainfacts.com/media/images/coats_of_arms/ru.png','https://goo.gl/maps/4F4PpDhGJgVvLby57','https://www.openstreetmap.org/relation/60189#map=3/65.15/105.29','Activo',NULL),(106,'+60','Malaysia','Kuala Lumpur',NULL,'Asia','','Malaysian ringgit','RM','https://flagcdn.com/w320/my.png','https://mainfacts.com/media/images/coats_of_arms/my.png','https://goo.gl/maps/qrY1PNeUXGyXDcPy6','https://www.openstreetmap.org/relation/2108121','Activo',NULL),(107,'+239','SÃ£o TomÃ© and PrÃ­ncipe','SÃ£o TomÃ©',NULL,'Africa','','SÃ£o TomÃ© and PrÃ­ncipe dobra','Db','https://flagcdn.com/w320/st.png','https://mainfacts.com/media/images/coats_of_arms/st.png','https://goo.gl/maps/9EUppm13RtPX9oF46','https://www.openstreetmap.org/relation/535880','Activo',NULL),(108,'+357','Cyprus','Nicosia',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/cy.png','https://mainfacts.com/media/images/coats_of_arms/cy.png','https://goo.gl/maps/77hPBRdLid8yD5Bm7','https://www.openstreetmap.org/relation/307787','Activo',NULL),(109,'+1','Canada','Ottawa',NULL,'Americas','','Canadian dollar','$','https://flagcdn.com/w320/ca.png','https://mainfacts.com/media/images/coats_of_arms/ca.png','https://goo.gl/maps/jmEVLugreeqiZXxbA','https://www.openstreetmap.org/relation/1428125','Activo',NULL),(110,'+265','Malawi','Lilongwe',NULL,'Africa','','Malawian kwacha','MK','https://flagcdn.com/w320/mw.png','https://mainfacts.com/media/images/coats_of_arms/mw.png','https://goo.gl/maps/mc6z83pW9m98X2Ef6','https://www.openstreetmap.org/relation/195290','Activo',NULL),(111,'+966','Saudi Arabia','Riyadh',NULL,'Asia','','Saudi riyal','Ø±.Ø³','https://flagcdn.com/w320/sa.png','https://mainfacts.com/media/images/coats_of_arms/sa.png','https://goo.gl/maps/5PSjvdJ1AyaLFRrG9','https://www.openstreetmap.org/relation/307584','Activo',NULL),(112,'+387','Bosnia and Herzegovina','Sarajevo',NULL,'Europe','','Bosnia and Herzegovina convertible mark','KM','https://flagcdn.com/w320/ba.png','https://mainfacts.com/media/images/coats_of_arms/ba.png','https://www.google.com/maps/place/Bosnia+and+Herzegovina','https://www.openstreetmap.org/relation/2528142','Activo',NULL),(113,'+251','Ethiopia','Addis Ababa',NULL,'Africa','','Ethiopian birr','Br','https://flagcdn.com/w320/et.png','https://mainfacts.com/media/images/coats_of_arms/et.png','https://goo.gl/maps/2Q4hQWCbhuZLj3fG6','https://www.openstreetmap.org/relation/192800','Activo',NULL),(114,'+34','Spain','Madrid',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/es.png','https://mainfacts.com/media/images/coats_of_arms/es.png','https://goo.gl/maps/138JaXW8EZzRVitY9','https://www.openstreetmap.org/relation/1311341','Activo',NULL),(115,'+386','Slovenia','Ljubljana',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/si.png','https://mainfacts.com/media/images/coats_of_arms/si.png','https://goo.gl/maps/7zgFmswcCJh5L5D49','https://www.openstreetmap.org/relation/218657','Activo',NULL),(116,'+968','Oman','Muscat',NULL,'Asia','','Omani rial','Ø±.Ø¹.','https://flagcdn.com/w320/om.png','https://mainfacts.com/media/images/coats_of_arms/om.png','https://goo.gl/maps/L2BoXoAwDDwWecnw5','https://www.openstreetmap.org/relation/305138','Activo',NULL),(117,'+508','Saint Pierre and Miquelon','Saint-Pierre',NULL,'Americas','','Euro','â?¬','https://flagcdn.com/w320/pm.png','','https://goo.gl/maps/bUM8Yc8pA8ghyhmt6','https://www.openstreetmap.org/relation/3406826','Activo',NULL),(118,'+853','Macau','',NULL,'Asia','','Macanese pataca','P','https://flagcdn.com/w320/mo.png','https://mainfacts.com/media/images/coats_of_arms/mo.png','https://goo.gl/maps/whymRdk3dZFfAAs4A','https://www.openstreetmap.org/relation/1867188','Activo',NULL),(119,'+378','San Marino','City of San Marino',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/sm.png','https://mainfacts.com/media/images/coats_of_arms/sm.png','https://goo.gl/maps/rxCVJjm8dVY93RPY8','https://www.openstreetmap.org/relation/54624','Activo',NULL),(120,'+266','Lesotho','Maseru',NULL,'Africa','','Lesotho loti, South African rand','L, R','https://flagcdn.com/w320/ls.png','https://mainfacts.com/media/images/coats_of_arms/ls.png','https://goo.gl/maps/H8gJi5mL4Cmd1SF28','https://www.openstreetmap.org/relation/2093234','Activo',NULL),(121,'+692','Marshall Islands','Majuro',NULL,'Oceania','','United States dollar','$','https://flagcdn.com/w320/mh.png','https://mainfacts.com/media/images/coats_of_arms/mh.png','https://goo.gl/maps/A4xLi1XvcX88gi3W8','https://www.openstreetmap.org/relation/571771','Activo',NULL),(122,'+1721','Sint Maarten','Philipsburg',NULL,'Americas','','Netherlands Antillean guilder','Æ?','https://flagcdn.com/w320/sx.png','','https://goo.gl/maps/DjvcESy1a1oGEZuNA','https://www.openstreetmap.org/relation/1231790','Activo',NULL),(123,'+354','Iceland','Reykjavik',NULL,'Europe','','Icelandic krÃ³na','kr','https://flagcdn.com/w320/is.png','https://mainfacts.com/media/images/coats_of_arms/is.png','https://goo.gl/maps/WxFWSQuc3oamNxoE6','https://www.openstreetmap.org/relation/299133','Activo',NULL),(124,'+352','Luxembourg','Luxembourg',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/lu.png','https://mainfacts.com/media/images/coats_of_arms/lu.png','https://goo.gl/maps/L6b2AgndgHprt2Ko9','https://www.openstreetmap.org/relation/2171347#map=10/49.8167/6.1335','Activo',NULL),(125,'+54','Argentina','Buenos Aires',NULL,'Americas','','Argentine peso','$','https://flagcdn.com/w320/ar.png','https://mainfacts.com/media/images/coats_of_arms/ar.png','https://goo.gl/maps/Z9DXNxhf2o93kvyc6','https://www.openstreetmap.org/relation/286393','Activo',NULL),(126,'+1649','Turks and Caicos Islands','Cockburn Town',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/tc.png','','https://goo.gl/maps/R8VUDQfwZiFtvmyn8','https://www.openstreetmap.org/relation/547479','Activo',NULL),(127,'+674','Nauru','Yaren',NULL,'Oceania','','Australian dollar','$','https://flagcdn.com/w320/nr.png','https://mainfacts.com/media/images/coats_of_arms/nr.png','https://goo.gl/maps/kyAGw6XEJgjSMsTK7','https://www.openstreetmap.org/relation/571804','Activo',NULL),(128,'+61','Cocos (Keeling) Islands','West Island',NULL,'Oceania','','Australian dollar','$','https://flagcdn.com/w320/cc.png','','https://goo.gl/maps/3eCdKVpVfMcZyKcK6','https://www.openstreetmap.org/relation/82636','Activo',NULL),(129,'+2125288, 125289','Western Sahara','El AaiÃºn',NULL,'Africa','','Algerian dinar, Moroccan dirham, Mauritanian ouguiya','Ø¯Ø¬, DH, UM','https://flagcdn.com/w320/eh.png','','https://goo.gl/maps/7nU3mB69vP6zQp7A8','https://www.openstreetmap.org/relation/5441968','Activo',NULL),(130,'+1767','Dominica','Roseau',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/dm.png','https://mainfacts.com/media/images/coats_of_arms/dm.png','https://goo.gl/maps/HSKdHYpFC8oHHuyV7','https://www.openstreetmap.org/relation/307823','Activo',NULL),(131,'+506','Costa Rica','San JosÃ©',NULL,'Americas','','Costa Rican colÃ³n','â?¡','https://flagcdn.com/w320/cr.png','https://mainfacts.com/media/images/coats_of_arms/cr.png','https://goo.gl/maps/RFiwytjvNrpfKN7k6','https://www.openstreetmap.org/relation/287667','Activo',NULL),(132,'+61','Australia','Canberra',NULL,'Oceania','','Australian dollar','$','https://flagcdn.com/w320/au.png','https://mainfacts.com/media/images/coats_of_arms/au.png','https://goo.gl/maps/DcjaDa7UbhnZTndH6','https://www.openstreetmap.org/relation/80500','Activo',NULL),(133,'+66','Thailand','Bangkok',NULL,'Asia','','Thai baht','à¸¿','https://flagcdn.com/w320/th.png','https://mainfacts.com/media/images/coats_of_arms/th.png','https://goo.gl/maps/qeU6uqsfW4nCCwzw9','https://www.openstreetmap.org/relation/2067731','Activo',NULL),(134,'+509','Haiti','Port-au-Prince',NULL,'Americas','','Haitian gourde','G','https://flagcdn.com/w320/ht.png','https://mainfacts.com/media/images/coats_of_arms/ht.png','https://goo.gl/maps/9o13xtjuUdqFnHbn9','https://www.openstreetmap.org/relation/307829','Activo',NULL),(135,'+688','Tuvalu','Funafuti',NULL,'Oceania','','Australian dollar, Tuvaluan dollar','$, $','https://flagcdn.com/w320/tv.png','https://mainfacts.com/media/images/coats_of_arms/tv.png','https://goo.gl/maps/LbuUxtkgm1dfN1Pn6','https://www.openstreetmap.org/relation/2177266','Activo',NULL),(136,'+504','Honduras','Tegucigalpa',NULL,'Americas','','Honduran lempira','L','https://flagcdn.com/w320/hn.png','https://mainfacts.com/media/images/coats_of_arms/hn.png','https://goo.gl/maps/BbeJK8Sk2VkMHbdF8','https://www.openstreetmap.org/relation/287670','Activo',NULL),(137,'+240','Equatorial Guinea','Malabo',NULL,'Africa','','Central African CFA franc','Fr','https://flagcdn.com/w320/gq.png','https://mainfacts.com/media/images/coats_of_arms/gq.png','https://goo.gl/maps/ucWfFd8aW1FbGMva9','https://www.openstreetmap.org/relation/192791','Activo',NULL),(138,'+1758','Saint Lucia','Castries',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/lc.png','https://mainfacts.com/media/images/coats_of_arms/lc.png','https://goo.gl/maps/4HhJ2jkPdSL9BPRcA','https://www.openstreetmap.org/relation/550728','Activo',NULL),(139,'+689','French Polynesia','PapeetÄ?',NULL,'Oceania','','CFP franc','â?£','https://flagcdn.com/w320/pf.png','https://mainfacts.com/media/images/coats_of_arms/pf.png','https://goo.gl/maps/xgg6BQTRyeQg4e1m6','https://www.openstreetmap.org/relation/3412620','Activo',NULL),(140,'+375','Belarus','Minsk',NULL,'Europe','','Belarusian ruble','Br','https://flagcdn.com/w320/by.png','https://mainfacts.com/media/images/coats_of_arms/by.png','https://goo.gl/maps/PJUDU3EBPSszCQcu6','https://www.openstreetmap.org/relation/59065','Activo',NULL),(141,'+371','Latvia','Riga',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/lv.png','https://mainfacts.com/media/images/coats_of_arms/lv.png','https://goo.gl/maps/iQpUkH7ghq31ZtXe9','https://www.openstreetmap.org/relation/72594','Activo',NULL),(142,'+680','Palau','Ngerulmud',NULL,'Oceania','','United States dollar','$','https://flagcdn.com/w320/pw.png','https://mainfacts.com/media/images/coats_of_arms/pw.png','https://goo.gl/maps/MVasQBbUkQP7qQDR9','https://www.openstreetmap.org/relation/571805','Activo',NULL),(143,'+590','Guadeloupe','Basse-Terre',NULL,'Americas','','Euro','â?¬','https://flagcdn.com/w320/gp.png','https://mainfacts.com/media/images/coats_of_arms/gp.png','https://goo.gl/maps/Dy9R2EufJtoWm8UN9','https://www.openstreetmap.org/relation/7109289','Activo',NULL),(144,'+63','Philippines','Manila',NULL,'Asia','','Philippine peso','â?±','https://flagcdn.com/w320/ph.png','https://mainfacts.com/media/images/coats_of_arms/ph.png','https://goo.gl/maps/k8T2fb5VMUfsWFX6A','https://www.openstreetmap.org/relation/443174','Activo',NULL),(145,'+350','Gibraltar','Gibraltar',NULL,'Europe','','Gibraltar pound','Â£','https://flagcdn.com/w320/gi.png','https://mainfacts.com/media/images/coats_of_arms/gi.png','https://goo.gl/maps/CEoHAs1t6byCBhHFA','https://www.openstreetmap.org/relation/1278736','Activo',NULL),(146,'+45','Denmark','Copenhagen',NULL,'Europe','','Danish krone','kr','https://flagcdn.com/w320/dk.png','https://mainfacts.com/media/images/coats_of_arms/dk.png','https://goo.gl/maps/UddGPN7hAyrtpFiT6','https://www.openstreetmap.org/relation/50046','Activo',NULL),(147,'+237','Cameroon','YaoundÃ©',NULL,'Africa','','Central African CFA franc','Fr','https://flagcdn.com/w320/cm.png','https://mainfacts.com/media/images/coats_of_arms/cm.png','https://goo.gl/maps/JqiipHgFboG3rBJh9','https://www.openstreetmap.org/relation/192830','Activo',NULL),(148,'+224','Guinea','Conakry',NULL,'Africa','','Guinean franc','Fr','https://flagcdn.com/w320/gn.png','https://mainfacts.com/media/images/coats_of_arms/gn.png','https://goo.gl/maps/8J5oM5sA4Ayr1ZYGA','https://www.openstreetmap.org/relation/192778','Activo',NULL),(149,'+973','Bahrain','Manama',NULL,'Asia','','Bahraini dinar','.Ø¯.Ø¨','https://flagcdn.com/w320/bh.png','https://mainfacts.com/media/images/coats_of_arms/bh.png','https://goo.gl/maps/5Zue99Zc6vFBHxzJ7','https://www.openstreetmap.org/relation/378734','Activo',NULL),(150,'+597','Suriname','Paramaribo',NULL,'Americas','','Surinamese dollar','$','https://flagcdn.com/w320/sr.png','https://mainfacts.com/media/images/coats_of_arms/sr.png','https://goo.gl/maps/iy7TuQLSi4qgoBoG7','https://www.openstreetmap.org/relation/287082','Activo',NULL),(151,'+243','DR Congo','Kinshasa',NULL,'Africa','','Congolese franc','FC','https://flagcdn.com/w320/cd.png','https://mainfacts.com/media/images/coats_of_arms/cd.png','https://goo.gl/maps/KfhNVn6VqdZXWu8n9','https://www.openstreetmap.org/relation/192795','Activo',NULL),(152,'+252','Somalia','Mogadishu',NULL,'Africa','','Somali shilling','Sh','https://flagcdn.com/w320/so.png','https://mainfacts.com/media/images/coats_of_arms/so.png','https://goo.gl/maps/8of8q7D1a8p7R6Fc9','https://www.openstreetmap.org/relation/192799','Activo',NULL),(153,'+420','Czechia','Prague',NULL,'Europe','','Czech koruna','KÄ','https://flagcdn.com/w320/cz.png','https://mainfacts.com/media/images/coats_of_arms/cz.png','https://goo.gl/maps/47dmgeXMZyhDHyQW8','https://www.openstreetmap.org/relation/51684','Activo',NULL),(154,'+687','New Caledonia','NoumÃ©a',NULL,'Oceania','','CFP franc','â?£','https://flagcdn.com/w320/nc.png','https://mainfacts.com/media/images/coats_of_arms/nc.png','https://goo.gl/maps/cBhtCeMdob4U7FRU9','https://www.openstreetmap.org/relation/3407643','Activo',NULL),(155,'+678','Vanuatu','Port Vila',NULL,'Oceania','','Vanuatu vatu','Vt','https://flagcdn.com/w320/vu.png','https://mainfacts.com/media/images/coats_of_arms/vu.png','https://goo.gl/maps/hwAjehcT7VfvP5zJ8','https://www.openstreetmap.org/relation/2177246','Activo',NULL),(156,'+290, 47','Saint Helena, Ascension and Tristan da Cunha','Jamestown',NULL,'Africa','','Pound sterling, Saint Helena pound','Â£, Â£','https://flagcdn.com/w320/sh.png','','https://goo.gl/maps/iv4VxnPzHkjLCJuc6','https://www.openstreetmap.org/relation/4868269#map=13/-15.9657/-5.7120','Activo',NULL),(157,'+228','Togo','LomÃ©',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/tg.png','https://mainfacts.com/media/images/coats_of_arms/tg.png','https://goo.gl/maps/jzAa9feXuXPrKVb89','https://www.openstreetmap.org/relation/192782','Activo',NULL),(158,'+1284','British Virgin Islands','Road Town',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/vg.png','https://mainfacts.com/media/images/coats_of_arms/vg.png','https://goo.gl/maps/49C9cSesNVAR9DQk8','https://www.openstreetmap.org/relation/285454','Activo',NULL),(159,'+254','Kenya','Nairobi',NULL,'Africa','','Kenyan shilling','Sh','https://flagcdn.com/w320/ke.png','https://mainfacts.com/media/images/coats_of_arms/ke.png','https://goo.gl/maps/Ni9M7wcCxf8bJHLX8','https://www.openstreetmap.org/relation/192798','Activo',NULL),(160,'+683','Niue','Alofi',NULL,'Oceania','','New Zealand dollar','$','https://flagcdn.com/w320/nu.png','','https://goo.gl/maps/xFgdzs3E55Rk1y8P9','https://www.openstreetmap.org/relation/1558556','Activo',NULL),(161,'','Heard Island and McDonald Islands','',NULL,'Antarctic','','','','https://flagcdn.com/w320/hm.png','','https://goo.gl/maps/k5FBAiVaVyozuYeA7','https://www.openstreetmap.org/relation/2177227','Activo',NULL),(162,'+250','Rwanda','Kigali',NULL,'Africa','','Rwandan franc','Fr','https://flagcdn.com/w320/rw.png','https://mainfacts.com/media/images/coats_of_arms/rw.png','https://goo.gl/maps/j5xb5r7CLqjYbyP86','https://www.openstreetmap.org/relation/171496','Activo',NULL),(163,'+372','Estonia','Tallinn',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/ee.png','https://mainfacts.com/media/images/coats_of_arms/ee.png','https://goo.gl/maps/6SsynwGUodL1sDvq8','https://www.openstreetmap.org/relation/79510','Activo',NULL),(164,'+40','Romania','Bucharest',NULL,'Europe','','Romanian leu','lei','https://flagcdn.com/w320/ro.png','https://mainfacts.com/media/images/coats_of_arms/ro.png','https://goo.gl/maps/845hAgCf1mDkN3vr7','https://www.openstreetmap.org/relation/90689','Activo',NULL),(165,'+1868','Trinidad and Tobago','Port of Spain',NULL,'Americas','','Trinidad and Tobago dollar','$','https://flagcdn.com/w320/tt.png','https://mainfacts.com/media/images/coats_of_arms/tt.png','https://goo.gl/maps/NrRfDEWoG8FGZqWY7','https://www.openstreetmap.org/relation/555717','Activo',NULL),(166,'+592','Guyana','Georgetown',NULL,'Americas','','Guyanese dollar','$','https://flagcdn.com/w320/gy.png','https://mainfacts.com/media/images/coats_of_arms/gy.png','https://goo.gl/maps/DFsme2xEeugUAsCx5','https://www.openstreetmap.org/relation/287083','Activo',NULL),(167,'+670','Timor-Leste','Dili',NULL,'Asia','','United States dollar','$','https://flagcdn.com/w320/tl.png','','https://goo.gl/maps/sFqBC9zjgUXPR1iTA','https://www.openstreetmap.org/relation/305142','Activo',NULL),(168,'+84','Vietnam','Hanoi',NULL,'Asia','','Vietnamese Ä?á»?ng','â?«','https://flagcdn.com/w320/vn.png','https://mainfacts.com/media/images/coats_of_arms/vn.png','https://goo.gl/maps/PCpVt9WzdJ9A9nEZ9','https://www.openstreetmap.org/relation/49915','Activo',NULL),(169,'+598','Uruguay','Montevideo',NULL,'Americas','','Uruguayan peso','$','https://flagcdn.com/w320/uy.png','https://mainfacts.com/media/images/coats_of_arms/uy.png','https://goo.gl/maps/tiQ9Baekb1jQtDSD9','https://www.openstreetmap.org/relation/287072','Activo',NULL),(170,'+3906698, 79','Vatican City','Vatican City',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/va.png','https://mainfacts.com/media/images/coats_of_arms/va.png','https://goo.gl/maps/DTKvw5Bd1QZaDZmE8','https://www.openstreetmap.org/relation/36989','Activo',NULL),(171,'+852','Hong Kong','City of Victoria',NULL,'Asia','','Hong Kong dollar','$','https://flagcdn.com/w320/hk.png','https://mainfacts.com/media/images/coats_of_arms/hk.png','https://goo.gl/maps/1sEnNmT47ffrC8MU8','https://www.openstreetmap.org/relation/913110','Activo',NULL),(172,'+43','Austria','Vienna',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/at.png','https://mainfacts.com/media/images/coats_of_arms/at.png','https://goo.gl/maps/pCWpWQhznHyRzQcu9','https://www.openstreetmap.org/relation/16239','Activo',NULL),(173,'+1268','Antigua and Barbuda','Saint John\'s',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/ag.png','https://mainfacts.com/media/images/coats_of_arms/ag.png','https://goo.gl/maps/fnye4wGJ1RzC9jpX9','https://www.openstreetmap.org/relation/536900','Activo',NULL),(174,'+993','Turkmenistan','Ashgabat',NULL,'Asia','','Turkmenistan manat','m','https://flagcdn.com/w320/tm.png','https://mainfacts.com/media/images/coats_of_arms/tm.png','https://goo.gl/maps/cgfUcaQHSWKuqeKk9','https://www.openstreetmap.org/relation/223026','Activo',NULL),(175,'+258','Mozambique','Maputo',NULL,'Africa','','Mozambican metical','MT','https://flagcdn.com/w320/mz.png','https://mainfacts.com/media/images/coats_of_arms/mz.png','https://goo.gl/maps/xCLcY9fzU6x4Pueu5','https://www.openstreetmap.org/relation/195273','Activo',NULL),(176,'+507','Panama','Panama City',NULL,'Americas','','Panamanian balboa, United States dollar','B/., $','https://flagcdn.com/w320/pa.png','https://mainfacts.com/media/images/coats_of_arms/pa.png','https://goo.gl/maps/sEN7sKqeawa5oPNLA','https://www.openstreetmap.org/relation/287668','Activo',NULL),(177,'+691','Micronesia','Palikir',NULL,'Oceania','','United States dollar','$','https://flagcdn.com/w320/fm.png','https://mainfacts.com/media/images/coats_of_arms/fm.png','https://goo.gl/maps/LLcnofC5LxZsJXTo8','https://www.openstreetmap.org/relation/571802','Activo',NULL),(178,'+353','Ireland','Dublin',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/ie.png','https://mainfacts.com/media/images/coats_of_arms/ie.png','https://goo.gl/maps/hxd1BKxgpchStzQC6','https://www.openstreetmap.org/relation/62273','Activo',NULL),(179,'+599','CuraÃ§ao','Willemstad',NULL,'Americas','','Netherlands Antillean guilder','Æ?','https://flagcdn.com/w320/cw.png','https://mainfacts.com/media/images/coats_of_arms/cw.png','https://goo.gl/maps/9D3hTeA3qKaRT7S16','https://www.openstreetmap.org/relation/1216719','Activo',NULL),(180,'+594','French Guiana','Cayenne',NULL,'Americas','','Euro','â?¬','https://flagcdn.com/w320/gf.png','https://mainfacts.com/media/images/coats_of_arms/gf.png','https://goo.gl/maps/NJawFwMzG7YtCrVP7','https://www.openstreetmap.org/relation/2502058','Activo',NULL),(181,'+47','Norway','Oslo',NULL,'Europe','','Norwegian krone','kr','https://flagcdn.com/w320/no.png','https://mainfacts.com/media/images/coats_of_arms/no.png','https://goo.gl/maps/htWRrphA7vNgQNdSA','https://www.openstreetmap.org/relation/2978650','Activo',NULL),(182,'+35818','Ã?land Islands','Mariehamn',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/ax.png','https://mainfacts.com/media/images/coats_of_arms/ax.png','https://goo.gl/maps/ewFb3vYsfUmVCoSb8','https://www.openstreetmap.org/relation/1650407','Activo',NULL),(183,'+236','Central African Republic','Bangui',NULL,'Africa','','Central African CFA franc','Fr','https://flagcdn.com/w320/cf.png','https://mainfacts.com/media/images/coats_of_arms/cf.png','https://goo.gl/maps/51V8dsi2rGYC9n3c9','https://www.openstreetmap.org/relation/192790','Activo',NULL),(184,'+226','Burkina Faso','Ouagadougou',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/bf.png','https://mainfacts.com/media/images/coats_of_arms/bf.png','https://goo.gl/maps/rKRmpcMbFher2ozb7','https://www.openstreetmap.org/relation/192783','Activo',NULL),(185,'+291','Eritrea','Asmara',NULL,'Africa','','Eritrean nakfa','Nfk','https://flagcdn.com/w320/er.png','https://mainfacts.com/media/images/coats_of_arms/er.png','https://goo.gl/maps/HRyqUpnPwwG6jY5j6','https://www.openstreetmap.org/relation/296961','Activo',NULL),(186,'+255','Tanzania','Dodoma',NULL,'Africa','','Tanzanian shilling','Sh','https://flagcdn.com/w320/tz.png','https://mainfacts.com/media/images/coats_of_arms/tz.png','https://goo.gl/maps/NWYMqZYXte4zGZ2Q8','https://www.openstreetmap.org/relation/195270','Activo',NULL),(187,'+82','South Korea','Seoul',NULL,'Asia','','South Korean won','â?©','https://flagcdn.com/w320/kr.png','https://mainfacts.com/media/images/coats_of_arms/kr.png','https://goo.gl/maps/7ecjaJXefjAQhxjGA','https://www.openstreetmap.org/relation/307756','Activo',NULL),(188,'+962','Jordan','Amman',NULL,'Asia','','Jordanian dinar','Ø¯.Ø§','https://flagcdn.com/w320/jo.png','https://mainfacts.com/media/images/coats_of_arms/jo.png','https://goo.gl/maps/ko1dzSDKg8Gsi9A98','https://www.openstreetmap.org/relation/184818','Activo',NULL),(189,'+222','Mauritania','Nouakchott',NULL,'Africa','','Mauritanian ouguiya','UM','https://flagcdn.com/w320/mr.png','https://mainfacts.com/media/images/coats_of_arms/mr.png','https://goo.gl/maps/im2MmQ5jFjzxWBks5','https://www.openstreetmap.org/relation/192763','Activo',NULL),(190,'+370','Lithuania','Vilnius',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/lt.png','https://mainfacts.com/media/images/coats_of_arms/lt.png','https://goo.gl/maps/dd1s9rrLjrK2G8yY6','https://www.openstreetmap.org/relation/72596','Activo',NULL),(191,'+268','United States Minor Outlying Islands','Washington DC',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/um.png','','https://goo.gl/maps/hZKnrzgeK69dDyPF8','https://www.openstreetmap.org/relation/6430384','Activo',NULL),(192,'+421','Slovakia','Bratislava',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/sk.png','https://mainfacts.com/media/images/coats_of_arms/sk.png','https://goo.gl/maps/uNSH2wW4bLoZVYJj7','https://www.openstreetmap.org/relation/14296','Activo',NULL),(193,'+244','Angola','Luanda',NULL,'Africa','','Angolan kwanza','Kz','https://flagcdn.com/w320/ao.png','https://mainfacts.com/media/images/coats_of_arms/ao.png','https://goo.gl/maps/q42Qbf1BmQL3fuZg9','https://www.openstreetmap.org/relation/195267','Activo',NULL),(194,'+76, 7','Kazakhstan','Nur-Sultan',NULL,'Asia','','Kazakhstani tenge','â?¸','https://flagcdn.com/w320/kz.png','https://mainfacts.com/media/images/coats_of_arms/kz.png','https://goo.gl/maps/8VohJGu7ShuzZYyeA','https://www.openstreetmap.org/relation/214665','Activo',NULL),(195,'+373','Moldova','ChiÈ?inÄ?u',NULL,'Europe','','Moldovan leu','L','https://flagcdn.com/w320/md.png','https://mainfacts.com/media/images/coats_of_arms/md.png','https://goo.gl/maps/JjmyUuULujnDeFPf7','https://www.openstreetmap.org/relation/58974','Activo',NULL),(196,'+223','Mali','Bamako',NULL,'Africa','','West African CFA franc','Fr','https://flagcdn.com/w320/ml.png','https://mainfacts.com/media/images/coats_of_arms/ml.png','https://goo.gl/maps/u9mYJkCB19wyuzh27','https://www.openstreetmap.org/relation/192785','Activo',NULL),(197,'+500','Falkland Islands','Stanley',NULL,'Americas','','Falkland Islands pound','Â£','https://flagcdn.com/w320/fk.png','https://mainfacts.com/media/images/coats_of_arms/fk.png','https://goo.gl/maps/TZH1x7AGanQKifNk7','https://www.openstreetmap.org/relation/2185374','Activo',NULL),(198,'+374','Armenia','Yerevan',NULL,'Asia','','Armenian dram','Ö','https://flagcdn.com/w320/am.png','https://mainfacts.com/media/images/coats_of_arms/am.png','https://goo.gl/maps/azWUtK9bUQYEyccbA','https://www.openstreetmap.org/relation/364066','Activo',NULL),(199,'+685','Samoa','Apia',NULL,'Oceania','','Samoan tÄlÄ','T','https://flagcdn.com/w320/ws.png','https://mainfacts.com/media/images/coats_of_arms/ws.png','https://goo.gl/maps/CFC9fEFP9cfkYUBF9','https://www.openstreetmap.org/relation/1872673','Activo',NULL),(200,'+44','Jersey','Saint Helier',NULL,'Europe','','British pound, Jersey pound','Â£, Â£','https://flagcdn.com/w320/je.png','https://mainfacts.com/media/images/coats_of_arms/je.png','https://goo.gl/maps/rXG8GZZtsqK92kTCA','https://www.openstreetmap.org/relation/367988','Activo',NULL),(201,'+81','Japan','Tokyo',NULL,'Asia','','Japanese yen','Â¥','https://flagcdn.com/w320/jp.png','https://mainfacts.com/media/images/coats_of_arms/jp.png','https://goo.gl/maps/NGTLSCSrA8bMrvnX9','https://www.openstreetmap.org/relation/382313','Activo',NULL),(202,'+591','Bolivia','Sucre',NULL,'Americas','','Bolivian boliviano','Bs.','https://flagcdn.com/w320/bo.png','https://mainfacts.com/media/images/coats_of_arms/bo.png','https://goo.gl/maps/9DfnyfbxNM2g5U9b9','https://www.openstreetmap.org/relation/252645','Activo',NULL),(203,'+56','Chile','Santiago',NULL,'Americas','','Chilean peso','$','https://flagcdn.com/w320/cl.png','https://mainfacts.com/media/images/coats_of_arms/cl.png','https://goo.gl/maps/XboxyNHh2fAjCPNn9','https://www.openstreetmap.org/relation/167454','Activo',NULL),(204,'+1784','Saint Vincent and the Grenadines','Kingstown',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/vc.png','https://mainfacts.com/media/images/coats_of_arms/vc.png','https://goo.gl/maps/wMbnMqjG37FMnrwf7','https://www.openstreetmap.org/relation/550725','Activo',NULL),(205,'+1441','Bermuda','Hamilton',NULL,'Americas','','Bermudian dollar','$','https://flagcdn.com/w320/bm.png','https://mainfacts.com/media/images/coats_of_arms/bm.png','https://goo.gl/maps/NLsRGNjTzDghTtAJA','https://www.openstreetmap.org/relation/1993208','Activo',NULL),(206,'+248','Seychelles','Victoria',NULL,'Africa','','Seychellois rupee','â?¨','https://flagcdn.com/w320/sc.png','https://mainfacts.com/media/images/coats_of_arms/sc.png','https://goo.gl/maps/aqCcy2TKh5TV5MAX8','https://www.openstreetmap.org/relation/536765','Activo',NULL),(207,'+246','British Indian Ocean Territory','Diego Garcia',NULL,'Africa','','United States dollar','$','https://flagcdn.com/w320/io.png','','https://goo.gl/maps/bheNucgekVEYozoi6','https://www.openstreetmap.org/relation/1993867','Activo',NULL),(208,'+502','Guatemala','Guatemala City',NULL,'Americas','','Guatemalan quetzal','Q','https://flagcdn.com/w320/gt.png','https://mainfacts.com/media/images/coats_of_arms/gt.png','https://goo.gl/maps/JoRAbem4Hxb9FYbVA','https://www.openstreetmap.org/relation/1521463','Activo',NULL),(209,'+593','Ecuador','Quito',NULL,'Americas','','United States dollar','$','https://flagcdn.com/w320/ec.png','https://mainfacts.com/media/images/coats_of_arms/ec.png','https://goo.gl/maps/TbX8hUW4gcbRPZiK7','https://www.openstreetmap.org/relation/108089','Activo',NULL),(210,'+596','Martinique','Fort-de-France',NULL,'Americas','','Euro','â?¬','https://flagcdn.com/w320/mq.png','https://mainfacts.com/media/images/coats_of_arms/mq.png','https://goo.gl/maps/87ER7sDAFU7JjcvR6','https://www.openstreetmap.org/relation/2473088','Activo',NULL),(211,'+992','Tajikistan','Dushanbe',NULL,'Asia','','Tajikistani somoni','Ð?Ð?','https://flagcdn.com/w320/tj.png','https://mainfacts.com/media/images/coats_of_arms/tj.png','https://goo.gl/maps/8rQgW88jEXijhVb58','https://www.openstreetmap.org/relation/214626','Activo',NULL),(212,'+356','Malta','Valletta',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/mt.png','https://mainfacts.com/media/images/coats_of_arms/mt.png','https://goo.gl/maps/skXCqguxDxxEKVk47','https://www.openstreetmap.org/relation/365307','Activo',NULL),(213,'+220','Gambia','Banjul',NULL,'Africa','','dalasi','D','https://flagcdn.com/w320/gm.png','https://mainfacts.com/media/images/coats_of_arms/gm.png','https://goo.gl/maps/bbGBCxxtfD2A9Z4m6','https://www.openstreetmap.org/relation/192774','Activo',NULL),(214,'+234','Nigeria','Abuja',NULL,'Africa','','Nigerian naira','â?¦','https://flagcdn.com/w320/ng.png','https://mainfacts.com/media/images/coats_of_arms/ng.png','https://goo.gl/maps/LTn417qWwBPFszuV9','https://www.openstreetmap.org/relation/192787','Activo',NULL),(215,'+1242','Bahamas','Nassau',NULL,'Americas','','Bahamian dollar, United States dollar','$, $','https://flagcdn.com/w320/bs.png','https://mainfacts.com/media/images/coats_of_arms/bs.png','https://goo.gl/maps/1YzRs1BZrG8p8pmVA','https://www.openstreetmap.org/relation/547469','Activo',NULL),(216,'+383','Kosovo','Pristina',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/xk.png','https://mainfacts.com/media/images/coats_of_arms/xk.png','https://goo.gl/maps/CSC4Yc8SWPgburuD9','https://www.openstreetmap.org/relation/2088990','Activo',NULL),(217,'+965','Kuwait','Kuwait City',NULL,'Asia','','Kuwaiti dinar','Ø¯.Ù?','https://flagcdn.com/w320/kw.png','https://mainfacts.com/media/images/coats_of_arms/kw.png','https://goo.gl/maps/aqr3aNQjS1BAvksJ7','https://www.openstreetmap.org/relation/305099','Activo',NULL),(218,'+960','Maldives','MalÃ©',NULL,'Asia','','Maldivian rufiyaa','.Þ?','https://flagcdn.com/w320/mv.png','https://mainfacts.com/media/images/coats_of_arms/mv.png','https://goo.gl/maps/MNAWGq9vEdbZ9vUV7','https://www.openstreetmap.org/relation/536773','Activo',NULL),(219,'+211','South Sudan','Juba',NULL,'Africa','','South Sudanese pound','Â£','https://flagcdn.com/w320/ss.png','https://mainfacts.com/media/images/coats_of_arms/ss.png','https://goo.gl/maps/Zm1AYCXb9HSNF1P27','https://www.openstreetmap.org/relation/1656678','Activo',NULL),(220,'+98','Iran','Tehran',NULL,'Asia','','Iranian rial','ï·¼','https://flagcdn.com/w320/ir.png','https://mainfacts.com/media/images/coats_of_arms/ir.png','https://goo.gl/maps/dMgEGuacBPGYQnjY7','https://www.openstreetmap.org/relation/304938','Activo',NULL),(221,'+355','Albania','Tirana',NULL,'Europe','','Albanian lek','L','https://flagcdn.com/w320/al.png','https://mainfacts.com/media/images/coats_of_arms/al.png','https://goo.gl/maps/BzN9cTuj68ZA8SyZ8','https://www.openstreetmap.org/relation/53292','Activo',NULL),(222,'+55','Brazil','BrasÃ­lia',NULL,'Americas','','Brazilian real','R$','https://flagcdn.com/w320/br.png','https://mainfacts.com/media/images/coats_of_arms/br.png','https://goo.gl/maps/waCKk21HeeqFzkNC9','https://www.openstreetmap.org/relation/59470','Activo',NULL),(223,'+381','Serbia','Belgrade',NULL,'Europe','','Serbian dinar','Ð´Ð¸Ð½.','https://flagcdn.com/w320/rs.png','https://mainfacts.com/media/images/coats_of_arms/rs.png','https://goo.gl/maps/2Aqof7aV2Naq8YEK8','https://www.openstreetmap.org/relation/1741311','Activo',NULL),(224,'+501','Belize','Belmopan',NULL,'Americas','','Belize dollar','$','https://flagcdn.com/w320/bz.png','https://mainfacts.com/media/images/coats_of_arms/bz.png','https://goo.gl/maps/jdCccpdLodm1uTmo9','https://www.openstreetmap.org/relation/287827','Activo',NULL),(225,'+95','Myanmar','Naypyidaw',NULL,'Asia','','Burmese kyat','Ks','https://flagcdn.com/w320/mm.png','https://mainfacts.com/media/images/coats_of_arms/mm.png','https://goo.gl/maps/4jrZyJkDERUfHyp26','https://www.openstreetmap.org/relation/50371','Activo',NULL),(226,'+975','Bhutan','Thimphu',NULL,'Asia','','Bhutanese ngultrum, Indian rupee','Nu., â?¹','https://flagcdn.com/w320/bt.png','https://mainfacts.com/media/images/coats_of_arms/bt.png','https://goo.gl/maps/VEfXXBftTFLUpNgp8','https://www.openstreetmap.org/relation/184629','Activo',NULL),(227,'+58','Venezuela','Caracas',NULL,'Americas','','Venezuelan bolÃ­var soberano','Bs.S.','https://flagcdn.com/w320/ve.png','https://mainfacts.com/media/images/coats_of_arms/ve.png','https://goo.gl/maps/KLCwDN8sec7z2kse9','https://www.openstreetmap.org/relation/272644','Activo',NULL),(228,'+231','Liberia','Monrovia',NULL,'Africa','','Liberian dollar','$','https://flagcdn.com/w320/lr.png','https://mainfacts.com/media/images/coats_of_arms/lr.png','https://goo.gl/maps/4VsHsc2oeGeRL3wg6','https://www.openstreetmap.org/relation/192780','Activo',NULL),(229,'+1876','Jamaica','Kingston',NULL,'Americas','','Jamaican dollar','$','https://flagcdn.com/w320/jm.png','https://mainfacts.com/media/images/coats_of_arms/jm.png','https://goo.gl/maps/Z8mQ6jxnRQKFwJy9A','https://www.openstreetmap.org/relation/555017','Activo',NULL),(230,'+48','Poland','Warsaw',NULL,'Europe','','Polish zÅ?oty','zÅ?','https://flagcdn.com/w320/pl.png','https://mainfacts.com/media/images/coats_of_arms/pl.png','https://goo.gl/maps/gY9Xw4Sf4415P4949','https://www.openstreetmap.org/relation/49715','Activo',NULL),(231,'+1345','Cayman Islands','George Town',NULL,'Americas','','Cayman Islands dollar','$','https://flagcdn.com/w320/ky.png','https://mainfacts.com/media/images/coats_of_arms/ky.png','https://goo.gl/maps/P3ZVXX3LH63t91hL8','https://www.openstreetmap.org/relation/7269765','Activo',NULL),(232,'+673','Brunei','Bandar Seri Begawan',NULL,'Asia','','Brunei dollar, Singapore dollar','$, $','https://flagcdn.com/w320/bn.png','https://mainfacts.com/media/images/coats_of_arms/bn.png','https://goo.gl/maps/4jb4CqBXhr8vNh579','https://www.openstreetmap.org/relation/2103120','Activo',NULL),(233,'+269','Comoros','Moroni',NULL,'Africa','','Comorian franc','Fr','https://flagcdn.com/w320/km.png','https://mainfacts.com/media/images/coats_of_arms/km.png','https://goo.gl/maps/eas4GP28C1GyStnu6','https://www.openstreetmap.org/relation/535790','Activo',NULL),(234,'+1671','Guam','HagÃ¥tÃ±a',NULL,'Oceania','','United States dollar','$','https://flagcdn.com/w320/gu.png','https://mainfacts.com/media/images/coats_of_arms/gu.png','https://goo.gl/maps/Xfnq2i279b18cH3C9','https://www.openstreetmap.org/relation/306001','Activo',NULL),(235,'+676','Tonga','Nuku\'alofa',NULL,'Oceania','','Tongan paÊ»anga','T$','https://flagcdn.com/w320/to.png','https://mainfacts.com/media/images/coats_of_arms/to.png','https://goo.gl/maps/p5YALBY2QdEzswRo7','https://www.openstreetmap.org/relation/2186665','Activo',NULL),(236,'+686','Kiribati','South Tarawa',NULL,'Oceania','','Australian dollar, Kiribati dollar','$, $','https://flagcdn.com/w320/ki.png','https://mainfacts.com/media/images/coats_of_arms/ki.png','https://goo.gl/maps/NBfYvrndW4skAimw9','https://www.openstreetmap.org/relation/571178','Activo',NULL),(237,'+233','Ghana','Accra',NULL,'Africa','','Ghanaian cedi','â?µ','https://flagcdn.com/w320/gh.png','https://mainfacts.com/media/images/coats_of_arms/gh.png','https://goo.gl/maps/Avy5RSmdsXFBaiXq8','https://www.openstreetmap.org/relation/192781','Activo',NULL),(238,'+235','Chad','N\'Djamena',NULL,'Africa','','Central African CFA franc','Fr','https://flagcdn.com/w320/td.png','https://mainfacts.com/media/images/coats_of_arms/td.png','https://goo.gl/maps/ziUdAZ8skuNfx5Hx7','https://www.openstreetmap.org/relation/2361304','Activo',NULL),(239,'+263','Zimbabwe','Harare',NULL,'Africa','','Zimbabwean dollar','$','https://flagcdn.com/w320/zw.png','https://mainfacts.com/media/images/coats_of_arms/zw.png','https://goo.gl/maps/M26BqdwQctqxXS65A','https://www.openstreetmap.org/relation/195272','Activo',NULL),(240,'+590','Saint Martin','Marigot',NULL,'Americas','','Euro','â?¬','https://flagcdn.com/w320/mf.png','','https://goo.gl/maps/P9ho9QuJ9EAR28JEA','https://www.openstreetmap.org/relation/63064','Activo',NULL),(241,'+976','Mongolia','Ulan Bator',NULL,'Asia','','Mongolian tÃ¶grÃ¶g','â?®','https://flagcdn.com/w320/mn.png','https://mainfacts.com/media/images/coats_of_arms/mn.png','https://goo.gl/maps/A1X7bMCKThBDNjzH6','https://www.openstreetmap.org/relation/161033','Activo',NULL),(242,'+351','Portugal','Lisbon',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/pt.png','https://mainfacts.com/media/images/coats_of_arms/pt.png','https://goo.gl/maps/BaTBSyc4GWMmbAKB8','https://www.openstreetmap.org/relation/295480','Activo',NULL),(243,'+1684','American Samoa','Pago Pago',NULL,'Oceania','','United States dollar','$','https://flagcdn.com/w320/as.png','','https://goo.gl/maps/Re9ePMjwP1sFCBFA6','https://www.openstreetmap.org/relation/2177187','Activo',NULL),(244,'+242','Republic of the Congo','Brazzaville',NULL,'Africa','','Central African CFA franc','Fr','https://flagcdn.com/w320/cg.png','','https://goo.gl/maps/Phf5dDDKdfCtuBTb6','https://www.openstreetmap.org/relation/192794','Activo',NULL),(245,'+32','Belgium','Brussels',NULL,'Europe','','Euro','â?¬','https://flagcdn.com/w320/be.png','https://mainfacts.com/media/images/coats_of_arms/be.png','https://goo.gl/maps/UQQzat85TCtPRXAL8','https://www.openstreetmap.org/relation/52411','Activo',NULL),(246,'+972','Israel','Jerusalem',NULL,'Asia','','Israeli new shekel','â?ª','https://flagcdn.com/w320/il.png','https://mainfacts.com/media/images/coats_of_arms/il.png','https://goo.gl/maps/6UY1AH8XeafVwdC97','https://www.openstreetmap.org/relation/1473946','Activo',NULL),(247,'+64','New Zealand','Wellington',NULL,'Oceania','','New Zealand dollar','$','https://flagcdn.com/w320/nz.png','https://mainfacts.com/media/images/coats_of_arms/nz.png','https://goo.gl/maps/xXiDQo65dwdpw9iu8','https://www.openstreetmap.org/relation/556706#map=5/-46.710/172.046','Activo',NULL),(248,'+505','Nicaragua','Managua',NULL,'Americas','','Nicaraguan cÃ³rdoba','C$','https://flagcdn.com/w320/ni.png','https://mainfacts.com/media/images/coats_of_arms/ni.png','https://goo.gl/maps/P77LaEVkKJKXneRC6','https://www.openstreetmap.org/relation/287666','Activo',NULL),(249,'+1264','Anguilla','The Valley',NULL,'Americas','','Eastern Caribbean dollar','$','https://flagcdn.com/w320/ai.png','https://mainfacts.com/media/images/coats_of_arms/ai.png','https://goo.gl/maps/3KgLnEyN7amdno2p9','https://www.openstreetmap.org/relation/2177161','Activo',NULL);
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamento` INT PRIMARY KEY AUTO_INCREMENT COMMENT 'id unico',
  `departamento` varchar(50) NOT NULL COMMENT 'nombre del departamento',
  `idPais` int NOT NULL COMMENT 'llave foranea',
  KEY `idPais1` (`idPais`),
  CONSTRAINT `Pais.Departamento` FOREIGN KEY (`idPais`) REFERENCES `pais` (`idPais`) ON DELETE CASCADE ON UPDATE CASCADE
);
LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'AMAZONAS',42),(2,'ANCASH',42),(3,'APURIMAC',42),(4,'AREQUIPA',42),(5,'AYACUCHO',42),(6,'CAJAMARCA',42),(7,'CUSCO',42),(8,'HUANCAVELICA',42),(9,'HUANUCO',42),(10,'ICA',42),(11,'JUNIN',42),(12,'LA LIBERTAD',42),(13,'LAMBAYEQUE',42),(14,'LIMA',42),(15,'LORETO',42),(16,'MADRE DE DIOS',42),(17,'MOQUEGUA',42),(18,'PASCO',42),(19,'PIURA',42),(20,'PUNO',42),(21,'SAN MARTIN',42),(22,'TACNA',42),(23,'TUMBES',42),(24,'UCAYALI',42);
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `provincia`
--

CREATE TABLE `provincia` (
  `idProvincia` INT PRIMARY KEY AUTO_INCREMENT,
  `provincia` varchar(50) NOT NULL COMMENT 'nombre de provincia',
  `idDepartamento` int NOT NULL COMMENT 'llave foranea',
  KEY `idDepartamento1` (`idDepartamento`),
  CONSTRAINT `Provincia.Departamento` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
);
LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,'BAGUA',1),(2,'BONGARA',1),(3,'CHACHAPOYAS',1),(4,'CONDORCANQUI',1),(5,'LUYA',1),(6,'RODRIGUEZ DE MENDOZA',1),(7,'UTCUBAMBA',1),(8,'AIJA',2),(9,'ANTONIO RAYMONDI',2),(10,'ASUNCION',2),(11,'BOLOGNESI',2),(12,'CARHUAZ',2),(13,'CARLOS F.FITZCARRALD',2),(14,'CASMA',2),(15,'CORONGO',2),(16,'HUARAZ',2),(17,'HUARI',2),(18,'HUARMEY',2),(19,'HUAYLAS',2),(20,'MARISCAL LUZURIAGA',2),(21,'OCROS',2),(22,'PALLASCA',2),(23,'POMABAMBA',2),(24,'RECUAY',2),(25,'SANTA',2),(26,'SIHUAS',2),(27,'YUNGAY',2),(28,'ABANCAY',3),(29,'ANDAHUAYLAS',3),(30,'ANTABAMBA',3),(31,'AYMARAES',3),(32,'CHINCHEROS',3),(33,'COTABAMBAS',3),(34,'GRAU',3),(35,'AREQUIPA',4),(36,'CAMANA',4),(37,'CARAVELI',4),(38,'CASTILLA',4),(39,'CAYLLOMA',4),(40,'CONDESUYOS',4),(41,'ISLAY',4),(42,'LA UNION',4),(43,'CANGALLO',5),(44,'HUAMANGA',5),(45,'HUANCA SANCOS',5),(46,'HUANTA',5),(47,'LA MAR',5),(48,'LUCANAS',5),(49,'PARINACOCHAS',5),(50,'PAUCAR DEL SARA SARA',5),(51,'SUCRE',5),(52,'VICTOR FAJARDO',5),(53,'VILCASHUAMAN',5),(54,'CAJABAMBA',6),(55,'CAJAMARCA',6),(56,'CELENDIN',6),(57,'CHOTA',6),(58,'CONTUMAZA',6),(59,'CUTERVO',6),(60,'HUALGAYOC',6),(61,'JAEN',6),(62,'SAN IGNACIO',6),(63,'SAN MARCOS',6),(64,'SAN MIGUEL',6),(65,'SAN PABLO',6),(66,'SANTA CRUZ',6),(67,'ACOMAYO',7),(68,'ANTA',7),(69,'CALCA',7),(70,'CANAS',7),(71,'CANCHIS',7),(72,'CHUMBIVILCAS',7),(73,'CUSCO',7),(74,'ESPINAR',7),(75,'LA CONVENCION',7),(76,'PARURO',7),(77,'PAUCARTAMBO',7),(78,'QUISPICANCHI',7),(79,'URUBAMBA',7),(80,'ACOBAMBA',8),(81,'ANGARAES',8),(82,'CASTROVIRREYNA',8),(83,'CHURCAMPA',8),(84,'HUANCAVELICA',8),(85,'HUAYTARA',8),(86,'TAYACAJA',8),(87,'AMBO',9),(88,'DOS DE MAYO',9),(89,'HUACAYBAMBA',9),(90,'HUAMALIES',9),(91,'HUANUCO',9),(92,'LAURICOCHA',9),(93,'LEONCIO PRADO',9),(94,'MARAÑON',9),(95,'PACHITEA',9),(96,'PUERTO INCA',9),(97,'YAROWILCA',9),(98,'CHINCHA',10),(99,'ICA',10),(100,'NAZCA',10),(101,'PALPA',10),(102,'PISCO',10),(103,'CHANCHAMAYO',11),(104,'CHUPACA',11),(105,'CONCEPCION',11),(106,'HUANCAYO',11),(107,'JAUJA',11),(108,'JUNIN',11),(109,'SATIPO',11),(110,'TARMA',11),(111,'YAULI',11),(112,'ASCOPE',12),(113,'BOLIVAR',12),(114,'CHEPEN',12),(115,'GRAN CHIMU',12),(116,'JULCAN',12),(117,'OTUZCO',12),(118,'PACASMAYO',12),(119,'PATAZ',12),(120,'SANCHEZ CARRION',12),(121,'SANTIAGO DE CHUCO',12),(122,'TRUJILLO',12),(123,'VIRU',12),(124,'CHICLAYO',13),(125,'FERREÑAFE',13),(126,'LAMBAYEQUE',13),(127,'BARRANCA',14),(128,'CAJATAMBO',14),(129,'CALLAO',14),(130,'CANTA',14),(131,'CAÑETE',14),(132,'HUARAL',14),(133,'HUAROCHIRI',14),(134,'HUAURA',14),(135,'LIMA',14),(136,'OYON',14),(137,'YAUYOS',14),(138,'ALTO AMAZONAS',15),(139,'LORETO',15),(140,'MARISCAL R.CASTILLA',15),(141,'MAYNAS',15),(142,'REQUENA',15),(143,'UCAYALI',15),(144,'MANU',16),(145,'TAHUAMANU',16),(146,'TAMBOPATA',16),(147,'GENERAL SANCHEZ CERRO',17),(148,'ILO',17),(149,'MARISCAL NIETO',17),(150,'DANIEL ALCIDES CARRION',18),(151,'OXAPAMPA',18),(152,'PASCO',18),(153,'AYABACA',19),(154,'HUANCABAMBA',19),(155,'MORROPON',19),(156,'PAITA',19),(157,'PIURA',19),(158,'SECHURA',19),(159,'SULLANA',19),(160,'TALARA',19),(161,'AZANGARO',20),(162,'CARABAYA',20),(163,'CHUCUITO',20),(164,'EL COLLAO',20),(165,'HUANCANE',20),(166,'LAMPA',20),(167,'MELGAR',20),(168,'MOHO',20),(169,'PUNO',20),(170,'SAN ANTONIO DE PUTINA',20),(171,'SAN ROMAN',20),(172,'SANDIA',20),(173,'YUNGUYO',20),(174,'BELLAVISTA',21),(175,'EL DORADO',21),(176,'HUALLAGA',21),(177,'LAMAS',21),(178,'MARISCAL CACERES',21),(179,'MOYOBAMBA',21),(180,'PICOTA',21),(181,'RIOJA',21),(182,'SAN MARTIN',21),(183,'TOCACHE',21),(184,'CANDARAVE',22),(185,'JORGE BASADRE',22),(186,'TACNA',22),(187,'TARATA',22),(188,'CONTRALMIRANTE VILLAR',23),(189,'TUMBES',23),(190,'ZARUMILLA',23),(191,'ATALAYA',24),(192,'CORONEL PORTILLO',24),(193,'PADRE ABAD',24),(194,'PURUS',24);
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `distrito`
--

CREATE TABLE `distrito` (
  `idDistrito` INT PRIMARY KEY AUTO_INCREMENT COMMENT 'id unico',
  `distrito` varchar(50) NOT NULL COMMENT 'nombre de distrito',
  `idProvincia` int NOT NULL COMMENT 'llave foranea',
  KEY `idProvincia1` (`idProvincia`),
  CONSTRAINT `Provincia.Distrito` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`) ON DELETE CASCADE ON UPDATE CASCADE
);
LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES (1,'ARAMANGO',1),(2,'COPALLIN',1),(3,'EL PARCO',1),(4,'IMAZA',1),(5,'LA PECA',1),(6,'CHISQUILLA',2),(7,'CHURUJA',2),(8,'COROSHA',2),(9,'CUISPES',2),(10,'FLORIDA',2),(11,'JAZAN',2),(12,'JUMBILLA',2),(13,'RECTA',2),(14,'SAN CARLOS',2),(15,'SHIPASBAMBA',2),(16,'VALERA',2),(17,'YAMBRASBAMBA',2),(18,'ASUNCION',3),(19,'BALSAS',3),(20,'CHACHAPOYAS',3),(21,'CHETO',3),(22,'CHILIQUIN',3),(23,'CHUQUIBAMBA',3),(24,'GRANADA',3),(25,'HUANCAS',3),(26,'LA JALCA',3),(27,'LEIMEBAMBA',3),(28,'LEVANTO',3),(29,'MAGDALENA',3),(30,'MARISCAL CASTILLA',3),(31,'MOLINOPAMPA',3),(32,'MONTEVIDEO',3),(33,'OLLEROS',3),(34,'QUINJALCA',3),(35,'SAN FRANCISCO DE DAGUAS',3),(36,'SAN ISIDRO DE MAINO',3),(37,'SOLOCO',3),(38,'SONCHE',3),(39,'EL CENEPA',4),(40,'NIEVA',4),(41,'RIO SANTIAGO',4),(42,'CAMPORREDONDO',5),(43,'COCABAMBA',5),(44,'COLCAMAR',5),(45,'CONILA',5),(46,'INGUILPATA',5),(47,'LAMUD',5),(48,'LONGUITA',5),(49,'LONYA CHICO',5),(50,'LUYA',5),(51,'LUYA VIEJO',5),(52,'MARIA',5),(53,'OCALLI',5),(54,'OCUMAL',5),(55,'PISUQUIA',5),(56,'PROVIDENCIA',5),(57,'SAN CRISTOBAL',5),(58,'SAN FRANCISCO DEL YESO',5),(59,'SAN JERONIMO',5),(60,'SAN JUAN DE LOPECANCHA',5),(61,'SANTA CATALINA',5),(62,'SANTO TOMAS',5),(63,'TINGO',5),(64,'TRITA',5),(65,'CHIRIMOTO',6),(66,'COCHAMAL',6),(67,'HUAMBO',6),(68,'LIMABAMBA',6),(69,'LONGAR',6),(70,'MARISCAL BENAVIDES',6),(71,'MILPUC',6),(72,'OMIA',6),(73,'SAN NICOLAS',6),(74,'SANTA ROSA',6),(75,'TOTORA',6),(76,'VISTA ALEGRE',6),(77,'BAGUA GRANDE',7),(78,'CAJARURO',7),(79,'CUMBA',7),(80,'EL MILAGRO',7),(81,'JAMALCA',7),(82,'LONYA GRANDE',7),(83,'YAMON',7),(84,'AIJA',8),(85,'CORIS',8),(86,'HUACLLAN',8),(87,'LA MERCED',8),(88,'SUCCHA',8),(89,'ACZO',9),(90,'CHACCHO',9),(91,'CHINGAS',9),(92,'LLAMELLIN',9),(93,'MIRGAS',9),(94,'SAN JUAN DE RONTOY',9),(95,'ACOCHACA',10),(96,'CHACAS',10),(97,'ABELARDO PARDO LEZAMETA',11),(98,'ANTONIO RAYMONDI',11),(99,'AQUIA',11),(100,'CAJACAY',11),(101,'CANIS',11),(102,'CHIQUIAN',11),(103,'COLQUIOC',11),(104,'HUALLANCA',11),(105,'HUASTA',11),(106,'HUAYLLACAYAN',11),(107,'LA PRIMAVERA',11),(108,'MANGAS',11),(109,'PACLLON',11),(110,'SAN MIGUEL DE CORPANQUI',11),(111,'TICLLOS',11),(112,'ACOPAMPA',12),(113,'AMASHCA',12),(114,'ANTA',12),(115,'ATAQUERO',12),(116,'CARHUAZ',12),(117,'MARCARA',12),(118,'PARIAHUANCA',12),(119,'SAN MIGUEL DE ACO',12),(120,'SHILLA',12),(121,'TINCO',12),(122,'YUNGAR',12),(123,'SAN LUIS',13),(124,'SAN NICOLAS',13),(125,'YAUYA',13),(126,'BUENA VISTA ALTA',14),(127,'CASMA',14),(128,'COMANDANTE NOEL',14),(129,'YAUTAN',14),(130,'ACO',15),(131,'BAMBAS',15),(132,'CORONGO',15),(133,'CUSCA',15),(134,'LA PAMPA',15),(135,'YANAC',15),(136,'YUPAN',15),(137,'COCHABAMBA',16),(138,'COLCABAMBA',16),(139,'HUANCHAY',16),(140,'HUARAZ',16),(141,'INDEPENDENCIA',16),(142,'JANGAS',16),(143,'LA LIBERTAD',16),(144,'OLLEROS',16),(145,'PAMPAS',16),(146,'PARIACOTO',16),(147,'PIRA',16),(148,'TARICA',16),(149,'ANRA',17),(150,'CAJAY',17),(151,'CHAVIN DE HUANTAR',17),(152,'HUACACHI',17),(153,'HUACCHIS',17),(154,'HUACHIS',17),(155,'HUANTAR',17),(156,'HUARI',17),(157,'MASIN',17),(158,'PAUCAS',17),(159,'PONTO',17),(160,'RAHUAPAMPA',17),(161,'RAPAYAN',17),(162,'SAN MARCOS',17),(163,'SAN PEDRO DE CHANA',17),(164,'UCO',17),(165,'COCHAPETI',18),(166,'CULEBRAS',18),(167,'HUARMEY',18),(168,'HUAYAN',18),(169,'MALVAS',18),(170,'CARAZ',19),(171,'HUALLANCA',19),(172,'HUATA',19),(173,'HUAYLAS',19),(174,'MATO',19),(175,'PAMPAROMAS',19),(176,'PUEBLO LIBRE',19),(177,'SANTA CRUZ',19),(178,'SANTO TORIBIO',19),(179,'YURACMARCA',19),(180,'CASCA',20),(181,'ELEAZAR GUZMAN BARRON',20),(182,'FIDEL OLIVAS ESCUDERO',20),(183,'LLAMA',20),(184,'LLUMPA',20),(185,'LUCMA',20),(186,'MUSGA',20),(187,'PISCOBAMBA',20),(188,'ACAS',21),(189,'CAJAMARQUILLA',21),(190,'CARHUAPAMPA',21),(191,'COCHAS',21),(192,'CONGAS',21),(193,'LLIPA',21),(194,'OCROS',21),(195,'SAN CRISTOBAL DE RAJAN',21),(196,'SAN PEDRO',21),(197,'SANTIAGO DE CHILCAS',21),(198,'BOLOGNESI',22),(199,'CABANA',22),(200,'CONCHUCOS',22),(201,'HUACASCHUQUE',22),(202,'HUANDOVAL',22),(203,'LACABAMBA',22),(204,'LLAPO',22),(205,'PALLASCA',22),(206,'PAMPAS',22),(207,'SANTA ROSA',22),(208,'TAUCA',22),(209,'HUAYLLAN',23),(210,'PAROBAMBA',23),(211,'POMABAMBA',23),(212,'QUINUABAMBA',23),(213,'CATAC',24),(214,'COTAPARACO',24),(215,'HUAYLLAPAMPA',24),(216,'LLACLLIN',24),(217,'MARCA',24),(218,'PAMPAS CHICO',24),(219,'PARARIN',24),(220,'RECUAY',24),(221,'TAPACOCHA',24),(222,'TICAPAMPA',24),(223,'CACERES DEL PERU',25),(224,'CHIMBOTE',25),(225,'COISHCO',25),(226,'MACATE',25),(227,'MORO',25),(228,'NEPEÑA',25),(229,'NUEVO CHIMBOTE',25),(230,'SAMANCO',25),(231,'SANTA',25),(232,'ACOBAMBA',26),(233,'ALFONSO UGARTE',26),(234,'CASHAPAMPA',26),(235,'CHINGALPO',26),(236,'HUAYLLABAMBA',26),(237,'QUICHES',26),(238,'RAGASH',26),(239,'SAN JUAN',26),(240,'SICSIBAMBA',26),(241,'SIHUAS',26),(242,'CASCAPARA',27),(243,'MANCOS',27),(244,'MATACOTO',27),(245,'QUILLO',27),(246,'RANRAHIRCA',27),(247,'SHUPLUY',27),(248,'YANAMA',27),(249,'YUNGAY',27),(250,'ABANCAY',28),(251,'CHACOCHE',28),(252,'CIRCA',28),(253,'CURAHUASI',28),(254,'HUANIPACA',28),(255,'LAMBRAMA',28),(256,'PICHIRHUA',28),(257,'SAN PEDRO DE CACHORA',28),(258,'TAMBURCO',28),(259,'ANDAHUAYLAS',29),(260,'ANDARAPA',29),(261,'CHIARA',29),(262,'HUANCARAMA',29),(263,'HUANCARAY',29),(264,'HUAYANA',29),(265,'KAQUIABAMBA',29),(266,'KISHUARA',29),(267,'PACOBAMBA',29),(268,'PACUCHA',29),(269,'PAMPACHIRI',29),(270,'POMACOCHA',29),(271,'SAN ANTONIO DE CACHI',29),(272,'SAN JERONIMO',29),(273,'SAN MIGUEL DE CHACCRAMPA',29),(274,'SANTA MARIA DE CHICMO',29),(275,'TALAVERA',29),(276,'TUMAY HUARACA',29),(277,'TURPO',29),(278,'ANTABAMBA',30),(279,'EL ORO',30),(280,'HUAQUIRCA',30),(281,'JUAN ESPINOZA MEDRANO',30),(282,'OROPESA',30),(283,'PACHACONAS',30),(284,'SABAINO',30),(285,'CAPAYA',31),(286,'CARAYBAMBA',31),(287,'CHALHUANCA',31),(288,'CHAPIMARCA',31),(289,'COLCABAMBA',31),(290,'COTARUSE',31),(291,'HUAYLLO',31),(292,'JUSTO APU SAHUARAURA',31),(293,'LUCRE',31),(294,'POCOHUANCA',31),(295,'SAN JUAN DE CHACÑA',31),(296,'SAÑAYCA',31),(297,'SORAYA',31),(298,'TAPAIRIHUA',31),(299,'TINTAY',31),(300,'TORAYA',31),(301,'YANACA',31),(302,'ANCO-HUALLO',32),(303,'CHINCHEROS',32),(304,'COCHARCAS',32),(305,'HUACCANA',32),(306,'OCOBAMBA',32),(307,'ONGOY',32),(308,'RANRACANCHA',32),(309,'URANMARCA',32),(310,'CHALLHUAHUACHO',33),(311,'COTABAMBAS',33),(312,'COYLLURQUI',33),(313,'HAQUIRA',33),(314,'MARA',33),(315,'TAMBOBAMBA',33),(316,'CHUQUIBAMBILLA',34),(317,'CURASCO',34),(318,'CURPAHUASI',34),(319,'GAMARRA',34),(320,'HUAYLLATI',34),(321,'MAMARA',34),(322,'MICAELA BASTIDAS',34),(323,'PATAYPAMPA',34),(324,'PROGRESO',34),(325,'SAN ANTONIO',34),(326,'SANTA ROSA',34),(327,'TURPAY',34),(328,'VILCABAMBA',34),(329,'VIRUNDO',34),(330,'ALTO SELVA ALEGRE',35),(331,'AREQUIPA',35),(332,'CAYMA',35),(333,'CERRO COLORADO',35),(334,'CHARACATO',35),(335,'CHIGUATA',35),(336,'JACOBO HUNTER',35),(337,'JOSE LUIS BUSTAMANTE Y RIVERO',35),(338,'LA JOYA',35),(339,'MARIANO MELGAR',35),(340,'MIRAFLORES',35),(341,'MOLLEBAYA',35),(342,'PAUCARPATA',35),(343,'POCSI',35),(344,'POLOBAYA',35),(345,'QUEQUEÑA',35),(346,'SABANDIA',35),(347,'SACHACA',35),(348,'SAN JUAN DE SIGUAS',35),(349,'SAN JUAN DE TARUCANI',35),(350,'SANTA ISABEL DE SIGUAS',35),(351,'SANTA RITA DE SIGUAS',35),(352,'SOCABAYA',35),(353,'TIABAYA',35),(354,'UCHUMAYO',35),(355,'VITOR  1/',35),(356,'YANAHUARA',35),(357,'YARABAMBA',35),(358,'YURA',35),(359,'CAMANA',36),(360,'JOSE MARIA QUIMPER',36),(361,'MARIANO NICOLAS VALCARCEL',36),(362,'MARISCAL CACERES',36),(363,'NICOLAS DE PIEROLA',36),(364,'OCOÑA',36),(365,'QUILCA',36),(366,'SAMUEL PASTOR',36),(367,'ACARI',37),(368,'ATICO',37),(369,'ATIQUIPA',37),(370,'BELLA UNION',37),(371,'CAHUACHO',37),(372,'CARAVELI',37),(373,'CHALA',37),(374,'CHAPARRA',37),(375,'HUANUHUANU',37),(376,'JAQUI',37),(377,'LOMAS',37),(378,'QUICACHA',37),(379,'YAUCA',37),(380,'ANDAGUA',38),(381,'APLAO',38),(382,'AYO',38),(383,'CHACHAS',38),(384,'CHILCAYMARCA',38),(385,'CHOCO',38),(386,'HUANCARQUI',38),(387,'MACHAGUAY',38),(388,'ORCOPAMPA',38),(389,'PAMPACOLCA',38),(390,'TIPAN',38),(391,'UÑON',38),(392,'URACA',38),(393,'VIRACO',38),(394,'ACHOMA',39),(395,'CABANACONDE',39),(396,'CALLALLI',39),(397,'CAYLLOMA',39),(398,'CHIVAY',39),(399,'COPORAQUE',39),(400,'HUAMBO',39),(401,'HUANCA',39),(402,'ICHUPAMPA',39),(403,'LARI',39),(404,'LLUTA',39),(405,'MACA',39),(406,'MADRIGAL',39),(407,'MAJES',39),(408,'SAN ANTONIO DE CHUCA',39),(409,'SIBAYO',39),(410,'TAPAY',39),(411,'TISCO',39),(412,'TUTI',39),(413,'YANQUE',39),(414,'ANDARAY',40),(415,'CAYARANI',40),(416,'CHICHAS',40),(417,'CHUQUIBAMBA',40),(418,'IRAY',40),(419,'RIO GRANDE',40),(420,'SALAMANCA',40),(421,'YANAQUIHUA',40),(422,'COCACHACRA',41),(423,'DEAN VALDIVIA',41),(424,'ISLAY',41),(425,'MEJIA',41),(426,'MOLLENDO',41),(427,'PUNTA DE BOMBON',41),(428,'ALCA',42),(429,'CHARCANA',42),(430,'COTAHUASI',42),(431,'HUAYNACOTAS',42),(432,'PAMPAMARCA',42),(433,'PUYCA',42),(434,'QUECHUALLA',42),(435,'SAYLA',42),(436,'TAURIA',42),(437,'TOMEPAMPA',42),(438,'TORO',42),(439,'CANGALLO',43),(440,'CHUSCHI',43),(441,'LOS MOROCHUCOS',43),(442,'MARIA PARADO DE BELLIDO',43),(443,'PARAS',43),(444,'TOTOS',43),(445,'ACOCRO',44),(446,'ACOS VINCHOS',44),(447,'AYACUCHO',44),(448,'CARMEN ALTO',44),(449,'CHIARA',44),(450,'JESUS NAZARENO',44),(451,'OCROS',44),(452,'PACAYCASA',44),(453,'QUINUA',44),(454,'SAN JOSE DE TICLLAS',44),(455,'SAN JUAN BAUTISTA',44),(456,'SANTIAGO DE PISCHA',44),(457,'SOCOS',44),(458,'TAMBILLO',44),(459,'VINCHOS',44),(460,'CARAPO',45),(461,'SACSAMARCA',45),(462,'SANCOS',45),(463,'SANTIAGO DE LUCANAMARCA',45),(464,'AYAHUANCO',46),(465,'HUAMANGUILLA',46),(466,'HUANTA',46),(467,'IGUAIN',46),(468,'LLOCHEGUA',46),(469,'LURICOCHA',46),(470,'SANTILLANA',46),(471,'SIVIA',46),(472,'ANCO',47),(473,'AYNA',47),(474,'CHILCAS',47),(475,'CHUNGUI',47),(476,'LUIS CARRANZA',47),(477,'SAN MIGUEL',47),(478,'SANTA ROSA',47),(479,'TAMBO',47),(480,'AUCARA',48),(481,'CABANA',48),(482,'CARMEN SALCEDO',48),(483,'CHAVIÑA',48),(484,'CHIPAO',48),(485,'HUAC-HUAS',48),(486,'LARAMATE',48),(487,'LEONCIO PRADO',48),(488,'LLAUTA',48),(489,'LUCANAS',48),(490,'OCAÑA',48),(491,'OTOCA',48),(492,'PUQUIO',48),(493,'SAISA',48),(494,'SAN CRISTOBAL',48),(495,'SAN JUAN',48),(496,'SAN PEDRO',48),(497,'SAN PEDRO DE PALCO',48),(498,'SANCOS',48),(499,'SANTA ANA DE HUAYCAHUACHO',48),(500,'SANTA LUCIA',48),(501,'CHUMPI',49),(502,'CORACORA',49),(503,'CORONEL CASTAÑEDA',49),(504,'PACAPAUSA',49),(505,'PULLO',49),(506,'PUYUSCA',49),(507,'SAN FRANCISCO DE RAVACAYCO',49),(508,'UPAHUACHO',49),(509,'COLTA',50),(510,'CORCULLA',50),(511,'LAMPA',50),(512,'MARCABAMBA',50),(513,'OYOLO',50),(514,'PARARCA',50),(515,'PAUSA',50),(516,'SAN JAVIER DE ALPABAMBA',50),(517,'SAN JOSE DE USHUA',50),(518,'SARA SARA',50),(519,'BELEN',51),(520,'CHALCOS',51),(521,'CHILCAYOC',51),(522,'HUACAÑA',51),(523,'MORCOLLA',51),(524,'PAICO',51),(525,'QUEROBAMBA',51),(526,'SAN PEDRO DE LARCAY',51),(527,'SAN SALVADOR DE QUIJE',51),(528,'SANTIAGO DE PAUCARAY',51),(529,'SORAS',51),(530,'ALCAMENCA',52),(531,'APONGO',52),(532,'ASQUIPATA',52),(533,'CANARIA',52),(534,'CAYARA',52),(535,'COLCA',52),(536,'HUAMANQUIQUIA',52),(537,'HUANCAPI',52),(538,'HUANCARAYLLA',52),(539,'HUAYA',52),(540,'SARHUA',52),(541,'VILCANCHOS',52),(542,'ACCOMARCA',53),(543,'CARHUANCA',53),(544,'CONCEPCION',53),(545,'HUAMBALPA',53),(546,'INDEPENDENCIA',53),(547,'SAURAMA',53),(548,'VILCAS HUAMAN',53),(549,'VISCHONGO',53),(550,'CACHACHI',54),(551,'CAJABAMBA',54),(552,'CONDEBAMBA',54),(553,'SITACOCHA',54),(554,'ASUNCION',55),(555,'CAJAMARCA',55),(556,'CHETILLA',55),(557,'COSPAN',55),(558,'ENCAÑADA',55),(559,'JESUS',55),(560,'LLACANORA',55),(561,'LOS BAÑOS DEL INCA',55),(562,'MAGDALENA',55),(563,'MATARA',55),(564,'NAMORA',55),(565,'SAN JUAN',55),(566,'CELENDIN',56),(567,'CHUMUCH',56),(568,'CORTEGANA',56),(569,'HUASMIN',56),(570,'JORGE CHAVEZ',56),(571,'JOSE GALVEZ',56),(572,'LA LIBERTAD DE PALLAN',56),(573,'MIGUEL IGLESIAS',56),(574,'OXAMARCA',56),(575,'SOROCHUCO',56),(576,'SUCRE',56),(577,'UTCO',56),(578,'ANGUIA',57),(579,'CHADIN',57),(580,'CHALAMARCA',57),(581,'CHIGUIRIP',57),(582,'CHIMBAN',57),(583,'CHOROPAMPA',57),(584,'CHOTA',57),(585,'COCHABAMBA',57),(586,'CONCHAN',57),(587,'HUAMBOS',57),(588,'LAJAS',57),(589,'LLAMA',57),(590,'MIRACOSTA',57),(591,'PACCHA',57),(592,'PION',57),(593,'QUEROCOTO',57),(594,'SAN JUAN DE LICUPIS',57),(595,'TACABAMBA',57),(596,'TOCMOCHE',57),(597,'CHILETE',58),(598,'CONTUMAZA',58),(599,'CUPISNIQUE',58),(600,'GUZMANGO',58),(601,'SAN BENITO',58),(602,'SANTA CRUZ DE TOLEDO',58),(603,'TANTARICA',58),(604,'YONAN',58),(605,'CALLAYUC',59),(606,'CHOROS',59),(607,'CUJILLO',59),(608,'CUTERVO',59),(609,'LA RAMADA',59),(610,'PIMPINGOS',59),(611,'QUEROCOTILLO',59),(612,'SAN ANDRES DE CUTERVO',59),(613,'SAN JUAN DE CUTERVO',59),(614,'SAN LUIS DE LUCMA',59),(615,'SANTA CRUZ',59),(616,'SANTO TOMAS',59),(617,'SOCOTA',59),(618,'STO. DOMINGO DE LA CAPILLA',59),(619,'TORIBIO CASANOVA',59),(620,'BAMBAMARCA',60),(621,'CHUGUR',60),(622,'HUALGAYOC',60),(623,'BELLAVISTA',61),(624,'CHONTALI',61),(625,'COLASAY',61),(626,'HUABAL',61),(627,'JAEN',61),(628,'LAS PIRIAS',61),(629,'POMAHUACA',61),(630,'PUCARA',61),(631,'SALLIQUE',61),(632,'SAN FELIPE',61),(633,'SAN JOSE DEL ALTO',61),(634,'SANTA ROSA',61),(635,'CHIRINOS',62),(636,'HUARANGO',62),(637,'LA COIPA',62),(638,'NAMBALLE',62),(639,'SAN IGNACIO',62),(640,'SAN JOSE DE LOURDES',62),(641,'TABACONAS',62),(642,'CHANCAY',63),(643,'EDUARDO VILLANUEVA',63),(644,'GREGORIO PITA',63),(645,'ICHOCAN',63),(646,'JOSE MANUEL QUIROZ',63),(647,'JOSE SABOGAL',63),(648,'PEDRO GALVEZ',63),(649,'BOLIVAR',64),(650,'CALQUIS',64),(651,'CATILLUC',64),(652,'EL PRADO',64),(653,'LA FLORIDA',64),(654,'LLAPA',64),(655,'NANCHOC',64),(656,'NIEPOS',64),(657,'SAN GREGORIO',64),(658,'SAN MIGUEL',64),(659,'SAN SILVESTRE DE COCHAN',64),(660,'TONGOD',64),(661,'UNION AGUA BLANCA',64),(662,'SAN BERNARDINO',65),(663,'SAN LUIS',65),(664,'SAN PABLO',65),(665,'TUMBADEN',65),(666,'ANDABAMBA',66),(667,'CATACHE',66),(668,'CHANCAYBAÑOS',66),(669,'LA ESPERANZA',66),(670,'NINABAMBA',66),(671,'PULAN',66),(672,'SANTA CRUZ',66),(673,'SAUCEPAMPA',66),(674,'SEXI',66),(675,'UTICYACU',66),(676,'YAUYUCAN',66),(677,'ACOMAYO',67),(678,'ACOPIA',67),(679,'ACOS',67),(680,'MOSOC LLACTA',67),(681,'POMACANCHI',67),(682,'RONDOCAN',67),(683,'SANGARARA',67),(684,'ANCAHUASI',68),(685,'ANTA',68),(686,'CACHIMAYO',68),(687,'CHINCHAYPUJIO',68),(688,'HUAROCONDO',68),(689,'LIMATAMBO',68),(690,'MOLLEPATA',68),(691,'PUCYURA',68),(692,'ZURITE',68),(693,'CALCA',69),(694,'COYA',69),(695,'LAMAY',69),(696,'LARES',69),(697,'PISAC',69),(698,'SAN SALVADOR',69),(699,'TARAY',69),(700,'YANATILE',69),(701,'CHECCA',70),(702,'KUNTURKANKI',70),(703,'LANGUI',70),(704,'LAYO',70),(705,'PAMPAMARCA',70),(706,'QUEHUE',70),(707,'TUPAC AMARU',70),(708,'YANAOCA',70),(709,'CHECACUPE',71),(710,'COMBAPATA',71),(711,'MARANGANI',71),(712,'PITUMARCA',71),(713,'SAN PABLO',71),(714,'SAN PEDRO',71),(715,'SICUANI',71),(716,'TINTA',71),(717,'CAPACMARCA',72),(718,'CHAMACA',72),(719,'COLQUEMARCA',72),(720,'LIVITACA',72),(721,'LLUSCO',72),(722,'QUIÑOTA',72),(723,'SANTO TOMAS',72),(724,'VELILLE',72),(725,'CCORCA',73),(726,'CUSCO',73),(727,'POROY',73),(728,'SAN JERONIMO',73),(729,'SAN SEBASTIAN',73),(730,'SANTIAGO',73),(731,'SAYLLA',73),(732,'WANCHAQ',73),(733,'ALTO PICHIGUA',74),(734,'CONDOROMA',74),(735,'COPORAQUE',74),(736,'ESPINAR',74),(737,'OCORURO',74),(738,'PALLPATA',74),(739,'PICHIGUA',74),(740,'SUYCKUTAMBO',74),(741,'ECHARATE',75),(742,'HUAYOPATA',75),(743,'MARANURA',75),(744,'OCOBAMBA',75),(745,'PICHARI',75),(746,'QUELLOUNO',75),(747,'QUIMBIRI',75),(748,'SANTA ANA',75),(749,'SANTA TERESA',75),(750,'VILCABAMBA',75),(751,'ACCHA',76),(752,'CCAPI',76),(753,'COLCHA',76),(754,'HUANOQUITE',76),(755,'OMACHA',76),(756,'PACCARITAMBO',76),(757,'PARURO',76),(758,'PILLPINTO',76),(759,'YAURISQUE',76),(760,'CAICAY',77),(761,'CHALLABAMBA',77),(762,'COLQUEPATA',77),(763,'HUANCARANI',77),(764,'KOSÑIPATA',77),(765,'PAUCARTAMBO',77),(766,'ANDAHUAYLILLAS',78),(767,'CAMANTI',78),(768,'CCARHUAYO',78),(769,'CCATCA',78),(770,'CUSIPATA',78),(771,'HUARO',78),(772,'LUCRE',78),(773,'MARCAPATA',78),(774,'OCONGATE',78),(775,'OROPESA',78),(776,'QUIQUIJANA',78),(777,'URCOS',78),(778,'CHINCHERO',79),(779,'HUAYLLABAMBA',79),(780,'MACHUPICCHU',79),(781,'MARAS',79),(782,'OLLANTAYTAMBO',79),(783,'URUBAMBA',79),(784,'YUCAY',79),(785,'ACOBAMBA',80),(786,'ANDABAMBA',80),(787,'ANTA',80),(788,'CAJA',80),(789,'MARCAS',80),(790,'PAUCARA',80),(791,'POMACOCHA',80),(792,'ROSARIO',80),(793,'ANCHONGA',81),(794,'CALLANMARCA',81),(795,'CCOCHACCASA',81),(796,'CHINCHO',81),(797,'CONGALLA',81),(798,'HUANCA-HUANCA',81),(799,'HUAYLLAY GRANDE',81),(800,'JULCAMARCA',81),(801,'LIRCAY',81),(802,'SAN ANTONIO DE ANTAPARCO',81),(803,'SANTO TOMAS DE PATA',81),(804,'SECCLLA',81),(805,'ARMA',82),(806,'AURAHUA',82),(807,'CAPILLAS',82),(808,'CASTROVIRREYNA',82),(809,'CHUPAMARCA',82),(810,'COCAS',82),(811,'HUACHOS',82),(812,'HUAMATAMBO',82),(813,'MOLLEPAMPA',82),(814,'SAN JUAN',82),(815,'SANTA ANA',82),(816,'TANTARA',82),(817,'TICRAPO',82),(818,'ANCO',83),(819,'CHINCHIHUASI',83),(820,'CHURCAMPA',83),(821,'EL CARMEN',83),(822,'LA MERCED',83),(823,'LOCROJA',83),(824,'PACHAMARCA',83),(825,'PAUCARBAMBA',83),(826,'SAN MIGUEL DE MAYOCC',83),(827,'SAN PEDRO DE CORIS',83),(828,'ACOBAMBILLA',84),(829,'ACORIA',84),(830,'ASCENCION',84),(831,'CONAYCA',84),(832,'CUENCA',84),(833,'HUACHOCOLPA',84),(834,'HUANCAVELICA',84),(835,'HUANDO',84),(836,'HUANDO',84),(837,'HUAYLLAHUARA',84),(838,'IZCUCHACA',84),(839,'LARIA',84),(840,'MANTA',84),(841,'MARISCAL CACERES',84),(842,'MOYA',84),(843,'NUEVO OCCORO',84),(844,'PALCA',84),(845,'PILCHACA',84),(846,'VILCA',84),(847,'YAULI',84),(848,'AYAVI',85),(849,'CORDOVA',85),(850,'HUAYACUNDO ARMA',85),(851,'HUAYTARA',85),(852,'LARAMARCA',85),(853,'OCOYO',85),(854,'PILPICHACA',85),(855,'QUERCO',85),(856,'QUITO-ARMA',85),(857,'SAN ANTONIO DE CUSICANCHA',85),(858,'SAN FSCO. DE SANGAYAICO',85),(859,'SAN ISIDRO',85),(860,'SANTIAGO DE CHOCORVOS',85),(861,'SANTIAGO DE QUIRAHUARA',85),(862,'SANTO DOMINGO DE CAPILLAS',85),(863,'TAMBO',85),(864,'ACOSTAMBO',86),(865,'ACRAQUIA',86),(866,'AHUAYCHA',86),(867,'COLCABAMBA',86),(868,'DANIEL HERNANDEZ',86),(869,'HUACHOCOLPA',86),(870,'HUARIBAMBA',86),(871,'PAMPAS',86),(872,'PAZOS',86),(873,'QUISHUAR',86),(874,'SALCABAMBA',86),(875,'SALCAHUASI',86),(876,'SAN MARCOS DE ROCCHAC',86),(877,'SURCUBAMBA',86),(878,'TINTAY PUNCU',86),(879,'YAHUIMPUQUIO',86),(880,'AMBO',87),(881,'CAYNA',87),(882,'COLPAS',87),(883,'CONCHAMARCA',87),(884,'HUACAR',87),(885,'SAN FRANCISCO',87),(886,'SAN RAFAEL',87),(887,'TOMAYQUICHUA',87),(888,'CHUQUIS',88),(889,'LA UNION',88),(890,'MARIAS',88),(891,'PACHAS',88),(892,'QUIVILLA',88),(893,'RIPAN',88),(894,'SHUNQUI',88),(895,'SILLAPATA',88),(896,'YANAS',88),(897,'CANCHABAMBA',89),(898,'COCHABAMBA',89),(899,'HUACAYBAMBA',89),(900,'PINRA',89),(901,'ARANCAY',90),(902,'CHAVIN DE PARIARCA',90),(903,'JACAS GRANDE',90),(904,'JIRCAN',90),(905,'LLATA',90),(906,'MIRAFLORES',90),(907,'MONZON',90),(908,'PUNCHAO',90),(909,'PUÑOS',90),(910,'SINGA',90),(911,'TANTAMAYO',90),(912,'AMARILIS',91),(913,'CHINCHAO',91),(914,'CHURUBAMBA',91),(915,'HUANUCO',91),(916,'MARGOS',91),(917,'PILCOMARCA',91),(918,'QUISQUI',91),(919,'SAN FRANCISCO DE CAYRAN',91),(920,'SAN PEDRO DE CHAULAN',91),(921,'SANTA MARIA DEL VALLE',91),(922,'YARUMAYO',91),(923,'BAÑOS',92),(924,'JESUS',92),(925,'JIVIA',92),(926,'QUEROPALCA',92),(927,'RONDOS',92),(928,'SAN FRANCISCO DE ASIS',92),(929,'SAN MIGUEL DE CAURI',92),(930,'DANIEL ALOMIA  ROBLES',93),(931,'HERMILIO VALDIZAN',93),(932,'JOSE CRESPO Y CASTILLO',93),(933,'LUYANDO',93),(934,'MARIANO DAMASO BERAUN',93),(935,'RUPA-RUPA',93),(936,'CHOLON',94),(937,'HUACRACHUCO',94),(938,'SAN BUENAVENTURA',94),(939,'CHAGLLA',95),(940,'MOLINO',95),(941,'PANAO',95),(942,'UMARI',95),(943,'CODO DEL POZUZO',96),(944,'HONORIA',96),(945,'PUERTO INCA',96),(946,'TOURNAVISTA',96),(947,'YUYAPICHIS',96),(948,'APARICIO POMARES',97),(949,'CAHUAC',97),(950,'CHACABAMBA',97),(951,'CHAVINILLO',97),(952,'CHORAS',97),(953,'JACAS CHICO',97),(954,'OBAS',97),(955,'PAMPAMARCA',97),(956,'ALTO LARAN',98),(957,'CHAVIN',98),(958,'CHINCHA ALTA',98),(959,'CHINCHA BAJA',98),(960,'EL CARMEN',98),(961,'GROCIO PRADO',98),(962,'PUEBLO NUEVO',98),(963,'SAN JUAN DE YANAC',98),(964,'SAN PEDRO DE HUACARPANA',98),(965,'SUNAMPE',98),(966,'TAMBO DE MORA',98),(967,'ICA',99),(968,'LA TINGUIÑA',99),(969,'LOS AQUIJES',99),(970,'OCUCAJE',99),(971,'PACHACUTEC',99),(972,'PARCONA',99),(973,'PUEBLO NUEVO',99),(974,'SALAS',99),(975,'SAN JOSE DE LOS MOLINOS',99),(976,'SAN JUAN BAUTISTA',99),(977,'SANTIAGO',99),(978,'SUBTANJALLA',99),(979,'TATE',99),(980,'YAUCA DEL ROSARIO',99),(981,'CHANGUILLO',100),(982,'EL INGENIO',100),(983,'MARCONA',100),(984,'NAZCA',100),(985,'VISTA ALEGRE',100),(986,'LLIPATA',101),(987,'PALPA',101),(988,'RIO GRANDE',101),(989,'SANTA CRUZ',101),(990,'TIBILLO',101),(991,'HUANCANO',102),(992,'HUMAY',102),(993,'INDEPENDENCIA',102),(994,'PARACAS',102),(995,'PISCO',102),(996,'SAN ANDRES',102),(997,'SAN CLEMENTE',102),(998,'TUPAC AMARU INCA',102),(999,'CHANCHAMAYO',103),(1000,'PERENE',103),(1001,'PICHANAQUI',103),(1002,'SAN LUIS DE SHUARO',103),(1003,'SAN RAMON',103),(1004,'VITOC',103),(1005,'AHUAC',104),(1006,'CHONGOS BAJO',104),(1007,'CHUPACA',104),(1008,'HUACHAC',104),(1009,'HUAMANCACA CHICO',104),(1010,'SAN JUAN DE ISCOS',104),(1011,'SAN JUAN DE JARPA',104),(1012,'TRES DE DICIEMBRE',104),(1013,'YANACANCHA',104),(1014,'ACO',105),(1015,'ANDAMARCA',105),(1016,'CHAMBARA',105),(1017,'COCHAS',105),(1018,'COMAS',105),(1019,'CONCEPCION',105),(1020,'HEROINAS TOLEDO',105),(1021,'MANZANARES',105),(1022,'MARISCAL CASTILLA',105),(1023,'MATAHUASI',105),(1024,'MITO',105),(1025,'NUEVE DE JULIO',105),(1026,'ORCOTUNA',105),(1027,'SAN JOSE DE QUERO',105),(1028,'SANTA ROSA DE OCOPA',105),(1029,'CARHUACALLANGA',106),(1030,'CHACAPAMPA',106),(1031,'CHICCHE',106),(1032,'CHILCA',106),(1033,'CHONGOS ALTO',106),(1034,'CHUPURO',106),(1035,'COLCA',106),(1036,'CULLHUAS',106),(1037,'EL TAMBO',106),(1038,'HUACRAPUQUIO',106),(1039,'HUALHUAS',106),(1040,'HUANCAN',106),(1041,'HUANCAYO',106),(1042,'HUASICANCHA',106),(1043,'HUAYUCACHI',106),(1044,'INGENIO',106),(1045,'PARIAHUANCA',106),(1046,'PILCOMAYO',106),(1047,'PUCARA',106),(1048,'QUICHUAY',106),(1049,'QUILCAS',106),(1050,'SAN AGUSTIN',106),(1051,'SAN JERONIMO DE TUNAN',106),(1052,'SANTO DOMINGO DE ACOBAMBA',106),(1053,'SAÑO',106),(1054,'SAPALLANGA',106),(1055,'SICAYA',106),(1056,'VIQUES',106),(1057,'ACOLLA',107),(1058,'APATA',107),(1059,'ATAURA',107),(1060,'CANCHAYLLO',107),(1061,'CURICACA',107),(1062,'EL MANTARO',107),(1063,'HUAMALI',107),(1064,'HUARIPAMPA',107),(1065,'HUERTAS',107),(1066,'JANJAILLO',107),(1067,'JAUJA',107),(1068,'JULCAN',107),(1069,'LEONOR ORDOÑEZ',107),(1070,'LLOCLLAPAMPA',107),(1071,'MARCO',107),(1072,'MASMA',107),(1073,'MASMA CHICCHE',107),(1074,'MOLINOS',107),(1075,'MONOBAMBA',107),(1076,'MUQUI',107),(1077,'MUQUIYAUYO',107),(1078,'PACA',107),(1079,'PACCHA',107),(1080,'PANCAN',107),(1081,'PARCO',107),(1082,'POMACANCHA',107),(1083,'RICRAN',107),(1084,'SAN LORENZO',107),(1085,'SAN PEDRO DE CHUNAN',107),(1086,'SAUSA',107),(1087,'SINCOS',107),(1088,'TUNAN MARCA',107),(1089,'YAULI',107),(1090,'YAUYOS',107),(1091,'CARHUAMAYO',108),(1092,'JUNIN',108),(1093,'ONDORES',108),(1094,'ULCUMAYO',108),(1095,'COVIRIALI',109),(1096,'LLAYLLA',109),(1097,'MAZAMARI',109),(1098,'PAMPA HERMOSA',109),(1099,'PANGOA',109),(1100,'RIO NEGRO',109),(1101,'RIO TAMBO',109),(1102,'SATIPO',109),(1103,'ACOBAMBA',110),(1104,'HUARICOLCA',110),(1105,'HUASAHUASI',110),(1106,'LA UNION',110),(1107,'PALCA',110),(1108,'PALCAMAYO',110),(1109,'SAN PEDRO DE CAJAS',110),(1110,'TAPO',110),(1111,'TARMA',110),(1112,'CHACAPALPA',111),(1113,'HUAY-HUAY',111),(1114,'LA OROYA',111),(1115,'MARCAPOMACOCHA',111),(1116,'MOROCOCHA',111),(1117,'PACCHA',111),(1118,'SANTA ROSA DE SACCO',111),(1119,'STA. BARBARA DE CARHUACAYAN',111),(1120,'SUITUCANCHA',111),(1121,'YAULI',111),(1122,'ASCOPE',112),(1123,'CASA GRANDE',112),(1124,'CHICAMA',112),(1125,'CHOCOPE',112),(1126,'MAGDALENA DE CAO',112),(1127,'PAIJAN',112),(1128,'RAZURI',112),(1129,'SANTIAGO DE CAO',112),(1130,'BAMBAMARCA',113),(1131,'BOLIVAR',113),(1132,'CONDORMARCA',113),(1133,'LONGOTEA',113),(1134,'UCHUMARCA',113),(1135,'UCUNCHA',113),(1136,'CHEPEN',114),(1137,'PACANGA',114),(1138,'PUEBLO NUEVO',114),(1139,'CASCAS',115),(1140,'LUCMA',115),(1141,'MARMOT',115),(1142,'SAYAPULLO',115),(1143,'CALAMARCA',116),(1144,'CARABAMBA',116),(1145,'HUASO',116),(1146,'JULCAN',116),(1147,'AGALLPAMPA',117),(1148,'CHARAT',117),(1149,'HUARANCHAL',117),(1150,'LA CUESTA',117),(1151,'MACHE',117),(1152,'OTUZCO',117),(1153,'PARANDAY',117),(1154,'SALPO',117),(1155,'SINSICAP',117),(1156,'USQUIL',117),(1157,'GUADALUPE',118),(1158,'JEQUETEPEQUE',118),(1159,'PACASMAYO',118),(1160,'SAN JOSE',118),(1161,'SAN PEDRO DE LLOC',118),(1162,'BULDIBUYO',119),(1163,'CHILLIA',119),(1164,'HUANCASPATA',119),(1165,'HUAYLILLAS',119),(1166,'HUAYO',119),(1167,'ONGON',119),(1168,'PARCOY',119),(1169,'PATAZ',119),(1170,'PIAS',119),(1171,'SANTIAGO DE CHALLAS',119),(1172,'TAURIJA',119),(1173,'TAYABAMBA',119),(1174,'URPAY',119),(1175,'CHUGAY',120),(1176,'COCHORCO',120),(1177,'CURGOS',120),(1178,'HUAMACHUCO',120),(1179,'MARCABAL',120),(1180,'SANAGORAN',120),(1181,'SARIN',120),(1182,'SARTIMBAMBA',120),(1183,'ANGASMARCA',121),(1184,'CACHICADAN',121),(1185,'MOLLEBAMBA',121),(1186,'MOLLEPATA',121),(1187,'QUIRUVILCA',121),(1188,'SANTA CRUZ DE CHUCA',121),(1189,'SANTIAGO DE CHUCO',121),(1190,'SITABAMBA',121),(1191,'EL PORVENIR',122),(1192,'FLORENCIA DE MORA',122),(1193,'HUANCHACO',122),(1194,'LA ESPERANZA',122),(1195,'LAREDO',122),(1196,'MOCHE',122),(1197,'POROTO',122),(1198,'SALAVERRY',122),(1199,'SIMBAL',122),(1200,'TRUJILLO',122),(1201,'VICTOR LARCO HERRERA',122),(1202,'CHAO',123),(1203,'GUADALUPITO',123),(1204,'VIRU',123),(1205,'CAYALTI',124),(1206,'CHICLAYO',124),(1207,'CHONGOYAPE',124),(1208,'ETEN',124),(1209,'ETEN PUERTO',124),(1210,'JOSE LEONARDO ORTIZ',124),(1211,'LA VICTORIA',124),(1212,'LAGUNAS',124),(1213,'MONSEFU',124),(1214,'NUEVA ARICA',124),(1215,'OYOTUN',124),(1216,'PATAPO',124),(1217,'PICSI',124),(1218,'PIMENTEL',124),(1219,'POMALCA',124),(1220,'PUCALA',124),(1221,'REQUE',124),(1222,'SANTA ROSA',124),(1223,'SAÑA',124),(1224,'TUMAN',124),(1225,'CANARIS',125),(1226,'FERRENAFE',125),(1227,'INCAHUASI',125),(1228,'MANUEL A. MESONES MURO',125),(1229,'PITIPO',125),(1230,'PUEBLO NUEVO',125),(1231,'CHOCHOPE',126),(1232,'ILLIMO',126),(1233,'JAYANCA',126),(1234,'LAMBAYEQUE',126),(1235,'MOCHUMI',126),(1236,'MORROPE',126),(1237,'MOTUPE',126),(1238,'OLMOS',126),(1239,'PACORA',126),(1240,'SALAS',126),(1241,'SAN JOSE',126),(1242,'TUCUME',126),(1243,'BARRANCA',127),(1244,'PARAMONGA',127),(1245,'PATIVILCA',127),(1246,'SUPE',127),(1247,'SUPE PUERTO',127),(1248,'CAJATAMBO',128),(1249,'COPA',128),(1250,'GORGOR',128),(1251,'HUANCAPON',128),(1252,'MANAS',128),(1253,'BELLAVISTA',129),(1254,'CALLAO',129),(1255,'CARMEN DE LA LEGUA  REYNOSO',129),(1256,'LA PERLA',129),(1257,'LA PUNTA',129),(1258,'VENTANILLA',129),(1259,'ARAHUAY',130),(1260,'CANTA',130),(1261,'HUAMANTANGA',130),(1262,'HUAROS',130),(1263,'LACHAQUI',130),(1264,'SAN BUENAVENTURA',130),(1265,'SANTA ROSA DE QUIVES',130),(1266,'ASIA',131),(1267,'CALANGO',131),(1268,'CERRO AZUL',131),(1269,'CHILCA',131),(1270,'COAYLLO',131),(1271,'IMPERIAL',131),(1272,'LUNAHUANA',131),(1273,'MALA',131),(1274,'NUEVO IMPERIAL',131),(1275,'PACARAN',131),(1276,'QUILMANA',131),(1277,'SAN ANTONIO',131),(1278,'SAN LUIS',131),(1279,'SAN VICENTE DE CAÑETE',131),(1280,'SANTA CRUZ DE FLORES',131),(1281,'ZUÑIGA',131),(1282,'ATAVILLOS ALTO',132),(1283,'ATAVILLOS BAJO',132),(1284,'AUCALLAMA',132),(1285,'CHANCAY',132),(1286,'HUARAL',132),(1287,'IHUARI',132),(1288,'LAMPIAN',132),(1289,'PACARAOS',132),(1290,'SAN MIGUEL DE ACOS',132),(1291,'SANTA CRUZ DE ANDAMARCA',132),(1292,'SUMBILCA',132),(1293,'VEINTISIETE DE NOVIEMBRE',132),(1294,'ANTIOQUIA',133),(1295,'CALLAHUANCA',133),(1296,'CARAMPOMA',133),(1297,'CHICLA',133),(1298,'CUENCA',133),(1299,'HUACHUPAMPA',133),(1300,'HUANZA',133),(1301,'HUAROCHIRI',133),(1302,'LAHUAYTAMBO',133),(1303,'LANGA',133),(1304,'LARAOS',133),(1305,'MARIATANA',133),(1306,'MATUCANA',133),(1307,'RICARDO PALMA',133),(1308,'SAN ANDRES DE TUPICOCHA',133),(1309,'SAN ANTONIO',133),(1310,'SAN BARTOLOME',133),(1311,'SAN DAMIAN',133),(1312,'SAN JUAN DE IRIS',133),(1313,'SAN JUAN DE TANTARANCHE',133),(1314,'SAN LORENZO DE QUINTI',133),(1315,'SAN MATEO',133),(1316,'SAN MATEO DE OTAO',133),(1317,'SAN PEDRO DE CASTA',133),(1318,'SAN PEDRO DE HUANCAYRE',133),(1319,'SANGALLAYA',133),(1320,'SANTA CRUZ DE COCACHACRA',133),(1321,'SANTA EULALIA',133),(1322,'SANTIAGO DE ANCHUCAYA',133),(1323,'SANTIAGO DE TUNA',133),(1324,'STO. DMGO. DE LOS OLLEROS',133),(1325,'SURCO',133),(1326,'AMBAR',134),(1327,'CALETA DE CARQUIN',134),(1328,'CHECRAS',134),(1329,'HUACHO',134),(1330,'HUALMAY',134),(1331,'HUAURA',134),(1332,'LEONCIO PRADO',134),(1333,'PACCHO',134),(1334,'SANTA LEONOR',134),(1335,'SANTA MARIA',134),(1336,'SAYAN',134),(1337,'VEGUETA',134),(1338,'ANCON',135),(1339,'ATE',135),(1340,'BARRANCO',135),(1341,'BREÑA',135),(1342,'CARABAYLLO',135),(1343,'CHACLACAYO',135),(1344,'CHORRILLOS',135),(1345,'CIENEGUILLA',135),(1346,'COMAS',135),(1347,'EL AGUSTINO',135),(1348,'INDEPENDENCIA',135),(1349,'JESUS MARIA',135),(1350,'LA MOLINA',135),(1351,'LA VICTORIA',135),(1352,'LIMA',135),(1353,'LINCE',135),(1354,'LOS OLIVOS',135),(1355,'LURIGANCHO',135),(1356,'LURIN',135),(1357,'MAGDALENA DEL MAR',135),(1358,'MAGDALENA VIEJA',135),(1359,'MIRAFLORES',135),(1360,'PACHACAMAC',135),(1361,'PUCUSANA',135),(1362,'PUENTE PIEDRA',135),(1363,'PUNTA HERMOSA',135),(1364,'PUNTA NEGRA',135),(1365,'RIMAC',135),(1366,'SAN BARTOLO',135),(1367,'SAN BORJA',135),(1368,'SAN ISIDRO',135),(1369,'SAN JUAN DE LURIGANCHO',135),(1370,'SAN JUAN DE MIRAFLORES',135),(1371,'SAN LUIS',135),(1372,'SAN MARTIN DE PORRES',135),(1373,'SAN MIGUEL',135),(1374,'SANTA ANITA',135),(1375,'SANTA MARIA DEL MAR',135),(1376,'SANTA ROSA',135),(1377,'SANTIAGO DE SURCO',135),(1378,'SURQUILLO',135),(1379,'VILLA EL SALVADOR',135),(1380,'VILLA MARIA DEL TRIUNFO',135),(1381,'ANDAJES',136),(1382,'CAUJUL',136),(1383,'COCHAMARCA',136),(1384,'NAVAN',136),(1385,'OYON',136),(1386,'PACHANGARA',136),(1387,'ALIS',137),(1388,'AYAUCA',137),(1389,'AYAVIRI',137),(1390,'AZANGARO',137),(1391,'CACRA',137),(1392,'CARANIA',137),(1393,'CATAHUASI',137),(1394,'CHOCOS',137),(1395,'COCHAS',137),(1396,'COLONIA',137),(1397,'HONGOS',137),(1398,'HUAMPARA',137),(1399,'HUANCAYA',137),(1400,'HUANGASCAR',137),(1401,'HUANTAN',137),(1402,'HUAYEC',137),(1403,'LARAOS',137),(1404,'LINCHA',137),(1405,'MADEAN',137),(1406,'MIRAFLORES',137),(1407,'OMAS',137),(1408,'PUTINZA',137),(1409,'QUINCHES',137),(1410,'QUINOCAY',137),(1411,'SAN JOAQUIN',137),(1412,'SAN PEDRO DE PILAS',137),(1413,'TANTA',137),(1414,'TAURIPAMPA',137),(1415,'TOMAS',137),(1416,'TUPE',137),(1417,'VIÑAC',137),(1418,'VITIS',137),(1419,'YAUYOS',137),(1420,'BALSAPUERTO',138),(1421,'BARRANCA',138),(1422,'CAHUAPANAS',138),(1423,'JEBEROS',138),(1424,'LAGUNAS',138),(1425,'MANSERICHE',138),(1426,'MORONA',138),(1427,'PASTAZA',138),(1428,'SANTA CRUZ',138),(1429,'TENIENTE CESAR LOPEZ ROJAS',138),(1430,'YURIMAGUAS',138),(1431,'NAUTA',139),(1432,'PARINARI',139),(1433,'TIGRE',139),(1434,'TROMPETEROS',139),(1435,'URARINAS',139),(1436,'PEBAS',140),(1437,'RAMON CASTILLA',140),(1438,'SAN PABLO',140),(1439,'YAVARI',140),(1440,'ALTO NANAY',141),(1441,'BELEN',141),(1442,'FERNANDO LORES',141),(1443,'INDIANA',141),(1444,'IQUITOS',141),(1445,'LAS AMAZONAS',141),(1446,'MAZAN',141),(1447,'NAPO',141),(1448,'PUNCHANA',141),(1449,'PUTUMAYO',141),(1450,'SAN JUAN BAUTISTA',141),(1451,'TORRES CAUSANA',141),(1452,'ALTO TAPICHE',142),(1453,'CAPELO',142),(1454,'EMILIO SAN MARTIN',142),(1455,'JENARO HERRERA',142),(1456,'MAQUIA',142),(1457,'PUINAHUA',142),(1458,'REQUENA',142),(1459,'SAQUENA',142),(1460,'SOPLIN',142),(1461,'TAPICHE',142),(1462,'YAQUERANA',142),(1463,'YAQUERANA',142),(1464,'CONTAMANA',143),(1465,'INAHUAYA',143),(1466,'PADRE MARQUEZ',143),(1467,'PAMPA HERMOSA',143),(1468,'SARAYACU',143),(1469,'VARGAS GUERRA',143),(1470,'FITZCARRALD',144),(1471,'HUEPETUCHE',144),(1472,'MADRE DE DIOS',144),(1473,'MANU',144),(1474,'IBERIA',145),(1475,'IÑAPARI',145),(1476,'TAHUAMANU',145),(1477,'INAMBARI',146),(1478,'LABERINTO',146),(1479,'LAS PIEDRAS',146),(1480,'TAMBOPATA',146),(1481,'CHOJATA',147),(1482,'COALAQUE',147),(1483,'ICHUYA',147),(1484,'LA CAPILLA',147),(1485,'LLOQUE',147),(1486,'MATALAQUE',147),(1487,'OMATE',147),(1488,'PUQUINA',147),(1489,'QUINISTAQUILLAS',147),(1490,'UBINAS',147),(1491,'YUNGA',147),(1492,'EL ALGARROBAL',148),(1493,'ILO',148),(1494,'PACOCHA',148),(1495,'CARUMAS',149),(1496,'CUCHUMBAYA',149),(1497,'MOQUEGUA',149),(1498,'SAMEGUA',149),(1499,'SAN CRISTOBAL',149),(1500,'TORATA',149),(1501,'CHACAYAN',150),(1502,'GOYLLARISQUIZGA',150),(1503,'PAUCAR',150),(1504,'SAN PEDRO DE PILLAO',150),(1505,'SANTA ANA DE TUSI',150),(1506,'TAPUC',150),(1507,'VILCABAMBA',150),(1508,'YANAHUANCA',150),(1509,'CHONTABAMBA',151),(1510,'HUANCABAMBA',151),(1511,'OXAPAMPA',151),(1512,'PALCAZU',151),(1513,'POZUZO',151),(1514,'PUERTO BERMUDEZ',151),(1515,'VILLA RICA',151),(1516,'CHAUPIMARCA',152),(1517,'HUACHON',152),(1518,'HUARIACA',152),(1519,'HUAYLLAY',152),(1520,'NINACACA',152),(1521,'PALLANCHACRA',152),(1522,'PAUCARTAMBO',152),(1523,'SAN FCO.DE ASIS DE YARUSYACAN',152),(1524,'SIMON BOLIVAR',152),(1525,'TICLACAYAN',152),(1526,'TINYAHUARCO',152),(1527,'VICCO',152),(1528,'YANACANCHA',152),(1529,'AYABACA',153),(1530,'FRIAS',153),(1531,'JILILI',153),(1532,'LAGUNAS',153),(1533,'MONTERO',153),(1534,'PACAIPAMPA',153),(1535,'PAIMAS',153),(1536,'SAPILLICA',153),(1537,'SICCHEZ',153),(1538,'SUYO',153),(1539,'CANCHAQUE',154),(1540,'EL CARMEN DE LA FRONTERA',154),(1541,'HUANCABAMBA',154),(1542,'HUARMACA',154),(1543,'LALAQUIZ',154),(1544,'SAN MIGUEL DE EL FAIQUE',154),(1545,'SONDOR',154),(1546,'SONDORILLO',154),(1547,'BUENOS AIRES',155),(1548,'CHALACO',155),(1549,'CHULUCANAS',155),(1550,'LA MATANZA',155),(1551,'MORROPON',155),(1552,'SALITRAL',155),(1553,'SAN JUAN DE BIGOTE',155),(1554,'SANTA CATALINA DE MOSSA',155),(1555,'SANTO DOMINGO',155),(1556,'YAMANGO',155),(1557,'AMOTAPE',156),(1558,'ARENAL',156),(1559,'COLAN',156),(1560,'LA HUACA',156),(1561,'PAITA',156),(1562,'TAMARINDO',156),(1563,'VICHAYAL',156),(1564,'CASTILLA',157),(1565,'CATACAOS',157),(1566,'CURA MORI',157),(1567,'EL TALLAN',157),(1568,'LA ARENA',157),(1569,'LA UNION',157),(1570,'LAS LOMAS',157),(1571,'PIURA',157),(1572,'TAMBO GRANDE',157),(1573,'BELLAVISTA DE LA UNION',158),(1574,'BERNAL',158),(1575,'CRISTO NOS VALGA',158),(1576,'RINCONADA LLICUAR',158),(1577,'SECHURA',158),(1578,'VICE',158),(1579,'BELLAVISTA',159),(1580,'IGNACIO ESCUDERO',159),(1581,'LANCONES',159),(1582,'MARCAVELICA',159),(1583,'MIGUEL CHECA',159),(1584,'QUERECOTILLO',159),(1585,'SALITRAL',159),(1586,'SULLANA',159),(1587,'EL ALTO',160),(1588,'LA BREA',160),(1589,'LOBITOS',160),(1590,'LOS ORGANOS',160),(1591,'MANCORA',160),(1592,'PARIÑAS',160),(1593,'ACHAYA',161),(1594,'ARAPA',161),(1595,'ASILLO',161),(1596,'AZANGARO',161),(1597,'CAMINACA',161),(1598,'CHUPA',161),(1599,'JOSE D. CHOQUEHUANCA',161),(1600,'MUYANI',161),(1601,'POTONI',161),(1602,'SAMAN',161),(1603,'SAN ANTON',161),(1604,'SAN JOSE',161),(1605,'SAN JUAN DE SALINAS',161),(1606,'SANTIAGO DE PUPUJA',161),(1607,'TIRAPATA',161),(1608,'AJOYANI',162),(1609,'AYAPATA',162),(1610,'COASA',162),(1611,'CORANI',162),(1612,'CRUCERO',162),(1613,'ITUATA',162),(1614,'MACUSANI',162),(1615,'OLLACHEA',162),(1616,'SAN GABAN',162),(1617,'USICAYOS',162),(1618,'DESAGUADERO',163),(1619,'HUACULLANI',163),(1620,'JULI',163),(1621,'KELLUYO',163),(1622,'PISACOMA',163),(1623,'POMATA',163),(1624,'ZEPITA',163),(1625,'CAPAZO',164),(1626,'CONDURIRI',164),(1627,'ILAVE',164),(1628,'PILCUYO',164),(1629,'SANTA ROSA',164),(1630,'COJATA',165),(1631,'HUANCANE',165),(1632,'HUATASANI',165),(1633,'INCHUPALLA',165),(1634,'PUSI',165),(1635,'ROSASPATA',165),(1636,'TARACO',165),(1637,'VILQUE CHICO',165),(1638,'CABANILLA',166),(1639,'CALAPUJA',166),(1640,'LAMPA',166),(1641,'NICASIO',166),(1642,'OCUVIRI',166),(1643,'PALCA',166),(1644,'PARATIA',166),(1645,'PUCARA',166),(1646,'SANTA LUCIA',166),(1647,'VILAVILA',166),(1648,'ANTAUTA',167),(1649,'AYAVIRI',167),(1650,'CUPI',167),(1651,'LLALLI',167),(1652,'MACARI',167),(1653,'NUYOA',167),(1654,'ORURILLO',167),(1655,'SANTA ROSA',167),(1656,'UMACHIRI',167),(1657,'CONIMA',168),(1658,'HUAYRAPATA',168),(1659,'MOHO',168),(1660,'TILALI',168),(1661,'ACORA',169),(1662,'AMANTANI',169),(1663,'ATUNCOLLA',169),(1664,'CAPACHICA',169),(1665,'CHUCUITO',169),(1666,'COATA',169),(1667,'HUATA',169),(1668,'MAYAZO',169),(1669,'PAUCARCOLLA',169),(1670,'PICHACANI',169),(1671,'PLATERIA',169),(1672,'PUNO',169),(1673,'SAN ANTONIO',169),(1674,'TIQUILLACA',169),(1675,'VILQUE',169),(1676,'ANANEA',170),(1677,'PEDRO VILCA APAZA',170),(1678,'PUTINA',170),(1679,'QUILCAPUNCU',170),(1680,'SINA',170),(1681,'CABANA',171),(1682,'CABANILLAS',171),(1683,'CARACOTO',171),(1684,'JULIACA',171),(1685,'ALTO INAMBARI',172),(1686,'CUYOCUYO',172),(1687,'LIMBANI',172),(1688,'PATAMBUCO',172),(1689,'PHARA',172),(1690,'QUIACA',172),(1691,'SAN JUAN DEL ORO',172),(1692,'SANDIA',172),(1693,'YANAHUAYA',172),(1694,'ANAPIA',173),(1695,'COPANI',173),(1696,'CUTURAPI',173),(1697,'OLLARAYA',173),(1698,'TINICACHI',173),(1699,'UNICACHI',173),(1700,'YUNGUYO',173),(1701,'ALTO BIAVO',174),(1702,'BAJO BIAVO',174),(1703,'BELLAVISTA',174),(1704,'HUALLAGA',174),(1705,'SAN PABLO',174),(1706,'SAN RAFAEL',174),(1707,'AGUA BLANCA',175),(1708,'SAN JOSE DE SISA',175),(1709,'SAN MARTIN',175),(1710,'SANTA ROSA',175),(1711,'SHATOJA',175),(1712,'ALTO SAPOSOA',176),(1713,'EL ESLABON',176),(1714,'PISCOYACU',176),(1715,'SACANCHE',176),(1716,'SAPOSOA',176),(1717,'TINGO DE SAPOSOA',176),(1718,'ALONSO DE ALVARADO',177),(1719,'BARRANQUITA',177),(1720,'CAYNARACHI',177),(1721,'CUÑUMBUQUI',177),(1722,'LAMAS',177),(1723,'PINTO RECODO',177),(1724,'RUMISAPA',177),(1725,'SAN ROQUE DE CUMBAZA',177),(1726,'SHANAO',177),(1727,'TABALOSOS',177),(1728,'ZAPATERO',177),(1729,'CAMPANILLA',178),(1730,'HUICUNGO',178),(1731,'JUANJUI',178),(1732,'PACHIZA',178),(1733,'PAJARILLO',178),(1734,'CALZADA',179),(1735,'HABANA',179),(1736,'JEPELACIO',179),(1737,'MOYOBAMBA',179),(1738,'SORITOR',179),(1739,'YANTALO',179),(1740,'BUENOS AIRES',180),(1741,'CASPISAPA',180),(1742,'PICOTA',180),(1743,'PILLUANA',180),(1744,'PUCACACA',180),(1745,'SAN CRISTOBAL',180),(1746,'SAN HILARION',180),(1747,'SHAMBOYACU',180),(1748,'TINGO DE PONASA',180),(1749,'TRES UNIDOS',180),(1750,'AWAJUN',181),(1751,'ELIAS SOPLIN VARGAS',181),(1752,'NUEVA CAJAMARCA',181),(1753,'PARDO MIGUEL',181),(1754,'POSIC',181),(1755,'RIOJA',181),(1756,'SAN FERNANDO',181),(1757,'YORONGOS',181),(1758,'YURACYACU',181),(1759,'ALBERTO LEVEAU',182),(1760,'CACATACHI',182),(1761,'CHAZUTA',182),(1762,'CHIPURANA',182),(1763,'EL PORVENIR',182),(1764,'HUIMBAYOC',182),(1765,'JUAN GUERRA',182),(1766,'LA BANDA DE SHILCAYO',182),(1767,'MORALES',182),(1768,'PAPAPLAYA',182),(1769,'SAN ANTONIO',182),(1770,'SAUCE',182),(1771,'SHAPAJA',182),(1772,'TARAPOTO',182),(1773,'NUEVO PROGRESO',183),(1774,'POLVORA',183),(1775,'SHUNTE',183),(1776,'TOCACHE',183),(1777,'UCHIZA',183),(1778,'CAIRANI',184),(1779,'CAMILACA',184),(1780,'CANDARAVE',184),(1781,'CURIBAYA',184),(1782,'HUANUARA',184),(1783,'QUILAHUANI',184),(1784,'ILABAYA',185),(1785,'ITE',185),(1786,'LOCUMBA',185),(1787,'ALTO DE LA ALIANZA',186),(1788,'CALANA',186),(1789,'CIUDAD NUEVA',186),(1790,'GREGORIO ALBARRACIN LANCHIPA',186),(1791,'INCLAN',186),(1792,'PACHIA',186),(1793,'PALCA',186),(1794,'POCOLLAY',186),(1795,'SAMA',186),(1796,'TACNA',186),(1797,'ESTIQUE',187),(1798,'ESTIQUE-PAMPA',187),(1799,'HEROES ALBARRACIN',187),(1800,'SITAJARA',187),(1801,'SUSAPAYA',187),(1802,'TARATA',187),(1803,'TARUCACHI',187),(1804,'TICACO',187),(1805,'CASITAS',188),(1806,'ZORRITOS',188),(1807,'CORRALES',189),(1808,'LA CRUZ',189),(1809,'PAMPAS DE HOSPITAL',189),(1810,'SAN JACINTO',189),(1811,'SAN JUAN DE LA VIRGEN',189),(1812,'TUMBES',189),(1813,'AGUAS VERDES',190),(1814,'MATAPALO',190),(1815,'PAPAYAL',190),(1816,'ZARUMILLA',190),(1817,'RAYMONDI',191),(1818,'SEPAHUA',191),(1819,'TAHUANIA',191),(1820,'YURUA',191),(1821,'CALLERIA',192),(1822,'CAMPOVERDE',192),(1823,'IPARIA',192),(1824,'MASISEA',192),(1825,'NUEVA REQUENA',192),(1826,'YARINACOCHA',192),(1827,'CURIMANA',193),(1828,'IRAZOLA',193),(1829,'PADRE ABAD',193),(1830,'PURUS',194);
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;


CREATE TABLE `tipo_palabraclave` (
  `IdTipoPalabraClave` INT PRIMARY KEY AUTO_INCREMENT,
  `NombreTipo` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `tipo_palabraclave` VALUES (1,'Artista Favorita','Activo',NULL,NULL),(2,'Musica Favirita','Activo',NULL,NULL),(3,'Deporte Favorito','Activo',NULL,NULL),(4,'Color Favorito','Activo','2024-04-05 21:14:26','2024-04-05 21:14:26');

CREATE TABLE `tipodoc` (
  `IdTipoDoc` INT PRIMARY KEY AUTO_INCREMENT,
  `TipoDoc` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `tipodoc` VALUES (1,'Carnet Extranjeria','Activo','2024-03-27 05:45:29','2024-03-22 05:45:29'),(2,'Documento Nacional de Identidad','Activo','2024-03-28 05:47:44','2024-03-12 05:47:44'),(3,'Registro Unico de Contribuyente','Activo','2024-03-12 05:48:12','2024-03-18 05:48:12'),(4,'Otro Documento','Activo','2024-03-24 10:30:00',NULL);

CREATE TABLE `tipoempresa` (
  `IdTipoEmpresa` INT PRIMARY KEY AUTO_INCREMENT,
  `TipoEmpresa` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `tipoempresa` VALUES (1,'Privada','Activo','2024-03-21 15:29:42','2024-03-15 15:21:42'),(2,'Publica','Activo','2024-03-28 15:22:03','2024-03-22 15:22:03');

CREATE TABLE `tipomoneda` (
  `IdTipoMoneda` INT PRIMARY KEY AUTO_INCREMENT,
  `NombreMoneda` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `tipomoneda` VALUES (1,'Sol - PEN','Activo','2024-04-17 22:42:14','2024-04-17 22:42:14');

CREATE TABLE `tipopago` (
  `IdTipoPago` INT PRIMARY KEY AUTO_INCREMENT,
  `NombreTipoPago` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `tipopago` VALUES (1,'Diario','Activo','2024-04-17 22:42:43','2024-04-17 22:42:43'),(2,'Semanal','Activo','2024-04-17 22:42:43','2024-04-17 22:42:43'),(3,'Mensual','Activo','2024-04-17 22:43:25','2024-04-17 22:43:25');

CREATE TABLE `tipoprestamo` (
  `IdTipoPrestamo` INT PRIMARY KEY AUTO_INCREMENT,
  `NombrePrestamo` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `tipoprestamo` VALUES (1,'Efectivo','Activo','2024-04-17 22:45:57','2024-04-17 22:45:57'),(2,'Yape','Activo','2024-04-17 22:46:13','2024-04-17 22:46:13');

CREATE TABLE `tiporecovery` (
  `IdTipoRecovey` INT PRIMARY KEY AUTO_INCREMENT,
  `TipoRecovey` varchar(500) DEFAULT NULL
);
INSERT INTO `tiporecovery` VALUES (1,'Color Favorito'),(2,'Música Favorita'),(3,'Animal Favorito'),(4,'Deporte Favorito');


CREATE TABLE `_accion` (
  `IdAccion` INT PRIMARY KEY AUTO_INCREMENT,
  `NombreAccion` varchar(800) DEFAULT NULL,
  `Descripcion` varchar(800) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT 'Activo',
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `_accion` VALUES (1,'CREATE','registro nuevo','Activo',NULL,NULL),(2,'READ','vista de los registros','Activo',NULL,NULL),(3,'UPDATE','Editar o actualizar un registro','Activo',NULL,NULL),(4,'DELETE','Eliminar los registros','Activo',NULL,NULL),(5,'SEARCH','busca los registros','Activo',NULL,NULL);


CREATE TABLE `rol` (
  `IdRol` INT PRIMARY KEY AUTO_INCREMENT,
  `Rol` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `rol` VALUES (1,'Independiente','Activo','2024-03-27 05:49:26','2024-03-12 05:49:26'),(2,'SuperAdministrador','Activo','2024-03-08 05:49:49','2024-03-31 05:49:49'),(3,'Administrador','Activo',NULL,NULL),(4,'Empleado','Activo',NULL,NULL);


CREATE TABLE `_menu` (
  `IdMenu` INT PRIMARY KEY AUTO_INCREMENT,
  `NombreMenu` varchar(800) DEFAULT NULL,
  `Descripcion` varchar(800) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT 'Activo',
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL
);
INSERT INTO `_menu` VALUES (1,'INICIO','GESTION DEL DASHBOARD, ESTE MENU SOLO ES VISTA','Activo',NULL,NULL),(2,'CLIENTE','GESTION DEL CLIENTE, TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(3,'PRESTAMO','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(4,'PAGOS','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(5,'RECICLAJE','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(6,'USUARIO','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(7,'CAJA','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(8,'EMPRESA','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(9,'ROLES','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(10,'PERMISOS','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL),(11,'REPORTE','TODA LA OPERACION DEL CRUD','Activo',NULL,NULL);


CREATE TABLE `_permisos` (
  `IdPermiso` INT PRIMARY KEY AUTO_INCREMENT,
  `IdMenu` int DEFAULT NULL,
  `IdAccion` int DEFAULT NULL,
  `Estado` varchar(500) DEFAULT 'Activo',
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_PERMISO_ACCION` (`IdAccion`),
  KEY `FK_PERMISO_MENU` (`IdMenu`),
  CONSTRAINT `FK_PERMISO_ACCION` FOREIGN KEY (`IdAccion`) REFERENCES `_accion` (`IdAccion`),
  CONSTRAINT `FK_PERMISO_MENU` FOREIGN KEY (`IdMenu`) REFERENCES `_menu` (`IdMenu`)
);

INSERT INTO `_permisos` VALUES (1,1,2,'Activo',NULL,NULL),(2,2,1,'Activo',NULL,NULL),(3,2,2,'Activo',NULL,NULL),(4,2,3,'Activo',NULL,NULL),(5,2,4,'Activo',NULL,NULL),(6,2,5,'Activo',NULL,NULL),(7,3,1,'Activo',NULL,NULL),(8,3,2,'Activo',NULL,NULL),(9,3,3,'Activo',NULL,NULL),(10,3,4,'Activo',NULL,NULL),(11,3,5,'Activo',NULL,NULL),(12,4,1,'Activo',NULL,NULL),(13,4,2,'Activo',NULL,NULL),(14,4,3,'Activo',NULL,NULL),(15,4,4,'Activo',NULL,NULL),(16,4,5,'Activo',NULL,NULL),(17,5,1,'Activo',NULL,NULL),(18,5,2,'Activo',NULL,NULL),(19,5,3,'Activo',NULL,NULL),(20,5,4,'Activo',NULL,NULL),(21,5,5,'Activo',NULL,NULL),(22,6,1,'Activo',NULL,NULL),(23,6,2,'Activo',NULL,NULL),(24,6,3,'Activo',NULL,NULL),(25,6,4,'Activo',NULL,NULL),(26,6,5,'Activo',NULL,NULL),(27,7,1,'Activo',NULL,NULL),(28,7,2,'Activo',NULL,NULL),(29,7,3,'Activo',NULL,NULL),(30,7,4,'Activo',NULL,NULL),(31,7,5,'Activo',NULL,NULL),(32,8,1,'Activo',NULL,NULL),(33,8,2,'Activo',NULL,NULL),(34,8,3,'Activo',NULL,NULL),(35,8,4,'Activo',NULL,NULL),(36,8,5,'Activo',NULL,NULL),(37,9,1,'Activo',NULL,NULL),(38,9,2,'Activo',NULL,NULL),(39,9,3,'Activo',NULL,NULL),(40,9,4,'Activo',NULL,NULL),(41,9,5,'Activo',NULL,NULL),(42,10,1,'Activo',NULL,NULL),(43,10,2,'Activo',NULL,NULL),(44,10,3,'Activo',NULL,NULL),(45,10,4,'Activo',NULL,NULL),(46,10,5,'Activo',NULL,NULL),(47,11,1,'Activo',NULL,NULL),(48,11,2,'Activo',NULL,NULL),(49,11,3,'Activo',NULL,NULL),(50,11,4,'Activo',NULL,NULL),(51,11,5,'Activo',NULL,NULL);



CREATE TABLE `_rolpermisos` (
  `IdRolPermiso` INT PRIMARY KEY AUTO_INCREMENT,
  `IdRol` int DEFAULT NULL,
  `IdPermiso` int DEFAULT NULL,
  `Estado` varchar(500) DEFAULT 'Activo',
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_ROLPERMISO_ROL` (`IdRol`),
  KEY `FK_ROLPERMISO_PERMISOS` (`IdPermiso`),
  CONSTRAINT `FK_ROLPERMISO_PERMISOS` FOREIGN KEY (`IdPermiso`) REFERENCES `_permisos` (`IdPermiso`),
  CONSTRAINT `FK_ROLPERMISO_ROL` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`)
);
INSERT INTO `_rolpermisos` VALUES (1,1,1,'Activo',NULL,NULL),(2,1,2,'Activo',NULL,NULL),(3,1,3,'Activo',NULL,NULL),(4,1,4,'Activo',NULL,NULL),(5,1,5,'Activo',NULL,NULL),(6,1,6,'Activo',NULL,NULL),(7,1,7,'Activo',NULL,NULL),(8,1,8,'Activo',NULL,NULL),(9,1,9,'Activo',NULL,NULL),(10,1,10,'Activo',NULL,NULL),(11,1,11,'Activo',NULL,NULL),(12,1,12,'Activo',NULL,NULL),(13,1,13,'Activo',NULL,NULL),(14,1,14,'Activo',NULL,NULL),(15,1,15,'Activo',NULL,NULL),(16,1,16,'Activo',NULL,NULL),(17,1,17,'Activo',NULL,NULL),(18,1,18,'Activo',NULL,NULL),(19,1,19,'Activo',NULL,NULL),(20,1,20,'Activo',NULL,NULL),(21,1,21,'Activo',NULL,NULL),(22,1,22,'Activo',NULL,NULL),(23,1,23,'Activo',NULL,NULL),(24,1,24,'Activo',NULL,NULL),(25,1,25,'Activo',NULL,NULL),(26,1,26,'Activo',NULL,NULL),(27,1,27,'Activo',NULL,NULL),(28,1,28,'Activo',NULL,NULL),(29,1,29,'Activo',NULL,NULL),(30,1,30,'Activo',NULL,NULL),(31,1,31,'Activo',NULL,NULL),(32,1,32,'Activo',NULL,NULL),(33,1,33,'Activo',NULL,NULL),(34,1,34,'Activo',NULL,NULL),(35,1,35,'Activo',NULL,NULL),(36,1,36,'Activo',NULL,NULL),(37,1,37,'Activo',NULL,NULL),(38,1,38,'Activo',NULL,NULL),(39,1,39,'Activo',NULL,NULL),(40,1,40,'Activo',NULL,NULL),(41,1,41,'Activo',NULL,NULL),(42,1,42,'Activo',NULL,NULL),(43,1,43,'Activo',NULL,NULL),(44,1,44,'Activo',NULL,NULL),(45,1,45,'Activo',NULL,NULL),(46,1,46,'Activo',NULL,NULL),(47,1,47,'Activo',NULL,NULL),(48,1,48,'Activo',NULL,NULL),(49,1,49,'Activo',NULL,NULL),(50,1,50,'Activo',NULL,NULL),(51,1,51,'Activo',NULL,NULL),(52,2,1,'Activo',NULL,NULL),(53,2,2,'Activo',NULL,NULL),(54,2,3,'Activo',NULL,NULL),(55,2,4,'Activo',NULL,NULL),(56,2,5,'Activo',NULL,NULL),(57,2,6,'Activo',NULL,NULL),(58,2,7,'Activo',NULL,NULL),(59,2,8,'Activo',NULL,NULL),(60,2,9,'Activo',NULL,NULL),(61,2,10,'Activo',NULL,NULL),(62,2,11,'Activo',NULL,NULL),(63,2,12,'Activo',NULL,NULL),(64,2,13,'Activo',NULL,NULL),(65,2,14,'Activo',NULL,NULL),(66,2,15,'Activo',NULL,NULL),(67,2,16,'Activo',NULL,NULL),(68,2,17,'Activo',NULL,NULL),(69,2,18,'Activo',NULL,NULL),(70,2,19,'Activo',NULL,NULL),(71,2,20,'Activo',NULL,NULL),(72,2,21,'Activo',NULL,NULL),(73,2,22,'Activo',NULL,NULL),(74,2,23,'Activo',NULL,NULL),(75,2,24,'Activo',NULL,NULL),(76,2,25,'Activo',NULL,NULL),(77,2,26,'Activo',NULL,NULL),(78,2,27,'Activo',NULL,NULL),(79,2,28,'Activo',NULL,NULL),(80,2,29,'Activo',NULL,NULL),(81,2,30,'Activo',NULL,NULL),(82,2,31,'Activo',NULL,NULL),(83,2,32,'Activo',NULL,NULL),(84,2,33,'Activo',NULL,NULL),(85,2,34,'Activo',NULL,NULL),(86,2,35,'Activo',NULL,NULL),(87,2,36,'Activo',NULL,NULL),(88,2,37,'Activo',NULL,NULL),(89,2,38,'Activo',NULL,NULL),(90,2,39,'Activo',NULL,NULL),(91,2,40,'Activo',NULL,NULL),(92,2,41,'Activo',NULL,NULL),(93,2,42,'Activo',NULL,NULL),(94,2,43,'Activo',NULL,NULL),(95,2,44,'Activo',NULL,NULL),(96,2,45,'Activo',NULL,NULL),(97,2,46,'Activo',NULL,NULL),(98,2,47,'Activo',NULL,NULL),(99,2,48,'Activo',NULL,NULL),(100,2,49,'Activo',NULL,NULL),(101,2,50,'Activo',NULL,NULL),(102,2,51,'Activo',NULL,NULL),(103,3,1,'Activo',NULL,NULL),(104,3,2,'Activo',NULL,NULL),(105,3,3,'Activo',NULL,NULL),(106,3,4,'Activo',NULL,NULL),(107,3,5,'Activo',NULL,NULL),(108,3,6,'Activo',NULL,NULL),(109,3,7,'Activo',NULL,NULL),(110,3,8,'Activo',NULL,NULL),(111,3,9,'Activo',NULL,NULL),(112,3,10,'Activo',NULL,NULL),(113,3,11,'Activo',NULL,NULL),(114,3,12,'Activo',NULL,NULL),(115,3,13,'Activo',NULL,NULL),(116,3,14,'Activo',NULL,NULL),(117,3,15,'Activo',NULL,NULL),(118,3,16,'Activo',NULL,NULL),(119,3,17,'Activo',NULL,NULL),(120,3,18,'Activo',NULL,NULL),(121,3,19,'Activo',NULL,NULL),(122,3,20,'Activo',NULL,NULL),(123,3,21,'Activo',NULL,NULL),(124,3,22,'Activo',NULL,NULL),(125,3,23,'Activo',NULL,NULL),(126,3,24,'Activo',NULL,NULL),(127,3,25,'Activo',NULL,NULL),(128,3,26,'Activo',NULL,NULL),(129,3,27,'Activo',NULL,NULL),(130,3,28,'Activo',NULL,NULL),(131,3,29,'Activo',NULL,NULL),(132,3,30,'Activo',NULL,NULL),(133,3,31,'Activo',NULL,NULL),(134,3,32,'Activo',NULL,NULL),(135,3,33,'Activo',NULL,NULL),(136,3,34,'Activo',NULL,NULL),(137,3,35,'Activo',NULL,NULL),(138,3,36,'Activo',NULL,NULL),(139,3,37,'Activo',NULL,NULL),(140,3,38,'Activo',NULL,NULL),(141,3,39,'Activo',NULL,NULL),(142,3,40,'Activo',NULL,NULL),(143,3,41,'Activo',NULL,NULL),(144,3,42,'Activo',NULL,NULL),(145,3,43,'Activo',NULL,NULL),(146,3,44,'Activo',NULL,NULL),(147,3,45,'Activo',NULL,NULL),(148,3,46,'Activo',NULL,NULL),(149,3,47,'Activo',NULL,NULL),(150,3,48,'Activo',NULL,NULL),(151,3,49,'Activo',NULL,NULL),(152,3,50,'Activo',NULL,NULL),(153,3,51,'Activo',NULL,NULL),(154,4,1,'Activo',NULL,NULL),(155,4,2,'Activo',NULL,NULL),(156,4,3,'Activo',NULL,NULL),(157,4,4,'Activo',NULL,NULL),(158,4,5,'Activo',NULL,NULL),(159,4,6,'Activo',NULL,NULL),(160,4,7,'Activo',NULL,NULL),(161,4,8,'Activo',NULL,NULL),(162,4,9,'Activo',NULL,NULL),(163,4,10,'Activo',NULL,NULL),(164,4,11,'Activo',NULL,NULL),(165,4,12,'Activo',NULL,NULL),(166,4,13,'Activo',NULL,NULL),(167,4,14,'Activo',NULL,NULL),(168,4,15,'Activo',NULL,NULL),(169,4,16,'Activo',NULL,NULL),(170,4,17,'Activo',NULL,NULL),(171,4,18,'Activo',NULL,NULL),(172,4,19,'Activo',NULL,NULL),(173,4,20,'Activo',NULL,NULL),(174,4,21,'Activo',NULL,NULL),(175,4,22,'Activo',NULL,NULL),(176,4,23,'Activo',NULL,NULL),(177,4,24,'Activo',NULL,NULL),(178,4,25,'Activo',NULL,NULL),(179,4,26,'Activo',NULL,NULL),(180,4,27,'Activo',NULL,NULL),(181,4,28,'Activo',NULL,NULL),(182,4,29,'Activo',NULL,NULL),(183,4,30,'Activo',NULL,NULL),(184,4,31,'Activo',NULL,NULL),(185,4,32,'Activo',NULL,NULL),(186,4,33,'Activo',NULL,NULL),(187,4,34,'Activo',NULL,NULL),(188,4,35,'Activo',NULL,NULL),(189,4,36,'Activo',NULL,NULL),(190,4,37,'Activo',NULL,NULL),(191,4,38,'Activo',NULL,NULL),(192,4,39,'Activo',NULL,NULL),(193,4,40,'Activo',NULL,NULL),(194,4,41,'Activo',NULL,NULL),(195,4,42,'Activo',NULL,NULL),(196,4,43,'Activo',NULL,NULL),(197,4,44,'Activo',NULL,NULL),(198,4,45,'Activo',NULL,NULL),(199,4,46,'Activo',NULL,NULL),(200,4,47,'Activo',NULL,NULL),(201,4,48,'Activo',NULL,NULL),(202,4,49,'Activo',NULL,NULL),(203,4,50,'Activo',NULL,NULL),(204,4,51,'Activo',NULL,NULL);


CREATE TABLE `persona` (
  `IdPersona` INT PRIMARY KEY AUTO_INCREMENT,
  `Nombre` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Apellido` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NombreCompleto` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdTipoDoc` int DEFAULT NULL,
  `NumDoc` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Correo` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RutaImagen` varchar(800) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Estado` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_Persona_TipoDoc` (`IdTipoDoc`),
  CONSTRAINT `FK_Persona_TipoDoc` FOREIGN KEY (`IdTipoDoc`) REFERENCES `tipodoc` (`IdTipoDoc`)
);

CREATE TABLE `usuario` (
  `IdUsuario` INT PRIMARY KEY AUTO_INCREMENT,
  `IdPersona` int DEFAULT NULL,
  `IdRol` int DEFAULT NULL,
  `Login` varchar(800) DEFAULT NULL,
  `Clave` varchar(500) DEFAULT NULL,
  `Token` varchar(800) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `IdRol` (`IdRol`),
  KEY `FK_Usuario_Persona` (`IdPersona`),
  CONSTRAINT `FK_Usuario_Persona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `rol` (`IdRol`)
);

CREATE TABLE `caja` (
  `IdCaja` INT PRIMARY KEY AUTO_INCREMENT,
  `IdUsuario` int DEFAULT NULL,
  `MontoInicial` decimal(32,2) DEFAULT NULL,
  `MontoFinal` decimal(32,2) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaCierre` datetime DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `MontoCuadre` decimal(32,2) DEFAULT NULL,
  KEY `FK_CajaUsuario` (`IdUsuario`),
  CONSTRAINT `FK_CajaUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
);

CREATE TABLE `cliente` (
  `IdCliente` INT PRIMARY KEY AUTO_INCREMENT,
  `IdPersona` int DEFAULT NULL,
  `Direccion` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_ClientePersona` (`IdPersona`),
  CONSTRAINT `FK_ClientePersona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`)
);

CREATE TABLE `empresa` (
  `IdEmpresa` INT PRIMARY KEY AUTO_INCREMENT,
  `TipoEmpresa` int DEFAULT NULL,
  `NombreEmpresa` varchar(500) DEFAULT NULL,
  `Identificacion` varchar(500) DEFAULT NULL,
  `Logo` varchar(500) DEFAULT NULL,
  `Pais` int DEFAULT NULL,
  `Departamento` int DEFAULT NULL,
  `Provincia` int DEFAULT NULL,
  `Distrito` int DEFAULT NULL,
  `Direccion` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `TipoEmpresa` (`TipoEmpresa`),
  KEY `FK_Pais` (`Pais`),
  KEY `FK_Departamento` (`Departamento`),
  KEY `FK_Provincia` (`Provincia`),
  KEY `FK_Distrito` (`Distrito`),
  CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`TipoEmpresa`) REFERENCES `tipoempresa` (`IdTipoEmpresa`),
  CONSTRAINT `FK_Departamento` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`idDepartamento`),
  CONSTRAINT `FK_Distrito` FOREIGN KEY (`Distrito`) REFERENCES `distrito` (`idDistrito`),
  CONSTRAINT `FK_Pais` FOREIGN KEY (`Pais`) REFERENCES `pais` (`idPais`),
  CONSTRAINT `FK_Provincia` FOREIGN KEY (`Provincia`) REFERENCES `provincia` (`idProvincia`)
);

CREATE TABLE `palabraclave` (
  `IdPalabraClave` INT PRIMARY KEY AUTO_INCREMENT,
  `IdUsuario` int DEFAULT NULL,
  `IdTipoPalabra` int DEFAULT NULL,
  `NombrePalabraClave` varchar(800) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_TipoPalabraClave` (`IdTipoPalabra`),
  KEY `FK_TipoUsuario` (`IdUsuario`),
  CONSTRAINT `FK_TipoPalabraClave` FOREIGN KEY (`IdTipoPalabra`) REFERENCES `tipo_palabraclave` (`IdTipoPalabraClave`),
  CONSTRAINT `FK_TipoUsuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
);

CREATE TABLE `personacelular` (
  `IdPersonaCelular` INT PRIMARY KEY AUTO_INCREMENT,
  `IdPersona` int DEFAULT NULL,
  `IdPais` int DEFAULT NULL,
  `Celular` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  KEY `FK_PersonaCelular_Persona` (`IdPersona`),
  KEY `FK_Celular_Pais` (`IdPais`),
  CONSTRAINT `FK_Celular_Pais` FOREIGN KEY (`IdPais`) REFERENCES `pais` (`idPais`),
  CONSTRAINT `FK_PersonaCelular_Persona` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`)
);

CREATE TABLE `personadireccion` (
  `IdPersonaDireccion` INT PRIMARY KEY AUTO_INCREMENT,
  `IdPersona` int DEFAULT NULL,
  `IdPais` int DEFAULT NULL,
  `IdDepartamento` int DEFAULT NULL,
  `IdProvincia` int DEFAULT NULL,
  `IdDistrito` int DEFAULT NULL,
  `DireccionPersona` varchar(800) DEFAULT NULL,
  `Referencia` varchar(800) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_PersonaDireccion_PERSONA` (`IdPersona`),
  KEY `FK_PersonaDireccion_IdPais` (`IdPais`),
  KEY `FK_PersonaDireccion_IdDepartamento` (`IdDepartamento`),
  KEY `FK_PersonaDireccion_IdProvincia` (`IdProvincia`),
  KEY `FK_PersonaDireccion_IdDistrito` (`IdDistrito`),
  CONSTRAINT `FK_PersonaDireccion_IdDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`idDepartamento`),
  CONSTRAINT `FK_PersonaDireccion_IdDistrito` FOREIGN KEY (`IdDistrito`) REFERENCES `distrito` (`idDistrito`),
  CONSTRAINT `FK_PersonaDireccion_IdPais` FOREIGN KEY (`IdPais`) REFERENCES `pais` (`idPais`),
  CONSTRAINT `FK_PersonaDireccion_IdProvincia` FOREIGN KEY (`IdProvincia`) REFERENCES `provincia` (`idProvincia`),
  CONSTRAINT `FK_PersonaDireccion_PERSONA` FOREIGN KEY (`IdPersona`) REFERENCES `persona` (`IdPersona`)
);

CREATE TABLE `userempresa` (
  `IdUserEmpresa` INT PRIMARY KEY AUTO_INCREMENT,
  `IdEmpresa` int DEFAULT NULL,
  `IdUsuario` int DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `IdEmpresa` (`IdEmpresa`),
  KEY `IdUsuario` (`IdUsuario`),
  CONSTRAINT `userempresa_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`),
  CONSTRAINT `userempresa_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
);

CREATE TABLE `prestamo` (
  `IdPrestamo` INT PRIMARY KEY AUTO_INCREMENT,
  `IdUserEmpresa` int DEFAULT NULL,
  `IdCliente` int DEFAULT NULL,
  `IdTipoPago` int DEFAULT NULL,
  `FechaPago` varchar(500) DEFAULT NULL,
  `TipoMoneda` int DEFAULT NULL,
  `TipoPrestamo` int DEFAULT NULL,
  `PorcentajeInteres` int DEFAULT NULL,
  `Cuotas` int DEFAULT NULL,
  `MontoCuota` decimal(32,2) DEFAULT NULL,
  `MontoInteres` decimal(32,2) DEFAULT NULL,
  `MontoPrestado` decimal(32,2) DEFAULT NULL,  
  `MontoCalculado` decimal(32,2) DEFAULT NULL,  
  `MontoDevolucion` decimal(32,2) DEFAULT NULL,
  `ObservacionPrestamo` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaVencimiento` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_Prestamo_Cliente` (`IdCliente`),
  KEY `FK_Prestamo_IdTipoPrestamo` (`TipoPrestamo`),
  KEY `FK_Prestamo_IdTipoMoneda` (`TipoMoneda`),
  KEY `FK_Prestamo_UserEmpresa` (`IdUserEmpresa`),
  CONSTRAINT `FK_Prestamo_Cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`),
  CONSTRAINT `FK_Prestamo_TipoPAGO` FOREIGN KEY (`IdTipoPago`) REFERENCES `tipopago` (`IdTipoPago`),
  CONSTRAINT `FK_Prestamo_IdTipoMoneda` FOREIGN KEY (`TipoMoneda`) REFERENCES `tipomoneda` (`IdTipoMoneda`),
  CONSTRAINT `FK_Prestamo_IdTipoPrestamo` FOREIGN KEY (`TipoPrestamo`) REFERENCES `tipoprestamo` (`IdTipoPrestamo`),
  CONSTRAINT `FK_Prestamo_UserEmpresa` FOREIGN KEY (`IdUserEmpresa`) REFERENCES `userempresa` (`IdUserEmpresa`)
);

CREATE TABLE `prestamoplazo` (
  `IdPrestamoPlazo` INT PRIMARY KEY AUTO_INCREMENT,
  `IdPrestamo` int DEFAULT NULL,
  `IdTipoPago` int DEFAULT NULL,  
  `Cuotas` int DEFAULT NULL,
  `MontoCuota` decimal(32,2) DEFAULT NULL,
  `FechaCulminar` datetime DEFAULT NULL,
  `ObservacionPrestamo` varchar(500) DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_PrestamoPlazo_IdTipoMoneda` (`IdPrestamo`),
  KEY `FK_Pago_PrestamoPlazo` (`IdTipoPago`),
  CONSTRAINT `FK_Pago_PrestamoPlazo` FOREIGN KEY (`IdTipoPago`) REFERENCES `tipopago` (`IdTipoPago`),
  CONSTRAINT `FK_PrestamoPlazo_IdTipoMoneda` FOREIGN KEY (`IdPrestamo`) REFERENCES `prestamo` (`IdPrestamo`)
);

CREATE TABLE `pagos` (
  `IdPago` INT PRIMARY KEY AUTO_INCREMENT,
  `IdPrestamo` int DEFAULT NULL,
  `IdTipoPago` int DEFAULT NULL,
  `MontoPago` decimal(32,2) DEFAULT NULL,
  `MontoCambio` double DEFAULT NULL,
  `MontoRestante` decimal(32,2) DEFAULT NULL,
  `CuotaPago` int DEFAULT NULL,
  `Observacion` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  `FechaAnulado` datetime DEFAULT NULL,
  `FechaEliminado` datetime DEFAULT NULL,
  `UsuarioEdito` int DEFAULT NULL,
  `UsuarioAnulado` int DEFAULT NULL,
  `UsuarioElimino` int DEFAULT NULL,
  `UsuarioCreo` int DEFAULT NULL,
  KEY `FK_pagos_IdPrestamo` (`IdPrestamo`),
  KEY `FK_pagos_IdTipoPago` (`IdTipoPago`),
  CONSTRAINT `FK_pagos_IdPrestamo` FOREIGN KEY (`IdPrestamo`) REFERENCES `prestamo` (`IdPrestamo`),
  CONSTRAINT `FK_pagos_IdTipoPago` FOREIGN KEY (`IdTipoPago`) REFERENCES `tipopago` (`IdTipoPago`)
);

CREATE TABLE `usuariocliente` (
  `IdUsuarioCliente` INT PRIMARY KEY AUTO_INCREMENT,
  `IdUserEmpresa` int DEFAULT NULL,
  `IdCliente` int DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_UsuarioCliente_IdUserEmpresa` (`IdUserEmpresa`),
  KEY `FK_UsuarioCliente_IdCliente` (`IdCliente`),
  CONSTRAINT `FK_UsuarioCliente_IdCliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`),
  CONSTRAINT `FK_UsuarioCliente_IdUserEmpresa` FOREIGN KEY (`IdUserEmpresa`) REFERENCES `userempresa` (`IdUserEmpresa`)
);

CREATE TABLE `usuariorecovery` (
  `IdUsuarioRecovey` INT PRIMARY KEY AUTO_INCREMENT,
  `IdUsuario` int DEFAULT NULL,
  `CorreRecovery` varchar(500) DEFAULT NULL,
  `CelularRecovey` varchar(500) DEFAULT NULL,
  `Estado` varchar(500) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  KEY `Fk_Usuario` (`IdUsuario`),
  CONSTRAINT `Fk_Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
);

CREATE TABLE `_usuariopermisos` (
  `IdUsuarioPermiso` INT PRIMARY KEY AUTO_INCREMENT,
  `IdUsuario` int DEFAULT NULL,
  `IdPermiso` int DEFAULT NULL,
  `Estado` varchar(500) DEFAULT 'Activo',
  `UsuarioRegristro` int DEFAULT NULL,
  `UsuarioModifica` int DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `FechaModifica` datetime DEFAULT NULL,
  KEY `FK_USUARIOPERMISO_USUARIO` (`IdUsuario`),
  KEY `FK_USUARIOPERMISO1_USUARIO` (`UsuarioRegristro`),
  KEY `FK_USUARIOPERMISO2_USUARIO` (`UsuarioModifica`),
  KEY `FK_USUARIOPERMISO_PERMISOS` (`IdPermiso`),
  CONSTRAINT `FK_USUARIOPERMISO1_USUARIO` FOREIGN KEY (`UsuarioRegristro`) REFERENCES `usuario` (`IdUsuario`),
  CONSTRAINT `FK_USUARIOPERMISO2_USUARIO` FOREIGN KEY (`UsuarioModifica`) REFERENCES `usuario` (`IdUsuario`),
  CONSTRAINT `FK_USUARIOPERMISO_PERMISOS` FOREIGN KEY (`IdPermiso`) REFERENCES `_permisos` (`IdPermiso`),
  CONSTRAINT `FK_USUARIOPERMISO_USUARIO` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`)
);

--
-- Temporary view structure for view `v_celularlistar`
--

CREATE VIEW `v_celularlistar` AS
    SELECT 
        `pc`.`IdPersonaCelular` AS `IdPersonaCelular`,
        `pc`.`IdPersona` AS `IdPersona`,
        `pc`.`IdPais` AS `IdPais`,
        `p`.`rutabandera` AS `RutaBandera`,
        `p`.`cod` AS `Cod`,
        `pc`.`Celular` AS `Cel`,
        CONCAT(`p`.`cod`, ' ', `pc`.`Celular`) AS `Celular`,
        `pc`.`Estado` AS `Estado`,
        CONCAT(DATE_FORMAT(`pc`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        DATE_FORMAT(`pc`.`FechaRegistro`, '%r') AS `HoraRegistro`
    FROM
        (`personacelular` `pc`
        LEFT JOIN `pais` `p` ON ((`pc`.`IdPais` = `p`.`idPais`)));

--
-- Temporary view structure for view `v_clientelistar`
--

CREATE VIEW `v_clientelistar` AS
    select 
        `uc`.`IdUsuarioCliente` AS `IdUsuarioCliente`,
        `ue`.`IdUserEmpresa` AS `IdUserEmpresa`,
        `ue`.`IdEmpresa` AS `IdEmpresa`,
        `ue`.`IdUsuario` AS `IdUsuario`,
        `uc`.`IdCliente` AS `IdCliente`,
        `c`.`IdPersona` AS `IdPersona`,
        `p`.`Nombre` AS `Nombre`,
        `p`.`Apellido` AS `Apellido`,
        concat(`p`.`Nombre`, ' ', `p`.`Apellido`) AS `NombreCliente`,
        `p`.`IdTipoDoc` AS `IdTipoDoc`,
        `td`.`TipoDoc` AS `TipoDoc`,
        `p`.`NumDoc` AS `NumDoc`,
        `p`.`Correo` AS `Correo`,
        `c`.`Estado` AS `Estado`,
        (select 
                concat(`pa`.`cod`,
                            ' ',
                            `personacelular`.`Celular`)
            from
                (`personacelular`
                left join `pais` `pa` ON ((`personacelular`.`IdPais` = `pa`.`idPais`)))
            where
                ((`personacelular`.`IdPersona` = `c`.`IdPersona`)
                    and (`personacelular`.`Estado` = 'Activo'))
            order by `personacelular`.`IdPersonaCelular` desc
            limit 1) AS `Celular`,
        (select 
                `personadireccion`.`DireccionPersona`
            from
                `personadireccion`
            where
                ((`personadireccion`.`IdPersona` = `c`.`IdPersona`)
                    and (`personadireccion`.`Estado` = 'Activo'))
            order by `personadireccion`.`IdPersonaDireccion` desc
            limit 1) AS `Direccion`,
        (select 
                `personadireccion`.`Referencia`
            from
                `personadireccion`
            where
                ((`personadireccion`.`IdPersona` = `c`.`IdPersona`)
                    and (`personadireccion`.`Estado` = 'Activo'))
            order by `personadireccion`.`IdPersonaDireccion` desc
            limit 1) AS `Referencia`,
        (select 
                `d`.`distrito` AS `Distrito`
            from
                (`personadireccion` `pd`
                left join `distrito` `d` ON ((`pd`.`IdDistrito` = `d`.`idDistrito`)))
            where
                ((`pd`.`IdPersona` = `c`.`IdPersona`)
                    and (`pd`.`Estado` = 'Activo'))
            order by `pd`.`IdPersonaDireccion` desc
            limit 1) AS `Distrito`,
        `p`.`RutaImagen` AS `Imagen`,
        concat(date_format(`p`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        date_format(`p`.`FechaRegistro`, '%r') AS `HoraRegistro`,
        concat(date_format(`p`.`FechaModifica`, '%W, %d/%m/%Y')) AS `FechaModifica`,
        date_format(`p`.`FechaModifica`, '%r') AS `HoraModifica`
    from
        ((((`usuariocliente` `uc`
        left join `userempresa` `ue` ON ((`uc`.`IdUserEmpresa` = `ue`.`IdUserEmpresa`)))
        left join `cliente` `c` ON ((`uc`.`IdCliente` = `c`.`IdCliente`)))
        left join `persona` `p` ON ((`c`.`IdPersona` = `p`.`IdPersona`)))
        left join `tipodoc` `td` ON ((`p`.`IdTipoDoc` = `td`.`IdTipoDoc`)));

--
-- Temporary view structure for view `v_direccionlista`
--

CREATE VIEW `v_direccionlista` AS
    SELECT 
        `pd`.`IdPersonaDireccion` AS `IdPersonaDireccion`,
        `pd`.`IdPersona` AS `IdPersona`,
        `pa`.`idPais` AS `idPais`,
        `de`.`idDepartamento` AS `idDepartamento`,
        `di`.`idDistrito` AS `idDistrito`,
        `pro`.`idProvincia` AS `idProvincia`,
        `pa`.`pais` AS `Pais`,
        `de`.`departamento` AS `Departamento`,
        `di`.`distrito` AS `Distrito`,
        `pro`.`provincia` AS `Provincia`,
        `pd`.`DireccionPersona` AS `Direccion`,
        `pd`.`Referencia` AS `Referencia`,
        `pd`.`Estado` AS `Estado`,
        CONCAT(DATE_FORMAT(`pd`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        DATE_FORMAT(`pd`.`FechaRegistro`, '%r') AS `HoraRegistro`,
        CONCAT(DATE_FORMAT(`pd`.`FechaModifica`, '%W, %d/%m/%Y')) AS `FechaModifica`,
        DATE_FORMAT(`pd`.`FechaModifica`, '%r') AS `HoraModifica`
    FROM
        ((((`personadireccion` `pd`
        LEFT JOIN `pais` `pa` ON ((`pd`.`IdPais` = `pa`.`idPais`)))
        LEFT JOIN `departamentos` `de` ON ((`pd`.`IdDepartamento` = `de`.`idDepartamento`)))
        LEFT JOIN `distrito` `di` ON ((`pd`.`IdDistrito` = `di`.`idDistrito`)))
        LEFT JOIN `provincia` `pro` ON ((`pd`.`IdProvincia` = `pro`.`idProvincia`)));

--
-- Temporary view structure for view `v_empresalistar`
--

CREATE VIEW `v_empresalistar` AS
    SELECT 
        `e`.`IdEmpresa` AS `IdEmpresa`,
        `te`.`IdTipoEmpresa` AS `IdTipoEmpresa`,
        `te`.`TipoEmpresa` AS `TipoEmpresa`,
        `e`.`NombreEmpresa` AS `NombreEmpresa`,
        `e`.`Identificacion` AS `Identificacion`,
        `pa`.`pais` AS `Pais`,
        `de`.`departamento` AS `departamento`,
        `pro`.`provincia` AS `Provincia`,
        `di`.`distrito` AS `distrito`,
        `e`.`Direccion` AS `Direccion`,
        `e`.`Estado` AS `Estado`,
        `e`.`Logo` AS `Logo`,
        CONCAT(DATE_FORMAT(`e`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        DATE_FORMAT(`e`.`FechaRegistro`, '%r') AS `HoraRegistro`,
        CONCAT(DATE_FORMAT(`e`.`FechaModifica`, '%W, %d/%m/%Y')) AS `FechaModifica`,
        DATE_FORMAT(`e`.`FechaModifica`, '%r') AS `HoraModifica`
    FROM
        (((((`empresa` `e`
        LEFT JOIN `tipoempresa` `te` ON ((`e`.`TipoEmpresa` = `te`.`IdTipoEmpresa`)))
        LEFT JOIN `pais` `pa` ON ((`e`.`Pais` = `pa`.`idPais`)))
        LEFT JOIN `departamentos` `de` ON ((`e`.`Departamento` = `de`.`idDepartamento`)))
        LEFT JOIN `provincia` `pro` ON ((`e`.`Provincia` = `pro`.`idProvincia`)))
        LEFT JOIN `distrito` `di` ON ((`e`.`Distrito` = `di`.`idDistrito`)));

--
-- Temporary view structure for view `v_personalistar`
--

CREATE VIEW `v_personalistar` AS
    SELECT 
        `p`.`IdPersona` AS `IdPersona`,
        `p`.`Nombre` AS `Nombre`,
        `p`.`Apellido` AS `Apellido`,
        `p`.`NombreCompleto` AS `NombreCompleto`,
        `p`.`IdTipoDoc` AS `IdTipoDoc`,
        `td`.`TipoDoc` AS `TipoDoc`,
        `p`.`NumDoc` AS `NumDoc`,
        `p`.`Correo` AS `Correo`,
        `p`.`RutaImagen` AS `RutaImagen`,
        `p`.`Estado` AS `Estado`
    FROM
        (`persona` `p`
        LEFT JOIN `tipodoc` `td` ON ((`p`.`IdTipoDoc` = `td`.`IdTipoDoc`)));

--
-- Temporary view structure for view `v_prestamolistar`
--

CREATE VIEW `v_prestamolistar` AS
    SELECT 
    `pre`.`IdPrestamo` AS `IdPrestamo`,
    `u`.`IdPersonaUsuario` AS `IdPersonaUsuario`,
    `ue`.`IdUsuario` AS `IdUsuario`,
    `u`.`UsuarioRegistro` AS `UsuarioRegistro`,
    `ue`.`IdUserEmpresa` AS `IdUserEmpresa`,
    `ue`.`IdEmpresa` AS `IdEmpresa`,
    `e`.`NombreEmpresa` AS `Empresa`,
    `c`.`IdPersonaCliente` AS `IdPersonaCliente`,
    `c`.`IdCliente` AS `IdCliente`,
    `c`.`Cliente` AS `Cliente`,
    `tp`.`NombreTipoPago` AS `NombreTipoPago`,
    `pre`.`FechaPago` AS `FechaPago`,
    `pre`.`MontoInteres` AS `MontoInteres`,
    `pre`.`PorcentajeInteres` AS `PorcentajeInteres`,
    `pre`.`MontoCalculado` AS `MontoCalculado`,
    `pre`.`MontoDevolucion` AS `MontoDevolucion`,
    `pre`.`MontoPrestado` AS `MontoPrestado`,
    `pre`.`Cuotas` AS `Cuotas`,
    `pre`.`MontoCuota` AS `MontoCuota`,
    count(CASE WHEN `p`.`IdPago` IS NOT NULL AND `p`.`Estado` NOT IN ('Eliminado', 'Reciclado') THEN 1 END) AS `CuotasPagadas`,
    sum(CASE WHEN `p`.`MontoPago` IS NOT NULL AND `p`.`Estado` NOT IN ('Eliminado', 'Reciclado') THEN `p`.`MontoPago` END) AS `SumaTotalPagos`,
    `pre`.`ObservacionPrestamo` AS `ObservacionPrestamo`,
    `pre`.`Estado` AS `Estado`,
    `pre`.`FechaRegistro` AS `FechaOriginal`,
    `pre`.`FechaVencimiento` AS `FechaVencimiento`,
    concat(date_format(`pre`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
    date_format(`pre`.`FechaRegistro`, '%r') AS `HoraRegistro`,
    concat(date_format(`pre`.`FechaModifica`, '%W, %d/%m/%Y')) AS `FechaModifica`,
    date_format(`pre`.`FechaModifica`, '%r') AS `HoraModifica`,
    concat(date_format(`pre`.`FechaVencimiento`, '%W, %d/%m/%Y')) AS `FechaPlazo`,
    date_format(`pre`.`FechaVencimiento`, '%r') AS `HoraPlazo`
FROM
    ((((((`prestamo` `pre`
    LEFT JOIN `userempresa` `ue` ON `pre`.`IdUserEmpresa` = `ue`.`IdUserEmpresa`)
    LEFT JOIN `empresa` `e` ON `ue`.`IdEmpresa` = `e`.`IdEmpresa`)
    LEFT JOIN `tipopago` `tp` ON `pre`.`IdTipoPago` = `tp`.`IdTipoPago`)
    LEFT JOIN (SELECT 
                   `u`.`IdUsuario` AS `IdUsuario`,
                   `p`.`IdPersona` AS `IdPersonaUsuario`,
                   `p`.`NombreCompleto` AS `UsuarioRegistro`
               FROM `usuario` `u`
               LEFT JOIN `persona` `p` ON `u`.`IdPersona` = `p`.`IdPersona`) `u` 
        ON `ue`.`IdUsuario` = `u`.`IdUsuario`)
    LEFT JOIN (SELECT 
                   `c`.`IdCliente` AS `IdCliente`,
                   `p`.`IdPersona` AS `IdPersonaCliente`,
                   `p`.`NombreCompleto` AS `Cliente`
               FROM `cliente` `c`
               LEFT JOIN `persona` `p` ON `c`.`IdPersona` = `p`.`IdPersona`) `c` 
        ON `pre`.`IdCliente` = `c`.`IdCliente`)
    LEFT JOIN `pagos` `p` ON `pre`.`IdPrestamo` = `p`.`IdPrestamo`)
GROUP BY `pre`.`IdPrestamo`, `u`.`IdPersonaUsuario`, `ue`.`IdUsuario`, `u`.`UsuarioRegistro`, 
         `ue`.`IdUserEmpresa`, `ue`.`IdEmpresa`, `e`.`NombreEmpresa`, `c`.`IdPersonaCliente`, 
         `c`.`IdCliente`, `c`.`Cliente`, `tp`.`NombreTipoPago`, `pre`.`FechaPago`, `pre`.`MontoInteres`, 
         `pre`.`PorcentajeInteres`, `pre`.`MontoCalculado`, `pre`.`MontoDevolucion`, `pre`.`MontoPrestado`, 
         `pre`.`Cuotas`, `pre`.`MontoCuota`, `pre`.`ObservacionPrestamo`, `pre`.`Estado`, 
         `pre`.`FechaRegistro`, `pre`.`FechaModifica`, `pre`.`FechaVencimiento`
ORDER BY `pre`.`IdPrestamo` DESC;


--
-- Temporary view structure for view `v_tipoempresalistar`
--

CREATE VIEW `v_tipoempresalistar` AS
    SELECT 
        `tipoempresa`.`IdTipoEmpresa` AS `IdTipoEmpresa`,
        `tipoempresa`.`TipoEmpresa` AS `TipoEmpresa`,
        `tipoempresa`.`Estado` AS `Estado`,
        `tipoempresa`.`FechaRegistro` AS `FechaRegistro`,
        `tipoempresa`.`FechaModifica` AS `FechaModifica`
    FROM `tipoempresa`;

--
-- Temporary view structure for view `v_usuariolistar`
--

CREATE VIEW `v_usuariolistar` AS
    SELECT 
        `u`.`IdUsuario` AS `IdUsuario`,
        `p`.`IdPersona` AS `IdPersona`,
        `ue`.`IdUserEmpresa` AS `IdUserEmpresa`,
        `ue`.`IdEmpresa` AS `IdEmpresa`,
        `u`.`IdRol` AS `IdRol`,
        `r`.`Rol` AS `Rol`,
        CONCAT(SUBSTRING_INDEX(`p`.`Nombre`, ' ', 1),
                ' ',
                SUBSTRING_INDEX(`p`.`Apellido`, ' ', 1)) AS `Nombre`,
        `p`.`Apellido` AS `Apellido`,
        `p`.`NombreCompleto` AS `NombreCompleto`,
        `p`.`Correo` AS `Correo`,
        `p`.`IdTipoDoc` AS `IdTipoDoc`,
        `p`.`NumDoc` AS `NumDoc`,
        `u`.`Login` AS `Login`,
        `u`.`Clave` AS `Clave`,
        `e`.`NombreEmpresa` AS `NombreEmpresa`,
        `p`.`RutaImagen` AS `RutaImagen`,
        CONCAT(DATE_FORMAT(`u`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        DATE_FORMAT(`u`.`FechaRegistro`, '%r') AS `HoraRegistro`,
        CONCAT(DATE_FORMAT(`u`.`FechaModifica`, '%W, %d/%m/%Y')) AS `FechaModifica`,
        DATE_FORMAT(`u`.`FechaModifica`, '%r') AS `HoraModifica`,
        `u`.`Estado` AS `Estado`
    FROM
        ((((`userempresa` `ue`
        LEFT JOIN `empresa` `e` ON ((`ue`.`IdEmpresa` = `e`.`IdEmpresa`)))
        LEFT JOIN `usuario` `u` ON ((`ue`.`IdUsuario` = `u`.`IdUsuario`)))
        LEFT JOIN `persona` `p` ON ((`u`.`IdPersona` = `p`.`IdPersona`)))
        LEFT JOIN `rol` `r` ON ((`u`.`IdRol` = `r`.`IdRol`)));

--
-- Temporary view structure for view `vista_existeprestamoactivo`
--

CREATE VIEW `vista_existeprestamoactivo` AS
    SELECT 
        `pre`.`IdPrestamo` AS `IdPrestamo`,
        `pre`.`IdUserEmpresa` AS `IdUserEmpresa`,
        `pre`.`IdCliente` AS `IdCliente`,
        `per`.`NombreCompleto` AS `Cliente`,
        `pre`.`MontoPrestado` AS `MontoPrestado`,
        `pre`.`MontoDevolucion` AS `MontoDevolucion`,
        `pre`.`MontoCalculado` AS `MontoCalculado`,
        `prepla`.`Cuotas` AS `CuotaTotal`,
        CONCAT(DATE_FORMAT(`pre`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        DATE_FORMAT(`pre`.`FechaRegistro`, '%r') AS `HoraRegistro`,
        `pre`.`Estado` AS `Estado`
    FROM
        (((`prestamoplazo` `prepla`
        LEFT JOIN `prestamo` `pre` ON ((`prepla`.`IdPrestamo` = `pre`.`IdPrestamo`)))
        LEFT JOIN `cliente` `cl` ON ((`pre`.`IdCliente` = `cl`.`IdCliente`)))
        LEFT JOIN `persona` `per` ON ((`cl`.`IdPersona` = `per`.`IdPersona`)))
    ORDER BY `pre`.`IdPrestamo` DESC;

--
-- Temporary view structure for view `vista_pagoslistar`
--

CREATE VIEW `vista_pagoslistar` AS
    SELECT 
        `pa`.`IdPago` AS `IdPago`,
        `pa`.`IdPrestamo` AS `IdPrestamo`,
        `pre`.`IdUserEmpresa` AS `IdUserEmpresa`,
		ue.IdEmpresa as IdEmpresa,
        `p`.`NombreCompleto` AS `Usuario`,
        `tp`.`NombreTipoPago` AS `TipoPago`,
        `pa`.`MontoPago` AS `MontoPago`,
        `pa`.`MontoCambio` AS `MontoCambio`,
        `pa`.`MontoRestante` AS `MontoRestante`,
        `pa`.`CuotaPago` AS `CuotaPago`,
        `pre`.`MontoCalculado` AS `MontoCuota`,
		`pre`.`MontoPrestado` AS `MontoPrestado`,
		`pre`.`MontoDevolucion` AS `MontoDevolucion`,
        `pa`.`Observacion` AS `Observacion`,
		pa.FechaRegistro as FechaOriginal,
        CONCAT(DATE_FORMAT(`pa`.`FechaRegistro`, '%W, %d/%m/%Y')) AS `FechaRegistro`,
        DATE_FORMAT(`pa`.`FechaRegistro`, '%r') AS `HoraRegistro`,
        CONCAT(DATE_FORMAT(`pa`.`FechaModifica`, '%W, %d/%m/%Y')) AS `FechaModifica`,
        DATE_FORMAT(`pa`.`FechaModifica`, '%r') AS `HoraModifica`,
        CONCAT(DATE_FORMAT(`pa`.`FechaAnulado`, '%W, %d/%m/%Y')) AS `FechaAnulado`,
        DATE_FORMAT(`pa`.`FechaAnulado`, '%r') AS `HoraAnulado`,
        CONCAT(DATE_FORMAT(`pa`.`FechaEliminado`, '%W, %d/%m/%Y')) AS `FechaEliminado`,
        DATE_FORMAT(`pa`.`FechaEliminado`, '%r') AS `HoraEliminado`,
        `pa`.`Estado` AS `Estado`
    FROM
        (((((`pagos` `pa`
        LEFT JOIN `tipopago` `tp` ON ((`pa`.`IdTipoPago` = `tp`.`IdTipoPago`)))
        LEFT JOIN `prestamo` `pre` ON ((`pa`.`IdPrestamo` = `pre`.`IdPrestamo`)))
        LEFT JOIN `userempresa` `ue` ON ((`pre`.`IdUserEmpresa` = `ue`.`IdUserEmpresa`)))
        LEFT JOIN `usuario` `u` ON ((`ue`.`IdUsuario` = `u`.`IdUsuario`)))
        LEFT JOIN `persona` `p` ON ((`u`.`IdPersona` = `p`.`IdPersona`)))
    ORDER BY `pa`.`IdPago` DESC;

--
-- Temporary view structure for view `vista_tipopagolistar`
--

CREATE VIEW `vista_tipopagolistar` AS
    SELECT 
        `tp`.`IdTipoPago` AS `IdTipoPago`,
        `tp`.`NombreTipoPago` AS `NombreTipoPago`
    FROM `tipopago` `tp` WHERE (`tp`.`Estado` = 'Activo');
		
		















































--
-- Dumping routines for database 'appcobra_bdcobranza'
--
DELIMITER //
CREATE PROCEDURE `sp_PagoAnular`(
	IN P_IdPago INT,
    IN P_UsuarioAnulado INT,
	IN P_FechaAnulado DATETIME,    
	OUT Mensaje VARCHAR(500),
    OUT Success bit 
)
BEGIN
	IF EXISTS (SELECT * FROM PAGOS WHERE Idpago = P_IdPago) THEN		
		UPDATE pagos SET Estado = "Reciclado", FechaAnulado = P_FechaAnulado, UsuarioAnulado = P_UsuarioAnulado
		WHERE IdPago = P_IdPago;
		
		IF ROW_COUNT() > 0 THEN
			SET Mensaje = "Reciclado Correctamente";
			SET Success = 1;
		ELSE
			SET Mensaje = "No Se Recicló el Pago";
			SET Success = 0;
		END IF;
	ELSE
		SET Success = 0;
		SET Mensaje = 'El Pago No Existe';
    END IF;
END;

CREATE PROCEDURE `sp_PagoEditar`(
	IN P_IdPago INT, 
    IN P_MontoPago DOUBLE, 
    IN P_MontoCambio DOUBLE,
    IN P_MontoRestante DOUBLE, 
    IN P_CuotaPago INT, 
    IN P_Observacion VARCHAR(500),
    IN P_FechaModifica DATETIME,
    OUT Mensaje VARCHAR(500),
    OUT Succes bit 
)
BEGIN
	IF EXISTS (SELECT * FROM PAGOS WHERE Idpago = P_IdPago AND Estado <> "Eliminado" AND Estado <> "Anulado") THEN
		UPDATE Pagos SET MontoPago = P_MontoPago, MontoCambio = P_MontoCambio, MontoRestante = P_MontoRestante, 
		CuotaPago = P_CuotaPago, Observacion = P_Observacion, Estado = "Modificado", FechaModifica = P_FechaModifica
		WHERE IdPago = P_IdPago;
			
		IF row_count() > 0 THEN
			SET Mensaje = "Datos Actualizados";
			SET Succes = 1;
		ELSE
			SET Succes = 0;
			SET Mensaje = 'Ocurrió un error al Actualizar los Datos';
		END IF;
	ELSE
		SET Succes = false;
		SET Mensaje = 'El Pago No Existe';
	END IF;
END;

CREATE PROCEDURE `sp_PagoEliminar`(
	IN P_IdPago INT,     
    IN P_Usuario INT,
    IN P_FechaEliminado DATETIME,
    OUT Mensaje VARCHAR(500),
    OUT Succes bit 
)
BEGIN
	IF EXISTS (SELECT * FROM PAGOS WHERE Idpago = P_IdPago) THEN
		UPDATE Pagos SET Estado = "Eliminado", FechaEliminado = P_FechaEliminado, UsuarioElimino = P_Usuario WHERE IdPago = P_IdPago;
			
		IF row_count() > 0 THEN
			SET Mensaje = "Datos Eliminados";
			SET Succes = 1;
		ELSE
			SET Succes = 0;
			SET Mensaje = 'Ocurrió un error al Eliminar los Datos';
		END IF;
	ELSE
		SET Succes = 0;
		SET Mensaje = 'El Pago No Existe';
	END IF;
END;


CREATE PROCEDURE sp_PagoInsertar(
	IN P_IdPrestamo INT, 
    IN P_IdTipoPago INT, 
    IN P_MontoPago DOUBLE, 
    IN P_MontoCambio DOUBLE,
    IN P_MontoRestante DOUBLE, 
    IN P_CuotaPago INT, 
    IN P_Observacion VARCHAR(500),
    IN P_FechaRegistro DATETIME,
    OUT Mensaje VARCHAR(500),
    OUT Succes bit,
    OUT IdPago INT
)
BEGIN
	DECLARE CuotaPrestamo INT DEFAULT 0;
    DECLARE TotaPago INT DEFAULT 0;
    
    SELECT Cuotas INTO CuotaPrestamo FROM prestamo WHERE IdPrestamo = P_IdPrestamo AND Estado <> "Eliminado" AND Estado <> "Anulado";    
    SELECT COUNT(*) INTO TotaPago FROM pagos WHERE IdPrestamo = P_IdPrestamo AND Estado <> "Eliminado" AND Estado <> "Anulado";
    
    IF (TotaPago < CuotaPrestamo) THEN
		INSERT INTO pagos (IdPrestamo, IdTipoPago, MontoPago, MontoCambio, MontoRestante, CuotaPago, Observacion, Estado, FechaRegistro) 
        VALUES(P_IdPrestamo, P_IdTipoPago, P_MontoPago, P_MontoCambio, P_MontoRestante, P_CuotaPago, P_Observacion, 'Pagado', P_FechaRegistro);

        IF ROW_COUNT() > 0 THEN
            SET IdPago = LAST_INSERT_ID();
            IF (TotaPago + 1 = CuotaPrestamo) THEN
                -- ACTUALIZO EL ESTADO DEL PRESTAMO--
                UPDATE Prestamo SET Estado = 'Completado' WHERE IdPrestamo = P_IdPrestamo;
            END IF;
            
            SET Succes = 1;
            SET Mensaje = 'Pago Agregado Correctamente';
        ELSE
            SET Succes = 0;
            SET Mensaje = 'Error: Ocurrió un error en la base de datos';
        END IF;
    ELSE
		SET Succes = 0;
        SET Mensaje = 'El préstamo ha completado las cuotas permitidas';
    END IF;
END;


CREATE PROCEDURE `PagoRestaurar`(
	IN P_IdPago INT, 
    OUT Mensaje VARCHAR(500),
    OUT Succes bit 
)
BEGIN
	IF EXISTS (SELECT * FROM PAGOS WHERE Idpago = P_IdPago) THEN
		UPDATE Pagos SET Estado = "Pagado" WHERE IdPago = P_IdPago;
			
		IF row_count() > 0 THEN
			SET Mensaje = "Datos Restaurados";
			SET Succes = 1;
		ELSE
			SET Succes = 0;
			SET Mensaje = 'Ocurrió un error al Restaurar los Datos';
		END IF;
	ELSE
		SET Succes = 0;
		SET Mensaje = 'El Pago No Existe';
	END IF;
END;


CREATE PROCEDURE `sp_CajaApertura`(
	spIdUsuario int, 
    spMontoInicial decimal(32,2),
    spFechaRegistro datetime,
	out success bit,
    out message varchar(500)
)
BEGIN
	IF EXISTS(SELECT * FROM caja WHERE IdUsuario = spIdUsuario AND Estado = "Abierto") THEN
		SET success = 0;
        SET message = "ya Existe una Caja Abierta";
	ELSE
		INSERT INTO caja(IdUsuario, MontoInicial,Estado,FechaRegistro) VALUES(spIdUsuario, spMontoInicial,'Abierto', spFechaRegistro);
		IF row_count() > 0 THEN
			SET success = 1;
			SET message = "Caja Aperturado Exitosamente";
		ELSE
			SET success = 0;
			SET message = "No se aperturo la caja, Problemas con el 'sp_CajaApertura' en la Base de datos";
		END IF;   
    END IF;
END;


CREATE PROCEDURE `sp_CajaCierre`(
	spIdUsuario int, 
    spMontoFinal decimal(32,2),
    spMontoCuadre decimal(32,2),
    spFechaCierre datetime,
	out success bit,
    out message varchar(500)
)
BEGIN
	-- Manejo de errores SQL genérico
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SET success = 0;
        SET message = "Ocurrió un error en la base de datos. 'sp_CajaCierre'";
        ROLLBACK;  -- Deshace cualquier cambio en caso de error.
    END;

    START TRANSACTION;
	UPDATE caja SET MontoFinal = spMontoFinal, MontoCuadre = spMontoCuadre, FechaCierre = spFechaCierre WHERE IdUsuario = spIdUsuario;
	IF row_count() > 0 THEN
		SET success = 1;
		SET message = "Caja Cerrado Exitosamente";
		COMMIT;
	ELSE
		SET success = 0;
		SET message = "No se Cerrar la caja, Problemas con el 'sp_CajaCierre' en la Base de datos";
		ROLLBACK;
	END IF; 
END;

CREATE PROCEDURE SP_CelularInsertar(
    sp_idPersona INT,
    sp_idPais INT,
    sp_celular VARCHAR(500),
    sp_fecharegistro datetime,
    OUT idcelular INT,
    OUT success bit,
    OUT message VARCHAR(500)
)
BEGIN
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET success = 0;
		SET message = "Violación de restricción de clave foránea o error en la base de datos";
END;

START TRANSACTION;

INSERT INTO personacelular(IdPersona, IdPais, Celular, Estado, FechaRegistro)
VALUES(sp_idPersona, sp_idPais, sp_celular, 'Activo', sp_fecharegistro);

IF ROW_COUNT() > 0 THEN
		SET idcelular = LAST_INSERT_ID();
		SET success = 1;
		SET message = "OK";
ELSE
		SET success = 0;
		SET message = "No se Registro nada en la Tabla personacelular, el procedimiento Almacenado 'SP_CelularInsertar' Tiene Fallas";
END IF;

COMMIT;
END;


CREATE PROCEDURE `sp_CelularEditar`(
    CidCelular INT,
    CidPais INT,
    Ccelular VARCHAR(500),
    OUT success bit,
    OUT message VARCHAR(800)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejo de error SQL genérico
        SET success = 0;
        SET message = "Ocurrió un error en la base de datos.";
    END;

    DECLARE EXIT HANDLER FOR NOT FOUND
    BEGIN
        -- Manejo de la situación donde no se encuentran registros
        SET success = 0;
        SET message = "No se encontraron registros con el ID proporcionado.";
    END;

    -- Actualización del registro
    UPDATE personacelular SET Celular = Ccelular, IdPais = CidPais, Estado = 'Modificado'
    WHERE IdPersonaCelular = CidCelular;

    -- Verificación de filas afectadas
    IF ROW_COUNT() > 0 THEN
        SET success = 1;
        SET message = "OK";
    ELSE
        SET success = 0;
        SET message = "sin cambios para actualizar";
    END IF;
END;


CREATE PROCEDURE `sp_ClienteEliminar`(
    ceIdCliente INT,
    OUT success bit,
    OUT message VARCHAR(800)
)
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejo de error SQL genérico
        SET success = 0;
        SET message = "Ocurrió un error en la base de datos.";
        ROLLBACK;  -- Deshace cualquier cambio en caso de error.
    END;

    START TRANSACTION;
    
    -- Verifica la acción y actualiza el estado
	UPDATE cliente SET Estado = 'Eliminado' WHERE IdCliente = ceIdCliente;
    
    -- Revisa si se actualizó exactamente una fila
    IF ROW_COUNT() = 1 THEN
		SET success = 1;
        SET message = "Eliminado correctamente.";
        COMMIT;
	ELSE
		SET success = 0;
        SET message = "No se actualizó ningún registro. Por favor, verifique el ID del cliente.";
        ROLLBACK;
    END IF;    
END;


CREATE PROCEDURE `sp_ClienteEstado`(
    spAccion INT,
    spIdCliente INT,
    OUT success bit,
    OUT message VARCHAR(500)
)
BEGIN
    -- Manejo de errores SQL genérico
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SET success = 0;
        SET message = "Ocurrió un error en la base de datos.";
        ROLLBACK;  -- Deshace cualquier cambio en caso de error.
    END;

    START TRANSACTION;
    
    -- Verifica la acción y actualiza el estado
    IF (spAccion = 1) THEN
        UPDATE cliente SET Estado = 'Activo' WHERE IdCliente = spIdCliente;
    ELSE
        UPDATE cliente SET Estado = 'Inactivo' WHERE IdCliente = spIdCliente;
    END IF;
    
    -- Revisa si se actualizó exactamente una fila
    IF ROW_COUNT() = 1 THEN
        SET success = 1;
        -- Usa CASE para determinar el mensaje
        SET message = CASE
            WHEN spAccion = 1 THEN "Activado correctamente."
            WHEN spAccion = 2 THEN "Desactivado correctamente."
            ELSE "Estado actualizado correctamente."
        END;
        COMMIT;
    ELSE
        SET success = 0;
        SET message = "No se actualizó ningún registro. Por favor, verifique el ID del cliente.";
        ROLLBACK;
    END IF;
    
END;


CREATE PROCEDURE `sp_ClienteReciclar`(
    spIdCliente INT,
    OUT success bit,
    OUT message VARCHAR(500)
)
BEGIN
    -- Manejo de errores SQL genérico
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        SET success = 0;
        SET message = "Ocurrió un error en la base de datos.";
        ROLLBACK;  -- Deshace cualquier cambio en caso de error.
    END;
    START TRANSACTION;
    
    -- Verifica la acción y actualiza el estado
    UPDATE cliente SET Estado = 'Reciclado' WHERE IdCliente = spIdCliente;
    
    -- Revisa si se actualizó exactamente una fila
    IF ROW_COUNT() = 1 THEN
        SET success = 1;
        SET message = "Cliente Reciclado correctamente.";
        COMMIT;
    ELSE
        SET success = 0;
        SET message = "No se actualizó ningún registro. Por favor, verifique el ID del cliente.";
        ROLLBACK;
    END IF;    
END;


CREATE PROCEDURE `sp_DireccionEditar`(	
	DidDireccion int,
    DidPais int,
    DidDepartamento int,
    DidProvincia int,
    Ddireccion varchar(800),
    Dreferencia varchar(800),
    DfechaModifica datetime,
    OUT success bit,
    OUT message varchar(800)    
)
BEGIN 
	UPDATE personadireccion SET IdPais = DidPais, IdDepartamento = DidDepartamento, IdProvincia = DidProvincia,
    IdDistrito = DidDistrito, DireccionPersona = Ddireccion, Referencia = Dreferencia, Estado = "Modificado", FechaModifica = DfechaModifica
    WHERE IdPersonaDireccion = DidDireccion;
    
    IF ROW_COUNT() > 0 THEN
		SET message = "OK";
        SET success = 1;
	ELSE
		SET message = "Hubo un Error en La Base de datos, el error ocurrio cuando se intenta Editar la Direccion de la Persona";
        SET success = 0;
    END IF;
END;


CREATE PROCEDURE `sp_DireccionInsertar`(
    DIdPersona INT,
    DIdPais INT,
    DIdDepartamento INT,
    DIdProvincia INT,
    DIdDistrito INT,
    DDireccion VARCHAR(800),
    DReferencia VARCHAR(800),
    DFechaRegistro DATETIME,
    OUT idDireccion INT,
    OUT success bit,
    OUT message VARCHAR(500)
)
BEGIN
    DECLARE exit handler FOR SQLEXCEPTION 
    BEGIN
        SET success = 0;
        SET message = "No se pudo insertar el registro. revise el Procedimiento Almacenado 'sp_DireccionInsertar'";
        ROLLBACK;
    END;
    
    -- Comienza la transacción
    START TRANSACTION;

    INSERT INTO personadireccion(IdPersona, IdPais, IdDepartamento, IdProvincia, IdDistrito, DireccionPersona, Referencia, Estado, FechaRegistro)
    VALUES(DIdPersona, DIdPais, DIdDepartamento, DIdProvincia, DIdDistrito, DDireccion, DReferencia, 'Activo', DFechaRegistro);
    
    IF ROW_COUNT() > 0 THEN
        SET idDireccion = LAST_INSERT_ID();
        SET success = 1;
        SET message = "OK";
        COMMIT;
    ELSE
        SET success = 0;
        SET message = "No se insertó ninguna fila.";
        ROLLBACK;
    END IF;
    
END;


CREATE PROCEDURE `sp_EmpresaInsertar`(
    sp_IdUserEmpresa int,
	sp_IdTipoEmpresa INT,
    sp_Nombre varchar(500),
    sp_Identificacion varchar(500),
    sp_FechaRegistro datetime,
    out sp_idEmpresa int,
    out success bit,
    out message varchar(500)
)
BEGIN
	Declare pidUsuario int default 0;
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
		SET success = 0;
		SET message = "Violación de restricción de clave foránea o error en la base de datos, 'sp_EmpresaInsertar'";
	END;
	START TRANSACTION;
    
    -- OBTENEMOS EL IDUSUARIo---
    SELECT IdUsuario into pidUsuario FROM userempresa where IdUserEmpresa = sp_IdUserEmpresa;
    
    INSERT INTO empresa(TipoEmpresa, NombreEmpresa, Identificacion, Estado, FechaRegistro)
    VALUES(sp_IdTipoEmpresa, sp_Nombre, sp_Identificacion, 'Activo', sp_FechaRegistro);
    
	IF row_count() > 0 THEN
		SET sp_idEmpresa = LAST_INSERT_ID();
        
        -- ACTUALIZAMO EL ROL USUARIO
        UPDATE usuario SET IdRol = 2 WHERE IdUsuario = pidUsuario;
         
		-- actulizamo la empresa on el nuevo
        UPDATE userempresa set IdEmpresa = sp_idEmpresa WHERE IdUserEmpresa = sp_IdUserEmpresa;
        
		SET success = 1;
		SET message = "Registro Exitosamente";
	ELSE
		SET success = 0;
		SET message = "No se inserto la empresa, Problemas con el 'sp_EmpresaInsertar' en la Base de datos";
	END IF;   
	COMMIT;
END;


CREATE PROCEDURE `sp_PaisInsertar`(
	Cod varchar(45),
    Pais varchar(50),
    Capital varchar(45),
    Region varchar(500),
    Idioma varchar(500),
    Moneda varchar(100),
    Simbolo varchar(100),
    RutaBandera varchar(1000),
    RutaEscudo varchar(1000),
    RutaMapa1 varchar(800),
    RutaMapa2 varchar(800),
    OUT success bit,
    OUT message varchar(800)
)
BEGIN
	INSERT INTO pais(cod,pais,capital,region,idioma,moneda,simbmoneda,estado,rutabandera,rutaescudo,rutamapa1,rutamapa2)
    VALUES(Cod,Pais,Capital,Region,Idioma,Moneda,Simbolo,"Activo", RutaBandera,RutaEscudo,RutaMapa1,RutaMapa2);
    
    IF row_count() > 0 THEN
		SET success = 1;
        SET message = "OK";
	ELSE
		SET success = 0;
        SET message = "OK";
    END IF;
END;


CREATE PROCEDURE `sp_PersonaEditar`(
    PidPersona INT,     
    Pnombre VARCHAR(500),
    Papellido VARCHAR(500),  
    PidTipoDoc INT,
    PnumDoc VARCHAR(500),
    PrutaImagen VARCHAR(800),
    PfechaModifica DATETIME,
    OUT success bit,
    OUT message VARCHAR(800)
)
BEGIN
    UPDATE persona SET Nombre = Pnombre, Apellido = Papellido, IdTipoDoc = PidTipoDoc, 
    NumDoc = PnumDoc, RutaImagen = PrutaImagen, Estado = 'Modificado', FechaModifica = PfechaModifica
	WHERE IdPersona = PidPersona;

	IF ROW_COUNT() > 0 THEN
		SET success = 1;
		SET message = "OK";
	ELSE
		SET success = 0;
		SET message = "Hubo un error en la BD.";
	END IF;
END;


CREATE PROCEDURE `sp_PersonaInsertar`(
	PNombre varchar(500),
    PApellido varchar(500),
    PIdTipoDoc INT,
    PNumDoc varchar(500),
    PCorreo varchar(800),
    PRutaImagen varchar(800),
    PFechaRegistro DATETIME,
    OUT idpersona INT,
    OUT success bit,
    OUT message VARCHAR(500)
)
BEGIN
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
		SET success = 0;
		SET message = "Violación de restricción de clave foránea o error en la base de datos";
	END;

	START TRANSACTION;

	INSERT INTO persona(Nombre,Apellido, NombreCompleto, IdTipoDoc, NumDoc, Correo, RutaImagen, Estado, FechaRegistro)
	VALUES(PNombre, PApellido, CONCAT(PNombre,' ', PApellido), PIdTipoDoc, PNumDoc, PCorreo, PRutaImagen, 'Activo', PFechaRegistro);

	IF ROW_COUNT() > 0 THEN
		SET idpersona = LAST_INSERT_ID();
		SET success = 1;
		SET message = "OK";
	ELSE
		SET success = 0;
		SET message = "No se Registro nada en la Tabla Persona, el procedimiento Almacenado 'sp_PersonaInsertar' Tiene Fallas";
	END IF;

	COMMIT;
END;

CREATE PROCEDURE `sp_PrestamoInsertar`(
    PIdUserEmpresa INT,
    PIdCliente INT,
    PTipoMoneda INT,
    PTipoPrestamo INT,
    PPorcentajeInteres INT,
    PMontoInteres DECIMAL(32,2),
    PMontoPrestado DECIMAL(32,2),
    PMontoCalculado DECIMAL(32,2),
    PMontoDevolucion DECIMAL(32,2),
    PFechaRegistro DATETIME,
    PIdTipoPago INT,  
    pFechaPago varchar(500),
    PCuotas INT, 
    PMontoCuota DECIMAL(32,2),
    PFechaVencimiento DATETIME, 
    PObservacionPrestamo VARCHAR(500),
    OUT idprestamo INT,
    OUT success BIT,
    OUT message VARCHAR(500)
)
BEGIN
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET success = 0;
        SET message = "Violación de restricción de clave foránea o error en la base de datos";
    END;

    START TRANSACTION;

    -- Inserción en la tabla Prestamo (incluye tanto datos del préstamo como los del plazo)
    INSERT INTO prestamo( IdUserEmpresa, IdCliente,  TipoMoneda,  TipoPrestamo, PorcentajeInteres,  MontoInteres, MontoPrestado, MontoCalculado, MontoDevolucion,  Estado, FechaRegistro, IdTipoPago,FechaPago, Cuotas, MontoCuota, FechaVencimiento, ObservacionPrestamo )
    VALUES(  PIdUserEmpresa, PIdCliente, PTipoMoneda, PTipoPrestamo,  PPorcentajeInteres, PMontoInteres, PMontoPrestado, PMontoCalculado, PMontoDevolucion, 'Activo', PFechaRegistro, PIdTipoPago, pFechaPago, PCuotas, PMontoCuota, PFechaVencimiento,  PObservacionPrestamo );

    IF ROW_COUNT() > 0 THEN
        SET idprestamo = LAST_INSERT_ID();
        SET success = 1;
        SET message = "Prestamo Insertado Exitosamente";
    ELSE
        SET idprestamo = 0;
        SET success = 0;
        SET message = "No se pudo registrar el préstamo";
    END IF;

    COMMIT;
END;

CREATE PROCEDURE `sp_PrestamoEstado`(
    IN sp_IdPrestamo INT,
    IN sp_Estado VARCHAR(500),
    OUT success BIT,
    OUT message VARCHAR(500)
)
BEGIN
    DECLARE EstadoActual VARCHAR(500) DEFAULT '';
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET success = 0;
        SET message = "Violación de restricción de clave foránea o error en la base de datos, el sp_PrestamoReciclar Fallando";
    END;

    START TRANSACTION;
    
    -- Obtener el estado actual del préstamo
    SELECT Estado INTO EstadoActual FROM prestamo WHERE IdPrestamo = sp_IdPrestamo;
    
    -- Si el estado actual es igual al nuevo estado, no hace nada
    IF (EstadoActual = sp_Estado) THEN
        SET success = 1;
        SET message = CONCAT("Prestamo ", sp_Estado, " Exitosamente");
    ELSE
        -- Actualiza el estado del préstamo
        UPDATE prestamo SET Estado = sp_Estado WHERE IdPrestamo = sp_IdPrestamo;
        
        -- Si la actualización fue exitosa, devuelve un mensaje de éxito
        IF ROW_COUNT() > 0 THEN
            SET success = 1;
            SET message = CONCAT("Prestamo ", sp_Estado, " Exitosamente");
        ELSE
            -- Si no se actualizó, devuelve un mensaje de error
            SET success = 0;
            SET message = CONCAT("El Prestamo No Fue ", sp_Estado, ".");
        END IF;
    END IF;

    COMMIT;
END;

CREATE PROCEDURE `sp_UserClienteInsertar`(
	ueIdEmpresa INT,
    ueIdUsuario INT,
    ueIdTipoRango INT,
    ueFechaRegistro DATETIME,
    OUT IdUserEmpresa int,
    OUT success bit,
    OUT message varchar(500)
)
BEGIN
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
		SET success = 0;
		SET message = "Violación de restricción de clave foránea o error en la base de datos";
	END;

	START TRANSACTION;
    
	INSERT INTO userempresa(IdEmpresa, IdUsuario, TipoRango, Estado, FechaRegistro)
    VALUES(ueIdEmpresa,ueIdUsuario,ueIdTipoRango,'Activo',ueFechaRegistro);
    
    IF ROW_COUNT() > 0 THEN
		SET IdUserEmpresa = LAST_INSERT_ID();
		SET success = 1;
        SET message = "OK";
	ELSE
		SET success = 0;
        SET message = "el Procedimiento almacenado 'sp_UserEmpresaInsertar', no se registro el usuario en la Empresa,";
    END IF;
    
    COMMIT;
END;


CREATE PROCEDURE `sp_UserEmpresaInsertar`(
	ueIdEmpresa INT,
    ueIdUsuario INT,
    ueFechaRegistro DATETIME,
    OUT IdUserEmpresa int,
    OUT success bit,
    OUT message varchar(500)
)
BEGIN
	DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
	BEGIN
		ROLLBACK;
		SET success = 0;
		SET message = "Violación de restricción de clave foránea o error en la base de datos";
	END;

	START TRANSACTION;
    
	INSERT INTO userempresa(IdEmpresa, IdUsuario, Estado, FechaRegistro)
    VALUES(ueIdEmpresa,ueIdUsuario,'Activo',ueFechaRegistro);
    
    IF ROW_COUNT() > 0 THEN
		SET IdUserEmpresa = LAST_INSERT_ID();
		SET success = 1;
        SET message = "OK";
	ELSE
		SET success = 0;
        SET message = "el Procedimiento almacenado 'sp_UserEmpresaInsertar', no se registro el usuario en la Empresa,";
    END IF;
    
    COMMIT;
END;


CREATE PROCEDURE `sp_UsuarioInsertar`(
	UIdPersona INT,
    UIdRol INT,
    ULogin varchar(800),
    UClave VARCHAR(500),
    UToken VARCHAR(800),
    UFechaRegistro DATETIME,
    OUT IdUsuario INT,
    OUT success bit,
    OUT message VARCHAR(500)
)
BEGIN
	INSERT INTO usuario(IdPersona, IdRol, Login, Clave, Token, Estado,FechaRegistro)
    VALUES (UIdPersona,UIdRol,ULogin,UClave,UToken,'Activo',UFechaRegistro);
    
    IF ROW_COUNT() > 0 THEN
		SET IdUsuario =  LAST_INSERT_ID();
        SET message = "OK";
        SET success = 1;
	ELSE
        SET message = "Hubo un Error en la Base datos, No se Registro nada en la Tabla Usuario, el procedimiento Almacenado 'sp_UsuarioInsertar' Tiene Fallas";
        SET success = 0;
    END IF;    
END;

CREATE PROCEDURE sp_UsuarioEliminar(
    ceIdUsuario INT,
    OUT success bit,
    OUT message VARCHAR(800)
)
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejo de error SQL genérico
        SET success = 0;
        SET message = "Ocurrió un error en la base de datos.";
        ROLLBACK;  -- Deshace cualquier cambio en caso de error.
    END;

    START TRANSACTION;
    
    -- Verifica la acción y actualiza el estado
	UPDATE usuario SET Estado = 'Eliminado' WHERE IdUsuario = ceIdUsuario;
    
    -- Revisa si se actualizó exactamente una fila
    IF ROW_COUNT() = 1 THEN
		SET success = 1;
        SET message = "Eliminado correctamente.";
        COMMIT;
	ELSE
		SET success = 0;
        SET message = "No se actualizó ningún registro. Por favor, verifique el ID del Usuario.";
        ROLLBACK;
    END IF;    
END;
//
