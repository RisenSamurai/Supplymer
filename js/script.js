'use strict'; // строгий режим для выполнения тольк современного кода
// let titleText = "Enter your name";
// let result = prompt(titleText, []); // saves promt in result


// let question = "What is the official name of JavaScript?"
// let company = prompt(question);
// let result = confirm(company);


if (company > 0) {
  alert('1');
} else if (company < 0) {
  alert('-0');
} else if (company == 0) {
  alert('0');
} else {
  alert('Wrong!');
}

// alert("Hello " + result);


let user = {
  name: 'John',
  surname: 'Smith',
};

user.name = 'Pete';

delete user.name;

function isEmpty(obj) {
  for (let key in obj) {
    // если тело цикла начнет выполняться - значит в объекте есть свойства
    return false;
  }
  return true;
}

let salaries = {
  John: 100,
  Ann: 160,
  Pete: 130
};

let sum = 0;
for (let key in salaries) {
  sum += salaries[key];
}

alert(sum); // 390
