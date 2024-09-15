// // ---------------------------------- start отправка и валидация формы ----------------------------------

// const form = document.querySelector("#docx-form");
// if (form) {
//   form.addEventListener("submit", sendForm);

//   async function sendForm(e) {
//     e.preventDefault();

//     let error = formvalidation(form);

//     if (error === 0) {
//       form.classList.add("_sending");
//       let formData = new FormData(form);

//         // // проверка данных в formData:
//         // for (let value of formData.entries()) {
//         //   console.log(value);
//         // }

//       let response = await fetch("/backend/parser.php", {
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
const allBooksLink = document.querySelector(".all-btn");
const slider = document.querySelector(".slider_swiper");
// console.log(slider.querySelector('swiper-slide'));
function sliderInit() {
  // console.log("sliderInit");
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

const formDocx = document.getElementById("docx-form");
// const result = document.getElementById("result");

if (formDocx) {
  formDocx.addEventListener("submit", sendForm);

  async function sendForm(e) {
    e.preventDefault();

    let error = formvalidation(formDocx);
    // console.log(error);

    if (error === 0) {
      formDocx.classList.add("_sending");
      let formData = new FormData(formDocx);

      let response = await fetch("parser.php", {
        method: "POST",
        body: formData,
      });

      if (response.ok) {
        // window.location.href = "/backend/parser.php";
        let result = await response.json();
        // formDocx.reset();
        // popupOpen(document.getElementById("success"));
        formDocx.classList.remove("_sending");

        if (result == 'Ошибка: неверный пароль!') {
          alert(result);
        } else {
          document.querySelector(".result-wrap").style.display = "block";
          // document.querySelector(".result-wrap").innerHTML = result;
  
          document.getElementById("result").innerHTML = result;
          console.log(result);
  
          // sliderInit();
          showSaveForm();
        }
      } else {
        // popupOpen(document.getElementById("error"));
        formDocx.classList.remove("_sending");
      }
    } else {
      alert("Заполните обязательные поля");
    }
  }
}

const resultBox = document.querySelector(".result");

if (formSave) {
  formSave.addEventListener("submit", sendForm);

  async function sendForm(e) {
    e.preventDefault();

    let error = formvalidation(formSave);

    if (error === 0) {
      formSave.classList.add("_sending");
      let formData = new FormData(formSave);
      const book = document.querySelector(".book").innerHTML;
      formData.append("book", book);

      let response = await fetch("saver.php", {
        method: "POST",
        body: formData,
      });

      if (response.ok) {
        let result = await response.json();
        // console.log(result);
        // formSave.reset();
        // можно показать форму для загрузки
        // popupOpen(document.getElementById("success"));
        formSave.classList.remove("_sending");
        document.querySelector(".result-wrap").style.display = "none";
        document.querySelector(".message-wrap").style.display = "block";
        document.getElementById("message").innerHTML = result;

        // document.getElementById("result").innerHTML = "";
        // document.getElementById("result").innerHTML = result;
        showDocxForm();
      } else {
        // popupOpen(document.getElementById("error"));
        formSave.classList.remove("_sending");
      }
    } else {
      alert("Заполните обязательные поля");
    }
  }
}

function formvalidation(item) {
  let error = 0;
  let formReq = item.querySelectorAll("._req");
  // console.log(formReq);

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

function showSaveForm() {
  const formDocx = document.getElementById("docx-form");
  const saveForm = document.getElementById("save-form");
  formDocx.style.display = "none";
  saveForm.style.display = "grid";
  const docxFormName = document.getElementById("docx-form-name").value;
  const docxFormCategory = document.getElementById("docx-form-category").value;

  let saveFormName = document.getElementById("save-form-name");
  let saveFormCategory = document.getElementById("save-form-category");

  saveFormName.value = docxFormName;
  saveFormCategory.value = docxFormCategory;
}

function showDocxForm() {
  const formDocx = document.getElementById("docx-form");
  const saveForm = document.getElementById("save-form");
  formDocx.style.display = "grid";
  saveForm.style.display = "none";
  formDocx.reset();
}

const booksPage = document.querySelector(".books-page");
if (booksPage) {
  console.log("booksPage");
  const categories = document.querySelectorAll(".categories__item");
  categories.forEach((item) => {
    item.addEventListener("click", () => {
      if (item.querySelector(".books__item").style.display === "block") {
        booksInCategory = item.querySelectorAll(".books__item");
        console.log(booksInCategory);
        booksInCategory.forEach((book) => {
          book.style.display = "none";
        });
        return;
      }

      const allBooks = document.querySelectorAll(".books__item");
      allBooks.forEach((book) => {
        book.style.display = "none";
      });

      const books = item.querySelectorAll(".books__item");

      books.forEach((book) => {
        book.style.display = "block";
      });
    });
  });
}
