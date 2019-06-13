# ms-resonant

A child theme of [Resonant](https://themeskingdom.com/wordpress-themes/resonant-portfolio-wordpress-theme/), by Themes Kingdom  
License: GNU General Public License v2 or later  
Used at: [https://ms-studio.net/](https://ms-studio.net/)

## Typography

The default font of Resonant is **[Overpass](http://overpassfont.org/)**, loaded via Google Fonts. It uses three weights: Regular, Semibold and Bold, as well as their italics.

This child-theme disables Overpass, and uses the following fonts instead:

* **Source Serif Pro**, Regular and Bold, loaded via Google Fonts. The italics are loaded as webfonts (they aren't available on Google). Used for body text.
* **News Cycle** (Regular), via Google Fonts. Used for headings.
* **Archivo Narrow** (Semibold), via Google Fonts. Used as bolder counterpart to News Cycle.
* **Monoist**, for code samples.

## Templates

Some of the main templates:

- Category view: uses 'templates/template-parts/content', 'portfolio'

Q: what cases the difference between the "page-template-portfolio-plus" and other cases?
A: the "show-hide" effect is based on ".content-in .portfolio-archive .featured-image + .entry-header". 

Where is .portfolio-archive applied?
In the following templates:
- archive-jetpack-portfolio.php
- header.php via the condition: "is_front_page() && ! is_paged() && resonant_has_featured_posts()"
- taxonomy-jetpack-portfolio-tag.php
- taxonomy-jetpack-portfolio-type.php
- portfolio-page.php

Where is .content-in applied? In resonant_body_classes(), in extras.php
This class is applied to Body via "Portfolio archives classes" based on some conditions.

- resonant_posted_on = how does this work?