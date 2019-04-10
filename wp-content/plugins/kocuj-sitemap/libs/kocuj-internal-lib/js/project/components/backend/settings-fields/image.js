/**
 * @file Image upload
 *
 * @author Dominik Kocuj
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2 or later
 * @copyright Copyright (c) 2016-2018 kocuj.pl
 */

(function() {})(); // empty function for correct minify with comments
//'use strict'; // for jshint uncomment this and comment line above

/* jshint strict: true */
/* jshint -W034 */

/* global document */
/* global jQuery */

/* global kocujILV12aHelper */
/* global kocujILV12aDataHelper */

/* global kocujILV12aBackendSettingsFieldsImageVals */

/**
 * Image upload prototype constructor
 *
 * @constructs
 * @namespace kocujILV12aCBackendSettingsFieldsImage
 * @public
 * @return {void}
 */
function kocujILV12aCBackendSettingsFieldsImage() {
	'use strict';
	/* jshint validthis: true */
	// get this object
	var self = this;
	// initialize objects
	self._objHelper = kocujILV12aHelper;
	// get current script filename
	self._thisFilename = document.scripts[document.scripts.length-1].src;
	// get settings
	var vals = kocujILV12aBackendSettingsFieldsImageVals;
	if (vals.throwErrors === '1') {
		self._valsThrowErrors = true;
	} else {
		self._valsThrowErrors = false;
	}
	self._valsTextWindowTitle = vals.textWindowTitle;
	self._valsTextWindowButtonLabel = vals.textWindowButtonLabel;
}

/**
 * Image upload prototype
 *
 * @namespace kocujILV12aCBackendSettingsFieldsImage
 * @public
 */
kocujILV12aCBackendSettingsFieldsImage.prototype = {
	/**
	 * Object kocujILV12aHelper
	 *
	 * @private
	 * @type {Object}
	 */
	_objHelper : null,

	/**
	 * Current script filename
	 *
	 * @private
	 * @type {string}
	 */
	_thisFilename : '',

	/**
	 * Projects list
	 *
	 * @private
	 * @type {Array}
	 */
	_prj : [],

	/**
	 * Script settings - throw errors (true) or not (false)
	 *
	 * @private
	 * @type {string}
	 */
	_valsThrowErrors : false,

	/**
	 * Script settings - text for window title
	 *
	 * @private
	 * @type {string}
	 */
	_valsTextWindowTitle : '',

	/**
	 * Script settings - text for window button label
	 *
	 * @private
	 * @type {string}
	 */
	_valsTextWindowButtonLabel : '',

	/**
	 * Add project
	 *
	 * @public
	 * @param {string} projectId Project identifier
	 * @param {string} [projectName] Project name
	 * @return {void}
	 * @throws {kocujILV12aCException} kocujILV12aExceptionCode.PROJECT_ALREADY_EXISTS if project identifier entered in projectId already exists
	 */
	addProject : function(projectId, projectName) {
		'use strict';
		// parse arguments
		var args = this._checkAddProject(projectId, projectName);
		// add project
		if (this._prj['prj_' + args.projectId] === undefined) {
			this.addProjectIfNotExists(args.projectId, args.projectName);
		} else {
			this._throwError('PROJECT_ALREADY_EXISTS', args.projectId);
			return;
		}
	},

	/**
	 * Add project if not exists
	 *
	 * @public
	 * @param {string} projectId Project identifier
	 * @param {string} [projectName] Project name
	 * @return {void}
	 */
	addProjectIfNotExists : function(projectId, projectName) {
		'use strict';
		// parse arguments
		var args = this._checkAddProject(projectId, projectName);
		// add project
		if (this._prj['prj_' + args.projectId] === undefined) {
			this._prj['prj_' + args.projectId] = {
				projectName   : args.projectName,
				fileFrame     : null,
				wpMediaPostId : 0,
				setToPostId   : 0,
			};
		}
	},

	/**
	 * Get HTML selector for image container
	 *
	 * @public
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @return {string} HTML selector for image container
	 */
	getHTMLSelectorImageContainer : function(projectId, fieldHtmlId) {
		'use strict';
		// parse arguments
		projectId = this._parseProjectId(projectId);
		fieldHtmlId = this._objHelper.initString(fieldHtmlId);
		// exit
		return '#' + this._getHTMLNameImageContainer(projectId, fieldHtmlId);
	},

	/**
	 * Get HTML selector for uploading image button
	 *
	 * @public
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @return {string} HTML selector for uploading image button
	 */
	getHTMLSelectorUploadImageButton : function(projectId, fieldHtmlId) {
		'use strict';
		// parse arguments
		projectId = this._parseProjectId(projectId);
		fieldHtmlId = this._objHelper.initString(fieldHtmlId);
		// exit
		return '#' + this._getHTMLNameUploadImageButton(projectId, fieldHtmlId);
	},

	/**
	 * Get HTML selector for image identifier
	 *
	 * @public
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @return {string} HTML selector for image identifier
	 */
	getHTMLSelectorImageId : function(projectId, fieldHtmlId) {
		'use strict';
		// parse arguments
		projectId = this._parseProjectId(projectId);
		fieldHtmlId = this._objHelper.initString(fieldHtmlId);
		// exit
		return '#' + this._getHTMLNameImageId(projectId, fieldHtmlId);
	},

	/**
	 * Process image uploading
	 *
	 * @public
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @return {void}
	 */
	process : function(projectId, fieldHtmlId) {
		'use strict';
		// get this object
		var self = this;
		(function($) {
			// parse parameters
			projectId = self._parseProjectId(projectId);
			fieldHtmlId = self._objHelper.initString(fieldHtmlId);
			// initialize values
			self._prj['prj_' + projectId].wpMediaPostId = wp.media.model.settings.post.id;
			// add upload event
			$(self.getHTMLSelectorUploadImageButton(projectId, fieldHtmlId)).bind('click', {
				self        : self,
				projectId   : projectId,
				fieldHtmlId : fieldHtmlId
			}, function(event) {
				// disable default event
				event.preventDefault();
				// optionally reopen media window
				if (event.data.self._prj['prj_' + event.data.projectId].fileFrame !== null) {
					event.data.self._prj['prj_' + event.data.projectId].fileFrame.uploader.uploader.param('post_id', $(self.getHTMLSelectorImageId(event.data.projectId, event.data.fieldHtmlId)).val());
					event.data.self._prj['prj_' + event.data.projectId].fileFrame.open();
					return;
				}
				// prepare media window
				event.data.self._prj['prj_' + event.data.projectId].fileFrame = wp.media.frames.file_frame = wp.media({
					title    : event.data.self._valsTextWindowTitle,
					button   : {
						text : event.data.self._valsTextWindowButtonLabel
					},
					library  : {
						type : 'image'
					},
					multiple : false
				});
				// add event
				event.data.self._prj['prj_' + event.data.projectId].fileFrame.on('select', function() {
					// get selected image
					var attachment = event.data.self._prj['prj_' + event.data.projectId].fileFrame.state().get('selection').first().toJSON();
					// set image
					$(event.data.self.getHTMLSelectorImageContainer(event.data.projectId, event.data.fieldHtmlId)).attr('src', attachment.url).css('width', 'auto');
					$(event.data.self.getHTMLSelectorImageId(event.data.projectId, event.data.fieldHtmlId)).val(attachment.id);
					wp.media.model.settings.post.id = event.data.self._prj['prj_' + event.data.projectId].wpMediaPostId;
				});
				// open media window
				event.data.self._prj['prj_' + event.data.projectId].fileFrame.open();
			});
		}(jQuery));
	},

	/**
	 * Get HTML image container name
	 *
	 * @private
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @param {number} number Number of element in array
	 * @return {string} HTML image container name
	 */
	_getHTMLNameImageContainer : function(projectId, fieldHtmlId) {
		'use strict';
		// exit
		return fieldHtmlId + '__image_preview';
	},

	/**
	 * Get HTML uploading image button name
	 *
	 * @private
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @param {number} number Number of element in array
	 * @return {string} HTML uploading image button name
	 */
	_getHTMLNameUploadImageButton : function(projectId, fieldHtmlId) {
		'use strict';
		// exit
		return fieldHtmlId + '__image_upload';
	},

	/**
	 * Get HTML image identifier name
	 *
	 * @private
	 * @param {string} projectId Project identifier
	 * @param {string} fieldHtmlId HTML field identifier
	 * @param {number} number Number of element in array
	 * @return {string} HTML image identifier name
	 */
	_getHTMLNameImageId : function(projectId, fieldHtmlId) {
		'use strict';
		// exit
		return fieldHtmlId + '__image_hidden';
	},

	/**
	 * Parse project identifier
	 *
	 * @private
	 * @param {string} projectId Project identifier
	 * @return {string} Parsed project identifier
	 * @throws {kocujILV12aCException} kocujILV12aExceptionCode.EMPTY_PROJECT_ID if project identifier entered in projectId is empty
	 * @throws {kocujILV12aCException} kocujILV12aExceptionCode.PROJECT_DOES_NOT_EXIST if project identifier entered in projectId does not exist
	 */
	_parseProjectId : function(projectId) {
		'use strict';
		// parse project identifier
		projectId = this._objHelper.initString(projectId);
		if (projectId === '') {
			this._throwError('EMPTY_PROJECT_ID');
			return;
		}
		// check if project exists
		if (this._prj['prj_' + projectId] === undefined) {
			this._throwError('PROJECT_DOES_NOT_EXIST', projectId);
			return;
		}
		// exit
		return projectId;
	},

	/**
	 * Check arguments for adding project
	 *
	 * @private
	 * @param {string} projectId Project identifier
	 * @param {string} [projectName] Project name
	 * @return {Object} Parsed arguments for adding project
	 * @throws {kocujILV12aCException} kocujILV12aExceptionCode.EMPTY_PROJECT_ID if project identifier entered in projectId is empty
	 */
	_checkAddProject : function(projectId, projectName) {
		'use strict';
		// parse arguments
		projectId = this._objHelper.initString(projectId);
		if (projectId === '') {
			this._throwError('EMPTY_PROJECT_ID');
			return;
		}
		projectName = this._objHelper.initString(projectName);
		// exit
		return {
			projectId   : projectId,
			projectName : projectName
		};
	},

	/**
	 * Throw an error if debugging is enabled
	 *
	 * @private
	 * @param {string} codeString Error code in string format
	 * @param {string} [param] Parameter for error information
	 * @return {void}
	 */
	_throwError : function(codeString, param) {
		'use strict';
		// parse arguments
		codeString = this._objHelper.initString(codeString);
		if (codeString === '') {
			return;
		}
		param = this._objHelper.initString(param);
		// throw an error
		if (this._valsThrowErrors) {
			/* jshint evil: true */
			eval('throw new kocujILV12aCException(kocujILV12aExceptionCode.' + codeString + ', this._thisFilename, param);');
		}
	}
};

// initialize
var kocujILV12aBackendSettingsFieldsImage = new kocujILV12aCBackendSettingsFieldsImage();
