// menu active

// 현재 페이지 URL을 가져오는 함수
function getCurrentUrl() {
    var url = window.location.pathname;
    return url;
  }
  
  // 메뉴 아이템의 링크 URL과 현재 페이지 URL이 일치하는 경우, 해당 메뉴 아이템에 active 클래스를 추가하는 함수
  function setActiveMenu() {
    var currentUrl = getCurrentUrl();
    var menuItems = document.querySelectorAll('.navbar_item a');
    menuItems.forEach(function(menuItem) {
      if (menuItem.getAttribute('href') === currentUrl) {
        menuItem.parentElement.classList.add('active');
      }
    });
  }
  
  // setActiveMenu 함수를 호출하여 현재 페이지에 대한 메뉴 아이템 활성화
  setActiveMenu();
  



// responsive menu

const navbarMenu = document.getElementById("navbar");
const burgerMenu = document.getElementById("burger");
const overlayMenu = document.querySelector(".overlay");


const toggleMenu = () => {
    navbarMenu.classList.toggle("active");
    overlayMenu.classList.toggle("active");
};


const collapseSubMenu = () => {
    navbarMenu
        .querySelector(".menu-dropdown.active .submenu")
        .removeAttribute("style");
    navbarMenu.querySelector(".menu-dropdown.active").classList.remove("active");
};


const toggleSubMenu = (e) => {
    if (e.target.hasAttribute("data-toggle") && window.innerWidth <= 992) {
        e.preventDefault();
        const menuDropdown = e.target.parentElement;

        // If Dropdown is Expanded, then Collapse It
        if (menuDropdown.classList.contains("active")) {
            collapseSubMenu();
        } else {
            // Collapse Existing Expanded Dropdown
            if (navbarMenu.querySelector(".menu-dropdown.active")) {
                collapseSubMenu();
            }

            // Expanded the New Dropdown
            menuDropdown.classList.add("active");
            const subMenu = menuDropdown.querySelector(".submenu");
            subMenu.style.maxHeight = subMenu.scrollHeight + "px";
        }
    }
};


const resizeWindow = () => {
    if (window.innerWidth > 992) {
        if (navbarMenu.classList.contains("active")) {
            toggleMenu();
        }
        if (navbarMenu.querySelector(".menu-dropdown.active")) {
            collapseSubMenu();
        }
    }
};

// Initialize Event Listeners
burgerMenu.addEventListener("click", toggleMenu);
overlayMenu.addEventListener("click", toggleMenu);
navbarMenu.addEventListener("click", toggleSubMenu);
window.addEventListener("resize", resizeWindow);


// top scroll

var btn = $('.top_scroll');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});



// navbar scroll fixed
var navBar = $(".navbar_wrapper");
var hdrHeight = $(".header_top").height();


$(window).scroll(function() {
  if( $(this).scrollTop() > hdrHeight + 58) {
    navBar.addClass("navScrolled");
  } else {
    navBar.removeClass("navScrolled");
  }
});

// tab

const tabItem = document.querySelectorAll(".tab-container__item");
const tabContent = document.querySelectorAll(".content-container__content");

tabItem.forEach((item) => {
  item.addEventListener("click", tabHandler);
});

function tabHandler(item) {
  const tabTarget = item.currentTarget;
  const target = tabTarget.dataset.tab;
  tabItem.forEach((title) => {
    title.classList.remove("active");
  });
  tabContent.forEach((target) => {
    target.classList.remove("target");
  });
  document.querySelector("#" + target).classList.add("target");
  tabTarget.classList.add("active");
}


// 결합정보 tab
$(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})


const priceLists = document.querySelectorAll('.price_view .price_list');
const homePriceLists = document.querySelectorAll('.price_view_home .price_list');
const combinationSpan = document.querySelector('.combination_span');
const infoContentTitle = document.querySelector('.info_content_title h2');
const productMonthPriceTb = document.querySelector('#product_month_price_tb');

// 1번: price_view와 price_view_home에서 하나씩 선택했을 때 product_month_price_tb 첫번째 td 바꾸기
// priceLists.forEach((priceList, index) => {
//   priceList.addEventListener('click', () => {
//     const selectedPrice = priceList.textContent.trim();
//     const selectedHomePrice = homePriceLists[index].textContent.trim();
//     combinationSpan.textContent = `${selectedPrice} - ${selectedHomePrice}`;
//     const firstTds = productMonthPriceTb.querySelectorAll('tr td:first-child');
//     firstTds.forEach((td) => {
//       td.textContent = `${selectedPrice} ${td.textContent.split(' ')[1]}`;
//     });
//   });
// });

// 2번: price_view와 price_view_home에서 하나씩 선택했을 때 info_content_title 바꾸기
// homePriceLists.forEach((priceList, index) => {
//   priceList.addEventListener('click', () => {
//     const selectedHomePrice = priceList.textContent.trim();
//     const selectedPrice = priceLists[index].textContent.trim();
//     combinationSpan.textContent = `${selectedPrice} - ${selectedHomePrice}`;
//     infoContentTitle.textContent = `이용중인 SKT휴대폰이 없을실 때(${selectedPrice})`;
//   });
// });

// 3번: combination_span 안에 선택한 price_view와 price_view_home의 price_list 텍스트 넣기
priceLists.forEach((priceList, index) => {
  priceList.addEventListener('click', () => {
    const selectedPrice = priceList.textContent.trim();
    const selectedHomePrice = homePriceLists[index].textContent.trim();
    combinationSpan.textContent = `${selectedPrice} - ${selectedHomePrice}`;
  });
});

homePriceLists.forEach((priceList, index) => {
  priceList.addEventListener('click', () => {
    const selectedHomePrice = priceList.textContent.trim();
    const selectedPrice = priceLists[index].textContent.trim();
    combinationSpan.textContent = `${selectedPrice} - ${selectedHomePrice}`;
  });
});



// 선택시 border change
const priceViewList = document.querySelectorAll('.price_view li');
for (let i = 0; i < priceViewList.length; i++) {
  priceViewList[i].addEventListener('click', function() {
    for (let j = 0; j < priceViewList.length; j++) {
      if (priceViewList[j] !== this) {
        priceViewList[j].classList.remove('selected');
      }
    }
    this.classList.add('selected');
  });
}


const priceViewHomeList = document.querySelectorAll('.price_view_home li');
for (let i = 0; i < priceViewHomeList.length; i++) {
  priceViewHomeList[i].addEventListener('click', function() {
    for (let j = 0; j < priceViewHomeList.length; j++) {
      if (priceViewHomeList[j] !== this) {
        priceViewHomeList[j].classList.remove('selected');
      }
    }
    this.classList.add('selected');
  });
}
