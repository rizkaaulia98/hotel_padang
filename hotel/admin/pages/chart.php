<?php

$username = $_SESSION['username'];
// include('analyticstracking.php');

?>

<style>
#tabbed_box {
    margin: 0px auto 0px auto;
    width:300px;
}
.tabbed_area {
    border:1px solid #494e52;
    background-color:white;
    padding:8px;
}
ul.tabs {
    margin:0px; padding:0px;
}
ul.tabs li {
    list-style:none;
    display:inline;
}
ul.tabs li a {
    background-color:#464c54;
    color:#ffebb5;
    padding:8px 14px 8px 14px;
    text-decoration:none;
    font-size:9px;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-weight:bold;
    text-transform:uppercase;
    border:1px solid #464c54;
}
ul.tabs li a:hover {
    background-color:#2f343a;
    border-color:#2f343a;
}
ul.tabs li a.active {
    background-color:#ffffff;
    color:#282e32;
    border:1px solid #464c54;
    border-bottom: 1px solid #ffffff;
}
.content {
    background-color:#ffffff;
    padding:10px;
    border:1px solid #464c54;
}
#content_2, #content_3 { display:none; }

ul.tabs {
    margin:0px; padding:0px;
    margin-top:5px;
    margin-bottom:6px;
}
.content ul {
    margin:0px;
    padding:0px 20px 0px 20px;
}
.content ul li {
    list-style:none;
    border-bottom:1px solid #d6dde0;
    padding-top:15px;
    padding-bottom:15px;
    font-size:13px;
}
.content ul li a {
    text-decoration:none;
    color:#3e4346;
}
.content ul li a small {
    color:#8b959c;
    font-size:9px;
    text-transform:uppercase;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    position:relative;
    left:4px;
    top:0px;
}
.content ul li:last-child {
    border-bottom:none;
}
ul.tabs li a {
    background-repeat:repeat-x;
    background-position:bottom;
}
ul.tabs li a.active {
    background-repeat:repeat-x;
    background-position:top;
}
.content {
    background-repeat:repeat-x;
    background-position:bottom;
}
</style>


<div class="col-sm-12">  <!-- menampilkan list hotel-->
   <section class="panel">
         <center>
           <b><h3>WEB TRAFFIC CHART</h3></b>
         </center>
       <div class="panel-body">

         <div class="col-sm-12">
         <div class="w3-container">
           <div class="w3-bar w3-black">
             <button class="w3-bar-item w3-button tablink w3-teal" onclick="openCity(event,'User')">User Traffict</button>
             <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Interest')">User Interest</button>
             <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Region')">Region</button>
             <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Transaction')">Number Of Transaction</button>
           </div>
           <div id="User" class="w3-container w3-border chart">
             <br><p style="background-color: lightgrey; width:auto;">This shows how many users that visit the website in the past week</p><br>
             <iframe width="600" height="371" seamless frameborder="2" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTqpwIH8fVepGxFWOswCR903iL5rhyR_VT5HSL94oRfKt2s5rVO0eqrXwTNn7JpHeE7MhDeAEFxZlxW/pubchart?oid=1018492632&amp;format=interactive"></iframe>
           </div>

           <div id="Interest" class="w3-container w3-border chart" style="display:none">
             <br><p style="background-color: lightgrey; width:auto;">This count how many users that visit the specific hotel page in the past week</p><br>
             <iframe width="600" height="371" seamless frameborder="2" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRutH6ScqllsXquQEPDB2q6ZoCdwths-WIv6P_oT0KebfvkHTZRWl8Z8XXsuWyzB14rdf2zC-T88ejA/pubchart?oid=1603367294&amp;format=interactive"></iframe>
           </div>

           <div id="Region" class="w3-container w3-border chart" style="display:none">
             <br><p style="background-color: lightgrey; width:auto;">Showing and counting which region in Indonesia that visited the page in the past month </p><br>
             <iframe width="600" height="371" seamless frameborder="2" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSsHak4IN3mC8zdQjdhS0tD_oVz6yUOxkQmhZzgRUSxGKWCuCH3iy3yk4NOmJC4tDYskVJGral2jFUJ/pubchart?oid=452366908&amp;format=interactive"></iframe>
           </div>
           <div id="Transaction" class="w3-container w3-border chart" style="display:none">
             <br><p style="background-color: lightgrey; width:auto;">Displaying the numbers of transaction that happened in the past week</p><br>
             <iframe width="600" height="371" seamless frameborder="2" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQNtsRNAkrsDSJtfS_T7m699Hc2nFmahxp_Yt_ZJ5U4v9fzowi5zpymHpIq2tIFEusi8GZeLenaMzPK/pubchart?oid=62305915&amp;format=interactive"></iframe>
           </div>
         </div>
       </div>
    </div>
   </section>
</div>

<script>
// function tabSwitch(new_tab, new_content) {
//
//     document.getElementById('content_1').style.display = 'none';
//     document.getElementById('content_2').style.display = 'none';
//     document.getElementById('content_3').style.display = 'none';
//     document.getElementById('content_4').style.display = 'none';
//
//     document.getElementById(new_content).style.display = 'block';
//
//
//     document.getElementById('tab_1').className = '';
//     document.getElementById('tab_2').className = '';
//     document.getElementById('tab_3').className = '';
//     document.getElementById('tab_5').className = '';
//
//     document.getElementById(new_tab).className = 'active';
//
// }

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("chart");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-teal", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-teal";
}
</script>

<!-- <script>
    (function(w,d,s,g,js,fs){
    g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
    js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
    js.src='https://apis.google.com/js/platform.js';
    fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
    }(window,document,'script'));
</script> -->
