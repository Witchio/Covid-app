# How to get the proyect on your pc
- ### command : composer install , to download dependecies
- ### copy .env file and change the db and wtv necessary
- ### generate an app key (when going to localhost it will say app keyx missing and they give you either command or a button where you can generate

# How to use scss with laravel
## Run this in command terminal
- ## if you havent done this before : 
- ### run npm install (to install dependencies)
- ### npm run dev (will compile everything)


## Using SCSS
- ### create the scss file you want to use in resources/sass
- ### in webpack.mix.js (located in the root folder) is where to link the scss file you are going to use, like so : 
```jsx
mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css") // this one comes with laravel
    .sass("resources/sass/nav.scss", "public/css"); //this is the one i added
```
- ### then run 'npm run dev' (this will create a css file with the name of your file in public/css)
  - ex. : post.scss (located in resources/sass) -> after running npm run dev -> creates a post.css (in public/css)

- ### when using the scss file you can run 'npm run watch' (to watch when youre using scss, so each time you save it compiles the scss into css)
  - works like the watch sass
