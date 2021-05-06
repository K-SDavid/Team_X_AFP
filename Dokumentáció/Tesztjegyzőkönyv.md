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
| T09 | Koós Dávid | | | Nyereménykiváltás | | | 
| T10 | Kis-Simon Dávid | 2021.05.06 20:45 | Admin | Nyeremény hozzáadása | A formon megadott adatokkal hozzáadok egy elemet a nyereményekhez. | A formon megadott adatokkal megjelenik egy rekord az adatbázisban, és a nyeremények kilistázásánál is megjelenik. | A megfelelő adatokkal megjelennek az adatbázisban, és a kilistázott elemek között is.
| T11 | Kis-Simon Dávid | 2021.05.06 21:37 | Admin | Nyeremény módosítása | Egy adott nyeremény adatait változtatom. | A nyeremény adatai megváltoznak az adatbázisban és a kilistázott elemek között is a kívánt értékekre. | A módosított nyeremény adatai megváltoztak az adatbázisban és a listázott elemek között is.
| T12 | Kis-Simon Dávid | 2021.05.06 21:45 | Admin | Nyeremény törlése | Egy adott nyereményt törlök. | A kiválaszott nyeremény eltűnik az adatbázisból és a kilistázott elemek közül is. | A megfelelő elem törlődött mind az adatbázisből mind a kilistázott elemek közül.
| T13 | Mészáros Martin | | | Felhasználó módosítása | | | 
| T14 | Mészáros Martin | | | Felhasználó törlése | | | 
| T15 | Kis-Simon Dávid | | | Ötöslottó | | | 
| T16 | Koós Dávid | | | Puttó | | | 
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
