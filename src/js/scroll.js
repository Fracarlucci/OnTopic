const xhr = new XMLHttpRequest();
const xhr2 = new XMLHttpRequest();
const xhr3 = new XMLHttpRequest();
const method = "GET";
const url = "./api/daysCalculator.php";

var date = new Date();
var dateFormat = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate()
document.cookie = "date= "+dateFormat;

let currentDay = new Date().getDate();
let currentYear = new Date().getFullYear();
let currentMonth = new Date().getMonth();
/*
    incremento currentMonth per avere la numerazione dei mesi corretta
    .getMonth restituisce la numerazione dei mesi partendo da 0 (gennaio) per arrivare a 11 (dicembre)
*/
currentMonth++;
let lastDateOTM = new Date(currentYear, currentMonth, 0).getDate();
let lastDayOTM = new Date(currentYear, currentMonth, lastDateOTM).getDate();

let leftArrow = document.getElementById('prevDay');   
leftArrow.addEventListener('click', function (e) { 
    if(currentDay==1) {
        if(currentMonth==1){
            currentYear--;
            currentMonth=12;
            currentDay=31;
            document.cookie = "date= "+currentYear+"-"+currentMonth+"-"+currentDay;
        }else{
            currentMonth--;
            lastDateOTM = new Date(currentYear, currentMonth, 0).getDate();
            currentDay = lastDateOTM;
            document.cookie = "date= "+currentYear+"-"+currentMonth+"-"+currentDay;
        }
    }else{
        currentDay--;
        document.cookie = "date= "+currentYear+"-"+currentMonth+"-"+currentDay;
    }
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("textCalendar5").innerHTML = document.getElementById("textCalendar4").innerHTML;
            document.getElementById("textCalendar4").innerHTML = document.getElementById("textCalendar3").innerHTML;
            document.getElementById("textCalendar3").innerHTML = this.response;
            
            xhr2.onreadystatechange = function(){
                document.getElementById("textCalendar2").innerHTML = this.response;
            }
            let prevDay = currentDay;
            let prevMonth = currentMonth;
            let prevYear= currentYear;
            let lastDateOTM2 = new Date(prevYear, prevMonth, 0).getDate();
            if(prevDay==1){
                if(prevMonth==1){
                    prevYear--;
                    prevDay=31;
                    prevMonth=12;
                }else{
                    prevMonth--;
                    lastDateOTM2 = new Date(prevYear, prevMonth, 0).getDate();
                    prevDay = lastDateOTM2;
                }
            }else{
                prevDay--;
            }
            xhr2.open(method, url+"?currentDay="+prevDay+"&currentMonth="+prevMonth+"&currentYear="+prevYear, true);
            xhr2.send();

            xhr3.onreadystatechange = function(){
                document.getElementById("textCalendar1").innerHTML = this.response;
            }
            let prevTwoDay = currentDay;
            let prevMonth2 = currentMonth;
            let prevYear2 = currentYear;
            let lastDateOTM3 = new Date(prevYear2, prevMonth2, 0).getDate();
            if(prevTwoDay==1){
                if(prevMonth2==1){
                    prevYear2--;
                    prevTwoDay=30;
                    prevMonth2=12;
                }else {
                    prevMonth2--;
                    lastDateOTM3 = new Date(prevYear2, prevMonth2, 0).getDate();
                    prevTwoDay=(lastDateOTM3-1);
                }
            }else if((prevTwoDay-1)==1){
                if(prevMonth2==1){
                    prevYear2--;
                    prevTwoDay=31;
                    prevMonth2=12;
                }else {
                    prevMonth2--;
                    lastDateOTM3 = new Date(prevYear2, prevMonth2, 0).getDate();
                    prevTwoDay=lastDateOTM3;
                }
            }else{
                prevTwoDay-=2;
            }
            xhr3.open(method, url+"?currentDay="+prevTwoDay+"&currentMonth="+prevMonth2+"&currentYear="+prevYear2, true);
            xhr3.send();
        }
    }   
    xhr.open(method, url+"?currentDay="+currentDay+"&currentMonth="+currentMonth+"&currentYear="+currentYear, true);
    xhr.send();
});

let rightArrow = document.getElementById('nextDay');   
rightArrow.addEventListener('click', function (e) { 
    if(currentDay==lastDateOTM){
        if(currentMonth==12){
            currentYear++;
            currentDay=1;
            currentMonth=1;
            document.cookie = "date= "+currentYear+"-"+currentMonth+"-"+currentDay;
        }else{
            currentDay=1;
            currentMonth++;
            lastDateOTM = new Date(currentYear, currentMonth, 0).getDate();
            document.cookie = "date= "+currentYear+"-"+currentMonth+"-"+currentDay;
        }
    }else{
        currentDay++;
        document.cookie = "date= "+currentYear+"-"+currentMonth+"-"+currentDay;
    }
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("textCalendar1").innerHTML = document.getElementById("textCalendar2").innerHTML;
            document.getElementById("textCalendar2").innerHTML = document.getElementById("textCalendar3").innerHTML;
            document.getElementById("textCalendar3").innerHTML = this.response; 
            
            xhr2.onreadystatechange = function(){
                document.getElementById("textCalendar4").innerHTML = this.response;
            }
            let nextDay = currentDay;
            let nextMonth = currentMonth;
            let nextYear= currentYear;
            let lastDateOTM2 = new Date(nextYear, nextMonth, 0).getDate();
            if(nextDay==lastDateOTM2){
                if(nextMonth==12){
                    nextYear++;
                    nextDay=1;
                    nextMonth=1;
                }else{
                    nextDay=1;
                    nextMonth++;
                    lastDateOTM2 = new Date(nextYear, nextMonth, 0).getDate();
                }
            }else{
                nextDay++;
            }
            xhr2.open(method, url+"?currentDay="+nextDay+"&currentMonth="+nextMonth+"&currentYear="+nextYear, true);
            xhr2.send();

            xhr3.onreadystatechange = function(){
                document.getElementById("textCalendar5").innerHTML = this.response;
            }
            let nextTwoDay = currentDay;
            let nextMonth2 = currentMonth;
            let nextYear2 = currentYear;
            let lastDateOTM3 = new Date(nextYear2, nextMonth2, 0).getDate();
            if(nextTwoDay==lastDateOTM3){
                if(nextMonth2==12){
                    nextYear2++;
                    nextTwoDay=2;
                    nextMonth2=1;
                }else {
                    nextTwoDay=2;
                    nextMonth2++;
                    lastDateOTM3 = new Date(nextYear2, nextMonth2, 0).getDate();
                }
            }else if((nextTwoDay+1)==lastDateOTM3){
                if(nextMonth2==12){
                    nextYear2++;
                    nextTwoDay=1;
                    nextMonth2=1;
                }else {
                    nextTwoDay=1;
                    nextMonth2++;
                    lastDateOTM3 = new Date(nextYear2, nextMonth2, 0).getDate();
                }
            }else{
                nextTwoDay+=2;
            }
            xhr3.open(method, url+"?currentDay="+nextTwoDay+"&currentMonth="+nextMonth2+"&currentYear="+nextYear2, true);
            xhr3.send();

        }
    }
    xhr.open(method, url+"?currentDay="+currentDay+"&currentMonth="+currentMonth+"&currentYear="+currentYear, true);
    xhr.send();
});