Remember to replace:
{{client-name}} and {{client-url}}


# {{client-name}} Website

This site was build for {{client-name}} by [James Ferrell](http://jamesferrell.me) at [Berman Advertising](http://bermanadvertising.com). We hope you love working with it.



## Links for content creators:

### Admin panel access

URL: [http://{{client-url}}/panel]
Please Contact Berman for the username and password.

### Formatting content

[Kirbytext reference](https://getkirby.com/docs/content/text)



## Installation instructions for developers:

The {{client-name}} site was built with Kirby CMS, Sass, Gulp, and minimal Javascript. Here's a quick rundown on getting access to the production files:

1. Install NPM and Gulp globally (if necessary).
2. Install MAMP (or your localhost server maker of choice). Open it and start servers.
3. Clone the repo and initialize submodules with one command: ~git clone --recursive -j8 https://JamesFerrell@bitbucket.org/JamesFerrell/{{client-url}}.git~
4. ~cd {{client-url}}~ into the newly cloned folder and use ~npm install~ to install all of the Gulp dependencies.
5. Run ~Gulp~.



## Kirby CMS

### A quick rundown of Kirby file and folder organization, names, and concepts

There are 4 Kirby-related folders in the root directory:

1. Kirby. Kirby application files. Makes the whole thing work, but shouldn't be modified.
2. Panel. Makes the admin panel useable. The Kirby panel isn't required to use Kirby, but it is a big part of the draw.
3. Content. Contains folders with text file. The name and number of the folder relates to its page name and order. The text files are named by corresponding template. They are written in Kirbytext, which is an extended version of Markdown, and this is where the data and text for each page lives. Folders (pages) may contain folders (sub-pages) or files, as well. Meaning content can be version controlled, easily edited, and easily moved from one server to another. Kirby is kind of the best. Moving on!
4. Site. Contains the following:
  - Accounts (optional). User accounts for accessing the panel.
  - Blueprints (optional). YAML files that generate panel fields. Named by template.
  - Config. Global site options like the license field, caching, debugging, setting up redirects and vanity URLs, etc. Different servers can have unique config files, too.
  - Controllers (optional). Contains logic for corresponding templates.
  - Fields (optional). Custom fields to be used in admin panel blueprints.
  - Languages (optional). Enable different languages for custom translations.
  - Plugins (optional). Should probably be self-explanatory.
  - Snippets. Reusable chunks of code. Basically, they're includes.
  - Tags (optional). Custom tags to be used in content files.
  - Templates. Define custom logic and layout for different pages. Corresponds to content file name.


### My approach to building sites with Kirby

I came at web development as a visual designer. So I mostly learned to code front-end stuff to the extent that I could make my static comps functional. I'm pretty handy with the HTML and CSS, but definitely still learning when it comes to programming and templating. So with that in mind, here are some rules that for how I the PHP stuff:

- Filenames use dashes. Just dashes. So, stuff like 'global-nav.php'.
- All php logic should go at the top of the file when possible, including variables. This keeps the template code readable while keeping the logic within reach. So, I try not to use many controller files.
- Templates should only contain snippets and logic. All HTML and such should go in snippet files.
- Minor changes to snippet code should be handled by passing variables from the template where possible.
- Blueprints can get time consuming, but it's worth it for people that will use the site in the future.

### Kirby plugins

Beyond the basic Kirby install, I've also included the following handy plugins (as submodules):

#### Visual Markdown field

Replaces the default Kirby textarea field in the panel. Useful for clients that think Markdown is weird / hard.

[https://github.com/JonasDoebertin/kirby-visual-markdown](https://github.com/JonasDoebertin/kirby-visual-markdown)

#### MinifyHTML

Does exactly what you'd think. Every bit helps, right?

[https://github.com/ian-cox/Kirby-MinifyHTML](https://github.com/ian-cox/Kirby-MinifyHTML)

#### Kirby Table Plugin

Adds markdown syntax for tables.

[https://github.com/julien-gargot/kirby-plugin-table](https://github.com/julien-gargot/kirby-plugin-table)

#### Kirby Uniform

Robust form handling. Because I'm not so good with the back-end stuff.

[https://github.com/mzur/kirby-uniform](https://github.com/mzur/kirby-uniform)



## Gulp

I'm using Gulp to do a few things:

- concat and minify JS files
- compile SCSS files, run Autoprefixer and Pixrem, and output a minified CSS file
- set up a localhost proxy server to use with BrowserSync and either reload the page (when changes are made to .md or .php files) or inject the updated build files without reloading (when changes are made to .JS or .SCSS files)

The default task wipes and rebuilds the build folder (CSS and JS files), starts up the BrowserSync server, and watches the aforementioned files.

So far the gulp file is working as intended, and when it runs across an error, it sends an alert (via beepbeep), logs the error in the terminal, and keeps on going (via ~this.emit('end')~). *Side note: why was that so hard to figure out?*

I've also set up some paths as variables just below the module list in case I decide to restructure the way I organize my files in the future.



## CSS and Sass

Being able to nest media queries and split my CSS off into partials are the two main reasons why I love working with sass. It has also gotten way out of control in the past. So I set up a few guidelines for myself:

### Sass guidelines

1. Use mixins instead of extends. Extends sound great in theory, but in practice they quickly tangle source order and mess up inheritance. Plus, they don't play nice with media queries. And there's also the fact that [mixins are better for performance](http://csswizardry.com/2016/02/mixins-better-for-performance/).
2. Contain all mixins and variables within their own dedicated partials. They're just easier to find that way.
3. Agnostic names are better. For example, ~@mixin~ body-font instead of ~@mixin~ lato. ~$brand-color~ instead of ~$blue~.
4. Use nesting for media queries, states, and relationships. Avoid it for everything else.

### SCSS architecture

I use a modified version of the [7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern) for organizing SCSS files:

1. utils
2. vendor
3. base
4. layout
5. components
6. motion

To break it down further:

#### Utils

The only partials that should go here are variables, mixins, and utility classes, in that order.

1. Variables. Colors, font sizes (named after [Greek letters](http://csswizardry.com/2012/02/pragmatic-practical-font-sizing-in-CSS/)), breakpoints (named after t-shirt sizes), assorted measurements, and motion (for now, just the default timing setting for transitions).
2. Functions. For now, there's just a px to rem conversion function. For days when simple math feels really hard.
3. Mixins. Typography, layout & positioning, responsive background images, shadows, various components.
4. Utility classes. Typography, layout, margins, padding, hide content (by breakpoint). All utility classes are namespaced with ~u-~. [Lots of !important, which is a good thing](http://csswizardry.com/2016/05/the-importance-of-important/) in this context. Some classes include the $m (medium) breakpoint, and a limited few utilize mixins.

#### Vendor

This is where vendor code goes. This code should be as untouched as possible.

For the purposes of keeping this framework lean, the only thing here is my own little grid system. [Potentially outdated codepen demo](http://codepen.io/jamesferrell/pen/BKdqpZ) | Repo (coming after I work through issues).

I wanted to build the type of grid that makes sense as a developer (by padding all the things), but the designer in me wanted the edges nested objects to line up with the parent container, so I use negative margins for that.

It scales up the ~html font-size~ from 100% (16px) to 112.5% (18px) to 125% (20px) depending on viewport width, which scales the entire site if it's built with REM units.

All classes are namespaced with ~g-~ (for grid):
- ~.g-container~ sets a max width and horizontally centers itself
- ~.g-columns~ applies a clearfix and is mostly required for nesting, context, and grid modifications (more on that below)
- ~.g-col~ applies padding, removes top margin, and sets the default and max width to 100%.
- ~.g-[1-12]~ sets the corresponding column span width on larger viewports

Also, there are a few modifying classes that can be added to the ~.g-columns~ container in order to affect its children:
- ~.g-doubling~ doubles the ~.g-col~ span width at intermediate viewport sizes
- ~.g-constant~ maintains the specified .g-col span across all viewports
- ~.g-compact~ reduces ~.g-col~ gutter size (and compensates for nested ~.g-column~ with negative margin)
- ~.g-gutterless~ removes gutters from its children

#### Base

Global style for elements, easily overwritten.

1. Reset. Some stuff I found myself using across the board, such as a good ol' nuclear margin and padding reset, box-sizing: border-box and position: relative by default, max-width for images and such, form field resets, and some cherry picked stuff from normalize.CSS.
2. Typography. Default fonts, font-sizes, and font-weights, and line-heights. A .heading class that makes h1-6 style easily reusable. Classes that correspond to the font-size variables (with breakpoints that scale the really large ones down). Rules for when to honor ~br~ tags.
3. Theme. Default color, background-color, border-color, etc. A dark color scheme can be set on a parent to affect all children using the namespaced class ~.dark-theme~.
4. Lists. Unordered, ordered, and definition lists.
5. Tables. Table, rows headers, and columns.
6. Forms. Inputs, textareas, labels, buttons.
7. Blockquotes. Some tricky CSS that makes sure the attribution is styled accordingly, even when generated from Markdown, unless there is only one line.
8. Vertical-margins. Inspired by [Heydon Pickering's Lobotomized Owl Selector](http://alistapart.com/article/axiomatic-CSS-and-lobotomized-owls), I took that adjacent sibling selector and used it in ways that would probably make Heydon sad. I've since scaled it back considerably and now I mostly use utility classes to quickly modify vertical margins where possible. I may eventually roll this up into a different partial if I can think of something that makes sense. But for now, I still like to have a dedicated place where I can specify the vertical spacing between related elements, especially for content entered by non-web people through the CSS.
9. Print. Print media overrides.

#### Layout

Global site layout.

1. Layout. Globalest of global layout. Like, setting the body display to flex in order to easily make the footer sticky, and specifying padding for sections. There would be much more here if I weren't leveraging jf-grids.
2. Nav. Top site navigation bar. There is a lot going on in this one:
  - Nav container, fixed in viewports where that makes sense.
  - Some global style applied to navbar children
  - The logo
  - The main navigation list of links
  - Separate style for main navigation on smaller viewports
  - Dropdown menu and states
  - The hamburger button and states
  - Social icons (commented out)
  - Skip link
3. Header. I usually default to a big title with an image behind, plus breadcrumbs when that makes sense. There are usually some style variants for the home page, and those go here as well.
4. Footer. What goes in here varies depending on the site. Usually a sitemap (which usually requires the most style), social media links, and a copyright disclaimer.

#### Components

Every time the code for a particular element starts feeling overly complicated, I isolate it by breaking it out into its own component, with a matching .SCSS file (and .JS file, if necessary). Variants are included in the same SCSS partial.

#### Motion

Transitions and animations get their own dedicated, easily located partials.

- Transitions. Explicitly set which properties to transition per element.

## Class naming

The way my partials is organized helps to encourage that selectors are typically less complex earlier on in the stylesheet. So that, and the way my partials are organized is sorta kinda like an ITCSS a little bit.

After trying out BEM for a while I eventually found it cumbersome. It did, however, help teach me to think in terms of components so I'm thankful for that.

Also, by avoiding nesting where possible and abstracting some style into reusable classes, I'm taking a little bit of inspiration from OOCSS.

What I'm getting at is, I try to adopt principles that make sense and that don't tangle up my code.

### Namespaces

I've mostly gone over these while explaining my SCSS partial organization, but here they are for reference:

- ~.u-~ is for utility classes. These classes make it easier to design in the browser and prevent me from writing the same rules over and over. Often they are enforced with !important and sometimes they contain media queries or mixins.
- ~.g-~ is for jf-grid classes.
- ~.is-~ is for states, like ~.is-active~. Used in conjunction with attributes when possible.

### Component classes

I go for readability over cuteness and rigidity when marking up components and classes. So I'll namespace each class with the component name, followed by the element name.

Here's an example of a list of links:

~.nav-list (ul.nav-list)~

~.nav-item (li.nav-item)~

~.nav-link (a.nav-link)~

Here's a more complicated example:

~.card-container (div.card-container)~

~.card-thumb (a.card-thumb)~

~.card-img (img.card-img)~

~.card-caption (div.card-caption)~

~.card-title (a.card-title)~

~.card-meta (p.card-meta)~

Finally, when modifying classes, I will add a modifier namespace (namespace namespace?) to the class. I'll also leave the unmodified classes there too. This leads to some clunky html and inevitable style overrides, but it's easy to understand the structure. For example:

~.video-card-container (div.card-container)~

~.video-card-thumb (a.card-thumb)~

~.video-card-img (img.card-img)~

~.video-card-caption (div.card-caption)~

~.video-card-title (a.card-title)~

~.video-card-meta (p.card-meta)~



## Javascript

I use jQuery and generally avoid using javascript. Sorry if that makes you sad.

In all seriousness, I prefer accessibility over the single page app thing, especially for sites built with Kirby CMS. I'm not afraid of javascript (any more), but you can go a long way with good old HTML and CSS.

At some point in the near future I plan on looking into module loading, but for now everything is just concatenated and minified. Here's how it's organized:

1. Vendor. It's just jQuery for now.
2. Global. Contains the following:
  - Nav. Make the hamburger menu toggle work, makes dropdown menus accessible via keyboard.
  - Scroll. Just a smooth scroll script for now. Depends on an older version on jQuery, which is an issue I will get around to fixing at some point.
3. Components. This used to be pages, but I renamed it components. For now, there's only the  contact-form validation, which is in need of some love.
