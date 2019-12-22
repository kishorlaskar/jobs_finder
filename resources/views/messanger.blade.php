@extends('layout.master')

@section('title') Messanger @endsection

@section('aside_bar')
        <aside>
   <ul style="list-style: none;background-color: #F8F8F8" v-for="userinfo in userinfos">    
       <li>


          <a style="text-decoration: none" v-if="userinfo.hasOwnProperty('firstname') == false " v-on:click="goto_route(userinfo.username,userinfo.company_name)">
        	<div style="width: 100%; height: 65px;">
        		<div style="width: 20%;float: left;">
        		<img style="border-radius: 50%; width: 50px; height: 50px;" src="{{url('image/skill-candidate.jpg')}}">
        		</div>
        		<div style="float: left;width: 80%;overflow: hidden;">
        	   <p style="color: black;">@{{userinfo.company_name}}</p>
        	   <p style="margin-top:-10px; ">@{{userinfo.message}}</p>
        	   </div>
           </div>
           </a>


            <a style="text-decoration: none" v-else="userinfo.hasOwnProperty('firstname') == false "  v-on:click="goto_jobholder_route(userinfo.jobseekeremail,userinfo.firstname,userinfo.lastname)">
              <div style="width: 100%; height: 65px;">
            <div style="width: 20%;float: left;">
            <img style="border-radius: 50%; width: 50px; height: 50px;" src="{{url('image/skill-candidate.jpg')}}">
            </div>
            <div style="float: left;width: 80%;overflow: hidden;">
             <p style="color: black;">@{{userinfo.firstname}} @{{userinfo.lastname}}</p>
             <p style="margin-top:-10px; ">@{{userinfo.message}}</p>
             </div>
           </div>
            </a>


        </li>
        
    </ul>
</aside>

@endsection 

@section('message_section')
<div style="color:#0084FF;text-align:center;margin-top: 10px;">@{{companyname_or_firstname}} @{{lastname}}</div>
 <message-section v-for="message in abc" :message="message.message" :key="message.message" :sending_data="test" :companyname_or_firstname="companyname_or_firstname" :lastname="lastname"></message-section>
@endsection