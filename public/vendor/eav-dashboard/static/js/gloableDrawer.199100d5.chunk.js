(window.webpackJsonp=window.webpackJsonp||[]).push([[14],{546:function(e,n,t){"use strict";t.r(n);t(344);var o=t(369),l=t(370),c=t(39),a=t(40),r=t(82),s=t(81),u=t(83),i=(t(315),t(342)),b=t(0),f=t.n(b),C=t(34),d=t(95),p=t(146),O=t(3),j=t(142),m=Object(b.lazy)(function(){return Promise.all([t.e(19),t.e(17)]).then(t.bind(null,545))}),h=Object(b.lazy)(function(){return Promise.all([t.e(0),t.e(1),t.e(2),t.e(7)]).then(t.bind(null,497))}),y=Object(b.lazy)(function(){return Promise.all([t.e(0),t.e(1),t.e(2),t.e(12)]).then(t.bind(null,539))}),v=Object(b.lazy)(function(){return Promise.all([t.e(0),t.e(1),t.e(2),t.e(3),t.e(5)]).then(t.bind(null,540))}),E=Object(b.lazy)(function(){return Promise.all([t.e(0),t.e(1),t.e(2),t.e(3),t.e(10)]).then(t.bind(null,541))}),g=i.a.confirm,k=function(e){function n(){var e,t;Object(c.a)(this,n);for(var o=arguments.length,l=new Array(o),a=0;a<o;a++)l[a]=arguments[a];return(t=Object(r.a)(this,(e=Object(s.a)(n)).call.apply(e,[this].concat(l)))).canClose=function(){return!0},t.onClose=function(){return null},t.getContent=function(e){if(t.canClose=function(){return!0},!e.visible)return[null,null];var n=e.data;return"set"===n.type?['Edit "'.concat(n.set.name,'" set'),f.a.createElement(m,Object.assign({},n,{close:t.close,canClose:function(e){return t.canClose=e},onClose:function(e){return t.onClose=e}}))]:"addSet"===n.type?["Add Set",f.a.createElement(h,Object.assign({},n,{close:t.close,canClose:function(e){return t.canClose=e},onClose:function(e){return t.onClose=e}}))]:"editSet"===n.type?["Edit Set",f.a.createElement(y,Object.assign({},n,{close:t.close,canClose:function(e){return t.canClose=e},onClose:function(e){return t.onClose=e}}))]:"addAttribute"===n.type?["Add Attribute",f.a.createElement(v,Object.assign({},n,{close:t.close,canClose:function(e){return t.canClose=e},onClose:function(e){return t.onClose=e}}))]:"editAttribute"===n.type?["Edit Attribute",f.a.createElement(E,Object.assign({},n,{close:t.close,canClose:function(e){return t.canClose=e},onClose:function(e){return t.onClose=e}}))]:[null,null]},t.close=function(){t.canClose()?(t.onClose(),t.props.dispatch(Object(O.b)())):g({title:"Are you sure to close this task?",content:"You have unsaved data.",okText:"Yes",okType:"danger",cancelText:"No",onOk:function(){t.onClose(),t.props.dispatch(Object(O.b)())},onCancel:function(){}})},t}return Object(u.a)(n,e),Object(a.a)(n,[{key:"render",value:function(){var e=this,n=this.getContent(this.props),t=Object(l.a)(n,2),c=t[0],a=t[1];return f.a.createElement(d.a.Consumer,null,function(n){return f.a.createElement(o.a,{title:c,placement:"right",closable:!1,width:"small"===n?"90%":"65%",onClose:e.close,visible:e.props.visible},f.a.createElement(b.Suspense,{fallback:f.a.createElement(j.a,null)},e.props.visible?a:null))})}}]),n}(b.PureComponent);n.default=Object(C.c)(function(e){return{visible:Object(p.b)(e),data:Object(p.a)(e)}})(k)}}]);