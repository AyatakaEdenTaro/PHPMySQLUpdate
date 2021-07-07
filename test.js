function Write_insert() {

    var db_data = {};

    db_data["USER"] = "テストユーザ";
    db_data["DAY"] = "今日";
    db_data["TASK"] = "タスク";

    $.post("http://localhost/test.php", db_data).done(function (data) {
        console.log(data);
    })
}

Write_insert();