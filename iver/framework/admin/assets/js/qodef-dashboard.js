(function ($) {
    "use strict";

    var dashboard = {};

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);

    /**
     * All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefDashboardInitDatePicker();
        qodefDashboardUploadImages();
        qodefDashboardInitGeocomplete();
        qodefDashboardRemoveMedia();
        qodefDashboardSelect2();
        qodefInitColorpicker();
        //qodefDashboardRepeater();
        qodefInitIconSelectChange();
 	    qodefDashboardRepeater.rowRepeater.init();
 	    qodefDashboardRepeater.rowInnerRepeater.init();
	    qodefDashboardInitSortable();
    }

    /**
     * All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
    }

    /**
     * All functions to be called on $(window).resize() should be in this function
     */
    function qodefOnWindowResize() {
    }

    /**
     * All functions to be called on $(window).scroll() should be in this function
     */
    function qodefOnWindowScroll() {
    }

	function qodefDashboardInitDatePicker() {
		$( ".qodef-dashboard-input.datepicker" ).datepicker( { dateFormat: "MM dd, yy" });
	}

	function qodefInitColorpicker() {
		$('.qodef-dashboard-color-field').wpColorPicker();
	}

    function qodefInitIconSelectChange() {
        $(document).on('change', 'select.icon-dependence', function (e) {
            var valueSelected = this.value.replace(/ /g, ''),
            	parentSection = $(this).parents('.qodef-dashboard-icon-holder');

            parentSection.find('.qodef-icon-collection-holder').fadeOut();
            parentSection.find('.qodef-icon-collection-holder[data-icon-collection="' + valueSelected + '"]').fadeIn();
        });
    }

	var qodefDashboardRepeater = function() {
		var repeaterHolder = $('.qodef-dashboard-repeater-wrapper'),
			numberOfRows;

		var rowRepeater = function() {

			var addNewRow = function(holder) {
				var $addButton = holder.find('.qodef-dashboard-repeater-add a');
				var templateName = holder.find('.qodef-dashboard-repeater-wrapper-inner').data('template');
				var $repeaterContent = holder.find('.qodef-dashboard-repeater-wrapper-inner');
				var repeaterTemplate = wp.template('qodef-dashboard-repeater-template-' + templateName);

				$addButton.on('click', function(e) {
					e.preventDefault();
					e.stopPropagation();

					var $row = $(repeaterTemplate({
						rowIndex: getLastRowIndex(holder) || 0
					}));

					$repeaterContent.append($row);
					var new_holder = $row.find('.qodef-dashboard-repeater-inner-wrapper');
					qodefDashboardRepeater.rowInnerRepeater.addNewRowInner(new_holder);
					qodefDashboardRepeater.rowInnerRepeater.removeRowInner(new_holder);
					qodefDashboardInitSortable();
					qodefDashboardInitDatePicker();
					qodefDashboardUploadImages();
					qodefDashboardRemoveMedia();
					qodefDashboardSelect2();
					qodefInitColorpicker();
					qodefInitIconSelectChange();
					numberOfRows += 1;       

				});
			};

			var removeRow = function(holder) {

				var repeaterContent = holder.find('.qodef-dashboard-repeater-wrapper-inner');
				repeaterContent.on('click', '.qodef-clone-remove', function(e) {
					e.preventDefault();
					e.stopPropagation();

					if(!window.confirm('Are you sure you want to remove this section?')) {
						return;
					}

					var $rowParent = $(this).parents('.qodef-dashboard-repeater-fields-holder');
					$rowParent.remove();

					decrementNumberOfRows();

				});
			};

			var getLastRowIndex = function(holder) {
				var $repeaterContent = holder.find('.qodef-dashboard-repeater-wrapper-inner');
				var fieldsCount = $repeaterContent.find('.qodef-dashboard-repeater-fields-holder').length;

				return fieldsCount;
			};

			var decrementNumberOfRows = function() {
				if(numberOfRows <= 0) {
					return;
				}

				numberOfRows -= 1;
			}
			var setNumberOfRows = function(holder) {
				numberOfRows =  holder.find('.qodef-dashboard-repeater-fields-holder').length;

			}
			var getNumberOfRows = function() {
				return numberOfRows;
			}

			return {
				init: function() {
					var repeaterHolder = $('.qodef-dashboard-repeater-wrapper');

					repeaterHolder.each(function(){
						setNumberOfRows($(this));
						addNewRow($(this));
						removeRow($(this));
					});
				},
				numberOfRows: getNumberOfRows
			}
		}();

		var rowInnerRepeater = function() {
			var repeaterInnerHolder = $('.qodef-dashboard-repeater-inner-wrapper');


			var addNewRowInner = function(holder) {

				//var repeaterInnerContent = holder.find('.qodef-dashboard-repeater-inner-wrapper-inner');
				var templateInnerName = holder.find('.qodef-dashboard-repeater-inner-wrapper-inner').data('template');
				var rowInnerTemplate = wp.template('qodef-dashboard-repeater-inner-template-' + templateInnerName);
				holder.on('click', '.qodef-inner-clone', function(e) {

					e.preventDefault();
					e.stopPropagation();

					var $clickedButton = $(this);
					var $parentRow = $clickedButton.parents('.qodef-dashboard-repeater-fields-holder').first();

					var parentIndex = $parentRow.data('index');

					var $rowInnerContent = $clickedButton.parent().prev();

					var lastRowInnerIndex = $parentRow.find('.qodef-dashboard-repeater-inner-fields-holder').length;

					var $repeaterInnerRow = $(rowInnerTemplate({
						rowIndex: parentIndex,
						rowInnerIndex: lastRowInnerIndex
					}));

					$rowInnerContent.append($repeaterInnerRow);
					qodefTinyMCE($repeaterInnerRow, lastRowInnerIndex);
				});
			};

			var removeRowInner = function(holder) {
				var repeaterInnerContent = holder.find('.qodef-dashboard-repeater-inner-wrapper-inner');
				repeaterInnerContent.on('click', '.qodef-clone-inner-remove', function(e) {
					e.preventDefault();
					e.stopPropagation();

					if(!confirm('Are you sure you want to remove section?')) {
						return;
					}

					var $removeButton = $(this);
					var $parent = $removeButton.parents('.qodef-dashboard-repeater-inner-fields-holder');

					$parent.remove();
				});
			};

			return {
				init: function() {
					var repeaterInnerHolder = $('.qodef-dashboard-repeater-inner-wrapper');
					repeaterInnerHolder.each(function(){
						addNewRowInner($(this));
						removeRowInner($(this));
					});

				},
				addNewRowInner:addNewRowInner,
				removeRowInner:removeRowInner
			}
		}();

		return {
			rowRepeater: rowRepeater,
			rowInnerRepeater: rowInnerRepeater
		}
	}();

	function qodefDashboardInitSortable() {
		$('.qodef-dashboard-repeater-wrapper-inner.sortable').sortable();
		$('.qodef-dashboard-repeater-inner-wrapper-inner.sortable').sortable();
	}


    // function qodefDashboardRepeater(){
    //     var wrapper = $('.qodef-dashboard-repeater-wrapper');

    //     function initCloneRow(wrapper, button) {
    //         var fieldsHolder = wrapper.find('> .qodef-dashboard-repeater-fields-holder');
    //         var parentChildRepeater = !!fieldsHolder.hasClass('qodef-enable-pc');
    //         var rows;
    //         if(fieldsHolder.hasClass('qodef-table-layout')) {
    //              rows = fieldsHolder.find('tbody tr.qodef-dashboard-repeater-fields-row');
    //         } else {
    //             if(parentChildRepeater) {
    //                 var name = button.data("name");
    //                 rows = fieldsHolder.find('> .qodef-dashboard-repeater-fields-row[data-name=' + name + ']');
    //             } else {
    //                 rows = fieldsHolder.find('> .qodef-dashboard-repeater-fields-row');
    //             }
    //         }
    //         var append = true; // flag for showing or appending new row
    //         if (rows.length == 1 && rows.css('display') == 'none') {
    //             rows.show();
    //             append = false;
    //         }
    //         if (append) {
    //             var child = rows.eq(0);
    //             //FIND FIRST ELEMENT AND DESTROY INITIALIZED SCRIPTS
    //             child.find('.qodef-dashboard-repeater-field').each(function () {
    //                 var thisField = $(this);
    //                 thisField.find('select').each(function () {
    //                     var thisInput = $(this);
    //                     if(thisInput.hasClass('qodef-select2')) {
    //                         $('select.qodef-select2').select2("destroy");
    //                     }
    //                 });
    //             });

    //             var rowIndex = button.data('count'); // number of rows for changing id stored as data of add new button
    //             var firstChild = rows.eq(0).clone(); // clone first row
    //             var colorPicker = false; // flag for initializing color picker - calling wpColorPicker
    //             var mediaUploader = false; // flag for initializing media uploader - calling mediaUploader
    //             var yesNoSwitcher = false; // flag for initializing yes no switcher - calling initSwitch
    //             var select2 = false; // flag for initializing select2 - calling select2
    //             var innerRepeater = false; // flag for initializing select2 - calling select2

    //             firstChild.find('.qodef-dashboard-repeater-field').each(function () {
    //                     var thisField = $(this);
    //                     var id = thisField.attr('id');
    //                     if (typeof id !== 'undefined') {
    //                         thisField.attr('id', id.slice(0, -1) + rowIndex); // change id - first row will have 0 as the last char
    //                     }
    //                     thisField.find(':input, textarea').each(function () {
    //                         var thisInput = $(this);
    //                         if (thisInput.hasClass('qodef-dashboard-gallery-upload-hidden')) {// if input type is media uploader
    //                             mediaUploader = true;
    //                             var btn = thisInput.siblings('.qodef-dashboard-gallery-upload');
    //                             qodefInitMediaRemoveBtn(btn); // get and init new remove btn
    //                         }
    //                         else if(thisInput.hasClass('checkbox')) {
    //                             yesNoSwitcher = true;
    //                         }
    //                         thisInput.val('').removeAttr('checked').removeAttr('selected'); //empty fields values
    //                         if(thisInput.is(':radio')){
    //                             thisInput.val(fieldsHolder.find(':radio').length);
    //                         }
    //                     });
    //                     thisField.find('select').each(function () {
    //                         var thisInput = $(this);
    //                         if(thisInput.hasClass('qodef-select2')) {
    //                             select2 = true;
    //                         }
    //                     });
    //                 }
    //             );
    //             rows.each(function () {
    //                 if($(this).find('.qodef-dashboard-repeater-wrapper').length) {
    //                     innerRepeater = true;
    //                 }
    //             });
    //             button.data('count', rowIndex + 1); //increase number of rows
    //             firstChild.appendTo(fieldsHolder); // append html
    //             initCoreRepeater(firstChild.find('.qodef-dashboard-repeater-wrapper'));
    //             initRemoveRow(firstChild);
    //             if (colorPicker) { // reinit colorpickers
    //                 $('.qodef-page .my-color-field').wpColorPicker();
    //             }
    //             if (mediaUploader) {
    //                 // deregister click on all media buttons (multiple frames will be opened otherwise)
    //                 $('.qodef-media-uploader').off('click', '.qodef-media-upload-btn');
    //                 qodefDashboardUploadImages();
    //                 qodefDashboardRemoveMedia();
    //             }
    //             if (yesNoSwitcher) {
    //                 qodefInitSwitch(); //init yes no switchers
    //             }
    //             if (select2) {
    //                 qodefSelect2(); //init select2 script
    //             }
    //         }

    //         function qodefInitMediaRemoveBtn(btn) {
    //         	var imagesHolder = btn.parents('.qodef-dashboard-gallery-holder').find('.qodef-dashboard-gallery-images-holder'),
    //         		removeButton = btn.siblings('.qodef-dashboard-remove-image');

    //         	btn.removeClass("qodef-binded");
    //         	removeButton.removeClass("qodef-binded");

    //             //remove image src
    //             imagesHolder.empty();

    //             //reset meta fields
    //             btn.siblings('.qodef-dashboard-gallery-upload-hidden').each(function(e) {
    //                 $(this).val('');
    //             });
    //         }
    //     }
    // }

    function qodefDashboardInitGeocomplete() {
        var geo_inputs = $(".qodef-dashboard-address-field");

        if(geo_inputs.length && !qodef.body.hasClass('qodef-empty-google-api')) {
            geo_inputs.each(function () {
                var geo_input = $(this),
                    reset = geo_input.find("#reset"),
                    inputField = geo_input.find('input'),
                    mapField = geo_input.find('.map_canvas'),
                    countryLimit = geo_input.data('country'),
                    latFieldName = geo_input.data('lat-field'),
                    latField = $("input[name=" + latFieldName + "]"),
                    longFieldName = geo_input.data('long-field'),
                    longField =  $("input[name=" + longFieldName + "]"),
                    initialAddress = inputField.val(),
                    initialLat = latField.val(),
                    initialLong = longField.val();

                latField.attr('data-geo','lat');
                longField.attr('data-geo','lng');

                inputField.geocomplete({
                    map: mapField,
                    details: ".qodef-dashboard-address-elements",
                    detailsAttribute: "data-geo",
                    types: ["geocode", "establishment"],
                    country: countryLimit,
                    markerOptions: {
                        draggable: true
                    }
                });

                inputField.on("geocode:dragged", function (event, latLng) {
                    latField.val(latLng.lat());
                    longField.val(latLng.lng());
                    $("#reset").show();
                    var map = inputField.geocomplete("map");
                    map.panTo(latLng);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'latLng': latLng}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                var road = results[0].address_components[1].short_name;
                                var town = results[0].address_components[2].short_name;
                                var county = results[0].address_components[3].short_name;
                                var country = results[0].address_components[4].short_name;
                                inputField.val(road + ' ' + town + ' ' + county + ' ' + country);
                            }
                        }
                    });
                });

                inputField.on('focus',function(){
                    var map = inputField.geocomplete("map");
                    google.maps.event.trigger(map, 'resize')
                });
                reset.on("click",function () {
                    inputField.geocomplete("resetMarker");
                    inputField.val(initialAddress);
                    latField.val(initialLat);
                    longField.val(initialLong);
                    $("#reset").hide();
                    return false;
                });

                $(window).on("load",function () {
                    inputField.trigger("geocode");
                })
            });
        }
    }

    function qodefDashboardUploadImages(){
    	var galleries = $('.qodef-dashboard-gallery-uploader');

    	if (galleries.length){
    		galleries.each(function(){
    			var thisGallery = $(this),
    				inputButton = thisGallery.find('.qodef-dashboard-gallery-upload-hidden'),
    				uploadButton = thisGallery.find('.qodef-dashboard-gallery-upload'),
    				thisGalleryImageHolder = thisGallery.parents('.qodef-dashboard-gallery-holder').find('.qodef-dashboard-gallery-images-holder');

    			if (!uploadButton.hasClass("qodef-binded")) {

					inputButton.on("change", function(e){
						var filesNumber = e.target.files.length;

						thisGalleryImageHolder.empty();

						for (var i = 0, file; file = e.target.files[i] ; i++) {

							var reader = new FileReader();

							// Closure to capture the file information.
							reader.onload = (function(theFile) {
								return function(e) {
									if ($.inArray(theFile.type, ["image/gif", "image/jpeg", "image/png"]) != "-1") {
										thisGalleryImageHolder.append('<li class="qodef-dashboard-gallery-image"><img src="' + e.target.result + '" title="' + escape(theFile.name) + '"/></li>');
									} else {
										thisGalleryImageHolder.append('<li class="qodef-dashboard-gallery-image"><span class="qodef-dashboard-input-text">' + escape(theFile.name) + '</span></li>');
									}
								};
							})(file);

							// Read in the image file as a data URL.
							reader.readAsDataURL(file);
						};
					});

					uploadButton.on("click", function(e){
						e.preventDefault();

						inputButton.trigger("click");
					});
					uploadButton.addClass("qodef-binded");
				}

    		});
    	}
    }

    function qodefDashboardRemoveMedia(){
    	var removeMediaBttns = $('.qodef-dashboard-remove-image');

    	if (removeMediaBttns.length){
    		removeMediaBttns.each(function(){
    			var thisRemoveMedia = $(this),
    				removeImagesHolder = thisRemoveMedia.parents('.qodef-dashboard-gallery-holder').find('.qodef-dashboard-gallery-images-holder'),
    				inputHiddenValue = thisRemoveMedia.siblings('.qodef-dashboard-media-hidden');


    			if (!thisRemoveMedia.hasClass("qodef-binded")) {
					thisRemoveMedia.on("click", function(e){
						e.preventDefault();

						inputHiddenValue.val('');

						removeImagesHolder.empty();

					});

					thisRemoveMedia.addClass("qodef-binded");
				}
    		});
    	}
    }


	function qodefDashboardSelect2() {
		if ($('select.qodef-select2').length) {
			$('select.qodef-select2').select2({
                allowClear: true
            });
		}
	}

})(jQuery);