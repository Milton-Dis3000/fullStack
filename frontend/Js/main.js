const toggleBar=document.getElementById("toggleBar");

const liToggle = document.querySelector("nav > ul ");
console.log(liToggle);

liToggle.addEventListener("click", ()=>{
    toggleBar.classList.toggle("active");
})