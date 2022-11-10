function updateTime() {
    var time = new Date();
    var dayname = time.getDay(),
        month = time.getMonth(),
        year = time.getFullYear(),
        daynumber = time.getDate(),
        hour = time.getHours(),
        minute = time.getMinutes(),
        second = time.getSeconds(),
        timeperiod = "AM";

    if (hour >= 12) {
        timeperiod = "PM";
    } else {
        timeperiod = "AM";
    }

    // 轉換成2位數 例如 08時:08分:08秒
    // TIME自己取的方法名稱 自己取的名稱digits當作位數
    // n.length<digits 變數n的長度要小於digits位數的長度
    Number.prototype.TIME = function (digits) {
        for (var n = this.toString(); n.length < digits; n=0+n);
        return n;
    }


    var months = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];
    var week = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
    var ids=["dayname","month","daynumber","year","hour","minutes","seconds","period"];
    var values=[week[dayname],months[month],daynumber.TIME(2),year,hour.TIME(2),minute.TIME(2),second.TIME(2),timeperiod];

    for(var i=0;i<ids.length;i++){
        document.getElementById(ids[i]).firstChild.nodeValue=values[i];        
    }
}

function startTime(){
    updateTime();
    window.setInterval("updateTime()", 1);
}