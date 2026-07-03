-- Step: 01
-- **************************************************************
-- Doel : Maak een nieuwe database aan met de naam MVC_Basics_2509AB
-- **************************************************************
-- Versie   Datum       Auteur               Omschrijving
-- ******   *****        *****                *************
-- 01       10-02-2026   Kelvin Fillinag       Smartphones
-- **************************************************************


DROP DATABASE IF exists MVC_Basics_2509AB;
CREATE DATABASE MVC_Basics_2509AB;
USE MVC_Basics_2509AB;


-- Step: 02
-- ************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Smartphones
-- ************************************************************
-- Versie  Datum       Auteur             Omschrijving
-- 01      10-02-2026  Kelvin Filliang    Tabel Smartphones
-- ************************************************************
-- Onderstaande velden toevoegen aan de tabel Smartphones
-- Merk, Model, Prijs, Geheugen, Besturingssysteem,
-- Schermgrootte, Releasedatum, MegaPixels
-- ************************************************************



CREATE TABLE Smartphones
(
    Id               SMALLINT UNSIGNED    NOT NULL AUTO_INCREMENT
   ,Merk             VARCHAR(50)          NOT NULL
   ,Model            VARCHAR(50)          NOT NULL
   ,Prijs            DECIMAL(6,2)         NOT NULL
   ,Geheugen         DECIMAL(4,0)         NOT NULL
   ,Besturingssysteem VARCHAR(25)         NOT NULL
   ,Schermgrootte    DECIMAL(3,2)         NOT NULL
   ,Releasedatum     DATE                 NOT NULL
   ,MegaPixels       DECIMAL(3,0)         NOT NULL
   ,IsActief         BIT                  NOT NULL DEFAULT 1
   ,Opmerking        VARCHAR(255)             NULL DEFAULT NULL
   ,DatumAangemaakt  DATETIME(6)          NOT NULL DEFAULT NOW(6)
   ,DatumGewijzigd   DATETIME(6)          NOT NULL DEFAULT NOW(6)
   ,CONSTRAINT       PK_Smartphones_Id    PRIMARY KEY (Id)
) ENGINE=InnoDB;

-- Step: 05
-- ****************************************************************************************
-- Doel : Vul de tabel Smartphones met gegevens
-- ****************************************************************************************
-- Versie  Datum        Auteur            Omschrijving
-- 01      10-02-2026   Kelvin Filliang   
-- ****************************************************************************************





INSERT INTO Smartphones
(
     Merk
    ,Model
    ,Prijs
    ,Geheugen
    ,Besturingssysteem
    ,Schermgrootte
    ,Releasedatum
    ,MegaPixels
)
VALUES
('Sony', 'Xperia 1 VI', 1399.99, 256, 'Android 15', 6.5, '2025-03-01', 45),
('Sony', 'Xperia 5 VI', 999.99, 128, 'Android 15', 6.1, '2025-03-02', 60),
('Huawei', 'P70 Pro', 1199.00, 512, 'HarmonyOS 5', 6.8, '2025-02-15', 80),
('Huawei', 'Mate 70', 1299.00, 1024, 'HarmonyOS 5', 6.9, '2025-02-20', 70),
('Oppo', 'Find X8 Pro', 1099.99, 512, 'Android 15', 6.7, '2025-01-30', 95),
('Oppo', 'Reno 12', 699.99, 256, 'Android 15', 6.5, '2025-01-18', 120),
('Vivo', 'X100 Pro+', 1199.99, 512, 'Android 15', 6.78, '2025-02-05', 85),
('Vivo', 'V30 Pro', 799.99, 256, 'Android 15', 6.6, '2025-01-25', 110),
('Motorola', 'Edge 50 Ultra', 999.99, 512, 'Android 15', 6.7, '2025-02-10', 75),
('Motorola', 'Moto G85', 399.99, 128, 'Android 15', 6.5, '2025-01-12', 150),

('Realme', 'GT 6 Pro', 649.99, 256, 'Android 15', 6.6, '2025-01-20', 130),
('Realme', 'Narzo 80', 299.99, 128, 'Android 15', 6.5, '2025-01-10', 200),
('Asus', 'ROG Phone 9', 1399.99, 1024, 'Android 15', 6.78, '2025-02-12', 55),
('Asus', 'Zenfone 11', 899.99, 256, 'Android 15', 5.9, '2025-02-01', 90),
('Nokia', 'X60 Pro', 749.99, 256, 'Android 15', 6.4, '2025-01-28', 100),
('Nokia', 'G500', 349.99, 128, 'Android 15', 6.5, '2025-01-15', 180),
('Honor', 'Magic 7 Pro', 1099.99, 512, 'Android 15', 6.81, '2025-02-18', 95),
('Honor', '90 Lite', 399.99, 128, 'Android 15', 6.7, '2025-01-22', 140),
('ZTE', 'Axon 50 Ultra', 899.99, 512, 'Android 15', 6.8, '2025-02-08', 85),
('ZTE', 'Blade V70', 299.99, 128, 'Android 15', 6.5, '2025-01-14', 160),

-- variaties (doorgaan tot 100)
('Sony', 'Xperia 1 VI', 1379.99, 512, 'Android 15', 6.5, '2025-03-03', 40),
('Huawei', 'P70 Pro', 1179.00, 256, 'HarmonyOS 5', 6.8, '2025-02-17', 75),
('Oppo', 'Find X8 Pro', 1079.99, 256, 'Android 15', 6.7, '2025-02-01', 90),
('Vivo', 'X100 Pro+', 1159.99, 256, 'Android 15', 6.78, '2025-02-07', 80),
('Motorola', 'Edge 50 Ultra', 979.99, 256, 'Android 15', 6.7, '2025-02-12', 70),
('Realme', 'GT 6 Pro', 629.99, 512, 'Android 15', 6.6, '2025-01-22', 120),
('Asus', 'ROG Phone 9', 1429.99, 1024, 'Android 15', 6.78, '2025-02-15', 50),
('Nokia', 'X60 Pro', 729.99, 512, 'Android 15', 6.4, '2025-01-30', 95),
('Honor', 'Magic 7 Pro', 1129.99, 1024, 'Android 15', 6.81, '2025-02-20', 90),
('ZTE', 'Axon 50 Ultra', 879.99, 256, 'Android 15', 6.8, '2025-02-10', 80),

-- laatste reeks
('Sony', 'Xperia 5 VI', 979.99, 256, 'Android 15', 6.1, '2025-03-05', 55),
('Huawei', 'Mate 70', 1279.00, 512, 'HarmonyOS 5', 6.9, '2025-02-22', 65),
('Oppo', 'Reno 12', 679.99, 128, 'Android 15', 6.5, '2025-01-20', 110),
('Vivo', 'V30 Pro', 779.99, 512, 'Android 15', 6.6, '2025-01-27', 100),
('Motorola', 'Moto G85', 379.99, 256, 'Android 15', 6.5, '2025-01-14', 140),
('Realme', 'Narzo 80', 279.99, 64, 'Android 15', 6.5, '2025-01-12', 210),
('Asus', 'Zenfone 11', 879.99, 512, 'Android 15', 5.9, '2025-02-03', 85),
('Nokia', 'G500', 329.99, 64, 'Android 15', 6.5, '2025-01-18', 170),
('Honor', '90 Lite', 379.99, 256, 'Android 15', 6.7, '2025-01-24', 130),
('ZTE', 'Blade V70', 279.99, 64, 'Android 15', 6.5, '2025-01-16', 150);



-- Step: 04
-- ****************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Sneakers
-- ****************************************************************************************
-- Versie  Datum        Auteur            Omschrijving
-- 01      10-02-2026   Kelvin filliang   Tabel Sneakers
-- ****************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Sneakers
-- Type (Hardloop, Basketbal, Casual), Prijs, Materiaal (Leer, Mesh, Synthetisch),
-- Gewicht, Releasedatum
-- ****************************************************************************************

CREATE TABLE Sneakers
(
   Id              SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT
  ,Merk            VARCHAR(50)        NOT NULL
  ,Model           VARCHAR(50)        NOT NULL
  ,Type            VARCHAR(25)        NOT NULL
  ,Prijs            DECIMAL(6,2)       NOT NULL
  ,Materiaal        VARCHAR(50)        NOT NULL
  ,Gewicht         VARCHAR(50)         not null
  ,Releasedatum     DATE               not NULL   
  ,IsActief        BIT                NOT NULL DEFAULT 1
  ,Opmerking       VARCHAR(255)            NULL DEFAULT NULL
  ,DatumAangemaakt DATETIME(6)        NOT NULL DEFAULT NOW(6)
  ,DatumGewijzigd  DATETIME(6)        NOT NULL DEFAULT NOW(6)
  ,CONSTRAINT PK_Sneakers_Id PRIMARY KEY (Id)
)
ENGINE = InnoDB;

-- Step: 05
-- ****************************************************************************************
-- Doel : Vul de tabel Sneakers met gegevens
-- ****************************************************************************************
-- Versie  Datum        Auteur            Omschrijving
-- 01      10-02-2026   Kelvin Filliang   Vulling Sneakers
-- ****************************************************************************************

INSERT INTO Sneakers
(
   Merk
  ,Model
  ,Type
  ,Prijs           
  ,Materiaal        
  ,Gewicht         
  ,Releasedatum 
)
VALUES
 ('Nike', 'Air Jordan 1', 'Hardloop', 189.99, 'Leer', 420, '1985-09-15')
,('Adidas', 'Yeezy Boost 350', 'Basketbal', 229.99, 'Mesh', 340, '2015-06-27')
,('New Balance', 'Pixel 9 Pro', 'Casual', 149.99, 'Synthetisch', 360, '2023-10-04')
,('Trico', 'New Age', 'Casual', 89.99, 'Synthetisch', 390, '2022-05-12')
,('Overlord', 'Tristar 6', 'Hardloop', 119.99, 'Mesh', 310, '2021-08-20')
,('Horka', 'Skyward', 'Hardloop', 99.99, 'Mesh', 320, '2020-03-18')
,('Nike', 'Air Max 90', 'Casual', 159.99, 'Leer', 400, '1990-03-26')
,('Adidas', 'Gazelle', 'Casual', 109.99, 'Leer', 350, '1968-07-01');

-- Step: 06
-- ************************************************************************************
-- Doel : Maak een nieuwe tabel aan met de naam Horloges
-- ************************************************************************************
-- Versie      Datum          Auteur               Omschrijving
-- ****** ***** ****** ************
-- 01          11-02-2026     Arjan de Ruijter     Tabel Horloges
-- ************************************************************************************
-- Onderstaande velden toevoegen aan de tabel Horloges
-- Materiaal (Goud, Diamant, RVS), Gewicht, Releasedatum, Waterdichtheid(m), Type (Analoog, Digitaal),
-- Uniek kenmerk
-- ************************************************************************************

CREATE TABLE Horloges
(
   Id                SMALLINT         UNSIGNED   NOT NULL       AUTO_INCREMENT
  ,Merk              VARCHAR(50)                 NOT NULL
  ,Model             VARCHAR(50)                 NOT NULL
  ,Prijs             DECIMAL(6,0)                NOT NULL
  ,Materiaal         VARCHAR(50)                 NOT NULL
  ,Gewicht           VARCHAR(50)                 NOT NULL
  ,Releasedatum       DATE                        NOT NULL
  ,Waterdichtheid     SMALLINT       UNSIGNED     NOT NULL  
  ,HorlogeType       VARCHAR(50)                  NOT NULL  
  ,IsActief          BIT                         NOT NULL       DEFAULT 1
  ,Opmerking         VARCHAR(255)                NULL           DEFAULT NULL
  ,DatumAangemaakt   DATETIME(6)                 NOT NULL       DEFAULT NOW(6)
  ,DatumGewijzigd    DATETIME(6)                 NOT NULL       DEFAULT NOW(6)
  ,CONSTRAINT        PK_Horloges_Id   PRIMARY KEY               (Id)
) ENGINE=InnoDB;

-- Step: 07
-- ************************************************************************************
-- Doel : Vul de tabel Horloges met gegevens
-- ************************************************************************************
-- Versie      Datum          Auteur               Omschrijving
-- ****** ***** ****** ************
-- 01          11-02-2026     Arjan de Ruijter     Vulling Horloges
-- ************************************************************************************

INSERT INTO Horloges
(
     Merk
    ,Model
    ,Prijs
    ,Materiaal
    ,Gewicht
    ,Releasedatum
    ,Waterdichtheid
    ,HorlogeType
)
VALUES
 ('Rolex', 'Daytona 126500LN', 19800, 'RVS', '155 gram', '2023-03-27', 100, 'Analoog')
,('Omega', 'Speedmaster Moonwatch Professional', 8500, 'RVS', '134 gram', '2021-01-05', 50, 'Analoog')
,('Vacheron Constantin', 'Overseas Perpetual Calendar Ultra-Thin', 98000, 'Goud', '120 gram', '2020-04-15', 50, 'Analoog')
,('Jaeger-LeCoultre', 'Reverso Tribute Duoface', 17000, 'Goud', '85 gram', '2021-06-10', 30, 'Analoog')
,('Cartier', 'Tank Louis Diamond Edition', 35000, 'Diamant', '95 gram', '2022-11-20', 30, 'Analoog')
,('Casio', 'G-Shock Mudmaster', 850, 'RVS', '106 gram', '2023-08-12', 200, 'Digitaal')
,('Patek Philippe', 'Nautilus 5711', 125000, 'RVS', '115 gram', '2018-05-30', 120, 'Analoog')
,('Garmin', 'Fenix 7X Pro', 950, 'RVS', '89 gram', '2023-05-31', 100, 'Digitaal');



CREATE TABLE zangeressen
(
     Id                SMALLINT        UNSIGNED    NOT NULL    AUTO_INCREMENT
    ,Naam              VARCHAR(100)                NOT NULL
    ,Vermogen          VARCHAR(50)                 NOT NULL
    ,Land              VARCHAR(50)                 NOT NULL
    ,Leeftijd          TINYINT         UNSIGNED    NOT NULL
    ,BekendsteNummer   VARCHAR(100)                NOT NULL
    ,Debuutjaar        DATE                        NOT NULL
    ,CONSTRAINT         PK_Zangeressen_Id           PRIMARY KEY (Id)
) ENGINE=InnoDB;

INSERT INTO Zangeressen
(
     Naam
    ,Vermogen
    ,Land
    ,Leeftijd
    ,BekendsteNummer
    ,Debuutjaar
)
VALUES
     ('Rihanna', '$1.4 Billion', 'Barbados', 36, 'Umbrella', '2005-05-24')
    ,('Taylor Swift', '$1.1 Billion', 'United States', 34, 'Shake It Off', '2006-10-24')
    ,('Beyoncé', '$800 Million', 'United States', 42, 'Halo', '1997-01-01')
    ,('Madonna', '$580 Million', 'United States', 65, 'Like a Virgin', '1982-10-06')
    ,('Celine Dion', '$480 Million', 'Canada', 56, 'My Heart Will Go On', '1981-11-06')
    ,('Dolly Parton', '$650 Million', 'United States', 78, 'Jolene', '1967-02-13')
    ,('Gloria Estefan', '$500 Million', 'Cuba', 66, 'Conga', '1977-09-01');