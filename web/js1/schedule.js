training = [];
entries = [];

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined
        ? true
        : decodeURIComponent(sParameterName[1]);
    }
  }
};

async function fetchSchedule() {
  var page = getUrlParameter("page");
  await $.ajax({
    type: "GET",
    url: `/site1/schedule-all?page=${page}`,
    success: data => {
      training = data[0];
      entries = data[1];
    }
  });
}

function createItem(item, isEntry, auth) {
  let lang = $("html").attr("lang");
  let element = `<tr>
                  <td>${item["city"]}</td>
                  <td>${item["startDate"]}</td>
                  <td>${item["title"]}</td>`
            if (!auth) {
              if (isEntry) {
                element += `<td> <button style="pointer-events: none;" class = 'schedulle_button' data-id = "${lang == "ru-RU" ? "Вы уже записаны" : lang == "kk-KZ" ? "Сіз жазылғансыз" : "Submit your application"}">${lang == "ru-RU" ? "Вы уже записаны" : lang == "kk-KZ" ? "Сіз жазылғансыз" : "Submit your application"}</button></td>`
              }
              else {
                element += `<td> <button onclick="location.href='/site1/entry?id=${item['id']}'" class = 'schedulle_button' data-id = "${lang == "ru-RU" ? "Оставить заявку" : lang == "kk-KZ" ? "Өтініш қалдыру" : "Submit your application"}">${lang == "ru-RU" ? "Оставить заявку" : lang == "kk-KZ" ? "Өтініш қалдыру" : "Submit your application"}</button> </td>`
              }
            }
            else {
              element += `<td> <button onclick="location.href='/site/login'" class = 'schedulle_button' data-id = "${lang == "ru-RU" ? "Зарегистрироваться" : lang == "kk-KZ" ? "Тіркелу" : "Sign up"}">${lang == "ru-RU" ? "Зарегистрироваться" : lang == "kk-KZ" ? "Тіркелу" : "Sign up"}</button> </td>`
            }
  element += `</tr>`
                  
  
  return element;
}

$(".schedulle_button").click(function(e) {
  e.preventDefault();
  let pageCount = $("#scheduleCount").data("id");
  let auth = $("#scheduleCount").data("auth");
  let data = training.filter(
    (_, index) => index >= pageCount && index < pageCount + 3
  );
  // $("#scheduleBody").empty();
  data.forEach(item => {
    isEntry = entries.includes(item.id);
    $("#scheduleBody").append(createItem(item, isEntry, auth));
  });
  if (training.length > pageCount + 3) {
    $("#scheduleCount").data("id", pageCount + 3);
  } else {
    $("#scheduleCount").css("display", "none");
  }
});


$(document).ready(function() {
  fetchSchedule()
})