xhr4 = new XMLHttpRequest();
xhr41 = new XMLHttpRequest();
xhr42 = new XMLHttpRequest();
xhr44 = new XMLHttpRequest();
xhr45 = new XMLHttpRequest();
method2 = "GET";
url2 = "./api/daysCalculator.php";
currentDay = new Date().getDate();
currentYear = new Date().getFullYear();
currentMonth = new Date().getMonth();
/*
    incremento per avere la numerazione dei mesi corretta
    .getMonth restituisce la numerazione dei mesi partendo dall'indice 0 (gennaio) per arrivare a 11 (dicembre)
*/
currentMonth++;
lDoTm = new Date(currentYear, currentMonth, 0).getDate();

xhr4.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        
        // primo giorno
        xhr41.onreadystatechange = function(){
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
        xhr41.open(method, url2+"?currentDay="+prevTwoDay+"&currentMonth="+prevMonth2+"&currentYear="+prevYear2, true);
        xhr41.send();
        // fine primo giorno    

        // secondo giorno
        xhr42.onreadystatechange = function(){
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
        xhr42.open(method2, url2+"?currentDay="+prevDay+"&currentMonth="+prevMonth+"&currentYear="+prevYear, true);
        xhr42.send();      
        // fine secondo giorno

        document.getElementById("textCalendar3").innerHTML = this.response; 
        
        // quarto giorno
        xhr44.onreadystatechange = function(){
            document.getElementById("textCalendar4").innerHTML = this.response;
        }
        let nextDay = currentDay;
        let nextMonth = currentMonth;
        let nextYear= currentYear;
        let lDoTm2 = new Date(nextYear, nextMonth, 0).getDate();
        if(nextDay==lDoTm2){
            if(nextMonth==12){
                nextYear++;
                nextDay=1;
                nextMonth=1;
            }else{
                nextDay=1;
                nextMonth++;
                lDoTm2 = new Date(nextYear, nextMonth, 0).getDate();
            }
        }else{
            nextDay++;
        }
        xhr44.open(method2, url2+"?currentDay="+nextDay+"&currentMonth="+nextMonth+"&currentYear="+nextYear, true);
        xhr44.send();
        // fine quarto giorno

        // quinto giorno
        xhr45.onreadystatechange = function(){
            document.getElementById("textCalendar5").innerHTML = this.response;
        }
        let nextTwoDay = currentDay;
        let nextMonth2 = currentMonth;
        let nextYear2 = currentYear;
        let lDoTm3 = new Date(nextYear2, nextMonth2, 0).getDate();
        if(nextTwoDay==lDoTm3){
            if(nextMonth2==12){
                nextYear2++;
                nextTwoDay=2;
                nextMonth2=1;
            }else {
                nextTwoDay=2;
                nextMonth2++;
                lDoTm3 = new Date(nextYear2, nextMonth2, 0).getDate();
            }
        }else if((nextTwoDay+1)==lDoTm3){
            if(nextMonth2==12){
                nextYear2++;
                nextTwoDay=1;
                nextMonth2=1;
            }else {
                nextTwoDay=1;
                nextMonth2++;
                lDoTm3 = new Date(nextYear2, nextMonth2, 0).getDate();
            }
        }else{
            nextTwoDay+=2;
        }
        xhr45.open(method2, url2+"?currentDay="+nextTwoDay+"&currentMonth="+nextMonth2+"&currentYear="+nextYear2, true);
        xhr45.send();
        // fine quinto giorno

    }
}
xhr4.open(method2, url2+"?currentDay="+currentDay+"&currentMonth="+currentMonth+"&currentYear="+currentYear, true);
xhr4.send();
