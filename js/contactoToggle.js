/*window.onscroll= scrollListener;
const enlaces = document.querySelectorAll(".enlaces-flotantes");
function scrollListener() {
    let scrollPosition = document.body.scrollTop || document.documentElement.scrollTop;

    let maxHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let totalScrolled = scrollPosition / maxHeight *100;
    if(totalScrolled > 82){
        enlaces.forEach(element => {
            element.style.display = 'none';
            element.style.transition = 'all 0.5s ease-in-out';
        });
    }else{
        enlaces.forEach(element => {
            element.style.display = 'block';
            element.style.transition = 'all 0.5s ease-in-out';
        });
    }
} */