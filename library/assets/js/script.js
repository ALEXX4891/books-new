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
        // window.location.href = "/library/backend/parser.php";
        let result = await response.json();
        // formDocx.reset();
        // popupOpen(document.getElementById("success"));
        formDocx.classList.remove("_sending");

        if (result == "Ошибка: неверный пароль!") {
          alert(result);
        } else {
          document.querySelector(".result-wrap").style.display = "block";
          // document.querySelector(".result-wrap").innerHTML = result;

          document.getElementById("result").innerHTML = result;
          // console.log(result);
          showPage();

          // sliderInit();
          showSaveForm();
          countPages();
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
  const docxFormAuthor = document.getElementById("docx-form-author").value;
  const docxFormLink_author = document.getElementById("docx-form-link_author").value;
  const docxFormLink_forum = document.getElementById("docx-form-link_forum").value;
  const docxFormLink_announcement = document.getElementById("docx-form-link_announcement").value;
  const docxFormLink_buy = document.getElementById("docx-form-link_buy").value;

  // yle="display: none;" method="post" enctype="multipart/form-data">
  //     <input class="input docx-form-name _req" type="text" name="name" id="docx-form-name" placeholder="Название книги*">
  //     <input class="input docx-form-category _req" type="text" name="category" id="docx-form-category" placeholder="Жанр произведения*">
  //     <input class="input docx-form-author _req" type="text" name="author" id="docx-form-author" placeholder="Автор*">
  //     <input class="input docx-form-link_author _req" type="text" name="link_author" id="docx-form-link_author" placeholder="Ссылка на автора*">
  //     <input class="input docx-form-link_forum _req" type="text" name="link_forum" id="docx-form-link_forum" placeholder="Ссылка на страницу обсуждения*">
  //     <input class="input docx-form-link_announcement _req" type="text" name="link_announcement" id="docx-form-link_announcement" placeholder="Ссылка на анотацию*">
  //     <input class="input docx-form-link_buy _req" type="text" name="link_buy" id="docx-form

  let saveFormName = document.getElementById("save-form-name");
  let saveFormCategory = document.getElementById("save-form-category");
  let saveFormAuthor = document.getElementById("save-form-author");
  let saveFormLink_author = document.getElementById("save-form-link_author");
  let saveFormLink_forum = document.getElementById("save-form-link_forum");
  let saveFormLink_announcement = document.getElementById("save-form-link_announcement");
  let saveFormLink_buy = document.getElementById("save-form-link_buy");

  // <input class="input docx-form-name _req" type="text" name="name" id="save-form-name" placeholder="Название книги*">
  // <input class="input save-form-category _req" type="text" name="category" id="save-form-category" placeholder="Жанр произведения*">
  // <input class="input save-form-author _req" type="text" name="author" id="save-form-author" placeholder="Автор*">
  // <input class="input save-form-link_author _req" type="text" name="link_author" id="save-form-link_author" placeholder="Ссылка на автора*">
  // <input class="input save-form-link_forum _req" type="text" name="link_forum" id="save-form-link_forum" placeholder="Ссылка на страницу обсуждения*">
  // <input class="input save-form-link_announcement _req" type="text" name="link_announcement" id="save-form-link_announcement" placeholder="Ссылка на анотацию*">
  // <input class="input save-form-link_buy _req" type="text" name="link_buy" id="save-form-link_buy" placeholder="Ссылка на страницу в магазине*">


  saveFormName.value = docxFormName;
  saveFormCategory.value = docxFormCategory;
  saveFormAuthor.value = docxFormAuthor;
  saveFormLink_author.value = docxFormLink_author;
  saveFormLink_forum.value = docxFormLink_forum;
  saveFormLink_announcement.value = docxFormLink_announcement;
  saveFormLink_buy.value = docxFormLink_buy;
}

function countPages() {
  const pages = document.querySelectorAll(".page[data-page]");
  const input = document.getElementById("save-form-volume");
  let count = 0;
  pages.forEach((page) => {
    count++;
  });
  input.value = count;
  // console.log(count);
  // console.log(input.value);
  // return count;
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
  // console.log("booksPage");
  const categories = document.querySelectorAll(".categories__item");
  categories.forEach((item) => {
    item.addEventListener("click", () => {
      if (item.querySelector(".books__item").style.display === "flex") {
        booksInCategory = item.querySelectorAll(".books__item");
        // console.log(booksInCategory);
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
        book.style.display = "flex";
      });
    });
  });
}

window.addEventListener("load", () => {
  const book = document.querySelector(".books");
  if (book) {
    const body = document.querySelector("body");
    const header = document.querySelector("header");
    const footer = document.querySelector("footer");
    const main = document.querySelector("main");
    body.style.margin = "0";
    body.style.display = "grid";
    body.style.gridTemplateRows = "auto 1fr auto";
    body.style.height = "100vh";
    header.style.display = "none";
    footer.style.display = "none";

    const pages = book.querySelectorAll(".page");
    const input = document.querySelector(".books__number");
    input.setAttribute("max", pages.length);
    const bntPrev = document.querySelector(".books__pagination-item_prev");
    const bntNext = document.querySelector(".books__pagination-item_next");
    let pageNumber = 1;

    pages.forEach((page) => {
      if (page.getAttribute("data-page") == pageNumber) {
        page.style.display = "block";
      } else {
        page.style.display = "none";
      }
    });

    bntPrev.addEventListener("click", () => {
      if (pageNumber > 1) {
        pageNumber--;
        input.value = pageNumber;
        selectPage();
      }
    });
    bntNext.addEventListener("click", () => {
      if (pageNumber < pages.length) {
        pageNumber++;
        input.value = pageNumber;
        selectPage();
      }
    });
    checkPage();

    function selectPage() {
      const selectedPage = input.value;
      pageNumber = selectedPage;
      pages.forEach((page) => {
        page.style.display = "none";
      });
      pages.forEach((page) => {
        if (page.getAttribute("data-page") == selectedPage) {
          page.style.display = "block";
          page.scrollIntoView({ behavior: "smooth", block: "start" });
        }
      });

      checkPage();
    }

    function checkPage() {
      if (pageNumber == 1) {
        bntPrev.style.opacity = "0.5";
        bntPrev.style.pointerEvents = "none";
      } else {
        bntPrev.style.opacity = "1";
        bntPrev.style.pointerEvents = "auto";
      }
      if (pageNumber == pages.length) {
        bntNext.style.opacity = "0.5";
        bntNext.style.pointerEvents = "none";
      } else {
        bntNext.style.opacity = "1";
        bntNext.style.pointerEvents = "auto";
      }
    }

    input.addEventListener("change", function () {
      if (input.value > pages.length) {
        input.value = pages.length;
      }
      if (input.value < 1) {
        input.value = 1;
      }
      selectPage();
    });
  }
});

function showPage() {
  const resultWrap = document.querySelector(".result-wrap");
  if (resultWrap && resultWrap.style.display == "block") {
    const pages = document.querySelectorAll(".page");
    const input = document.querySelector(".books__number");
    input.setAttribute("max", pages.length);
    const bntPrev = document.querySelector(".books__pagination-item_prev");
    const bntNext = document.querySelector(".books__pagination-item_next");
    let pageNumber = 1;

    // const select = document.createElement("select");
    // select.classList.add("books__select");
    pages.forEach((page) => {
      if (page.getAttribute("data-page") == pageNumber) {
        page.style.display = "block";
      } else {
        page.style.display = "none";
      }
    });

    bntPrev.addEventListener("click", () => {
      if (pageNumber > 1) {
        pageNumber--;
        input.value = pageNumber;
        selectPage();
      }
    });
    bntNext.addEventListener("click", () => {
      if (pageNumber < pages.length) {
        pageNumber++;
        input.value = pageNumber;
        selectPage();
      }
    });

    // pages.forEach((page) => {
    //   const option = document.createElement("option");
    //   const pageNumber = page.getAttribute("data-page");
    //   option.value = pageNumber;
    //   option.innerHTML = pageNumber;
    //   option.setAttribute("data-page", pageNumber);
    //   option.classList.add("books__option");
    //   select.append(option);
    // });

    // book.prepend(select);
    // console.log(select);
    checkPage();

    function selectPage() {
      const selectedPage = input.value;
      pageNumber = selectedPage;
      pages.forEach((page) => {
        page.style.display = "none";
      });
      pages.forEach((page) => {
        if (page.getAttribute("data-page") == selectedPage) {
          page.style.display = "block";
        }
      });

      checkPage();
    }

    function checkPage() {
      if (pageNumber == 1) {
        bntPrev.style.opacity = "0.5";
        bntPrev.style.pointerEvents = "none";
      } else {
        bntPrev.style.opacity = "1";
        bntPrev.style.pointerEvents = "auto";
      }
      if (pageNumber == pages.length) {
        bntNext.style.opacity = "0.5";
        bntNext.style.pointerEvents = "none";
      } else {
        bntNext.style.opacity = "1";
        bntNext.style.pointerEvents = "auto";
      }
    }

    input.addEventListener("input", function () {
      if (input.value > pages.length) {
        input.value = pages.length;
      }
      if (input.value < 1) {
        input.value = 1;
      }
    });

    input.addEventListener("change", selectPage);

    // body.style.minHeight = "initial";

    // header.style.flexShrink = "0";
    // footer.style.flexShrink = "0";
    // main.style.flexGrow = "1";
  }
}
