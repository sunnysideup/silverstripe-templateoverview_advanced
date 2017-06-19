jQuery(document).ready(
	function () {
		Templateoverviewextension.init();
	}
);

var Templateoverviewextension = {

	prettyphotoJSlocation: "prettyphoto/javascript/jquery.prettyPhoto.js",

	prettyphotoCSSlocation: "prettyphoto/css/prettyPhoto.css",

	loadingAreaSelector: "#TemplateoverviewPageDevelopmentFooterLoadHere",

	classToClickToSeeMoreDetails: ".seeFullTemplateDetails",

	init: function() {
		jQuery(Templateoverviewextension.classToClickToSeeMoreDetails).click(
			function() {
				Templateoverviewextension.javascriptImporter(Templateoverviewextension.prettyphotoJSlocation);
				Templateoverviewextension.cssImporter(Templateoverviewextension.prettyphotoCSSlocation);
				var url = jQuery(this).attr("href");
				jQuery(Templateoverviewextension.loadingAreaSelector).html("<li>loading ....</li>");
				jQuery(Templateoverviewextension.loadingAreaSelector).load(
					url,
					function() {
						PrettyPhotoLoader.load(Templateoverviewextension.loadingAreaSelector);
					}
				);
				return false;
			}
		);
	},

	javascriptImporter: function (src){
		var fileref = document.createElement('script');
		fileref.setAttribute('src',src);
		fileref.setAttribute('type','text/javascript');
		document.getElementsByTagName('head')[0].appendChild(fileref);
	},

	cssImporter: function (src){
		var fileref=document.createElement("link");
		fileref.setAttribute("rel", "stylesheet");
		fileref.setAttribute("type", "text/css");
		fileref.setAttribute("href", src);
		document.getElementsByTagName("head")[0].appendChild(fileref);
	}

}
