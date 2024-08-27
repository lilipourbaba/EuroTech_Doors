// for (let i = 1; i < 5; i++) {
//   const el = document.getElementById('tab' + i);

//   if (el) {
//     el.onclick = function () {
//       document.getElementById('tab' + i + 'Content').classList.toggle('show');
//     };
//   }
// }








 
const property_Tab = document.querySelectorAll(".property-tab");
const property = document.querySelectorAll(".property");
property_Tab?.forEach((product_event) => {
  product_event.addEventListener("click", () => {
    property?.forEach((property_event) => {
      property_event.classList.remove("active");
          product_event.parentElement.classList.add("active");
    });
  });
});
