DROP DATABASE IF EXISTS Seek;
CREATE DATABASE Seek;

use Seek;
DROP TABLE IF EXISTS SearchSiteWeb;
CREATE TABLE SearchSiteWeb(ID INT,cles VARCHAR(30), TitrePageWeb VARCHAR(50),UrlSiteWeb VARCHAR (2083), DescriptionPageWeb VARCHAR(200));


ALTER TABLE SearchSiteWeb
MODIFY ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY;


