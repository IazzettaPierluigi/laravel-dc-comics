# Tutorial Laravel

# **Come si crea un nuovo file?**

---

- Apri la cartella dove ci sono tutti gli esercizi
- Aprio il terminale e lanci il comando:
    
    `composer create-project --prefer-dist laravel/laravel project-name "10.*"`
    

# **Prima di startare il server installiamo SASS:**

---

- Chiudi la cartella dove ci sono tutti gli esercizi
- Apri la cartella appena creata
- Apri il terminale e lancia questi comandi uno alla volta:
    
    `npm remove postcss`
    
    `npm i`
    
    `npm i --save-dev sass`
    
- Cancella il folder di css
- Crea un altro folder (sempre in resources) chiamato scss e crea all’interno unn file chiamato app.scss
- Aggiorna il file vite.config.js:

```php
export default defineConfig({
		plugins: [
				laravel({
						input: [
								// Modifichiamo il percorso del css usando sass
								'resources/scss/app.scss',
								'resources/js/app.js'
						],
						refresh: true,
				}),
		],
		//Aggiungiamo un alias per la cartella /resources/
		resolve: {
				alias: {
						'~resources': '/resources/'
				}
		},
});
```

- Importiamo il nostro custom SCSS in app.js

```php
// Import our custom CSS
import '~resources/scss/app.scss'
```

- Nell’head di app.blade.php (il nostro layout) aggioungiamo:
    
    `@vite('resources/js/app.js')` 
    

# Come importo le immagini?

---

- Importiamo le immagini in app.js:

```php
import.meta.glob([
'../img/**'
])
```

```php
<img src="{{ Vite::asset('resources/img/logo.png') }}" alt="">

body {
	background-image: url('../img/page_bg.jpg');
}
```

# **Come starto il server?**

---

- Splitto il terminale e lancio:

```php
// terminale di laravel
php artisan serve
```

```php
// terminale di node
npm run dev
```

# Come collego mySQL e Laravel?

- Creiamo un nuovo progetto in PHPmyAdmin (cl115_db_nome)
- Importiamo il database
- Apriamo la cartella del progetto su cui dobbiamo lavorare su vsc

1. **Compiliamo il file .env** 

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=cl115_db_nome
DB_USERNAME=root
DB_PASSWORD=root
```

![Screenshot 2024-03-14 alle 13.08.00.png](https://prod-files-secure.s3.us-west-2.amazonaws.com/86e4ef31-ed41-479b-ae9e-61f6924c2263/9f8467a0-3887-4d83-bfa5-d12577101ca1/Screenshot_2024-03-14_alle_13.08.00.png)

1. **Creiamo un model:** 

`php artisan make:model NomeModello`

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomeModel extends Model
{
use HasFactory;
}
```

1. **Creiamo un controller** 

`php artisan make:controller Folder/NomeController`

```php
namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller{
		public function index(){
				// 4. recuperare i record 
				$variabile = NomeModello::All(); //SELECT * FROM NOME
				
				
				// 5. passare i record alla view
				return view('pages.welcome', compact('variabile'));
		}

```

In web.php:

```php
use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NomeController::class,'index'] )-›name('nomeRoute');
```

> **Ricordati di scommentare l’estensione: extension=pdo_mysql da php.ini**
> 

# Se hai clonato il template ecco i passaggi che devi seguire per rendere funzionale il tuo progetto:

1. `composer install`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `npm install`
5. `npm run dev`
6. `php artisan serve`