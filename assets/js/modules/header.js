jQuery(document).ready(($) => {
  const menuModal = $('#mobile-menu-modal');
  const menuOpener = $('#mobile-menu-modal-open');
  if (!menuModal || !menuOpener)
    return;
  $(menuOpener).on('click', function (e) {
    $(menuModal).addClass('active');
    $(document.body).css('overflow', 'hidden');
  });
  $('header [data-close="close"]').on('click', function (e) {
    const target = e.target;
    if ($(target).attr('data-close') != 'close')
      return;
    $(menuModal).removeClass('active');
    $(document.body).attr('style', '');
  });
});
const opentab = document.querySelectorAll(".mobile-menu-nav li ");
opentab.forEach((elem) => {
  elem.addEventListener("click", () => {
    elem.classList.toggle("active");
  });
});
