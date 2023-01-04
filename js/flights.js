$(function () {
    $("a.insert-flight").on("click",function() {
        $("div.ins-flight-form").addClass("w-100");
        $("h1.institle").show();
        $("div.insformcontainer").show();
        $('#insertform').trigger("reset");
    });
});

$(function () {
    $( "div.insformcontainer" ).on("click","button.insflightclose", function( ) {
        $("h1.institle").hide();
        $("div.insformcontainer").hide();
        $("div.ins-flight-form").removeClass("w-100").addClass(0);
    });
});

$(function () {
    $( "div.ins-flight-form" ).on("click","button.insflightsave", function( event ) {
        event.preventDefault();
        ardata = $('#insertform').serializeArray();

        $flag = true;
        if (ardata.length === 6) {
            ardata.forEach(element => {
                if (element.value == '') {
                    $flag = false;
                    alert('Please fill all fields!');
                    $("div.ins-flight-form").addClass("w-100");
                }
            });

            if ($flag) {
                const data = `action=insertNewFlight&`+$("#insertform").serialize();
                $.ajax({
                    type: "POST",
                    url: "ajax/controladorAjax.php",
                    data: data,
                })
                .done(function (dataJSON) {
                    // console.log(dataJSON);
                    let resultInsert = JSON.parse(dataJSON);
                    let alertInsert = resultInsert["resultinsert"];

                    switch (resultInsert["status"]["codError"]) {
                        case "000":
                            $("div.alertinsert").empty();
                            $("div.alertinsert").append(alertInsert);
                            $("div.ins-flight-form").removeClass("w-100").addClass(0);
                            setTimeout(function() {
                                window.location.href = "flights.php";
                            }, 3000);
                            break;
                        case "001":
                            $("div.alertinsert").empty();
                            $("div.alertinsert").append();
                            break;
                        case "002":
                            $("div.alertinsert").empty();
                            $("div.alertinsert").append(
                                resultInsert["data"]["txtError"]
                            );
                            break;
                        default:
                    }
                })
                .fail(function () {
                    alert("An error has occurred.");
                });
            } else {
                alert('Please fill all fields!');
                $("div.ins-flight-form").addClass("w-100");
            }
        } else {
            $flag = false;
            alert('Please fill all fields!');
            $("div.ins-flight-form").addClass("w-100");
        }
    });
});

$(function () {
    $("a.btnedit").on("click",function(event) {
        event.preventDefault();
        id = $(this).attr('data-id');
        $("div.updt-flight-form").addClass("w-100");
        $("h1.updttitle").show();
        $("div.updtformcontainer").show();

        $.ajax({
            method: 'GET',
            url: 'templates/forms/update_flight_form.php?id='+id
        })
        .done(function (dataJSON) {
            $('.updt-flight-form').html(dataJSON);

            $(function () {
                $( "div.updtformcontainer" ).on("click","button.btnupdtclose", function( ) {
                    $("h1.updttitle").hide();
                    $("div.updtformcontainer").hide();
                    $("div.updt-flight-form").removeClass("w-100").addClass(0);
                    $('#updateform').trigger("reset");
                });
            });

            $(function () {
                $( "div.updt-flight-form" ).on("click","button.btnupdtflight", function( event ) {
                    event.preventDefault();
                    // console.log('save');
                    ardata = $('#updateform').serializeArray();

                    $flag = true;
                    if (ardata.length === 8) {
                        ardata.forEach(element => {
                            if (element.value == '') {
                                $flag = false;
                                alert('Please fill all fields!');
                                $("div.updt-flight-form").addClass("w-100");
                            }
                        });

                        if ($flag) {
                            const data = `action=updateFlight&`+$("#updateform").serialize();
                            $.ajax({
                                type: "POST",
                                url: "ajax/controladorAjax.php",
                                data: data,
                            })
                            .done(function (dataJSON) {
                                // console.log(dataJSON);
                                let resultUpdate = JSON.parse(dataJSON);
                                let alertUpdate = resultUpdate["resultupdate"];
                                let divIdFlight = "#div"+resultUpdate['flightCode'];

                                switch (resultUpdate["status"]["codError"]) {
                                    case "000":
                                        $("div.alertinsert").empty();
                                        $("div.alertinsert").append(alertUpdate);
                                        $("div.updt-flight-form").removeClass("w-100").addClass(0);
                                        $(divIdFlight).addClass(["bg-warning","bg-opacity-50"]);
                                        setTimeout(function() {
                                            location.reload();
                                        }, 4000);
                                        break;
                                    case "001": // corregir esto
                                        $("div.alertinsert").empty();
                                        $("div.alertinsert").append(photoAircraft);
                                        break;
                                    case "002":
                                        $("div.alertinsert").empty();
                                        $("div.alertinsert").append(
                                            resultUpdate["data"]["txtError"]
                                        );
                                        break;
                                    default:
                                }
                            })
                            .fail(function () {
                                alert("An error has occurred.");
                            });
                        } else {
                            alert('Please fill all fields!');
                            $("div.updt-flight-form").addClass("w-100");
                        }
                    } else {
                        $flag = false;
                        alert('Please fill all fields!');
                        $("div.updt-flight-form").addClass("w-100");
                    }
                });
            });
        })
        .fail(function (e) {
            console.log(e);
        });
    });
});

$(function () {
    $("a.btndelete").on("click",function(event) {
        event.preventDefault();
        let delete_flight = confirm('Are you sure you want to delete this flight?');
        // console.log('delete');
        if (delete_flight) {
            let flightID = $(this).attr('data-id');
            $.ajax({
                method:'GET',
                url: 'flights.delete.php?id='+flightID
            })
            .done(function(dataJSON){
                // console.log(dataJSON);
                let resultInsert = JSON.parse(dataJSON);
                let alertInsert = resultInsert["resultdelete"];

                switch (resultInsert["status"]["codError"]) {
                    case "000":
                        $("div.alertinsert").empty();
                        $("div.alertinsert").append(alertInsert);
                        setTimeout(function() {
                            window.location.href = "flights.php";
                        }, 3000);
                        break;
                    case "001":
                        $("div.alertinsert").empty();
                        $("div.alertinsert").append(photoAircraft);
                        break;
                    case "002":
                        $("div.alertinsert").empty();
                        $("div.alertinsert").append(
                            resultInsert["data"]["txtError"]
                        );
                        break;
                    default:
                }
            })
            .fail(function(e) {
                alert(e);
            });
        } else {
            alert('The flight was not deleted!');
        }
    });
});