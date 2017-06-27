=== Sketchfab Embed ===
Contributors: ramiy
Tags: Sketchfab, Embed, oEmbed, 3d, models
Requires at least: 3.5
Tested up to: 4.5
Stable tag: 1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed 3D models from sketchfab.com into your WordPress site.

== Description ==

Upload your 3D models to Sketchfab and embed them to any WordPress page in your site.

= About Sketchfab =

[Sketchfab](https://www.sketchfab.com) is the place to be for 3D files: a platform to publish and find the best 3D content. Millions of people make 3D models or scan the real world in 3D, why would they share this in 2D? What YouTube did for video makers, or Soundcloud for musicians, we are doing it for creators of 3D content.

Sketchfab integrates with all major 3D creation tools, and is natively built in Photoshop, Modo and Blender. Sketchfab supports 28 native 3D formats, and displays them in browser in real-time.

https://vimeo.com/43600255

= Sketchfab WordPress Plugin =

The Sketchfab 3D viewer can be embedded on any web page, as easily as a YouTube video. This plugin will enables you to embed 3d models from sketchfab using the model URL or model ID.

Choose any item from [sketchfab.com](https://www.sketchfab.com), or create your own! Copy the model URL and paste it to your post text editor. Then simply click over to the visual editor to confirm that it loads properly.

Alternatively, you can embed 3D models to your content using the `[sketchfab id=""]` shortcode and the model ID.

= More Information =

For any questions or more information, please [contact us](https://sketchfab.com/about#contact).

== Installation ==

= Installation =
1. In your WordPress Dashboard go to "Plugins" -> "Add Plugin".
2. Search for "Sketchfab Embed".
3. Install the plugin by pressing the "Install" button.
4. Activate the plugin by pressing the "Activate" button.

= Minimum Requirements =
* WordPress version 3.5 or greater.
* PHP version 5.2.4 or greater.
* MySQL version 5.0 or greater.

= Recommended Requirements =
* The latest WordPress version.
* PHP version 5.6 or greater.
* MySQL version 5.6 or greater.

== Frequently Asked Questions ==

= How do I embed 3D models from sketchfab? =

With this plugin you can use the model URL, just paste the URL into your post editor:
`https://sketchfab.com/models/034a1a146e304161b7c45b9354ed2dfd`

= How do I set custom dimensions to my models? =

Since wordpress 4.2 you can double click the embedded models and set max `width` and max `height` dimensions. It will add the WordPress `[embed]` shortcode:
`[embed width="400" height="300"]https://sketchfab.com/models/034a1a146e304161b7c45b9354ed2dfd[/embed]`

**Note:** Doing it the WordPress way, using the `[embed]` shortcode, is backwards and forward compatible, and it works with all the themes.

= Can I customize the embedded 3D models? =

For advanced customization, use `[sketchfab id=""]` shortcode with the following attributes:

* **id** - Model ID. this is a required field.
* **width** - Model width. Default 640.
* **height** - Model height. Default 480.
* **autostart** - Load model immediately once the page is ready, rather than waiting for a user to click the Play button. Default 0. This should probably not be used if you have a lot of models on the same page.
* **autospin** - Automatically spin around the z-axis after loading. Default 0. The greater the number, the faster the spin. A negative number will reverse the spin direction.

== Screenshots ==
1. Pasting the URL to the text editor.
2. Pasting the URL to the visual editor.

== Changelog ==

= 1.5 (2016-04-04) =
* Add shortcode.
* Move plugin files to 'includes' directory.

= 1.4 (2015-12-01) =
* Remove po/mo files from the plugin.
* Use translate.wordpress.org to translate the plugin.

= 1.3 (2015-04-21) =
* Prevent direct access to php files.
* Prevent direct access to directories.

= 1.2 (2015-03-04) =
* Add branding text and a video to the readme file.
* Add two screenshots.

= 1.1 (2015-03-02) =
* Add i18n support.
* Add hebrew (he_IL) traslation.

= 1.0 (2015-03-01) =
* Initial release
* Register oEmbed provider.
