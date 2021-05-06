## Tesztek:

|  Sorszám | Tesztelő | Dátum | Jogosultság | Funkció leírása | Vizsgálat részletes leírása | Elvárt eredmény | Eredmény  
|----------|----------|-------|-------------|-----------------|-----------------------------|-----------------|---------
| T01 | Koós Dávid | 2021.05.06 18:16 | Vendég | Regisztráció | A regisztrációs formba felveszem az adatokat, majd az adatbázisban ellenőrzöm, hogy bekerültek-e az adatok | Megjelennek az adatbázisban a formban megadott adatok | Minden megadott adat bekerül az adatbázisba, automatikusan generált azonosítókkal és titkosított jelszóval.
| T02 | Koós Dávid | 2021.05.06 18:57 | Vendég | Bejelentkezés | A bejelentkező formba felveszem az adatokat, megpróbálok bejelentkezni, amennyiben sikerült ellenőrzöm az adatbázisban, hogy valóban létezik ilyen felhasználó | Csak olyan adatokkal tudunk belépni, amik benne vannak az adatbázisban | Csak akkor sikeres a belépés, ha az adatbázis tartalmazza a megadott adatokat.
| T03 | Kis-Simon Dávid | 2021.05.06 19:10 | Mindenki | Játékok megtekintése | Navbar-on lévő játékok megtekintése | Mindenki számára megjelennek, de a vendég a rákattintásnál csak a játékszabályokat látja. | A vendég is megtekintheti a játékokat, de csak a szabályokat látja, mindenki más játszani is tud.
| T04 | Mészáros Martin | | | Jelszó változtatás | | | 
| T05 | Pelle Marcell | | | Bankkártya hozzáadása | | | 
| T06 | Pelle Marcell | | | Bankkártya törlése | | | 
| T07 | Pelle Marcell | | | Befizetés | | | 
| T08 | Pelle Marcell | | | Kifizetés | | | 
| T09 | Koós Dávid | 2021.05.07 00:40 | Felhasználó, Prémium felhasználó | Nyereménykiváltás | Megpróbálok kiváltani egy adott nyereményt, illetve egy x-coin ládát | A nyeremény/láda ára levonásra kerül, láda esetén a nyeremény jóváírásra kerül, ha van elég mennyiségű x-coinja a felhasználónak | Nyeremény esetén a megadott ár levonásra kerül, de csak ha van elég x-coinja a felhasználónak. A láda esetén a megadott ár levonásra kerül, majd a leírt százalékok alapján jóváírásra kerül a nyeremény.
| T10 | Kis-Simon Dávid | 2021.05.06 20:45 | Admin | Nyeremény hozzáadása | A formon megadott adatokkal hozzáadok egy elemet a nyereményekhez. | A formon megadott adatokkal megjelenik egy rekord az adatbázisban, és a nyeremények kilistázásánál is megjelenik. | A megfelelő adatokkal megjelennek az adatbázisban, és a kilistázott elemek között is.
| T11 | Kis-Simon Dávid | 2021.05.06 21:37 | Admin | Nyeremény módosítása | Egy adott nyeremény adatait változtatom. | A nyeremény adatai megváltoznak az adatbázisban és a kilistázott elemek között is a kívánt értékekre. | A módosított nyeremény adatai megváltoztak az adatbázisban és a listázott elemek között is.
| T12 | Kis-Simon Dávid | 2021.05.06 21:45 | Admin | Nyeremény törlése | Egy adott nyereményt törlök. | A kiválaszott nyeremény eltűnik az adatbázisból és a kilistázott elemek közül is. | A megfelelő elem törlődött mind az adatbázisből mind a kilistázott elemek közül.
| T13 | Mészáros Martin | | | Felhasználó módosítása | | | 
| T14 | Mészáros Martin | | | Felhasználó törlése | | | 
| T15 | Kis-Simon Dávid | 2021.05.06 22:06 | Felhasználó, Prémium felhasználó, Admin | Ötöslottó | Ötöslottót vásárolok, megtekintem a vásárolt számokat, illetve kihúzom a nyerőszámokat. | Ha az akutális egyenleg kisebb mint 5€, akkor a lottó vásárlás gomb nem jelenik meg. Csak 5 szám kiválasztásával lehet lottószelvényt vásárolni. A lottó vásárlásánál 5€-t levon az egyenlegből. A megvásárolt számokat meg lehet tekinteni, de az admin az összes megvásárolt szelvényt látja. A nyerőszámok kihúzása kiosztja a nyereményeket a nyerteseknek és törli az összes megvásárolt szelvényt, ez a funkció csak adminok számára elérhető. | Minden az elvárt eredményben leírtak alapján működik.
| T16 | Koós Dávid | 2021.05.07 00:46 | Felhasználó, Prémium felhasználó, Admin | Puttó | Bejelölöm a számokat, megadok egy tétet, majd fogadok a puttón. | Csak akkor enged játszani, ha a szabályokat, tét korlátot betartotta a felhasználó | Minden felhasználó a helyes tét korlátokat kapja meg, csak a szabályok betartásával lehet megjátszani a puttó szelvényt. Amennyiben nincs elegendő egyenlege a felhasználónak nem küldheti játékba szelvényét, ellenkező esetben az egyenlegből a megfelelő összeg kerül levonásra. A játék a megadott nyereménytábla alapján írja jóvá a nyereményt.
| T17 | Mészáros Martin | | | Kaparós sorsjegyek | | | 
| T18 | Koós Dávid | | | Dobókocka | | | 
| T19 | Pelle Marcell | | | Szerencsekerék | | | 
| T20 | Mészáros Martin | | | Kijelentkezés | | | 


## Hibakezelés:

| Teszt sorszáma | Tesztelő | Dátum | Tesztelt input | Hibakezelés | Tesztelt adatok | Elfogadott adatok | Elutasított adatok
|----------------|----------|-------|----------------|-------------|-----------------|-------------------|-------------------
| T01 | Koós Dávid | 2021.05.06 18:36 | Felhasználónév | Legalább 5 karakter, nem tartalmazhat szóközt | u ser, user, user1 | user1 | user, u ser
| T01 | Koós Dávid | 2021.05.06 18:45 | E-mail | Helyes formátum | email, email@email, email.com, email@email., @email.com, email@email.com | email@email.com | email, email@email, email.com, email@email., @email.com 
| T01 | Koós Dávid | 2021.05.06 18:49 | Életkor | 18-100 közötti szám | húsz, 17, 18, 100, 101 | 18,100 | húsz, 17, 101
| T01 | Koós Dávid | 2021.05.06 18:52 | Jelszó | Legalább 5 karakter, nem tartalmazhat szóközt | 12345, jel szo, jelszo | jelszo | 12345, jel szo
| T10, T11 | Kis-Simon Dávid | 2021.05.06 21:09 | Nyeremény neve | 2 és 30 karakter hossz között kell lennie, nem lehet benne kettő szókoz egymás mellett | a, as, asd, nyere meny, nyere  meny(2 szóköz), 012345678901234567890123456789, 0123456789012345678901234567890 | as, asd, nyere meny, 012345678901234567890123456789 | a, nyere  meny(2 szóköz), 0123456789012345678901234567890
| T10, T11 | Kis-Simon Dávid | 2021.05.06 21:24 | Nyeremény ára | 0-nál nagyobb számnak kell lennie | asd, -10, 0, 3 10, 20 | 20 | asd, -10, 0, 3 10
| T16 | Koós Dávid | 2021.05.07 00:56 | 'A' mező | 8 szám van kijelölve | 0-,7-,8-,9 szám van kijelölve | 8 szám van kijelölve | 0-,7-,9 szám van kijelölve
| T16 | Koós Dávid | 2021.05.07 01:03 | 'B' mező | 1 szám van kijelölve | 0-,1 szám van kijelölve | 1 szám van kijelölve | 0 szám van kijelölve 
| T16 | Koós Dávid | 2021.05.07 01:06 | Tét (alap felhasználó, 5€ egyenleg) | 1-10 közötti egész szám, egyenleget nem haladhatja meg | 0,1,3,5,6,10,11,5.5 | 1,3,5 | 0,6,10,11,5.5
| T16 | Koós Dávid | 2021.05.07 01:12 | Tét (alap felhasználó, 15€ egyenleg) | 1-10 közötti egész szám, egyenleget nem haladhatja meg | 0,1,3,5,6,10,11,5.5 | 1,3,5,10 | 0,6,11,5.5
| T16 | Koós Dávid | 2021.05.07 01:14 | Tét (prémium felhasználó) | 1-1000 közötti egész szám, egyenleget nem haladhatja meg | 0,1,500,1000,1001 | 1,500,1000 | 0,1001
