const frame = document.querySelector("section");
const lists = frame.querySelectorAll("article");
const prev = document.querySelector(".btnPrev");
const next = document.querySelector(".btnNext");
const deg = 45;
const len = lists.length-1;

let i = 0;
let num = 0;
let active = 0; 

function activation(index, lists){
    for( let el of lists){
        el.classList.remove("on");
    }
    lists[index].classList.add("on");
}

for(let el of lists) {
    el.style.transform = `rotate(${deg* i}deg) translateY(-100vh)`;
    i++;
}

prev.addEventListener("click", ()=>{
    //num값을 증가시키며 frame 45도 만큼 증가시키며 시계 방향으로 계속 회전
    num++;  
    frame.style.transform = `rotate(${deg* num}deg)`;

    (active == 0 ) ? active = len : active--;
    activation(active, lists);    
});

next.addEventListener("click", ()=>{
    //num값을 감소시키며 frame을 45도 만큼 감소시키며 반시계 방향으로 회전
    num--;   
    frame.style.transform = `rotate(${deg* num}deg)`;
    
    
    (active == len ) ? active = 0 : active++; 
    activation(active, lists);
});