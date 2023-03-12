"use strict";window.CountryRouter=Backbone.Router.extend({routes:{"":"displayAsia","asia":"displayAsia","country/:country":"displayCountry",},_displayByCode:function(code){var listCities=$('.guide-city-list'),listCountries=$('.list-countries');listCountries.find('li').removeClass('active');if(code){listCities.find('li').hide();listCities.find('li[data-country='+code+']').show();listCountries.find('li[data-country='+code+']').addClass('active');}else{listCities.find('li').show();listCountries.find('li[data-country=asia]').addClass('active');}
$('.search-box .form-control').keyup(function(){var keySearch=$(this).val().replace(/\s+/g,'').toLowerCase().trim();listCities.find('li').hide();var listCountrySearch=$('.list-countries li a');$(listCountrySearch).each(function(){var textCountrySearch=$(this).text().replace(/\s+/g,'').toLowerCase(),countryCode=$(this).parent().data('country');listCountries.find('li').removeClass('active');if(textCountrySearch.indexOf(keySearch)!=-1){listCities.find("li[data-country='"+countryCode+"']").show();return true;}});var listCitySearch=$('.guide-city-list li .title');$(listCitySearch).each(function(){var textCitySearch=$(this).text().replace(/\s+/g,'').toLowerCase(),cityCode=$(this).parents('li').data('city');if(textCitySearch.indexOf(keySearch)!=-1){$(this).parents("li[data-city='"+cityCode+"']").show();return true;}});if(keySearch==''){listCities.find('li').show();listCountries.find('li[data-country=asia]').addClass('active');}});},displayAsia:function(){this._displayByCode();},displayCountry:function(code){this._displayByCode(code);}});var router=new window.CountryRouter;$(document).ready(function(){Backbone.history.start();});