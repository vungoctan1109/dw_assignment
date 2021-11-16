$(document).ready(function () {
    $.ajax({
        url: "http://localhost:8080/dw_assignment/api/list-district.php",
        method: 'GET',
        success: function (data) {
            var districts = JSON.parse(data);
            var contentHTML = '';
            districts.forEach(element => {
                contentHTML += `<option value='${element.id}'>${element.district_name}</option>";`;
            })
            var list = document.getElementById("district_filter");
            list.innerHTML += contentHTML;
        },
        error: function (){
            alert('Must handle error.');
        }
    });

    const inputName = $('input[name = name]');
    const inputDistrict = $('select[name = district]');
    const inputPubDate = $('input[name = pub_date]');
    const inputDescription = $('input[name = description]');
    const inputStatus = $('select[name = status]');
    $('form[name=add-form]').submit(function (event){
        event.preventDefault();
        let data = {
            name: inputName.val(),
            district: inputDistrict.val(),
            pub_date: inputPubDate.val(),
            description: inputDescription.val(),
            status: inputStatus.val()
        }
        $.ajax({
            url: "http://localhost:8080/dw_assignment/api/process-form.php",
            method: 'POST',
            data: JSON.stringify(data),
            success: function (responseData){
                alert(responseData.message);
            },
            error: function (){

            }
        });
    });
});