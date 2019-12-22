<html>
    <head>
        <script src="jquery-3.2.0.min.js" type="text/javascript"></script>
        <script>
        $(document).ready(function(){
            setInterval(function(){
                $('#time').load('time.php')
            },1000);
        });
        </script>
        <style>
        @font-face{
        font-family:clock;
        src : url("font/DIGITALDREAMFAT.ttf");
        }
            #time{
                margin-left: 20%;
                margin-top: 10%;
                width: 80%;
                height: 50%;
                font-size: 36px;
                color:darkblue;
                font-family: clock;
            }
            </style>
    </head>
    <body>
        <div id="time">
            00 : 00 : 00 PM
        </div>
    </body>
</html>