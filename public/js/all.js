if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(t){"use strict";var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1==e[0]&&9==e[1]&&e[2]<1||e[0]>3)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var n=t(this),i=n.data("bs.tab");i||n.data("bs.tab",i=new a(this)),"string"==typeof e&&i[e]()})}var a=function(e){this.element=t(e)};a.VERSION="3.3.7",a.TRANSITION_DURATION=150,a.prototype.show=function(){var e=this.element,a=e.closest(".tab-nav:not(.dropdown-menu)"),n=e.data("target");if(n||(n=e.attr("href"),n=n&&n.replace(/.*(?=#[^\s]*$)/,"")),!e.parent(".tab-nav__item").hasClass("active")){var i=a.find(".active:last a"),r=t.Event("hide.bs.tab",{relatedTarget:e[0]}),o=t.Event("show.bs.tab",{relatedTarget:i[0]});if(i.trigger(r),e.trigger(o),!o.isDefaultPrevented()&&!r.isDefaultPrevented()){var s=t(n);this.activate(e.closest(".tab-nav__item"),a),this.activate(s,s.parent(),function(){i.trigger({type:"hidden.bs.tab",relatedTarget:e[0]}),e.trigger({type:"shown.bs.tab",relatedTarget:i[0]})})}}},a.prototype.activate=function(e,n,i){function r(){o.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),e.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),s?(e[0].offsetWidth,e.addClass("in")):e.removeClass("fade"),e.parent(".dropdown-menu").length&&e.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),i&&i()}var o=n.find("> .active"),s=i&&t.support.transition&&(o.length&&o.hasClass("fade")||!!n.find("> .fade").length);o.length&&s?o.one("bsTransitionEnd",r).emulateTransitionEnd(a.TRANSITION_DURATION):r(),o.removeClass("in")};var n=t.fn.tab;t.fn.tab=e,t.fn.tab.Constructor=a,t.fn.tab.noConflict=function(){return t.fn.tab=n,this};var i=function(a){a.preventDefault(),e.call(t(this),"show")};t(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',i).on("click.bs.tab.data-api",'[data-toggle="pill"]',i)}(jQuery),function(){"use strict";if(navigator.userAgent.match(/IEMobile\/10\.0/)){var t=document.createElement("style");t.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),document.querySelector("head").appendChild(t)}}(),function(t){"use strict";t(".mobile-toggle").click(function(){t(".mobile-toggle").toggleClass("hide"),t(".sidebar-nav").toggleClass("active"),t("body").toggleClass("no-overflow")}),t("a[href*=\\#]:not([href=\\#], .tab-nav__link)").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=t(this.hash);if(e=e.length?e:t("[name="+this.hash.slice(1)+"]"),e.length)return t("html,body").animate({scrollTop:e.offset().top},1e3),!1}});var e=t(window);e.on("scroll",function(){e.scrollTop()>40?(t(".navbar").addClass("navbar--fixed"),t("body").addClass("header--fixed"),t(".mobile-toggle").addClass("mobile-toggle--fixed")):e.scrollTop()<40&&(t(".navbar").removeClass("navbar--fixed"),t("body").removeClass("header--fixed"),t(".mobile-toggle").removeClass("mobile-toggle--fixed"))})}(jQuery);