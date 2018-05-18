# Kansallisarkisto-Informaatioportaali

Kansallisarkistossa tuotettu Hyvinvointi- ja terveysdatan informaatioportaali on Wordpress-julkaisualustalle rakennettu sivusto.

Sivuston hallintapaneeliin kirjaudutaan sivuston asennuksen jälkeen osoitteella www.osoite.fi/portaalinkansio/wp-admin

		Käyttäjätunnus: hytedata
		Salasana: 7RV28ifPStaUso

# Riippuvuudet

Hyvinvointi- ja terveysdatan informaatioportaali käyttää vapaan lähdekoodin WordPress-julkaisualustaa. WordPressin palvelinvaatimukset ovat seuraavat:

- PHP (>= 5.2.4)
- MySQL (>= 5.0)

# Asennus

Informaatioportaalin asentamiseen tarvitaan FTP- ja SSH-/komentoriviyhteydet käytettäville palvelimille.

1.	Luo tietokannalle käyttäjätunnus sivpalvelimen tietokantaan täysillä oikeuksilla ja luo käyttäjätunnukselle salasana. Ota käyttäjätunnus ja salasana talteen myöhempää käyttöä varten.

2.	Muokkaa asetustiedostot:
	- wp-config.php, asennuskansion juuressa
	- wp-config.php, kansiossa /en/



	2.1. Rivi 23:

		define('DB_USER', 'KAYTTAJATUNNUS');
	-	aseta tietokannan käyttäjätunnus kohtaan KAYTTAJATUNNUS


	2.2. Rivi 26:

		define('DB_PASSWORD', 'SALASANA');
	-	aseta tietokannan salasana kohtaan SALASANA


	2.3. Rivi 80:

		define('DOMAIN_CURRENT_SITE', 'OSOITE');
	-	aseta verkko-osoite kohtaan OSOITE, esim. www.domain.com
	-	osoite ilman http-alkua ja päättävää kauttaviivaa


	2.4.	Rivi 81:

		define('PATH_CURRENT_SITE', '/POLKU/');
		
	-	aseta kansion nimi kohtaan POLKU, johon sivusto on asennettu, esim. portaali
	-	jos sivusto asennetaan suoraan verkko-osoitteen juurikansioon, käytä muotoa:
	
			define('PATH_CURRENT_SITE', '/');

Tee samat toimenpiteet identtisinä molemmille wp-config.php -tiedostoille.



3.	Muokkaa etsi & korvaa -toiminnolla seuraavat tiedostot:
- /wp-content/themes/twentythirteen-child/header.php
- /wp-content/tablepress-combined.min.css
- /en/wp-content/themes/twentythirteen-child/header.php
- /en/wp-content/tablepress-combined.min.css

Korvaa merkkijono [KOKO-OSOITE] sillä osoitteella, johon portaali asennetaan, ilman osoitteen päättävää kauttaviivaa, esim. www.domain.com/portaali

4.	Muokkaa tietokantatiedosto etsi & korvaa -toiminnolla:


	4.1.	Korvaa merkkijono [KOKO-OSOITE] sillä osoitteella, johon portaali asennetaan ilman osoitteen päättävää kauttaviivaa, esim. www.domain.com/portaali


	4.2.	Korvaa merkkijono [OSOITE] sivupalvelimen domain-osoitteella, esim. www.domain.com


	4.3.	Korvaa merkkijono '[POLKU]' kansion nimellä, johon sivusto on asennettu, lisäten kauttaviivat kansion nimen molemmin puolin, esim.
	
		'/portaali/'
	- Huomaathan heittomerkit merkkijonon molemmin puolin sekä korvattavassa että korvaavassa tekstissä.
	- Jos sivusto asennetaan suoraan verkko-osoitteen juurikansioon, korvaa '[POLKU]' merkkijonolla
	
			'/'


	4.4.	Korvaa merkkijono [POLKU] sen kansion nimellä, johon portaali asennetaan ilman kauttaviivoja, esim. portaali

5.	Lataa Informaatioportaalin lähdekoodit sivupalvelimelle.

6.	Lataa Informaatioportaalin tietokantatiedosto sivupalvelimelle.

7.	Pura hytedata.sql-tietokanta tietokantapalvelimen tietokantaohjelman käyttöön komentorivillä.


	7.1.	Navigoi komentorivillä kansioon, jossa hytedata.sql-tiedosto sijaitsee.
	
	7.2.	Avaa tietokannan komentorivi komennolla:

		mysql -u root -p [enter]
		[root-käyttäjän salasana] [enter]

	7.3.	Pura tiedosto tietokantaan komennolla

		source hytedata.sql [enter]
		
		
Asennus on valmis.



# Tunnetut bugit ja huomioon otettavaa

-	Osa sivuston sisällä viittaavista linkeistä ei toimi. Tämä johtuu siitä, että asennettavassa paketissa on asetettu sivujen linkkien muodoksi www.osoite.fi/portaalinkansio/?page_id=[NRO]. Osa sisäisistä linkeistä viittaa sivujen selkokielisillä osoitteilla, esim. www.osoite.fi/portaalinkansio/artikkeli

	Linkkien muodon voi muuttaa kirjautumalla ohjauspaneeliin ja valitsemalla Asetukset --> Osoiterakenne.
	
	Uusi osoiterakenne saattaa tarvita muokkauksia kansion .htaccess-tiedostoon.

# Yhteystiedot

Sitra - https://www.sitra.fi/

# Lisenssi

GPLv2
