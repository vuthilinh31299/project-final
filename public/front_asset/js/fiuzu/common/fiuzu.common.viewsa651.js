window.fiuzu.common.views=window.fiuzu.common.views||{};fiuzu.common.views.TEMPLATE_DOMS={ItineraryItem:"#tpl-itinerary-item",ItineraryItemChangeTime:"#tpl-itinerary-item-change-time",mapBoxInfo:"#tpl-marker-box",toolBoxLib:"#attraction-controlbar-template",toolDayNavBar:"#day_navigator_template",figureLegendTool:"#figure_legend"};fiuzu.common.views.ModuleCommentView=Backbone.View.extend({_viewAll:false,_loadAll:false,initialize:function($el,$tpl){this.$el=$el;this.object={type:$el.attr('data-type'),id:$el.attr('data-id')};this._template=_.template($tpl.html(),null,{variable:'data'});this.$list=$('.comments',this.$el);this.$btnShowComment=$('.actions .btn-comment-all',this.$el);this.$iptComment=$('.ipt-comment',this.$el);this.$boxNew=$('.comment-new',this.$el);this.$numComment=$('.comment-count',this.$el);this._numComment=parseInt(this.$numComment.text())||0;this.comments=[];this.render();},events:{'click .btn-comment-all':'show','keypress .ipt-comment':'addComment','click .btn-comment-delete':'deleteComment','click .btn-edit':'editComment','click .btn-remove':'removeComment'},render:function(){this.delegateEvents();},show:function(){if(this._viewAll){this.collapse();}else{this.expand();}},expand:function(){this.$list.addClass('expanded');this.$btnShowComment.find('i.icon-expand').removeClass('icomoon-icon-arrow-down-2').addClass('icomoon-icon-arrow-up-2');this.$btnShowComment.find('.action').text('Hide');this._viewAll=true;this.$iptComment.focus();},collapse:function(){this.$list.removeClass('expanded');this.$btnShowComment.find('i.icon-expand').removeClass('icomoon-icon-arrow-up-2').addClass('icomoon-icon-arrow-down-2');this.$btnShowComment.find('.action').text('Show');this._viewAll=false;},loadAll:function(){var self=this;if(!this._loadAll){var url="/api/comment/?object_id="+this.object.id+'&type='+this.object.type;$.ajax({url:url,async:false,success:function(resp){self.comments=resp.results;}});}},addComment:function(e){var content=this.$iptComment.val(),self=this;if(e.which==13){if(content.trim()!=''){var comment=new fiuzu.common.models.Comment({object:this.object.id,type:this.object.type,comment:this.$iptComment.val()});this.$iptComment.prop('disabled',true).addClass('disabled');comment.save({},{wait:true,success:function(model,resp){self._numComment++;var html=self._template(model.toJSON());$(html).insertBefore(self.$boxNew);self.$iptComment.val('').prop('disabled',false).removeClass('disabled');self.$numComment.text(self._numComment);self.expand();},error:function(){self.$iptComment.focus().prop('disabled',false).removeClass('disabled');}});}else{this.$iptComment.focus();}}},removeComment:function(e){var target$=$(e.currentTarget),commentId=target$.attr('data-id'),cfm=confirm('Are you confirm to delete this comment ?');if(commentId&&cfm){var commentEl=$('#object-comment-'+commentId,this.$el);var comment=new fiuzu.common.models.Comment({id:commentId});comment.destroy({success:function(){commentEl.remove();}});}}});fiuzu.common.views.PopoverViewSetupHideAllHandler=false;fiuzu.common.views.PopoverView=Backbone.View.extend({initialize:function(options){_.bindAll(this,"render","show","hide","toggle","destroy","remove","isShowing");this.offsetTop=30;this.offsetLeft=0;options=options||{};this.Header=options.header;this.Content=options.content;this.Placement=options.placement;this.Trigger=options.trigger;this.Delay=options.delay;this.UseHTML=options.html;this.HideOtherPopovers=options.hideOtherPopovers;this.ArrowStyle=options.arrowCSS;if(options.offsetTop&&$.isNumeric(options.offsetTop)){this.offsetTop+=options.offsetTop;}
if(options.offsetLeft&&$.isNumeric(options.offsetLeft)){this.offsetLeft+=options.offsetLeft;}
if(options.el){this.popoverElement=$(options.el);}},render:function(show){var that=this;if(!this.popoverElement)throw 'PopoverView must be set into an element';this.popoverElement.popover&&this.popoverElement.popover('destroy');this.popover=this.popoverElement.popover({title:this.Header,content:"",container:'body',placement:this.Placement||"left",trigger:this.Trigger||"click",delay:this.Delay||0,html:this.UseHTML}).on("show.bs.popover",function(e){if(that.HideOtherPopovers){that.hideAllPopOver(e);}
if(!fiuzu.common.views.PopoverViewSetupHideAllHandler){$('body').on('click',function(e){that.hideAllPopOver(e);});fiuzu.common.views.PopoverViewSetupHideAllHandler=true;}}).data("bs.popover");this.popover.view=this;this.popover.$tip=$(this.popover.tip());this.popover.getContent=function(){return that.Content||'';};this.popover.getTitle=function(){return that.Header;};this.popover._setContent=this.popover._setContent||this.popover.setContent;this.popover.setContent=function(){that.popover._setContent();$("<button type=\"button\" class=\"close\" data-dismiss=\"modal\">×</button>").appendTo(that.popover.$tip.find(".popover-title")).one("click",that.hide);if(that.ArrowStyle){that.popover.$tip.find(".arrow").css(that.ArrowStyle);}};if(show===true){this.show();}
return this;},hideAllPopOver:function(e){$(this.HideOtherPopovers).not(e.target).each(function(){var popover=$(this).data('bs.popover');if(popover){$(this).popover("hide");if(popover.view){popover.view.state='hidden';}}});},isShowing:function(){return this.state=='shown';},show:function(){this.popoverElement.popover("show");this.state='shown';},hide:function(){this.popoverElement.popover("hide");this.state='hidden';},toggle:function(){this.popoverElement.popover("toggle");this.show();},destroy:function(){this.popoverElement.popover("destroy");if(this.popover){this.popover.$tip.remove();}},remove:function(){this.destroy();}});fiuzu.common.views.CommentMainView=Backbone.View.extend({initialize:function(){this.$el=$("#box_comment");},events:{'click .btn-remove':'removeComment','click .btn-edit':'editComment'},render:function(){var box$=this.$el,input$=$("#comment-text",box$),submit$=$(".btn-submit",box$),list$=$(".list-comments",box$),count$=$(".comment-count",box$);var cls={},type=this.type,is_review=this.is_review,tmpl=_.template($("#tpl-comment").html(),null,{variable:'data'});var view=this;submit$.keypress(function(e){if(e.keyCode==13){cls.doComment(e);}});submit$.click(function(e){cls.doComment(e);});cls.doComment=function(e){var text=input$.val();var objId=view.object;if(text!=""){input$.prop('disabled',true);submit$.attr('disabled',true).find("span").text("Posting ...");var resetHdl=function(){input$.prop('disabled',false);submit$.attr('disabled',false).find("span").text("Post your comment");};var comment=new fiuzu.common.models.Comment({comment:text,type:$("#box_comment").data('type'),object:$("#box_comment").data('object')});comment.save({},{success:function(model,resp){var html=tmpl(model.toJSON()),count=view.getCount()+1,newComment$=$(html);list$.append(newComment$);input$.val("");view.setCount(count);$(".no-comment",box$).hide();newComment$.find('.btn-vote').FiuzuVoteButton({callback:function(){alert('Done');}});resetHdl();},error:function(model,resp){alert("Sorry ! You can not comment now");resetHdl();}});}else{input$.focus();}};},getCount:function(){var count$=$(".comment-count",this.$el);return parseInt(count$.attr('data-count'));},setCount:function(count){var count$=$(".comment-count",this.$el);var name_action='comment';if(this.is_review){name_action='review';}
count$.attr('data-count',count).text(count+' '+name_action+(count>1?'s':''));},});fiuzu.utils.initDateRange=function(dFrom$,dTo$,disable_pass,opts){var nowTemp=new Date();var now=new Date(nowTemp.getFullYear(),nowTemp.getMonth(),nowTemp.getDate(),0,0,0,0);opts=opts||{};var dateFormat='yyyy-mm-dd';if(opts.format){dateFormat=opts.format;}
disable_pass=typeof disable_pass!=='undefined'?disable_pass:true;var checkin=dFrom$.datepicker({format:dateFormat,onRender:function(date){if(disable_pass){return date.valueOf()<now.valueOf()?'disabled':'';}}}).on('changeDate',function(ev){if(opts&&opts.changeDate)opts.changeDate(ev);var newDate=new Date(ev.date);var newD=new Date(newDate.getFullYear(),newDate.getMonth(),newDate.getDate(),0,0,0,0);newD.setDate(newD.getDate());checkout.setValue(newD);checkin.hide();if(!opts.silent){dTo$[0].focus();}}).on('show',function(x){if(opts&&opts.onShow)opts.onShow(x);}).on('hide',function(x){if(opts&&opts.onHide)opts.onHide(x);}).data('datepicker');var checkout=dTo$.datepicker({format:dateFormat,onRender:function(date){return date.valueOf()<checkin.date.valueOf()?'disabled':'';}}).on('changeDate',function(ev){checkout.hide();if(opts&&opts.changeDate)opts.changeDate(ev);opts&&opts.finish&&opts.finish();}).on('show',function(x){if(opts&&opts.onShow)opts.onShow(x);}).on('hide',function(x){if(opts&&opts.onHide)opts.onHide(x);}).data('datepicker');var defaultDateFrom=dFrom$.val();var defaultDateTo=dTo$.val();if(defaultDateFrom){dFrom$.datepicker('setValue',defaultDateFrom);if(defaultDateTo){dTo$.datepicker('setValue',defaultDateTo);}}else{dFrom$.add(dTo$).datepicker('setValue',now);}
dFrom$.add(dTo$).datepicker().on('show',function(ev){$('.datepicker .switch').addClass('disabled');});};(function(){var maxDeltaTime=180,showNewsletter=true;var firstAccess=fiuzu.cookie.get('firstAccess'),newslettered=fiuzu.cookie.get('newsletter'),deltaTime=fiuzu.utils.getTimeStamp()-fiuzu.cookie.get('firstAccess');var opts={classId:'modal-newsletter',url:'/account/modal/newsletter',method:'POST',multiple:true,guest:true,params:{template:'newsletter'},callbacks:{afterSubmit:function(email){alert('Thank you for your submitting !');fiuzu.cookie.set('newsletter',email,null,'https://www.justgola.com/');},close:function(){fiuzu.cookie.set('firstAccess',fiuzu.utils.getTimeStamp(),null,'https://www.justgola.com/');maxDeltaTime+=180;}}};$(function(){if(!(window.allowPopup===false)){if(deltaTime>3){showNewsletter=false;var sysmsg=setTimeout(function(){fiuzu.utils.showSystemMessagePopup();fiuzu.cookie.set('firstAccess',fiuzu.utils.getTimeStamp(),null,'https://www.justgola.com/');},1000);}}});if(!firstAccess||firstAccess==''){fiuzu.cookie.set('firstAccess',fiuzu.utils.getTimeStamp(),null,'https://www.justgola.com/');}
if(window.location.href.indexOf('/planner')<0&&(!newslettered||newslettered=="")){if(deltaTime>maxDeltaTime){var auth=new fiuzu.common.models.Authentication();$(function(){if(!auth.isAuthenticated()&&!(window.allowPopup===false)&&showNewsletter){var newsletter=setTimeout(function(){fiuzu.utils.loadModal(opts);},3000);$('body').on('keyup click',function(){if(newsletter){clearTimeout(newsletter);newsletter=null;}});}});}}}());