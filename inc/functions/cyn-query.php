<?php 
add_action('pre_get_posts', 'order_query');

function order_query($query)
{
if (
is_admin() ||
!$query->is_main_query() ||
!$query->is_archive('product'))
return;

    $query->set('orderby', 'menu_order');
    $query->set('order', 'ASC');


}


 
// add_action('pre_get_posts', 'customize_query');

// function customize_query($query)
// {
//     if (!is_admin() && is_archive('product')) {
//         $query->set('posts_per_page', 6);
//     }
// }















// import { errorToast, successFormToast } from "../modules/toastify";

// export const ajaxSendForm = (formEl, action) => (e) => {
//   e.preventDefault();
//   // changeButtonStatus('pending', e.submitter);

//   const formData = new FormData(e.currentTarget, e.submitter);
//   const contactForm = document.getElementById("contactForm");

//   formData.append("action", action);
//   formData.append("_nonce", cyn_head_script.nonce);

//   jQuery(($) => {
//     $.ajax({
//       type: "POST",
//       url: cyn_head_script.url,
//       cache: false,
//       processData: false,
//       contentType: false,
//       data: formData,

//       success: () => {
//      successFormToast.showToast();
//         contactForm.reset();
//       },
//       error: (err) => {
//         console.log(err);
//         errorToast.showToast();
//       },
//     });
//   });
// };

// export const ContactUs = () => {
//   const contactUsPage = document.getElementById("contactUsPage");
//   const contactForm = document.getElementById("contactForm");

//   if (!contactUsPage) return;
//   contactForm.addEventListener(
//     "submit",
//     ajaxSendForm(contactForm, "cyn_contact_us_form")
//   );
// };

// ContactUs();




///////////////





// export const ajaxsubscribe = (formEl, action) => (e) => {
//   e.preventDefault();
//   // changeButtonStatus('pending', e.submitter);

//   const formData = new FormData(e.currentTarget, e.submitter);
//   const subscribe = document.getElementById("subscribe");

//   formData.append("action", action);
//   formData.append("_nonce", cyn_head_script.nonce);

//   jQuery(($) => {
//     $.ajax({
//       type: "POST",
//       url: cyn_head_script.url,
//       cache: false,
//       processData: false,
//       contentType: false,
//       data: formData,

//       success: () => {
//         successFormToast.showToast();
//         subscribe.reset();
//       },
//       error: (err) => {
//         console.log(err);
//         errorToast.showToast();
//       },
//     });
//   });
// };









// export const subscribe = () => {
//   const subscribediv = document.getElementById("newsletter");
//   const subscribeForm = document.getElementById("subscribe");

//   if (!subscribediv) return;
//   subscribeForm.addEventListener(
//     "submit",
//     ajaxsubscribe(subscribeForm, "cyn_subscribe_form")
//   );
// };

// subscribe();
