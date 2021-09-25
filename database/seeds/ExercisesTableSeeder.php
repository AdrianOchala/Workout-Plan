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
            'difficulty'=>2,
            'description'=>'Stajemy w rozkroku nieco szerszym, niż barki (inna forma ćwiczenia zakłada wysunięcie jednej nogi nieco w przód, dla lepszej równowagi) - klatka piersiowa wypchnięta ku przodowi, zachowana naturalna krzywizna kręgosłupa-pracują podczas ćwiczenia tylko ramiona i barki (staramy się unikać dodatkowych ruchów tułowia i nóg), uchwyt nieco szerszy, niż rozstaw barków. Im węższy uchwyt, tym bardziej pracę w ćwiczeniu przejmują mięśnie trójgłowe ramion.'
        ]);
        Exercise::create([
            'name'=> 'Wyciskanie sztangi zza głowy',
            'difficulty'=>2,
            'description'=>'Stajemy w rozkroku nieco szerszym, niż barki (inna forma ćwiczenia zakłada wysunięcie jednej nogi nieco w przód, dla lepszej równowagi) - klatka piersiowa wypchnięta ku przodowi, zachowana naturalna krzywizna kręgosłupa-pracują podczas ćwiczenia tylko ramiona i barki (staramy się unikać dodatkowych ruchów tułowia i nóg), uchwyt nieco szerszy, niż rozstaw barków. Im węższy uchwyt, tym bardziej pracę w ćwiczeniu przejmują mięśnie trójgłowe ramion.'
        ]);
        Exercise::create([
            'name'=>'Wyciskanie sztangielek' ,
            'difficulty'=>3,
            'description'=>' kolejne ćwiczenie, które można wykonywać zarówno w pozycji stojącej, jak i siedzącej (gif 5.) - dłonie ze sztangielkami przez cały czas trzymamy tak, aby ich wewnętrzne części skierowane były do przodu(inna wersja przewiduje uchwyt młotkowy-dłonie zwrócone w czasie całego ruchu palcami w kierunku głowy).Ruch powinien odbywać się  pod pełną kontrolą ciężaru-ważna jest również pozycja podczas ćwiczenia-podobna do pozycji przy wyciskaniu sztangi. (wypchnięta klatka, naturalna krzywizna kręgosłupa)'
        ]);

    }
}
