var searchButtonElement = $("#searchButton");
var clearInputElement = $("#clearInput");
var querytElement = $("input[name=query]");

function closeClearButton() {
  clearInputElement.hide();
  searchButtonElement.show();
  querytElement.val("");
  querytElement.focus();
}

// Detects whether field is changed to determine which buttons appear
querytElement.keyup(function() {
  clearInputElement.hide();
  searchButtonElement.show();
});

clearInputElement.click(closeClearButton);

var products_price = $(".product--price");
$(products_price).each(function(index) {
  var price = $(this).data("price");
  $(this).text(
    price.toLocaleString("pt-BR", {
      style: "currency",
      currency: "BRL"
    })
  );
});

// Initialize Swiper
var swiper = new Swiper(".swiper-container", {
  slidesPerView: 5,
  spaceBetween: 5,
  breakpoints: {
    1440: {
      slidesPerView: 3,
      spaceBetween: 30
    },
    1024: {
      slidesPerView: 2,
      centeredSlides: true,
      spaceBetween: 30
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30
    },
    640: {
      slidesPerView: 1.5,
      spaceBetween: 5
    },
    320: {
      slidesPerView: 1.5,
      spaceBetween: 3
    }
  }
});
