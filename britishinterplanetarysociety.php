<?php

require_once 'britishinterplanetarysociety.civix.php';
// phpcs:disable
use CRM_Britishinterplanetarysociety_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function britishinterplanetarysociety_civicrm_config(&$config) {
  _britishinterplanetarysociety_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function britishinterplanetarysociety_civicrm_xmlMenu(&$files) {
  _britishinterplanetarysociety_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function britishinterplanetarysociety_civicrm_install() {
  _britishinterplanetarysociety_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function britishinterplanetarysociety_civicrm_postInstall() {
  _britishinterplanetarysociety_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function britishinterplanetarysociety_civicrm_uninstall() {
  _britishinterplanetarysociety_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function britishinterplanetarysociety_civicrm_enable() {
  _britishinterplanetarysociety_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function britishinterplanetarysociety_civicrm_disable() {
  _britishinterplanetarysociety_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function britishinterplanetarysociety_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _britishinterplanetarysociety_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function britishinterplanetarysociety_civicrm_managed(&$entities) {
  _britishinterplanetarysociety_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function britishinterplanetarysociety_civicrm_caseTypes(&$caseTypes) {
  _britishinterplanetarysociety_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function britishinterplanetarysociety_civicrm_angularModules(&$angularModules) {
  _britishinterplanetarysociety_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function britishinterplanetarysociety_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _britishinterplanetarysociety_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function britishinterplanetarysociety_civicrm_entityTypes(&$entityTypes) {
  _britishinterplanetarysociety_civix_civicrm_entityTypes($entityTypes);
}

function britishinterplanetarysociety_civicrm_buildForm($formName, &$form) {
  switch ($formName) {
    case 'CRM_Contribute_Form_Contribution_Main':
      if (file_exists(E::path('js/contributionpage.js'))) {
        britishinterplanetarysociety_addScriptViaAssetBuilder('contributionpage.js', E::path('js/contributionpage.js'));
      }

      if (file_exists(E::path("js/contribution{$form->_id}.js"))) {
        britishinterplanetarysociety_addScriptViaAssetBuilder("contribution{$form->_id}.js", E::path("js/contribution{$form->_id}.js"));
      }
      break;
  }
}

function britishinterplanetarysociety_addScriptViaAssetBuilder($name, $path, $mimeType = 'application/javascript', $weight = 0, $region = 'page-footer') {
  \Civi::resources()->addScriptUrl(
    \Civi::service('asset_builder')->getUrl(
      $name,
      [
        'path' => $path,
        'mimetype' => $mimeType,
      ]
    ),
    // Load after any other scripts
    $weight,
    $region
  );
}
