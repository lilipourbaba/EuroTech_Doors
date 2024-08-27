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




// ///////////////

// export const subscribe = () => {
//   const subscribediv = document.getElementById("newsletter");
//   const subscribeForm = document.getElementById("subscribe");

//   if (!subscribediv) return;
//   subscribeForm.addEventListener(
//     "submit",
//     ajaxSendForm(subscribeForm, "cyn_subscribe_form")
//   );
// };

// subscribe();















import { errorToast, successFormToast } from "../modules/toastify";

export const ajaxSendForm = (formEl, action) => (e) => {
  e.preventDefault();
  // changeButtonStatus('pending', e.submitter);

  const formData = new FormData(e.currentTarget, e.submitter);
  const contactForm = document.getElementById("contactForm");

  formData.append("action", action);
  formData.append("_nonce", cyn_head_script.nonce);

  jQuery(($) => {
    $.ajax({
      type: "POST",
      url: cyn_head_script.url,
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: () => {
     successFormToast.showToast();
        contactForm.reset();
      },
      error: (err) => {
        console.log(err);
        errorToast.showToast();
      },
    });
  });
};

export const ContactUs = () => {
  const contactUsPage = document.getElementById("contactUsPage");
  const contactForm = document.getElementById("contactForm");

  if (!contactUsPage) return;
  contactForm.addEventListener(
    "submit",
    ajaxSendForm(contactForm, "cyn_contact_us_form")
  );
};

ContactUs();




/////////////





export const ajaxsubscribe = (formEl, action) => (e) => {
  e.preventDefault();
  // changeButtonStatus('pending', e.submitter);

  const formData = new FormData(e.currentTarget, e.submitter);
  const subscribe = document.getElementById("subscribe");
  const subscribe_buttin = document.getElementById("Subscribe-button");
    const success = document.getElementById("success");
   const subscribe_input = document.getElementById("email_input");


  formData.append("action", action);
  formData.append("_nonce", cyn_head_script.nonce);

  jQuery(($) => {
    $.ajax({
      type: "POST",
      url: cyn_head_script.url,
      cache: false,
      processData: false,
      contentType: false,
      data: formData,

      success: () => {
        // successFormToast.showToast();
        subscribe.reset();
success.style.opacity= "1"
        success.innerHTML = "Thank you, you will subscribe to our newsletter";
        subscribe_buttin.classList.add("submite");
        email_input.classList.add("submite");
                console.log(submitted);

      },
      error: (err) => {
        console.log(err);
        errorToast.showToast();
      },
    });
  });
};









export const subscribe = () => {
  const subscribediv = document.getElementById("newsletter");
  const subscribeForm = document.getElementById("subscribe");

  if (!subscribediv) return;
  subscribeForm.addEventListener(
    "submit",
    ajaxsubscribe(subscribeForm, "cyn_subscribe_form")
  );
};

subscribe();




