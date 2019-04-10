/**
 * @file Exceptions handler
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 */

(function() {})(); // empty function for correct minify with comments
//'use strict'; // for jshint uncomment this and comment line above

/* jshint strict: true */
/* jshint -W034 */

/* global kocujILV12aCException */
/* global kocujPLV12aExceptionCode */

/**
 * Exception prototype constructor
 *
 * @constructs
 * @namespace kocujPLV12aCException
 * @public
 * @param {number} [code] Error code
 * @param {string} [filename] Filename with error
 * @param {string} [param] Parameter for error information
 * @return {void}
 */
function kocujPLV12aCException(code, filename, param) {
	'use strict';
	/* jshint validthis: true */
	// get this object
	var self = this;
	// execute parent
	kocujILV12aCException.call(self, code, filename, param);
}

// exception prototype
kocujPLV12aCException.prototype = new kocujILV12aCException();
kocujPLV12aCException.prototype.constructor = kocujPLV12aCException;

/**
 * Get exception name
 *
 * @private
 * @return {string} Exception name
 */
kocujPLV12aCException.prototype._getExceptionName = function() {
	'use strict';
	// exit
	return 'kocujpllibv12a';
};

/**
 * Set errors codes and texts
 *
 * @private
 * @return {void}
 */
kocujPLV12aCException.prototype._setErrors = function() {
	'use strict';
	// set errors
	var codes = kocujPLV12aExceptionCode;
	this._errors[codes.OK] = 'OK';
	this._errors[codes.EMPTY_PROJECT_ID] = 'Empty project identifier';
	this._errors[codes.PROJECT_DOES_NOT_EXIST] = 'Project does not exist';
	this._errors[codes.PROJECT_ALREADY_EXISTS] = 'Project already exists';
	this._errors[codes.ADD_THANKS_EMPTY_WINDOW_FUNCTION] = 'Empty window function for add thanks script';
	this._errors[codes.ADD_THANKS_EMPTY_API_URL] = 'Empty API URL for add thanks script';
	this._errors[codes.ADD_THANKS_EMPTY_API_LOGIN] = 'Empty API login for add thanks script';
};
