const navbar=document.querySelector(".navbar");
const icon=document.querySelector(".icon");
const icon2=document.querySelector(".icon2");


const CHfavorits=document.querySelector(".CHF");
const favorits=document.querySelectorAll(".Favourits");

const CHpreviousR=document.querySelector(".CHPr");
const previousR=document.querySelectorAll(".PreviousRents");

const CHposts=document.querySelector(".CHPo");
const posts=document.querySelectorAll(".posts");

const preRent=document.querySelectorAll(".preRent");
const post=document.querySelectorAll(".post")

icon.addEventListener("click",function (event){
    
        navbar.style.display="flex";
        icon2.style.display="block";
    
});

icon2.addEventListener("click",function (event){
    
    navbar.style.display="none";
    
});

if(CHfavorits.style.backgroundColor=="rgba(142, 205, 221, 1)"){
    for(let i=0;i<3;i++){
   preRent[i].style.display="none";
    post[i].style.display="none";}
}
CHpreviousR.addEventListener("click",function (event){
    for(let i=0;i<3;i++){
        previousR[i].style.display="flex";
        CHpreviousR.style.backgroundColor="rgba(142, 205, 221, 1)";
        CHposts.style.backgroundColor="rgba(255, 250, 221, 1)";
        CHfavorits.style.backgroundColor="rgba(255, 250, 221, 1)";
        favorits[i].style.display="none";
        posts[i].style.display="none";}
});

CHposts.addEventListener("click",function (event){
    for(let i=0;i<3;i++){
        previousR[i].style.display="none";
        CHpreviousR.style.backgroundColor="rgba(255, 250, 221, 1)";
        CHposts.style.backgroundColor="rgba(142, 205, 221, 1)";
        CHfavorits.style.backgroundColor="rgba(255, 250, 221, 1)";
     favorits[i].style.display="none";
     posts[i].style.display="flex";}
});

CHfavorits.addEventListener("click",function (event){
    for(let i=0;i<3;i++){
        CHpreviousR.style.backgroundColor="rgba(255, 250, 221, 1)";
        CHposts.style.backgroundColor="rgba(255, 250, 221, 1)";
        CHfavorits.style.backgroundColor="rgba(142, 205, 221, 1)";
    previousR[i].style.display="none";
 favorits[i].style.display="flex";
 posts[i].style.display="none";}
});