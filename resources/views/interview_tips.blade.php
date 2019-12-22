
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="_token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <title>Final Year Project</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="favicon.icon">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/style2.css')}}">

        <script src="{{url('js/jquery-3.1.1.min.js')}}"></script>
       <script src="{{url('js/bootstrap.min.js')}}"></script>
        <link rel="shortcut icon" type="image/x-icon" href="{{url('image/../image/logo.png')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet"> 
         <style type="text/css">
             .modal-body button{
                     background:none;
                     border:none;
                     margin-top: 10px;
             }
         </style>
    </head>

    <body>
        @if(Session::has('jobseeker_email'))
          @include('layout.auth_jobseeker_header');
      @elseif(Session::has('jobholder_username'))
          @include ('layout.auth_jobholder_header');
      @else
        @include('layout.all_user_header');
      @endif
    <div class="container">
    	<div class="row">
    	<h1>>>>What is self-development, why need and where to do?</h1>
    	<pre style="background-color: white ; border: none; font-size: 16px;overflow-x: scroll;">
Self-development is the development of self-improvement. It may be due to physical development, mental development, development of knowledge, development of professional skills, health development, social status development, development of emotional intelligence and much more.
Now I need to know how I will do this development. First of all, for a good self-development, there is nothing to catch the guru at the beginning but if you can get it as a mentor then take it for a second time without worrying. But again, if there is no reason to be afraid of not receiving a mentor, because of development itself, it becomes itself, there is a great world of its mentor and the Internet.
Let's start by discussing what can be done to improve professional skills-
First of all ask yourself what you can and cannot do. It does not have to be cautious to write as little or as big a thing as possible.
You can say more about the problem, write down the problem, you can write down the hard work, or write down the words that you can laugh at your words.
Then begin to think about what can be used as useful, and how can it be acquired. Keep in mind that thoughts do not go away from the thought of living forever.
Now let's discuss some important things so that your attention must be given-

1. Ask yourself whether you can speak in correct Bengali. (Standard pronunciation in correct pronunciation.)

2. Measure how much your skill in the English language is today.

3. The computer should be out of the idea that only the music is used to listen or listen to music or movies, there are many more uses.

4. In addition to writing ABCD with Microsoft Word, more work can be done today, try to learn about it today, because tomorrow does not come tomorrow.

5. Start with today's effort to learn more about the addition of Microsoft Excel to students result and additionally minus. (I can believe that there is a lot of other things, including Volume up, Yellow works, If Function, Pivot Tables, Data Chart, and which will give you excel startup to give Excel a novel.)

6. Internet is not Facebook and YouTube, the Internet world is much bigger. Bring it to your own hands. (Looking for the CV format Google will get a lot of formats, you will get the search tips, find excel tips, and get tips for your own development, and you just want to understand what you want.

7. Meditate can take control of your inner anger, hardships, pride, despair, and so much more, to take control of yourself, this is really an extraordinary power.

8. Take a look at how beautiful you can present yourself. (Do not say no to go to the messenger, give him a job, without screaming, how to get help for the job, try to understand from the seniors.)

9. Networking. Facebook is simply a place of entertainment, it is totally wrong. At present, people from all walks of life, even the Prime Minister of the country, from 10 years of age to your home are found in Facebook. So Facebook can be a unique medium for networking. Use your professional interest to communicate with Facebook and your favorite career people.

10. I know all about forgetting it and creating an interest in learning about new things. Everyone will not know everything, this is normal. Not knowing is not a sin, but trying to get to know the opportunity to get to know is sin. You can learn something new from anyone. Even if he is younger or at a young age, there is no harm.

11. Being positive on the way to building a good career is very important. Get out of your inner negativity.

12. Remember that there is no precious time in life after life in the world. So be careful about the right use of time. Ask yourself if you are wasting time unnecessarily.

13. Get ready to adapt yourself to the world, changing the world every day.

14. I cannot and will not let me out of this thought. You can also do any of the blood's blood that you can try on the right path.

15. Learn to laugh and talk positively or to write. Give jobs, learn to say no to it I can take some of your precious time to learn something from you.

16. Be aware of clothing selection. Clothing represents your choice.

17. Take control of the food and do some physical exercises every day. Exercise does not necessarily have to be admitted in the gym. Take a look at the easy-to-use exercise at home.

18. Tobacco or any other addiction creates a lot of obstacles in the form of carrier. As well as physical harm is happening. Avoid these practices as soon as possible.

19. The last thing you want to say is the most important, learn to love yourself.

    	</pre>
    	</div>
    </div>
    
</body>
<script type="text/javascript">
// The callback=? parameter is our jsonp callback function - required for x-domain calls
$.getJSON("http://speech.jtalkplugin.com/api/?callback=?", {speech: "Hello World", usecache: "false" },
function(json) {
  if (json.success == true){
    // Success - perform your audio operations here
    var audiofile = json.data.url;
  } else {
    // Failure
    alert("Error:" + json.msg);
  }
});
</script>>
</html>