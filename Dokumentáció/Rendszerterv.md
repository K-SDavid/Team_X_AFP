# Rendszerterv

### A rendszer célja

Rendszerünk célja, hogy a Követelmény és Funkcionális specifikációban meghatározott folyamatok megvalósuljanak. A cél egy olyan online kaszinó megvalósítása, ahol a felhasználó sokféle szerencsejátékot kipróbálhat, akár pénzfeltöltés nélkül.
Minden felhasználó kap egy kezdő összeget, amivel próbára teheti szerencséjét kis összegekkel, ha nagyobb összeggel szeretne játszani, akkor azt csak egy bizonyos összeg feletti pénzfeltöltéssel lehetséges. Az egyenleg kivételéhez elengedhetetlen bankkártya hozzáadása. Egy másodlagos fizetőeszköz segítségével(X-Coin) nyeremények válthatóak ki.

### Projektterv

Projekten dolgozók listája: 

![Projektterv afp2](/Pictures/projektterv-01.png)

A projekt menedzseléséért felelős csapat: 

![Projektterv afp4](/Pictures/projektterv-02.png)

Ütemterv:

|  Dátum | Tevékenység  |  
|-----------------------|--------------------------|
|    2021.02.16-03.03   | Dokumentációk elkészítése és véglegesítése | 
|         2021.03.03-         |Fejlesztés megkezdése|
|         2021.03.03-         |Unit tesztek| 
|                |Alpha teszt|
|                |Béta teszt|
|         2021.05.11         |Projekt átadása|

### Jelenlegi üzleti folyamatok

![Jelenlegi üzleti folyamatok](/Pictures/jelenlegi-uzleti-folyamatok.png)

A legnépszerűbb fogadási/szerencsejáték oldalak nem kínálnak kezdő egyenleget, amivel ki lehet próbálni az oldalon lévő elérhető funkciókat, valamint személyes adatokat kell megadni. A legtöbb oldalon a nagy mennyiségű reklám nagyban rontja a játékélményt. Adott játékokban a körök megadott időnként indulnak, ezzel megnő a várakozás ideje, emiatt a felhasználó nem tudja szabályozni a játék indítását.

### Igényelt üzleti folyamat

![Igényelt üzleti folyamat](/Pictures/igenyelt-uzleti-folyamat.png)

Az emberek egy gyors regisztráció után(akár bankkártya adatok megadása nélkül), már ki is próbálhatják a funkciókat, egy adott mennyiségű pénzösszeg feltöltése után pedig kiválthatják az egyenlegüket.


### Követelménylista

![Követelménylista](/Pictures/rendszerterv-kovetelmenylista.png)

### Architekturális terv

![Architekturális terv](/Pictures/architekturalis-terv.png)

### Adatbázis terv

![Adatbázis terv](/Pictures/adatbazis-terv.png)

#### users tábla:

| Mező név | Tipus/hossz | Kötelező | Érték/validáció | Kulcs | Megj. |
|----------|-------------|----------|-----------------|-------|-------|
| id | INT | Igen | Auto-increment | PK| |
| username | VARCHAR(250) | Igen | | |
| password | VARCHAR(250) | Igen| | |
| email | VARCHAR(250) | Igen| | |
| permission | INT(1) | | 1 | |
| balance | DOUBLE | | 2 | |
| xcoin | INT | |0 | |

#### users megszorítások:

| Azonosító | Tábla 1 | Mező 1 | Tábla 2 | Mező 2 | Megj. |
|-----------|---------|--------|---------|--------|-------|
| pk_id | users | id | | | |

#### creditcards tábla: 

| Mező név | Tipus/hossz | Kötelező | Érték/validáció | Kulcs | Megj. |
|----------|-------------|----------|-----------------|-------|-------|
| id | INT | Igen | Auto-increment | PK| |
| userid | INT | Igen | | FK | |
| number | INT(16) | Igen | | |
| expiration | INT(4) | Igen | | |
| security_code | INT(3) | Igen |  | |

#### creditcards megszorítások:

| Azonosító | Tábla 1 | Mező 1 | Tábla 2 | Mező 2 | Megj. |
|-----------|---------|--------|---------|--------|-------|
| pk_id | creditcards | id | | | |
| fk_creditcard | creditcards | userid | users | id | |

#### games tábla: 

| Mező név | Tipus/hossz | Kötelező | Érték/validáció | Kulcs | Megj. |
|----------|-------------|----------|-----------------|-------|-------|
| id | INT | Igen | Auto-increment | PK| |
| name | VARCHAR(250) | Igen | | | |
| min | DOUBLE | Igen | | |
| max | DOUBLE | Igen | | |

#### games megszorítások: 

| Azonosító | Tábla 1 | Mező 1 | Tábla 2 | Mező 2 | Megj. |
|-----------|---------|--------|---------|--------|-------|
| pk_id | games | id | | | |

#### prize tábla: 

| Mező név | Tipus/hossz | Kötelező | Érték/validáció | Kulcs | Megj. |
|----------|-------------|----------|-----------------|-------|-------|
| id | INT | Igen | Auto-increment | PK| |
| name | VARCHAR(250) | Igen | | | |
| price | INT | Igen | | |

#### prize megszorítások: 

| Azonosító | Tábla 1 | Mező 1 | Tábla 2 | Mező 2 | Megj. |
|-----------|---------|--------|---------|--------|-------|
| pk_id | prizes | id | | | |

### Funkcionális terv
Leírja a felhasználói szerepköröket, és hogy milyen feladatokat
tudnak csinálni.
* Rendszerszereplők:
  * Adminisztrátor
  * Felhasználó
  * Vendég

Rendszerhasználati esetek és lefutásaik:
* Adminisztrátor:
  * Teljes hozzáférése van a rendszerhez
  * Felhasznói adatokat látják, változtathatják
  * Felhasználó hozzáadására, törlésére van lehetőségük
  * Felhasználói adatok módosítása
  * Tesztek létrehozása, törlése, módosítása
  * Fogadások létrehozása, törlése, módosítása
* Felhasználó:
  * Weboldal megtekintése
  * Regisztrálás, belépés engedélyezve
  * Egyenleg pénzfeltöltéssel
  * Részvétel fogadásokon
* Vendég:
  * Weboldal megtekintése
  * Regisztrálás, bejelentkezés

Menü architektúra:
  * Felhasználói funkciók:
    * Bejelentkezés
    * Kijelentkezés
    * Regisztráció
    * Help
  * Fő menü:
    * Fogadások
    * Fogadás létrehozása(Adminisztrátoroknak)
    * Fogadás részvétel(Felhasználóknak)
    * Toplista
    * Profil

### Fizikai környezet

![Architekturális terv](/Pictures/architekturalis-terv.png)

### Implementációs terv

A weboldal felületét és a mögötte lévő programkódot php, css és javascript segítségével fogjuk megvalósítani. Az oldalt könnyen kezelhetőre, egyértelműre, effektívre és letisztultra tervezzük. A weboldal mögött egy MySQL adatbázis működik.

### Teszt terv

* Alpha teszt:
  * Az alpha tesztet a fejlesztők végzik, amelyben a rendszer összeomlását próbálják elérni remélhetőleg sikertelenül. Amennyiben felderítenek egy hibát jelentést írnak róla, majd javítják.
  * Az alpha teszt során külön tesztelni kell a fontosabb funkciókat, mintpedig: Az oldalon működő fogadásokat/játékokat.

* Beta teszt:
  * Az alpha tesztet követően a felhasználók elvégzik a béta tesztet, melynek során a programban maradt súlyosabb hibák felderítésre kerülnek, majd a fejlesztők javítják őket.
  * A teszt során a stabilitás, letisztultság növelése a cél.
  * (A tesztekről naplót kell készíteni, amely alapján esetleges hibáknál kitölthető a hibajelentő.)

### Karbantartási terv
A szoftveren a későbbiekben nem kell nagyobb karbantartásokat elvégezni. Az esetleges karbantartások a következőből állhatnak:
  * Tesztelés frissebb verzió használatával. Hiba észlelése esetén azok javítása.
  * Igény esetén új funkciók hozzáadása.
