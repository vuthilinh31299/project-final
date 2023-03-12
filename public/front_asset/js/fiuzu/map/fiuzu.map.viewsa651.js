"use strict";window.fiuzu.map.views=window.fiuzu.map.views||{};(function(views){var _PlaceClass=fiuzu.common.models.Place;views.InfoboxView=Backbone.View.extend({template:null,day:0,index:-1,boxId:"",rendered:false,events:{"click .btn-add-marker":"viewMenuAdd"},initialize:function(model){this.model=model;if(window.fiuzu.templates){this.template=window.fiuzu.templates.mapBoxInfo;}else{this.templateHTML=$('#tpl-marker-box').html();this.template=_.template(this.templateHTML,null,{variable:'data'});}
if(model){this.setModel(model);}},viewMenuAdd:function(e){var btnAdd$=$('.btn-add-marker',this.$el),plan=fiuzu.app.getPlan(),noDays=plan.getItinerary().length,menu$=$('.dropdown-menu',btnAdd$.parent()),self=this,index=-1,item=self.model._item;menu$.empty();if(item){menu$.append($('<li class="dropdown-header text-center">Move to</li><li role="separator" class="divider"></li>'));}
for(var i=0;i<noDays;i++){index=plan.getItinerary().at(i).indexOfPlace(this.model.get('id'),this.model.get('geo_id'),this.model.get('is_event'));if(item){menu$.append($('<li role="presentation"'+(index>=0?' class="disabled" ':'')+'><a role="menuitem" data-add-day="'+(i+1)+'" href="#">Day '+(i+1)+(index>=0?'<i class="icomoon-icon-checkmark pull-right"></i>':'')+'</a></li>'));}else{menu$.append($('<li role="presentation"'+'><a role="menuitem" data-add-day="'+(i+1)+'" href="#">Day '+(i+1)+(index>=0?'<i class="icomoon-icon-checkmark pull-right"></i>':'')+'</a></li>'));}}
$('li:not(.disabled) a',menu$).click(function(){if(item){var newIdx=$(this).attr("data-move-day"),oldIdx=item.get('index'),day=item.getItineraryDay(),oldDayMove=item.get('day'),dayMove=$(this).attr("data-add-day");var itineraryDay=plan.getItinerary().at(dayMove-1);if(dayMove==oldDayMove){day.moveItem(oldDayMove,oldIdx,dayMove,newIdx);var fromDayView=day.view;fromDayView.initItemViews();fromDayView.render();}else{var checkAction={oldDay:oldDayMove,newDay:dayMove,oldIndex:oldIdx,newIndex:newIdx,action:'Move'}
itineraryDay.selectAddPlace(self.model,dayMove?dayMove:1,checkAction,day);plan.set('current_day',dayMove);fiuzu.app.navigate('#plan/day/'+dayMove);}}else{var day=$(this).attr("data-add-day");var callback=function(){if(self.category==='hotel'){itineraryDay.selectHotel(self.model);}else{itineraryDay.selectAddPlace(self.model,day?parseInt(day):1);}}
if(day){var itineraryDay=plan.getItinerary().at(day-1);if(self.model.isNew()){self.model.save({},{success:function(model,res){self.model.set('id',model.get('id'));callback();self.render();}});}else{callback();}
var markerArr=fiuzu.app.currentCategory+' '+'itinerary_day_'+day;plan.set('current_day',day);fiuzu.app.map.markerManager.showCategory(markerArr);}}});this._menuAddDays=noDays;},setModel:function(model,category){var atts=model.toJSON();this.model=model;this.day=atts.day;this.index=atts.index;if(model._item){this.boxId="#box-info-"+model._item.toJSON().day+"-"+model._item.toJSON().index;}else{this.boxId="#box-info-"+(atts.category||"")+'-'+(atts.id||atts.geo_id);}
this.$el=$(this.boxId);},show:function(){if(!this.rendered){this.render();}},render:function(){var self=this;var data=self.model.toJSON();if(self.model._item){data.item=this.model._item.toJSON();}else{data.item=null;}
if(data.category===13&&!data.id){data.id=data.geo_id;}
this.$el.html(this.template(data));this.rendered=true;fiuzu.utils.refreshTooltip(this.$el);if(!this.model.isNew()){this.$('.btn-wishlist').FiuzuWishlistButton({change:function(state){self.model.set('is_wishlist',state);var msg=state?" added into ":" remove from ";var title=state?"Added !":"Removed !";fiuzu.app.alert("Done !",self.model.get('name')+' has been'+msg+'your wishlist.');if(fiuzu.isRunningApp()){var placeMan=fiuzu.app.module.explore.manager;if(state){placeMan.addPlace(self.model,'wishlist');placeMan.fetchPlaces('personal');}else{placeMan.removePlace(self.model,'wishlist');placeMan.fetchPlaces('personal');}}}});}},viewPlaceDetail:function(){var atts=this.model.toJSON();if(fiuzu.app&&fiuzu.app.isEditable){if(!this.model._item){fiuzu.app.navigate('#explore/place/'+atts.id);}else{this.model._item.view.showDetail({});}}else{top.location.href="/a/"+this.model.get("slug");}}});views.MarkerView=Backbone.View.extend({el:null,url:null,className:'markerMap',events:{"mouseenter .markerAtt-span":"focus","mouseleave .markerAtt-span":"blur","click .markerAtt-span":"showDetail",},initialize:function(model){this.model=model;this.marker=this.model.marker;this.item=this.model.getItineraryItem();this.templateDOM=$('#tpl-marker-map').html();this.listenTo(this.model,'change',this.render);this.listenTo(this.model,'add',this.render);this.listenTo(this.model,'remove',this.removeMarker);this.listenTo(this.model,'reset',this.render);},render:function(model){if(model){this.model.attributes=model.attributes;}
var place=this.model.toJSON();place.modelClass=_PlaceClass.category;place.itineraryItem=this.model.getItineraryItem()?this.model.getItineraryItem().toJSON():'';place.index=place.itineraryItem.index;place.classes=this.model.marker.classes;place.is_nearby=this.model.options.is_nearby;this.template=_.template(this.templateDOM,null,{variable:'place'});this.setupMarker();this.$el.html(this.template(place));this.renderMarker(this);return this;},setupMarker:function(){var self=this;self.options=self.model.options;self.overlay=self.options.overlay;self.map=self.options.map;self.mapView=self.options.mapView;self.mapView.currentDay=Number(self.model.options.mapView._plan?self.model.options.mapView._plan.currentDay:self.model.options.mapView.currentDay);if(!self.overlay){self.overlay=new google.maps.OverlayView();self.overlay.draw=function(){};self.overlay.setMap(self.map);}
self.projection=self.overlay.getProjection();self.markerPosition=self.marker.position;self.position=self.projection.fromLatLngToDivPixel(self.markerPosition);self.zIndex=self.item?self.marker.zIndex+1:self.marker.zIndex;},appendItem:function(){this.$mapMarker=this.model.pane;$(this.$mapMarker).append(this.render().el);$(this.$mapMarker).css('display','block');},removeMarker:function(){this.remove();},focus:function(){var self=this;self.zIndex=this.zIndex+2;$(".markerAtt").removeClass("focus");self.$('.markerAtt').addClass("focus");self.$el.addClass("focus");self.$('.markerAtt-span').css({'width':'300','textAlign':'left'});self.$el.css('z-index',self.zIndex);self.infoBox=new fiuzu.map.views.InfoboxView(self.model);self.infoBox.show();if(this.item&&!this.$('.markerAtt').hasClass('marker-not-current')){var focusDay='.markerDay-'+self.model.getItineraryItem().toJSON().day;$(focusDay).addClass('marker-not-current');}},blur:function(){var self=this;var currentDay=Number(this.mapView._plan?this.mapView._plan.currentDay:this.mapView.currentDay);var day='.markerDay-'+currentDay;self.zIndex=this.zIndex-2;self.$('.markerAtt').removeClass("focus");self.$el.removeClass("focus");self.$('.markerAtt-span').css({'width':'100%','textAlign':'none'});self.$el.css('z-index',self.zIndex);if(self.item){$('.markerAtt').removeClass('marker-not-current');$(day).addClass('marker-not-current');}},showDetail:function(e){if(this.url){if(this.url[0]=='#'){var obj$=$(this.url);if(obj$){var position=obj$.position();$('body').animate({scrollTop:position.top+100},300);}}else{location.href=this.url;}
return 1;}
var currentTarget=$(e.target),place=this.model.toJSON(),self=this;if(currentTarget.hasClass('markerAtt-photo')||currentTarget.hasClass('boxinfo-image')||currentTarget.hasClass('boxinfo-title')){if(this.item){self.infoBox.viewPlaceDetail();}else{if(self.model&&self.model.get('id')){location.href="#explore/place/"+self.model.get('id');}else{if(self.model){self.model.save({},{success:function(model,res){location.href="#explore/place/"+self.model.get('id');}});}else{var target=self.get('markerId');if(target){location.href='#'+target;}}}}}else{return;}},updatePosition:function(){var self=this,place=self.model.toJSON();self.position=self.projection.fromLatLngToDivPixel(self.marker.position);self.$el.css({left:self.position.x-60,top:self.position.y-70});if(place.is_wishlist&&!self.$('.order-wishlist').length){var html='<span class="order order-wishlist"><i class="icomoon-icon-heart"></i></span>';self.$el.addClass('color-map-number-0').find('.markerAtt-photo').addClass('marker-wishlist');self.$('.marker-wishlist').after(html);self.zIndex=self.zIndex+1
self.$el.css({zIndex:self.zIndex});}},renderMarker:function(){var self=this;self.$el.css({left:self.position.x-60,top:self.position.y-70,display:self._display,position:'absolute',zIndex:self.zIndex});if(self.item&&self.item.toJSON().day===self.mapView.currentDay){self.$('.markerAtt').addClass('marker-not-current');}
$('.show-map-day-0').addClass('color-map-0 border-map-0');},setUrl:function(url){this.url=url;}});}(fiuzu.map.views));fiuzu.map.views.Label=function(options){this.visible=true;this.options=options;this.inLink=null;this.setValues(this.options);this.onAdd=function(){var me=this;this.listeners_=[google.maps.event.addListener(this,'position_changed',function(){me.draw();}),google.maps.event.addListener(this,'text_changed',function(){me.draw();}),google.maps.event.addListener(this,'zindex_changed',function(){me.draw();}),google.maps.event.addListener(this.map,'zoom_changed',function(){me.draw();}),google.maps.event.addListener(this.map,'center_changed',function(){me.draw();})];};this.remove=function(){if(!this.MarkerView)return false;this.MarkerView.remove();for(var i=0,I=this.listeners_.length;i<I;++i){google.maps.event.removeListener(this.listeners_[i]);}};this.show=function(){this.visible=true;if(!this.MarkerView)return false;this.MarkerView._display='block';this.MarkerView.$el.removeClass('hidden');this.MarkerView.$el.show();this.updateClass();};this.hide=function(){this.visible=false;if(!this.MarkerView)return false;this.MarkerView._display='none';this.MarkerView.$el.addClass('hidden');this.MarkerView.$el.hide();};this.updateAll=function(model){if(!this.MarkerView)return false;this.updateClass();this.MarkerView.render(model);};this.updateClass=function(){var pane=this.getPanes().floatPane;var currentDay=Number(this.mapView._plan?this.mapView._plan.currentDay:this.mapView.currentDay);var day='.markerDay-'+currentDay;if(this.MarkerView.item){$(pane.childNodes).find('.markerAtt').removeClass('marker-not-current');$(pane.childNodes).find(day).addClass('marker-not-current');}};this.focus=function(){if(!this.MarkerView)return false;this.MarkerView.focus();};this.blur=function(){if(!this.MarkerView)return false;this.MarkerView.blur();};this.draw=function(refresh){var pane=this.getPanes().floatPane;pane.className='fiuzu-marker';if(!this.MarkerView){this.model.options=this.options;this.model.pane=pane;this.model.options.is_nearby=this.is_nearby;this.MarkerView=new fiuzu.map.views.MarkerView(this.model);this.MarkerView.appendItem();}else{this.MarkerView.updatePosition();}
if(this.is_nearby){this.visible=true;}
if(this.visible){this.show();}else{this.hide();}
this.inLink&&this.setInLink(this.inLink);};this.setInLink=function(url){this.inLink=url;this.MarkerView&&this.MarkerView.setUrl(url);};};fiuzu.map.views.Label.prototype=new google.maps.OverlayView();