# Aplikacja do zarządzania treningami i wglądem w osiągi

# Technologie:

- Język PHP
- Framework Laravel 7.2.x - Backend
- Vue.js 2.6.x, Vuetify - Frontend

# Funkcjonalności:

Użytkownik:
- może tworzyć swój własny plan treningowy (publiczny lub prywatny)
- może oceniać i komentować publiczne plany w aplikacji
- może obserwować publiczne plany i również je wykorzystać
- utworzone oraz obserwowane plany podpina pod odpowienie dni w tygodniu
- może dodawać własne ćwiczenia
- konfiguracja treningów w miarę możliwości jak najbardziej dowolna (ilość serii, ćwiczeń, powtórzeń)
- ma możliwość tworzenia postów, jak i komentowania innych artykułów utworzonych przez użytkowników
- może wprowadzać statystyki swoich treningów, dzięki czemu zapisywane są w systemie osiągi użytkownika w postaci: maksymalnych ciężarów oraz dostęp do wykresów wahań wagi
- oczywiście edycja i usuwanie artykułów oraz planów
- może wprowadzać swoje pomiary (waga, obwody)

# Dostęp do aplikacji:
W seederach utworzonych w projekcie jest stworzona struktura testowa dla aplikacji z następującym użytkownikiem:

e-mail: user@gmail.com

hasło: haslo123

Konfiguracja bazy danych MySQL dostępna w pliku .env
```angular2html
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=workout_plan
DB_USERNAME=root
DB_PASSWORD=
```
DB_DATABASE - nazwa dla bazy danych

DB_USERNAME & DB_PASSWORD - dane dostępowe do serwera lokalnego
#Uruchomienie
Po sklonowaniu lub pobraniu repozytorium:
```
npm install
php artisan migrate:fresh --seed
npm run watch
php artisan serve
```
