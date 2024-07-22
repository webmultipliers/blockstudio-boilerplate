# Blockstudio Boilerplate
A deeply opinionated way to get started with WordPress and Blockstudio.

The project will be renamed at in the future. It's far more than a boilerplate.

## Requirements
As long as you're committed to WordPress and building blocks with Blockstudio, you'll find useful tidbits in this project. 
- [WordPress](https://wordpress.org/)
- [Blockstudio](https://blockstudio.dev/?ref=16)

## Getting Started
1. Create a WordPress site.
2. Install the Blockstudio plugin.
3. Install a block-based theme or make your own modelled after the included theme.
4. Create a custom plugin to extend the theme and add blocks using Blockstudio.

## Theme
Includes an opinionated theme intended to be extended by a required companion plugin. 

### Root Files

- `theme.json` — The theme configuration file and all styles that are assignable settings. This file is required for the theme to be recognized by WordPress as block-based.
- `style.css` — The theme stylesheet that defines the theme name, version, author, and other details. We do not use this file for styles.
- `functions.php` — The theme functions file. The file should be included, but all functionality is added via the plugin.
- `index.php` — The theme index file. The file does not contain any code, but it's required for WordPress to recognize the theme.
- `screenshot.png` — The theme screenshot. The file does not contain any code, but it's required for WordPress to display the theme in the admin.

### Template Files

I like to start with a minimal set of template files. I'll add more as needed. The template files have a hierarchy, and WordPress will use the fallback system to determine which template file to use. 

Everything fallsback to `index.php` so I essentially ignore it since anticipate having full coverate with other templates. In most cases, the default `archive.php` will suffice for all archives excerpt for `author.php`, and `search.php`, and `single.php` will suffice for all posts excerpt for `page.php`.

- `404.php` — The 404 template file.
- `archive.php` — The archive template file.
- `author.php` — The author archive template file.
- `front-page.php` — The front page template file.
- `index.php` — The fallback template file.
- `page.php` — The single page template file.
- `search.php` — The search results template file.
- `single.php` — The single post template file.

### Parts
Not all of these parts are required, but I follow this pattern to keep things organized. 

#### Primary Site Components
- `site-header.php` — The site header template part. It's usually just named `header` but I like to be explicit.
- `site-footer.php` — The site footer template part.

#### Main Components
- `main-*.php` — The main content template part.
- `main-*-article.php` —  The main content article template part.
- `main-*-aside.php` — The main content aside template part.
- `main-*-query.php` — The main content query template part.
- `main-*-comments.php` — The main content comments template part.

#### Modal, Collapse, and Off-Canvas
- `site-menu-collapsed.php` — The site menu template part.
- `site-search-collapsed.php` — The site sidebar template part.

### Patterns
Patterns are a way to create reusable blocks of content that can be used in multiple places. I don't really use them in this project, but I include the directory for future use. 

### Assets
The theme assets directory is normally where all assets for the site are stored, but I'm only using it for fonts in this project. The remaining assets compilied and enqueued from in the plugin, including scripts, styles, and icons. Many of the styles are added via the `theme.json` file there is even less of a need for this directory for styles.

#### Fonts
The fonts directory is where you should store all the fonts for the project that you intend to use in the theme.json file.

The create-block-theme plugin will include all the necessary fonts for the project when sync down your changes. It will also create the required entries in the `fonts` array in the `theme.json` file.

## Plugin

### 📁 Assets

#### 📁 Icons
I don't have any icons, but I would probably put them here.

#### 📁 Images
I don't have any images, but I would probably put them here.

#### 📁 Scripts
The `/scripts` directory is where all the scripts for the site are stored. The directory is initiated as a Blockstudio instance with all filenames and Blockstudio settings determining how the `/_dist` directory is compiled. 

The `global-` prefix is used to add the script everwhere. The `-editor` and `-view` prefixes are used to declare if the script should be isolated to a particular context.

The `-inline` suffix can used to have the js files inlined to the end of the body. Each file is only inlined once.

##### Global Scripts
The project includes the `global-scripts` file along with the variations using the `editor` and `view` context suffixes.

- `global-scripts.js` 
- `global-scripts-editor.js`
- `global-scripts-view.js`

##### Block Editor
The `/block-editor` directory is where all the scripts for the block editor are stored. The `block-editor-` prefix is used to add the script to the block editor. The project includes an initial `block-editor-scripts.js` file.

- block-editor-scripts.js

##### Admin Scripts
The `/admin-scripts` directory is where all the scripts for the admin are stored. The `admin-` prefix is used to add the script to the admin. The project includes an initial `admin-scripts.js` file.

- admin-scripts.js

#### 📁 Styles
The `/styles` directory is where all the styles for the site are stored. The directory is initiated as a Blockstudio instance with all filenames and Blockstudio settings determining how the `/_dist` directory is compiled.

All included styles will be written to `.scss` files. Blockstudio will compile the `.scss` files to `.css` files in the `/_dist` directory. You can use `.css` but you won't find any `.css` files in this project.

The `-inline` suffix can used to have the scss files inlined to the head. Each file is only inlined once. 

You can also use the `-scoped` suffix sets all styles require a specific class selector to apply to the block. You can use `bs_get_scoped_class` function to get the class for the block.

##### Global Styles
The project includes the `global-styles` file along with `editor` and `view` context suffixes.

- `global-styles.scss`
- `global-styles-editor.scss`
- `global-styles-view.scss`

##### Block Editor
The `/block-editor` directory is where all the styles for the block editor are stored. The `block-editor-` prefix is used to add the style to the block editor. The project includes an initial `block-editor-styles.scss` file.

- block-editor-styles.scss

##### Admin Styles
The `/admin-styles` directory is where all the styles for the admin are stored. The `admin-` prefix is used to add the style to the admin. The project includes an initial `admin-styles.scss` file.

- admin-styles.scss

### 📁 Blocks
Each directory in the `blocks` is initaited as a Blockstudio instance to serve as a home for all blocks under a specific namespace. I recommend keeping the directory the same as namespace you're using the block.json files.

- Each block namespace has a directory in the `blocks` directory.
- Each is initialized as its own Blockstudio instance.
- Each block has its own directory in the block namespace directory.
- Extension folders can be added to each namespace directory to extend a block or blocks by name.
- Variations, overrides, transformations are defined in the block.json

#### Core Blocks
The project demonstrates how to extend core WordPress blocks and how to organize code snippets that impact core blocks. For example:

[Post Excerpt](/wp-content/plugins/example/blocks/core/post-excerpt/)

#### Custom Blocks
The project includes custom blocks that are not part of the core WordPress blocks. Each block has its own directory in the `blocks` directory. For example: 

[Stretched Link](/wp-content/plugins/example/blocks/example/stretched-link/)

### 📁 Experiences
I use the term "experiences" to describe how users can interact with the site, from logged-out visitors to logged-in admins. 

Each directory in the `experiences` tends to represent a broad, encapsulating set of features that may span 0 or more post types, taxonomies, custom field groups, and more. 

Most projects will bundle these directories in an `includes` folder. You do you, though.

Directories I typically include:
- `/reading` — For anything related to reading content on the site.
- `/editing` — For anything related to editing content on the site.
- `/writing` — For anything related to writing content on the site.
- `/branding` — For site-wide branding and settings.

### 📁 Plugins
The `Blockstudio\Build` class is initated in the `example/plugins/` directory to serve as the home for all code snippets extending any plugins installed on the site. Often plugins will require you to add code your theme's `functions.php` file or through a code snippet plugin. 

For any plugins you need to extend, create a subdirectory in the `plugins` directory using the plugin's slug. 

- `init-*.php` — The `.php` code you want to run. An `init.php` file is required any time you want any code in the directory to be included on the site, including styles and scripts.
- `README.md` — A brief description of the plugin and what you're doing with it.

### 📁 Vendors
The `Blockstudio\Build` class is initated in the `example/vendors/` directory to serve as the home for all code snippets related to a specific vendor. Like the `plugins` directory, you can create a subdirectory in the `vendors` directory using the vendor's name. and the recommended files.

The vendor directory is one the last places I look to add code to the site. I prefer to extend plugins or keep code with the block or experience it's related to.

When the code has no ties to anything other than the external service, it goes in the vendor directory. Blocks and other experiences may use functions from the vendor directory. 

## My Stack
I may use these solutions as representative services to build blocks to demonstrate capabilities.

If you don't like what I picked, you're on your own to find an alternative. If I don't use it, I'm not going to recommend it. And, I'm not going to add anything to the project that I can't personally provide support for.

### Hosting
- [InstaWP](https://app.instawp.io/register?ref=39TUWaLAzX) — Staging & Production Sites

### Building
- [Meta Box](https://metabox.sjv.io/XYbB05) — Custom Fields (Minus Blocks, Forms, and Views)
- [Blockstudio](https://blockstudio.dev/?ref=16) — Custom Blocks & Snippets
- [Bootstrap](https://getbootstrap.com/) — Frontend Framework (Partially)

### Coding
- [VS Code](https://code.visualstudio.com/) — Code Editor
- [Github Codespaces](https://github.com/features/codespaces) — Cloud Development Environment
- [Github Repos](https://github.com/) — Code Repository / Version Control

### Misc
- [1Password](https://1password.com/) — Password Manager
- [Cloudflare](https://cloudflare.com/) — DNS & CDN
- [Coda](https://coda.grsm.io/efegxdnrx8nt) — Shared Docs
- [Fathom Analytics](https://usefathom.com/ref/GCUTXX) — Web Analytics
- [Iubenda](https://iubenda.refr.cc/owner13) — Web Compliance
- [Klaviyo](https://www.klaviyo.com/partners/signup?utm_source=0013o00002bmWPFAA2&utm_medium=partner) — Marketing Automation
- [Mercury](https://mercury.com/r/vinnysgreen) — Banking
- [Oh Dear](https://ohdear.app/?via=vinny) — Web Monitoring
- [Shopify](https://www.shopify.com/) — Commerce

## Sponsorship
If you find this project helpful, give me money. No, seriously, pull out the ole wallet and fork over some cheddar. Time is money, and if I save you some time, you some should give me some money.

## Future Work
- More Blocks — Consider this pinned to the top of the list. I'll constantly be adding new blocks to the project.

## Disclaimer
- It's amateur hour over here. All code here is for inspiration only.
- You should enlist someone else to review any code you ship to production.
- Some links contain affiliate codes. I may earn a commission if you take up my recommendations.