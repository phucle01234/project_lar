/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

// config.filebrowserBrowseUrl = '/public/ckfinder/ckfinder.html';



// config.filebrowserImageBrowseUrl = '/public/ckfinder/ckfinder.html?type=Images';



// config.filebrowserFlashBrowseUrl = '/public/ckfinder/ckfinder.html?type=Flash';



// config.filebrowserUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';



// config.filebrowserImageUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';



// config.filebrowserFlashUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

CKEDITOR.editorConfig = function (config) {
	// config.entities_latin = false;
	// config.allowedContent = true;
	// config.enterMode = CKEDITOR.ENTER_P;
	// config.shiftEnterMode = CKEDITOR.ENTER_BR;
	// config.protectedSource.push(/<i[^>]*><\/i>/g);

	// config.pasteFromWordPromptCleanup = true;
	// config.pasteFromWordRemoveFontStyles = true;
	// config.forcePasteAsPlainText = true;
	// config.ignoreEmptyParagraph = true;
	// config.removeFormatAttributes = true;

	config.filebrowserBrowseUrl = '/project_lar/public/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '/project_lar/public/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '/project_lar/public/ckfinder/ckfinder.html?type=Flash';
	config.filebrowserUploadUrl = '/project_lar/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/project_lar/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/project_lar/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};