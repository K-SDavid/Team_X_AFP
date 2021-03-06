## Tesztkörülmény:

| Tesztelő | Operációs rendszer | Böngésző verzió
|-----|--------------------|----------------
| Kis-Simon Dávid | Windows 10 Pro 64-bit | Opera GX v75.0.3969.259
| Koós Dávid | Windows 10 Pro 64-bit | Google Chrome v90.0.4430.93
| Mészáros Martin | Windows 10 Pro 64-bit | Google Chrome v90.0.4430.93
| Pelle Marcell | Windows 10 Pro 64-bit | Google Chrome v90.0.4430.93



## Tesztek:

|  Sorszám | Tesztelő | Dátum | Jogosultság | Funkció leírása | Vizsgálat részletes leírása | Elvárt eredmény | Eredmény  
|----------|----------|-------|-------------|-----------------|-----------------------------|-----------------|---------
| T01 | Koós Dávid | 2021.05.06 18:16 | Vendég | Regisztráció | A regisztrációs formba felveszem az adatokat, majd az adatbázisban ellenőrzöm, hogy bekerültek-e az adatok | Megjelennek az adatbázisban a formban megadott adatok | Minden megadott adat bekerül az adatbázisba, automatikusan generált azonosítókkal és titkosított jelszóval.
| T02 | Koós Dávid | 2021.05.06 18:57 | Vendég | Bejelentkezés | A bejelentkező formba felveszem az adatokat, megpróbálok bejelentkezni, amennyiben sikerült ellenőrzöm az adatbázisban, hogy valóban létezik ilyen felhasználó | Csak olyan adatokkal tudunk belépni, amik benne vannak az adatbázisban | Csak akkor sikeres a belépés, ha az adatbázis tartalmazza a megadott adatokat.
| T03 | Kis-Simon Dávid | 2021.05.06 19:10 | Mindenki | Játékok megtekintése | Navbar-on lévő játékok megtekintése | Mindenki számára megjelennek, de a vendég a rákattintásnál csak a játékszabályokat látja. | A vendég is megtekintheti a játékokat, de csak a szabályokat látja, mindenki más játszani is tud.
| T04 | Mészáros Martin | 2021.05.08 8:51 | Felhasználó, Prémium Felhasználó, Admin | Jelszó változtatás | Jelszót változtok | Új jelszó megadása esetén frissíti az adatbázist, és már csak azzal a jelszóval lehet bejelentkezni | A jelszó módosult.
| T05 | Pelle Marcell |2021.05.11 11:00 |Felhasználó,Prémium Felhasználó,Admin | Bankkártya hozzáadása |A felhasználó képes bankkártya adatokat megadni, a rendszer eltárolj az adatbázisban | A rendszer eltárolja és megjeleníti a profilban a kártyadatokat| A bankkártya hozzáadva a profilhoz és az adatbázishoz
| T06 | Pelle Marcell |2021.05.11 11:00 |elhasználó,Prémium Felhasználó,Admin | Bankkártya törlése |A felhasználó letudja törölni az adott kártyát ,amit eltávoltítunk az adatbázisból | A kártya eltűnik a  profilból és törlődik az adatbázisból  | A kártya eltűnt a profilból és adatbázisból
| T07 | Pelle Marcell |2021.05.07 20:00 | Felhasználó, Prémium Felhasználó, Admin| Befizetés | A hozzáadott bankkártya segítégével megnézem, hogy sikeresen a számlára került az összeg | A számlán rajta van az összeg,adatbázisban megjelenik| Sikeres
| T08 | Pelle Marcell |2021.05.07 | Felhasználó, Prémium Felhasználó | Kifizetés | Egyenleg ellenőrzés és kártya ellenőrés után a felhasználó kitudja venni a kívánt összeget | Az összeg levonásra kerül a számláról ,illetve az adatbázisból | Sikeres
| T09 | Koós Dávid | 2021.05.07 00:40 | Felhasználó, Prémium felhasználó | Nyereménykiváltás | Megpróbálok kiváltani egy adott nyereményt, illetve egy x-coin ládát | A nyeremény/láda ára levonásra kerül, láda esetén a nyeremény jóváírásra kerül, ha van elég mennyiségű x-coinja a felhasználónak | Nyeremény esetén a megadott ár levonásra kerül, de csak ha van elég x-coinja a felhasználónak. A láda esetén a megadott ár levonásra kerül, majd a leírt százalékok alapján jóváírásra kerül a nyeremény.
| T10 | Kis-Simon Dávid | 2021.05.06 20:45 | Admin | Nyeremény hozzáadása | A formon megadott adatokkal hozzáadok egy elemet a nyereményekhez. | A formon megadott adatokkal megjelenik egy rekord az adatbázisban, és a nyeremények kilistázásánál is megjelenik. | A megfelelő adatokkal megjelennek az adatbázisban, és a kilistázott elemek között is.
| T11 | Kis-Simon Dávid | 2021.05.06 21:37 | Admin | Nyeremény módosítása | Egy adott nyeremény adatait változtatom. | A nyeremény adatai megváltoznak az adatbázisban és a kilistázott elemek között is a kívánt értékekre. | A módosított nyeremény adatai megváltoztak az adatbázisban és a listázott elemek között is.
| T12 | Kis-Simon Dávid | 2021.05.06 21:45 | Admin | Nyeremény törlése | Egy adott nyereményt törlök. | A kiválaszott nyeremény eltűnik az adatbázisból és a kilistázott elemek közül is. | A megfelelő elem törlődött mind az adatbázisből mind a kilistázott elemek közül.
| T13 | Mészáros Martin | 2021.05.08 9:05 | Admin | Felhasználó módosítása | Adminként tudom változtatni, a saját, illetve más felhasználók egyenlegét és x-coin-ját | Helyes adatokat megadva az adatbázis frissül, és az adott felhasználó már az új egyenlegét látja | A változtatás sikeres
| T14 | Mészáros Martin | 2021.05.08 9:17 | Admin | Felhasználó törlése | Adminként kitudok törölni egy felhasználót az adatbázisból, ezáltal az adott profilról nem lehet bejelentkezni. | Az x-re kattintva törlésre kerül az adott felhasználó az adatbázisból. | A felhasználó adatai törlésre kerültek az adatbázisból.
| T15 | Kis-Simon Dávid | 2021.05.06 22:06 | Felhasználó, Prémium felhasználó, Admin | Ötöslottó | Ötöslottót vásárolok, megtekintem a vásárolt számokat, illetve kihúzom a nyerőszámokat. | Ha az akutális egyenleg kisebb mint 5€, akkor a lottó vásárlás gomb nem jelenik meg. Csak 5 szám kiválasztásával lehet lottószelvényt vásárolni. A lottó vásárlásánál 5€-t levon az egyenlegből. A megvásárolt számokat meg lehet tekinteni, de az admin az összes megvásárolt szelvényt látja. A nyerőszámok kihúzása kiosztja a nyereményeket a nyerteseknek és törli az összes megvásárolt szelvényt, ez a funkció csak adminok számára elérhető. | Minden az elvárt eredményben leírtak alapján működik.
| T16 | Koós Dávid | 2021.05.07 00:46 | Felhasználó, Prémium felhasználó, Admin | Puttó | Bejelölöm a számokat, megadok egy tétet, majd fogadok a puttón. | Csak akkor enged játszani, ha a szabályokat, tét korlátot betartotta a felhasználó | Minden felhasználó a helyes tét korlátokat kapja meg, csak a szabályok betartásával lehet megjátszani a puttó szelvényt. Amennyiben nincs elegendő egyenlege a felhasználónak nem küldheti játékba szelvényét, ellenkező esetben az egyenlegből a megfelelő összeg kerül levonásra. A játék a megadott nyereménytábla alapján írja jóvá a nyereményt.
| T17 | Mészáros Martin | 2021.05.08 9:27 | Felhasználó, Prémium Felhasználó, Admin | Kaparós sorsjegyek | Sorsjegyet lehet venni, amit lekaparva nyer vagy veszít az illető, oldal frissítése esetén a sorsjegy nem változik, ha nincs elég pénze a felhasználónak akkor nem tud játszani. | Az adatok ne módosuljanak frissítésnél, ne lehessen játszani , ha nincs elég pénze a felhasználónak, nyerés esetén a felhasználó megkapja a nyeremény összegét. | A sorsjegy nem módosult frissítésnél, ha kevés pénze van a felhasználónak akkor nem tud játszani, nyerő sorsjegynél a nyereménít megkapta.
| T18 | Koós Dávid | 2021.05.07 01:16 | Felhasználó, Prémium felhasználó, Admin | Dobókocka | Választok egy fogadási típust és egy valós tétet majd fogadok | Csak akkor enged játszani, ha a szabályokat, tét korlátot betartotta a felhasználó | Minden felhasználó a helyes tét korlátokat kapja meg, csak a szabályok betartásával lehet fogadni. Amennyiben nincs elegendő egyenlege a felhasználónak nem fogadhat, ellenkező esetben az egyenlegből a megfelelő összeg kerül levonásra. A játék a megadott nyereménytábla alapján írja jóvá a nyereményt.  |
| T19 | Pelle Marcell |2021.05.11 11:00 | Felhasználó,Prémium Felhasználó, Admin| Szerencsekerék | A felhasználó rányoma  pörgetésre és a nyereséget6veszteséget elkönyveljük | A kereék pörög , az értéket hozzáadjuk illetve levonjuk az adatbázisba |A játék jóváírja a nyereményt vagy veszteséget
| T20 | Mészáros Martin | 2021.05.08 9:46 | Felhasználó, Prémium Felhasználó, Admin | Kijelentkezés | Kijelentkezés gombra kattintva, a felhasználó kilép a saját profiljából. | A session megszűnik, a felhasználó már csak vendégként fér hozzá az oldalhoz. | Sikeres kijelentkezés, a felhasználó már nem fér hozzá a profiljához.


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
| T18 | Koós Dávid | 2021.05.07 01:22 | Fogadási típus | 1 kiválasztott típus | 0-,1 kiválasztott típus | 1 kiválasztott típus | 0 kiválasztott típus
| T18 | Koós Dávid | 2021.05.07 01:24 | Pontos összeg | 2-12 közti egész szám | 1,2,6,12,13,5.5 | 2,6,12 | 1,13,5.5
| T18 | Koós Dávid | 2021.05.07 01:26 | Tét (alap felhasználó, 0.5€ egyenleg) | 0.01-1 közötti szám, egyenleget nem haladhatja meg | 0,0.01,0.5,0.51,1,11 | 0.01,0.5 | 0,0.51,1,11
| T18 | Koós Dávid | 2021.05.07 01:28 | Tét (alap felhasználó, 1.5€ egyenleg) | 0.01-1 közötti szám, egyenleget nem haladhatja meg | 0,0.01,0.5,1,1.01 | 0.01,0.5,1 | 0,1.01
| T18 | Koós Dávid | 2021.05.07 01:31 | Tét (prémium felhasználó) | 0.01-10000 közötti szám, egyenleget nem haladhatja meg | 0,0.01,32,55.55,10000,10001 | 0.01,32,55.55,10000 | 0,10001
| T04 | Mészáros Martin | 2021.05.08 8:57 | Jelszó | Legalább 5 karakter, nem tartalmazhat szóközt | asdas, asd as, asdasd | asdasd | asdas, asd as
| T13 | Mészáros Martin | 2021.05.08 9:12 | Egyenleg | Csak szám lehet, nem lehet negatív szám | asd, -1, 0 , 100 | 0, 100 | asd, -1
| T13 | Mészáros Martin | 2021.05.08 9:14 | X-coin | Csak szám lehet, nem lehet negatív szám | asd, -1, 0 , 100 | 0, 100 | asd, -1
| T07 | Pelle Marcell | 2021.05.11 11:04 | Kártyaszám | Csak szám lehet, nem lehet negatív szám | valami, -1, 0 ,2,8,11 | 0, 2,8 | valami, -1
| T08 | Pelle Marcell | 2021.05.11 11:13 | Összeg| Csak szám lehet, nem lehet negatív szám, 2euronál több valamint nem több mint az aktuális egyenleg | randomszó, -1, 0 ,4,8,11 | 4,8,11 | randomszó, -1,0
| T05 | Pelle Marcell | 2021.05.11 11:20 | Tulajdonos név| Több mint 6 betűből áll,nem tartlamaz 2 vagy több szóközt egymás után, nem tartalmaz számot | Andor, Kolomp  ár,Valami9, Szabó János | Szabó János| Andor,Kolomp ár, Valami 9
| T05 | Pelle Marcell | 2021.05.11 11:30 | Kártyaszám| Csak számból áll, 16 számból áll | 1234ag56,123,1234567891234567 | 1234567891234567| 1234ag56,123
| T05 | Pelle Marcell | 2021.05.11 11:34 | Lejárati dátum| csak számlehet, nem lehet lejárt kártyát hozzáadni | 422,12a,417 | 422| 12a,417
| T05 | Pelle Marcell | 2021.05.11 11:34 | CVC kód| csak számlehet, 3 számból áll | 422,12a,1544 | 422| 12a,1544
