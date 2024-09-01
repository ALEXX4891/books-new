// // ---------------------------------- start отправка и валидация формы ----------------------------------

// const form = document.querySelector("#docx-form");
// if (form) {
//   form.addEventListener("submit", sendForm);

//   async function sendForm(e) {
//     e.preventDefault();

//     let errore = formvalidation(form);

//     if (errore === 0) {
//       form.classList.add("_sending");
//       let formData = new FormData(form);

//         // // проверка данных в formData:
//         // for (let value of formData.entries()) {
//         //   console.log(value);
//         // }

//       let response = await fetch("parser.php", {
//         method: "POST",
//         body: formData,
//       });

//       if (response.ok) {
//         // console.log(document.querySelector("#result"));
//         // console.log(response);
//         let result = await response.json();
//         // console.log(result);
//         document.querySelector("#result").innerHTML = result;
//         form.reset();
//         // popupOpen(document.getElementById("success"));
//         form.classList.remove("_sending");
//       } else {
//         // popupOpen(document.getElementById("error"));
//         form.classList.remove("_sending");
//       }
//     } else {
//       alert("Заполните обязательные поля");
//     }
//   }

//     //   .then((response) => response.text())
//     // .then((data) => {
//     // });

//   function formvalidation(item) {
//     let error = 0;
//     let formReq = item.querySelectorAll("._req");

//     for (let index = 0; index < formReq.length; index++) {
//       const input = formReq[index];

//       formRemoveError(input);

//       if (input.classList.contains("_email")) {
//         if (emailTest(input)) {
//           formAddError(input);
//           error++;
//         }
//       } else if (input.getAttribute("type") === "checkbox" && input.checked === false) {
//         formAddError(input);
//         error++;
//       } else {
//         if (input.value === "") {
//           formAddError(input);
//           error++;
//         }
//       }
//     }
//     return error;
//   }

//   function formAddError(input) {
//     input.parentElement.classList.add("_error");
//     input.classList.add("_error");
//   }

//   function formRemoveError(input) {
//     input.parentElement.classList.remove("_error");
//     input.classList.remove("_error");
//   }

//   function emailTest(input) {
//     return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
//   }
// }

// // ---------------------------------- end отправка и валидация формы ----------------------------------
