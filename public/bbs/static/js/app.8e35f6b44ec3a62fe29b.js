webpackJsonp([1],{"3ydf":function(t,e){},"9GaO":function(t,e){},BnKz:function(t,e){},Kv53:function(t,e){},NHnr:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("7+uW"),n=(a("Kv53"),{render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"app"}},[a("el-container",[a("el-header",[a("el-menu",{staticClass:"el-menu-demo",attrs:{mode:"horizontal","background-color":"#545c64","text-color":"#fff","active-text-color":"#ffd04b"}},[a("el-menu-item",{attrs:{index:"1"},on:{click:function(e){return t.to("/")}}},[t._v("\n                    社区首页\n                ")]),t._v(" "),a("el-menu-item",{attrs:{index:"4"},on:{click:function(e){return t.to("http://p.finspace.top")}}},[t._v("\n                    P圈首页\n                ")]),t._v(" "),a("el-menu-item",{attrs:{index:"5"},on:{click:function(e){return t.to("/publish")}}},[t._v("\n                    发布帖子\n                ")]),t._v(" "),a("el-menu-item",{attrs:{index:"2"},on:{click:function(e){return t.to("/user")}}},[t._v("\n                    我的圈子\n                ")]),t._v(" "),a("el-menu-item",{staticStyle:{float:"right"},attrs:{index:"3"},on:{click:function(e){return t.to("/account")}}},[t._v("\n                    用户中心\n                ")])],1)],1),t._v(" "),a("router-view")],1)],1)},staticRenderFns:[]});var s=a("VU/8")({name:"App",methods:{to:function(t){this.$router.push(t)}}},n,!1,function(t){a("BnKz")},null,null).exports,o=a("/ocq"),l={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-main",[a("el-row",{attrs:{gutter:10}},[a("el-col",{attrs:{span:24}},[a("div",{staticClass:"block"},[a("el-carousel",{attrs:{height:"300"}},t._l(4,function(e){return a("el-carousel-item",{key:e,staticClass:"bg-purple-dark"},[a("h3",{staticClass:"small"},[t._v(t._s(e))])])}),1)],1)])],1),t._v(" "),a("el-row",[a("el-col",[a("el-card",{attrs:{shadow:"hover"}},[a("div",{staticClass:"clearfix",attrs:{slot:"header"},slot:"header"},[t._v("\n                    大家都在逛\n                ")]),t._v(" "),a("div",{staticStyle:{display:"flex"}},t._l(t.category,function(e){return a("router-link",{staticStyle:{"text-decoration":"none"},attrs:{to:{name:"category",params:{id:e.id}}}},[a("div",{staticClass:"small-card bg-cyan"},[a("span",[t._v(t._s(e.group_name))])])])}),1)])],1)],1)],1)},staticRenderFns:[]};var r=a("VU/8")({name:"index",data:function(){return{msg:"123",count:0,category:[{group_name:"四川农业大学",id:123}]}},mounted:function(){var t=this;this.$axios.request({url:"/index/column/show"}).then(function(e){t.category=e.data.data})},methods:{}},l,!1,function(t){a("v1Fy")},"data-v-4349de65",null).exports,c=a("aiqZ"),d=a.n(c),u=(a("oTFt"),a("9GaO"),a("v/ij"),a("fm5j"),a("Muz9")),p=a.n(u),m={data:function(){return{commentData:{},content:"",title:"",topic_id:"",editorOption:{},myComment:"",myReply:"",dialogVisible:!1,replyData:{floor:1,uid:"1",msg:"xxxx",username:"马云",msg_id:""}}},mounted:function(){var t=this;this.topic_id=this.$route.params.id,p.a.request({url:"/index/BBS/topic?id="+this.topic_id,method:"get"}).then(function(e){if(0!==e.data.status)return 0;t.content=e.data.data.content,t.title=e.data.data.title}),this.getComment()},methods:{submit:function(){console.log(this.$refs.text.value)},handleClose:function(t){this.dialogVisible=!1},reply:function(t,e,a,i,n){this.dialogVisible=!0,this.replyData.uid=e,this.replyData.floor=t,this.replyData.msg=a,this.replyData.username=i,this.replyData.msg_id=n},send:function(){var t=this;this.$axios.request({url:"/index/BBS/reply",data:{floor:this.replyData.floor,recipient_id:this.replyData.uid,content:this.myReply,t_id:this.topic_id,msg_id:this.replyData.msg_id},method:"post"}).then(function(e){t.$message("发送成功")})},comment:function(){var t=this;this.$axios.request({url:"/index/BBS/comment",data:{id:this.topic_id,content:this.myComment},method:"post"}).then(function(e){0===e.data.status&&(t.$message("评论成功"),t.myComment="")})},getComment:function(){var t=this;this.$axios.request({url:"/index/BBS/commentRender",data:{id:this.topic_id},method:"post"}).then(function(e){t.commentData=e.data.data,console.log(t.commentData)})}},name:"topics",components:d.a},v={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-container",[a("el-main",{staticStyle:{"min-height":"50rem"}},[a("el-row",{attrs:{gutter:10}},[a("el-col",{attrs:{span:24}},[a("el-card",{staticClass:"box-card"},[a("p",{attrs:{id:"title"}},[t._v("\n                        "+t._s(t.title)+"\n                    ")]),t._v(" "),a("el-divider"),t._v(" "),a("div",{attrs:{id:"content"}},[a("el-card",[a("div",{domProps:{innerHTML:t._s(t.content)}})])],1),t._v(" "),a("el-divider",[t._v("评论")]),t._v(" "),a("div",{attrs:{id:"comment"}},t._l(t.commentData,function(e,i){return a("div",{key:i},[3==e.category?a("div",[a("span",{staticClass:"floor-num"},[t._v(t._s(i+1)+"楼   "+t._s(e.createTime))]),t._v(" "),a("el-card",{staticClass:"comment-item"},[a("i",{staticClass:"el-icon-chat-dot-square replay-btn",on:{click:function(a){t.reply(i+1,e.author_id,e.content.substring(0,20),e.author_name,e.Id)}}}),t._v(" "),a("div",{staticClass:"flex comment-content align-center"},[a("el-avatar",{staticStyle:{"margin-right":"10px"},attrs:{size:35,src:"",shape:"square"}}),t._v(" "),a("span",{staticClass:"author"},[t._v(t._s(e.author_name))]),t._v("：\n                                        "),a("div",{staticClass:"reply-content",domProps:{innerHTML:t._s(e.content)}})],1)])],1):t._e(),t._v(" "),1==e.category?a("div",[a("span",{staticClass:"floor-num"},[t._v(t._s(i+1)+"楼     "+t._s(e.createTime))]),t._v(" "),a("el-card",{staticClass:"comment-item"},[a("div",{},[a("i",{staticClass:"el-icon-chat-dot-square replay-btn",on:{click:function(a){t.reply(i+1,e.author_id,e.content.substring(0,20),e.author_name,e.Id)}}}),t._v(" "),a("div",{staticClass:"flex comment-content align-center"},[a("el-avatar",{staticStyle:{"margin-right":"10px"},attrs:{size:35,src:"",shape:"square"}}),t._v(" "),a("span",{staticClass:"author"},[t._v(t._s(e.author_name))]),t._v("：\n                                            "),a("div",{staticClass:"reply-content",domProps:{innerHTML:t._s(e.content)}})],1)]),t._v(" "),a("div",{staticStyle:{color:"white","font-size":"small",margin:"10px",padding:"10px",background:"#cccccc","border-radius":"2px"}},[t._v("\n                                        回复"+t._s(e.floor)+"楼 "),a("span",{staticClass:"author"},[t._v(t._s(e.reply_name))]),t._v(" ："),a("span",{domProps:{innerHTML:t._s(e.target_content)}})])])],1):t._e()])}),0),t._v(" "),a("div",{staticClass:"block"},[a("el-pagination",{attrs:{layout:"prev, pager, next",total:50}})],1),t._v(" "),a("el-divider",[t._v("回复")]),t._v(" "),a("div",{staticStyle:{"min-height":"300px"},attrs:{id:"reply"}},[a("quill-editor",{ref:"text",staticClass:"myQuillEditor",staticStyle:{"margin-bottom":"10px","min-height":"200px"},attrs:{options:t.editorOption},model:{value:t.myComment,callback:function(e){t.myComment=e},expression:"myComment"}}),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:t.comment}},[t._v("提交")])],1)],1)],1)],1),t._v(" "),a("el-dialog",{attrs:{visible:t.dialogVisible,width:"60%"},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("el-card",{staticStyle:{margin:"10px"},attrs:{"body-style":{background:"#ccc",color:"white",margin:"10px"}}},[t._v("\n                回复"+t._s(t.replyData.floor)+"楼"),a("span",{staticClass:"author"},[t._v(t._s(t.replyData.username))]),t._v("：\n                "),a("div",{staticStyle:{display:"inline-block"},domProps:{innerHTML:t._s(t.replyData.msg)}})]),t._v(" "),a("quill-editor",{ref:"text",staticClass:"myQuillEditor",staticStyle:{"margin-bottom":"10px","min-height":"200px"},attrs:{options:t.editorOption},model:{value:t.myReply,callback:function(e){t.myReply=e},expression:"myReply"}}),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(e){return t.send()}}},[t._v("确 定")])],1)],1)],1),t._v(" "),a("el-aside",{staticStyle:{padding:"20px"}},[a("el-card",{staticStyle:{display:"flex","flex-direction":"column","justify-content":"center","text-align":"center","box-shadow":"none"}},[a("div",[t._v("广告位")]),t._v(" "),a("div",[t._v("广告位")]),t._v(" "),a("div",[t._v("广告位")])])],1)],1)},staticRenderFns:[]};var _=a("VU/8")(m,v,!1,function(t){a("3ydf")},"data-v-38ed79a5",null).exports,f={name:"publish",data:function(){return{category:{},content:"",editorOption:{},dialogVisible:!1,option:[],api:{category:"",title:""}}},components:d.a,mounted:function(){var t=this;this.$axios.request({url:"/index/column/show"}).then(function(e){t.option=e.data.data})},methods:{submit:function(){console.log(this.$refs.text.value)},handleClose:function(t){this.dialogVisible=!1},publish:function(){p.a.request({url:"/bbs/publish",data:{category:this.api.category,title:this.api.title,content:this.content},method:"post"}).then(function(t){alert(t.status)})}}},h={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-container",[a("el-aside",{staticStyle:{padding:"20px"}},[a("el-card",{staticStyle:{display:"flex","flex-direction":"column","justify-content":"center","text-align":"center","box-shadow":"none"}},[a("div",[t._v("广告位")]),t._v(" "),a("div",[t._v("广告位")]),t._v(" "),a("div",[t._v("广告位")])])],1),t._v(" "),a("el-main",[a("el-card",[a("el-row",{attrs:{gutter:10}},[a("el-col",{staticStyle:{"margin-top":"10px"},attrs:{span:24}},[a("el-input",{attrs:{type:"text",placeholder:"请在此处输入标题"},model:{value:t.api.title,callback:function(e){t.$set(t.api,"title",e)},expression:"api.title"}})],1),t._v(" "),a("el-col",{staticStyle:{"margin-top":"10px"},attrs:{span:24}},[a("el-select",{attrs:{placeholder:"请选择发布到的圈子"},model:{value:t.api.category,callback:function(e){t.$set(t.api,"category",e)},expression:"api.category"}},t._l(t.option,function(t){return a("el-option",{key:t.id,attrs:{label:t.group_name,value:t.id}})}),1)],1),t._v(" "),a("el-col",{attrs:{span:24}},[a("div",{staticClass:"publish",staticStyle:{"margin-top":"10px"}},[a("quill-editor",{ref:"text",staticClass:"myQuillEditor",staticStyle:{"margin-bottom":"10px","min-height":"200px"},attrs:{options:t.editorOption},model:{value:t.content,callback:function(e){t.content=e},expression:"content"}})],1),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:t.publish}},[t._v("提交")])],1)],1)],1),t._v(" "),a("el-dialog",{attrs:{visible:t.dialogVisible},on:{"update:visible":function(e){t.dialogVisible=e}}},[a("el-form"),t._v(" "),a("span",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(e){t.dialogVisible=!1}}},[t._v("确 定")])],1)],1)],1),t._v(" "),a("el-aside",{staticStyle:{padding:"20px"}},[a("el-card",{staticStyle:{display:"flex","flex-direction":"column","justify-content":"center","text-align":"center","box-shadow":"none"}},[a("div",[t._v("广告位")]),t._v(" "),a("div",[t._v("广告位")]),t._v(" "),a("div",[t._v("广告位")])])],1)],1)},staticRenderFns:[]};var y=a("VU/8")(f,h,!1,function(t){a("xrAB")},"data-v-829da662",null).exports,g={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-main",[a("div",[a("el-card",{staticStyle:{"margin-bottom":"10px"}},[a("div",{staticClass:"bg-gradual-blue",staticStyle:{display:"flex","justify-content":"center","align-items":"center"}},[a("el-avatar",{attrs:{size:100}},[a("strong",[t._v("Alice")])]),t._v(" "),a("div",{staticStyle:{margin:"20px"}},[a("p",[a("span",[t._v("发文数量：")]),a("span",[t._v("1024")]),t._v("篇")]),t._v(" "),a("p",[a("span",[t._v("粉丝数量：")]),a("span",[t._v("10")]),t._v("K")]),t._v(" "),a("p",[a("span",[t._v("积分累计：")]),a("span",[t._v("1.1")]),t._v("K")])])],1)]),t._v(" "),a("el-tabs",{staticStyle:{"min-height":"300px"},attrs:{type:"border-card","tab-position":"left"}},[a("el-tab-pane",{attrs:{label:"我的消息"}},[t._v("我的消息")]),t._v(" "),a("el-tab-pane",{attrs:{label:"我的圈文"}},[t._v("我的圈文")]),t._v(" "),a("el-tab-pane",{attrs:{label:"我的回复"}},[t._v("我的回复")])],1)],1)])},staticRenderFns:[]};var x=a("VU/8")({name:"user"},g,!1,function(t){a("bmYs")},"data-v-4db7f490",null).exports,b={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("el-main",[a("el-row",[a("el-col",[a("el-card",{staticClass:"box-card"},[a("div",{staticClass:"bg-gradual-blue",staticStyle:{display:"flex","align-items":"center",padding:"20px"}},[a("el-avatar",{attrs:{size:100}},[t._v("\n                        SICAU\n                    ")]),t._v(" "),a("p",{staticStyle:{"margin-left":"10px","font-weight":"bolder"}},[a("span",{staticClass:"p-name"},[t._v(t._s(t.info.name))]),t._v(" "),a("span",[t._v("话题数 ："+t._s(t.info.topic)+"K")]),t._v(" "),a("span",[t._v("关注数："+t._s(t.info.watch)+"K")])])],1),t._v(" "),a("div",{staticStyle:{"margin-top":"30px"}},[a("el-tabs",{attrs:{type:"card"},model:{value:t.activeName,callback:function(e){t.activeName=e},expression:"activeName"}},[a("el-tab-pane",{attrs:{label:"推荐文章",name:"n1"}},t._l(t.items.comment,function(e,i){return a("router-link",{key:i,staticStyle:{"text-decoration":"none"},attrs:{to:{name:"topics",params:{id:e.id}}}},[a("div",{staticClass:"topic-item"},[a("span",[t._v(t._s(e.title))])])])}),1),t._v(" "),a("el-tab-pane",{attrs:{label:"精选文章",name:"n2"}},t._l(t.items.comment,function(e,i){return a("router-link",{key:i,staticStyle:{"text-decoration":"none"},attrs:{to:{name:"topics",params:{id:e.id}}}},[a("div",{staticClass:"topic-item"},[a("span",[t._v(t._s(e.title))])])])}),1),t._v(" "),a("el-tab-pane",{attrs:{label:"最新文章",name:"n3"}},t._l(t.items.comment,function(e,i){return a("router-link",{key:i,staticStyle:{"text-decoration":"none"},attrs:{to:{name:"topics",params:{id:e.id}}}},[a("div",{staticClass:"topic-item"},[a("span",[t._v(t._s(e.title))])])])}),1)],1)],1)])],1)],1)],1)},staticRenderFns:[]};var C=a("VU/8")({name:"category",data:function(){return{info:{name:"四川农业大学",watch:20,topic:30,id:123},activeName:"n1",items:{comment:{title:"",reply:"",author:""},good:{},latest:{}}}},mounted:function(){var t=this;this.info.id=this.$route.params.id,this.$axios.request({url:"/index/column/get?id="+this.info.id}).then(function(e){t.info.name=e.data.data.group_name}),this.loadComment(1,10)},methods:{loadComment:function(t,e){var a=this;this.$axios.request({url:"/index/topics/index?gid="+this.info.id+"&page="+t+"&limit="+e}).then(function(t){a.items.comment=t.data.data})}}},b,!1,function(t){a("w2Ka")},"data-v-fe42f5ec",null).exports;i.default.use(o.a);var k=new o.a({routes:[{path:"/",name:"index",component:r},{path:"/topics/:id",name:"topics",component:_},{path:"/publish",name:"publish",component:y},{path:"/user",name:"user",component:x},{path:"/list/:id",name:"category",component:C}]}),S=a("zL8q"),w=a.n(S),$=(a("tvR6"),a("Iufj")),q=a.n($);i.default.prototype.$axios=p.a,p.a.defaults.baseURL="/",p.a.defaults.headers.post["Content-Type"]="application/json",i.default.config.productionTip=!1,p.a.defaults.withCredentials=!0,i.default.use(w.a),i.default.use(q.a,p.a),new i.default({el:"#app",router:k,components:{App:s},template:"<App/>"})},bmYs:function(t,e){},fm5j:function(t,e){},oTFt:function(t,e){},tvR6:function(t,e){},"v/ij":function(t,e){},v1Fy:function(t,e){},w2Ka:function(t,e){},xrAB:function(t,e){}},["NHnr"]);
//# sourceMappingURL=app.8e35f6b44ec3a62fe29b.js.map