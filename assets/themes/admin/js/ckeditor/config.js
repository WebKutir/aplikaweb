/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	config.toolbar = 'MyToolbar';
	
    config.toolbar_MyToolbar =
    [
		['Bold','Italic','Underline','Strike','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['BidiLtr', 'BidiRtl'],
		['Link','Unlink','Anchor'],
		['Image','Flash','HorizontalRule','Smiley','SpecialChar','PageBreak','Table'],
		['Source'],['Maximize','About'],['Find','Replace'],['Copy','Paste'],['Preview','Templates'],
		'/',
		['Format','Font','FontSize'],
		['TextColor','BGColor']
	];
};
