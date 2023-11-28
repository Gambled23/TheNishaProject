## About [Nisha](http:/nisha.lol/)

Webpage made by [César](https://github.com/Gambled23) and [Aranza](https://github.com/cybness)

### Built With
* [Laravel](https://laravel.com/)
* [Tailwind](https://tailwindcss.com/)
* [Livewire](https://laravel-livewire.com/)

### Host info
The webpage is hosted on a Oracle Cloud VM using a simple nginx server.

## Development enviroment
This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Prerequisites
If you want to use a Nix enviroment (recommended in case you know how to use nix), you can check out the [flake](https://github.com/Gambled23/TheNishaProject/blob/main/flake.nix).
* php and composer. [install instructions](https://www.php.net/downloads.php)
* npm
  ```sh
  npm install npm@latest -g
  ```
* Laravel. [install instructions](https://laravel.com/docs/10.x/installation)

### Installation
1. Clone the repo
   ```sh
   git clone https://github.com/Gambled23/TheNishaProject.git
   cd TheNishaProject
   ```
2. Install NPM packages
   ```sh
   npm install
   ```
3. Install composer packages
   ```sh
   composer install
   ```
4. Generate .env
   ```sh
   cp .env.example .env
   ```
5. Generate a new key
   ```sh
   php artisan key:generate
   ```
6. Fill out your credentials in `.env`



## Usage for development
* Deploy development styles server
   ```sh
   npm run dev
   ```
* Deploy development server
   ```sh
   php artisan serve
   ```
   
## Usage for production
* Build styles
   ```sh
   npm run build
   ```
* Host anyhow you want

## Contact
César - [ipog71@gmail.com](mailto:ipog71@gmail.com)
Aranza - [example@gmail.com](mailto:example@gmail.com)


## Acknowledgments
* [Free SVG icons](https://fontawesome.com/)
* [Laravel documentation](https://laravel.com/docs/10.x/readme)
* [Deploy laravel with nginx](https://laravel.com/docs/10.x/deployment#nginx)
* [Grid Cheatsheet](https://grid.malven.co/)
