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

// new Swiper(".slider_swiper", {
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true,
//     renderBullet: function (index, className) {
//       return '<span class="' + className + '">' + (index + 1) + "</span>";
//     },
//   },
// });
const slider = document.querySelector(".slider_swiper");
if (slider) {
  new Swiper(".slider_swiper", {
    // Optional parameters
    direction: "horizontal",
    // direction: "vertical",
    autoHeight: true,

    // loop: true,
    // allowTouchMove: true,
    slidesPerView: "auto", // сколько слайдов показывать, можно дробно
    // slidesPerView: 1, // сколько слайдов показывать, можно дробно
    // slidersPerGroup: 3, // сколько слайдов в группе
    centeredSlides: true, //выравнивание слайдов по центру
    // initialSlide: 0, //начальный слайд (c нуля)

    spaceBetween: 40,
    slideToClickedSlide: true, //перелистывание слайдов по клику
    grabCursor: true, //меняет курсор при наведении на руку
    // watchOverflow: true, //отключает слайдер если все слайды входят в область видимости

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      // el: ".swiper-pagination",
      // clickable: true,
      // type: "fraction",
      el: ".swiper-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    // mousewheel: { //перелистывание слайдов по мышке
    //   sensitivity: 1,
    //   eventsTarget: ".slider_swiper",
    // },
    // keyboard: { //перелистывание слайдов по нажатию клавиш
    //   enabled: true,
    //   onlyInViewport: true,
    //   // pageUpDown: true,
    // },
    breakpoints: {
      0: {
        // slidesPerView: 1,
      },
      500: {
        // slidesPerView: 2,
      },
      800: {
        // slidesPerView: 3.35,
      },
    },
  });
}

const formSave = document.getElementById("save-form");

if (formSave) {
  formSave.forEach((form) => {
    form.addEventListener("submit", sendForm);

    async function sendForm(e) {
      e.preventDefault();

      let errore = formvalidation(form);

      if (errore === 0) {
        form.classList.add("_sending");
        let formData = new FormData(form);

        let response = await fetch("saver.php", {
          method: "POST",
          body: formData,
        });

        if (response.ok) {
          let result = await response.json();
          form.reset();
          popupOpen(document.getElementById("success"));
          form.classList.remove("_sending");
        } else {
          popupOpen(document.getElementById("error"));
          form.classList.remove("_sending");
        }
      } else {
        alert("Заполните обязательные поля");
      }
    }
  });
}

const formDocx = document.getElementById("docx-form");
// const result = document.getElementById("result");

if (formDocx) {
  formDocx.addEventListener("submit", sendForm);

  async function sendForm(e) {
    e.preventDefault();

    let errore = formvalidation(formDocx);
    console.log(errore);

    if (errore === 0) {
      formDocx.classList.add("_sending");
      let formData = new FormData(formDocx);

      let response = await fetch("parser_copy.php", {
        method: "POST",
        body: formData,
      });

      if (response.ok) {
        // window.location.href = "parser_copy.php";
        let result = await response.json();
        // formDocx.reset();
        // popupOpen(document.getElementById("success"));
        formDocx.classList.remove("_sending");
        document.getElementById("result").innerHTML = result;
      } else {
        popupOpen(document.getElementById("error"));
        formDocx.classList.remove("_sending");
      }
    } else {
      alert("Заполните обязательные поля");
    }
  }
}

function formvalidation(item) {
  let error = 0;
  let formReq = item.querySelectorAll("._req");
  console.log(formReq);

  for (let index = 0; index < formReq.length; index++) {
    const input = formReq[index];

    formRemoveError(input);

    if (input.classList.contains("_file")) {
      file = input.files[0];
      if (file) {
        const ext = file.name.split(".").pop();
        if (ext !== "docx") {
          formAddError(input);
          error++;
          alert("Формат документа должен быть docx");
        }
      }
    }

    if (input.classList.contains("_email")) {
      if (emailTest(input)) {
        formAddError(input);
        error++;
      }
    } else if (input.getAttribute("type") === "checkbox" && input.checked === false) {
      formAddError(input);
      error++;
    } else {
      if (input.value === "") {
        formAddError(input);
        error++;
      }
    }
  }
  return error;
}

function formAddError(input) {
  input.parentElement.classList.add("_error");
  input.classList.add("_error");
}

function formRemoveError(input) {
  input.parentElement.classList.remove("_error");
  input.classList.remove("_error");
}

function emailTest(input) {
  return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
}
