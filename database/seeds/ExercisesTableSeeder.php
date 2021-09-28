<?php

use Illuminate\Database\Seeder;
use App\Exercise;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exercise::create([
            'name'=>'Wyciskanie sztangi sprzed głowy' ,
            'author_id'=>1,
            'difficulty'=>2,
            'description'=>'Stajemy w rozkroku nieco szerszym, niż barki (inna forma ćwiczenia zakłada wysunięcie jednej nogi nieco w przód, dla lepszej równowagi) - klatka piersiowa wypchnięta ku przodowi, zachowana naturalna krzywizna kręgosłupa-pracują podczas ćwiczenia tylko ramiona i barki (staramy się unikać dodatkowych ruchów tułowia i nóg), uchwyt nieco szerszy, niż rozstaw barków. Im węższy uchwyt, tym bardziej pracę w ćwiczeniu przejmują mięśnie trójgłowe ramion.'
        ]);
        Exercise::create([
            'name'=> 'Wyciskanie sztangi zza głowy',
            'author_id'=>1,
            'difficulty'=>2,
            'description'=>'Stajemy w rozkroku nieco szerszym, niż barki (inna forma ćwiczenia zakłada wysunięcie jednej nogi nieco w przód, dla lepszej równowagi) - klatka piersiowa wypchnięta ku przodowi, zachowana naturalna krzywizna kręgosłupa-pracują podczas ćwiczenia tylko ramiona i barki (staramy się unikać dodatkowych ruchów tułowia i nóg), uchwyt nieco szerszy, niż rozstaw barków. Im węższy uchwyt, tym bardziej pracę w ćwiczeniu przejmują mięśnie trójgłowe ramion.'
        ]);
        Exercise::create([
            'name'=>'Wyciskanie sztangielek' ,
            'author_id'=>1,
            'difficulty'=>3,
            'description'=>' kolejne ćwiczenie, które można wykonywać zarówno w pozycji stojącej, jak i siedzącej - dłonie ze sztangielkami przez cały czas trzymamy tak, aby ich wewnętrzne części skierowane były do przodu(inna wersja przewiduje uchwyt młotkowy-dłonie zwrócone w czasie całego ruchu palcami w kierunku głowy).Ruch powinien odbywać się  pod pełną kontrolą ciężaru-ważna jest również pozycja podczas ćwiczenia-podobna do pozycji przy wyciskaniu sztangi. (wypchnięta klatka, naturalna krzywizna kręgosłupa)'
        ]);
        Exercise::create([
                    'name'=>'Arnoldki' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'Ćwiczenie można wykonywać zarówno w pozycji stojącej, jak i siedzącej -z łokciami przy tułowiu chwytamy sztangielki i unosimy je na wysokość barków tak, aby palce dłoni były skierowane do nas (podchwyt), równym tempem wypychamy sztangielki ponad głowę do pozycji, w której jeszcze nie są zablokowane ramiona-podczas wyciskania sztangielek obracamy dlonie tak,aby w końcowej  fazie ruchu palce były skierowane do przodu (nachwyt) - w szczytowym punkcie powtórzenia wstrzymujemy ruch na moment, po czym opuszczamy sztangielki do pozycji wyjściowej. Unikajmy blokowania ramion nad głową-dzięki temu utrzymamy stałe napięcie ćwiczonych mięśni. '
                ]);

        Exercise::create([
                    'name'=>'Unoszenie sztangielek bokiem w górę' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'ćwiczenie można wykonywać w pozycji stojącej lub siedzącej, oburącz lub jednorącz. W pozycji wyjściowej tułów lekko pochylony, ręce ze sztangielkami nieco ugięte w łokciach, opuszczone w dół, dłonie wewnętrznymi stronami skierowane do środka. Ruch unoszenia rozpoczynamy przy ugiętych rękach, łokcie w każdej fazie ruchu wyprzedzają dłonie. Sztangielki unosimy powyżej linii barków i bez zatrzymania opuszczamy powoli w dół (lub przytrzymujemy w pozycji szczytowej przez chwilę w celu dodatkowego napięcia mięśni). Ćwiczenie to można również wykonywać jednorącz sztangielką w odchyleniu-chwytamy się poręczy, drabinek lub jakiegoś innego przyrządu i odchylamy tułów w bok (jedna ręką trzymamy się poręczy, a w drugiej trzymamy sztangielkę) i unosimy sztangielkę bokiem w górę do poziomu (w tym punkcie można zatrzymać ruch na chwilę) następnie opuszczamy ją do pozycji wyjściowej. '
                ]);
                Exercise::create([
                                    'name'=>'Unoszenie sztangielek w opadzie tułowia' ,
                                    'author_id'=>1,
                                    'difficulty'=>3,
                                    'description'=>'ćwiczenie wykonujemy w pozycji siedzącej lub stojącej W pozycji stojącej: tułów ustawiamy w położeniu zbliżonym do prostopadłego do podłoża i staramy się w trakcie ruchu nie wykonywać nim tzw. bujania-utrzymujemy możliwie sztywno. Z pozycji wyjściowej ruchem kolistym unosimy sztangielki maksymalnie w górę, utrzymując przez cały czas ćwiczone mięśnie w stanie napięcia. Staramy się, aby w ruchu powrotnym sztangielki poruszały się po tym samym torze. Jak w poprzednim ćwiczeniu ,można w pozycji szczytowej przytrzymać przez chwilę sztangielki w celu dodatkowego napięcia mięśni. '
                                ]);
Exercise::create([
                    'name'=>'Podciąganie sztangi wzdłuż tułowia' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'w pozycji stojącej,rozkrok nieco szerszy od rozstawu barków, uchwyt na szerokość ramion (inna wersja przewiduje szerszy rozstaw dłoni, nawet szerszy niż rozstaw barków-zaangażowane są wtedy bardziej boczne aktony mięsni naramiennych, a ruch kończymy na wysokości klatki piersiowej). Ruchem wolnym i kontrolowanym unosimy sztangę w kierunku brody, starając się aby przemieszczała się możliwie najbliżej tułowia. Łokcie przez cały czas trzymamy powyżej gryfu sztangi. Ruch unoszenia kończymy, gdy sztanga znajdzie się na wysokości klatki piersiowej (lub staramy się podciągnąć sztangę aż do brody), opuszczamy również powoli, unikamy odchylania i bujania tułowia. Koncentrujemy się na unoszeniu łokci, a sztanga podąży za nimi. '
                ]);
Exercise::create([
                    'name'=>'Podciąganie sztangielek wzdłuż tułowia' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'w pozycji stojącej,rozkrok nieco szerszy od rozstawu barków, uchwyt na szerokość ramion (inna wersja przewiduje szerszy rozstaw dłoni, nawet szerszy niż rozstaw barków-zaangażowane są wtedy bardziej boczne aktony mięsni naramiennych, a ruch kończymy na wysokości klatki piersiowej). Ruchem wolnym i kontrolowanym unosimy sztangę w kierunku brody, starając się aby przemieszczała się możliwie najbliżej tułowia. Łokcie przez cały czas trzymamy powyżej gryfu sztangi. Ruch unoszenia kończymy, gdy sztanga znajdzie się na wysokości klatki piersiowej (lub staramy się podciągnąć sztangę aż do brody), opuszczamy również powoli, unikamy odchylania i bujania tułowia. Koncentrujemy się na unoszeniu łokci, a sztanga podąży za nimi. '
                ]);
Exercise::create([
                    'name'=>'Unoszenie ramion w przód ze sztangą' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'ćwiczenie wykonujemy w staniu rozkrok nieco szerzej od barków, uchwyt na szerokość barków-ułożenie dłoni zależy od rodzaju sztangi ,z jaką wykonujemy ćwiczenie: można zastosować nachwyt (przy użyciu sztangi prostej), nachwyt pod kątem (przy użyciu sztangi łamanej), uchwyt młotkowy (przy użyciu „kratownicy”)- rozbudowuje się dodatkowo obszar połączenia m. piersiowych z naramiennymi .Unosimy sztangę miarowym ruchem (bez szarpania) ponad poziom barków i opuszczamy również płynnym ruchem. Staramy się nie bujać tułowiem. W szczytowym położeniu można zatrzymać ruch na chwilę w celu dodatkowego napięcia mięśni. W fazie negatywnej (opuszczanie sztangi) utrzymujemy pełną kontrolę nad ciężarem. '
                ]);
Exercise::create([
                    'name'=>'Unoszenie ramion w przód ze sztangielkami' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'ćwiczenie wykonujemy w staniu rozkrok nieco szerzej od barków, uchwyt na szerokość barków-ułożenie dłoni zależy od rodzaju sztangi ,z jaką wykonujemy ćwiczenie: można zastosować nachwyt (przy użyciu sztangi prostej), nachwyt pod kątem (przy użyciu sztangi łamanej), uchwyt młotkowy (przy użyciu „kratownicy”)- rozbudowuje się dodatkowo obszar połączenia m. piersiowych z naramiennymi .Unosimy sztangę miarowym ruchem (bez szarpania) ponad poziom barków i opuszczamy również płynnym ruchem. Staramy się nie bujać tułowiem. W szczytowym położeniu można zatrzymać ruch na chwilę w celu dodatkowego napięcia mięśni. W fazie negatywnej (opuszczanie sztangi) utrzymujemy pełną kontrolę nad ciężarem. '
                ]);
Exercise::create([
                    'name'=>'Wyciskanie sztangi w leżeniu na ławce poziomej' ,
                    'author_id'=>1,
                    'difficulty'=>2,
                    'description'=>'Kładziemy się na ławce tak, by nogi ugięte były pod kątem prostym i przylegały do podłoża. Uchwyt średni(taki, by po opuszczeniu sztangi na klatkę ramiona tworzyły z przedramionami kąt prosty-kciuk dla bezpieczeństwa powinien obejmować sztangę-choć wielu bardziej doświadczonych kulturystów preferuje raczej tzw. ”małpi chwyt” (kciuk ponad gryfem).Opuszczamy sztangę na klatkę na wysokość ok.1 cm powyżej brodawek. Przy opuszczaniu sztangi wykonujemy głęboki wdech-wydychamy powietrze w trakcie wyciskania. Można okresowo praktykować przytrzymywanie sztangi przez chwilę na klatce przed wyciśnięciem.(szczególnie przydatne, jeżeli mamy w planach ewentualne starty w zawodach w wyciskaniu)-dodatkowo rozbudowuje siłę-pobudza do dodatkowego wysiłku. Łokcie prowadzimy w trakcie całego ruchu po bokach-tak by nie „uciekały”do środka. Ruch wyciskania kończymy(dla lepszego napięcia mięśni)zanim łokcie zostaną zblokowane. Ćwiczenie to można wykonywać również na maszynach lub na suwnicy Smitha '
                ]);
Exercise::create([
                    'name'=>'Wyciskanie sztangielek w leżeniu na ławce poziomej' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'Podobnie jak w ćwiczeniu ze sztangą ale daje ono jednak dodatkowe możliwości ćwiczącemu- np. chcąc położyć większy nacisk na rozwój wewnętrznej części klatki można w górnym położeniu(podczas fazy wyciskania) zbliżać sztangielki do siebie, co nie jest możliwe przy użyciu sztangi. Również faza opuszczania może mieć nieco odmienny przebieg - przy ćwiczeniu ze sztangą ruch ogranicza nam gryf sztangi, a wykorzystując do tego ćwiczenia sztangielki możemy opuszczać ręce poniżej (głębiej) poziomu klatki, co dodatkowo rozciąga mięsnie( w myśl zasady: im większy zakres ruchu, tym pełniejszy rozwój mięśni). Dodatkowo można w końcowej fazie ruchu obracać nadgarstki tak, by dłonie skierowane były do siebie palcami(pozwala to na dodatkowe napięcie wewnętrznych części mięśni). '
                ]);
Exercise::create([
                    'name'=>'Wyciskanie sztangi w leżeniu na ławce skośnej - góra' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'Ławkę ustawiamy pod kątem 30-45 stopni(większy kąt bardziej angażuje w ćwiczeniu mięśnie naramienne), kładziemy się głową do góry. Uchwyt sztangi, oddychanie, prowadzenie łokci, jak w ćwiczeniu na ławce płaskiej. Chwytamy sztangę i opuszczamy ją na klatkę-ok.10 cm. poniżej szyi. Staramy się skupiać uwagę na angażowaniu w pracę tylko mięsni piersiowych i maksymalnym wyłączeniu z niej mięsni naramiennych. W tym celu można lekko wygiąć grzbiet, jednocześnie wypychając klatkę do przodu. Nie wolno jednak odrywać zbytnio pleców od ławki, a biodra muszą bezwzględnie przylegać do ławki. '
                ]);
Exercise::create([
                    'name'=>'Wyciskanie sztangielek w leżeniu na ławce skośnej - góra' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'Ławkę ustawiamy pod kątem 30-45 stopni(większy kąt bardziej angażuje w ćwiczeniu mięśnie naramienne), kładziemy się głową do góry. Uchwyt sztangi, oddychanie, prowadzenie łokci, jak w ćwiczeniu na ławce płaskiej. Chwytamy sztangę i opuszczamy ją na klatkę-ok.10 cm. poniżej szyi. Staramy się skupiać uwagę na angażowaniu w pracę tylko mięsni piersiowych i maksymalnym wyłączeniu z niej mięsni naramiennych. W tym celu można lekko wygiąć grzbiet, jednocześnie wypychając klatkę do przodu. Nie wolno jednak odrywać zbytnio pleców od ławki, a biodra muszą bezwzględnie przylegać do ławki. '
                ]);
 Exercise::create([
                     'name'=>'Wyciskanie sztangi w leżeniu na ławce skośnej - dół' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Ławeczkę ustawiamy pod kątem 30-45 stopni- kładziemy się głową w dół, zapierając nogi o coś dla stabilności,(aby nie zsunąć się w dół podczas wykonywania ćwiczenia).Ruch wygląda tak samo, jak podczas wyciskania na ławce poziomej. Opuszczając sztangę nabieramy głęboko powietrza, wydychamy je wyciskając sztangę w górę. Ćwiczenie można wykonywać również przy pomocy suwnicy Smitha. '
                 ]);
Exercise::create([
                    'name'=>'Wyciskanie sztangielek w leżeniu na ławce skośnej - dół' ,
                    'author_id'=>1,
                    'difficulty'=>3,
                    'description'=>'Pozycja, jak w ćwiczeniu z użyciem sztangi-dodatkowe możliwości: np. chcąc położyć większy nacisk na rozwój wewnętrznej części klatki można w górnym położeniu(podczas fazy wyciskania) zbliżać sztangielki do siebie, co nie jest możliwe przy użyciu sztangi. Również faza opuszczania może mieć nieco odmienny przebieg - przy ćwiczeniu ze sztangą ruch ogranicza nam gryf sztangi, a wykorzystując do tego ćwiczenia sztangielki możemy opuszczać ręce poniżej (głębiej) poziomu klatki, co dodatkowo rozciąga mięsnie( w myśl zasady: im większy zakres ruchu, tym pełniejszy rozwój mięśni). Dodatkowo można w końcowej fazie ruchu obracać nadgarstki tak, by dłonie skierowane były do siebie palcami(pozwala to na dodatkowe napięcie wewnętrznych części mięśni). '
                ]);
 Exercise::create([
                     'name'=>'Rozpiętki ze sztangielkami' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Ćwiczenie rozpoczynamy z ramionami wyprostowanymi-prostopadłymi do podłoża( palce dłoni skierowane są do siebie), a w trakcie ruchu lekko uginamy je w łokciach. Nabieramy powietrza, gdy sztangielki są u góry(na początku ruchu) wydychamy je, gdy sztangielki wędrują do góry. W końcowej fazie ruch można zatrzymać na chwilę w celu lepszego napięcia mięśni. Staramy się nie uderzać sztangielkami o siebie, ale zatrzymywać ruch zanim się zetkną. Ważne jest wykonywanie pełnego zakresu ruchu(by dostatecznie rozciągnąć mięśnie)-im większy zakres wykonanego ruchu, tym pełniejszy ogólny rozwój mięśnia. Obciążenia dostosowujemy takie, by  wykonywać ćwiczenie poprawnie technicznie. Ćwiczenie to można również wykonywać przy pomocy linek wyciągów,lub specjalnej maszyny. '
                 ]);
 Exercise::create([
                     'name'=>'Pompki na poręczach' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'W tym ćwiczeniu, podobnie jak przy wyciskaniu wąsko również ważne jest by pracę wykonywały w głównym stopniu mięśnie piersiowe, w mniejszym stopniu chodzi nam o pracę mięśni trójgłowych ramion. Elementem decydującym o większym zaangażowaniu jednych, bądź drugich mięśni jest pozycja tułowia i ułożenie łokci. Należy wypracować takie ułożenie tułowia, przy którym główną pracę będą wykonywały mięśnie piersiowe, a łokcie pracować powinny w pewnym oddaleniu od tułowia. Dla lepszego wyeliminowania pracy tricepsów i lepszego napięcia mięsni piersiowych można również nie prostować ramion do końca. '
                 ]);
 Exercise::create([
                     'name'=>'Podciąganie szerokim uchwytem - nachwyt' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Nie ma drugiego takiego ćwiczenia pod względem wszechstronności rozwoju mięsni grzbietu. Ćwiczenie to można wykonywać do karku i do brody, lecz wersja do karku jest mniej naturalna dla stawów. Chwytamy drążek nachwytem na szerokość taką, by po podciągnięciu ramiona z przedramionami tworzyły kąt prosty(w przybliżeniu).Nogi ugięte w kolanach(dla lepszej stabilności można je spleść).Łokcie pracują w płaszczyźnie pleców-w jednej linii. Wdech robimy przed rozpoczęciem ruchu podciągania-wydech dopiero, gdy jesteśmy już u góry. Ruch podciągania kończymy w momencie, gdy nasza broda(lub kark) jest na wysokości drążka lub nieco ponad nim. Opuszczamy się wolno i pod pełną kontrolą. Jeśli jesteśmy bardziej zaawansowani i możemy wykonać wiele powtórzeń w tym ćwiczeniu, to można zastosować dodatkowe obciążenie. '
                 ]);
 Exercise::create([
                     'name'=>'Podciąganie w uchwycie neutralnym' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Chwytamy specjalny uchwyt(może to być rączka trójkątna od wyciągu przerzucona nad drążkiem prostym)-dłonie równolegle do siebie w odległości ok.20-25cm.,palcami skierowane do siebie. Z pełnego zwisu podciągamy się do linii podmostkowej. Nogi zwisają luźno, lekko podkurczone w kolanach. Łokcie staramy się prowadzić wzdłuż tułowia. Opuszczamy się powoli-kontrolując swój ciężar. Jeśli jesteśmy bardziej zaawansowani i możemy wykonać wiele powtórzeń w tym ćwiczeniu, to można zastosować dodatkowe obciążenie. '
                 ]);
  Exercise::create([
                      'name'=>'Podciąganie podchwytem' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Chwytamy drążek prosty podchwytem. Nogi zwisają luźno, lekko podkurczone w kolanach. Ze zwisu przechodzimy do podciągania. Kończymy je, gdy nasza broda znajdzie się ponad drążkiem, a nasze ramiona będą w pełni ugięte w łokciach. Łokcie staramy się prowadzić wzdłuż tułowia. Opuszczamy się powoli-kontrolując swój ciężar. Jeśli jesteśmy bardziej zaawansowani i możemy wykonać wiele powtórzeń w tym ćwiczeniu, to można zastosować dodatkowe obciążenie. '
                  ]);
 Exercise::create([
                     'name'=>'Wiosłowanie sztanga' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Stajemy nad sztangą w rozkroku na szerokość barków, pochylamy tułów do pozycji prawie równoległej do podłoża, plecy w dolnym odcinku mocno ugięte do środka, nogi lekko ugięte w kolanach przez cały czas trwania ćwiczenia. Wdech bierzemy w momencie rozpoczęcia podciągania-wydech dopiero, gdy sztanga dochodzi do brzucha(lub do klatki). Sztangę chwytamy na szerokość nieco większą od barków i podciągamy ją do brzucha(łokcie prowadzimy na boki).Druga wersja zakłada podciąganie sztangi do klatki piersiowej(jest to ruch odwrotny do wyciskania sztangi na ławce- gif 4b.)-angażowane są mocniej w tej wersji mięśnie czworoboczne grzbietu, obłe większe, mniejsze i tylne aktony mięśni naramiennych. Ćwiczenie to można również wykonywać przy pomocy suwnicy Smitha (gif 4a.)Opuszczamy ciężar z pełną kontrolą, wolnym tempem. Jeszcze inna wersja zakłada zastosowanie w tym ćwiczeniu podchwytu(można zastosować wtedy, dla lepszych efektów sztangę łamaną).Ta wersja z kolei mocniej angażuje dolne rejony ćwiczonych mięśni. '
                 ]);
 Exercise::create([
                      'name'=>'Wiosłowanie sztangielka' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Typowo izolowane ćwiczenie na rozbudowę(szczególnie na „grubość” górnej i środkowej części)mięśni najszerszych. Wolną ręką opieramy się o coś stabilnego(może to być nasze kolano, ale lepsza do tego będzie ławka).Tułów w pozycji prawie równoległej do podłogi. W drugą rękę chwytamy sztangielkę-i tutaj dwie wersje ćwiczenia-(gif 5)1:chwyt przez cały czas trwania ćwiczenia równoległy-dłoń zwrócona palcami w kierunku ciała, łokieć pracuje wzdłuż tułowia-pracują mocniej górne i środkowe części mięsni najszerszych;(gif 5a.)2: chwyt prostopadły do tułowia, dłoń zwrócona kciukiem w kierunku ciała, łokieć pracuje w bok od tułowia(pod kątem 90 stopni)-pracują mocniej górne części mięsni najszerszych. Podciąganie kończymy, gdy gryf sztangielki znajdzie się na równi z naszym barkiem lub odrobinę wyżej. Opuszczanie ciężaru kontrolowane. '
                  ]);
 Exercise::create([
                      'name'=>'Podciąganie końca sztangi w opadzie' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Stajemy okrakiem nad gryfem sztangi(półsztangi)i chwytamy drążek, tułów z udami tworzą kąt prosty, a z podłogą nieco większy. Nogi lekko ugięte w kolanach. W takiej pozycji podciągamy sztangę do brzucha. Opuszczanie ciężaru kontrolowane. Wdech bierzemy w momencie rozpoczęcia podciągania-wydech dopiero, gdy sztanga dochodzi do brzucha. W zależności od kąta, pod jakim chcemy zaatakować mięśnie używamy w tym ćwiczeniu różnych drążków(chwytamy je różnym uchwytem).I tak np. może to być drążek sztangi typu „T” lub drążek/rączka równoległa.Możne też ćwiczenie to wykonywać w leżeniu na ławce skośnej(mniej angażuje mięśnie dolnego odcinka grzbietu, mocniej izoluje mięśnie najszersze. '
                  ]);
 Exercise::create([
                      'name'=>'Przyciąganie linki wyciągu dolnego' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Siadamy płasko przed wyciągiem dolnym nogi zaparte o stabilny punkt oparcia i chwytamy rączkę wyciągu. Przyciągamy ją do brzucha, utrzymując przez cały czas tułów w pozycji pionowej. W końcowej fazie ruchu staramy się ściągnąć łopatki ku sobie. Po czym powoli, kontrolując ruch opuszczamy ciężar. Wdech przed rozpoczęciem przyciągania- wydech, gdy rączka jest przy brzuchu. Rączka może być różna(uchwyt w związku z tym również może być różny. Rączka równoległa pozwala na wykonanie ćwiczenia z uchwytem „młotkowym”. Angażuje on mięsnie górnej i środkowej części grzbietu. Rączka/drążek prosta/y pozwala na uchwyt nachwytem lub podchwytem, szeroko lub wąsko, co również angażuje pod różnym kątem mięsnie grzbietu. Nachwyt wąski i szeroki izoluje bardziej górną część mięsni grzbietu(szczególnie najszerszych i obłych), podchwyt wąski i szeroki angażuje mocniej środkową i dolną część tych mięśni. W ćwiczeniach szerokim uchwytem łokcie prowadzone są na boki, we wszystkich innych odmianach ćwiczenia prowadzone są przy tułowiu. Ćwiczenie to można wykonywać również jednorącz. '
                  ]);
 Exercise::create([
                      'name'=>'Przyciąganie linki wyciągu górnego' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Jak w ćwiczeniu z wyciągiem dolnym z tą różnicą, że użyty w ćwiczeniu jest górny wyciąg i siadamy na podwyższeniu(ławce). Siadamy płasko przed wyciągiem dolnym nogi zaparte o stabilny punkt oparcia i chwytamy rączkę wyciągu. Przyciągamy ją do brzucha, utrzymując przez cały czas tułów w pozycji pionowej. W końcowej fazie ruchu staramy się ściągnąć łopatki ku sobie. Po czym powoli, kontrolując ruch opuszczamy ciężar. Wdech przed rozpoczęciem przyciągania- wydech, gdy rączka jest przy brzuchu. Rączka może być różna(uchwyt w związku z tym również może być różny. Rączka równoległa pozwala na wykonanie ćwiczenia z uchwytem „młotkowym”. Angażuje on mięsnie górnej i środkowej części grzbietu. Rączka/drążek prosta/y pozwala na uchwyt nachwytem lub podchwytem, szeroko lub wąsko, co również angażuje pod różnym kątem mięsnie grzbietu. Nachwyt wąski i szeroki izoluje bardziej górną część mięsni grzbietu(szczególnie najszerszych i obłych), podchwyt wąski i szeroki angażuje mocniej środkową i dolną część tych mięśni. W ćwiczeniach szerokim uchwytem łokcie prowadzone są na boki, we wszystkich innych odmianach ćwiczenia prowadzone są przy tułowiu. Ćwiczenie to można wykonywać również jednorącz.Ćwiczenie to atakuje pod nieco innym kątem mięsnie grzbietu. Można stosować na zmianę obie wersje ćwiczenia(na dolnym i górnym wyciągu)dla urozmaicenia treningu. Dodatkowo można jeszcze wykonać ćwiczenie na specjalnej maszynie '
                  ]);
  Exercise::create([
                       'name'=>'Martwy ciąg' ,
                       'author_id'=>1,
                       'difficulty'=>3,
                       'description'=>'Stajemy przodem do sztangi, w rozkroku na szerokość barków lub nieco szerszym, nogi lekko ugięte w kolanach, gryf sztangi nad palcami stóp, sztangę chwytamy nachwytem, nieco szerzej niż barki. Klatka wypchnięta ku przodowi, tułów wyprostowany, głowa lekko zadarta do góry. Ćwiczenie polega na unoszeniu sztangi w górę poprzez prostowanie nóg i wyprost tułowia. Ruch kończymy przy pełnym wyproście tułowia-nie odchylamy go do tyłu-grozi to kontuzją. Nie wolno również dopuszczać do tzw. ”kociego grzbietu”, czyli wygięcia pleców w łuk(szczególnie w dolnym odcinku).Powrót do pozycji wyjściowej zaczynamy od lekkiego ugięcia nóg w kolanach, a następnie pochylamy tułów(oczywiście cały czas jest on wyprostowany)robiąc skłon. Nie pochylamy się jednak zbyt nisko. Ruch opuszczania ciężaru wolny i kontrolowany-sztanga nie uderza o podłogę, ale dotyka jej. Można ćwiczenie to wykonywać przy użyciu suwnicy Smitha. Dla zwiększenia zakresu ruchu stosuje się podkładki pod nogi. '
                   ]);
 Exercise::create([
                      'name'=>'Szrugsy' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Stajemy w rozkroku na szerokość barków lub nieco węższym, nogi wyprostowane, ale nie zblokowane, głowa prosto, ramiona ściągnięte do tyłu, klatka wypięta do przodu. Ćwiczenie można wykonywać zarówno ze sztangą, jak i ze sztangielkami. Trenując sztangą można użyć większego ciężaru, ale ruch z użyciem sztangielek jest bardziej naturalny. Chwytamy sztangielki i unosimy barki możliwie jak najwyżej ściągając je jednocześnie do tyłu. W najwyższym punkcie wstrzymujemy ruch przez chwilę dla lepszego napięcia mięśni i opuszczamy barki do pozycji wyjściowej. Po chwili powtarzamy ruch.. Wdech robimy w momencie rozpoczęcia ruchu, powietrze wydychamy w najwyższym punkcie. Ćwiczenie można również wykonywać za pomocą wyciągu dolnego,na specjalnej maszynie,za pomocą suwnicy Smitha, lub w pozycji siedzącej. '
                  ]);
 Exercise::create([
                      'name'=>'Przysiady ze sztangą na barkach' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Ćwiczenie to można wykonywać zarówno ze sztanga, jak i sztangielkami,przy pomocy suwnicy Smithalub maszyny. Wchodzimy pod sztangę stojącą na stojakach, barki opuszczone i odwiedzione w tył, gryf sztangi dotyka naszego karku na mięśniach czworobocznych grzbietu(ich górnej części), dłonie rozstawione w wygodnej i stabilnej pozycji na gryfie, klatka wypchnięta ku przodowi, naturalna krzywizna kręgosłupa-dolny odcinek grzbietu wypchnięty do przodu, rozstaw stóp w zależności od naszego poczucia stabilności(zmiana rozstawu stóp powodować będzie atak na mięśnie pod innym kątem), najlepiej nieco szerzej, niż barki, całe stopy przylegają do podłogi, ciężar ma opierać się na piętach, głowa zadarta nieco do tyłu. Z tej pozycji nabieramy głęboko powietrza i ściągamy sztangę ze stojaków i rozpoczynamy ruch w dół(najlepiej przed tym wypuszczając powietrze po ściąganiu sztangi ze stojaków i nabierając go ponownie). Przez cały czas plecy wygięte w jednakowy sposób, pracują tylko nogi. Najlepiej, gdy przez cały czas biodra i pięty znajdują się w jednej linii, nie wypychamy kolan do przodu(nie powinny wysuwać się dalej niż końce palców stóp). Schodzimy w dół do momentu, gdy zanika kontrola pracy mięsni czworogłowych, a ich rozciągnięcie jest maksymalne. Rozpoczynamy powrót do pozycji wyjściowej, wypychając się piętami podnosimy się w gorę, jednocześnie wypychając biodra w przód, aż do pozycji startowej. Drugą wersją tego ćwiczenia są tzw. ”półprzysiady” lub „płytkie” przysiady, można je wykonać również na suwnicy Smitha. Różnica polega na mniejszym zakresie ruchu-opuszczamy się jedynie do momentu, gdy nasze nogi ugną się pod kątem równym lub nieco mniejszym, niż 90 stopni. '
                  ]);
 Exercise::create([
                      'name'=>'Przysiady ze sztangą trzymaną z przodu' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Podobna technika, jak przy zwykłych przysiadach. Mocniej jednak angażowane są mięśnie czworogłowe ud-spowodowane jest to pionową pozycją tułowia związaną z położeniem sztangi z przodu. Gryf spoczywa na przedniej części mięśni naramiennych i górnej części klatki piersiowej. Uchwyt na szerokość barków-jeżeli trzymamy sztangę podchwytem,(co jest może mniej wygodne, ale bezpieczniejsze- gif 2a)lub węższy-jeżeli trzymamy gryf nachwytem-ze skrzyżowanymi ramionami,(co jest mniej męczące dla nadgarstków, ale przy dużych ciężarach mniej bezpieczne. '
                  ]);
  Exercise::create([
                       'name'=>'Prostowanie nóg w siadzie' ,
                       'author_id'=>1,
                       'difficulty'=>3,
                       'description'=>'Siadamy na siodle maszyny(ławki), dobrze gdy mamy oparcie-zapewnia ono lepszą stabilność tułowia, dłońmi chwytamy za uchwyt(lub krawędź) maszyny. Nogi ugięte w kolanach, zaparte o drążek maszyny na stopami(na wysokości kostek). Z tej pozycji wykonujemy ruch prostowania nóg do pełnego wyprostu w stawach kolanowych. W pozycji wyprostowanej zatrzymujemy ruch przez chwilę dla lepszego napięcia mięśni. Po czym powracamy do pozycji wyjściowej. Powrót w tempie wolnym i pod pełną kontrolą ciężaru. Powietrze nabieramy przed rozpoczęciem prostowania, wypuszczamy je, gdy kończymy prostowanie nóg. '
                   ]);
 Exercise::create([
                      'name'=>'Brzuszki na płasko' ,
                      'author_id'=>1,
                      'difficulty'=>1,
                      'description'=>'Kładziemy się na materacu lub ławce. Nogi ugięte, ręce nad głową i unosimy tułów w górę. Pierwsza do góry unosi się głowa, potem barki, a na końcu reszta tułowia. Dla lepszego zaangażowania mięśni skośnych brzucha, w końcowej fazie unoszenia tułowia można wykonywać nim skręty. Jest to jednak wersja trudniejsza i bardziej narażająca na ewentualne kontuzje(mocniej obciąża dolne partie grzbietu).Nabieramy powietrza przed rozpoczęciem ruchu, a wypuszczamy je w trakcie unoszenia tułowia. '
                  ]);
 Exercise::create([
                      'name'=>'Unoszenie nóg w zwisie' ,
                      'author_id'=>1,
                      'difficulty'=>3,
                      'description'=>'Chwytamy drążek prosty nachwytem lub podchwytem, jeżeli mamy kłopot z dłuższym utrzymaniem się na drążku, możemy zastosować paski. Unosimy nogi jak najwyżej do brody. Można również w tym ćwiczeniu wprowadzić skręty tułowia w końcowej fazie unoszenia nóg, co mocniej zaangażuje do pracy mięśnie skośne brzucha. Jeszcze inna wersja(mocno angażująca mięśnie skośne)polega na jednoczesnym skręcie bioder wraz z unoszeniem nóg. Osoby zaawansowane mogą w tym ćwiczeniu używać dodatkowego obciążenia zamocowanego do nóg, ale tylko jeżeli czują się na siłach-łatwo „przedobrzyć” i nabawić się bolesnej kontuzji. Tempo ruchu umiarkowane, bez zrywów. Im mniejsze ugięcie nóg w kolanach, tym większy stopień trudności ćwiczenia, większe zaangażowanie mięśni zginaczy bioder(przy zmniejszeniu pracy mięsni brzucha) i większe napięcia w dolnym odcinku grzbietu. '
                  ]);
Exercise::create([
                     'name'=>'Uginanie ramion ze sztangą' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Stajemy w rozkroku(na szerokość barków lub nieco szerzej)-sztangę chwytamy w zależności od tego, którą głowę bicepsu chcemy zaangażować bardziej. I tak odpowiednio: -uchwyt wąski(węższy niż szerokość ramion)-większe zaangażowanie głów krótkich, -uchwyt średni(na szerokość ramion)-obie głowy zaangażowane w równym stopniu,-uchwyt szeroki(szerszy od ramion)-większe zaangażowanie głów długich.Tułów podczas ćwiczenia utrzymujemy w pozycji wyprostowanej(bez bujania nim). Zakres ruchu: od pełnego rozgięcia bicepsów(nie ramion)do pełnego ich skurczu. Pełne rozciągnięcie bicepsów, to nie to samo, co pełny wyprost ramion. Należy unikać(nie tylko w tym ćwiczeniu) tzw. ”przeprostów” ramion, czyli nadmiernego ich wyprostowywania(do pełnego zakresu ruchu w stawie łokciowym).Łokcie przez cały czas przylegają do tułowia-nie powinny uciekać na boki, ani w przód, gdyż powoduje to zaangażowanie innych mięśni do pracy. Powietrza nabieramy w pozycji wyjściowej, wypuszczamy je dopiero po przejściu ciężaru przez najtrudniejszy punkt ruchu. W pozycji końcowej można zatrzymać na chwilę ciężar dla lepszego ukrwienia mięśnia, ale pod warunkiem utrzymania bicepsów w pełnym napięciu. Należy pamiętać, że ruch opuszczania musi być w pełni kontrolowany i wolniejszy od unoszenia. Do ćwiczenia można używać zarówno sztangi prostej, jak i łamanej-gryf łamany zmniejsza napięcia powstające w nadgarstkach. '
                 ]);
Exercise::create([
                     'name'=>'Uginanie ramion ze sztangielkami' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Ćwiczenie to można wykonywać zarówno w pozycji stojącej, jak i siedzącej. Bardzo dobre, jako rozgrzewkowe przed ciężkimi seriami ze sztangą, ale również jako samodzielne ćwiczenie rozwijające masę i kształt bicepsów. Polecane wykonanie z „supinacją” nadgarstka. Polega ona na stopniowym obracaniu dłoni w trakcie wykonywania ćwiczenia. W pozycji wyjściowej( ramiona wyprostowane) dłonie zwrócone są ku sobie palcami, a w miarę uginania ramion obracają się tak, by w końcowym momencie ruchu(przy zgiętych ramionach)małe palce były wyżej od kciuków. Daje to dodatkowe napięcie mięśni oraz kształtuje kulistość bicepsów. Prostowanie ramienia kończymy w momencie rozciągnięcia mięśni dwugłowych(nie do pełnej możliwości stawu łokciowego). Ruch można wykonywać na przemian-raz jedna ręka, raz druga(po 1 powtórzeniu), obiema rękami jednocześnie, lub opuszczając jedną rękę- jednocześnie unosząc drugą. Samemu trzeba wybrać, która wersja jest dla nas najefektywniejsza. Ułożenie łokci jak w ćwiczeniu 1-ze sztangą. Można również pominąć supinację nadgarstka, ale zmniejsza to efektywność ćwiczenia. '
                 ]);
Exercise::create([
                     'name'=>'Prostowanie ramion na wyciągu stojąc' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Stajemy w lekkim rozkroku przed wyciągiem, chwytamy rączkę nachwytem na szerokość ok.10-20 cm. Kciuki na rączce(tzw. ”małpi” chwyt).Lekko pochylamy się w przód i naciskamy rączkę wyciągu w dół. Ramiona przyciśnięte do tułowia. Ruch wykonują tylko przedramiona(pracują jedynie stawy łokciowe). Ramiona prostujemy do końca-dla lepszego napięcia mięśni. Nie unosimy łokci, gdy rączka wyciągu jest w górnym położeniu-spowodowałoby to zanik napięcia w tricepsach. Najważniejsze jest stałe utrzymanie napięcia w ćwiczonych mięśniach. Unikamy szarpania-ruch powinien być płynny, a faza opuszczania ciężaru wolniejsza, z pełną kontrolą ciężaru. '
                 ]);
Exercise::create([
                     'name'=>'Wyciskanie sztangielki francuskie' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Ćwiczenie to rozwija wszystkie głowy tricepsów ze szczególnym wskazaniem na głowę długa. Można je wykonywać zarówno w pozycji stojącej, jak i siedzącej. W pozycji siedzącej ponadto można zastosować oparcie(np. na ławce skośnej).Polepsza to stabilność, a co za tym idzie pozwala lepiej skoncentrować się na wykonaniu ćwiczenia. Możemy użyć sztangi prostej i łamanej. Łamana ma tę zaletę, że pozwala na zwiększenie zakresu ruchu i zmniejsza naprężenia powstające w nadgarstkach. Łokcie powinny trwać nieruchomo(jak najbliżej głowy) podczas ćwiczenia. Zakres ruchu:od pełnego wyprostu ramion, do pełnego zgięcia w łokciach. Przy pełnym zgięciu ramion, gdy sztanga znajduje się za głową, nie powinno się tracić nad nią kontroli(swobodne opuszczenie jej przeciąża mocno stawy łokciowe, co może prowadzić do kontuzji).Ćwiczenie można wykonywać również zastępując sztangę drążkiem wyciągu dolnego (prostym lub łamanym, bądź grubym sznurem zakończonym węzłami-stosujemy wtedy uchwyt równoległy). Można również wykonywać nieco inną odmianę ćwiczenia ze sztangielką trzymaną oburącz. Przy tej wersji należy pamiętać, o jednakowym angażowaniu w ćwiczenie obu rąk. '
                 ]);
Exercise::create([
                     'name'=>'Prostowanie ramienia ze sztangielką' ,
                     'author_id'=>1,
                     'difficulty'=>3,
                     'description'=>'Przy wyprostowanych plecach pochylamy się do przodu i opieramy jedną ręką o ławkę. W drugiej trzymamy sztangielkę i unosimy ramię nieco ponad linię pleców(nie niżej)-przedramię prostopadle do podłogi. Z tej pozycji pracując tylko tricepsem prostujemy ramię w łokciu unosząc ciężar aż do pełnego wyprostu. W pozycji końcowej zatrzymujemy na moment ruch dla lepszego napięcia mięśni. Musimy zwracać szczególną uwagę na to, by w trakcie ćwiczenia w ruchu było jedynie przedramię(praca w stawie łokciowym).Nie wolno dopuszczać do bujania ramieniem. Ruch opuszczania wolniejszy od unoszenia, z pełną kontrolą ciężaru. '
                 ]);
Exercise::create([
                     'name'=>'Bieżnia' ,
                     'author_id'=>1,
                     'difficulty'=>1,
                     'description'=>'Opis zbędny, no bieżnia...'
                 ]);
Exercise::create([
                     'name'=>'Rowerek' ,
                     'author_id'=>1,
                     'difficulty'=>1,
                     'description'=>'Opis zbędny, no bieżnia...'
                 ]);







    }
}
