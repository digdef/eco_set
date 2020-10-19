/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.allowedContent = true; /* all tags */
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

    config.stylesSet = [
        { name: 'Blue', element: 'p', styles: {
        	'background-color' : '#bde5f8',
			'padding' : '20px 10px 20px 10px',
			'color' : '#00529b'
			},
			attributes: {
				class: 'blue'
			}},
        { name: 'Green', element: 'p', styles: {
        	'background-color' : '#dff2bf',
			'padding' : '20px 10px 20px 10px',
			'color' : '#4f8a10'
			},
            attributes: {
                class: 'green'
            } },
        { name: 'Yellow', element: 'p', styles: {
        	'background-color' : '#feefb3',
			'padding' : '20px 10px 20px 10px',
			'color' : '#9f6000'
			},
            attributes: {
                class: 'yellow'
            } },
        { name: 'Red', element: 'p', styles: {
        	'background-color' : '#ffccba',
			'padding' : '20px 10px 20px 10px',
			'color' : '#d63301'
			},
            attributes: {
                class: 'red'
            }  }
    ];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

    config.language = 'ru';
    config.height = '400px';
    config.extraPlugins = 'uploadimage';
    config.imageUploadUrl = '/uploadImage?type=Images';
    config.filebrowserUploadUrl = '/uploadImage?type=Images';
};
