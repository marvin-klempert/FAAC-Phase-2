=== Gravity Forms: GDPR Add-On ===
Contributors: data443
Tags: ccpa, gdpr, gravity forms
Requires at least: 4.7
Tested up to: 5.0.3
Requires PHP: 5.6.33
Stable tag: 1.0.2
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html

The easiest way to make your Gravity Forms GDPR-compliant. Fully documented, extendable and developer-friendly.

== Description ==

The easiest way to make your Gravity Forms GDPR-compliant GDPR compliant!

This plugin is a service of Data443.

Data443 is a Data Security and Compliance company traded on the OTCMarkets as LDSR. We have been providing leading GDPR compliance products such as ClassiDocs, Blockchain privacy, and enterprise cloud eDiscovery tools.

This plugin adds new privacy features to Gravity Forms. Your visitors can download or delete their form submissions automatically or submit a request for the site admin to do so.

Until WordPress releases their own GDPR compliance update, this plugin requires [The GDPR Framework](https://wordpress.org/plugins/gdpr-framework/) to function (it's free!)

Make sure to also read the guide! You don't need to drown your customers in pointless acceptance checkboxes if you know what you're doing!

## Disclaimer
Using Gravity Forms: GDPR Add-On does NOT guarantee compliance to GDPR. This plugin gives you general information and tools, but is NOT meant to serve as complete compliance package. Compliance to GDPR is risk-based ongoing process that involves your whole business. data443 is not eligible for any claim or action based on any information or functionality provided by this plugin.

### Documentation
How to use this plugin (practical guide): [Making your Gravity Forms GDPR-compliant](https://data443.atlassian.net/wiki/spaces/GDPRFKB/pages/28246137/Gravity+Forms+GDPR+add-on)
How to use this plugin (the legal stuff explained): [Legal grounds for processing data](https://www.data443.com/legal-grounds-for-processing-data/)
Full documentation: [The WordPress Site Owner's Guide to GDPR](https://www.data443.com/wordpress-site-owners-guide-to-gdpr/)
For developers: [Developer Docs](https://www.data443.com/wordpress-gdpr-framework-developer-docs/)

### Features
&#9745; Allow both users and visitors without an account to view, export and delete their form submissions or request the site admin to do so;
&#9745; Configure forms to be excluded from viewing, exporting or deleting.
&#9745; Support for anonymization: allow admin to select which fields must be anonymized;
&#9745; Track, manage and withdraw consent.

== Installation ==

= Download and Activation =

1. Upload the plugin files to the /wp-content/plugins, or install the plugin through the WordPress plugins screen directly.
2. This is addon Plugin so need ‘The GDPR Framework’ first installed.
3. Activate the plugin through the ‘Plugins’ screen in WordPress.

= Setup Guide =

Steps to add consent with Gravity Form are as follow:
1. First, need to create consent "Tool > Consent > Add consent type" .
2. Then note down the slug for example the slug is "contact_acceptance"
3. Then go to the Gravity form open gravity form on which consent need to add.
4. Add the checkboxes to form add label to checkboxes and remove extra checkboxes.
5. Add label for checkbox choice and add value same as slug for example in our case slug is "contact_acceptance". and make that checkbox required.
6. then save the form to reflect changes

Steps to choose anonymized as follow:
1. when plugin is activated evey field on gravity form will contain one checkbox "Anonymize"
2. for all field which container checked checkbox anonymize on Anonymize data of that email all fields will become blank.

== Changelog ==

= 1.0.2 =
* Add feature of Anonymize Data.
* Add feature of consent track.

= 1.0.1 =
* Initial release
