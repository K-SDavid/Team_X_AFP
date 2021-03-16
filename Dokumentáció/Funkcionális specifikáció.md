# Funkcionális specifikáció

### Áttekintés

A szerencsejáték a mai világ szerves részét képezi. A vírushelyzetre való tekintettel az emberek nem tudják meglátogatni a kaszinókat, ezért online szerencsejáték oldalakat keresnek fel. A legtöbb ilyen oldalon csak bankkártya adatok megadásával lehet játszani, ezért sokan nem regisztrálnak ilyen oldalakra, mivel féltik kiadni személyes adataikat.

### A rendszer céljai

A rendszer célja egy olyan online weboldal létrehozása, ahol a részvételhez nem szükséges bankkártya adat megadása. Minden felhasználó kap egy kezdő összeget, amivel próbára teheti szerencséjét kis összegekkel, ha nagyobb összeggel szeretne játszani, akkor azt csak egy bizonyos összeg feletti pénzfeltöltéssel lehetséges. Az egyenleg kivételéhez elengedhetetlen bankkártya hozzáadása. Egy másodlagos fizetőeszköz segítségével(X-Coin) nyeremények válthatóak ki.

Alapvető követelménynek tekinthető a hibamentes, gyors működés. Szeretnénk azonnali és megbízható be- és kifizetést biztosítani felhasználóink számára.

Továbbá cél az, hogy a weboldal letisztult, könnyen áttekinthető és egyértelmű legyen. A felhasználó tudja, hogy melyik funkció/menüpont mire való, hogyan érheti el azokat.

### Jelenlegi helyzet

A legnépszerűbb fogadási/szerencsejáték oldalak nem kínálnak kezdő egyenleget, amivel ki lehet próbálni az oldalon lévő elérhető funkciókat. A legtöbb oldalon a nagy mennyiségű reklám nagyban rontja a játékélményt. Adott játékokban a körök megadott időnként indulnak, ezzel megnő a várakozás ideje, emiatt a felhasználó nem tudja szabályozni a játék indítását.

Célunk egy olyan weboldal létrehozása, mely letudja kötni a felhaszálót és közben jól tudja magát érezni. A több féle játékmód lehetőséget biztosít, hogy a játék ne legyen monoton és akár órákat eltudjon tölteni nálunk.
Mivel tétre mennek a  játékaink ezért az első vásárláshoz adunk 20% kedvezményt ezáltal ösztönözve a felhasználót, hogy az első megrendelése nagyobb legyen.

### Vágyálom rendszer

Projektünk célja egy olyan szerencsejáték oldal létrehozása, ahol minden újonnan regisztrált felhasználó kipróbálhatja a weboldalon lévő funkciókat.  
Az oldal megnyitásakor a funkciók megtekinthetőek, de használatukhoz kötelező a regisztráció.

Egy gyors regisztráció után, már ki is próbálhatóak a funkciók, adott mennyiségű pénzösszeg feltöltése után pedig kiváltható az egyenleg.
Minden fogadás/játék után a felhasználó kap egy úgynevezett "X-Coin"-t (arányosan), amivel különböző nyereményeket, további funkciókat lehet kiváltani.
Célunk minél több szórakoztató játékmód megvalósítása.

### Jelenlegi üzleti folyamatok

![Jelenlegi üzleti folyamatok](/Pictures/jelenlegi-uzleti-folyamatok.png)

A legnépszerűbb fogadási/szerencsejáték oldalak nem kínálnak kezdő egyenleget, amivel ki lehet próbálni az oldalon lévő elérhető funkciókat, valamint személyes adatokat kell megadni. A legtöbb oldalon a nagy mennyiségű reklám nagyban rontja a játékélményt. Adott játékokban a körök megadott időnként indulnak, ezzel megnő a várakozás ideje, emiatt a felhasználó nem tudja szabályozni a játék indítását.

### Igényelt üzleti folyamat

![Igényelt üzleti folyamat](/Pictures/igenyelt-uzleti-folyamat.png)

Az emberek egy gyors regisztráció után(akár bankkártya adatok megadása nélkül), már ki is próbálhatják a funkciókat, egy adott mennyiségű pénzösszeg feltöltése után pedig kiválthatják az egyenlegüket.

### Követelménylista

![Követelménylista](/Pictures/kovetelmeny-lista.png)

### Használati esetek

![Használati esetek](/Pictures/use-cases.png)

A felhasználó regisztráció nélkül megtekintheti az oldalon működő funkciókat, illetve elolvashatja a felhasználási feltételeket és adatvédelmi szabályzatot.
A felhasználó regisztrálhat bankkártya megadása nélkül, ebben az esetben limitált tétekkel játszhat az oldalon. Egyenlegét nem tudja kivenni, csak pénz feltöltés után, a nyereményeket bármikor kitudja váltani. Bankkártya hozzáadására mindig van lehetőség, abban az esetben, hogyha a felhasználó a regisztáció során adja meg, akkor a kezdetektől fogva teljes megengedett limittel játszhatja a játékokat.
A nyereményeket X-coin-nal lehet kiváltani, amit bármelyik bejelentkezett felhasználó megtehet.

### Látványterv

![Látványterv](/Pictures/latvanyterv.png)

### Fogalomszótár

X-Coin: A weboldalon használt képzeletbeli valuta.

Kiváltható nyeremény: X-Coinnal kiváltható funkciók, tárgyak.
