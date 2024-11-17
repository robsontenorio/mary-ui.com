<p align="center"><img width="200" src="public/mary.png"></p>

## maryUI v2 - Alpha

⚠️ **WIP** - DO NOT USE IN PRODUCTION
<hr />

This branch will follow the **daisyUI 5** and **Tailwind 4** progress.

See daisyUI 5 components WIP.  
https://github.com/saadeghi/daisyui/tree/v5/components

## Setup

⚠️ This considers you are using **only maryUI** without any starter kits like Jetstream/Breeze or even Filament.

<hr />

- Remove `tailwind.config.js` and `postcss.config.js` from your project.
- Remove unnecessary dependencies from your `package.json` file and add new ones.

```bash
rm tailwind.config.js postcss.config.js && 
yarn remove autoprefixer postcss && 
yarn add -D daisyui@next tailwindcss@next @tailwindcss/vite@next
```

- Add the following to your `vite.config.js` file.

```js
import tailwindcss from '@tailwindcss/vite'

...

plugins: [
    tailwindcss(),
    ...
]

```

- Edit the top of your `app.css` file to look like this.

```css
@import "tailwindcss";

@plugin "daisyui";

@source "../views/**/**/*.blade.php";
@source "../../app/**/**/*.php";
@source "../../vendor/robsontenorio/mary/src/View/Components/**/*.php";
@source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
```
