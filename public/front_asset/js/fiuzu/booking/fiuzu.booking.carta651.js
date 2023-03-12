"use strict";fiuzu.booking=fiuzu.booking||{};fiuzu.booking.cart=fiuzu.booking.cart||{};(function(cart){cart.CartView=Backbone.View.extend({initialize:function(model,opts){this.model=model;this.$el=$(opts.el);this.summary$=this.$el.find('.table-summary');this.items$=this.$el.find('.table-cart');this.btnCheckout$=this.$el.find('.btn-checkout');this.btnContinue$=this.$el.find('.btn-continue');this.listenTo(this.model,'reload',this.reload);if(window.config&&config.partner){if(location.href.indexOf('/planner')>-1){var baseUrl=this.btnCheckout$.attr('href').replace('/booking/billing-info','/partner/plugin/'+config.partner+'/booking/billing-info'),url=config.partnerConfig.planner_url+'#'+btoa(baseUrl);this.btnCheckout$.attr('href',url);}else{this.btnCheckout$.attr('href','/partner/plugin/'+config.partner+'/booking/billing-info');}
this.btnContinue$.attr('href','/partner/plugin/'+config.partner+'/tripplanner');}},events:{'click .btn-empty':'empty','click .btn-checkout':'checkout'},render:function(){this.renderItems();this.renderSummary();},reload:function(){var view=this;this.model.reset();this.model.fetch({success:function(){view.render();}});},reloadSummary:function(){var view=this;this.model.fetch({success:function(){view.renderSummary();}});},empty:function(){var view=this,cfm=confirm('Do you really want to remove all items in your shopping cart ?');if(cfm){this.model.empty(function(){view.reload();});}},loading:function(loading){if(loading){this.items$.find('tbody .item-loading').show();}else{this.items$.find('tbody .item-loading').hide();}},renderItems:function(){var view=this,items=this.model.getItems();this.clearItems();if(items.length){_.each(items.models,function(item){var itemView=new cart.CartItemView(item,{cart:view.model,cartView:view});itemView.render();view.items$.find('tbody').prepend(itemView.$el);});this.items$.find('tbody .noitem').hide().addClass('hidden');}else{this.items$.find('tbody .noitem').show().removeClass('hidden');}
this.loading(false);},renderSummary:function(){var data=this.model.toJSON();var currency=fiuzu.session.currency;this.summary$.find('.cart-subtotal .value').text(fiuzu.utils.convertCurrency(data.price.subtotal)+' '+fiuzu.session.currency);this.summary$.find('.cart-tax .value').text(fiuzu.utils.convertCurrency(data.price.tax)+' '+fiuzu.session.currency);this.summary$.find('.cart-paymentfee .value').text(fiuzu.utils.convertCurrency(data.price.payment)+' '+fiuzu.session.currency);this.summary$.find('.jcredit-value').text('-'+fiuzu.utils.convertCurrency(data.price.jcredit)+' '+fiuzu.session.currency);this.summary$.find('.coupon-total-value').text('-'+fiuzu.utils.convertCurrency(data.price.coupon_value)+' '+fiuzu.session.currency);this.summary$.find('.coupon-deposit-value').text('-'+fiuzu.utils.convertCurrency(data.price.coupon_value)+' '+fiuzu.session.currency);this.summary$.find('.cart-total .value').text(fiuzu.utils.convertCurrency(data.price.total)+' '+fiuzu.session.currency);this.summary$.find('.old--total-price').val(fiuzu.utils.convertCurrency(data.price.total));this.summary$.find('.cart-deposit .value').text(fiuzu.utils.convertCurrency(data.price.deposit)+' '+fiuzu.session.currency);this.summary$.find('.old-total-price').val(fiuzu.utils.convertCurrency(data.price.total));this.summary$.find('.old-deposit-price').val(fiuzu.utils.convertCurrency(data.price.deposit));if(data.can_deposit){$('.hide-credit').hide();$('.hide-debit').show();}else{$('.hide-credit').show();$('.hide-debit').hide();}
this.$el.find('.cart-numitems').text(data.count+' item'+(data.count>1?'s':''));},clearItems:function(){this.items$.find('tbody .item-booking').remove();this.loading(true);},hasUnavailableService:function(){return this.items$.find('.unavailable').length;},checkout:function(e){var view=this,btn$=view.$el.find('.btn-checkout');if(view.hasUnavailableService()){alert('Please remove unavailable service or change to another date before doing checkout. Thank you !');e.preventDefault();return;}
if(!fiuzu.cart.get('count')){alert('Please add any service to your cart before checkout. Thank you !');e.preventDefault();return;}
if(!btn$.attr('target')=='_blank'){e.preventDefault();var _checkout=function(){location.href=btn$.attr('href');};fiuzu.common.decorator.loginRequired(_checkout);}else{fiuzu.app&&(fiuzu.app.allowOpenWindow=true);setTimeout(function(){fiuzu.app&&(fiuzu.app.allowOpenWindow=false);},100);}}});cart.CartItemView=Backbone.View.extend({tagName:'tr',attributes:{'class':"item-booking",},events:{'click .btn-edit':'editItem','click .btn-remove':'removeItem'},initialize:function(model,opts){this.model=model;this.template$=$("#tpl-cartitem");this.template=_.template(this.template$.html(),null,{variable:'data'});opts&&opts.cart&&(this.cart=opts.cart);opts&&opts.cartView&&(this.cartView=opts.cartView);},render:function(){var data=this.model.toJSON();var html=this.template(data);console.log('tstinfsd',data);this.$el.html(html).addClass('item-booking');fiuzu.utils.refreshTooltip(this.$el);},editItem:function(){var view=this,data=this.model.toJSON(),updated=function(resp){view.model=new fiuzu.booking.models.BookingItem(resp.item);view.render();view.cartView&&view.cartView.reloadSummary();};fiuzu.booking.utils.addNewItem(data.id,data.service_code,data.object_id,data,updated);},removeItem:function(){var view=this,cfm=confirm('Do you really want remove this item ?');if(cfm){view.model.remove(function(){fiuzu.cart&&fiuzu.cart.trigger('reload');});}}});}(fiuzu.booking.cart));