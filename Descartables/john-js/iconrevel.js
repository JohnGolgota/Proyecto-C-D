let iconos = window.addEventListener("scroll", function () {

  let banner = document.getElementById("bannerS");

  let distanciaBanner = banner.getBoundingClientRect().top;

  let logos = document.querySelectorAll(".sacar-derecha")[0];

  if (distanciaBanner < 0) {
    logos.classList.add("sacar")
  }
  else {
    logos.classList.remove("sacar")
  }
}
)
