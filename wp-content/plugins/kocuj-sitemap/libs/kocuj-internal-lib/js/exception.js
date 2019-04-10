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

/* global kocujILV12aHelper */

/* global kocujILV12aExceptionCode */

/**
 * Exception prototype constructor
 *
 * @constructs
 * @namespace kocujILV12aCException
 * @public
 * @param {number} [code] Error code
 * @param {string} [filename] Filename with error
 * @param {string} [param] Parameter for error information
 * @return {void}
 */
function kocujILV12aCException(code, filename, param) {
	'use strict';
	/* jshint validthis: true */
	// get this object
	var self = this;
	// parse arguments
	code = kocujILV12aHelper.initNumeric(code);
	filename = kocujILV12aHelper.initString(filename);
	if (filename === '') {
		filename = 'unknown';
	}
	param = kocujILV12aHelper.initString(param);
	// set errors
	self._setErrors();
	// prepare message
	var msg = '[' + self._getExceptionName() + '] [file: ' + filename + '] ';
	if (self._errors[code] !== undefined) {
		msg += self._errors[code];
	} else {
		msg += 'Unknown error';
	}
	if (param !== '') {
		msg += ' (' + param + ')';
	}
	// set message
	self.message = msg;
}

// exception prototype
kocujILV12aCException.prototype = new Error();
kocujILV12aCException.prototype.constructor = kocujILV12aCException;

// errors
kocujILV12aCException.prototype._errors = [];

/**
 * Get errors list
 *
 * @public
 * @return {Array} List of errors where keys are errors codes and values are errors texts
 */
kocujILV12aCException.prototype.getErrors = function() {
	'use strict';
	// exit
	return this._errors;
};

/**
 * Get exception name
 *
 * @private
 * @return {string} Exception name
 */
kocujILV12aCException.prototype._getExceptionName = function() {
	'use strict';
	// exit
	return 'kocujilv12a';
};

/**
 * Set errors codes and texts
 *
 * @private
 * @return {void}
 */
kocujILV12aCException.prototype._setErrors = function() {
	'use strict';
	// set errors
	var codes = kocujILV12aExceptionCode;
	this._errors[codes.OK] = 'OK';
	this._errors[codes.EMPTY_PROJECT_ID] = 'Empty project identifier';
	this._errors[codes.PROJECT_DOES_NOT_EXIST] = 'Project does not exist';
	this._errors[codes.PROJECT_ALREADY_EXISTS] = 'Project already exists';
	this._errors[codes.EMPTY_ELEMENT_PATH] = 'Empty element path';
	this._errors[codes.ELEMENT_DOES_NOT_EXIST] = 'Element does not exist';
	this._errors[codes.JS_AJAX_EMPTY_URL] = 'Empty URL for AJAX script';
	this._errors[codes.JS_AJAX_EMPTY_METHOD] = 'Empty method for AJAX script';
	this._errors[codes.JS_AJAX_EMPTY_DATA_TYPE] = 'Empty data type for AJAX script';
	this._errors[codes.WINDOW_WRONG_TYPE] = 'Wrong window type';
	this._errors[codes.WINDOW_WRONG_ATTRIBUTES] = 'Wrong window attributes';
};
