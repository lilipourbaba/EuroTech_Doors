import { cynActivate } from "./custom-events";

export const deActivateEl = (nodeEl) => {
  nodeEl.setAttribute("data-active", "false");
  nodeEl.dispatchEvent(cynActivate);
};

export const activateEl = (nodeEl) => {
  nodeEl.setAttribute("data-active", "true");
  nodeEl.dispatchEvent(cynActivate);
};

export const toggleActivateEl = (nodeEl) => {
  const current = nodeEl.getAttribute("data-active");

  if (current === "false" || !current) {
    activateEl(nodeEl);
    return;
  }

  deActivateEl(nodeEl);
};

export const deActivateAll = (parentNode) => {
  parentNode.forEach((node) => {
    deActivateEl(node);
  });
};

export const activateAll = (parentNode) => {
  parentNode.forEach((node) => {
    activateEl(node);
  });
};

export const activateFirstEl = (parentNode) => {
  activateEl(parentNode[0]);
};

export const addListener = (elementNode, eventType, func) => {
  if (elementNode.getAttribute("hasListener")) return;
  elementNode.setAttribute("hasListener", true);
  elementNode.addEventListener(eventType, func);
};

export const definePopUp = (nodeEl) => {
  nodeEl.addEventListener("cynActivate", (e) => {
    if (e.target != nodeEl) return;
    document.body.setAttribute("data-popup-open", e.target.dataset.active);
  });

  nodeEl.addEventListener("click", (e) => {
    if (e.target != nodeEl) return;
    deActivateEl(nodeEl);
  });
};

export const setUserIP = () => {
  jQuery(($) => {
    $.getJSON("https://api.ipify.org?format=json", ({ ip }) => {
      window.localStorage.setItem("user-ip", ip);
    });
  });
};

export const getUserIp = () => window.localStorage.getItem("user-ip");

export const setCookie = (cookieName, cookieValue, expireDays) => {
  const d = new Date();
  d.setTime(d.getTime() + expireDays * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  document.cookie =
    cookieName + "=" + JSON.stringify(cookieValue) + ";" + expires + ";path=/";
};

export const getCookie = (cookieName) => {
  let name = cookieName + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return JSON.parse(c.substring(name.length, c.length));
    }
  }
  return JSON.parse("{}");
};

export const showMassage = (status, parentEl, innerText = null) => {
  const span = document.createElement("span");
  span.classList.add("message");
  span.classList.add(status);

  if (status === "success") {
    span.innerText = innerText ?? "mission accomplished";
    return;
  }

  if (status === "warning") {
    span.innerText = innerText ?? "The operation is waiting for admin approval";
    return;
  }

  if (status === "error") {
    span.innerText = innerText ?? "The operation encountered an error";
    return;
  }

  parentEl.appendChild(span);
};

export const changeButtonStatus = (status, btn) => {
  if (status === "pending") {
    btn.classList.add("pending");
    btn.innerText = translateStrings.Btn.pending;
    return;
  }

  if (status === "success") {
    btn.classList.remove("pending");
    btn.classList.add("success");
    btn.innerText = translateStrings.Btn.success;
    return;
  }

  if (status === "error") {
    btn.classList.remove("pending");
    btn.classList.add("error");
    btn.innerText = translateStrings.Btn.error;
    return;
  }
};

/**
 * Remove general class for swiper
 *
 * @param {string} selector
 * @return {void}
 */

export const cynRemoveSwiperClass = (selector) => {
  const swiper = document.querySelector(selector);
  if (!swiper) return;

  const swiperWrapper = swiper.querySelector(".swiper-wrapper");
  const swiperSlides = swiper.querySelectorAll(".swiper-slide");
  if (!swiperWrapper || !swiperSlides) return;

  swiper.classList.remove("swiper");
  swiper.classList.remove("swiper-backface-hidden");
  swiperWrapper.classList.remove("swiper-wrapper");
  swiperSlides.forEach((el) => {
    el.classList.remove("swiper-slide");
  });
};

/**
 * Destroy a swiper and remove general class for swiper
 *
 * @use cynRemoveSwiperClass
 *
 * @param {Swiper} swiper
 * @param {string} selector
 * @return {void}
 */
export const cynDestroySwiper = (swiper, selector) => {
  const swiperEl = document.querySelector(selector);
  if (!swiperEl) return;
  swiper.destroy(true, true);
  cynRemoveSwiperClass(selector);
};
