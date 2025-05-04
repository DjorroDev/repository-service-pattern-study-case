# Study cases for repository & service pattern

## What I just learnt

-   Repository meng-handle per table yang dimiliki di database membuat logic CRUD dan eloquent di sini.
-   Service melakukan segala logic yang dibutuhkan dan dapat memanggil beberapa repository pada instance service.
-   Service juga bisa memanggil service lain selama tidak menyebabkan circular depedency.
-   Controller hanya perlu handle request dan juga response dari user.
-   Meningkatkan maintainability pada sebuah code dan mengurangi redundance pada code.
-   Pattern ini menggunakan design Dependency Injection (DI)
-   Laravel memiliki built in DI yaitu service container dan service provider.
-   Pada kode ini saya mencoba implement repository & service pattern pada laravel dengan built in DI nya.
-   Contohnya pada controller invoices untuk menampilkan user dan controller invoice khusus admin. Di mana keduanya itu memiliki proses yang sama. dengan pattern tersebut bisa centralized logic untuk digunakan kepada kedua controller dengan layer service yang sama.
-   bonus: menggunakan form request validation biar controller makin ramping.

## Note

-   semua value return raw object pake extension parsed biar readable hehe
-   authentication nya hardcoded pada web.php `Auth::loginUsingId(3);`
-   edge cases tidak tercover (apalagi error handling)

## Case:

-   membuat halaman invoices untuk user dan untuk admin.
-   Ketika membuat user baru wajib memiliki satu invoice.

## How to run:

Cuman perlu build data dummy seeding dan factory.
`php artisan migrate:fresh --seed`

## Route list dokumentasi

### Invoice Routes

| Method | Path                | Description                              | Controller@Action          |
| ------ | ------------------- | ---------------------------------------- | -------------------------- |
| GET    | `/invoices`         | List all invoices based on the auth user | `InvoiceController@index`  |
| GET    | `/invoices/create`  | Display form to create a new invoice     | `InvoiceController@create` |
| POST   | `/invoices/create`  | Store a newly created invoice            | `InvoiceController@store`  |
| GET    | `/invoices/id/{id}` | Show details of a specific invoice       | `InvoiceController@show`   |

### Admin Panel - Invoice Routes

These routes are typically accessible to administrators.

## Admin Panel - Invoice Routes

These routes are typically accessible to administrators.

| Method | Path                           | Description                                     | Controller@Action                  |
| ------ | ------------------------------ | ----------------------------------------------- | ---------------------------------- |
| GET    | `/admin/invoices/create`       | Display form to create a new invoice (Admin)    | `AdminInvoiceController@create`    |
| POST   | `/admin/invoices/create`       | Store a newly created invoice (Admin)           | `AdminInvoiceController@store`     |
| GET    | `/admin/invoices/`             | List all invoices for all users (Admin)         | `AdminInvoiceController@index`     |
| GET    | `/admin/invoices/{id}`         | Show details of a specific invoice (Admin)      | `AdminInvoiceController@show`      |
| GET    | `/admin/invoices/users/{user}` | List invoices for a specific user (Admin)       | `AdminInvoiceController@getByUser` |
| GET    | `/admin/invoices/edit/{id}`    | Display form to edit a specific invoice (Admin) | `AdminInvoiceController@edit`      |
| PUT    | `/admin/invoices/edit/{id}`    | Update a specific invoice (Admin)               | `AdminInvoiceController@update`    |
| DELETE | `/admin/invoices/delete/{id}`  | Delete a specific invoice                       | `AdminInvoiceController@delete`    |

### Admin Panel - User Routes

These routes are typically accessible to administrators for managing users.

| Method | Path             | Description                                   | Controller@Action                  |
| ------ | ---------------- | --------------------------------------------- | ---------------------------------- |
| GET    | `/users`         | List all users                                | `AdminPanel\UserController@index`  |
| GET    | `/users/create`  | Display form to create a new user and invoice | `AdminPanel\UserController@create` |
| POST   | `/users/create`  | Store a newly created user and invoice        | `AdminPanel\UserController@store`  |
| GET    | `/users/id/{id}` | Show details of a specific user               | `AdminPanel\UserController@show`   |

## TODO NEXT (optional)

-   add Authentication
-   improve ui
-   error handling
-   add page buat tampilkan data
