# britishinterplanetarysociety

Customisations for the British Interplanetary Society.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.3+
* CiviCRM 5.28+
* Mjwshared (https://lab.civicrm.org/extensions/mjwshared).
* Minifier (recommended) (https://lab.civicrm.org/extensions/minifier).

## Functionality

* Add javascript to limit selections on "publication" choices on contribution page 1.
* Select "Postage outside of UK" when a country other than "United Kingdom" is selected.

## Development / Tips

Any javascript/css found in the js/css directories with the name `contributionX.css/js` will
load on the "X" contribution page (where X is the contribution page ID).

There is also a generic `contributionpage.css` and `contributionpage.js` that will load on
all contribution pages if found.
