## Tesztek:

|  Sorszám | Tesztelő | Dátum | Jogosultság | Funkció leírása | Vizsgálat részletes leírása | Elvárt eredmény | Eredmény  
|----------|----------|-------|-------------|-----------------|-----------------------------|-----------------|---------
| T01 | Koós Dávid | 2021.05.06 18:16 | Vendég | Regisztráció | A regisztrációs formba felveszem az adatokat, majd az adatbázisban ellenőrzöm, hogy bekerültek-e az adatok | Megjelennek az adatbázisban a formban megadott adatok | Minden megadott adat bekerül az adatbázisba, automatikusan generált azonosítókkal és titkosított jelszóval.
| T02 | Koós Dávid | 2021.05.06 18:57 | Vendég | Bejelentkezés | A bejelentkező formba felveszem az adatokat, megpróbálok bejelentkezni, amennyiben sikerült ellenőrzöm az adatbázisban, hogy valóban létezik ilyen felhasználó | Csak olyan adatokkal tudunk belépni, amik benne vannak az adatbázisban | Csak akkor sikeres a belépés, ha az adatbázis tartalmazza a megadott adatokat.


## Hibakezelés:

| Teszt sorszáma | Tesztelő | Dátum | Tesztelt input | Hibakezelés | Tesztelt adatok | Elfogadott adatok | Elutasított adatok
|----------------|----------|-------|----------------|-------------|-----------------|-------------------|-------------------
| T01 | Koós Dávid | 2021.05.06 18:36 | Felhasználónév | Legalább 5 karakter, nem tartalmazhat szóközt | u ser, user, user1 | user1 | user, u ser
| T01 | Koós Dávid | 2021.05.06 18:45 | E-mail | Helyes formátum | email, email@email, email.com, email@email., @email.com, email@email.com | email@email.com | email, email@email, email.com, email@email., @email.com 
| T01 | Koós Dávid | 2021.05.06 18:49 | Életkor | 18-100 közötti szám | húsz, 17, 18, 100, 101 | 18,100 | húsz, 17, 101
| T01 | Koós Dávid | 2021.05.06 18:52 | Jelszó | Legalább 5 karakter, nem tartalmazhat szóközt | 12345, jel szo, jelszo | jelszo | 12345, jel szo
