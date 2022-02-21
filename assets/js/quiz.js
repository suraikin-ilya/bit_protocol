const starGroups = document.getElementsByClassName("star-rating__group");
for(let number = 0; number < starGroups.length; number++) {
    starGroups[number].querySelectorAll(".star-rating__img").forEach( (elem, index) => {
        elem.addEventListener("click", () => {
            for(let i = 0; i <= index; i++) {
                starGroups[number].querySelectorAll(".star-rating__img")[i].src = "assets/img/star_active.svg";
                document.querySelectorAll(".star-rating__value")[number].value = i + 1;
            }
            for(let j = index+1; j < 5; j++) {
                starGroups[number].querySelectorAll(".star-rating__img")[j].src = "assets/img/star.svg";
            }

        });
    });

}