$(document).ready(function () {
    $.ajax({
        url: "http://localhost:8080/dw_assignment/api/list.php",
        method: 'GET',
        success: function (data) {
            var streets = JSON.parse(data);
            var contentHTML = '';
            streets.forEach(element => {
                var status_text = '';
                if (element.status == 1) {
                    status_text = "Being used";
                } else if (element.status == -1) {
                    status_text = "Under construction";
                } else {
                    status_text = "Under repair";
                }
                contentHTML += `<tr>
                                        <td>${element.name}</td>
                                        <td>${element.district_name}</td>
                                        <td>${element.pub_date}</td>
                                        <td>${element.description}</td>
                                        <td>${status_text}</td>
                                    </tr>`;
            })
            var list = document.getElementById("content");
            list.innerHTML += contentHTML;
        },
        error: function () {
            alert('Must handle error.');
        }
    });

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
        error: function () {
            alert('Must handle error.');
        }
    });
    const search_keyword = $('input[name = search_keyword]');
    const district_filter = $('select[name = district_filter]');
    $('form[name=search-form]').submit(function (event) {
        event.preventDefault();
        let data = {
            search_keyword: search_keyword.val(),
            district_filter: district_filter.val(),
        }
        $.ajax({
            url: "http://localhost:8080/dw_assignment/api/list.php",
            method: 'POST',
            data: data,
            success: function (data) {
                var list = document.getElementById("content");
                var streets = JSON.parse(data);
                var searchTitle = document.getElementById('search-title');
                if (search_keyword.val() != null && search_keyword.val().length > 0) {
                    searchTitle.innerText = `Search result for ${search_keyword.val()}`
                }
                var contentHTML = `
                                        <tr class="">
                                            <th>Street Name</th>
                                            <th>District</th>
                                            <th>Public Date</th>
                                            <th class="w3-center">Description</th>
                                            <th>Status</th>
                                        </tr>`;
                streets.forEach(element => {
                    var status_text = '';
                    if (element.status == 1) {
                        status_text = "Being used";
                    } else if (element.status == -1) {
                        status_text = "Under construction";
                    } else {
                        status_text = "Under repair";
                    }
                    contentHTML += `<tr>
                                        <td>${element.name}</td>
                                        <td>${element.district_name}</td>
                                        <td>${element.pub_date}</td>
                                        <td>${element.description}</td>
                                        <td>${status_text}</td>
                                    </tr>`;
                })
                list.innerHTML = contentHTML;

            },
            error: function () {

            }
        });
    });
});