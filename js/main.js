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