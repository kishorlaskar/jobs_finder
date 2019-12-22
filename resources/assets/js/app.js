 


require('./bootstrap');

window.Vue = require('vue');

var Vue = require('vue');
var VueResource = require('vue-resource');
Vue.use(VueResource);

Vue.component('example-component', require('./components/Example.vue'));
Vue.component('message-section', require('./components/MessageSection.vue'));


//Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
//Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;



const app = new Vue({
    el: '#app',
    data :{
    	message:[],
        userinfos:[],
        sending_data:[],
        abc:[],
        companyname_or_firstname:'',
        lastname:'',
        test:[]
    	//message:[{'name':'mokbul','id':123},{'name':'anik','id':555}],
    },
    created(){this.fetchdata();},
    methods:{
    	fetchdata(){
        this.$http.get("messanger_data").then( response => { this.message = response.data.user_data,this.userinfos = response.data.sendind_data});
    	},
        goto_route:function(param1,firstnameorcompanyname,lastname='') {

    /*  axios
      .get('/jobseeker/messanger/'+param1)
      .then(response => {
        this.abc = response.data
      });*/
      this.companyname_or_firstname=firstnameorcompanyname;
       this.lastname=lastname;
       this.$http.get('/jobseeker/messanger/'+param1).then( response => { this.sending_data = response.data.sending_data, this.abc = response.data.messaging_data});
       //if (empty(sending_data)) {this.sending_data=null;}
       
    },
    goto_jobholder_route:function(param1,firstnameorcompanyname,lastname='') {
      this.test=[];
      this.companyname_or_firstname=firstnameorcompanyname;
       this.lastname=lastname;
       this.$http.get('/jobholder/messanger/'+param1).then( response => { this.sending_data = response.data.sending_data, this.abc = response.data.messaging_data});
      for ( var item in this.sending_data ){
       this.test.push( this.sending_data[item]['message'] );
        }
        this.sending_data =[];
    }
    },

    
});
