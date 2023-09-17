<?php
session_start();

include("Connect.php");
include("Functions.php");
?>

<style>
/*Styling for index page*/
#button1con 
{
    text-align: center;
}
#button2con
{
    text-align: center;
}
#sidebar1
{
    border: 2px solid black;
    background: #6c6c6c;
    width: 20%;
    height: 72%;
    line-height: 23px;
    text-align: center;
}
#sidebar2
{
    border: 2px solid black;
    background: #6c6c6c;
    width: 20%;
    height: 72%;
    line-height: 23px;
    text-align: center;
}
#footer
{
  border: 2px solid black;
  background: #6c6c6c;
  position: fixed;
  bottom: 0;
  left: 21%;
  height: 14%;
  width: 58%;
}
</style>    

<!DOCTYPE html>
<html>
    <!--Front landing page for the web application-->
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Login</title> <!--Index page title-->
    </head>
    <body>
    <h1>Welcome to Thermopile Contactless Fever and Fall Detection</h1>

        <div style="float:left" id="sidebar1">
            <h2 style="text-align:center">The Mission Statement</h2>
            <br>
            <text> 
                With the advancement of technology in the medical field and better health care practices in Canada; Canada has seen a rise in the senior population, and this trend will continue in the future. Knowing that the senior population keeps rising we must be as prepared as there are not enough personal support workers. A problem emerges as there aren’t enough PSW’s so as the population expands, each citizen won’t get the support they need. The answer to this is to automate certain duties performed by PSWs. One important duty of PSWs is consistently checking in with the senior citizens since you can not know when something will happen, one such instance is when a senior citizen falls. Falling is already a danger to any age group but for age groups like senior citizens, it could be life-threatening. For this issue, we propose a motion detection and tracking solution. Using advanced algorithms a camera can be placed in various places throughout the retirement home to detect a fall and alert the corresponding person in case of a fall. Along with this, it is important to constantly monitor the senior’s health such as their temperature. For this, we implement a thermopile that will be enhanced to detect infrared energy to capture the senior’s temperature at any time and send such information to the PSWs. Our solution has real-world application and can be easily expanded to cover more tasks.
            </text>
        </div>
        <div style="float:right" id="sidebar2">
            <h2 style="text-align:center">The Mission Statement</h2>
            <br>
            <text> 
                With the advancement of technology in the medical field and better health care practices in Canada; Canada has seen a rise in the senior population, and this trend will continue in the future. Knowing that the senior population keeps rising we must be as prepared as there are not enough personal support workers. A problem emerges as there aren’t enough PSW’s so as the population expands, each citizen won’t get the support they need. The answer to this is to automate certain duties performed by PSWs. One important duty of PSWs is consistently checking in with the senior citizens since you can not know when something will happen, one such instance is when a senior citizen falls. Falling is already a danger to any age group but for age groups like senior citizens, it could be life-threatening. For this issue, we propose a motion detection and tracking solution. Using advanced algorithms a camera can be placed in various places throughout the retirement home to detect a fall and alert the corresponding person in case of a fall. Along with this, it is important to constantly monitor the senior’s health such as their temperature. For this, we implement a thermopile that will be enhanced to detect infrared energy to capture the senior’s temperature at any time and send such information to the PSWs. Our solution has real-world application and can be easily expanded to cover more tasks.
            </text>
        </div>
        <div class="index-form"> 
            <form method="post">

                <div id="button1con">
                <p>If you already have an account</P>
                <button type="button" onclick="window.location.href='Login.php'"> Login </button> <!--User can go to login page-->
                </div>
        
                <br><br><br>

                <div id="button2con">
                <p>If you would like to make an account</p>
                <button type="button" onclick="window.location.href='Register.php'"> Register </button> <!--User can go to registration page-->
                </div>
            </form>
        </div>
        <div id="footer">
            <h3 style="text-align:center">The Team Members Involved</h3>
            <br>
            <text>Shane Davey 0885534: Lakehead University Faculty of Software Engineering scdavey@lakeheadu.ca</text>
            <br> <br>
            <text>Angel Martinez 0882475: Lakehead University Faculty of Software Engineering aamarti1@lakeheadu.ca</text>
            <br> <br>
            <text>Chris Silver 0877675: Lakehead University Faculty of Software Engineering crsilver@lakeheadu.ca</text>
        <div>
    </body>
</html>