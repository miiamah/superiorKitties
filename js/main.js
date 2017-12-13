// Get the modal
const modal = document.getElementById('myModal');

const lomake = document.getElementById('komlomake');

const kommentoi = (evt) => {
  evt.preventDefault();
  const data = new FormData(lomake);
  const settings = {
    method: 'POST',
    body: data
  };
  fetch('kommentoi.php', settings).then((response) => {
    return response.text();
  }).then((text) => {
    // kommentin lisäämisen jälkeen
    console.log(text);
  });
};

lomake.addEventListener('submit', kommentoi);

const tykkaa = (evt) => {
  const kuvaid = evt.currentTarget.dataset.kid;
  fetch('tykkaa.php?kid='+kuvaid).then().then();
};

// Get the image and insert it inside the modal - use its "alt" text as a caption
const imgList = document.querySelectorAll('.myImg');
const modalImg = document.querySelector("#img01");
const captionText = document.getElementById("caption");
imgList.forEach( (img) => {
  img.addEventListener('click', function(){
    console.log('klikattu');
    modal.style.display = "block";
    const newSrc = img.src;
    modalImg.src = newSrc;
    captionText.innerHTML = this.alt;
    modal.querySelector('button').addEventListener('click', tykkaa);
  });
});


// Get the <span> element that closes the modal
const span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

// ------------------------------------------------------------------------------- //