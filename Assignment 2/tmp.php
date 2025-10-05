<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $("#state").change(function () {
        let state_id = $(this).val();

        if (state_id !== "") {
            $.ajax({
                url: "getCities.php",
                type: "POST",
                data: { state_id: state_id },
                dataType: "json",
                success: function (cities) {
                    $("#city").empty();
                    $("#city").append("<option value=''>-- Select City --</option>");
                    $.each(cities, function (key, city) {
                        $("#city").append("<option value='" + city.city_id + "'>" + city.city_name + "</option>");
                    });
                }
            });
        } else {
            $("#city").empty();
            $("#city").append("<option value=''>-- Select City --</option>");
        }
    });
});
</script>
