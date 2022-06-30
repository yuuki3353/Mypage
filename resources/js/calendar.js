import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, 
    {
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
        initialView: "dayGridMonth",
        headerToolbar: 
        {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listWeek",
        },
        locale: "ja",
    
        // 日付をクリック、または範囲を選択したイベント
        selectable: true,
        select: function (info) 
        {
            //alert("selected " + info.startStr + " to " + info.endStr);
    
            // 入力ダイアログ
            const eventName = prompt("予約する時間を選択して下さい。");
    
            if (eventName) 
            {
                // Laravelの登録処理の呼び出し
                axios
                    .post("/schedule-add", 
                    {
                        start_date: info.start.valueOf(),
                        end_date: info.end.valueOf(),
                        event_name: eventName,
                    })
                    
                    .then(() => 
                    {
                        // イベントの追加
                        calendar.addEvent
                        ({
                            title: eventName,
                            start: info.start,
                            end: info.end,
                            allDay: true,
                        });
                    })
                    
                    .catch((error) => 
                    {
                        console.log(error)
                        // バリデーションエラーなど
                        alert("登録に失敗しました");
                    });
            }
        },
        
        events: function (info, successCallback, failureCallback) 
        {
            console.log(info);
        // Laravelのイベント取得処理の呼び出し
                axios
                    .post("/schedule-get", 
                    {
                        start_date: info.start.valueOf(),
                        end_date: info.end.valueOf(),
                    })
                    
                    .then((response) => 
                    {
                        // 追加したイベントを削除
                        calendar.removeAllEvents();
                        // カレンダーに読み込み
                        successCallback(response.data);
                    })
                    
                    .catch(() => 
                    {
                        // バリデーションエラーなど
                        alert("登録に失敗しました");
                    });
        },
    });
calendar.render();