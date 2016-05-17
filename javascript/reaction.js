var clickedTime; var createTime; var reactionTime;
var randomX=50; var randomY=10;
var colors=["red","green","blue","yellow","purple"];
function makeBox(){

var random=Math.floor(Math.random()*5);
var randomX=Math.floor(Math.random()*800)
var randomY=Math.floor(Math.random()*400)
setTimeout(function(){
 if (random<3){
 document.getElementById('box1').style.borderRadius="50px";
  } else{
 document.getElementById('box1').style.borderRadius="0";
            }
 document.getElementById('box1').style.display="block";
 document.getElementById('box1').style.backgroundColor=colors[random];
 document.getElementById('box1').style.left=randomX+"px";
 document.getElementById('box1').style.top=randomY+"px";

 createTime=Date.now();
},random)

}
document.getElementById('box1').onclick= function (){
 clickedTime=Date.now();
 reactionTime=(clickedTime-createTime)/1000;
 document.getElementById("yourTime").innerHTML=reactionTime;
 this.style.display="none";
 makeBox();
}
 makeBox();
