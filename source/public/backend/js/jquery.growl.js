(function(){"use strict";function i(t,i){return function(){return t.apply(i,arguments)}}var s,o,n;function t(){}function e(t){null==t&&(t={}),this.container=i(this.container,this),this.content=i(this.content,this),this.html=i(this.html,this),this.$growl=i(this.$growl,this),this.$growls=i(this.$growls,this),this.animate=i(this.animate,this),this.remove=i(this.remove,this),this.dismiss=i(this.dismiss,this),this.present=i(this.present,this),this.waitAndDismiss=i(this.waitAndDismiss,this),this.cycle=i(this.cycle,this),this.close=i(this.close,this),this.click=i(this.click,this),this.mouseLeave=i(this.mouseLeave,this),this.mouseEnter=i(this.mouseEnter,this),this.unbind=i(this.unbind,this),this.bind=i(this.bind,this),this.render=i(this.render,this),this.settings=s.extend({},e.settings,t),this.$growls().attr("class",this.settings.location),this.render()}s=jQuery,t.transitions={webkitTransition:"webkitTransitionEnd",mozTransition:"mozTransitionEnd",oTransition:"oTransitionEnd",transition:"transitionend"},t.transition=function(t){var i,s,n,e;for(e in i=t[0],s=this.transitions)if(n=s[e],null!=i.style[e])return n},o=t,e.settings={namespace:"growl",duration:3200,close:"&#215;",location:"default",style:"default",size:"medium",delayOnHover:!0},e.growl=function(t){return null==t&&(t={}),this.initialize(),new e(t)},e.initialize=function(){return s("body:not(:has(#growls))").append('<div id="growls" />')},e.prototype.render=function(){var t;t=this.$growl(),this.$growls().append(t),this.settings.fixed?this.present():this.cycle()},e.prototype.bind=function(t){return null==t&&(t=this.$growl()),t.on("click",this.click),this.settings.delayOnHover&&(t.on("mouseenter",this.mouseEnter),t.on("mouseleave",this.mouseLeave)),t.on("contextmenu",this.close).find("."+this.settings.namespace+"-close").on("click",this.close)},e.prototype.unbind=function(t){return null==t&&(t=this.$growl()),t.off("click",this.click),this.settings.delayOnHover&&(t.off("mouseenter",this.mouseEnter),t.off("mouseleave",this.mouseLeave)),t.off("contextmenu",this.close).find("."+this.settings.namespace+"-close").off("click",this.close)},e.prototype.mouseEnter=function(t){return this.$growl().stop(!0,!0)},e.prototype.mouseLeave=function(t){return this.waitAndDismiss()},e.prototype.click=function(t){if(null!=this.settings.url)return t.preventDefault(),t.stopPropagation(),window.open(this.settings.url)},e.prototype.close=function(t){return t.preventDefault(),t.stopPropagation(),this.$growl().stop().queue(this.dismiss).queue(this.remove)},e.prototype.cycle=function(){return this.$growl().queue(this.present).queue(this.waitAndDismiss())},e.prototype.waitAndDismiss=function(){return this.$growl().delay(this.settings.duration).queue(this.dismiss).queue(this.remove)},e.prototype.present=function(t){var i;return i=this.$growl(),this.bind(i),this.animate(i,this.settings.namespace+"-incoming","out",t)},e.prototype.dismiss=function(t){var i;return i=this.$growl(),this.unbind(i),this.animate(i,this.settings.namespace+"-outgoing","in",t)},e.prototype.remove=function(t){return this.$growl().remove(),"function"==typeof t?t():void 0},e.prototype.animate=function(t,i,s,n){var e;null==s&&(s="in"),e=o.transition(t),t["in"===s?"removeClass":"addClass"](i),t.offset().position,t["in"===s?"addClass":"removeClass"](i),null!=n&&(null!=e?t.one(e,n):n())},e.prototype.$growls=function(){return null!=this.$_growls?this.$_growls:this.$_growls=s("#growls")},e.prototype.$growl=function(){return null!=this.$_growl?this.$_growl:this.$_growl=s(this.html())},e.prototype.html=function(){return this.container(this.content())},e.prototype.content=function(){return"<div class='"+this.settings.namespace+"-close'>"+this.settings.close+"</div>\n<div class='"+this.settings.namespace+"-title'>"+this.settings.title+"</div>\n<div class='"+this.settings.namespace+"-message'>"+this.settings.message+"</div>"},e.prototype.container=function(t){return"<div class='"+this.settings.namespace+" "+this.settings.namespace+"-"+this.settings.style+" "+this.settings.namespace+"-"+this.settings.size+"'>\n  "+t+"\n</div>"},n=e,this.Growl=n,s.growl=function(t){return null==t&&(t={}),n.growl(t)},s.growl.error=function(t){var i;return null==t&&(t={}),i={title:"Error!",style:"error"},s.growl(s.extend(i,t))},s.growl.notice=function(t){var i;return null==t&&(t={}),i={title:"Notice!",style:"notice"},s.growl(s.extend(i,t))},s.growl.warning=function(t){var i;return null==t&&(t={}),i={title:"Warning!",style:"warning"},s.growl(s.extend(i,t))}}).call(this);