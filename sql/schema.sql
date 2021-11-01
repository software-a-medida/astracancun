-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-01-2019 a las 21:55:06
-- Versión del servidor: 10.0.37-MariaDB-0+deb8u1
-- Versión de PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `astra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `allies`
--

CREATE TABLE `allies` (
  `id_allie` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `logotype` text NOT NULL,
  `website` text,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id_blog` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `seo` text NOT NULL,
  `cover` text NOT NULL,
  `gallery` text,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_payment_invalid`
--

CREATE TABLE `com_payment_invalid` (
  `id_payment_invalid` bigint(20) NOT NULL,
  `txn_id` text CHARACTER SET latin1 NOT NULL,
  `payer_email` text CHARACTER SET latin1 NOT NULL,
  `data` longtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_payment_settings`
--

CREATE TABLE `com_payment_settings` (
  `id_setting` bigint(20) NOT NULL,
  `email_notifications` text,
  `email_paypal_account` text,
  `conekta_private_key` text,
  `conekta_public_key` text,
  `conekta_oxxopay_expires` int(11) NOT NULL DEFAULT '5',
  `currency` text NOT NULL,
  `extra_charge` int(11) DEFAULT NULL,
  `sandbox` set('1','0') NOT NULL DEFAULT '0',
  `debug` set('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `com_payment_settings`
--

INSERT INTO `com_payment_settings` (`id_setting`, `email_notifications`, `email_paypal_account`, `conekta_private_key`, `conekta_public_key`, `conekta_oxxopay_expires`, `currency`, `extra_charge`, `sandbox`, `debug`) VALUES
(1, 'paypal@astracancun.org', 'paypal@astracancun.org', NULL, NULL, 0, 'MXN', NULL, '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_payment_tmp`
--

CREATE TABLE `com_payment_tmp` (
  `id_tmp` bigint(20) NOT NULL,
  `data` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_payment_verified`
--

CREATE TABLE `com_payment_verified` (
  `id_payment_verified` int(11) NOT NULL,
  `payment_method` text COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` text CHARACTER SET latin1 NOT NULL,
  `payer_email` text CHARACTER SET latin1 NOT NULL,
  `data` longtext CHARACTER SET latin1 NOT NULL,
  `status_payment` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

CREATE TABLE `donations` (
  `id_donation` bigint(20) NOT NULL,
  `description` text,
  `type` enum('especie','dinero','tiempo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programs`
--

CREATE TABLE `programs` (
  `id_program` bigint(20) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `seo` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` text COLLATE utf8_unicode_ci NOT NULL,
  `gallery` text COLLATE utf8_unicode_ci,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `programs`
--

INSERT INTO `programs` (`id_program`, `name`, `description`, `seo`, `cover`, `gallery`, `priority`) VALUES
(1, '{\"es\":\"Atenci\\u00f3n Temprana del Autismo\",\"en\":\"Early Intervention for Autism\"}', '{\"es\":\"A trav\\u00e9s de programas de difusi\\u00f3n sobre los signos precoces del autismo, se promueve la detecci\\u00f3n temprana en infantes para ser atendidos con el modelo Denver, desde los 18 meses a los 4 a\\u00f1os. Los padres de familia reciben formaci\\u00f3n a trav\\u00e9s del modelo educativo \\u201cser padres\\u201d.\",\"en\":\"Through programs sharing information regarding the early signs of autism, early detection in infants is promoted to be benefitted with the Denver model, from 18 months to 4 years. Parents receive training through the educational model \\\"being parents\\\".\"}', '{\"keywords\":{\"es\":\"intervenci\\u00f3n temprana,autismo,infantes,ni\\u00f1os,escuela,discapacidad,TEA,espectro,autista,educaci\\u00f3n,especial\",\"en\":\"early,intervention,special,education,autismo,child,children,school,therapy\"},\"description\":{\"es\":\"La intervenci\\u00f3n temprana en el autismo es de suma importancia ya que entre m\\u00e1s temprano se intervenga, el pron\\u00f3stico del peque\\u00f1o o la peque\\u00f1a ser\\u00e1 m\\u00e1s favorecedor. \",\"en\":\"Early intervention in autism is very important to improve the outlook in the development of the child with the spectrum.\"}}', 'PyZ9tYbg7UK5GLei.jpeg', NULL, NULL),
(2, '{\"es\":\"CENTRO ESCOLAR ASTRA\",\"en\":\"ASTRA SCHOOL CENTER\"}', '{\"es\":\"Es el colegio de ni\\u00f1os y ni\\u00f1as con autismo entre 4 y 13 a\\u00f1os. Se promueve la ense\\u00f1anza de destrezas cognitivas, acad\\u00e9micas, psicomotoras y comunicativas, adem\\u00e1s los ni\\u00f1os y ni\\u00f1as inician su formaci\\u00f3n en habilidades art\\u00edsticas y deportivas.\",\"en\":\"This school center is designed for boys and girls with autism spectrum disorder between the ages of 4 and 13. It promotes education in cognitive, academic, psychomotor and language areas. Plus, boys and girls will begin developing their artistic and sport aptitudes.\"}', '{\"keywords\":{\"es\":\"autismo,educaci\\u00f3n,centro,educativo,astra,CEA,TEA,ense\\u00f1anza,denver,m\\u00e9todo,psicomotor,lenguaje,destrezas\",\"en\":\"skills,school,center,children,girls,boys,autism,young,infants,denver,method,language,cognitive,psychomotor\"},\"description\":{\"es\":\"El Centro Escolar Astra es un espacio dise\\u00f1ado para los ni\\u00f1os y ni\\u00f1as de 4 a 13 a\\u00f1os con Trastorno del Espectro Autista. \",\"en\":\"Astra School Center is an education center designed for boys and girls between the ages of 4 and 13 with Autism Spectrum Disorder.\"}}', 'l3Er4q9aVxEDDByh.jpeg', NULL, NULL),
(3, '{\"es\":\"CENTRO PSICOPEDAG\\u00d3GICO\",\"en\":\"PSYCHOPEDAGOGICAL CENTER\"}', '{\"es\":\"Es el \\u00e1rea terap\\u00e9utica que brinda servicios de evaluaci\\u00f3n psicopedag\\u00f3gica y se imparten terapias personalizadas a ni\\u00f1os, ni\\u00f1as y adolescentes con alg\\u00fan trastorno del neurodesarrollo: terapias de lenguaje y comunicaci\\u00f3n, psicomotricidad, conducta, desarrollo cognitivo, aprendizaje y teor\\u00eda de la mente.\",\"en\":\"It is a therapeutic space designated to provide psychopedagogical assessment services.  Personalized therapies are given to children and adolescents with a neurodevelopmental disorder: language and communication therapies, psychomotricity, behavior, cognitive development, learning and theory of mind.\"}', '{\"keywords\":{\"es\":\"terapia,psicoterapia,psicolog\\u00eda,especialistas,autismo,neurodesarrollo,canc\\u00fan,astra,psic\\u00f3loga,terap\\u00e9uta,bienestar,lenguaje\",\"en\":\"specialist,therapist,neurodevelopmental,cancun,astra,psychologist,autism,language,motor,skills,improve\"},\"description\":{\"es\":\"Espacio designado para terapia individual en el cual se atienden a ni\\u00f1os, ni\\u00f1as y adolescentes con problemas en el neurodesarrollo.\",\"en\":\"Designated space to provide therapy for boys, girls and adolescents with neurodevelopmental disorders.\"}}', '885WEN4iH7Q8OLBg.jpeg', NULL, NULL),
(5, '{\"es\":\"CASA ASTRA, UNA ESCUELA PARA LA VIDA\",\"en\":\"ASTRA HOME, A SCHOOL FOR LIFE\"}', '{\"es\":\"Se encarga de brindar servicios educativos a j\\u00f3venes con autismo y discapacidad intelectual desde los 13 a\\u00f1os en adelante, con el objetivo de fomentar destrezas de la vida independiente personal, vida en el hogar y en la comunidad. Alberga los talleres de arte, cocina, lavander\\u00eda y manualidades. Orienta a las familias para ayudarlas a establecer proyectos de vida para sus hijos.\",\"en\":\"It is responsible for providing educational services to young adults with autism and intellectual disabilities from 13 years of age and older, with the aim of enabling independent personal life skills useful in life at home and in the community. It includes art workshops, cooking, laundry and crafts. It also instructs families on ways to establish life projects for their children.\"}', '{\"keywords\":{\"es\":\"casa,astra,adultos,adolescentes,j\\u00f3venes,discapacidad,intelectual,neurodesarrollo,autismo,cancun,independiente,asperger,vida,bienestar,familia,habilidades,arte\",\"en\":\"casa,astra,adultos,adolescentes,j\\u00f3venes,discapacidad,intelectual,neurodesarrollo,autismo,cancun,independiente,asperger,vida,bienestar,familia,habilidades,arte\"},\"description\":{\"es\":\"Espacio para j\\u00f3venes a partir de los 13 a\\u00f1os de edad donde se integran para aprender destrezas \\u00fatiles para la vida diaria independiente ya sea en el hogar y en la sociedad.  El programa se complementa con actividades deportivas, art\\u00edsticas, de cocina y lavander\\u00eda.\",\"en\":\"Segment destined for young people from 13 years of age onwards where they are encouraged to learn skills that will seek to allow independent daily life either at home and in society. The program is complemented with sports, artistic, cooking and laundry activities.\"}}', 'QX3ZWzN5D0cKDKAE.jpeg', NULL, NULL),
(6, '{\"es\":\"Club Tiburones de Astra\",\"en\":\"Astra Sharks Club\"}', '{\"es\":\"Es un club acreditado por el subprograma Quintana Roo de Special Olympics M\\u00e9xico y de la Federaci\\u00f3n Mexicana de Deportistas Especiales. Se realiza entrenamiento en las disciplinas de nataci\\u00f3n, atletismo, ciclismo y b\\u00e1squetbol a nivel recreativo y competitivo. Participan personas con autismo y discapacidad intelectual desde la categor\\u00eda infantil hasta la vida adulta.\",\"en\":\"Sports club accredited by the Quintana Roo subprogram of Special Olympics Mexico and the Mexican Federation of Special Sportsmen. Training in the disciplines of swimming, athletics, cycling and basketball at both a recreational and competitive level. People with autism and intellectual disability participate from the infantile category to the adult life.\"}', '{\"keywords\":{\"es\":\"deportes,especiales,autismo,discapacidad,intelectual,educaci\\u00f3n,f\\u00edsica,inclusivo,deporte,nataci\\u00f3n,atletismo,b\\u00e1squetbol,ciclismo,competencia,competitivo,recreativo\",\"en\":\"autism,sports,swim,run,bike,baskebtall,inclusive,sport,competitive,special,olympics,cancun,quintanaroo\"},\"description\":{\"es\":\"Tiburones de Astra es un club deportivo dise\\u00f1ado para entrenar a atletas desde categor\\u00eda infantil hasta la vida adulta tanto recreativos como para competencias en las destrezas de nataci\\u00f3n, atletismo, ciclismo y basketbol.\",\"en\":\"Astra Sharks is a sports club designed to train athletes from children\'s category to adult life both recreational and for competitive performances in the categories of swimming, athletism, cycling and basketball. \"}}', 'CC22xw8qrc3RloWA.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id_setting` bigint(20) NOT NULL,
  `logotypes` text NOT NULL,
  `covers` text,
  `backgrounds` text,
  `seo` text NOT NULL,
  `about` text NOT NULL,
  `contact` text NOT NULL,
  `currency_exchange` text,
  `notices` text NOT NULL,
  `videos` text,
  `donate_min_amount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id_setting`, `logotypes`, `covers`, `backgrounds`, `seo`, `about`, `contact`, `currency_exchange`, `notices`, `videos`, `donate_min_amount`) VALUES
(1, '{\"color\":\"logotype.png\",\"black\":\"logotype_black.png\",\"white\":\"logotype_white.png\"}', '{\"home\":[\"slide1.png\",\"slide2.png\"],\"programs\":\"programs.png\",\"donations\":\"donations.png\",\"blog\":\"blog.png\",\"about\":\"about.png\",\"contact\":\"contact.png\"}', '{\"about\":[\"history.png\",\"government.png\",\"team.png\"]}', '{\"keywords\":{\"home\":{\"es\":\"Lorem ipsum dolor sit\",\"en\":\"Lorem ipsum dolor sit\"},\"programs\":{\"es\":\"Lorem ipsum dolor sit\",\"en\":\"Lorem ipsum dolor sit\"},\"donations\":{\"es\":\"Lorem ipsum dolor sit\",\"en\":\"Lorem ipsum dolor sit\"},\"blog\":{\"es\":\"Lorem ipsum dolor sit\",\"en\":\"Lorem ipsum dolor sit\"},\"about\":{\"es\":\"Lorem ipsum dolor sit\",\"en\":\"Lorem ipsum dolor sit\"},\"contact\":{\"es\":\"Lorem ipsum dolor sit\",\"en\":\"Lorem ipsum dolor sit\"}},\"descriptions\":{\"home\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\"},\"programs\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\"},\"donations\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\"},\"blog\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\"},\"about\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\"},\"contact\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commo\"}},\"titles\":{\"home\":{\"es\":\"Bievenidos a Astra, A.C.\",\"en\":\"Welcome to Astra, A.C.\"},\"programs\":{\"es\":\"Nuestos programas\",\"en\":\"Our programs\"},\"donations\":{\"es\":\"Se un aliado ...\",\"en\":\"Be an allie ...\"},\"blog\":{\"es\":\"Informate\",\"en\":\"Get informed\"},\"about\":{\"es\":\"Conoce m\\u00e1s sobre nosotros\",\"en\":\"Know more about us\"},\"contact\":{\"es\":\"Cont\\u00e1ctanos\",\"en\":\"Contact us\"},\"slogan\":{\"es\":\"Bienestar para personas con autismo\",\"en\":\"Wellness for people with autism\"}}}', '{\"description\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"},\"mission\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"},\"vission\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"},\"values\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"},\"history\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"},\"organ_government\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"}}', '{\"email\":\"contacto@miempresa.com\",\"phone\":\"+(52) 012 345 6789\",\"social_media\":{\"facebook\":\"astracancun\",\"instagram\":\"astracancun\",\"twitter\":\"astracancun\"},\"address\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo\"}', '{\"MXN\":1,\"USD\":18,\"EUR\":21}', '{\"privacy\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"},\"transparency\":{\"es\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\",\"en\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,\"}}', '{\"home\":[\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\"],\"programs\":[\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\"],\"donations\":[\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\"],\"about\":[\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\",\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\",\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\",\"https:\\/\\/www.youtube.com\\/embed\\/YvJYdzA_eGM\"]}', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stories`
--

CREATE TABLE `stories` (
  `id_storie` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `cover` text NOT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE `team` (
  `id_team` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `semblance` text NOT NULL,
  `avatar` text NOT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`id_team`, `name`, `position`, `semblance`, `avatar`, `priority`) VALUES
(1, 'Diana Angelica Dávalos Castilla', '{\"es\":\"Presidente\",\"en\":\"President\"}', '{\"es\":\"Presidente de la mesa directiva de Asociaci\\u00f3n de Ayuda a Ni\\u00f1os con Trastornos en el Desarrollo A.C.\",\"en\":\"President of the Board of Directors of the Association for Help to Children with Developmental Disorders A.C.\"}', 'kf7oovcUd83coVRN.jpeg', NULL),
(2, 'Psic. Ebert May Chiquil', '{\"es\":\"Coordinador Psicopedag\\u00f3gico\",\"en\":\"Psychopedagogical Coordinator\"}', '{\"es\":\"Psicoterapeuta especializado en el modelo Denver ESDM (Early Start Denver Model), creado por el institito Mind de la Universidad de California Davis. \",\"en\":\"Psychotherapist specialized in the Denver ESDM model (Early Start Denver Model), created by the Mind Institute of the University of California Davis. \"}', 'ypmotXOVgvfWtfBO.jpeg', NULL),
(3, 'Lic. Paulina Ramírez ', '{\"es\":\"Enlace Intitucional\",\"en\":\"institutional liaison \"}', '{\"es\":\"Enlace con donantes y desarrollo en el \\u00e1rea creativa de Astra.\",\"en\":\"Liaison with donors and development in the creative area of Astra.\"}', '4ua5ehypiO52FM3H.jpeg', NULL),
(4, 'Lic. Belen García Ancona', '{\"es\":\"Coordinaci\\u00f3n de Proyectos\",\"en\":\"project coordination\"}', '{\"es\":\"Gesti\\u00f3n t\\u00e9cnica y financiera de la ejecuci\\u00f3n de proyectos que financien programas de la instituci\\u00f3n. \",\"en\":\"Technical and financial management of the execution of projects that finance programs of the institution.\"}', 'l5mVH5V2wBfSwxfG.jpeg', NULL),
(5, 'Psic. Yessica Puc Gamboa', '{\"es\":\"Coordinaci\\u00f3n Casa Astra\",\"en\":\"Casa Astra Coordination\"}', '{\"es\":\"Gest\\u00edon, planificaci\\u00f3n y supervisi\\u00f3n de actividades junto a maestros y terapeutas para los j\\u00f3venes de Casa Astra \\\"Una Escuela para la vida\\\"\",\"en\":\"Management, planning and supervision of activities together with teachers and therapists for the young people of Casa Astra \\\"A School for life\\\"\"}', 'ag7FhhMSNBngBHue.jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeline`
--

CREATE TABLE `timeline` (
  `id_timeline` bigint(20) NOT NULL,
  `year` text NOT NULL,
  `description` text NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `fullname` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_level` bigint(20) NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `email`, `username`, `password`, `id_user_level`, `avatar`, `status`) VALUES
(1, 'Code Monkey', 'soporte@codemonkey.com.mx', 'codemonkey', 'a10690baff4ca0f535bbc8c56d746d84b7e69324:4nwJSpwEB3Fjiw8VUgFM36urbllu3v4ghBKDthyzFLOmUoMPpz2PZQ5e2KCXiXRX', 1, NULL, 1),
(2, 'Astra Cancún', NULL, 'bunker', '396d6e4e0b213a76044f4dba1b58e383dfdec38e:lFyBTOnlDVzH3SakBPEY8HQX1EMKaTOTVADZrfhCCBuw4WCO3kIPua3Sp7X0hVYY', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_levels`
--

CREATE TABLE `users_levels` (
  `id_user_level` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `code` text NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users_levels`
--

INSERT INTO `users_levels` (`id_user_level`, `name`, `code`, `priority`) VALUES
(1, 'Propietario', '{owner}', 1),
(2, 'Administrador', '{administrator}', 2),
(3, 'Editor', '{editor}', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `allies`
--
ALTER TABLE `allies`
  ADD PRIMARY KEY (`id_allie`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `com_payment_invalid`
--
ALTER TABLE `com_payment_invalid`
  ADD PRIMARY KEY (`id_payment_invalid`);

--
-- Indices de la tabla `com_payment_settings`
--
ALTER TABLE `com_payment_settings`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indices de la tabla `com_payment_tmp`
--
ALTER TABLE `com_payment_tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- Indices de la tabla `com_payment_verified`
--
ALTER TABLE `com_payment_verified`
  ADD PRIMARY KEY (`id_payment_verified`);

--
-- Indices de la tabla `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id_donation`);

--
-- Indices de la tabla `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id_program`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indices de la tabla `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id_storie`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indices de la tabla `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id_timeline`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_level` (`id_user_level`);

--
-- Indices de la tabla `users_levels`
--
ALTER TABLE `users_levels`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `allies`
--
ALTER TABLE `allies`
  MODIFY `id_allie` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `com_payment_invalid`
--
ALTER TABLE `com_payment_invalid`
  MODIFY `id_payment_invalid` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `com_payment_settings`
--
ALTER TABLE `com_payment_settings`
  MODIFY `id_setting` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `com_payment_tmp`
--
ALTER TABLE `com_payment_tmp`
  MODIFY `id_tmp` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `com_payment_verified`
--
ALTER TABLE `com_payment_verified`
  MODIFY `id_payment_verified` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `id_donation` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programs`
--
ALTER TABLE `programs`
  MODIFY `id_program` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id_setting` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stories`
--
ALTER TABLE `stories`
  MODIFY `id_storie` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
  MODIFY `id_team` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id_timeline` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users_levels`
--
ALTER TABLE `users_levels`
  MODIFY `id_user_level` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_user_level`) REFERENCES `users_levels` (`id_user_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
