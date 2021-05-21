=== CodeMirror Blocks ===
Contributors: vickyagravat
Tags: codemirror, code block, syntax highlighter, code highlighter, editor, php, html, css, javascript, python, java, jsx, react, snippet, highlight, syntax highlighting
Requires at least: 5.0
Donate link: https://paypal.me/VikeshAgravat
Tested up to: 5.6
Stable tag: 1.2.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

CodeMirror Blocks is useful for developers blog, tutorial site where display formatted (highlighted) code of any program. With support of 100+ Language/Mode, with 56 Different Color Themes.

== Description ==

CodeMirror Blocks is useful for developers blog, tutorial site where to display formatted (highlighted) code of any program.
It supports 100+ Programming, Scripting and MarkUp Language, with 56 Different Themes.

The Code Block is dependent on a [CodeMirror](https://codemirror.net/) library.

Formatted Code Block is like (syntax highlighting feature) that displays source code, in different colors and fonts according to the category of terms. It is one strategy to improve the readability and context of the text; especially for code that spans several pages. The reader can easily ignore large sections of comments or code, depending on what they are looking for.

This plugin is just plug and play, no tedious configurations or hacks, just install, activate and start using block inserter.


**New features include**

* (New) Control Panel Added on top of the Code Block.
    ** It displays language/filename.
    ** It also display three buttons, includes Run/Execute, FullScreen, Copy Code.
* (New) Web editor (Execution of HTML, CSS JavaScript block) With CodeMirror Block 1.1
* (Updated) Code block is now CodeMirror Block 1.1
* (New) Option Page for set default options
* (New) Highlight Active Line (now available on CodeMirror Block 1.1)
* (New) CodeMirror Block 1.1 now support Block align (Wide Width, Full Width) if your theme Supports.
* (New) Classic Editor Support (Partial)

**Features**

* Lightweight and fast
* Secure code with using clear coding standards
* Intuitive interface with many settings
* Cross browser compatible (work smooth in any modern browser)
* Works also on android mobile browser
* Compatible with all Default WordPress themes (tested with Latest Twenty Twenty)

**Key features include**

* Code syntax highlighting
* Line number (On/Off) option
* 56 Themes (all provided themes from CodeMirror)
* 100+ Programming languages (all most provided languages from CodeMirror)
* Programming language selection option
* Loading CodeMirror files on pages only when needed

**A list of supported themes:**

* 3024 day
* 3024 night
* Ambiance mobile
* Ambiance
* Base16 dark
* Base16 light
* Blackboard
* Cobalt
* Colorforth
* Eclipse
* Elegant
* Erlang dark
* Lesser dark
* Liquibyte
* MBO
* MDN-like
* Midnight
* Monokai
* Neat
* Neo
* Night
* Paraiso dark
* Paraiso light
* Pastel on dark
* Rubyblue
* Reactjs.org Theme
* Solarized
* The matrix
* Tomorrow night bright
* Tomorrow night eighties
* TTCN
* Twilight
* Vibrant ink
* XQ dark
* XQ light
* Zenburn


== Installation ==

Install "CodeMirror Blocks" just as you would any other WordPress Plugin.

Automatically via WordPress Admin Area:

1. Log in to Admin Area of your WordPress website.
2. Go to `Plugins` -> `Add New`.
3. Find this plugin and click install.
4. Activate this plugin through the `Plugins` tab.

Manually via FTP access:

1. Download a copy (ZIP file) of this plugin from WordPress.org.
2. Unzip the ZIP file.
3. Upload the unzipped catalog to your website's plugin directory (`/wp-content/plugins/`).
4. Log in to Admin Area of your WordPress website.
5. Activate this plugin through the `Plugins` tab.

[More help installing plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins "WordPress Codex: Installing Plugins")

== Frequently Asked Questions ==

= Q. It Supports Classic Editor? =
Yes, Now it supports classic editor. So, works with tinyMCE editor. But it not support live syntax highlighting.

= Q. It is Run without Gutenberg? =
Yes, But if you want get live syntax highlighting, you have to install and activate Gutenberg, or Update your WordPress to latest version with built-in Block Editor.

= Q. How to insert Code Block in Post? =
A. Adding `Code Block` is same as inserting other Blocks.

1. Log in to Admin Area of your WordPress website.
2. Go to `Posts` -> `Add New`.
3. Click The + button. it display all available `Blocks` to Insert.
4. Find or Search `Code Block`.
5. Click `Code Block` to insert in Post.

= Q. How to change Language / Mode of Code Block? =
A. Just select your `Language / Mode` from Select Dropdown.

= Q. How to change color Theme of Code Block? =
A. Just select your `Theme` from Select Dropdown.

= Q. How to enable or disable Line Numbers? =
A. Just click toggle button to (On/Off) it.

= Q. How to enable or disable Highlight Active Line? =
A. Just click toggle button to (On/Off) it.

= Q. How to enable or disable Warp Long Line? =
A. Just click toggle button to (On/Off) it.

= Q. How to enable Execute Button (Beta)? =
A. Execute the code is currently in beta testing, if you want to enable it,
1. Log in to Admin Area of your WordPress website.
2. Go to `CodeMirror Blocks` Options Page.
3. Scroll Down and Find `(Beta) Output Block`
4. Check Yes `Enable Execution Button?` You can also set Execute Button Text.
5. Now, Go to Editor and select any Code Block and Set `Editable on Frontend?` option to (On or Yes).
6. Please Note that Code Block have Web Languages such as (HTML, CSS, or Javascript) Language/Mode, will only have Execute Button.

= Q. Does this require any knowledge of HTML or CSS? =
A. Absolutely not. This plugin can be configured with no knowledge of HTML or CSS, using an easy-to-use Block. But you have to know about code pasted on `CodeMirror Block 1.1`, to select proper Language/Mode.

= Q. The last WordPress update is preventing me from editing my website that is using this plugin. Why is this? =
A. This plugin can not cause such problem. More likely, the problem are related to the settings of the website. It could just be a cache, so please try to clear your website's cache (may be you using a caching plugin, or some web service such as the CloudFlare) and then the cache of your web browser. Also please try to re-login to the website, this too can help.

== Screenshots ==

1. How to Add CodeBlock (Block Editor).
2. Paste `CODE` and Select appropriate Language to highlight `CODE` (Block Editor).
3. Change Theme from 50+ different themes, with live Preview (Block Editor).
4. Toggle Line Number with one click (Block Editor).

== Other Notes ==

==Credits==

* This Plugin use CodeMirror library to highlight `Code Blocks`. [CodeMirror](https://codemirror.net/) is an open-source project shared under the [MIT license](https://codemirror.net/LICENSE).

== Changelog ==

= 1.2.3 =
* Fix: [SVG CSS issue.](https://wordpress.org/support/topic/svg-css-issue/)
* Fix: [Unwanted animation in html element use](https://wordpress.org/support/topic/unwanted-animation-in-html-element-use/)

= 1.2.2 =
* Fix: [Undo (Ctrl+Z) command makes the block unusable.](https://wordpress.org/support/topic/undo-ctrlz-command-makes-the-block-unusable/)

= 1.2.1 =
* Fix: [Problem with "First Line Number" while trying re-editing the post](https://wordpress.org/support/topic/problem-with-first-line-number-while-trying-re-editing-the-post/)

= 1.2.0 =
* Added: New Panel Added on top of Code Block.
    = It Contains Language label witch display language used in block
    = Three Buttons
    1. Run/Execute Button [Requested](https://wordpress.org/support/topic/how-to-add-a-button-for-executing-the-code-blocks-for-the-user/)
    1. Full Screen Button
    1. Copy Code Button [Requested](https://wordpress.org/support/topic/how-to-create-copy-to-clipboard-button/)
* Added: Enable Code Block on Home page [Requested](https://wordpress.org/support/topic/syntax-highlighting-not-working-on-homepage-of-twenty-seventeen-theme/)
* Fix: [Codeblock Display Issue ](https://wordpress.org/support/topic/codeblock-display-issue/)

= 1.1.3 =
* Fix: Issue [Problems with the default highlighting setting](https://wordpress.org/support/topic/problems-with-the-default-highlighting-setting/)

= 1.1.2 =
* Fix: Issue [Html code](https://wordpress.org/support/topic/html-code-25/)

= 1.1.1 =
* Fix: Typo on Settings Page.

= 1.1.0 =
* Update: Now with CodeMirror Block it is more optimized and have new features.
* Add: Option Page for set default options. [Suggested](https://wordpress.org/support/topic/default-code-theme/)
* Add: Support for Classic Editor [Suggested](https://wordpress.org/support/topic/shortcode-for-classic-editor/)
* Optimized: Now, CodeMirror Block js and css files will only load if needed [Suggested](https://wordpress.org/support/topic/loading-codemirror-files-on-pages-only-when-needed/)
* Beta Add: Button for Execute code only works on HTML, CSS and JavaScript type code block [Suggested](https://wordpress.org/support/topic/how-to-add-a-button-for-executing-the-code-blocks-for-the-user/)
* Fix: With Autoptimize it breaks some JavaScript. [Suggested](https://wordpress.org/support/topic/works-great-excepting/)

= 1.0.7 =
* Update: Suggested [Code](https://wordpress.org/support/topic/enqueuing-admin-scripts/).

= 1.0.6 =
* Add: Added 2 Event Listeners `wpcm_editor_loaded` and `wpcm_editors_loaded`

= 1.0.5 =
* Improve: Performance Improved.
* Update: Suggested [Code](https://wordpress.org/support/topic/editors-2/#post-11274234).

= 1.0.4 =
* Change: minor changes.

= 1.0.3 =
* Improve: Performance.
* Add: Some Suggested [Code](https://wordpress.org/support/topic/editors-2/).

= 1.0.2 =
* Change: minor changes.

= 1.0.1 =
* Fix: [Rust language](https://wordpress.org/support/topic/rust-language/) issue.
* Fix: simple mode addon for (Docerfile, factor)
* Fix: htmlembded mode addon for (Embedded JavaScript, Embedded Ruby, ASP.NET, Java Server Pages)

= 1.0 =
* Created A New Plugin.

== Upgrade Notice ==

= 1.1.0 =
Added New Features Included.
